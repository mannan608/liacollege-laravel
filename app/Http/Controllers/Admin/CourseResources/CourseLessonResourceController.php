<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseResources\StoreLessonResourceRequest;
use App\Http\Requests\CourseResources\UpdateCourseLessonResourceRequest;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\LessonResource;
use App\Models\CourseResources\LessonResourceSection;
use App\Models\CourseResources\Module;
use App\Traits\HandlesFiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class CourseLessonResourceController extends Controller
{
    use HandlesFiles;
public function index(
    Request $request,
    string $role,
    Course $course,
    Module $module,
    Lesson $lesson

)
{
    $sections = $lesson
        ->resourceSections()
        ->with('resources')
        ->paginate(15);

    return view(
        'backend.pages.CourseResources.Lessons.Resources.index',
        compact(
            'course',
            'module',
            'lesson',
            'sections'
        )
    );
}
public function create(
    string $role,
    Course $course,
    Module $module,
    Lesson $lesson
)
{
    return view(
        'backend.pages.CourseResources.Lessons.Resources.create',
        compact(
            'course',
            'module',
            'lesson'
        )
    );
}
public function store(
    StoreLessonResourceRequest $request,
    string $role,
    Course $course,
    Module $module,
    Lesson $lesson
): RedirectResponse
{

    try {

        DB::transaction(function () use ($request, $lesson) {

            foreach ($request->sections as $sectionIndex => $sectionData) {

                $section = LessonResourceSection::create([

                    'lesson_id'=>$lesson->id,

                    'title'=>$sectionData['title'],

                    'resource_type'=>$sectionData['resource_type'],

                    'sort_order'=>$sectionIndex,

                    'status'=>true

                ]);

                foreach ($sectionData['items'] as $itemIndex=>$item) {

                    $file = null;

                    if(isset($item['file'])){

                        $file = $this->uploadFile(
                            $item['file'],
                            'lesson-resources'
                        );

                    }

                    LessonResource::create([

                        'lesson_resource_section_id'=>$section->id,

                        'title'=>$item['title'],

                        'description'=>$item['description'] ?? null,

                        'url'=>$item['url'] ?? null,

                        'file_path'=>$file,

                        'quiz_id'=>$item['quiz_id'] ?? null,

                        'duration'=>$item['duration'] ?? null,

                        'sort_order'=>$itemIndex,

                        'status'=>true

                    ]);

                }

            }

        });

        return redirect()
            ->route('resources.index',[
                'role'=>$role,
                'course'=>$course,
                'module'=>$module,
                'lesson'=>$lesson
            ])
            ->with('success','Lesson resources created successfully.');

    } catch (Throwable $e) {

        report($e);

        return back()
            ->withInput()
            ->with('error',$e->getMessage());

    }
}
   public function edit(
    string $role,
    Course $course,
    Module $module,
    Lesson $lesson
) {
    $lesson->load([
        'resourceSections.resources'
    ]);

    return view(
        'backend.pages.CourseResources.Resources.edit',
        compact(
            'course',
            'module',
            'lesson'
        )
    );
}

public function update(
    StoreLessonResourceRequest $request,
    string $role,
    Course $course,
    Module $module,
    Lesson $lesson
): RedirectResponse {

    try {

        DB::transaction(function () use ($request, $lesson) {

            $existingSectionIds = [];

            foreach ($request->sections as $sectionIndex => $sectionData) {

                /**
                 * -------------------------
                 * Update or Create Section
                 * -------------------------
                 */

                if (!empty($sectionData['id'])) {

                    $section = LessonResourceSection::where('lesson_id', $lesson->id)
                        ->findOrFail($sectionData['id']);

                    $section->update([

                        'title' => $sectionData['title'],

                        'resource_type' => $sectionData['resource_type'],

                        'sort_order' => $sectionIndex,

                        'status' => $sectionData['status'] ?? true

                    ]);

                } else {

                    $section = LessonResourceSection::create([

                        'lesson_id' => $lesson->id,

                        'title' => $sectionData['title'],

                        'resource_type' => $sectionData['resource_type'],

                        'sort_order' => $sectionIndex,

                        'status' => true

                    ]);
                }

                $existingSectionIds[] = $section->id;

                /**
                 * -------------------------
                 * Resources
                 * -------------------------
                 */

                $existingResourceIds = [];

                foreach ($sectionData['items'] as $itemIndex => $item) {

                    $filePath = null;

                    /**
                     * upload file
                     */

                    if (!empty($item['file'])) {

                        $filePath = $this->uploadFile(
                            $item['file'],
                            'lesson-resources'
                        );
                    }

                    /**
                     * Update
                     */

                    if (!empty($item['id'])) {

                        $resource = LessonResource::findOrFail($item['id']);

                        /**
                         * replace file
                         */

                        if ($filePath) {

                            if ($resource->file_path) {
                                $this->deleteFile($resource->file_path);
                            }

                        } else {

                            $filePath = $resource->file_path;

                        }

                        $resource->update([

                            'title' => $item['title'],

                            'description' => $item['description'] ?? null,

                            'url' => $item['url'] ?? null,

                            'file_path' => $filePath,

                            'quiz_id' => $item['quiz_id'] ?? null,

                            'duration' => $item['duration'] ?? null,

                            'sort_order' => $itemIndex,

                            'status' => $item['status'] ?? true

                        ]);

                    } else {

                        $resource = LessonResource::create([

                            'lesson_resource_section_id' => $section->id,

                            'title' => $item['title'],

                            'description' => $item['description'] ?? null,

                            'url' => $item['url'] ?? null,

                            'file_path' => $filePath,

                            'quiz_id' => $item['quiz_id'] ?? null,

                            'duration' => $item['duration'] ?? null,

                            'sort_order' => $itemIndex,

                            'status' => true

                        ]);

                    }

                    $existingResourceIds[] = $resource->id;
                }

                /**
                 * delete removed resources
                 */

                $deletedResources = LessonResource::where(
                    'lesson_resource_section_id',
                    $section->id
                )
                    ->whereNotIn('id', $existingResourceIds)
                    ->get();

                foreach ($deletedResources as $resource) {

                    if ($resource->file_path) {
                        $this->deleteFile($resource->file_path);
                    }

                    $resource->delete();
                }
            }

            /**
             * delete removed sections
             */

            $deletedSections = LessonResourceSection::where(
                'lesson_id',
                $lesson->id
            )
                ->whereNotIn('id', $existingSectionIds)
                ->get();

            foreach ($deletedSections as $section) {

                foreach ($section->resources as $resource) {

                    if ($resource->file_path) {
                        $this->deleteFile($resource->file_path);
                    }

                }

                $section->delete();
            }

        });

        return redirect()
            ->route('resources.index', [

                'role' => $role,

                'course' => $course,

                'module' => $module,

                'lesson' => $lesson

            ])
            ->with('success', 'Lesson resources updated successfully.');

    } catch (Throwable $e) {

        report($e);

        return back()
            ->withInput()
            ->with('error', $e->getMessage());

    }

}
public function destroy(
    string $role,
    Course $course,
    Module $module,
    Lesson $lesson,
    LessonResourceSection $resource
): RedirectResponse {

    try {

        DB::transaction(function () use ($resource) {

            foreach ($resource->resources as $item) {

                if ($item->file_path) {

                    $this->deleteFile($item->file_path);

                }

            }

            $resource->delete();

        });

        return back()->with(
            'success',
            'Resource section deleted successfully.'
        );

    } catch (Throwable $e) {

        report($e);

        return back()->with(
            'error',
            $e->getMessage()
        );

    }

}
}
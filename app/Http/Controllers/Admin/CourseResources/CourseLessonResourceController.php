<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseResources\StoreLessonResourceRequest;
use App\Http\Requests\CourseResources\UpdateLessonResourceSectionRequest;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\LessonResourceSection;
use App\Models\CourseResources\LessonResource;
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

    return view('backend.pages.CourseResources.Lessons.Resources.index',
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
    return view('backend.pages.CourseResources.Lessons.Resources.create',
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
    ->to(role_route('role.resources.index', [
        'role' => $role,
        'course' => $course,
        'module' => $module,
        'lesson' => $lesson,
    ]))
    ->with('success', 'Lesson resources created successfully.');

    } catch (Throwable $e) {

        report($e);

        return back()
            ->withInput()
            ->with('error',$e->getMessage());

    }
}


//----------------------------
/**
 * Show edit form for a SINGLE section
 */
public function edit(string $role,
    Course $course,
    Module $module,
    Lesson $lesson,
    LessonResourceSection $resource
){
    // Load section with its items
    $resource->load('resources');
    
    return view('backend.pages.CourseResources.Lessons.Resources.section-edit', compact(
        'role', 'course', 'module', 'lesson', 'resource'
    ));
}



public function updateSingle(
    UpdateLessonResourceSectionRequest $request,  
    string $role,
    Course $course,
    Module $module,
    Lesson $lesson,
    LessonResourceSection $resource
): RedirectResponse {
    
    $validated = $request->validated(); // Safe to use now

    try {
        DB::transaction(function () use ($validated, $request, $resource) {
            
            // Update section
            $resource->update([
                'title'         => $validated['title'],
                'resource_type' => $validated['resource_type'],
                'status'        => $validated['status'] ?? true,
            ]);

            $existingResourceIds = [];

            foreach ($validated['items'] as $itemIndex => $item) {
                
                $filePath = null;

                // Handle file upload
                if ($request->hasFile("items.{$itemIndex}.file")) {
                    $filePath = $this->uploadFile(
                        $request->file("items.{$itemIndex}.file"),
                        'lesson-resources'
                    );
                }

                if (!empty($item['id'])) {
                    // Update existing
                    $lessonResource = LessonResource::findOrFail($item['id']);
                    
                    if ($filePath && $lessonResource->file_path) {
                        $this->deleteFile($lessonResource->file_path);
                    } elseif (!$filePath) {
                        $filePath = $lessonResource->file_path;
                    }

                    $lessonResource->update([
                        'title'       => $item['title'],
                        'description' => $item['description'] ?? null,
                        'url'         => $item['url'] ?? null,
                        'file_path'   => $filePath,
                        'duration'    => $item['duration'] ?? null,
                        'quiz_id'     => $item['quiz_id'] ?? null,
                        'sort_order'  => $itemIndex,
                        'status'      => true,
                    ]);

                    $existingResourceIds[] = $lessonResource->id;

                } else {
                    // Create new
                    $newResource = LessonResource::create([
                        'lesson_resource_section_id' => $resource->id,
                        'title'       => $item['title'],
                        'description' => $item['description'] ?? null,
                        'url'         => $item['url'] ?? null,
                        'file_path'   => $filePath,
                        'duration'    => $item['duration'] ?? null,
                        'quiz_id'     => $item['quiz_id'] ?? null,
                        'sort_order'  => $itemIndex,
                        'status'      => true,
                    ]);

                    $existingResourceIds[] = $newResource->id;
                }
            }

            // Delete removed resources
            LessonResource::where('lesson_resource_section_id', $resource->id)
                ->whereNotIn('id', $existingResourceIds)
                ->get()
                ->each(function ($deleted) {
                    if ($deleted->file_path) {
                        $this->deleteFile($deleted->file_path);
                    }
                    $deleted->delete();
                });
        });

         return redirect()
    ->to(role_route('role.resources.index', [
        'course' => $course,
        'module' => $module,
        'lesson' => $lesson,
    ]))
    ->with('success', 'Section updated successfully.');

    } catch (Throwable $e) {
        report($e);
        return back()->withInput()->with('error', $e->getMessage());
    }
}
public function destroy(
    string $role,
    Course $course,
    Module $module,
    Lesson $lesson,
    LessonResourceSection $resource
) {
    DB::transaction(function () use ($resource) {
        $resource->load('resources');

        foreach ($resource->resources as $item) {
            if ($item->file_path) {
                $this->deleteFile($item->file_path);
            }

            $item->delete();
        }

        $resource->delete();
    });

    return redirect()
        ->to(role_route('role.resources.index', [
            'course' => $course,
            'module' => $module,
            'lesson' => $lesson,
        ]))
        ->with('success', 'Section deleted successfully.');
}
}

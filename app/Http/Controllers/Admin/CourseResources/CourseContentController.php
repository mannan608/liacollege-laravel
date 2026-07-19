<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseResources\StoreContentResourceRequest;
use App\Models\Course;
use App\Models\CourseContentCategory;
use App\Models\CourseResources\CourseSection;
use App\Models\CourseResources\CourseSectionRow;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Traits\HandlesFiles;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class CourseContentController extends Controller
{
    use HandlesFiles;
    public function index(Request $request, string $role, Course $course)
    {
        $coursecontentcategories = $course->coursecontentcategories()->latest()->paginate(20);

        return view('backend.pages.CourseResources.Contents.index', [
            'course' => $course,
            'items' => $coursecontentcategories,
            'title' => 'Course Resources',
        ]);
    }

    public function create(Request $request, string $role, Course $course)
    {
        $course->load('coursecontentcategories.sections.rows');

        return view('backend.pages.CourseResources.Contents.create', [
            'course' => $course,
            'category' => new CourseContentCategory(), 
            'title' => 'Course Resources',
        ]);
    }

    public function edit(Request $request,string $role,Course $course,CourseContentCategory $category) {
       $category->load('sections.rows');
        return view('backend.pages.CourseResources.Contents.create', [
            'course' => $course,
            'category' => $category,
            'title' => 'Edit Resource',
        ]);
    }

    public function store(StoreContentResourceRequest $request, string $role, Course $course): JsonResponse
    {

        try {
            DB::transaction(function () use ($request, $course) {

                $category = CourseContentCategory::updateOrCreate(

                    [
                        'id' => $request->category_id,
                    ],

                    [
                        'course_id' => $course->id,
                        'name'      => $request->name,
                    ]

                );

                $category->load('sections.rows');

                $oldFiles = $category->sections
                    ->flatMap(function ($section) {
                        return $section->rows ?? collect();
                    })
                    ->map(function ($row) {
                        return data_get($row, 'data.file');
                    })
                    ->filter()
                    ->values();

                $keptFiles = collect();

                $category->sections()->delete();

                foreach ($request->validated('sections', []) as $sectionData) {
                    $section = CourseSection::create([
                        'course_content_category_id' => $category->id,
                        'section_name' => $sectionData['section_name'],
                        'field_types' => $sectionData['field_types'],
                    ]);

                    foreach ($sectionData['rows'] ?? [] as $rowData) {
                        $rowPayload = [];

                        if (! empty($rowData['text'])) {
                            $rowPayload['text'] = $rowData['text'];
                        }
                        if (!empty($rowData['link'])) {
                            $rowPayload['link'] = trim($rowData['link']);
                        }

                        if (! empty($rowData['checkbox'])) {
                            $rowPayload['checkbox'] = $rowData['checkbox'];
                        }

                        if (! empty($rowData['radio'])) {
                            $rowPayload['radio'] = $rowData['radio'];
                        }

                        if (! empty($rowData['file'])) {
                            $rowPayload['file'] = $this->uploadFile(
                                $rowData['file'],
                                'courses/sections'
                            );
                        } elseif (! empty($rowData['existing_file'])) {
                            $rowPayload['file'] = $rowData['existing_file'];
                            $keptFiles->push($rowData['existing_file']);
                        }

                        if (empty($rowPayload)) {
                            continue;
                        }

                        CourseSectionRow::create([
                            'course_section_id' => $section->id,
                            'data' => $rowPayload,
                            'is_downloadable' => (bool) ($rowData['is_downloadable'] ?? false),
                            'is_document_submission' => (bool) ($rowData['is_document_submission'] ?? false),
                        ]);
                    }
                }

                $oldFiles
                    ->diff($keptFiles)
                    ->each(fn(string $path) => $this->deleteFile($path));
            });

            Cache::forget('navbar_courses');

            session()->flash('success', true);
            session()->flash('message', 'Course resources saved successfully.');

            return response()->json([
                'success' => true,
                'redirect' => role_route('role.course-contents.index', [
                    'course' => $course->id
                ]),
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(Request $request, string $role,Course $course,CourseContentCategory $category) {
        $category->delete();

        session()->flash('success', true);
        session()->flash('message', 'Resource deleted successfully.');

        return back()->with(
            'success',
            'Resource deleted successfully.'
        );
    }
}

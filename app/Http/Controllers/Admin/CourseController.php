<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\StoreResourceRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseSectionRow;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Traits\HandlesFiles;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CourseController extends Controller
{
    use HandlesFiles;

    public function __construct(
        private readonly CourseRepositoryInterface $courses
    ) {}

    public function index(Request $request): View
    {
        $request->user()->can('course.list') || abort(403);

        //   $mannan = Course::with([
        //     'sections.rows'
        // ])->get();

        // return $mannan;

        return view('backend.pages.courses.index', [
            'courses' => $this->courses->paginate(),
            'title' => 'Courses',
        ]);
    }

    public function create(Request $request): View
    {
        $request->user()->can('course.create') || abort(403);

        //   $courses = $this->courses->getAll();

        return view('backend.pages.courses.create', [
            'courses' => null,
            'title' => 'Create Course',
        ]);
    }

    public function store(StoreCourseRequest $request): RedirectResponse
    {
        $this->courses->create(
            $request->validated(),
            $request
        );
        Cache::forget('navbar_courses');

        return redirect()
            ->route('role.courses.index', [
                'role' => $request->route('role'),
            ])
            ->with('success', 'Course created successfully.');
    }

    public function show(Request $request, Course $course): View
    {
        $request->user()->can('course.view') || abort(403);

        return view('backend.pages.courses.show', [
            'course' => $course,
            'title' => 'Course Details',
        ]);
    }

    public function edit(Request $request, string $role, Course $course): View
    {
        $request->user()->can('course.edit') || abort(403);

        return view('backend.pages.courses.edit', [
            'course' => $course,
            'title' => 'Edit Course',
        ]);
    }

    public function update(UpdateCourseRequest $request, string $role, Course $course): RedirectResponse
    {
        $this->courses->update(
            $course,
            $request->validated(),
            $request
        );
        Cache::forget('navbar_courses');

        return redirect()
            ->route('role.courses.index', [
                'role' => $request->route('role'),
            ])
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Request $request, string $role, Course $course): RedirectResponse
    {
        $request->user()->can('course.delete') || abort(403);

        $this->courses->delete($course);
        Cache::forget('navbar_courses');

        return redirect()
            ->route('role.courses.index', [
                'role' => $role,
            ])
            ->with('success', 'Course deleted successfully.');
    }

    public function editResource(Request $request, string $role, Course $course): View
    {
        $request->user()->can('course.edit') || abort(403);

        $course->load('sections.rows');

        return view('backend.pages.courses.course_resources.create', [
            'course' => $course,
            'title' => 'Course Resources',
        ]);
    }

    public function createResource(StoreResourceRequest $request, string $role, Course $course): JsonResponse
    {
        try {
            DB::transaction(function () use ($request, $course) {
                $course->load('sections.rows');

                $oldFiles = $course->sections
                    ->flatMap(fn(CourseSection $section) => $section->rows)
                    ->map(fn(CourseSectionRow $row) => $row->data['file'] ?? null)
                    ->filter()
                    ->values();

                $keptFiles = collect();

                $course->sections()->delete();

                foreach ($request->validated('sections', []) as $sectionData) {
                    $section = CourseSection::create([
                        'course_id' => $course->id,
                        'section_name' => $sectionData['section_name'],
                        'field_types' => $sectionData['field_types'],
                    ]);

                    foreach ($sectionData['rows'] ?? [] as $rowData) {
                        $rowPayload = [];

                        if (! empty($rowData['text'])) {
                            $rowPayload['text'] = $rowData['text'];
                        }
                        if (!empty($rowData['link'])) {
                            $link = $rowData['link'];

                            if (!str_starts_with($link, 'http://') && !str_starts_with($link, 'https://')) {
                                $link = 'https://' . $link;
                            }

                            $rowPayload['link'] = $link;
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

            return response()->json([
                'success' => true,
                'message' => 'Course resources saved successfully.',
                'redirect' => role_route('role.courses.index'),
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}

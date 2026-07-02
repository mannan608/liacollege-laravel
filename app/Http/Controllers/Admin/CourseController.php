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
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CourseController extends Controller
{
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
                'role' => $request->route('role')
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
                'role' => $request->route('role')
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
                'role' => $role
            ])
            ->with('success', 'Course deleted successfully.');
    }

    public function editResource(Request $request): View
    {
         return view('backend.pages.courses.course_resources.create', [
            'courses' => $this->courses->paginate(),
            'title' => 'Courses',
        ]);
    }
   
    public function createResource(StoreResourceRequest $request, Course $course): RedirectResponse
    {

        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'resource_name' => 'required|string|max:255',
            'resource_file' => 'required|file|mimes:pdf,doc,docx|max:51200',
        ]);

        // Handle file upload
        if ($request->hasFile('resource_file')) {
            $filePath = $request->file('resource_file')->store('course_resources', 'public');
            $validatedData['resource_file'] = $filePath;
        }

        // Create the course resource
        CourseSectionRow::create($validatedData);

        return redirect()
            ->route('role.courses.index', [
                'role' => $request->route('role')
            ])
            ->with('success', 'Course resource added successfully.');
    }
}

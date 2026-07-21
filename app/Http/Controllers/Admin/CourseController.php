<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Document;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Traits\HandlesFiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    use HandlesFiles;

    public function __construct(
        private readonly CourseRepositoryInterface $courses
    ) {}

    public function index(Request $request)
    {
        $request->user()->can('course.list') || abort(403);

        // return $this->courses->paginate();

        return view('backend.pages.courses.index', [
            'courses' => $this->courses->paginate(),
            'title' => 'Courses',
        ]);
    }

    public function create(Request $request): View
    {
        $request->user()->can('course.create') || abort(403);    

        return view('backend.pages.courses.create', [
            'courses' => null,
            'title' => 'Create Course',
            'categories' => $this->getCategories(),
        ]);
    }

    public function store(StoreCourseRequest $request): RedirectResponse
    {
        $this->courses->create(
            $request->validated(),
            $request
        );

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
            'categories' => $this->getCategories(),
        ]);
    }

    public function edit(Request $request, string $role, Course $course): View
    {
        $request->user()->can('course.edit') || abort(403);

        return view('backend.pages.courses.edit', [
            'course' => $course,
            'title' => 'Edit Course',
            'categories' => $this->getCategories(),
        ]);
    }

    public function update(UpdateCourseRequest $request, string $role, Course $course): RedirectResponse
    {
        $this->courses->update(
            $course,
            $request->validated(),
            $request
        );

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

        return redirect()
            ->route('role.courses.index', [
                'role' => $role,
            ])
            ->with('success', 'Course deleted successfully.');
    }

private function getCategories(): array
{
    return CourseCategory::query()
        ->orderBy('name')
        ->pluck('name', 'id')
        ->toArray();
}


public function createDocument(
    Request $request,
    string $role,
    Course $course
) {
    $course->load('documents');

    return view('backend.pages.courses.course-metarial', [
        'course'    => $course,
        'documents' => $course->documents,
    ]);
}
 public function storeDocument(
        Request $request,
    string $role,
        Course $course
    ) {
        $request->validate([
            'name'=> 'required',
            'document' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png,doc,docx',
                'max:10240',
            ],

        ]);

        $file = $request->file('document');

        /*
        |--------------------------------------------------------------------------
        | Get file information BEFORE moving the file
        |--------------------------------------------------------------------------
        */

        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $size = $file->getSize();

        $path = $this->uploadFile(
            $file,
            'documents/courses/' . $course->id
        );

        $course->documents()->create([
            'name'      => $originalName,
            'file'       => $path,
            'extension' => $extension,
            'size'      => $size,
        ]);

        return back()->with(
            'success',
            'Course document uploaded successfully.'
        );
    }

    public function destroyDocument(Document $document)
{
    
    $this->deleteFile($document->file);
    $document->delete();

    return back()->with(
        'success',
        'Document deleted successfully.'
    );
}
 
}

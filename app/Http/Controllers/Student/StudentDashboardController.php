<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseResources\Module;
use App\Models\Document;
use App\Models\Student;
use App\Traits\HandlesFiles;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    use HandlesFiles;
    public function dashboard(Request $request)
    {
        $student = auth()->user()->student;

        $enrollments = $student->enrollments()->with(['slot', 'slot.course'])->latest()->get();

        // return $enrollments;

        return view('frontend.pages.student.dashboard', compact('enrollments'));
    }

    public function CourseDetails(Course $course)
    {
         $course->load([
            'modules.lessons',
        ]);
        //    return $course;

        return view('frontend.pages.student.courses.show', compact('course'));
    }

    public function CourseModule(Course $course,Module $module)
{
    return view(
        'frontend.pages.student.course-module.index',
        compact('course', 'module')
    );
}
public function studentDocument()
{
    $student = auth()->user()->student;

    $documents = $student->documents()
        ->latest()
        ->get();

    return view(
        'frontend.pages.student.certificates.my-document',
        compact('documents')
    );
}

 public function storeStudentDocument(Request $request)
{
    $request->validate([
        'document' => [
            'required',
            'file',
            'mimes:pdf,jpg,jpeg,png',
            'max:10240',
        ],
    ]);

    $student = auth()->user()->student;

    abort_unless($student, 404);

    $file = $request->file('document');

    // Get file information BEFORE moving the file
    $originalName = $file->getClientOriginalName();
    $extension = $file->getClientOriginalExtension();
    $size = $file->getSize();

    $path = $this->uploadFile(
        $file,
        'documents/students/' . $student->id
    );

    $student->documents()->create([
        'name'      => $originalName,
        'file'       => $path,
        'extension'  => $extension,
        'size'       => $size,
    ]);

    return back()->with(
        'success',
        'Document uploaded successfully.'
    );
}
public function destroyStudentDocument(Document $document)
{
    $student = auth()->user()->student;

    abort_unless($student, 404);
    abort_unless(
        $document->documentable_type === $student::class &&
        $document->documentable_id === $student->id,
        403
    );
    $this->deleteFile($document->file);
    $document->delete();

    return back()->with(
        'success',
        'Document deleted successfully.'
    );
}
}

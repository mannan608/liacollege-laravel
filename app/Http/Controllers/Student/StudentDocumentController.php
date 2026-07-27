<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseResources\Module;
use App\Models\Document;
use App\Models\Student;
use App\Traits\HandlesFiles;
use Illuminate\Http\Request;

class StudentDocumentController extends Controller
{
    use HandlesFiles;
   
public function studentDocument()
{
    $student = auth()->user()->student;

    $documents = $student->documents()
        ->latest()
        ->get();

    return view('student.documents.document',
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


public function show(Document $document)
{
    abort_unless(
        $document->documentable_id === auth()->user()->student->id,
        403
    );

    $file = public_path($document->file);

    abort_unless(file_exists($file), 404);

    return response()->file($file);
}



public function studentCertificate()
{
    $student = auth()->user()->student;

    $course = $student->enrollments()
        ->with(['slot.course'])
        ->latest()
        ->first();

    $certificate = $student->documents()
        ->where('document_type', 'certificate')
        ->latest()
        ->first();

        // return $course;

    return view('student.documents.certificate', compact('course', 'certificate'));
}

public function tasks()
{
    abort_unless(auth()->check(), 403);

   return view('student.tasks.index');
}

}

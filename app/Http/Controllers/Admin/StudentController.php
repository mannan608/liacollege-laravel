<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Document;
use App\Models\Student;
use App\Traits\HandlesFiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;



use App\Http\Requests\StudentStoreRequest;
use App\Models\Course;
use App\Models\LMS\Enrollment;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use App\Repositories\Interfaces\StudentRepositoryInterface;


class StudentController extends Controller
{
    use HandlesFiles;
    public function __construct(
        private readonly StudentRepositoryInterface $students,
    ) {}

    public function index(Request $request)
    {
        $enrollments = Enrollment::query()
            ->select([
                'id',
                'student_id',
                'course_slot_id',
            ])
            ->with([
                'student:id,user_id',
                'student.user:id,name,email',
                'slot:id,course_id,training_center_id,training_date,start_time,end_time',
                'slot.course:id,name',
                'slot.trainingCenter:id,name,city'
            ])
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->latest()
            ->paginate(20);
        // return $enrollments;

        return view(
            'backend.pages.students.index',
            compact('enrollments')
        );
    }

// public function create(Request $request): View
// {
//     abort_unless($request->user()->can('student.create'), 403);

//     $courses = Course::with('slots:id,course_id,name,start_date,end_date')
//         ->orderBy('name')
//         ->get();

//     return view('backend.pages.students.create', [
//         'student' => null,
//         'roles' => $this->roles(),
//         'courses' => $courses,
//         'title' => 'Create Student',
//     ]);
// }
public function create(Request $request): View
{
    abort_unless($request->user()->can('student.create'), 403);

    return view('backend.pages.students.create', [
        'student' => null,
        'roles' => $this->roles(),
        'courses' => Course::orderBy('name')->get(),
        'title' => 'Create Student',
    ]);
}
public function courseSlots(Course $course): \Illuminate\Http\JsonResponse
{
    return response()->json(
        $course->slots()
            ->select('id', 'name', 'start_date', 'end_date')
            ->orderBy('start_date')
            ->get()
    );
}

    public function store(StudentStoreRequest $request): RedirectResponse
    {
        $this->students->create($request->validated());

        return redirect()
            ->route('role.students.index', ['role' => $request->route('role')])
            ->with('success', 'Student created successfully.');
    }

    public function show(Request $request, string $role, Student $student): View
    {
        $request->user()->can('student.view') || abort(403);

        $student->load([
            'user.roles',
            'user.primaryRole',
            'courses',
        ]);

        return view('backend.pages.students.show', [
            'student' => $student,
            'title' => 'Student Details',
        ]);
    }

    public function edit(Request $request, string $role, Student $student): View
    {
        $request->user()->can('student.edit') || abort(403);

        $student->load([
            'user',
            'courses',
        ]);

        return view('backend.pages.students.edit', [
            'student' => $student,
            'courses' => Course::orderBy('name')->get(),
            'title' => 'Edit Student',
        ]);
    }

    public function update(StudentUpdateRequest $request, string $role, Student $student): RedirectResponse
    {
        $this->students->update($student->user, $request->validated());

        return redirect()
            ->route('role.students.index', ['role' => $role])
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Request $request, string $role, Student $student): RedirectResponse
    {
        $request->user()->can('student.delete') || abort(403);

        if ($student->user && $request->user()->is($student->user)) {
            abort(403, 'You cannot delete your own account.');
        }

        abort_unless($student->user, 404);

        $this->students->delete($student->user);

        return redirect()
            ->route('role.students.index', ['role' => $request->route('role')])
            ->with('success', 'Student deleted successfully.');
    }

    private function roles()
    {
        return Role::query()->orderBy('name')->get(['id', 'name']);
    }




    public function storeDocument(
        Request $request,
        string $role,
        Student $student
    ): RedirectResponse {
        $request->user()->can('student.edit') || abort(403);

        $request->validate([
            'document_type' => [
                'required',
                'string',
                'in:' . implode(',', Document::getTypes()),
            ],
            'documents' => [
                'required',
                'array',
                'min:1',
            ],
            'documents.*' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:10240',
            ],
            'notes' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        $uploadedCount = 0;

        foreach ($request->file('documents') as $file) {
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $size = $file->getSize();

            $path = $this->uploadFile(
                $file,
                'documents/students/' . $student->id
            );

            $student->documents()->create([
                'name'          => $originalName,
                'file'          => $path,
                'extension'     => $extension,
                'size'          => $size,
                'document_type' => $request->document_type,
                'notes'         => $request->notes,
                'uploaded_by'   => $request->user()->id,
            ]);

            $uploadedCount++;
        }

        return back()->with(
            'success',
            "{$uploadedCount} document(s) uploaded successfully."
        );
    }

    public function downloadDocument(
        Request $request,
        string $role,
        Student $student,
        Document $document
    ): \Symfony\Component\HttpFoundation\BinaryFileResponse {
        abort_unless($request->user()->can('student.view'), 403);

        // Ensure the document belongs to the student
        abort_unless(
            $document->documentable_type === Student::class &&
                $document->documentable_id === $student->id,
            404
        );

        $filePath = public_path($document->file);

        abort_unless(
            file_exists($filePath),
            404,
            'File not found.'
        );

        $downloadName = $document->name;

        if (!empty($document->extension)) {
            $downloadName .= '.' . ltrim($document->extension, '.');
        }

        return response()->download(
            $filePath,
            $downloadName,
            [
                'Content-Type' => mime_content_type($filePath),
            ]
        );
    }

    public function destroyDocument(
        Request $request,
        string $role,
        Student $student,
        Document $document
    ): RedirectResponse {
        $request->user()->can('student.edit') || abort(403);

        abort_unless(
            $document->documentable_type === Student::class &&
                (int) $document->documentable_id === (int) $student->id,
            404
        );

        $this->deleteFile($document->file);
        $document->delete();

        return back()->with(
            'success',
            'Document deleted successfully.'
        );
    }

    public function replaceDocument(
        Request $request,
        string $role,
        Student $student,
        Document $document
    ): RedirectResponse {
        $request->user()->can('student.edit') || abort(403);

        abort_unless(
            $document->documentable_type === Student::class &&
                (int) $document->documentable_id === (int) $student->id,
            404
        );

        $request->validate([
            'document' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:10240',
            ],
            'document_type' => [
                'nullable',
                'string',
                'in:' . implode(',', Document::getTypes()),
            ],
            'notes' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        $file = $request->file('document');

        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $size = $file->getSize();

        $path = $this->replaceFile(
            $file,
            $document->file,
            'documents/students/' . $student->id
        );

        $document->update([
            'name'          => $originalName,
            'file'          => $path,
            'extension'     => $extension,
            'size'          => $size,
            'document_type' => $request->filled('document_type') ? $request->document_type : $document->document_type,
            'notes'         => $request->filled('notes') ? $request->notes : $document->notes,
            'uploaded_by'   => $request->user()->id,
        ]);

        return back()->with(
            'success',
            'Document replaced successfully.'
        );
    }
}

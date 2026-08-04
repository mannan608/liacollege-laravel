<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Document;
use App\Models\LMS\Enrollment;
use App\Models\LMS\CourseSlot;
use App\Models\Student;
use App\Traits\HandlesFiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StudentStoreRequest;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use App\Models\Course;
use Illuminate\View\View;
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
                'status',
                'remarks',
                'approved_by',
                'approved_at',
                'enrolled_at',
            ])
            ->with([
                'student:id,user_id',
                'student.user:id,name,email',
                'slot:id,course_id,training_center_id,title,training_date,start_time,end_time',
                'slot.course:id,name',
                'slot.trainingCenter:id,name,city',
                'approvedBy:id,name',
            ])
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->latest()
            ->paginate(20);

        // return $enrollments;

        return view('backend.pages.students.index',compact('enrollments')
        );
    }


    public function create(Request $request): View
    {
        abort_unless($request->user()->can('student.create'), 403);

        return view('backend.pages.students.create', [
            'student' => null,
            'courses' => Course::orderBy('name')->get(),
            'courseSlotsByCourse' => $this->courseSlotsByCourse(),
            'selectedCourseId' => old('course_id'),
            'selectedSlotId' => old('slot_id'),
            'title' => 'Create Student Checkout',
        ]);
    }
    public function courseSlots(Course $course): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            $course->slots()
                ->select('id', 'title', 'training_date', 'start_time', 'end_time')
                ->orderBy('training_date')
                ->get()
        );
    }

    public function store(StudentStoreRequest $request): RedirectResponse
    {
        $this->students->create($request->validated());

        return redirect()
            ->route('role.students.index', ['role' => $request->route('role')])
            ->with('success', 'Student checkout completed successfully.');
    }

    public function show(Request $request, string $role, Student $student): View
    {
        $request->user()->can('student.view') || abort(403);

        $student->load([
            'user.roles',
            'user.primaryRole',
            'courses',
            'enrollments.slot.course',
            'enrollments.slot.trainingCenter',
            'enrollments.approvedBy',
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
            'enrollments.slot.course',
            'enrollments.latestPayment',
        ]);

        $currentEnrollment = $student->enrollments->sortByDesc('created_at')->first();

        return view('backend.pages.students.edit', [
            'student' => $student,
            'courses' => Course::orderBy('name')->get(),
            'courseSlotsByCourse' => $this->courseSlotsByCourse(),
            'selectedCourseId' => old('course_id', $currentEnrollment?->slot?->course_id),
            'selectedSlotId' => old('slot_id', $currentEnrollment?->course_slot_id),
            'selectedPaymentMethod' => old('payment_method', $currentEnrollment?->latestPayment?->payment_method),
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

    private function courseSlotsByCourse(): array
    {
        return CourseSlot::query()
            ->select(['id', 'course_id', 'title', 'training_date', 'start_time', 'end_time'])
            ->where('status', 'active')
            ->orderBy('training_date')
            ->get()
            ->groupBy('course_id')
            ->map(fn($slots) => $slots->values()->all())
            ->toArray();
    }


    public function createDocument(Request $request, string $role, Student $student)
    {
        $request->user()->can('student.view') || abort(403);

        $student->loadMissing([
            'user',
            'documents.uploadedBy',
        ]);

        $documents = $student->documents()
            ->with('uploadedBy')
            ->latest()
            ->get();

// return $documents;

        return view('backend.pages.students.student-documents', [
            'student' => $student,
            'documents' => $documents,
            'groupedDocuments' => $documents->groupBy('document_type'),
            'documentTypes' => Document::getTypes(),
            'title' => 'Student Documents',
        ]);
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
            'document' => [
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

        $file = $request->file('document');
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

        return back()->with(
            'success',
            'Document uploaded successfully.'
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

    public function assignments(string $role, Student $student): View
    {
        $submissions = AssignmentSubmission::query()
            ->with([
                'assignment.course',
                'student.user',
            ])
            ->where('student_id', $student->id)
            ->latest('submitted_at')
            ->paginate(20);

            // return  $submissions;

        return view('backend.pages.students.assignments', compact('submissions', 'student'));
    }


    public function showAssignment( string $role,
        Student $student,
        AssignmentSubmission $submission
    ) {
        abort_unless(
            $submission->student_id === $student->id,
            404
        );

        $submission->load([
            'assignment.course',
            'student.user',
        ]);

        return view('backend.pages.students.show-assignment',compact(
                'student',
                'submission'
            )
        );
    }

    /**
     * Grade submission.
     */
    public function grade(
      string $role,
        Student $student,
        AssignmentSubmission $submission,
        Request $request
    ) {
        abort_unless(
            $submission->student_id === $student->id,
            404
        );

        $assignment = $submission->assignment;

        $validated = $request->validate([
            'marks' => [
                'required',
                'numeric',
                'min:0',
                'max:' . $assignment->total_marks,
            ],

            'feedback' => [
                'nullable',
                'string',
                'max:5000',
            ],
        ]);

        $submission->update([
            'marks' => $validated['marks'],
            'feedback' => $validated['feedback'] ?? null,
            'status' => 'graded',
        ]);

        return redirect()
            ->route(
                'role.students.assignments.show',
                [
                    'student' => $student,
                    'submission' => $submission,
                    'role' => $role
                ]
            )
            ->with(
                'success',
                'Assignment graded successfully.'
            );
    }

    /**
     * Download student's submitted file.
     */
    

   
}

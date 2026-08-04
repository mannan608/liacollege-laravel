<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use App\Models\Course;
use App\Services\CoursePermissionService;
use App\Traits\HandlesFiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AssignmentController extends Controller
{
     use HandlesFiles;
       public function __construct(
        private readonly CoursePermissionService $coursePermissionService,
    ) {}
    /**
     * Display all assignments with their course.
     */
public function index()
{
    $student = auth()->user()->student;

    $courseIds = $student->enrollments()
        ->with('slot')
        ->get()
        ->pluck('slot.course_id')
        ->filter()
        ->unique()
        ->values();

    $assignments = Assignment::query()
        ->whereIn('course_id', $courseIds)
        ->where('status', 'active')
        ->with('course')
        ->with([
            'submissions' => function ($query) use ($student) {
                $query->where('student_id', $student->id);
            }
        ])
        ->latest()
        ->get();

    // Filter by permission
    $assignments = $this->coursePermissionService
        ->filterAssignmentsForStudent($assignments, $student);

    return view('student.tasks.index', compact('assignments'));
}

public function show(Assignment $assignment): View
    {
        $student = auth()->user()->student;

        $this->ensureStudentCanAccessAssignment(
            $student,
            $assignment
        );

        $assignment->load([
            'course',
            'submissions' => function ($query) use ($student) {
                $query->where('student_id', $student->id);
            },
        ]);

        $submission = $assignment->submissions->first();

        return view(
            'student.tasks.show',
            compact(
                'assignment',
                'submission'
            )
        );
    }

    /**
     * Show submission form.
     */
    public function submit(Assignment $assignment): View
    {
        $student = auth()->user()->student;

        $this->ensureStudentCanAccessAssignment(
            $student,
            $assignment
        );

        $assignment->load('course');

        $submission = AssignmentSubmission::query()
            ->where('assignment_id', $assignment->id)
            ->where('student_id', $student->id)
            ->first();

        return view(
            'student.tasks.submit',
            compact(
                'assignment',
                'submission'
            )
        );
    }

    /**
     * Store or update assignment submission.
     */
    public function store(
        Request $request,
        Assignment $assignment
    ): RedirectResponse {
        $student = auth()->user()->student;

        $this->ensureStudentCanAccessAssignment(
            $student,
            $assignment
        );

        // Do not allow submission after deadline.
        if (
            $assignment->due_date &&
            now()->greaterThan($assignment->due_date)
        ) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'The submission deadline has passed.'
                );
        }

        $validated = $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip',
                'max:20480',
            ],

            'comment' => [
                'nullable',
                'string',
                'max:5000',
            ],
        ]);

       $submission = AssignmentSubmission::query()
    ->where('assignment_id', $assignment->id)
    ->where('student_id', $student->id)
    ->first();

$file = $this->replaceFile(
    $request->file('file'),
    $submission?->file,
    'assignment-submissions'
);

if ($submission) {

    $submission->update([
        'file' => $file,
        'comment' => $validated['comment'] ?? null,
        'submitted_at' => now(),
        'status' => 'submitted',
        'marks' => null,
        'feedback' => null,
    ]);

} else {

    AssignmentSubmission::create([
        'assignment_id' => $assignment->id,
        'student_id' => $student->id,
        'file' => $file,
        'comment' => $validated['comment'] ?? null,
        'submitted_at' => now(),
        'status' => 'submitted',
    ]);

}

        return redirect()
            ->route(
                'student.tasks.show',
                $assignment
            )
            ->with(
                'success',
                'Assignment submitted successfully.'
            );
    }

    /**
     * Make sure the student is enrolled in
     * the assignment's course.
     */
    private function ensureStudentCanAccessAssignment(
        $student,
        Assignment $assignment
    ): void {
        $isEnrolled = $student->enrollments()
            ->whereHas('slot', function ($query) use ($assignment) {
                $query->where(
                    'course_id',
                    $assignment->course_id
                );
            })
            ->exists();

        abort_unless($isEnrolled, 403);

        abort_unless(
            $assignment->status === 'active',
            404
        );
    }

   

}
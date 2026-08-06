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
public function index(Course $course): View
{
    $student = auth()->user()->student;

    // Check student is enrolled in this course
    $isEnrolled = $student->enrollments()
        ->whereHas('slot', function ($query) use ($course) {
            $query->where('course_id', $course->id);
        })
        ->exists();

    abort_unless($isEnrolled, 403);

    $assignments = Assignment::query()
        ->where('course_id', $course->id)
        ->where('status', 'active')
        ->with([
            'course',
            'submissions' => function ($query) use ($student) {
                $query->where('student_id', $student->id);
            },
        ])
        ->latest()
        ->get();

    return view('student.tasks.index', compact('course', 'assignments'));
}

public function show(Course $course, Assignment $assignment): View
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
                'course',
                'submission'
            )
        );
    }

    /**
     * Show submission form.
     */
    public function submit(Course $course, Assignment $assignment): View
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

        return view('student.tasks.submit',compact(
                'assignment',
                'course',
                'submission'
            )
        );
    }

    /**
     * Store or update assignment submission.
     */
    public function store(
        Request $request,
        Course $course,
        Assignment $assignment
    ): RedirectResponse {
        $student = auth()->user()->student;
        abort_if($assignment->course_id !== $course->id, 404);

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
                [
                    'course' => $course,
                    'assignment' => $assignment,
                ]
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
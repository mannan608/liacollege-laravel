<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use App\Models\Course;
use App\Traits\HandlesFiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AssignmentController extends Controller
{
    use HandlesFiles;
    /**
     * Display all assignments with their course.
     */
    public function index(string $role): View
    {
        $assignments = Assignment::query()
            ->with('course')
            ->withCount('submissions')
            ->latest()
            ->paginate(15);

        return view('backend.pages.assignments.index', compact('assignments'));
    }

    /**
     * Show create assignment form.
     */
    public function create(string $role): View
    {
        $courses = Course::query()
            ->orderBy('name')
            ->get();

        return view('backend.pages.assignments.create', compact('courses'));
    }

    /**
     * Store a new assignment.
     */
    public function store(
        Request $request,
        string $role
    ): RedirectResponse {
        $validated = $request->validate([
            'course_id' => [
                'required',
                'exists:courses,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'instructions' => [
                'nullable',
                'string',
            ],

            'due_date' => [
                'nullable',
                'date',
            ],

            'total_marks' => [
                'required',
                'integer',
                'min:1',
                'max:100000',
            ],

            'attachment' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx',
                'max:20480',
            ],

            'status' => [
                'required',
                'in:active,inactive',
            ],
        ]);

       if ($request->hasFile('attachment')) {
    $validated['attachment'] = $this->uploadFile(
        $request->file('attachment'),
        'assignments'
    );
}

        $validated['created_by'] = auth()->id();

        $assignment = Assignment::create($validated);
        return redirect()
            ->to(role_route('role.assignments.index'))
            ->with('success', 'Assignment created successfully.');
    }

    /**
     * Display assignment details.
     */
    public function show(
        string $role,
        Course $course,
        Assignment $assignment
    ): View {
        $this->ensureAssignmentBelongsToCourse(
            $course,
            $assignment
        );

        $assignment->load([
            'creator',
            'submissions.student.user',
        ]);

        return view(
            'backend.pages.assignments.show',
            compact('course', 'assignment')
        );
    }

    /**
     * Show edit form.
     */
    public function edit(
        string $role,
        Assignment $assignment
    ): View {
       

        return view(
            'backend.pages.assignments.edit',
            compact('assignment')
        );
    }

    /**
     * Update assignment.
     */
    public function update(
        Request $request,
        string $role,
        Course $course,
        Assignment $assignment
    ): RedirectResponse {
        $this->ensureAssignmentBelongsToCourse(
            $course,
            $assignment
        );

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'instructions' => [
                'nullable',
                'string',
            ],

            'due_date' => [
                'nullable',
                'date',
            ],

            'total_marks' => [
                'required',
                'integer',
                'min:1',
                'max:100000',
            ],

            'attachment' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx',
                'max:20480',
            ],

            'status' => [
                'required',
                'in:active,inactive',
            ],
        ]);

        $validated['attachment'] = $this->replaceFile(
    $request->file('attachment'),
    $assignment->attachment,
    'assignments'
);

        $assignment->update($validated);

        return redirect()
            ->to(role_route('role.assignments.index'))
            ->with('success', 'Assignment updated successfully.');
    }

    /**
     * Delete assignment.
     */
    public function destroy(
        string $role,
        Course $course,
        Assignment $assignment
    ): RedirectResponse {
        $this->ensureAssignmentBelongsToCourse(
            $course,
            $assignment
        );

        $this->deleteFile($assignment->attachment);

        foreach ($assignment->submissions as $submission) {
    $this->deleteFile($submission->file);
}

        $assignment->delete();

        return redirect()
            ->to(role_route('role.assignments.index'))
            ->with('success', 'Assignment deleted successfully.');
    }

    /**
     * Make sure the assignment belongs to this course.
     */
    private function ensureAssignmentBelongsToCourse(
        Course $course,
        Assignment $assignment
    ): void {
        abort_unless(
            $assignment->course_id === $course->id,
            404
        );
    }  
    
    
}

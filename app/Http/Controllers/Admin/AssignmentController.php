<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AssignmentController extends Controller
{
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
            $validated['attachment'] = $request
                ->file('attachment')
                ->store('assignments', 'public');
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
        Course $course,
        Assignment $assignment
    ): View {
        $this->ensureAssignmentBelongsToCourse(
            $course,
            $assignment
        );

        return view(
            'backend.pages.assignments.edit',
            compact('course', 'assignment')
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

        if ($request->hasFile('attachment')) {

            if (
                $assignment->attachment &&
                Storage::disk('public')->exists(
                    $assignment->attachment
                )
            ) {
                Storage::disk('public')->delete(
                    $assignment->attachment
                );
            }

            $validated['attachment'] = $request
                ->file('attachment')
                ->store('assignments', 'public');
        }

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

        if (
            $assignment->attachment &&
            Storage::disk('public')->exists(
                $assignment->attachment
            )
        ) {
            Storage::disk('public')->delete(
                $assignment->attachment
            );
        }

        foreach ($assignment->submissions as $submission) {
            if (
                $submission->file &&
                Storage::disk('public')->exists(
                    $submission->file
                )
            ) {
                Storage::disk('public')->delete(
                    $submission->file
                );
            }
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

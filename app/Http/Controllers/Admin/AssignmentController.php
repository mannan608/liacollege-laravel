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

    public function index(Request $request, string $role): View
    {
        $assignments = Assignment::query()
            ->with('course')
            ->visibleTo($request->user())
            ->withCount('submissions')
            ->latest()
            ->paginate(15);

        return view('backend.pages.assignments.index', compact('assignments'));
    }

    public function create(string $role): View
    {
        $courses = Course::query()
            ->orderBy('name')
            ->get();

        return view('backend.pages.assignments.create', compact('courses'));
    }

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
                'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip',
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

        Assignment::create($validated);

        return redirect()
            ->to(role_route('role.assignments.index'))
            ->with('success', 'Assignment created successfully.');
    }

    public function edit(
        string $role,
        Assignment $assignment
    ): View {
        $courses = Course::query()
            ->orderBy('name')
            ->get();

        return view(
            'backend.pages.assignments.edit',
            compact('assignment', 'courses')
        );
    }

    public function update(
        Request $request,
        string $role,
        Assignment $assignment
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
                'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip',
                'max:20480',
            ],

            'status' => [
                'required',
                'in:active,inactive',
            ],
        ]);

        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $this->replaceFile(
                $request->file('attachment'),
                $assignment->attachment,
                'assignments'
            );
        }

        $assignment->update($validated);

        return redirect()
            ->to(role_route('role.assignments.index'))
            ->with('success', 'Assignment updated successfully.');
    }

    public function destroy(
        string $role,
        Assignment $assignment
    ): RedirectResponse {
        $this->deleteFile($assignment->attachment);

        foreach ($assignment->submissions as $submission) {
            $this->deleteFile($submission->file);
        }

        $assignment->delete();

        return redirect()
            ->to(role_route('role.assignments.index'))
            ->with('success', 'Assignment deleted successfully.');
    }
}

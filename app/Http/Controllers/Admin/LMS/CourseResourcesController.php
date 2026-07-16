<?php

namespace App\Http\Controllers\Admin\LMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\LMS\StoreLessonResourceRequest;
use App\Models\Course;
use App\Models\LMS\Lesson;
use App\Models\LMS\LessonResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseResourcesController extends Controller
{
    public function index(Request $request, string $role, Course $course): View
    {
        $request->user()->can('modules.edit') || abort(403);

        $resources = LessonResource::query()
            ->whereHas('lesson.module', fn ($q) => $q->where('course_id', $course->id))
            ->with(['lesson.module', 'lesson'])
            ->orderBy('lesson_id')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(20);

        return view('backend.pages.LMS.resources.index', [
            'course' => $course,
            'resources' => $resources,
        ]);
    }

    public function create(Request $request, string $role, Course $course): View
    {
        $request->user()->can('modules.create') || abort(403);

        $lessons = Lesson::query()
            ->whereHas('module', fn ($q) => $q->where('course_id', $course->id))
            ->with('module')
            ->orderBy('id')
            ->get();

        return view('backend.pages.LMS.resources.create', [
            'course' => $course,
            'lessons' => $lessons,
            'resource' => null,
            'resourceTypes' => LessonResource::RESOURCE_TYPES,
            'formAction' => role_route('role.resources.store', ['course' => $course->id]),
            'formMethod' => 'POST',
            'pageTitle' => 'Add Lesson Resource',
            'submitLabel' => 'Save Resource',
        ]);
    }

    public function store(StoreLessonResourceRequest $request, string $role, Course $course): RedirectResponse
    {
        $validated = $request->validated();

        $data = [
            'lesson_id' => $validated['lesson_id'],
            'title' => trim($validated['title']),
            'resource_type' => $validated['resource_type'],
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('lesson-resources', 'public');
        }

        LessonResource::create($data);

        return redirect(role_route('role.resources.index', ['course' => $course->id]))
            ->with('success', 'Lesson resource saved successfully.');
    }

    public function edit(Request $request, string $role, Course $course, LessonResource $resource): View
    {
        $request->user()->can('modules.edit') || abort(403);

        $this->ensureBelongsToCourse($course, $resource);

        $lessons = Lesson::query()
            ->whereHas('module', fn ($q) => $q->where('course_id', $course->id))
            ->with('module')
            ->orderBy('id')
            ->get();

        return view('backend.pages.LMS.resources.create', [
            'course' => $course,
            'lessons' => $lessons,
            'resource' => $resource,
            'resourceTypes' => LessonResource::RESOURCE_TYPES,
            'formAction' => role_route('role.resources.update', ['course' => $course->id, 'resource' => $resource->id]),
            'formMethod' => 'PUT',
            'pageTitle' => 'Edit Lesson Resource',
            'submitLabel' => 'Update Resource',
        ]);
    }

    public function update(StoreLessonResourceRequest $request, string $role, Course $course, LessonResource $resource): RedirectResponse
    {
        $request->user()->can('modules.edit') || abort(403);

        $this->ensureBelongsToCourse($course, $resource);

        $validated = $request->validated();

        $data = [
            'lesson_id' => $validated['lesson_id'],
            'title' => trim($validated['title']),
            'resource_type' => $validated['resource_type'],
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        if ($request->hasFile('file')) {
            if ($resource->file_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($resource->file_path);
            }
            $data['file_path'] = $request->file('file')->store('lesson-resources', 'public');
        }

        $resource->update($data);

        return redirect(role_route('role.resources.index', ['course' => $course->id]))
            ->with('success', 'Lesson resource updated successfully.');
    }

    public function destroy(Request $request, string $role, Course $course, LessonResource $resource): RedirectResponse
    {
        $request->user()->can('modules.edit') || abort(403);

        $this->ensureBelongsToCourse($course, $resource);

        if ($resource->file_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($resource->file_path);
        }

        $resource->delete();

        return redirect(role_route('role.resources.index', ['course' => $course->id]))
            ->with('success', 'Lesson resource deleted successfully.');
    }

    private function ensureBelongsToCourse(Course $course, LessonResource $resource): void
    {
        if ($resource->lesson?->module?->course_id !== $course->id) {
            abort(404);
        }
    }
}

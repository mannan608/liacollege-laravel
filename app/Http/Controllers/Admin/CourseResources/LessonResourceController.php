<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseResources\StoreLessonResourceRequest;
use App\Http\Requests\CourseResources\UpdateLessonResourceRequest;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\LessonResource;
use App\Models\CourseResources\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class LessonResourceController extends Controller
{
    public function index(Request $request, string $role, Course $course, Module $module, Lesson $lesson): View
    {
        $request->user()->can('course.edit') || abort(403);

        $lesson = $this->ensureLessonBelongsToCourse($course, $module, $lesson);
        $lesson->load(['module', 'resources' => fn ($query) => $query->orderBy('sort_order')->orderBy('id')]);

        return view('backend.pages.CourseResources.LessonResources.index', [
            'course' => $course,
            'module' => $module,
            'lesson' => $lesson,
            'resources' => $lesson->resources,
        ]);
    }

    public function create(Request $request, string $role, Course $course, Module $module, Lesson $lesson): View
    {
        $request->user()->can('course.edit') || abort(403);

        $lesson = $this->ensureLessonBelongsToCourse($course, $module, $lesson);
        $lesson->loadMissing('module');

        return view('backend.pages.CourseResources.LessonResources.create', [
            'course' => $course,
            'module' => $module,
            'lesson' => $lesson,
            'lessons' => collect([$lesson]),
            'resourceBundle' => $this->emptyBundle(),
            'formAction' => role_route('role.resources.store', [
                'course' => $course->id,
                'module' => $module->id,
                'lesson' => $lesson->id,
            ]),
            'formMethod' => 'POST',
            'pageTitle' => 'Create Lesson Resources',
            'submitLabel' => 'Save Resources',
        ]);
    }

    public function store(StoreLessonResourceRequest $request, string $role, Course $course, Module $module, Lesson $lesson): RedirectResponse
    {
        $validated = $request->validated();
        $lesson = $this->ensureLessonBelongsToCourse($course, $module, $lesson);
        abort_if((int) $validated['lesson_id'] !== (int) $lesson->id, 422, 'The selected lesson does not match the current page.');

        $pathsToDelete = [];

        DB::transaction(function () use ($lesson, $validated, &$pathsToDelete): void {
            $pathsToDelete = $this->replaceLessonResources($lesson, $validated);
        });

        if ($pathsToDelete !== []) {
            Storage::disk('public')->delete($pathsToDelete);
        }

        return redirect()
            ->to(role_route('role.resources.index', [
                'course' => $course->id,
                'module' => $module->id,
                'lesson' => $lesson->id,
            ]))
            ->with('success', 'Lesson resources created successfully.');
    }

    public function edit(Request $request, string $role, Course $course, Module $module, Lesson $lesson, LessonResource $resource): View
    {
        $request->user()->can('course.edit') || abort(403);

        $lesson = $this->ensureLessonBelongsToCourse($course, $module, $lesson);
        $lesson->load(['module', 'resources' => fn ($query) => $query->orderBy('sort_order')->orderBy('id')]);

        return view('backend.pages.CourseResources.LessonResources.create', [
            'course' => $course,
            'module' => $module,
            'lesson' => $lesson,
            'resource' => $resource,
            'lessons' => collect([$lesson]),
            'resourceBundle' => $this->bundleFromLesson($lesson),
            'formAction' => role_route('role.resources.update', [
                'course' => $course->id,
                'module' => $module->id,
                'lesson' => $lesson->id,
                'resource' => $resource->id,
            ]),
            'formMethod' => 'PUT',
            'pageTitle' => 'Edit Lesson Resources',
            'submitLabel' => 'Update Resources',
        ]);
    }

    public function update(UpdateLessonResourceRequest $request, string $role, Course $course, Module $module, Lesson $lesson, LessonResource $resource): RedirectResponse
    {
        $validated = $request->validated();
        $lesson = $this->ensureLessonBelongsToCourse($course, $module, $lesson);

        abort_if((int) $validated['lesson_id'] !== (int) $lesson->id, 422, 'The selected lesson cannot be changed during update.');

        $pathsToDelete = [];

        DB::transaction(function () use ($lesson, $validated, &$pathsToDelete): void {
            $pathsToDelete = $this->replaceLessonResources($lesson, $validated);
        });

        if ($pathsToDelete !== []) {
            Storage::disk('public')->delete($pathsToDelete);
        }

        return redirect()
            ->to(role_route('role.resources.index', [
                'course' => $course->id,
                'module' => $module->id,
                'lesson' => $lesson->id,
            ]))
            ->with('success', 'Lesson resources updated successfully.');
    }

    public function destroy(Request $request, string $role, Course $course, Module $module, Lesson $lesson, LessonResource $resource): RedirectResponse
    {
        $request->user()->can('course.edit') || abort(403);

        $lesson = $this->ensureLessonBelongsToCourse($course, $module, $lesson);
        abort_if((int) $resource->lesson_id !== (int) $lesson->id, 404);

        $pathToDelete = $resource->file_path;

        DB::transaction(function () use ($resource): void {
            $resource->delete();
        });

        if ($pathToDelete) {
            Storage::disk('public')->delete($pathToDelete);
        }

        return redirect()
            ->to(role_route('role.resources.index', [
                'course' => $course->id,
                'module' => $module->id,
                'lesson' => $lesson->id,
            ]))
            ->with('success', 'Lesson resources deleted successfully.');
    }

    private function courseLessons(Course $course)
    {
        return Lesson::query()
            ->whereHas('module', fn ($query) => $query->where('course_id', $course->id))
            ->with([
                'module',
                'resources' => fn ($query) => $query->orderBy('sort_order')->orderBy('id'),
            ])
            ->orderBy('id')
            ->get();
    }

    private function ensureLessonBelongsToCourse(Course $course, Module $module, Lesson $lesson): Lesson
    {
        abort_if((int) $module->course_id !== (int) $course->id, 404);
        $lesson->loadMissing('module');

        abort_if((int) ($lesson->module?->id ?? $lesson->module_id) !== (int) $module->id, 404);

        return $lesson;
    }

    private function emptyBundle(): array
    {
        return [
            'videos' => [],
            'contents' => [],
            'files' => [],
            'quizzes' => [],
        ];
    }

    private function bundleFromLesson(Lesson $lesson): array
    {
        $resources = $lesson->resources ?? collect();

        return [
            'videos' => $resources
                ->where('resource_type', 'video')
                ->map(fn (LessonResource $resource) => [
                    'title' => $resource->title,
                    'url' => $resource->url,
                ])
                ->values()
                ->all(),
            'contents' => $resources
                ->where('resource_type', 'content')
                ->map(fn (LessonResource $resource) => [
                    'title' => $resource->title,
                    'content' => $resource->description,
                ])
                ->values()
                ->all(),
            'files' => $resources
                ->where('resource_type', 'file')
                ->map(fn (LessonResource $resource) => [
                    'title' => $resource->title,
                    'existing_file_path' => $resource->file_path,
                    'existing_file_name' => $resource->file_path ? basename($resource->file_path) : null,
                    'existing_file_url' => $resource->file_url,
                ])
                ->values()
                ->all(),
            'quizzes' => $resources
                ->where('resource_type', 'quiz')
                ->map(fn (LessonResource $resource) => [
                    'quiz_id' => (int) $resource->url,
                ])
                ->values()
                ->all(),
        ];
    }

    private function replaceLessonResources(Lesson $lesson, array $validated): array
    {
        $existingFilePaths = $lesson->resources()
            ->whereNotNull('file_path')
            ->pluck('file_path')
            ->filter()
            ->unique()
            ->values()
            ->all();

        $rows = [];
        $newFilePaths = [];
        $sortOrder = 1;

        foreach ($validated['videos'] ?? [] as $video) {
            $rows[] = [
                'lesson_id' => $lesson->id,
                'title' => trim((string) ($video['title'] ?? '')),
                'resource_type' => 'video',
                'description' => null,
                'url' => trim((string) ($video['url'] ?? '')),
                'file_path' => null,
                'sort_order' => $sortOrder++,
                'status' => true,
            ];
        }

        foreach ($validated['contents'] ?? [] as $content) {
            $rows[] = [
                'lesson_id' => $lesson->id,
                'title' => trim((string) ($content['title'] ?? '')),
                'resource_type' => 'content',
                'description' => $content['content'] ?? null,
                'url' => null,
                'file_path' => null,
                'sort_order' => $sortOrder++,
                'status' => true,
            ];
        }

        foreach ($validated['files'] ?? [] as $fileItem) {
            $filePath = null;

            if (! empty($fileItem['file'])) {
                $filePath = $fileItem['file']->store('lesson-resources', 'public');
            } elseif (! empty($fileItem['existing_file_path'])) {
                $filePath = $fileItem['existing_file_path'];
            }

            if ($filePath) {
                $newFilePaths[] = $filePath;
            }

            $rows[] = [
                'lesson_id' => $lesson->id,
                'title' => trim((string) ($fileItem['title'] ?? '')),
                'resource_type' => 'file',
                'description' => null,
                'url' => null,
                'file_path' => $filePath,
                'sort_order' => $sortOrder++,
                'status' => true,
            ];
        }

        foreach ($validated['quizzes'] ?? [] as $quiz) {
            $quizId = (int) ($quiz['quiz_id'] ?? 0);

            $rows[] = [
                'lesson_id' => $lesson->id,
                'title' => 'Quiz #' . $quizId,
                'resource_type' => 'quiz',
                'description' => null,
                'url' => (string) $quizId,
                'file_path' => null,
                'sort_order' => $sortOrder++,
                'status' => true,
            ];
        }

        $lesson->resources()->delete();

        foreach ($rows as $row) {
            LessonResource::create($row);
        }

        return array_values(array_diff($existingFilePaths, $newFilePaths));
    }
}

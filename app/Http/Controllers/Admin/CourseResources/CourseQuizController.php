<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseResources\StoreQuizResourceRequest;
use App\Http\Requests\CourseResources\UpdateQuizResourceRequest;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\Module;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CourseQuizController extends Controller
{
    public function index(Request $request, string $role, Course $course)
    {
        $modules = $course
            ->modules()
            ->with('lessons')
            ->latest()
            ->paginate(20);

        return view('backend.pages.CourseResources.Quizs.index', [
            'course' => $course,
            'items' => $modules,
            'title' => 'Course Modules',
        ]);
    }

    public function create(Request $request, string $role, Course $course)
    {
        return view('backend.pages.CourseResources.Quizs.create', [
            'course' => $course,
            'editMode' => false,
            'formAction' => role_route('role.modules.store', ['course' => $course->id]),
            'formMethod' => 'POST',
            'title' => 'Create Module',
        ]);
    }

    public function store(
        StoreQuizResourceRequest $request,
        string $role,
        Course $course
    ): JsonResponse {
        $validated = $request->validated();

        DB::transaction(function () use ($validated, $course): void {
            foreach ($validated['modules'] ?? [] as $moduleData) {
                $module = $course->modules()->create([
                    'title' => $this->normalizeText($moduleData['title'] ?? ''),
                ]);

                foreach ($moduleData['lessons'] ?? [] as $lessonData) {
                    $module->lessons()->create(
                        $this->buildLessonPayload($lessonData)
                    );
                }
            }
        });

        Cache::forget('navbar_courses');

        return response()->json([
            'success' => true,
            'message' => 'Module Created Successfully',
            'redirect' => role_route('role.modules.index', [
                'course' => $course->id,
            ]),
        ]);
    }

    public function edit(
        Request $request,
        string $role,
        Course $course,
        Module $module
    ) {
        abort_if($module->course_id != $course->id, 404);

        $module->load('lessons');

        return view('backend.pages.CourseResources.Quizs.edit', [
            'course' => $course,
            'module' => $module,
            'editMode' => true,
            'formAction' => role_route('role.modules.update', [
                'course' => $course->id,
                'module' => $module->id,
            ]),
            'formMethod' => 'PUT',
            'submitLabel' => 'Update Module',
            'title' => 'Edit Module',
        ]);
    }

    public function update(
        UpdateQuizResourceRequest $request,
        string $role,
        Course $course,
        Module $module
    ): JsonResponse {
        abort_if($module->course_id != $course->id, 404);

        $validated = $request->validated();

        DB::transaction(function () use ($validated, $module): void {
            $moduleData = $validated['modules'][0] ?? [];

            $this->syncSingleModule($module, $moduleData);
        });

        Cache::forget('navbar_courses');

        return response()->json([
            'success' => true,
            'message' => 'Module Updated Successfully',
            'redirect' => role_route('role.modules.index', [
                'course' => $course->id,
            ]),
        ]);
    }

    public function destroy(
        string $role,
        Course $course,
        Module $module
    ): JsonResponse {
        abort_if($module->course_id != $course->id, 404);

        DB::transaction(function () use ($module): void {
            $module->delete();
        });

        Cache::forget('navbar_courses');

        return response()->json([
            'success' => true,
        ]);
    }

    private function syncSingleModule(Module $module, array $moduleData): void
    {
        $module->fill([
            'title' => $this->normalizeText($moduleData['title'] ?? ''),
        ])->save();

        $this->syncLessons($module, $moduleData['lessons'] ?? []);
    }

    private function syncLessons(Module $module, array $lessonsData): void
    {
        $existingLessons = $module->lessons()
            ->get()
            ->keyBy('id');

        $keptLessonIds = [];

        foreach ($lessonsData as $lessonData) {
            $lessonId = ! empty($lessonData['id']) ? (int) $lessonData['id'] : null;
            $lesson = $lessonId && $existingLessons->has($lessonId)
                ? $existingLessons->get($lessonId)
                : null;

            $payload = $this->buildLessonPayload($lessonData);

            if ($lesson instanceof Lesson) {
                $lesson->fill($payload)->save();
            } else {
                $lesson = $module->lessons()->create($payload);
            }

            $keptLessonIds[] = $lesson->id;
        }

        $module->lessons()
            ->whereNotIn('id', $keptLessonIds)
            ->get()
            ->each(fn (Lesson $lesson) => $lesson->delete());
    }

    private function buildLessonPayload(array $lessonData): array
    {
        $lessonTypes = is_array($lessonData['lesson_types'] ?? null)
            ? array_values(array_filter(
                $lessonData['lesson_types'],
                static fn ($type) => $type !== null && $type !== ''
            ))
            : [];

        $duration = $lessonData['duration'] ?? null;

        return [
            'title' => $this->normalizeText($lessonData['title'] ?? ''),
            'content' => ($lessonData['content'] ?? '') === '' ? null : $lessonData['content'],
            'duration' => ($duration === '' || $duration === null) ? 0 : (int) $duration,
            'lesson_types' => $lessonTypes,
        ];
    }

    private function normalizeText(mixed $value): string
    {
        return trim((string) $value);
    }
}

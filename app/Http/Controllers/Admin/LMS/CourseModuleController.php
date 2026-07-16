<?php

namespace App\Http\Controllers\Admin\LMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\LMS\StoreModuleRequest;
use App\Models\Course;
use App\Models\LMS\Lesson;
use App\Models\LMS\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CourseModuleController extends Controller
{
    public function index(Request $request, string $role, Course $course)
    {
        $course->load([
            'modules.lessons',
        ]);

        return view('backend.pages.LMS.module-lessions.index', [
            'course' => $course,
        ]);
    }

    public function create(Request $request, string $role, Course $course): View
    {
        $request->user()->can('modules.create') || abort(403);

        return view('backend.pages.LMS.module-lessions.create', [
            'course' => $course,
            'modules' => $this->blankModules(),
            'formAction' => role_route('role.modules.store', ['course' => $course->id]),
            'formMethod' => 'POST',
            'isEdit' => false,
            'pageTitle' => 'Create Course Modules',
            'submitLabel' => 'Save Modules',
        ]);
    }

    public function edit(Request $request, string $role, Course $course): View
    {
        $request->user()->can('modules.edit') || abort(403);

        $course->load([
            'modules.lessons',
        ]);

        return view('backend.pages.LMS.module-lessions.create', [
            'course' => $course,
            'modules' => $this->formatModulesForView($course),
            'formAction' => role_route('role.modules.update', ['course' => $course->id]),
            'formMethod' => 'PUT',
            'isEdit' => true,
            'pageTitle' => 'Edit Course Modules',
            'submitLabel' => 'Update Modules',
        ]);
    }

    public function store(StoreModuleRequest $request, string $role, Course $course): RedirectResponse
    {
        $validated = $request->validated();

        DB::transaction(function () use ($course, $validated): void {
            $this->syncStructure($course, $validated['modules'] ?? []);
        });

        return redirect(role_route('role.modules.index', ['course' => $course->id]))
            ->with('success', 'Course modules saved successfully.');
    }

    public function update(StoreModuleRequest $request, string $role, Course $course): RedirectResponse
    {
        $validated = $request->validated();

        DB::transaction(function () use ($course, $validated): void {
            $this->syncStructure($course, $validated['modules'] ?? []);
        });

        return redirect(role_route('role.modules.index', ['course' => $course->id]))
            ->with('success', 'Course modules updated successfully.');
    }

    private function syncStructure(Course $course, array $modulesData): void
    {
        $existingModules = $course->modules()
            ->with('lessons')
            ->get()
            ->keyBy('id');

        $keptModuleIds = [];

        foreach ($modulesData as $moduleData) {
            $moduleId = ! empty($moduleData['id']) ? (int) $moduleData['id'] : null;
            $module = $moduleId && $existingModules->has($moduleId)
                ? $existingModules->get($moduleId)
                : $course->modules()->create([
                    'title' => $this->normalizeText($moduleData['title'] ?? ''),
                ]);

            $module->fill([
                'title' => $this->normalizeText($moduleData['title'] ?? ''),
            ])->save();

            $keptModuleIds[] = $module->id;
            $this->syncLessons($module, $moduleData['lessons'] ?? []);
        }

        $course->modules()
            ->whereNotIn('id', $keptModuleIds)
            ->get()
            ->each->delete();
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
            ->each->delete();
    }

    private function buildLessonPayload(array $lessonData): array
    {
        $types = is_array($lessonData['lesson_types'] ?? null)
            ? array_values(array_filter($lessonData['lesson_types'], static fn ($t) => $t !== null && $t !== ''))
            : [];

        $duration = $lessonData['duration'] ?? null;

        return [
            'title' => $this->normalizeText($lessonData['title'] ?? ''),
            'content' => ($lessonData['content'] ?? '') === '' ? null : $lessonData['content'],
            'duration' => ($duration === '' || $duration === null) ? 0 : (int) $duration,
            'lesson_types' => $types !== [] ? $types : ['text'],
            'status' => isset($lessonData['status'])
                ? filter_var($lessonData['status'], FILTER_VALIDATE_BOOLEAN)
                : true,
        ];
    }

    private function formatModulesForView(Course $course): array
    {
        return $course->modules
            ->map(function (Module $module): array {
                return [
                    'id' => $module->id,
                    'title' => $module->title,
                    'lessons' => $module->lessons
                        ->map(function ($lesson): array {
                            return [
                                'id' => $lesson->id,
                                'title' => $lesson->title,
                                'content' => $lesson->content,
                                'duration' => $lesson->duration ?? 0,
                                'lesson_types' => $lesson->lesson_types ?? ['text'],
                                'status' => $lesson->status,
                            ];
                        })
                        ->values()
                        ->all(),
                ];
            })
            ->values()
            ->all();
    }

    private function blankModules(): array
    {
        return [
            [
                'title' => '',
                'lessons' => [
                    [
                        'title' => '',
                        'content' => '',
                        'duration' => 0,
                        'lesson_types' => ['text'],
                        'status' => true,
                    ],
                ],
            ],
        ];
    }

    private function normalizeText(mixed $value): string
    {
        return trim((string) $value);
    }
      
}

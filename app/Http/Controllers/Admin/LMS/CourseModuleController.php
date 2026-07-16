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

    public function edit(Request $request, string $role, Course $course, Module $module): View
    {
        $request->user()->can('modules.edit') || abort(403);

        if ($module->course_id !== $course->id) {
            abort(404);
        }

        $module->load('lessons');

        return view('backend.pages.LMS.module-lessions.create', [
            'course' => $course,
            'modules' => $this->formatModuleForView($module),
            'formAction' => role_route('role.modules.update', ['course' => $course->id, 'module' => $module->id]),
            'formMethod' => 'PUT',
            'isEdit' => true,
            'pageTitle' => 'Edit Course Module',
            'submitLabel' => 'Update Module',
        ]);
    }

    public function store(StoreModuleRequest $request, string $role, Course $course): RedirectResponse
    {
        $validated = $request->validated();

        DB::transaction(function () use ($course, $validated): void {
            $this->createStructure($course, $validated['modules'] ?? []);
        });

        return redirect(role_route('role.modules.index', ['course' => $course->id]))
            ->with('success', 'Course modules saved successfully.');
    }

    public function update(StoreModuleRequest $request, string $role, Course $course, Module $module): RedirectResponse
    {
        if ($module->course_id !== $course->id) {
            abort(404);
        }

        $validated = $request->validated();

        DB::transaction(function () use ($module, $validated): void {
            $this->syncSingleModule($module, $validated['modules'][0] ?? []);
        });

        return redirect(role_route('role.modules.index', ['course' => $course->id]))
            ->with('success', 'Course module updated successfully.');
    }

    private function syncSingleModule(Module $module, array $moduleData): void
    {
        $module->fill([
            'title' => $this->normalizeText($moduleData['title'] ?? ''),
        ])->save();

        $this->syncLessons($module, $moduleData['lessons'] ?? []);
    }

    private function createStructure(Course $course, array $modulesData): void
    {
        foreach ($modulesData as $moduleData) {
            $module = $course->modules()->create([
                'title' => $this->normalizeText($moduleData['title'] ?? ''),
            ]);

            foreach ($moduleData['lessons'] ?? [] as $lessonData) {
                $module->lessons()->create($this->buildLessonPayload($lessonData));
            }
        }
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

    private function formatModuleForView(Module $module): array
    {
        return [
            [
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
            ],
        ];
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

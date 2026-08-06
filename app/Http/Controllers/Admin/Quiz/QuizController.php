<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\Quiz\StoreQuizRequest;
use App\Http\Requests\Quiz\UpdateQuizRequest;
use App\Models\QuizModels\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{


      public function index(Request $request): View
{
    $quizzes = Quiz::visibleTo($request->user())
        ->latest()
        ->paginate(12);

    return view('backend.pages.quiz.quizzes.index', compact('quizzes'));
}

    public function create(string $role): View
    {
        $courses = $this->quizHierarchy();

        return view('backend.pages.quiz.quizzes.create', $this->quizFormData([
            'courses' => $courses,
        ]));
    }

    public function store(StoreQuizRequest $request, string $role): RedirectResponse
    {
        $validated = $request->validated();
        $hierarchy = $this->resolveHierarchyData($validated);

        $quiz = Quiz::create([
            'course_id' => $hierarchy['course_id'],
            'module_id' => $hierarchy['module_id'],
            'lesson_id' => $hierarchy['lesson_id'],
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'time_limit_minutes' => $validated['time_limit_minutes'] ?? null,
            'passing_score' => $validated['passing_score'],
            'max_attempts' => $validated['max_attempts'] ?? null,
            'shuffle_questions' => $request->boolean('shuffle_questions'),
            'show_correct_answers' => $request->boolean('show_correct_answers', true),
            'show_explanation' => $request->boolean('show_explanation', true),
            'type' => $this->resolveQuizType($hierarchy),
            'user_id' => auth()->id(),
            'status' => 'draft',
        ]);

        return redirect()
            ->to(role_route('role.quizzes.questions.index', ['quiz' => $quiz]))
            ->with('success', 'Quiz created! Now add questions.');
    }

    public function show(string $role, Quiz $quiz): View
    {
        $courses = $this->quizHierarchy();
        $quiz->load(['questions.options', 'attempts' => fn($q) => $q->latest()->limit(10)]);

        return view('backend.pages.quiz.quizzes.show', $this->quizFormData([
            'quiz' => $quiz,
            'courses' => $courses,
        ]));
    }

    public function edit(string $role, Quiz $quiz): View
    {
        $quiz->loadMissing(['course', 'module', 'lesson.module.course']);

        return view('backend.pages.quiz.quizzes.edit', $this->quizFormData([
            'quiz' => $quiz,
            'courses' => $this->quizHierarchy(),
        ]));
    }

    public function update(UpdateQuizRequest $request, string $role, Quiz $quiz): RedirectResponse
    {
        $validated = $request->validated();
        $hierarchy = $this->resolveHierarchyData($validated, $quiz);

        $quiz->update([
            'course_id' => $hierarchy['course_id'],
            'module_id' => $hierarchy['module_id'],
            'lesson_id' => $hierarchy['lesson_id'],
            'title' => $validated['title'] ?? $quiz->title,
            'description' => array_key_exists('description', $validated)
                ? $validated['description']
                : $quiz->description,
            'status' => $validated['status'] ?? $quiz->status,
            'time_limit_minutes' => array_key_exists('time_limit_minutes', $validated)
                ? $validated['time_limit_minutes']
                : $quiz->time_limit_minutes,
            'passing_score' => $validated['passing_score'] ?? $quiz->passing_score,
            'max_attempts' => array_key_exists('max_attempts', $validated)
                ? $validated['max_attempts']
                : $quiz->max_attempts,
            'shuffle_questions' => $request->boolean('shuffle_questions', $quiz->shuffle_questions),
            'show_correct_answers' => $request->boolean('show_correct_answers', $quiz->show_correct_answers),
            'show_explanation' => $request->boolean('show_explanation', $quiz->show_explanation),
            'type' => $this->resolveQuizType($hierarchy),
        ]);

        return redirect()
            ->to(role_route('role.quizzes.index'))
            ->with('success', 'Quiz updated successfully.');
    }

    public function destroy(string $role, Quiz $quiz): RedirectResponse
    {
        $quiz->delete();

        return redirect()
            ->to(role_route('role.quizzes.index'))
            ->with('success', 'Quiz moved to trash.');
    }

    public function publish(string $role, Quiz $quiz): RedirectResponse
    {
        if ($quiz->questions()->count() === 0) {
            return back()->with('error', 'Add at least one question before publishing.');
        }

        $quiz->update(['status' => 'published']);

        return back()->with('success', 'Quiz published successfully.');
    }

    public function archive(string $role, Quiz $quiz): RedirectResponse
    {
        $quiz->update(['status' => 'archived']);

        return back()->with('success', 'Quiz archived successfully.');
    }

    private function quizHierarchy()
    {
        return Course::with(['modules.lessons'])
            ->orderBy('name')
            ->get();
    }

    private function quizFormData(array $data = []): array
    {
        $quiz = $data['quiz'] ?? null;

        $selectedCourseId = old('course_id', $quiz?->course_id ?? $quiz?->module?->course_id ?? $quiz?->lesson?->module?->course_id);
        $selectedModuleId = old('module_id', $quiz?->module_id ?? $quiz?->lesson?->module_id);
        $selectedLessonId = old('lesson_id', $quiz?->lesson_id);

        if (!$selectedModuleId && $selectedLessonId) {
            $lesson = Lesson::with('module')->find($selectedLessonId);
            $selectedModuleId = $lesson?->module_id;
            $selectedCourseId = $selectedCourseId ?? $lesson?->module?->course_id;
        }

        if (!$selectedCourseId && $selectedModuleId) {
            $module = Module::find($selectedModuleId);
            $selectedCourseId = $module?->course_id;
        }

        return array_merge($data, [
            'selectedCourseId' => $selectedCourseId,
            'selectedModuleId' => $selectedModuleId,
            'selectedLessonId' => $selectedLessonId,
        ]);
    }

    private function resolveHierarchyData(array $validated, ?Quiz $quiz = null): array
    {
        $courseId = array_key_exists('course_id', $validated)
            ? $validated['course_id']
            : $quiz?->course_id;

        $moduleId = array_key_exists('module_id', $validated)
            ? $validated['module_id']
            : $quiz?->module_id;

        $lessonId = array_key_exists('lesson_id', $validated)
            ? $validated['lesson_id']
            : $quiz?->lesson_id;

        if (!empty($lessonId)) {
            $lesson = Lesson::with('module')->find($lessonId);

            $moduleId = $lesson?->module_id;
            $courseId = $lesson?->module?->course_id;

            return [
                'course_id' => $courseId,
                'module_id' => $moduleId,
                'lesson_id' => $lessonId,
            ];
        }

        if (!empty($moduleId)) {
            $module = Module::with('course')->find($moduleId);

            return [
                'course_id' => $module?->course_id,
                'module_id' => $moduleId,
                'lesson_id' => null,
            ];
        }

        return [
            'course_id' => $courseId,
            'module_id' => null,
            'lesson_id' => null,
        ];
    }

    private function resolveQuizType(array $hierarchy): string
    {
        return !empty($hierarchy['lesson_id']) ? 'lesson' : 'global';
    }
}

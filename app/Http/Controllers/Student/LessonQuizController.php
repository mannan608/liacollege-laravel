<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Models\CourseResources\Lesson;
use App\Models\QuizModels\Question;
use App\Models\QuizModels\Quiz;
use App\Models\QuizModels\QuizAttempt;
use Illuminate\Contracts\View\View as ViewResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonQuizController extends Controller
{
    public function show(Lesson $lesson): ViewResponse|JsonResponse
    {
        $lesson->load([
            'quiz.questions.options',
        ]);

        $quiz = $lesson->quiz;

        abort_if(!$quiz, 404, 'Quiz not found.');
        abort_if($quiz->questions->isEmpty(), 404, 'No quiz questions found.');

        $attempt = $this->resolveAttempt($quiz);

        if ($attempt->isCompleted()) {
            $attempt->load(['quiz.questions.options', 'answers.question']);

            return $this->renderReviewResponse($attempt);
        }

        $questions = $quiz->questions;
        $question = $this->currentQuestionForAttempt($attempt, $questions);
        $currentIndex = $questions->search(fn ($item) => $item->id === $question->id) ?: 0;
        $previousAnswer = $attempt->answers()
            ->where('question_id', $question->id)
            ->first();

        return $this->renderQuestionResponse([
            'lesson' => $lesson,
            'quiz' => $quiz,
            'attempt' => $attempt,
            'question' => $question,
            'questions' => $questions,
            'currentIndex' => $currentIndex,
            'previousAnswer' => $previousAnswer,
        ]);
    }

    public function submit(Request $request, QuizAttempt $attempt): JsonResponse|RedirectResponse
    {
        abort_if($attempt->user_id !== auth()->id(), 403);

        if ($attempt->isCompleted()) {
            return $this->renderReviewResponse($attempt);
        }

        $validated = $request->validate([
            'question_id' => ['required', 'integer'],
            'options' => ['required', 'array', 'min:1'],
            'options.*' => ['integer'],
        ], [
            'options.required' => 'Please select at least one option before continuing.',
            'options.min' => 'Please select at least one option before continuing.',
        ]);

        $selectedOptions = array_map(
            'intval',
            $request->input('options', [])
        );

        $quiz = $attempt->quiz->load(['questions.options']);
        $questions = $quiz->questions;
        abort_if($questions->isEmpty(), 404, 'No quiz questions found.');

        $question = $questions->firstWhere('id', (int) $validated['question_id']);
        abort_if(!$question, 404, 'Question not found.');

        DB::transaction(function () use ($attempt, $question, $selectedOptions) {
            $isCorrect = $question->checkAnswer($selectedOptions);

            $attempt->answers()->updateOrCreate(
                ['question_id' => $question->id],
                [
                    'selected_options' => array_values($selectedOptions),
                    'is_correct' => $isCorrect,
                    'points_earned' => $isCorrect ? $question->points : 0,
                ]
            );
        });

        $currentIndex = $questions->search(fn ($item) => $item->id === $question->id);
        $nextQuestion = $questions->get($currentIndex + 1);

        if ($nextQuestion) {
            $previousAnswer = $attempt->answers()
                ->where('question_id', $nextQuestion->id)
                ->first();

            return $this->renderQuestionResponse([
                'lesson' => $attempt->quiz->lesson,
                'quiz' => $quiz,
                'attempt' => $attempt,
                'question' => $nextQuestion,
                'questions' => $questions,
                'currentIndex' => $currentIndex + 1,
                'previousAnswer' => $previousAnswer,
            ]);
        }

        $this->finalizeAttempt($attempt);
        $attempt->load(['quiz.questions.options', 'answers.question']);

        return $this->renderReviewResponse($attempt);
    }

    public function review(QuizAttempt $attempt): ViewResponse
    {
        abort_if($attempt->user_id !== auth()->id(), 403);
        abort_if(!$attempt->isCompleted(), 404);

        $attempt->load(['quiz.questions.options', 'answers.question']);

        return view('student.quiz.review', compact('attempt'));
    }

    private function resolveAttempt(Quiz $quiz): QuizAttempt
    {
        $userId = auth()->id();

        $attempt = QuizAttempt::query()
            ->where('quiz_id', $quiz->id)
            ->where('user_id', $userId)
            ->where('status', 'in_progress')
            ->latest('id')
            ->first();

        if ($attempt) {
            return $attempt;
        }

        $latestAttempt = QuizAttempt::query()
            ->where('quiz_id', $quiz->id)
            ->where('user_id', $userId)
            ->latest('id')
            ->first();

        if ($latestAttempt && $latestAttempt->isCompleted()) {
            return $latestAttempt;
        }

        return QuizAttempt::create([
            'quiz_id' => $quiz->id,
            'user_id' => $userId,
            'attempt_number' => QuizAttempt::query()
                ->where('quiz_id', $quiz->id)
                ->where('user_id', $userId)
                ->count() + 1,
            'started_at' => now(),
            'status' => 'in_progress',
        ]);
    }

    private function currentQuestionForAttempt(QuizAttempt $attempt, $questions): Question
    {
        $answeredQuestionIds = $attempt->answers()
            ->pluck('question_id')
            ->all();

        $question = $questions->first(
            fn ($item) => !in_array($item->id, $answeredQuestionIds, true)
        );

        return $question ?? $questions->first();
    }

    private function finalizeAttempt(QuizAttempt $attempt): void
    {
        $attempt->loadMissing(['quiz.questions', 'answers']);

        $score = 0;
        $totalPoints = 0;

        foreach ($attempt->quiz->questions as $question) {
            $answer = $attempt->answers->firstWhere('question_id', $question->id);

            $correctOptions = $question->correctOptionIds();
            $selectedOptions = collect($answer?->selected_options ?? [])
                ->map(fn ($value) => (int) $value)
                ->sort()
                ->values()
                ->all();

            $isCorrect = $correctOptions === $selectedOptions;

            if ($answer) {
                $answer->update([
                    'is_correct' => $isCorrect,
                    'points_earned' => $isCorrect ? $question->points : 0,
                ]);
            }

            $totalPoints += (int) $question->points;

            if ($isCorrect) {
                $score += (int) $question->points;
            }
        }

        $percentage = $totalPoints > 0
            ? round(($score / $totalPoints) * 100, 2)
            : 0;

        $attempt->update([
            'score' => $score,
            'total_points' => $totalPoints,
            'percentage' => $percentage,
            'grade' => $attempt->quiz->getGrade($percentage),
            'status' => 'completed',
            'completed_at' => now(),
            'time_taken_seconds' => $attempt->started_at
                ? now()->diffInSeconds($attempt->started_at)
                : null,
        ]);
    }

    private function renderQuestionResponse(array $data): ViewResponse|JsonResponse
    {
        $html = view('student.quiz.quiz-question', $data)->render();

        if (request()->expectsJson() || request()->ajax()) {
            return response()->json([
                'completed' => false,
                'html' => $html,
            ]);
        }

        return view('student.quiz.quiz-question', $data);
    }

    private function renderReviewResponse(QuizAttempt $attempt): ViewResponse|JsonResponse
    {
        $html = view('student.quiz.review', compact('attempt'))->render();

        if (request()->expectsJson() || request()->ajax()) {
            return response()->json([
                'completed' => true,
                'html' => $html,
            ]);
        }

        return view('student.quiz.review', compact('attempt'));
    }

    public function retake(QuizAttempt $attempt): RedirectResponse
{
    abort_if($attempt->user_id !== auth()->id(), 403);

    $attempt->answers()->delete();

    $attempt->update([
        'status' => 'in_progress',
        'score' => 0,
        'total_points' => 0,
        'percentage' => 0,
        'grade' => null,
        'completed_at' => null,
        'started_at' => now(),
        'time_taken_seconds' => null,
    ]);

    return redirect()->route('student.lesson.quiz.show', $attempt->quiz->lesson);
}
}

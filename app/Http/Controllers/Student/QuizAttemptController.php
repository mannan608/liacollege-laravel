<?php
namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\SubmitAllRequest;
use App\Http\Requests\Quiz\SubmitAnswerRequest;
use App\Models\QuizModels\Question;
use App\Models\QuizModels\Quiz;
use App\Models\QuizModels\QuizAttempt;
use App\Services\QuizScoringService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class QuizAttemptController extends Controller
{
    public function __construct(
        private QuizScoringService $scoringService
    ) {}

    public function start(Quiz $quiz): RedirectResponse
    {
        abort_if($quiz->status !== 'published', 404);

        // Check if user already has in-progress attempt
        $existing = auth()->user()->quizAttempts()
            ->where('quiz_id', $quiz->id)
            ->where('status', 'in_progress')
            ->first();

        if ($existing) {
            return redirect()->route('attempts.question', [$existing, $existing->quiz->questions->first()]);
        }

        // Check retake limit
        if (!$quiz->canRetake(auth()->user())) {
            return back()->with('error', 'You have reached the maximum number of attempts.');
        }

        $attemptNumber = auth()->user()->quizAttempts()
            ->where('quiz_id', $quiz->id)
            ->where('status', 'completed')
            ->count() + 1;

        $attempt = QuizAttempt::create([
            'quiz_id' => $quiz->id,
            'user_id' => auth()->id(),
            'attempt_number' => $attemptNumber,
            'started_at' => now(),
            'total_points' => $quiz->totalPoints(),
        ]);

        return redirect()->route('attempts.question', [$attempt, $quiz->questions->first()]);
    }

    public function question(QuizAttempt $attempt, Question $question): View
    {
        $this->authorizeAttempt($attempt);
        $this->checkTimer($attempt);

        $quiz = $attempt->quiz->load(['questions' => fn($q) => $q->orderBy('order')]);
        $questions = $quiz->questions;
        $currentIndex = $questions->search(fn($q) => $q->id === $question->id);
        $progress = (($currentIndex + 1) / $questions->count()) * 100;

        $previousAnswer = $attempt->getAnswerForQuestion($question->id);

        return view('user.attempts.question', compact(
            'attempt', 'quiz', 'question', 'questions', 
            'currentIndex', 'progress', 'previousAnswer'
        ));
    }

    public function answer(SubmitAnswerRequest $request, QuizAttempt $attempt, Question $question): RedirectResponse
    {
        $this->authorizeAttempt($attempt);
        $this->checkTimer($attempt);

        $selectedOptions = $request->input('options', []);
        $isCorrect = $question->checkAnswer($selectedOptions);
        $pointsEarned = $isCorrect ? $question->points : 0;

        $attempt->answers()->updateOrCreate(
            ['question_id' => $question->id],
            [
                'selected_options' => $selectedOptions,
                'is_correct' => $isCorrect,
                'points_earned' => $pointsEarned,
            ]
        );

        // Navigate to next question or finish
        $quiz = $attempt->quiz;
        $questions = $quiz->questions()->orderBy('order')->get();
        $currentIndex = $questions->search(fn($q) => $q->id === $question->id);
        $nextQuestion = $questions->get($currentIndex + 1);

        if ($nextQuestion) {
            return redirect()->route('attempts.question', [$attempt, $nextQuestion]);
        }

        return redirect()->route('attempts.submit', $attempt);
    }

    public function allQuestions(QuizAttempt $attempt): View
    {
        $this->authorizeAttempt($attempt);
        $this->checkTimer($attempt);

        $quiz = $attempt->quiz->load(['questions.options']);
        $answers = $attempt->answers->keyBy('question_id');

        return view('user.attempts.all', compact('attempt', 'quiz', 'answers'));
    }

    public function submitAll(SubmitAllRequest $request, QuizAttempt $attempt): RedirectResponse
    {
        $this->authorizeAttempt($attempt);

        DB::transaction(function () use ($request, $attempt) {
            foreach ($request->answers as $questionId => $optionIds) {
                $question = Question::findOrFail($questionId);
                $isCorrect = $question->checkAnswer($optionIds);
                
                $attempt->answers()->updateOrCreate(
                    ['question_id' => $questionId],
                    [
                        'selected_options' => $optionIds,
                        'is_correct' => $isCorrect,
                        'points_earned' => $isCorrect ? $question->points : 0,
                    ]
                );
            }

            $this->scoringService->finalizeAttempt($attempt);
        });

        return redirect()->route('attempts.result', $attempt);
    }

    public function submit(QuizAttempt $attempt): RedirectResponse
    {
        $this->authorizeAttempt($attempt);

        // Check all questions answered
        $answeredCount = $attempt->answers()->count();
        $totalQuestions = $attempt->quiz->questions()->count();

        if ($answeredCount < $totalQuestions) {
            $unanswered = $attempt->quiz->questions()
                ->whereNotIn('id', $attempt->answers()->pluck('question_id'))
                ->first();

            return redirect()
                ->route('attempts.question', [$attempt, $unanswered])
                ->with('warning', 'Please answer all questions before submitting.');
        }

        $this->scoringService->finalizeAttempt($attempt);

        return redirect()->route('attempts.result', $attempt);
    }

    public function result(QuizAttempt $attempt): View
    {
        abort_if($attempt->user_id !== auth()->id(), 403);
        abort_if(!$attempt->isCompleted(), 404);

        $attempt->load(['quiz.questions.options', 'answers.question']);

        return view('user.attempts.result', compact('attempt'));
    }

    public function history(): View
    {
        $attempts = auth()->user()
            ->quizAttempts()
            ->with('quiz')
            ->where('status', 'completed')
            ->latest()
            ->paginate(15);

        return view('user.attempts.history', compact('attempts'));
    }

    public function abandon(QuizAttempt $attempt): RedirectResponse
    {
        abort_if($attempt->user_id !== auth()->id(), 403);
        
        $attempt->update(['status' => 'abandoned']);

        return redirect()->route('quizzes.index')->with('info', 'Quiz attempt abandoned.');
    }

    // ─── Helpers ────────────────────────────────────

    private function authorizeAttempt(QuizAttempt $attempt): void
    {
        abort_if($attempt->user_id !== auth()->id(), 403);
        abort_if(!$attempt->isInProgress(), 404);
    }

    private function checkTimer(QuizAttempt $attempt): void
    {
        if ($attempt->isTimeExpired()) {
            $this->scoringService->finalizeAttempt($attempt, 'timed_out');
            redirect()->route('attempts.result', $attempt)->send();
            exit;
        }
    }
}
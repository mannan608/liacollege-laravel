<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Models\QuizModels\Quiz;
use Illuminate\View\View;

class QuizController extends Controller
{
    public function index(): View
    {
        $quizzes = Quiz::published()
            ->withCount('questions')
            ->with(['userAttempts' => fn($q) => $q->where('user_id', auth()->id())])
            ->latest()
            ->paginate(12);

        return view('frontend.pages.quiz.index', compact('quizzes'));
    }

    public function show(Quiz $quiz): View
    {
        // abort_if($quiz->status !== 'published', 404);

        $quiz->loadCount('questions');
        
        $attempts = auth()->user()
            ->quizAttempts()
            ->where('quiz_id', $quiz->id)
            ->where('status', 'completed')
            ->latest()
            ->get();

        $canRetake = $quiz->canRetake(auth()->user());
        $hasInProgress = auth()->user()
            ->quizAttempts()
            ->where('quiz_id', $quiz->id)
            ->where('status', 'in_progress')
            ->first();

        return view('frontend.pages.quiz.show', compact('quiz', 'attempts', 'canRetake', 'hasInProgress'));
    }
}
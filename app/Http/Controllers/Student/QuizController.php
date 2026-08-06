<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Models\QuizModels\Quiz;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuizController extends Controller
{
public function index(Request $request): View
{
    $user = $request->user();

    $quizzes = Quiz::query()
        ->when(
            ! $user->hasAnyRole(['admin', 'super_admin']),
            function ($query) use ($user) {
                $query->where('user_id', $user->id);
            }
        )
        ->latest()
        ->paginate(12);

    return view('backend.pages.quizzes.index', compact('quizzes'));
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

            

        return view('student.quiz.show', compact('quiz', 'attempts', 'canRetake', 'hasInProgress'));
    }
}
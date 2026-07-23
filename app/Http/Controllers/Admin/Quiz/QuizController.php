<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\Quiz\StoreQuizRequest;
use App\Http\Requests\Quiz\UpdateQuizRequest;
use App\Models\QuizModels\Quiz;

class QuizController extends Controller
{
    public function index(): View
    {
        $quizzes = Quiz::withCount('questions', 'attempts')
            ->with('creator')
            ->latest()
            ->paginate(15);

        return view('backend.pages.quiz.quizzes.index', compact('quizzes'));
    }

    public function create(string $role): View
    {
        return view('backend.pages.quiz.quizzes.create');
    }

  public function store(StoreQuizRequest $request, string $role): RedirectResponse
{
    $quiz = Quiz::create([
        ...$request->validated(),
        'user_id' => auth()->id(),
    ]);

 
    return redirect()
            ->route('role.quizzes.questions.index', $quiz)
            ->with('success', 'Quiz created! Now add questions.');
}

    public function show(string $role, Quiz $quiz): View
    {
        $quiz->load(['questions.options', 'attempts' => fn($q) => $q->latest()->limit(10)]);
        
        return view('backend.pages.quiz.quizzes.show', compact('quiz'));
    }

    public function edit(string $role, Quiz $quiz): View
    {
        return view('backend.pages.quiz.quizzes.edit', compact('quiz'));
    }

    public function update(UpdateQuizRequest $request, string $role, Quiz $quiz): RedirectResponse
    {
        $quiz->update($request->validated());

        return redirect()
            ->route('backend.pages.quiz.quizzes.index')
            ->with('success', 'Quiz updated successfully.');
    }

    public function destroy(string $role, Quiz $quiz): RedirectResponse
    {
        $quiz->delete();

        return redirect()
            ->route('backend.pages.quiz.quizzes.index')
            ->with('success', 'Quiz moved to trash.');
    }
}

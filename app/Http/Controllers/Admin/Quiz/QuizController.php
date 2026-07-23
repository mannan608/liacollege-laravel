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
        $quizzes = Quiz::withCount(['questions', 'attempts'])
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
            'status' => 'draft',
        ]);

        return redirect()
            ->to(role_route('role.quizzes.questions.index', ['quiz' => $quiz]))
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

 
}

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

        return view('admin.quizzes.index', compact('quizzes'));
    }

    public function create(): View
    {
        return view('admin.quizzes.create');
    }

    public function store(StoreQuizRequest $request): RedirectResponse
    {
        $quiz = Quiz::create(array_merge(
            $request->validated(),
            ['user_id' => auth()->id()]
        ));

        return redirect()
            ->route('admin.quizzes.questions.index', $quiz)
            ->with('success', 'Quiz created! Now add questions.');
    }

    public function show(Quiz $quiz): View
    {
        $quiz->load(['questions.options', 'attempts' => fn($q) => $q->latest()->limit(10)]);
        
        return view('admin.quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz): View
    {
        return view('admin.quizzes.edit', compact('quiz'));
    }

    public function update(UpdateQuizRequest $request, Quiz $quiz): RedirectResponse
    {
        $quiz->update($request->validated());

        return redirect()
            ->route('admin.quizzes.index')
            ->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz): RedirectResponse
    {
        $quiz->delete();

        return redirect()
            ->route('admin.quizzes.index')
            ->with('success', 'Quiz moved to trash.');
    }
}

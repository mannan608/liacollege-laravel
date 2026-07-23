<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Quiz\StoreQuestionRequest;
use App\Models\QuizModels\Question;
use App\Models\QuizModels\Quiz;

class QuestionController extends Controller
{
    public function index(string $role, Quiz $quiz): View
    {
        $quiz->load(['questions.options']);
        
        return view('backend.pages.quiz.questions.index', compact('quiz'));
    }

    public function create(string $role, Quiz $quiz): View
    {
        return view('backend.pages.quiz.questions.create', compact('quiz'));
    }

    public function store(StoreQuestionRequest $request,string $role,Quiz $quiz): RedirectResponse
    {
        $maxOrder = $quiz->questions()->max('order') ?? 0;

        $question = $quiz->questions()->create([
            'question_text' => $request->question_text,
            'type' => $request->type,
            'explanation' => $request->explanation,
            'order' => $maxOrder + 1,
            'points' => $request->points,
        ]);

        foreach ($request->options as $index => $option) {
            $question->options()->create([
                'option_text' => $option['text'],
                'is_correct' => $option['is_correct'] ?? false,
                'order' => $index + 1,
            ]);
        }

        return redirect()
            ->to(role_route('role.quizzes.questions.index', ['quiz' => $quiz]))
            ->with('success', 'Question added successfully.');
    }

    public function edit(string $role, Quiz $quiz,Question $question): View
    {
        return view('backend.pages.quiz.questions.edit', compact('quiz', 'question'));
    }

    public function update(StoreQuestionRequest $request,string $role, Quiz $quiz,  Question $question): RedirectResponse
    {
        $question->update([
            'question_text' => $request->question_text,
            'type' => $request->type,
            'explanation' => $request->explanation,
            'points' => $request->points,
        ]);

        // Delete old options and recreate
        $question->options()->delete();
        
        foreach ($request->options as $index => $option) {
            $question->options()->create([
                'option_text' => $option['text'],
                'is_correct' => $option['is_correct'] ?? false,
                'order' => $index + 1,
            ]);
        }

        return redirect()
            ->to(role_route('role.quizzes.questions.index', ['quiz' => $quiz]))
            ->with('success', 'Question updated successfully.');
    }

    public function destroy(string $role,Quiz $quiz, Question $question): RedirectResponse
    {
        $question->delete();

        // Reorder remaining questions
        $quiz->questions()->orderBy('order')->get()->each(function ($q, $index) {
            $q->update(['order' => $index + 1]);
        });

        return back()->with('success', 'Question deleted.');
    }

    public function reorder(Request $request,string $role, Quiz $quiz): JsonResponse
    {
        $request->validate(['orders' => ['required', 'array']]);
        
        foreach ($request->orders as $questionId => $order) {
            $quiz->questions()->where('id', $questionId)->update(['order' => $order]);
        }

        return response()->json(['success' => true]);
    }
}

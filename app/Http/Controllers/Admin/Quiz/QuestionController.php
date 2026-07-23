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
    public function index(Quiz $quiz): View
    {
        $quiz->load(['questions.options']);
        
        return view('admin.questions.index', compact('quiz'));
    }

    public function create(Quiz $quiz): View
    {
        return view('admin.questions.create', compact('quiz'));
    }

    public function store(StoreQuestionRequest $request, Quiz $quiz): RedirectResponse
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
            ->route('admin.quizzes.questions.index', $quiz)
            ->with('success', 'Question added successfully.');
    }

    public function edit(Quiz $quiz, Question $question): View
    {
        return view('admin.questions.edit', compact('quiz', 'question'));
    }

    public function update(StoreQuestionRequest $request, Quiz $quiz, Question $question): RedirectResponse
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
            ->route('admin.quizzes.questions.index', $quiz)
            ->with('success', 'Question updated successfully.');
    }

    public function destroy(Quiz $quiz, Question $question): RedirectResponse
    {
        $question->delete();

        // Reorder remaining questions
        $quiz->questions()->orderBy('order')->get()->each(function ($q, $index) {
            $q->update(['order' => $index + 1]);
        });

        return back()->with('success', 'Question deleted.');
    }

    public function reorder(Request $request, Quiz $quiz): JsonResponse
    {
        $request->validate(['orders' => ['required', 'array']]);
        
        foreach ($request->orders as $questionId => $order) {
            $quiz->questions()->where('id', $questionId)->update(['order' => $order]);
        }

        return response()->json(['success' => true]);
    }
}

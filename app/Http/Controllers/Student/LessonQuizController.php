<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Models\CourseResources\Lesson;
use App\Models\QuizModels\Question;
use App\Models\QuizModels\Quiz;
use App\Models\QuizModels\QuizAttempt;
use GuzzleHttp\Psr7\Request;
use Illuminate\View\View;

class LessonQuizController extends Controller
{

// public function show(Lesson $lesson)
// {
//     $lesson->load([
//         'quiz.questions'
//     ]);

//     $quiz = $lesson->quiz;
//     $questions = $quiz?->questions;

//     if (request()->ajax()) {
//         return view('student.quiz.quiz-question', compact(
//             'lesson',
//             'quiz',
//             'questions'
//         ));
//     }

//     return view('student.quiz.quiz-question', compact(
//         'lesson',
//         'quiz',
//         'questions'
//     ));
// }

public function show(Lesson $lesson)
{
    $lesson->load([
        'quiz.questions.options',
    ]);

    $quiz = $lesson->quiz;

    if (!$quiz) {
        abort(404, 'Quiz not found.');
    }

    $questions = $quiz->questions;

    $question = $questions->first(); 

    // Create or retrieve the student's attempt
    $attempt = QuizAttempt::firstOrCreate(
        [
            'user_id' => auth()->id(),
            'quiz_id' => $quiz->id,
        ],
        [
            'started_at' => now(),
        ]
    );

    $currentIndex = 0;

    $previousAnswer = $attempt->answers()
        ->where('question_id', $question->id)
        ->first();

    if (request()->ajax()) {
        return view('student.quiz.quiz-question', compact(
            'lesson',
            'quiz',
            'attempt',
            'question',
            'questions',
            'currentIndex',
            'previousAnswer'
        ));
    }

    return view('student.quiz.quiz-question', compact(
        'lesson',
        'quiz',
        'attempt',
        'question',
        'questions',
        'currentIndex',
        'previousAnswer'
    ));
}


public function submit(QuizAttempt $attempt)
{
    abort_if($attempt->user_id != auth()->id(),403);

    if($attempt->submitted_at){
        return redirect()->route('student.quiz.review',$attempt);
    }

    $totalScore = 0;
    $totalMarks = 0;

    foreach($attempt->quiz->questions as $question){

        $answer = $attempt->answers()
            ->where('question_id',$question->id)
            ->first();

        $correctOptions = $question->options()
            ->where('is_correct',1)
            ->pluck('id')
            ->sort()
            ->values()
            ->toArray();

        $selected = collect($answer?->selected_options ?? [])
            ->sort()
            ->values()
            ->toArray();

        $correct = $correctOptions == $selected;

        if($answer){
            $answer->update([
                'is_correct'=>$correct,
                'points_earned'=>$correct ? $question->marks : 0,
            ]);
        }

        $totalMarks += $question->marks;

        if($correct){
            $totalScore += $question->marks;
        }
    }

    $attempt->update([
        'submitted_at'=>now(),
        'score'=>$totalScore,
        'total_marks'=>$totalMarks,
        'passed'=>$totalScore >= ($totalMarks*0.4),
    ]);

    return redirect()->route('student.quiz.review',$attempt);
}

public function review(QuizAttempt $attempt)
{
    abort_if($attempt->user_id!=auth()->id(),403);

    $attempt->load([
        'quiz.questions.options',
        'answers'
    ]);

    return view('student.quiz.review',compact('attempt'));
}


}
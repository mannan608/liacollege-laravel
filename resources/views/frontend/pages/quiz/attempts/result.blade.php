@extends('frontend.pages.student.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- Score Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-6">
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-6 py-8 text-center text-white">
            <p class="text-sm font-medium opacity-80 mb-2">Quiz Completed</p>
            <h1 class="text-4xl font-bold mb-2">{{ $attempt->quiz->title }}</h1>
            <p class="opacity-80">Attempt #{{ $attempt->attempt_number }} • {{ $attempt->completed_at->format('F j, Y \a\t g:i A') }}</p>
        </div>
        
        <div class="p-8">
            <div class="flex flex-col md:flex-row items-center justify-center gap-8">
                {{-- Score Circle --}}
                <div class="relative">
                    <svg class="w-40 h-40 transform -rotate-90">
                        <circle cx="80" cy="80" r="70" stroke="#e5e7eb" stroke-width="12" fill="none"/>
                        <circle cx="80" cy="80" r="70" 
                            stroke="{{ $attempt->percentage >= $attempt->quiz->passing_score ? '#10b981' : '#ef4444' }}" 
                            stroke-width="12" fill="none"
                            stroke-dasharray="440"
                            stroke-dashoffset="{{ 440 - (440 * $attempt->percentage / 100) }}"
                            stroke-linecap="round"
                            class="transition-all duration-1000"/>
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-3xl font-bold text-gray-900">{{ $attempt->percentage }}%</span>
                        <span class="text-sm text-gray-500">{{ $attempt->score }}/{{ $attempt->total_points }}</span>
                    </div>
                </div>

                {{-- Grade & Stats --}}
                <div class="text-center md:text-left space-y-4">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Grade</p>
                        <span class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl text-2xl font-bold
                            {{ $attempt->grade === 'A' ? 'bg-emerald-100 text-emerald-700' : '' }}
                            {{ $attempt->grade === 'B' ? 'bg-blue-100 text-blue-700' : '' }}
                            {{ $attempt->grade === 'C' ? 'bg-amber-100 text-amber-700' : '' }}
                            {{ $attempt->grade === 'D' || $attempt->grade === 'F' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ $attempt->grade }}
                            @if($attempt->percentage >= $attempt->quiz->passing_score)
                                <i class="ph ph-check-circle text-xl"></i>
                            @else
                                <i class="ph ph-x-circle text-xl"></i>
                            @endif
                        </span>
                    </div>
                    <div class="flex items-center gap-6">
                        <div>
                            <p class="text-sm text-gray-500">Correct</p>
                            <p class="text-xl font-bold text-emerald-600">{{ $attempt->answers->where('is_correct', true)->count() }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Incorrect</p>
                            <p class="text-xl font-bold text-red-600">{{ $attempt->answers->where('is_correct', false)->count() }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Time</p>
                            <p class="text-xl font-bold text-gray-700">
                                @if($attempt->time_taken_seconds)
                                    {{ floor($attempt->time_taken_seconds / 60) }}m {{ $attempt->time_taken_seconds % 60 }}s
                                @else
                                    --
                                @endif
                            </p>
                        </div>
                    </div>
                    <div>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-sm font-medium
                            {{ $attempt->percentage >= $attempt->quiz->passing_score ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
                            {{ $attempt->percentage >= $attempt->quiz->passing_score ? 'Passed!' : 'Failed' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Actions --}}
    <div class="flex items-center justify-center gap-4 mb-8">
        <a href="{{ route('student.quizzes.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition-colors">
            <i class="ph ph-arrow-left"></i> Back to Quizzes
        </a>
        @if($attempt->quiz->canRetake(auth()->user()))
        <form action="{{ route('student.quizzes.start', $attempt->quiz) }}" method="POST">
            @csrf
            <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-medium transition-colors shadow-sm">
                <i class="ph ph-arrow-counter-clockwise"></i> Retake Quiz
            </button>
        </form>
        @endif
    </div>

    {{-- Question Review --}}
    <div class="space-y-4">
        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
            <i class="ph ph-list-checks text-emerald-600"></i> Question Review
        </h2>

        @foreach($attempt->quiz->questions as $index => $question)
        @php
            $answer = $attempt->answers->where('question_id', $question->id)->first();
            $selectedIds = $answer ? $answer->selected_options : [];
            $correctIds = $question->correctOptionIds();
        @endphp
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between {{ $answer && $answer->is_correct ? 'bg-emerald-50/30' : 'bg-red-50/30' }}">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg {{ $answer && $answer->is_correct ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }} flex items-center justify-center text-sm font-bold">
                        {{ $index + 1 }}
                    </span>
                    <span class="text-sm font-medium {{ $answer && $answer->is_correct ? 'text-emerald-700' : 'text-red-700' }}">
                        @if($answer && $answer->is_correct)
                            <i class="ph ph-check-circle mr-1"></i> Correct
                        @else
                            <i class="ph ph-x-circle mr-1"></i> Incorrect
                        @endif
                        <span class="text-gray-500 ml-2">({{ $answer ? $answer->points_earned : 0 }}/{{ $question->points }} pts)</span>
                    </span>
                </div>
            </div>
            
            <div class="p-6">
                <p class="text-lg font-medium text-gray-900 mb-4">{{ $question->question_text }}</p>
                
                <div class="space-y-2">
                    @foreach($question->options as $option)
                    @php
                        $isSelected = in_array($option->id, $selectedIds);
                        $isCorrect = in_array($option->id, $correctIds);
                        
                        $optionClass = 'border-gray-200 bg-gray-50 text-gray-600';
                        if ($attempt->quiz->show_correct_answers) {
                            if ($isCorrect) {
                                $optionClass = 'border-emerald-500 bg-emerald-50 text-emerald-800';
                            } elseif ($isSelected && !$isCorrect) {
                                $optionClass = 'border-red-500 bg-red-50 text-red-800';
                            }
                        } elseif ($isSelected) {
                            $optionClass = 'border-emerald-500 bg-emerald-50 text-emerald-800';
                        }
                    @endphp
                    <div class="flex items-start gap-3 p-3 rounded-xl border-2 {{ $optionClass }}">
                        <div class="flex-shrink-0 mt-0.5">
                            @if($isCorrect && $attempt->quiz->show_correct_answers)
                                <i class="ph ph-check-circle text-emerald-600 text-lg"></i>
                            @elseif($isSelected && !$isCorrect && $attempt->quiz->show_correct_answers)
                                <i class="ph ph-x-circle text-red-600 text-lg"></i>
                            @elseif($isSelected)
                                <i class="ph ph-check text-emerald-600 text-lg"></i>
                            @else
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300"></div>
                            @endif
                        </div>
                        <span class="font-medium">{{ $option->option_text }}</span>
                    </div>
                    @endforeach
                </div>

                {{-- Explanation --}}
                @if($attempt->quiz->show_explanation && $question->explanation)
                <div class="mt-4 p-4 bg-blue-50 rounded-xl border border-blue-100">
                    <p class="text-sm font-medium text-blue-800 flex items-center gap-2 mb-1">
                        <i class="ph ph-lightbulb"></i> Explanation
                    </p>
                    <p class="text-sm text-blue-700">{{ $question->explanation }}</p>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@extends('frontend.pages.student.layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    {{-- Header --}}
    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-gray-900">Available Quizzes</h1>
        <p class="text-gray-500 mt-2">Test your knowledge and track your progress</p>
    </div>

    {{-- Quiz Grid --}}
    @if($quizzes->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($quizzes as $quiz)
        @php
            $userAttempts = $quiz->userAttempts->where('status', 'completed');
            $bestScore = $userAttempts->max('percentage');
            $attemptCount = $userAttempts->count();
            $canRetake = $quiz->canRetake(auth()->user());
        @endphp
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
            {{-- Card Header --}}
            <div class="px-6 py-5 border-b border-gray-100">
                <div class="flex items-start justify-between mb-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white text-xl font-bold shadow-sm">
                        {{ strtoupper(substr($quiz->title, 0, 2)) }}
                    </div>
                    @if($bestScore !== null)
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold
                            {{ $bestScore >= $quiz->passing_score ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
                            <i class="ph ph-trophy"></i>
                            {{ $bestScore }}%
                        </span>
                    @endif
                </div>
                <h3 class="font-bold text-gray-900 text-lg leading-tight">{{ $quiz->title }}</h3>
                <p class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $quiz->description }}</p>
            </div>

            {{-- Meta Info --}}
            <div class="px-6 py-4 bg-gray-50/50">
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div>
                        <p class="text-lg font-bold text-gray-900">{{ $quiz->questions_count }}</p>
                        <p class="text-xs text-gray-500">Questions</p>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-900">
                            {{ $quiz->time_limit_minutes ? $quiz->time_limit_minutes . 'm' : '∞' }}
                        </p>
                        <p class="text-xs text-gray-500">Time Limit</p>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-900">{{ $quiz->passing_score }}%</p>
                        <p class="text-xs text-gray-500">Passing</p>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                <div class="text-xs text-gray-500">
                    @if($attemptCount > 0)
                        <span class="flex items-center gap-1">
                            <i class="ph ph-arrow-counter-clockwise"></i>
                            {{ $attemptCount }} attempt{{ $attemptCount > 1 ? 's' : '' }}
                        </span>
                    @else
                        <span class="text-gray-400">Not attempted yet</span>
                    @endif
                </div>
                <a href="{{ route('student.quizzes.show', $quiz) }}" 
                   class="inline-flex items-center gap-1.5 text-sm font-medium text-emerald-600 hover:text-emerald-700 transition-colors">
                    {{ $attemptCount > 0 ? 'Retake' : 'Start' }}
                    <i class="ph ph-arrow-right"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $quizzes->links() }}
    </div>
    @else
    <div class="text-center py-20">
        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="ph ph-exam text-3xl text-gray-400"></i>
        </div>
        <h3 class="text-lg font-medium text-gray-900">No quizzes available</h3>
        <p class="text-gray-500 mt-1">Check back later for new quizzes!</p>
    </div>
    @endif
</div>
@endsection
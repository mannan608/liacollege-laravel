@extends('frontend.pages.student.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
        <a href="{{ route('student.quizzes.index') }}" class="hover:text-gray-700">Quizzes</a>
        <i class="ph ph-caret-right"></i>
        <span class="text-gray-900 font-medium">{{ $quiz->title }} asasdasd</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Main Info --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="h-32 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 relative">
                    <div class="absolute inset-0 bg-black/10"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <div class="flex items-end justify-between">
                            <div>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-white/20 text-white backdrop-blur-sm">
                                    <i class="ph ph-globe"></i> Published
                                </span>
                                <h1 class="text-2xl font-bold text-white mt-2">{{ $quiz->title }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <p class="text-gray-600 leading-relaxed">{{ $quiz->description ?: 'No description available.' }}</p>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                        <div class="text-center p-3 bg-gray-50 rounded-xl">
                            <i class="ph ph-question text-2xl text-emerald-600 mb-1"></i>
                            <p class="font-bold text-gray-900">{{ $quiz->questions_count }}</p>
                            <p class="text-xs text-gray-500">Questions</p>
                        </div>
                        <div class="text-center p-3 bg-gray-50 rounded-xl">
                            <i class="ph ph-clock text-2xl text-blue-600 mb-1"></i>
                            <p class="font-bold text-gray-900">{{ $quiz->time_limit_minutes ?: '∞' }}</p>
                            <p class="text-xs text-gray-500">Minutes</p>
                        </div>
                        <div class="text-center p-3 bg-gray-50 rounded-xl">
                            <i class="ph ph-trophy text-2xl text-amber-600 mb-1"></i>
                            <p class="font-bold text-gray-900">{{ $quiz->passing_score }}%</p>
                            <p class="text-xs text-gray-500">Passing</p>
                        </div>
                        <div class="text-center p-3 bg-gray-50 rounded-xl">
                            <i class="ph ph-arrow-counter-clockwise text-2xl text-purple-600 mb-1"></i>
                            <p class="font-bold text-gray-900">{{ $quiz->max_attempts ?: '∞' }}</p>
                            <p class="text-xs text-gray-500">Max Attempts</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            {{-- Start Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 sticky top-24">
                @if($hasInProgress)
                    <div class="text-center">
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="ph ph-hourglass-high text-2xl text-amber-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900">In Progress</h3>
                        <p class="text-sm text-gray-500 mt-1">You have an unfinished attempt</p>
                        <a href="{{ route('student.attempts.question', [$hasInProgress, $quiz->questions->first()]) }}" 
                           class="mt-4 w-full inline-flex items-center justify-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-5 py-3 rounded-xl font-medium transition-colors">
                            <i class="ph ph-play"></i> Resume Quiz
                        </a>
                    </div>
                @elseif($canRetake)
                    <div class="text-center">
                        <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="ph ph-play-circle text-2xl text-emerald-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900">Ready to Start?</h3>
                        <p class="text-sm text-gray-500 mt-1">
                            @if($quiz->time_limit_minutes)
                                You have {{ $quiz->time_limit_minutes }} minutes to complete.
                            @else
                                No time limit. Take your time!
                            @endif
                        </p>
                        <form action="{{ route('student.quizzes.start', $quiz) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-xl font-medium transition-colors shadow-sm">
                                <i class="ph ph-rocket-launch"></i> Start Quiz
                            </button>
                        </form>
                    </div>
                @else
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="ph ph-lock-key text-2xl text-gray-400"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900">Limit Reached</h3>
                        <p class="text-sm text-gray-500 mt-1">You've used all your attempts for this quiz.</p>
                    </div>
                @endif
            </div>

            {{-- Previous Attempts --}}
            @if($attempts->count() > 0)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="ph ph-clock-counter-clockwise"></i> Your Attempts
                </h3>
                <div class="space-y-3">
                    @foreach($attempts as $attempt)
                    <a href="{{ route('student.attempts.result', $attempt) }}" class="block p-3 rounded-xl border border-gray-100 hover:border-emerald-200 hover:bg-emerald-50/30 transition-all group">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg {{ $attempt->percentage >= $quiz->passing_score ? 'bg-emerald-100 text-emerald-600' : 'bg-red-100 text-red-600' }} flex items-center justify-center font-bold text-sm">
                                    {{ $attempt->grade }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Attempt #{{ $attempt->attempt_number }}</p>
                                    <p class="text-xs text-gray-500">{{ $attempt->completed_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-bold {{ $attempt->percentage >= $quiz->passing_score ? 'text-emerald-600' : 'text-red-600' }}">
                                    {{ $attempt->percentage }}%
                                </p>
                                <p class="text-xs text-gray-500">{{ $attempt->score }}/{{ $attempt->total_points }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
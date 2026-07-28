@extends('frontend.pages.student.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto" x-data="quizTimer({{ $attempt->timeRemaining() ?? 'null' }})" x-init="start()">
    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $quiz->title }}</h1>
            <p class="text-sm text-gray-500 mt-1">Answer all questions and submit when ready</p>
        </div>
        @if($attempt->quiz->time_limit_minutes)
        <div class="flex items-center gap-2 px-4 py-2 rounded-xl border {{ $attempt->timeRemaining() < 60 ? 'bg-red-50 border-red-200 text-red-700' : 'bg-white border-gray-200 text-gray-700' }}">
            <i class="ph ph-clock text-lg" :class="$attempt->timeRemaining() < 60 ? 'animate-pulse' : ''"></i>
            <span class="font-mono font-bold text-lg" x-text="formatTime(timeLeft)">--:--</span>
        </div>
        @endif
    </div>

    <form action="{{ route('attempts.submit-all', $attempt) }}" method="POST" id="quiz-form">
        @csrf
        
        <div class="space-y-8">
            @foreach($quiz->questions as $index => $question)
            @php
                $existingAnswer = $answers->get($question->id);
                $selectedOptions = $existingAnswer ? $existingAnswer->selected_options : [];
            @endphp
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden" id="q-{{ $question->id }}">
                <div class="px-6 py-4 bg-gray-50/50 border-b border-gray-100 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center text-sm font-bold">
                        {{ $index + 1 }}
                    </span>
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-gray-200 text-gray-600">
                            {{ str_replace('_', ' ', $question->type) }}
                        </span>
                        <span class="text-xs text-gray-500">{{ $question->points }} pts</span>
                    </div>
                </div>
                
                <div class="p-6">
                    <p class="text-lg font-medium text-gray-900 mb-6">{{ $question->question_text }}</p>
                    
                    <div class="space-y-2.5">
                        @foreach($question->options as $option)
                        <label class="flex items-start gap-3 p-3 rounded-xl border-2 cursor-pointer transition-all hover:border-emerald-300 hover:bg-gray-50 has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50/30">
                            @if($question->isMultipleChoice())
                                <input type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $option->id }}"
                                    {{ in_array($option->id, $selectedOptions) ? 'checked' : '' }}
                                    class="mt-0.5 w-5 h-5 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                            @else
                                <input type="radio" name="answers[{{ $question->id }}][]" value="{{ $option->id }}"
                                    {{ in_array($option->id, $selectedOptions) ? 'checked' : '' }}
                                    class="mt-0.5 w-5 h-5 text-emerald-600 border-gray-300 focus:ring-emerald-500">
                            @endif
                            <span class="text-gray-700">{{ $option->option_text }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Submit Bar --}}
        <div class="sticky bottom-6 mt-8">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-4 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500">
                        <span id="answered-count" class="font-bold text-gray-900">0</span> / {{ $quiz->questions->count() }} answered
                    </span>
                    <div class="h-4 w-32 bg-gray-200 rounded-full overflow-hidden">
                        <div id="progress-bar" class="h-full bg-emerald-500 rounded-full transition-all" style="width: 0%"></div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('attempts.abandon', $attempt) }}" 
                       onclick="return confirm('Abandon this quiz?')"
                       class="px-5 py-2.5 text-red-600 hover:bg-red-50 rounded-xl font-medium transition-colors">
                        Abandon
                    </a>
                    <button type="submit" 
                            onclick="return confirm('Submit your answers? You cannot change them after submission.')"
                            class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-xl font-medium transition-colors shadow-sm">
                        <i class="ph ph-check-circle"></i> Submit Quiz
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function quizTimer(initialSeconds) {
        return {
            timeLeft: initialSeconds,
            timer: null,
            start() {
                if (this.timeLeft === null) return;
                this.timer = setInterval(() => {
                    this.timeLeft--;
                    if (this.timeLeft <= 0) {
                        clearInterval(this.timer);
                        document.getElementById('quiz-form').submit();
                    }
                }, 1000);
            },
            formatTime(seconds) {
                if (seconds === null) return '';
                const m = Math.floor(seconds / 60);
                const s = seconds % 60;
                return `${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
            }
        }
    }

    // Update progress bar
    function updateProgress() {
        const total = {{ $quiz->questions->count() }};
        let answered = 0;
        @foreach($quiz->questions as $q)
            const q{{ $q->id }} = document.querySelectorAll('input[name="answers[{{ $q->id }}][]"]:checked');
            if (q{{ $q->id }}.length > 0) answered++;
        @endforeach
        
        document.getElementById('answered-count').textContent = answered;
        document.getElementById('progress-bar').style.width = (answered / total * 100) + '%';
    }

    document.querySelectorAll('input[type="checkbox"], input[type="radio"]').forEach(input => {
        input.addEventListener('change', updateProgress);
    });
    updateProgress();
</script>
@endpush
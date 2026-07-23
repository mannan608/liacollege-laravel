@extends('frontend.pages.student.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto" x-data="quizTimer({{ $attempt->timeRemaining() ?? 'null' }})" x-init="start()">
    {{-- Timer Bar --}}
    @if($attempt->quiz->time_limit_minutes)
    <div class="mb-6">
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center gap-2 text-sm font-medium" :class="timeLeft < 60 ? 'text-red-600' : 'text-gray-600'">
                <i class="ph ph-clock" :class="timeLeft < 60 ? 'animate-pulse' : ''"></i>
                <span x-text="formatTime(timeLeft)">--:--</span>
            </div>
            <span class="text-sm text-gray-500">Question {{ $currentIndex + 1 }} of {{ $questions->count() }}</span>
        </div>
        <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
            <div class="h-full rounded-full transition-all duration-1000"
                 :class="timeLeft < 60 ? 'bg-red-500' : 'bg-emerald-500'"
                 :style="`width: ${(timeLeft / {{ $attempt->quiz->time_limit_minutes * 60 }}) * 100}%`">
            </div>
        </div>
    </div>
    @else
    <div class="flex items-center justify-between mb-6">
        <span class="text-sm text-gray-500">Question {{ $currentIndex + 1 }} of {{ $questions->count() }}</span>
    </div>
    @endif

    {{-- Progress Bar --}}
    <div class="h-1.5 bg-gray-200 rounded-full mb-8 overflow-hidden">
        <div class="h-full bg-emerald-500 rounded-full transition-all duration-500" style="width: {{ $progress }}%"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        {{-- Question Navigation Sidebar --}}
        <div class="lg:col-span-1 order-2 lg:order-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-4 sticky top-24">
                <h4 class="text-sm font-semibold text-gray-700 mb-3">Questions</h4>
                <div class="grid grid-cols-5 gap-2">
                    @foreach($questions as $index => $q)
                    @php
                        $isAnswered = $attempt->getAnswerForQuestion($q->id) !== null;
                        $isCurrent = $q->id === $question->id;
                    @endphp
                    <a href="{{ $isAnswered ? route('attempts.question', [$attempt, $q]) : '#' }}"
                       class="aspect-square rounded-lg flex items-center justify-center text-sm font-bold transition-all
                       {{ $isCurrent ? 'bg-emerald-600 text-white shadow-md' : '' }}
                       {{ !$isCurrent && $isAnswered ? 'bg-emerald-100 text-emerald-700' : '' }}
                       {{ !$isCurrent && !$isAnswered ? 'bg-gray-100 text-gray-400' : '' }}
                       {{ !$isAnswered && !$isCurrent ? 'cursor-not-allowed' : '' }}">
                        {{ $index + 1 }}
                    </a>
                    @endforeach
                </div>
                
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center gap-2 text-xs text-gray-500 mb-1">
                        <span class="w-3 h-3 rounded bg-emerald-600"></span> Current
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-500 mb-1">
                        <span class="w-3 h-3 rounded bg-emerald-100"></span> Answered
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <span class="w-3 h-3 rounded bg-gray-100"></span> Not answered
                    </div>
                </div>

                {{-- Abandon Button --}}
                <form action="{{ route('attempts.abandon', $attempt) }}" method="POST" class="mt-4" onsubmit="return confirm('Are you sure? Your progress will be lost.')">
                    @csrf
                    <button type="submit" class="w-full text-xs text-red-500 hover:text-red-700 py-2 border border-red-200 rounded-lg hover:bg-red-50 transition-colors">
                        Abandon Quiz
                    </button>
                </form>
            </div>
        </div>

        {{-- Question Card --}}
        <div class="lg:col-span-3 order-1 lg:order-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 md:p-8">
                    {{-- Question Header --}}
                    <div class="flex items-center gap-3 mb-6">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700">
                            {{ str_replace('_', ' ', $question->type) }}
                        </span>
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-700">
                            {{ $question->points }} point{{ $question->points > 1 ? 's' : '' }}
                        </span>
                    </div>

                    {{-- Question Text --}}
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 leading-relaxed mb-8">
                        {{ $question->question_text }}
                    </h2>

                    {{-- Options Form --}}
                    <form action="{{ route('attempts.answer', [$attempt, $question]) }}" method="POST" id="answer-form">
                        @csrf
                        
                        <div class="space-y-3">
                            @foreach($question->options as $option)
                            @php
                                $isSelected = $previousAnswer && in_array($option->id, $previousAnswer->selected_options ?? []);
                            @endphp
                            <label class="group relative flex items-start gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all
                                {{ $isSelected ? 'border-emerald-500 bg-emerald-50/50' : 'border-gray-200 hover:border-emerald-300 hover:bg-gray-50' }}">
                                <div class="flex-shrink-0 mt-0.5">
                                    @if($question->isMultipleChoice())
                                        <input type="checkbox" name="options[]" value="{{ $option->id }}"
                                            {{ $isSelected ? 'checked' : '' }}
                                            class="w-5 h-5 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                    @else
                                        <input type="radio" name="options[]" value="{{ $option->id }}"
                                            {{ $isSelected ? 'checked' : '' }}
                                            class="w-5 h-5 text-emerald-600 border-gray-300 focus:ring-emerald-500">
                                    @endif
                                </div>
                                <span class="text-gray-700 font-medium leading-relaxed">{{ $option->option_text }}</span>
                            </label>
                            @endforeach
                        </div>

                        @error('options')
                        <p class="mt-3 text-sm text-red-600 flex items-center gap-1">
                            <i class="ph ph-warning-circle"></i> {{ $message }}
                        </p>
                        @enderror

                        {{-- Navigation Buttons --}}
                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-100">
                            @if($currentIndex > 0)
                            <a href="{{ route('attempts.question', [$attempt, $questions[$currentIndex - 1]]) }}" 
                               class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-medium transition-colors">
                                <i class="ph ph-arrow-left"></i> Previous
                            </a>
                            @else
                            <span></span>
                            @endif

                            <div class="flex items-center gap-3">
                                {{-- Skip / Save & Next --}}
                                @if($currentIndex < $questions->count() - 1)
                                    <button type="submit" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-medium transition-colors shadow-sm">
                                        Save & Next <i class="ph ph-arrow-right"></i>
                                    </button>
                                @else
                                    <button type="submit" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-medium transition-colors shadow-sm">
                                        Save & Review <i class="ph ph-check"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                        document.getElementById('answer-form').submit();
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
</script>
@endpush
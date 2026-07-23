@extends('frontend.pages.student.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto" x-data="quizTimer({{ $attempt->timeRemaining() ?? 'null' }})" x-init="start()"> 

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">       

        {{-- Question Card --}}
        <div class="lg:col-span-3 order-1 lg:order-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 md:p-8">                 

                    {{-- Question Text --}}
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 leading-relaxed mb-8">
                        {{ $question->question_text }}
                    </h2>

                    {{-- Options Form --}}
                    <form action="{{ route('student.attempts.answer', [$attempt, $question]) }}" method="POST" id="answer-form">
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
                            <a href="{{ route('student.attempts.question', [$attempt, $questions[$currentIndex - 1]]) }}" 
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
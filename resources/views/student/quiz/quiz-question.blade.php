<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="p-6 md:p-8">
        <div class="flex items-center justify-between gap-4 mb-6">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-emerald-600">
                    Question {{ $currentIndex + 1 }} of {{ $questions->count() }}
                </p>
                <h2 class="mt-1 text-xl md:text-2xl font-bold text-gray-900 leading-relaxed">
                    {{ $question->question_text }}
                </h2>
            </div>
        </div>

        <div data-quiz-feedback class="hidden mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700"></div>

        <form action="{{ route('student.quiz.submit', $attempt) }}" method="POST" data-quiz-answer-form>
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">

            <div class="space-y-3">
                @foreach ($question->options as $option)
                    @php
                        $isSelected = $previousAnswer && in_array($option->id, $previousAnswer->selected_options ?? []);
                    @endphp

                    <label
                        class="group relative flex items-start gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all
                        {{ $isSelected ? 'border-emerald-500 bg-emerald-50/50' : 'border-gray-200 hover:border-emerald-300 hover:bg-gray-50' }}">
                        <div class="flex-shrink-0 mt-0.5">
                            @if ($question->isMultipleChoice())
                                <input type="checkbox" name="options[]" value="{{ $option->id }}"
                                    {{ $isSelected ? 'checked' : '' }}
                                    class="w-5 h-5 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                            @else
                                <input type="radio" name="options[]" value="{{ $option->id }}"
                                    {{ $isSelected ? 'checked' : '' }}
                                    class="w-5 h-5 text-emerald-600 border-gray-300 focus:ring-emerald-500">
                            @endif
                        </div>

                        <span class="text-gray-700 font-medium leading-relaxed">
                            {{ $option->option_text }}
                        </span>
                    </label>
                @endforeach
            </div>

            @error('options')
                <p class="mt-3 text-sm text-red-600 flex items-center gap-1">
                    <i class="ph ph-warning-circle"></i> {{ $message }}
                </p>
            @enderror

            <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-100">
                <div class="text-sm text-gray-500">
                    Your answer is saved before moving on.
                </div>

                <button type="submit"
                    class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-medium transition-colors shadow-sm">
                    {{ $currentIndex < $questions->count() - 1 ? 'Save & Next' : 'Complete Quiz' }}
                    <i class="ph {{ $currentIndex < $questions->count() - 1 ? 'ph-arrow-right' : 'ph-check' }}"></i>
                </button>
            </div>
        </form>
    </div>
</div>

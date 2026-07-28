<div class="max-w-4xl mx-auto space-y-6">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-6 py-10 text-white text-center">
            <h1 class="text-3xl font-bold mb-2">{{ $attempt->quiz->title }}</h1>
            <p class="opacity-80">Attempt #{{ $attempt->attempt_number }}</p>
        </div>

        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 text-center">
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Your Score</p>
                    <p class="text-5xl font-bold text-gray-900 mt-2">{{ $attempt->percentage }}%</p>
                    <p class="text-gray-500 mt-2">{{ $attempt->score }}/{{ $attempt->total_points }} points</p>
                </div>

                <div
                    class="rounded-2xl border p-5 text-center {{ $attempt->percentage >= $attempt->quiz->passing_score ? 'border-emerald-200 bg-emerald-50' : 'border-red-200 bg-red-50' }}">
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Pass / Fail</p>
                    <p
                        class="text-3xl font-bold mt-3 {{ $attempt->percentage >= $attempt->quiz->passing_score ? 'text-emerald-700' : 'text-red-700' }}">
                        {{ $attempt->percentage >= $attempt->quiz->passing_score ? 'Passed' : 'Failed' }}
                    </p>
                    <p class="text-sm text-gray-500 mt-2">Passing score: {{ $attempt->quiz->passing_score }}%</p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 text-center">
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Attempt Status</p>
                    <p class="text-3xl font-bold text-gray-900 mt-3">Locked</p>
                    <p class="text-sm text-gray-500 mt-2">Cannot edit after completion</p>
                    @if ($attempt->percentage < $attempt->quiz->passing_score)
                        <button type="button"
                            class="retakeQuizBtn mt-4 inline-flex items-center rounded-lg bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700"
                            data-url="{{ route('student.quiz.retake', $attempt) }}">
                            Retake Quiz
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-4">
        @foreach ($attempt->quiz->questions as $index => $question)
            @php
                $answer = $attempt->answers->firstWhere('question_id', $question->id);
                $selectedIds = $answer ? $answer->selected_options : [];
                $correctIds = $question->correctOptionIds();
                $selectedOptions = $answer?->selectedOptionModels() ?? collect();
                $correctOptions = $question->options->whereIn('id', $correctIds);
            @endphp

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div
                    class="px-6 py-4 border-b border-gray-100 flex items-center justify-between {{ $answer && $answer->is_correct ? 'bg-emerald-50/30' : 'bg-red-50/30' }}">
                    <div class="flex items-center gap-3">
                        <span
                            class="w-8 h-8 rounded-lg {{ $answer && $answer->is_correct ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }} flex items-center justify-center text-sm font-bold">
                            {{ $index + 1 }}
                        </span>
                        <span
                            class="text-sm font-medium {{ $answer && $answer->is_correct ? 'text-emerald-700' : 'text-red-700' }}">
                            {{ $answer && $answer->is_correct ? 'Correct' : 'Incorrect' }}
                            <span class="text-gray-500 ml-2">
                                ({{ $answer ? $answer->points_earned : 0 }}/{{ $question->points }} pts)
                            </span>
                        </span>
                    </div>
                </div>

                <div class="p-6">
                    <p class="text-lg font-medium text-gray-900 mb-4">{{ $question->question_text }}</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                        <div class="rounded-xl border border-blue-100 bg-blue-50 p-4">
                            <p class="text-xs font-semibold uppercase tracking-wider text-blue-700 mb-2">Your Answer</p>
                            <div class="space-y-2">
                                @forelse ($selectedOptions as $option)
                                    <div
                                        class="rounded-lg border border-blue-200 bg-white px-3 py-2 text-sm text-blue-900">
                                        {{ $option->option_text }}
                                    </div>
                                @empty
                                    <div class="text-sm text-blue-700">Not answered</div>
                                @endforelse
                            </div>
                        </div>

                        <div class="rounded-xl border border-emerald-100 bg-emerald-50 p-4">
                            <p class="text-xs font-semibold uppercase tracking-wider text-emerald-700 mb-2">Correct
                                Answer</p>
                            <div class="space-y-2">
                                @foreach ($correctOptions as $option)
                                    <div
                                        class="rounded-lg border border-emerald-200 bg-white px-3 py-2 text-sm text-emerald-900">
                                        {{ $option->option_text }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        @foreach ($question->options as $option)
                            @php
                                $isSelected = in_array($option->id, $selectedIds, true);
                                $isCorrect = in_array($option->id, $correctIds, true);

                                $optionClass = 'border-gray-200 bg-gray-50 text-gray-600';
                                if ($isCorrect) {
                                    $optionClass = 'border-emerald-500 bg-emerald-50 text-emerald-800';
                                } elseif ($isSelected) {
                                    $optionClass = 'border-red-500 bg-red-50 text-red-800';
                                }
                            @endphp

                            <div class="flex items-start gap-3 p-3 rounded-xl border-2 {{ $optionClass }}">
                                <div class="flex-shrink-0 mt-0.5">
                                    @if ($isCorrect)
                                        <i class="ph ph-check-circle text-emerald-600 text-lg"></i>
                                    @elseif ($isSelected)
                                        <i class="ph ph-x-circle text-red-600 text-lg"></i>
                                    @else
                                        <div class="w-5 h-5 rounded-full border-2 border-gray-300"></div>
                                    @endif
                                </div>

                                <span class="font-medium">{{ $option->option_text }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


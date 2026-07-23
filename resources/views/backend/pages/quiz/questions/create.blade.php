@extends('backend.layouts.app')

@section('content')
    <div x-data="questionBuilder()" class="max-w-4xl mx-auto p-4 md:p-8">
        <!-- Card Container -->
        <div
            class="bg-white dark:bg-gray-900 rounded-2xl shadow-[0_2px_20px_-4px_rgba(0,0,0,0.08)] border border-gray-100 dark:border-gray-800 overflow-hidden">

            <!-- Header -->
            <div
                class="px-8 py-7 border-b border-gray-100 dark:border-gray-800 bg-gradient-to-r from-gray-50/80 to-white dark:from-gray-800/50 dark:to-gray-900">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-brand-50 dark:bg-brand-900/30 flex items-center justify-center">
                        <svg class="w-5 h-5 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900 dark:text-white tracking-tight">New Question</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">Build your quiz question with options</p>
                    </div>
                </div>
            </div>

            <form action="{{ role_route('role.quizzes.questions.store', ['quiz' => $quiz]) }}" method="POST"
                class="p-8 space-y-8" id="question-form">
                @csrf

                <!-- Question Text -->
                <div class="space-y-2.5">
                    <label class="block mb-1 text-sm font-medium text-slate-700">
                        Question Text <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <textarea name="question_text" rows="3" required
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                            placeholder="What would you like to ask your students?">{{ old('question_text') }}</textarea>
                        <div class="absolute bottom-3 right-3 text-xs text-gray-400 dark:text-gray-500 pointer-events-none">
                            Markdown supported</div>
                    </div>
                    @error('question_text')
                        <p class="text-sm text-red-500 mt-1.5 flex items-center gap-1.5"><svg class="w-4 h-4" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Type & Points Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2.5">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Question
                            Type</label>
                        <div class="relative">
                            <select name="type" id="question-type" x-model="questionType" @change="handleTypeChange()"
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                <option value="single_choice" {{ old('type') === 'single_choice' ? 'selected' : '' }}>Single
                                    Choice</option>
                                <option value="multiple_choice" {{ old('type') === 'multiple_choice' ? 'selected' : '' }}>
                                    Multiple Choice</option>
                                <option value="true_false" {{ old('type') === 'true_false' ? 'selected' : '' }}>True / False
                                </option>
                            </select>
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2.5">
                        <label class="block mb-1 text-sm font-medium text-slate-700">Points</label>
                        <div class="relative">
                            <input type="number" name="points" value="{{ old('points', 1) }}" min="1" required
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            <div
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-medium text-gray-400 dark:text-gray-500 pointer-events-none">
                                pts</div>
                        </div>
                    </div>
                </div>

                <!-- Explanation -->
                <div class="space-y-2.5">
                    <label class="block mb-1 text-sm font-medium text-slate-700">
                        Explanation <span class="text-xs font-normal text-gray-400 dark:text-gray-500 ml-1">— shown after
                            quiz completion</span>
                    </label>
                    <textarea name="explanation" rows="2"
                       class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                        placeholder="Explain why the correct answer is right...">{{ old('explanation') }}</textarea>
                </div>

                <!-- Options Section -->
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <label class="block mb-1 text-sm font-medium text-slate-700">Answer Options</label>
                        <button type="button" @click="addOption()" x-show="questionType !== 'true_false'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            class="inline-flex items-center gap-2 px-3.5 py-2 text-sm font-medium text-brand-600 dark:text-brand-400 bg-brand-50 dark:bg-brand-900/20 hover:bg-brand-100 dark:hover:bg-brand-900/30 rounded-lg transition-all duration-200 border border-brand-200 dark:border-brand-800/50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Option
                        </button>
                    </div>

                    <div class="space-y-2.5" id="options-container">
                        <template x-for="(option, index) in options" :key="index">
                            <div class="group flex items-center gap-3 p-1 rounded-xl transition-all duration-200"
                                :class="option.is_correct ?
                                    'bg-brand-50/50 dark:bg-brand-900/10 border border-brand-200 dark:border-brand-800/30' :
                                    'bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 hover:border-gray-200 dark:hover:border-gray-700 hover:shadow-sm'">

                                <!-- Selection Indicator -->
                                <div class="flex-shrink-0 pl-3">
                                    <label class="relative flex items-center cursor-pointer">
                                        <input :type="questionType === 'multiple_choice' ? 'checkbox' : 'radio'"
                                            :name="`options[${index}][is_correct]`" value="1"
                                            x-model="option.is_correct" @change="handleCorrectChange(index)"
                                            class="peer sr-only">
                                        <div class="w-5 h-5 border-2 border-gray-300 dark:border-gray-600 peer-checked:border-brand-500 peer-checked:bg-brand-500 transition-all duration-200 flex items-center justify-center"
                                            :class="questionType === 'multiple_choice' ? 'rounded-md' : 'rounded-full'">
                                            <svg x-show="option.is_correct" class="w-3 h-3 text-white" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                    </label>
                                </div>

                                <!-- Option Input -->
                                <div class="flex-1 min-w-0">
                                    <input type="text" :name="`options[${index}][text]`" x-model="option.text" required
                                        :readonly="questionType === 'true_false'"
                                        class="w-full px-3 py-2.5 bg-transparent border-0 outline-none text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 transition-colors"
                                        :class="questionType === 'true_false' ? 'cursor-default' : ''"
                                        :placeholder="questionType === 'true_false' ? '' : `Option ${index + 1}`">
                                </div>

                                <!-- Correct Badge -->
                                <div x-show="option.is_correct" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 scale-75"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    class="flex-shrink-0 px-2.5 py-1 bg-brand-100 dark:bg-brand-900/30 text-brand-700 dark:text-brand-300 text-xs font-semibold rounded-md">
                                    Correct
                                </div>

                                <!-- Remove Button -->
                                <button type="button" @click="removeOption(index)"
                                    x-show="questionType !== 'true_false' && options.length > 2"
                                    x-transition:enter="transition ease-out duration-150"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    class="flex-shrink-0 p-2 mr-1 text-gray-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all duration-200 opacity-0 group-hover:opacity-100 focus:opacity-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </template>
                    </div>

                    <!-- Minimum Options Warning -->
                    <div x-show="showMinWarning" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="flex items-center gap-2 text-sm text-amber-600 dark:text-amber-400 bg-amber-50 dark:bg-amber-900/20 px-4 py-2.5 rounded-lg border border-amber-200 dark:border-amber-800/30">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        Minimum 2 options required
                    </div>

                    @error('options')
                        <p class="text-sm text-red-500 mt-2 flex items-center gap-1.5"><svg class="w-4 h-4" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Footer Actions -->
                <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-100 dark:border-gray-800">
                    <a href="{{ role_route('role.quizzes.questions.index', ['quiz' => $quiz]) }}"
                        class="px-6 py-2.5 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-xl font-medium transition-all duration-200">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-7 py-2.5 text-sm bg-brand-600 hover:bg-brand-700 active:scale-[0.98] text-white rounded-xl font-medium transition-all duration-200 shadow-lg shadow-brand-500/25 hover:shadow-brand-500/40 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Save Question
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function questionBuilder() {
            const oldOptions = @json(old('options'));
            const oldType = '{{ old('type', 'single_choice') }}';

            return {
                questionType: oldType,
                showMinWarning: false,
                options: oldOptions && oldOptions.length > 0 ?
                    oldOptions.map((opt, i) => ({
                        text: opt.text,
                        is_correct: !!opt.is_correct
                    })) : [{
                            text: '',
                            is_correct: true
                        },
                        {
                            text: '',
                            is_correct: false
                        },
                        {
                            text: '',
                            is_correct: false
                        },
                        {
                            text: '',
                            is_correct: false
                        }
                    ],

                handleTypeChange() {
                    if (this.questionType === 'true_false') {
                        this.options = [{
                                text: 'True',
                                is_correct: true
                            },
                            {
                                text: 'False',
                                is_correct: false
                            }
                        ];
                    } else {
                        // Reset to default if coming from true_false
                        if (this.options.length === 2 && this.options[0].text === 'True' && this.options[1].text ===
                            'False') {
                            this.options = [{
                                    text: '',
                                    is_correct: true
                                },
                                {
                                    text: '',
                                    is_correct: false
                                },
                                {
                                    text: '',
                                    is_correct: false
                                },
                                {
                                    text: '',
                                    is_correct: false
                                }
                            ];
                        }
                        // For single choice, ensure only one is selected
                        if (this.questionType === 'single_choice') {
                            const firstCorrect = this.options.findIndex(o => o.is_correct);
                            this.options.forEach((opt, i) => {
                                opt.is_correct = i === (firstCorrect !== -1 ? firstCorrect : 0);
                            });
                        }
                    }
                },

                handleCorrectChange(index) {
                    if (this.questionType === 'single_choice') {
                        this.options.forEach((opt, i) => {
                            if (i !== index) opt.is_correct = false;
                        });
                    }
                },

                addOption() {
                    this.options.push({
                        text: '',
                        is_correct: false
                    });
                },

                removeOption(index) {
                    if (this.options.length <= 2) {
                        this.showMinWarning = true;
                        setTimeout(() => this.showMinWarning = false, 3000);
                        return;
                    }
                    this.options.splice(index, 1);
                }
            }
        }
    </script>
@endpush

@extends('backend.layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-white/5">
            <div class="px-6 py-5 border-b border-gray-200 dark:border-white/5 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Edit Quiz</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Slug: <code
                            class="bg-gray-100 dark:bg-gray-800 px-2 py-0.5 rounded text-xs">{{ $quiz->slug }}</code></p>
                </div>
                <span
                    class="px-3 py-1 rounded-full text-xs font-medium border
                {{ $quiz->status === 'published' ? 'bg-emerald-100 text-emerald-700 border-emerald-200' : '' }}
                {{ $quiz->status === 'draft' ? 'bg-amber-100 text-amber-700 border-amber-200' : '' }}
                {{ $quiz->status === 'archived' ? 'bg-gray-100 text-gray-600 border-gray-200' : '' }}">
                    {{ ucfirst($quiz->status) }}
                </span>
            </div>

            <form action="{{ role_route('role.quizzes.update', ['quiz' => $quiz]) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <x-form.input-text name="title" label="Quiz Title" value="{{ old('title', $quiz->title) }}"
                    placeholder="e.g., JavaScript Fundamentals" required />

                <x-form.textarea-input name="description" label="Description" rows="3"
                    placeholder="Brief description..." value="{{ old('description', $quiz->description) }}" />

                <x-form.select-input name="status" label="Status" :options="[
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'archived' => 'Archived',
                ]" :value="old('status', $quiz->status)" />

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <x-form.input-text name="time_limit_minutes" label="Time Limit (minutes)" type="number"
                        value="{{ old('time_limit_minutes', $quiz->time_limit_minutes) }}" placeholder="Optional"
                        min="1" max="300" />

                    <x-form.input-text name="passing_score" label="Passing Score (%)" type="number"
                        value="{{ old('passing_score', $quiz->passing_score) }}" min="0" max="100" required />

                    <x-form.input-text name="max_attempts" label="Max Attempts" type="number"
                        value="{{ old('max_attempts', $quiz->max_attempts) }}" placeholder="Unlimited" min="1" />
                </div>

                <div class="flex items-center gap-6 pt-2">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="shuffle_questions" value="1"
                            {{ old('shuffle_questions', $quiz->shuffle_questions) ? 'checked' : '' }}
                            class="w-5 h-5 text-brand-600 border-gray-300 dark:border-gray-600 rounded focus:ring-brand-500 dark:bg-gray-800">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Shuffle questions for each attempt</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="show_correct_answers" value="1"
                            {{ old('show_correct_answers', $quiz->show_correct_answers) ? 'checked' : '' }}
                            class="w-5 h-5 text-brand-600 border-gray-300 dark:border-gray-600 rounded focus:ring-brand-500 dark:bg-gray-800">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Show correct answers in results</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="show_explanation" value="1"
                            {{ old('show_explanation', $quiz->show_explanation) ? 'checked' : '' }}
                            class="w-5 h-5 text-brand-600 border-gray-300 dark:border-gray-600 rounded focus:ring-brand-500 dark:bg-gray-800">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Show explanations</span>
                    </label>
                </div>

                <div class="flex items-center justify-between gap-3 pt-4 border-t border-gray-200 dark:border-white/5">
                    <div class="flex gap-2">
                        @if ($quiz->status !== 'archived')
                            <form action="{{ role_route('role.quizzes.archive', ['quiz' => $quiz]) }}" method="POST"
                                onsubmit="return confirm('Archive this quiz?')">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-300 bg-white text-gray-700 text-sm font-semibold hover:bg-gray-100 hover:border-gray-400 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-700 transition-all duration-200">
                                    <i class="ti ti-archive text-base"></i>
                                    Archive
                                </button>
                            </form>
                        @endif
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ role_route('role.quizzes.index') }}"
                            class="px-5 py-2.5 text-gray-600 dark:text-gray-300 bg-gray-100 dark:hover:bg-gray-800 rounded-lg font-medium transition-colors">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-lg font-medium transition-colors shadow-sm">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

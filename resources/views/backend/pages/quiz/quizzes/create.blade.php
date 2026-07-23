@extends('backend.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-white/5">
        <div class="px-6 py-5 border-b border-gray-200 dark:border-white/5">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Quiz Details</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Create the quiz first, then add questions.</p>
        </div>
        
        <form action="{{ role_route('role.quizzes.store') }}" method="POST" class="p-6 space-y-6">
            @csrf
            
            <x-form.input-text 
                name="title" 
                label="Quiz Title" 
                value="{{ old('title') }}"
                placeholder="e.g., JavaScript Fundamentals"
                required />

                <x-form.textarea-input name="description" label="Description" rows="3"
                                placeholder="Brief description..." value="{{old('description')}}" />

            

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <x-form.input-text 
                    name="time_limit_minutes" 
                    label="Time Limit (minutes)" 
                    type="number"
                    value="{{ old('time_limit_minutes') }}"
                    placeholder="Optional"
                    min="1"
                    max="300" />
                
                <x-form.input-text 
                    name="passing_score" 
                    label="Passing Score (%)" 
                    type="number"
                    value="{{ old('passing_score', 60) }}"
                    min="0"
                    max="100"
                    required />

                <x-form.input-text 
                    name="max_attempts" 
                    label="Max Attempts" 
                    type="number"
                    value="{{ old('max_attempts') }}"
                    placeholder="Unlimited"
                    min="1" />
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="shuffle_questions" value="1" {{ old('shuffle_questions') ? 'checked' : '' }}
                        class="w-5 h-5 text-brand-600 border-gray-300 dark:border-gray-600 rounded focus:ring-brand-500 dark:bg-gray-800">
                    <span class="text-sm text-gray-700 dark:text-gray-300">Shuffle questions for each attempt</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="show_correct_answers" value="1" checked
                        class="w-5 h-5 text-brand-600 border-gray-300 dark:border-gray-600 rounded focus:ring-brand-500 dark:bg-gray-800">
                    <span class="text-sm text-sm text-gray-700 dark:text-gray-300">Show correct answers in results</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="show_explanation" value="1" checked
                        class="w-5 h-5 text-brand-600 border-gray-300 dark:border-gray-600 rounded focus:ring-brand-500 dark:bg-gray-800">
                    <span class="text-sm text-gray-700 dark:text-gray-300">Show explanations</span>
                </label>
            </div>

            <div class="flex items-center justify-between gap-3 pt-4 border-t border-gray-200 dark:border-white/5">
                <a href="{{ role_route('role.quizzes.index') }}" class="px-5 py-2.5 text-gray-600 dark:text-gray-300 bg-gray-100 dark:hover:bg-gray-800 rounded-lg font-medium transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-lg font-medium transition-colors shadow-sm">
                    Create Quiz & Add Questions
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
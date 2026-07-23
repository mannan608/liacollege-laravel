@extends('backend.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-5 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Quiz Details</h3>
            <p class="text-sm text-gray-500 mt-1">Create the quiz first, then add questions.</p>
        </div>
        
        <form action="{{ role_route('role.quizzes.store') }}" method="POST" class="p-6 space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Quiz Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all"
                    placeholder="e.g., JavaScript Fundamentals">
                @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="3"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all resize-none"
                    placeholder="Brief description of the quiz...">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Time Limit (minutes)</label>
                    <div class="relative">
                        <input type="number" name="time_limit_minutes" value="{{ old('time_limit_minutes') }}" min="1" max="300"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all"
                            placeholder="Optional">
                        <i class="ph ph-clock absolute right-3 top-3 text-gray-400"></i>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Leave empty for no timer</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Passing Score (%)</label>
                    <input type="number" name="passing_score" value="{{ old('passing_score', 60) }}" min="0" max="100" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Max Attempts</label>
                    <input type="number" name="max_attempts" value="{{ old('max_attempts') }}" min="1"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all"
                        placeholder="Unlimited">
                    <p class="mt-1 text-xs text-gray-500">Leave empty for unlimited</p>
                </div>
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="shuffle_questions" value="1" {{ old('shuffle_questions') ? 'checked' : '' }}
                        class="w-5 h-5 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                    <span class="text-sm text-gray-700">Shuffle questions for each attempt</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="show_correct_answers" value="1" checked
                        class="w-5 h-5 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                    <span class="text-sm text-gray-700">Show correct answers in results</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="show_explanation" value="1" checked
                        class="w-5 h-5 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                    <span class="text-sm text-gray-700">Show explanations</span>
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
                <a href="{{ role_route('role.quizzes.index') }}" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-lg font-medium transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg font-medium transition-colors shadow-sm">
                    Create Quiz & Add Questions
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
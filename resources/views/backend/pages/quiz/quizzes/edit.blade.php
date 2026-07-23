@extends('backend.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Edit Quiz</h3>
                <p class="text-sm text-gray-500 mt-1">Slug: <code class="bg-gray-100 px-2 py-0.5 rounded text-xs">{{ $quiz->slug }}</code></p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-medium border
                {{ $quiz->status === 'published' ? 'bg-emerald-100 text-emerald-700 border-emerald-200' : '' }}
                {{ $quiz->status === 'draft' ? 'bg-amber-100 text-amber-700 border-amber-200' : '' }}
                {{ $quiz->status === 'archived' ? 'bg-gray-100 text-gray-600 border-gray-200' : '' }}">
                {{ ucfirst($quiz->status) }}
            </span>
        </div>
        
        <form action="{{ route('admin.quizzes.update', $quiz) }}" method="POST" class="p-6 space-y-6">
            @csrf @method('PUT')
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Quiz Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $quiz->title) }}" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="3"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all resize-none">{{ old('description', $quiz->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all bg-white">
                    <option value="draft" {{ old('status', $quiz->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $quiz->status) === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="archived" {{ old('status', $quiz->status) === 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Time Limit (minutes)</label>
                    <input type="number" name="time_limit_minutes" value="{{ old('time_limit_minutes', $quiz->time_limit_minutes) }}" min="1" max="300"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Passing Score (%)</label>
                    <input type="number" name="passing_score" value="{{ old('passing_score', $quiz->passing_score) }}" min="0" max="100" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Max Attempts</label>
                    <input type="number" name="max_attempts" value="{{ old('max_attempts', $quiz->max_attempts) }}" min="1"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all">
                </div>
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="shuffle_questions" value="1" {{ old('shuffle_questions', $quiz->shuffle_questions) ? 'checked' : '' }}
                        class="w-5 h-5 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                    <span class="text-sm text-gray-700">Shuffle questions</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="show_correct_answers" value="1" {{ old('show_correct_answers', $quiz->show_correct_answers) ? 'checked' : '' }}
                        class="w-5 h-5 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                    <span class="text-sm text-gray-700">Show correct answers</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="show_explanation" value="1" {{ old('show_explanation', $quiz->show_explanation) ? 'checked' : '' }}
                        class="w-5 h-5 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                    <span class="text-sm text-gray-700">Show explanations</span>
                </label>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <div class="flex gap-2">
                    @if($quiz->status !== 'archived')
                        <form action="{{ route('admin.quizzes.archive', $quiz) }}" method="POST" onsubmit="return confirm('Archive this quiz?')">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg text-sm font-medium transition-colors">
                                <i class="ph ph-archive-box mr-1"></i> Archive
                            </button>
                        </form>
                    @endif
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.quizzes.index') }}" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-lg font-medium transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg font-medium transition-colors shadow-sm">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
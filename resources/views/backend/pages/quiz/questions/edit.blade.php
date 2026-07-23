@extends('backend.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-5 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Edit Question #{{ $question->order }}</h3>
        </div>
        
        <form action="{{ route('admin.quizzes.questions.update', [$quiz, $question]) }}" method="POST" class="p-6 space-y-6">
            @csrf @method('PUT')
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Question Text <span class="text-red-500">*</span></label>
                <textarea name="question_text" rows="3" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all resize-none">{{ old('question_text', $question->question_text) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Question Type</label>
                    <select name="type" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all bg-white">
                        <option value="single_choice" {{ old('type', $question->type) === 'single_choice' ? 'selected' : '' }}>Single Choice</option>
                        <option value="multiple_choice" {{ old('type', $question->type) === 'multiple_choice' ? 'selected' : '' }}>Multiple Choice</option>
                        <option value="true_false" {{ old('type', $question->type) === 'true_false' ? 'selected' : '' }}>True / False</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Points</label>
                    <input type="number" name="points" value="{{ old('points', $question->points) }}" min="1" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Explanation</label>
                <textarea name="explanation" rows="2"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all resize-none">{{ old('explanation', $question->explanation) }}</textarea>
            </div>

            {{-- Options --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-3">Answer Options</label>
                <div class="space-y-3">
                    @foreach($question->options as $i => $option)
                    <div class="option-row flex items-center gap-3">
                        <div class="flex-shrink-0">
                            <input type="{{ $question->type === 'multiple_choice' ? 'checkbox' : 'radio' }}" 
                                name="options[{{ $i }}][is_correct]" value="1" 
                                {{ $option->is_correct ? 'checked' : '' }}
                                class="w-5 h-5 text-emerald-600 border-gray-300 focus:ring-emerald-500">
                        </div>
                        <input type="text" name="options[{{ $i }}][text]" value="{{ $option->option_text }}" required
                            class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all">
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.quizzes.questions.index', $quiz) }}" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-lg font-medium transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg font-medium transition-colors shadow-sm">
                    Update Question
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
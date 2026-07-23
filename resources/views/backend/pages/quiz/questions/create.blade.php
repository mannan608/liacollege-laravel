@extends('backend.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-5 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">New Question</h3>
        </div>
        
        <form action="{{ role_route('role.quizzes.questions.store', ['quiz' => $quiz]) }}" method="POST" class="p-6 space-y-6" id="question-form">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Question Text <span class="text-red-500">*</span></label>
                <textarea name="question_text" rows="3" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all resize-none"
                    placeholder="Enter your question here...">{{ old('question_text') }}</textarea>
                @error('question_text')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Question Type</label>
                    <select name="type" id="question-type" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all bg-white">
                        <option value="single_choice" {{ old('type') === 'single_choice' ? 'selected' : '' }}>Single Choice</option>
                        <option value="multiple_choice" {{ old('type') === 'multiple_choice' ? 'selected' : '' }}>Multiple Choice</option>
                        <option value="true_false" {{ old('type') === 'true_false' ? 'selected' : '' }}>True / False</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Points</label>
                    <input type="number" name="points" value="{{ old('points', 1) }}" min="1" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Explanation (shown after quiz)</label>
                <textarea name="explanation" rows="2"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all resize-none"
                    placeholder="Explain why the correct answer is right...">{{ old('explanation') }}</textarea>
            </div>

            {{-- Options Section --}}
            <div>
                <div class="flex items-center justify-between mb-3">
                    <label class="block text-sm font-medium text-gray-700">Answer Options</label>
                    <button type="button" id="add-option" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium flex items-center gap-1">
                        <i class="ph ph-plus-circle"></i> Add Option
                    </button>
                </div>
                
                <div id="options-container" class="space-y-3">
                    @if(old('options'))
                        @foreach(old('options') as $i => $option)
                        <div class="option-row flex items-center gap-3">
                            <div class="flex-shrink-0">
                                <input type="{{ old('type') === 'multiple_choice' ? 'checkbox' : 'radio' }}" 
                                    name="options[{{ $i }}][is_correct]" value="1" 
                                    {{ $option['is_correct'] ? 'checked' : '' }}
                                    class="w-5 h-5 text-emerald-600 border-gray-300 focus:ring-emerald-500 correct-option">
                            </div>
                            <input type="text" name="options[{{ $i }}][text]" value="{{ $option['text'] }}" required
                                class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all"
                                placeholder="Option text">
                            <button type="button" class="remove-option p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                <i class="ph ph-trash"></i>
                            </button>
                        </div>
                        @endforeach
                    @else
                        {{-- Default 4 options --}}
                        @for($i = 0; $i < 4; $i++)
                        <div class="option-row flex items-center gap-3">
                            <div class="flex-shrink-0">
                                <input type="radio" name="options[{{ $i }}][is_correct]" value="1" 
                                    {{ $i === 0 ? 'checked' : '' }}
                                    class="w-5 h-5 text-emerald-600 border-gray-300 focus:ring-emerald-500 correct-option">
                            </div>
                            <input type="text" name="options[{{ $i }}][text]" required
                                class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all"
                                placeholder="Option {{ $i + 1 }}">
                            <button type="button" class="remove-option p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                <i class="ph ph-trash"></i>
                            </button>
                        </div>
                        @endfor
                    @endif
                </div>
                @error('options')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
                <a href="{{ role_route('role.quizzes.questions.index', ['quiz' => $quiz]) }}" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-lg font-medium transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg font-medium transition-colors shadow-sm">
                    Save Question
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const container = document.getElementById('options-container');
    const typeSelect = document.getElementById('question-type');
    let optionCount = container.children.length;

    // Add option
    document.getElementById('add-option').addEventListener('click', () => {
        const type = typeSelect.value === 'multiple_choice' ? 'checkbox' : 'radio';
        const row = document.createElement('div');
        row.className = 'option-row flex items-center gap-3';
        row.innerHTML = `
            <div class="flex-shrink-0">
                <input type="${type}" name="options[${optionCount}][is_correct]" value="1" 
                    class="w-5 h-5 text-emerald-600 border-gray-300 focus:ring-emerald-500 correct-option">
            </div>
            <input type="text" name="options[${optionCount}][text]" required
                class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all"
                placeholder="Option text">
            <button type="button" class="remove-option p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                <i class="ph ph-trash"></i>
            </button>
        `;
        container.appendChild(row);
        optionCount++;
    });

    // Remove option
    container.addEventListener('click', (e) => {
        if (e.target.closest('.remove-option')) {
            const row = e.target.closest('.option-row');
            if (container.children.length > 2) {
                row.remove();
            } else {
                alert('Minimum 2 options required');
            }
        }
    });

    // Change input type when question type changes
    typeSelect.addEventListener('change', () => {
        const isMultiple = typeSelect.value === 'multiple_choice';
        container.querySelectorAll('.correct-option').forEach(input => {
            const newInput = document.createElement('input');
            newInput.type = isMultiple ? 'checkbox' : 'radio';
            newInput.name = input.name;
            newInput.value = '1';
            newInput.checked = input.checked;
            newInput.className = input.className;
            input.parentNode.replaceChild(newInput, input);
        });
    });

    // True/False preset
    typeSelect.addEventListener('change', () => {
        if (typeSelect.value === 'true_false') {
            container.innerHTML = `
                <div class="option-row flex items-center gap-3">
                    <div class="flex-shrink-0">
                        <input type="radio" name="options[0][is_correct]" value="1" checked
                            class="w-5 h-5 text-emerald-600 border-gray-300 focus:ring-emerald-500 correct-option">
                    </div>
                    <input type="text" name="options[0][text]" value="True" readonly
                        class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-600">
                </div>
                <div class="option-row flex items-center gap-3">
                    <div class="flex-shrink-0">
                        <input type="radio" name="options[1][is_correct]" value="1"
                            class="w-5 h-5 text-emerald-600 border-gray-300 focus:ring-emerald-500 correct-option">
                    </div>
                    <input type="text" name="options[1][text]" value="False" readonly
                        class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-600">
                </div>
            `;
            optionCount = 2;
        }
    });
</script>
@endpush

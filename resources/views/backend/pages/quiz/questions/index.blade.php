@extends('backend.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <a href="{{ role_route('role.quizzes.index') }}" class="text-sm text-gray-500 hover:text-gray-700 flex items-center gap-1">
            <i class="ph ph-arrow-left"></i> Back to Quizzes
        </a>
        <a href="{{ role_route('role.quizzes.questions.create', ['quiz' => $quiz]) }}" 
           class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-lg font-medium transition-colors shadow-sm">
            <i class="ph ph-plus"></i>
            Add Question
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="font-semibold text-gray-800">All Questions ({{ $quiz->questions->count() }})</h3>
            <p class="text-sm text-gray-500 mt-1">Drag to reorder. Total points: <strong class="text-gray-800">{{ $quiz->totalPoints() }}</strong></p>
        </div>

        @if($quiz->questions->count() > 0)
        <div id="questions-list" class="divide-y divide-gray-100">
            @foreach($quiz->questions as $index => $question)
            <div class="question-item group hover:bg-gray-50 transition-colors" data-id="{{ $question->id }}">
                <div class="px-6 py-5 flex items-start gap-4">
                    {{-- Drag Handle --}}
                    <div class="drag-handle cursor-grab active:cursor-grabbing text-gray-300 hover:text-gray-500 pt-1">
                        <i class="ph ph-dots-six-vertical text-xl"></i>
                    </div>
                    
                    {{-- Question Number --}}
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-sm font-bold">
                        {{ $index + 1 }}
                    </div>

                    {{-- Content --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1">
                                <p class="font-medium text-gray-900">{{ $question->question_text }}</p>
                                <div class="flex items-center gap-3 mt-2 text-sm text-gray-500">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                        {{ str_replace('_', ' ', $question->type) }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="ph ph-star text-amber-400"></i>
                                        {{ $question->points }} pts
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="ph ph-list-numbers"></i>
                                        {{ $question->options->count() }} options
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ role_route('role.quizzes.questions.edit', ['quiz' => $quiz, 'question' => $question]) }}" 
                                   class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors" title="Edit">
                                    <i class="ph ph-pencil text-lg"></i>
                                </a>
                                <form action="{{ role_route('role.quizzes.questions.destroy', ['quiz' => $quiz, 'question' => $question]) }}" method="POST" class="inline" onsubmit="return confirm('Delete this question?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                                        <i class="ph ph-trash text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Options Preview --}}
                        <div class="mt-3 space-y-1.5">
                            @foreach($question->options as $option)
                            <div class="flex items-center gap-2 text-sm {{ $option->is_correct ? 'text-emerald-700 font-medium' : 'text-gray-500' }}">
                                <span class="w-4 h-4 rounded-full border flex items-center justify-center {{ $option->is_correct ? 'border-emerald-500 bg-emerald-500 text-white' : 'border-gray-300' }}">
                                    @if($option->is_correct)
                                        <i class="ph ph-check text-xs"></i>
                                    @endif
                                </span>
                                {{ $option->option_text }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-gray-400">
            <i class="ph ph-question text-5xl mb-4 block"></i>
            <p class="text-lg font-medium text-gray-600">No questions yet</p>
            <p class="text-sm mt-1">Add your first question to get started</p>
            <a href="{{ role_route('role.quizzes.questions.create', ['quiz' => $quiz]) }}" class="inline-flex items-center gap-2 mt-4 text-emerald-600 hover:text-emerald-700 font-medium">
                <i class="ph ph-plus"></i> Add Question
            </a>
        </div>
        @endif
    </div>

    {{-- Publish Button --}}
    @if($quiz->status === 'draft' && $quiz->questions->count() > 0)
    <div class="mt-6 bg-emerald-50 border border-emerald-200 rounded-xl p-6 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <i class="ph ph-rocket-launch text-2xl text-emerald-600"></i>
            <div>
                <p class="font-medium text-emerald-900">Ready to publish?</p>
                <p class="text-sm text-emerald-700">This quiz has {{ $quiz->questions->count() }} questions and is ready to go live.</p>
            </div>
        </div>
        <form action="{{ role_route('role.quizzes.publish', ['quiz' => $quiz]) }}" method="POST">
            @csrf
            <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg font-medium transition-colors shadow-sm">
                Publish Quiz
            </button>
        </form>
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    const list = document.getElementById('questions-list');
    if (list) {
        new Sortable(list, {
            handle: '.drag-handle',
            animation: 150,
            onEnd: function() {
                const orders = {};
                list.querySelectorAll('.question-item').forEach((item, index) => {
                    orders[item.dataset.id] = index + 1;
                });
                
                fetch('{{ role_route("role.quizzes.questions.reorder", ["quiz" => $quiz]) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ orders })
                });
            }
        });
    }
</script>
@endpush

@extends('backend.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6">
    {{-- Navigation --}}
    <div class="flex items-center justify-between gap-4 mb-8">
        <a href="{{ role_route('role.quizzes.index') }}" 
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors duration-200 group">
            <svg class="w-4 h-4 transition-transform duration-200 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Quizzes
        </a>
        <a href="{{ role_route('role.quizzes.questions.create', ['quiz' => $quiz]) }}" 
           class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-sm font-semibold rounded-xl shadow-sm shadow-slate-200/50 transition-all duration-200 hover:shadow-md hover:shadow-slate-300/30 active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Add Question
        </a>
    </div>

    {{-- Main Card --}}
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm shadow-slate-100/50 overflow-hidden">
        {{-- Header --}}
        <div class="px-6 py-5 border-b border-slate-200/80 bg-gradient-to-r from-slate-50/50 to-white flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <h3 class="text-base font-semibold text-slate-800 flex items-center gap-2">
                    All Questions
                    <span class="inline-flex items-center justify-center px-2.5 py-0.5 text-xs font-medium bg-slate-200/80 text-slate-700 rounded-full">
                        {{ $quiz->questions->count() }}
                    </span>
                </h3>
            </div>
            <div class="flex items-center gap-2 text-sm">
                <span class="text-slate-500">Total points:</span>
                <span class="font-semibold text-slate-800 bg-amber-50 px-3 py-1 rounded-full text-xs flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    {{ $quiz->totalPoints() }}
                </span>
            </div>
        </div>

        {{-- Questions List --}}
        @if($quiz->questions->count() > 0)
        <div id="questions-list" class="divide-y divide-slate-100/80" x-data="questionManager()">
            @foreach($quiz->questions as $index => $question)
            <div class="question-item group relative px-6 py-5 hover:bg-slate-50/60 transition-all duration-150"
                 data-id="{{ $question->id }}"
                 x-data="{ isHovered: false }"
                 @mouseenter="isHovered = true"
                 @mouseleave="isHovered = false">
                
                <div class="flex items-start gap-4">
                    {{-- Drag Handle --}}
                    <div class="drag-handle flex-shrink-0 mt-1 cursor-grab active:cursor-grabbing text-slate-300 hover:text-slate-500 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4zM7 8a2 2 0 1 0 0 4 2 2 0 0 0 0-4zM7 14a2 2 0 1 0 0 4 2 2 0 0 0 0-4zM13 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4zM13 8a2 2 0 1 0 0 4 2 2 0 0 0 0-4zM13 14a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                        </svg>
                    </div>

                    {{-- Question Number --}}
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center text-sm font-bold transition-colors duration-200 group-hover:bg-slate-200/70">
                        {{ $index + 1 }}
                    </div>

                    {{-- Content --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-slate-800 leading-relaxed">
                                    {{ $question->question_text }}
                                </p>
                                <div class="flex flex-wrap items-center gap-2 mt-2">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-700">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                        </svg>
                                        {{ str_replace('_', ' ', $question->type) }}
                                    </span>
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-amber-50 text-amber-700">
                                        <svg class="w-3.5 h-3.5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        {{ $question->points }} pts
                                    </span>
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                        </svg>
                                        {{ $question->options->count() }} options
                                    </span>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="flex items-center gap-1 transition-opacity duration-200"
                                 :class="isHovered ? 'opacity-100' : 'opacity-0'">
                                <a href="{{ role_route('role.quizzes.questions.edit', ['quiz' => $quiz, 'question' => $question]) }}"
                                   class="p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 rounded-lg transition-all duration-200"
                                   title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form action="{{ role_route('role.quizzes.questions.destroy', ['quiz' => $quiz, 'question' => $question]) }}"
                                      method="POST"
                                      class="inline"
                                      x-data
                                      @submit.prevent="if(confirm('Delete this question?')) $el.submit()">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="p-2 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200"
                                            title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Options Preview --}}
                        @if($question->options->count() > 0)
                        <div class="mt-3 flex flex-wrap gap-1.5">
                            @foreach($question->options as $option)
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs
                                {{ $option->is_correct ? 'bg-emerald-50 text-emerald-700 border border-emerald-200/60' : 'bg-slate-50 text-slate-600 border border-slate-200/60' }}">
                                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full
                                    {{ $option->is_correct ? 'bg-emerald-500 text-white' : 'bg-slate-200 text-slate-500' }}">
                                    @if($option->is_correct)
                                    <svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    @endif
                                </span>
                                {{ $option->option_text }}
                            </span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        {{-- Empty State --}}
        <div class="text-center py-16 px-4">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-slate-100 mb-4">
                <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <p class="text-base font-semibold text-slate-700">No questions yet</p>
            <p class="text-sm text-slate-500 mt-1">Add your first question to get started</p>
            <a href="{{ role_route('role.quizzes.questions.create', ['quiz' => $quiz]) }}"
               class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-slate-700 hover:text-slate-900 transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                Add Question
            </a>
        </div>
        @endif
    </div>

    {{-- Publish Banner --}}
    @if($quiz->status === 'draft' && $quiz->questions->count() > 0)
    <div class="mt-6 bg-gradient-to-r from-emerald-50 to-emerald-50/60 border border-emerald-200/70 rounded-2xl p-6 flex flex-wrap items-center justify-between gap-4 shadow-sm">
        <div class="flex items-center gap-4">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-emerald-100/80 text-emerald-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <div>
                <p class="font-semibold text-emerald-900 text-sm">Ready to publish?</p>
                <p class="text-sm text-emerald-700/80">This quiz has <strong class="text-emerald-900">{{ $quiz->questions->count() }}</strong> questions and is ready to go live.</p>
            </div>
        </div>
        <form action="{{ role_route('role.quizzes.publish', ['quiz' => $quiz]) }}" method="POST">
            @csrf
            <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-xl shadow-sm shadow-emerald-200/50 transition-all duration-200 hover:shadow-md hover:shadow-emerald-300/30 active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
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
    document.addEventListener('alpine:init', () => {
        Alpine.data('questionManager', () => ({
            init() {
                const list = document.getElementById('questions-list');
                if (!list) return;

                new Sortable(list, {
                    handle: '.drag-handle',
                    animation: 200,
                    ghostClass: 'bg-slate-100/80 rounded-xl',
                    dragClass: 'shadow-lg',
                    onEnd: (evt) => {
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
                        }).catch(err => console.warn('Reorder failed:', err));
                    }
                });
            }
        }));
    });
</script>
@endpush
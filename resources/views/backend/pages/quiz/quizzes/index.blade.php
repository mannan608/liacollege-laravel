@extends('backend.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3 text-sm text-gray-500">
            <span>Total: <strong class="text-gray-800">{{ $quizzes->total() }}</strong></span>
        </div>
        <a href="{{ role_route('role.quizzes.create') }}" 
           class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-lg font-medium transition-colors shadow-sm">
            <i class="ph ph-plus"></i>
            Create New Quiz
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-4">Quiz</th>
                    <th class="text-center text-xs font-semibold text-gray-500 uppercase tracking-wider px-4 py-4">Questions</th>
                    <th class="text-center text-xs font-semibold text-gray-500 uppercase tracking-wider px-4 py-4">Attempts</th>
                    <th class="text-center text-xs font-semibold text-gray-500 uppercase tracking-wider px-4 py-4">Status</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-4 py-4">Created</th>
                    <th class="text-right text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-4">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($quizzes as $quiz)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white font-bold text-sm">
                                {{ strtoupper(substr($quiz->title, 0, 2)) }}
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">{{ $quiz->title }}</p>
                                <p class="text-sm text-gray-500">by {{ $quiz->creator->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="text-center px-4 py-4">
                        <span class="inline-flex items-center gap-1 text-sm text-gray-600">
                            <i class="ph ph-question text-gray-400"></i>
                            {{ $quiz->questions_count }}
                        </span>
                    </td>
                    <td class="text-center px-4 py-4">
                        <span class="inline-flex items-center gap-1 text-sm text-gray-600">
                            <i class="ph ph-users text-gray-400"></i>
                            {{ $quiz->attempts_count }}
                        </span>
                    </td>
                    <td class="text-center px-4 py-4">
                        @php
                            $statusColors = [
                                'draft' => 'bg-amber-100 text-amber-700 border-amber-200',
                                'published' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                                'archived' => 'bg-gray-100 text-gray-600 border-gray-200',
                            ];
                        @endphp
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium border {{ $statusColors[$quiz->status] }}">
                            <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                            {{ ucfirst($quiz->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-500">
                        {{ $quiz->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            @if($quiz->status === 'draft')
                                <form action="{{ role_route('role.quizzes.publish', ['quiz' => $quiz]) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="p-2 text-emerald-600 hover:bg-emerald-50 rounded-lg transition-colors" title="Publish">
                                        <i class="ph ph-globe text-lg"></i>
                                    </button>
                                </form>
                            @endif
                            <a href="{{ role_route('role.quizzes.show', ['quiz' => $quiz]) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="View">
                                show
                            </a>
                            <a href="{{ role_route('role.quizzes.edit', ['quiz' => $quiz]) }}" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors" title="Edit">
                                <i class="ph ph-pencil text-lg"></i>
                            </a>
                            <a href="{{ role_route('role.quizzes.questions.index', ['quiz' => $quiz]) }}" class="p-2 text-purple-600 hover:bg-purple-50 rounded-lg transition-colors" title="Questions">
                                question
                            </a>
                            <form action="{{ role_route('role.quizzes.destroy', ['quiz' => $quiz]) }}" method="POST" class="inline" onsubmit="return confirm('Delete this quiz?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                                    delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-12 text-gray-400">
                        <i class="ph ph-exam text-4xl mb-3 block"></i>
                        No quizzes yet. Create your first one!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $quizzes->links() }}
    </div>
</div>
@endsection

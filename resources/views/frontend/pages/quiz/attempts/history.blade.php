@extends('frontend.pages.student.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">My Quiz History</h1>
            <p class="text-gray-500 mt-1">Track your progress across all quizzes</p>
        </div>
        <a href="{{ route('quizzes.index') }}" class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 font-medium">
            <i class="ph ph-arrow-left"></i> Browse More Quizzes
        </a>
    </div>

    @if($attempts->count() > 0)
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase px-6 py-4">Quiz</th>
                    <th class="text-center text-xs font-semibold text-gray-500 uppercase px-4 py-4">Attempt</th>
                    <th class="text-center text-xs font-semibold text-gray-500 uppercase px-4 py-4">Score</th>
                    <th class="text-center text-xs font-semibold text-gray-500 uppercase px-4 py-4">Grade</th>
                    <th class="text-center text-xs font-semibold text-gray-500 uppercase px-4 py-4">Status</th>
                    <th class="text-right text-xs font-semibold text-gray-500 uppercase px-6 py-4">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($attempts as $attempt)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <a href="{{ route('quizzes.show', $attempt->quiz) }}" class="font-medium text-gray-900 hover:text-emerald-600 transition-colors">
                            {{ $attempt->quiz->title }}
                        </a>
                    </td>
                    <td class="text-center px-4 py-4 text-sm text-gray-600">#{{ $attempt->attempt_number }}</td>
                    <td class="text-center px-4 py-4">
                        <span class="font-bold {{ $attempt->percentage >= $attempt->quiz->passing_score ? 'text-emerald-600' : 'text-red-600' }}">
                            {{ $attempt->percentage }}%
                        </span>
                        <span class="text-xs text-gray-400 block">{{ $attempt->score }}/{{ $attempt->total_points }}</span>
                    </td>
                    <td class="text-center px-4 py-4">
                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold
                            {{ $attempt->grade === 'A' ? 'bg-emerald-100 text-emerald-700' : '' }}
                            {{ $attempt->grade === 'B' ? 'bg-blue-100 text-blue-700' : '' }}
                            {{ $attempt->grade === 'C' ? 'bg-amber-100 text-amber-700' : '' }}
                            {{ $attempt->grade === 'D' || $attempt->grade === 'F' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ $attempt->grade }}
                        </span>
                    </td>
                    <td class="text-center px-4 py-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium
                            {{ $attempt->status === 'completed' ? 'bg-emerald-100 text-emerald-700' : '' }}
                            {{ $attempt->status === 'timed_out' ? 'bg-amber-100 text-amber-700' : '' }}
                            {{ $attempt->status === 'abandoned' ? 'bg-gray-100 text-gray-600' : '' }}">
                            <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                            {{ ucfirst(str_replace('_', ' ', $attempt->status)) }}
                        </span>
                    </td>
                    <td class="text-right px-6 py-4">
                        <div class="flex items-center justify-end gap-3">
                            <span class="text-sm text-gray-500">{{ $attempt->completed_at->format('M d, Y') }}</span>
                            <a href="{{ route('attempts.result', $attempt) }}" class="p-2 text-emerald-600 hover:bg-emerald-50 rounded-lg transition-colors" title="View Result">
                                <i class="ph ph-eye text-lg"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $attempts->links() }}
    </div>
    @else
    <div class="text-center py-20 bg-white rounded-2xl border border-gray-200">
        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="ph ph-chart-bar text-3xl text-gray-400"></i>
        </div>
        <h3 class="text-lg font-medium text-gray-900">No attempts yet</h3>
        <p class="text-gray-500 mt-1 mb-6">Start taking quizzes to see your history here</p>
        <a href="{{ route('quizzes.index') }}" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-medium transition-colors">
            <i class="ph ph-rocket-launch"></i> Browse Quizzes
        </a>
    </div>
    @endif
</div>
@endsection
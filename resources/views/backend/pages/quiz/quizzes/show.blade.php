@extends('backend.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">
    {{-- Header Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-start justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $quiz->title }}</h1>
                <p class="text-gray-500 mt-1">{{ $quiz->description ?: 'No description' }}</p>
                <div class="flex items-center gap-4 mt-4 text-sm text-gray-500">
                    <span class="flex items-center gap-1.5">
                        <i class="ph ph-clock"></i>
                        {{ $quiz->time_limit_minutes ? $quiz->time_limit_minutes . ' min' : 'No timer' }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <i class="ph ph-trophy"></i>
                        Pass: {{ $quiz->passing_score }}%
                    </span>
                    <span class="flex items-center gap-1.5">
                        <i class="ph ph-arrow-counter-clockwise"></i>
                        {{ $quiz->max_attempts ? $quiz->max_attempts . ' attempts' : 'Unlimited' }}
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ role_route('role.quizzes.edit', ['quiz' => $quiz]) }}" class="px-4 py-2 bg-amber-50 text-amber-700 rounded-lg hover:bg-amber-100 transition-colors text-sm font-medium">
                    <i class="ph ph-pencil mr-1"></i> Edit
                </a>
                <a href="{{ role_route('role.quizzes.questions.index', ['quiz' => $quiz]) }}" class="px-4 py-2 bg-purple-50 text-purple-700 rounded-lg hover:bg-purple-100 transition-colors text-sm font-medium">
                    <i class="ph ph-list-dashes mr-1"></i> Questions ({{ $quiz->questions_count }})
                </a>
            </div>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i class="ph ph-users text-xl"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900">{{ $quiz->attempts->count() }}</p>
                    <p class="text-sm text-gray-500">Total Attempts</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i class="ph ph-check-circle text-xl"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900">
                        {{ $quiz->attempts->where('status', 'completed')->count() }}
                    </p>
                    <p class="text-sm text-gray-500">Completed</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                    <i class="ph ph-trend-up text-xl"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900">
                        {{ $quiz->attempts->where('status', 'completed')->avg('percentage') ? round($quiz->attempts->where('status', 'completed')->avg('percentage'), 1) . '%' : 'N/A' }}
                    </p>
                    <p class="text-sm text-gray-500">Avg Score</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center">
                    <i class="ph ph-question text-xl"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900">{{ $quiz->questions_count }}</p>
                    <p class="text-sm text-gray-500">Questions</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Attempts --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="font-semibold text-gray-800">Recent Attempts</h3>
        </div>
        @if($quiz->attempts->count() > 0)
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase px-6 py-3">User</th>
                    <th class="text-center text-xs font-semibold text-gray-500 uppercase px-4 py-3">Score</th>
                    <th class="text-center text-xs font-semibold text-gray-500 uppercase px-4 py-3">Grade</th>
                    <th class="text-center text-xs font-semibold text-gray-500 uppercase px-4 py-3">Status</th>
                    <th class="text-right text-xs font-semibold text-gray-500 uppercase px-6 py-3">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($quiz->attempts->take(10) as $attempt)
                <tr>
                    <td class="px-6 py-3 text-sm font-medium text-gray-900">{{ $attempt->user->name }}</td>
                    <td class="text-center px-4 py-3 text-sm text-gray-600">{{ $attempt->score }}/{{ $attempt->total_points }}</td>
                    <td class="text-center px-4 py-3">
                        <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $attempt->grade === 'A' ? 'bg-emerald-100 text-emerald-700' : '' }}
                            {{ $attempt->grade === 'B' ? 'bg-blue-100 text-blue-700' : '' }}
                            {{ $attempt->grade === 'C' ? 'bg-amber-100 text-amber-700' : '' }}
                            {{ $attempt->grade === 'D' || $attempt->grade === 'F' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ $attempt->grade }}
                        </span>
                    </td>
                    <td class="text-center px-4 py-3 text-sm text-gray-500">{{ ucfirst($attempt->status) }}</td>
                    <td class="text-right px-6 py-3 text-sm text-gray-500">{{ $attempt->created_at->format('M d, H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center py-12 text-gray-400">
            <i class="ph ph-chart-bar text-4xl mb-3 block"></i>
            No attempts yet
        </div>
        @endif
    </div>
</div>
@endsection

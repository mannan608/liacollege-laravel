@extends('backend.layouts.app')

@section('content')
    @php
        $role = request()->route('role');
    @endphp

    <div class="mb-6">
        <a href="{{ role_route('role.help.reports.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Reports
        </a>
    </div>

    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-100 dark:border-white/5 shadow-sm overflow-hidden">
        <div class="px-8 py-6 border-b border-gray-100 dark:border-white/5 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h3 class="text-xl font-semibold text-gray-800 dark:text-white/90">Report #{{ $report->id }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Submitted on {{ $report->created_at->format('l, j F Y \a\t g:ia') }}
                </p>
            </div>
            <div class="flex items-center gap-3">
                @php
                    $statusColors = [
                        'pending' => 'bg-yellow-100 text-yellow-700',
                        'in_progress' => 'bg-blue-100 text-blue-700',
                        'resolved' => 'bg-green-100 text-green-700',
                        'closed' => 'bg-gray-100 text-gray-700',
                    ];
                    $statusColor = $statusColors[$report->status] ?? $statusColors['pending'];
                @endphp
                <span class="px-3 py-1.5 text-sm font-medium rounded-full {{ $statusColor }}">
                    {{ ucwords(str_replace('_', ' ', $report->status)) }}
                </span>
                <a href="{{ role_route('role.help.reports.edit', ['report' => $report]) }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-slate-800 hover:bg-slate-700 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </a>
            </div>
        </div>

        <div class="p-8 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-50 dark:bg-gray-800/50 p-5 rounded-xl">
                    <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Student Information</h4>
                    <div class="space-y-2">
                        <div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Name:</span>
                            <span class="ml-2 text-sm font-medium text-gray-800 dark:text-white/90">{{ $report->user?->name ?? 'N/A' }}</span>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Email:</span>
                            <span class="ml-2 text-sm text-gray-800 dark:text-white/90">{{ $report->user?->email ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800/50 p-5 rounded-xl">
                    <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Submission Details</h4>
                    <div class="space-y-2">
                        <div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Authorised:</span>
                            <span class="ml-2 text-sm font-medium text-gray-800 dark:text-white/90">{{ $report->authorisation ? 'Yes' : 'No' }}</span>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Previously contacted:</span>
                            <span class="ml-2 text-sm font-medium text-gray-800 dark:text-white/90">{{ ucfirst($report->contacted ?? 'N/A') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            @if($report->issue_types && count($report->issue_types) > 0)
                <div>
                    <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Issue Types</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($report->issue_types as $type)
                            <span class="px-3 py-1.5 text-xs bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 rounded-full">{{ $type }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-50 dark:bg-gray-800/50 p-5 rounded-xl">
                    <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Recognised Code</h4>
                    <p class="text-sm text-gray-800 dark:text-white/90">{{ $report->recognised_code ?: 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800/50 p-5 rounded-xl">
                    <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Course/Unit Title</h4>
                    <p class="text-sm text-gray-800 dark:text-white/90">{{ $report->course_title ?: 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800/50 p-5 rounded-xl">
                    <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Year Enrolled</h4>
                    <p class="text-sm text-gray-800 dark:text-white/90">{{ $report->year_enrolled ?: 'N/A' }}</p>
                </div>
            </div>

            @if($report->question_id)
                <div class="bg-gray-50 dark:bg-gray-800/50 p-5 rounded-xl">
                    <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Question ID (QID)</h4>
                    <p class="text-sm text-gray-800 dark:text-white/90 font-mono">{{ $report->question_id }}</p>
                </div>
            @endif

            <div class="bg-gray-50 dark:bg-gray-800/50 p-6 rounded-xl">
                <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Description</h4>
                <p class="text-sm text-gray-800 dark:text-white/90 whitespace-pre-wrap leading-relaxed">{{ $report->description ?: 'N/A' }}</p>
            </div>

            @if($report->admin_notes)
                <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 p-6 rounded-xl">
                    <h4 class="text-xs font-semibold text-amber-700 dark:text-amber-400 uppercase tracking-wider mb-3">Admin Notes</h4>
                    <p class="text-sm text-amber-800 dark:text-amber-300 whitespace-pre-wrap leading-relaxed">{{ $report->admin_notes }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@extends('backend.layouts.app')

@section('content')
    <div class="">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Technical Issue Reports</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">View and manage technical issue reports submitted by students.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                <p class="text-green-800 font-medium">{{ session('success') }}</p>
            </div>
        @endif

        @php
            $role = request()->route('role');
        @endphp

        <div class="overflow-hidden rounded-xl border border-gray-100 dark:border-white/5 bg-white dark:bg-gray-900">
            <div class="max-w-full overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 dark:bg-white/2 border-b border-gray-100 dark:border-white/5">
                        <tr>
                            <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
                            <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Contacted</th>
                            <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                            <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted</th>
                            <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-white/5">
                        @forelse($reports as $report)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-white/1 transition-colors">
                                <td class="px-5 py-4">
                                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded text-xs font-mono">#{{ $report->id }}</span>
                                </td>
                                <td class="px-5 py-4">
                                    <div>
                                        <div class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ $report->user?->name ?? 'N/A' }}</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">{{ $report->user?->email ?? '' }}</div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-sm">
                                    @if($report->contacted === 'yes')
                                        <span class="px-2 py-1 text-xs bg-amber-100 text-amber-700 rounded-full">Yes</span>
                                    @else
                                        <span class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded-full">No</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-sm text-gray-600 dark:text-gray-300">
                                    {{ $report->course_title ?: ($report->recognised_code ?: 'N/A') }}
                                </td>
                                <td class="px-5 py-4">
                                    @php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-100 text-yellow-700',
                                            'in_progress' => 'bg-blue-100 text-blue-700',
                                            'resolved' => 'bg-green-100 text-green-700',
                                            'closed' => 'bg-gray-100 text-gray-700',
                                        ];
                                        $statusColor = $statusColors[$report->status] ?? $statusColors['pending'];
                                    @endphp
                                    <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $statusColor }}">
                                        {{ ucwords(str_replace('_', ' ', $report->status)) }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-sm text-gray-500 dark:text-gray-400">
                                    {{ $report->created_at->format('d M Y') }}
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex justify-end gap-1.5">
                                        <a href="{{ role_route('role.help.reports.show', ['report' => $report]) }}" class="p-2 text-gray-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-500/10 rounded-lg transition-all" title="View">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ role_route('role.help.reports.edit', ['report' => $report]) }}" class="p-2 text-gray-500 hover:text-green-600 hover:bg-green-50 dark:hover:bg-success-500/10 rounded-lg transition-all" title="Edit">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ role_route('role.help.reports.destroy', ['report' => $report]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this report?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition-all" title="Delete">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-5 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                                    No reports found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

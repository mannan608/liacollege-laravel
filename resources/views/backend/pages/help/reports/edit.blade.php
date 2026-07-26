@extends('backend.layouts.app')

@section('content')
    @php
        $role = request()->route('role');
    @endphp

    <div class="mb-6">
        <a href="{{ role_route('role.help.reports.show', ['report' => $report]) }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Report #{{ $report->id }}
        </a>
    </div>

    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-100 dark:border-white/5 shadow-sm overflow-hidden">
        <div class="px-8 py-6 border-b border-gray-100 dark:border-white/5">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white/90">Edit Report #{{ $report->id }}</h3>
        </div>

        <form method="POST" action="{{ role_route('role.help.reports.update', ['report' => $report]) }}" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Status</label>
                    <select name="status" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent bg-white dark:bg-gray-800 dark:text-white/90">
                        <option value="pending" {{ $report->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ $report->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="resolved" {{ $report->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                        <option value="closed" {{ $report->status === 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                    @error('status')
                        <p class="mt-1.5 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Student</label>
                    <input type="text" value="{{ $report->user?->name ?? 'N/A' }} ({{ $report->user?->email ?? '' }})" readonly class="w-full border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5 bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400 cursor-not-allowed">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Admin Notes</label>
                <textarea name="admin_notes" rows="5" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent resize-y bg-white dark:bg-gray-800 dark:text-white/90 placeholder:text-gray-400" placeholder="Add internal notes about this report...">{{ old('admin_notes', $report->admin_notes) }}</textarea>
                @error('admin_notes')
                    <p class="mt-1.5 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 border-t border-gray-100 dark:border-white/5 flex justify-end gap-3">
                <a href="{{ role_route('role.help.reports.show', ['report' => $report]) }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-slate-800 hover:bg-slate-700 rounded-lg transition-colors shadow-sm">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection

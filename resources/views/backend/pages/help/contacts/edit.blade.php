@extends('backend.layouts.app')

@section('content')
    @php
        $role = request()->route('role');
    @endphp

    <div class="mb-6">
        <a href="{{ role_route('role.help.contacts.show', ['message' => $message]) }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Message #{{ $message->id }}
        </a>
    </div>

    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-100 dark:border-white/5 shadow-sm overflow-hidden">
        <div class="px-8 py-6 border-b border-gray-100 dark:border-white/5">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white/90">Reply / Edit Message #{{ $message->id }}</h3>
        </div>

        <form method="POST" action="{{ role_route('role.help.contacts.update', ['message' => $message]) }}" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Status</label>
                    <select name="status" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent bg-white dark:bg-gray-800 dark:text-white/90">
                        <option value="pending" {{ $message->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="replied" {{ $message->status === 'replied' ? 'selected' : '' }}>Replied</option>
                        <option value="closed" {{ $message->status === 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                    @error('status')
                        <p class="mt-1.5 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Student</label>
                    <input type="text" value="{{ $message->user?->name ?? 'N/A' }} ({{ $message->user?->email ?? '' }})" readonly class="w-full border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5 bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400 cursor-not-allowed">
                </div>
            </div>

            <div class="bg-gray-50 dark:bg-gray-800/50 p-5 rounded-xl">
                <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Original Message</h4>
                <p class="text-sm text-gray-700 dark:text-gray-300 whitespace-pre-wrap leading-relaxed">{{ $message->message }}</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Admin Reply</label>
                <textarea name="admin_reply" rows="6" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent resize-y bg-white dark:bg-gray-800 dark:text-white/90 placeholder:text-gray-400" placeholder="Write a reply to be sent to the student...">{{ old('admin_reply', $message->admin_reply) }}</textarea>
                <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">This reply will be visible to the student when viewing the message.</p>
                @error('admin_reply')
                    <p class="mt-1.5 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Internal Admin Notes</label>
                <textarea name="admin_notes" rows="4" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent resize-y bg-white dark:bg-gray-800 dark:text-white/90 placeholder:text-gray-400" placeholder="Add internal notes (not visible to student)...">{{ old('admin_notes', $message->admin_notes) }}</textarea>
                <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">These notes are for internal use only and will not be shown to the student.</p>
                @error('admin_notes')
                    <p class="mt-1.5 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 border-t border-gray-100 dark:border-white/5 flex justify-end gap-3">
                <a href="{{ role_route('role.help.contacts.show', ['message' => $message]) }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-slate-800 hover:bg-slate-700 rounded-lg transition-colors shadow-sm">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection

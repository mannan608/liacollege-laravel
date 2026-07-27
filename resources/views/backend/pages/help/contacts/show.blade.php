@extends('backend.layouts.app')

@section('content')
    @php
        $role = request()->route('role');
    @endphp

    <div class="mb-6">
        <a href="{{ role_route('role.help.contacts.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Messages
        </a>
    </div>

    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-100 dark:border-white/5 shadow-sm overflow-hidden">
        <div class="px-8 py-6 border-b border-gray-100 dark:border-white/5 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h3 class="text-xl font-semibold text-gray-800 dark:text-white/90">Contact Message #{{ $message->id }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Sent on {{ $message->created_at->format('l, j F Y \a\t g:ia') }}
                </p>
            </div>
            <div class="flex items-center gap-3">
                @php
                    $statusColors = [
                        'pending' => 'bg-yellow-100 text-yellow-700',
                        'replied' => 'bg-green-100 text-green-700',
                        'closed' => 'bg-gray-100 text-gray-700',
                    ];
                    $statusColor = $statusColors[$message->status] ?? $statusColors['pending'];
                @endphp
                <span class="px-3 py-1.5 text-sm font-medium rounded-full {{ $statusColor }}">
                    {{ ucwords($message->status) }}
                </span>
                <a href="{{ role_route('role.help.contacts.edit', ['message' => $message]) }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-slate-800 hover:bg-slate-700 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Reply / Edit
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
                            <span class="ml-2 text-sm font-medium text-gray-800 dark:text-white/90">{{ $message->user?->name ?? 'N/A' }}</span>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Email:</span>
                            <span class="ml-2 text-sm text-gray-800 dark:text-white/90">{{ $message->user?->email ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800/50 p-5 rounded-xl">
                    <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Course Details (Optional)</h4>
                    <div class="space-y-2">
                        <div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Code:</span>
                            <span class="ml-2 text-sm font-medium text-gray-800 dark:text-white/90">{{ $message->recognised_code ?? 'N/A' }}</span>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Title:</span>
                            <span class="ml-2 text-sm text-gray-800 dark:text-white/90">{{ $message->course_title ?? 'N/A' }}</span>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Year:</span>
                            <span class="ml-2 text-sm text-gray-800 dark:text-white/90">{{ $message->year_enrolled ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 dark:bg-gray-800/50 p-6 rounded-xl">
                <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Student's Message</h4>
                <p class="text-sm text-gray-800 dark:text-white/90 whitespace-pre-wrap leading-relaxed">{{ $message->message ?: 'N/A' }}</p>
            </div>

            @if($message->admin_reply)
                <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 p-6 rounded-xl">
                    <h4 class="text-xs font-semibold text-green-700 dark:text-green-400 uppercase tracking-wider mb-3">Admin Reply</h4>
                    <p class="text-sm text-green-800 dark:text-green-300 whitespace-pre-wrap leading-relaxed">{{ $message->admin_reply }}</p>
                </div>
            @endif

            @if($message->admin_notes)
                <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 p-6 rounded-xl">
                    <h4 class="text-xs font-semibold text-amber-700 dark:text-amber-400 uppercase tracking-wider mb-3">Admin Notes (Internal)</h4>
                    <p class="text-sm text-amber-800 dark:text-amber-300 whitespace-pre-wrap leading-relaxed">{{ $message->admin_notes }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection

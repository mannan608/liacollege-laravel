@php
    $items = $items ?? collect();

    $statusStyles = [
        'pending' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
        'confirmed' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
        'cancelled' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
        'completed' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
    ];
@endphp

<div class="overflow-hidden rounded-lg border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Student</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Course</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Slot</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Schedule</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Approved By</th>
                    <th class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wide text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                @forelse ($items as $enrollment)
                    <tr class="align-top">
                        <td class="px-4 py-4">
                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                {{ $enrollment->student?->user?->name ?? 'N/A' }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ $enrollment->student?->user?->email ?? 'N/A' }}
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300">
                            {{ $enrollment->slot?->course?->name ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300">
                            {{ $enrollment->slot?->title ?? 'Slot #' . $enrollment->course_slot_id }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-400">
                            <div>{{ optional($enrollment->slot?->training_date)->format('d M Y') ?? 'N/A' }}</div>
                            <div>{{ $enrollment->slot?->start_time }} - {{ $enrollment->slot?->end_time }}</div>
                            <div>{{ $enrollment->slot?->trainingCenter?->name }}</div>
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-flex rounded-full px-2.5 py-1 text-xs font-medium capitalize {{ $statusStyles[$enrollment->status] ?? 'bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-300' }}">
                                {{ $enrollment->status }}
                            </span>
                            <div class="mt-1 text-xs text-gray-400">
                                {{ $enrollment->approved_at ? $enrollment->approved_at->format('d M Y h:i A') : 'Not approved yet' }}
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-400">
                            {{ $enrollment->approvedBy?->name ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-4 text-right">
                            <div class="inline-flex flex-wrap items-center justify-end gap-2">
                                @foreach ([
                                    'pending' => 'Pending',
                                    'confirmed' => 'Approve',
                                    'cancelled' => 'Cancel',
                                ] as $status => $label)
                                    <form method="POST" action="{{ role_route('role.enrollments.update', ['enrollment' => $enrollment]) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="{{ $status }}">
                                        <button type="submit"
                                            class="inline-flex items-center rounded-md border px-3 py-1.5 text-xs font-medium transition-colors
                                            {{ $enrollment->status === $status ? 'border-gray-300 bg-gray-100 text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400' : 'border-gray-200 bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:hover:bg-gray-800' }}">
                                            {{ $label }}
                                        </button>
                                    </form>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-12 text-center text-sm text-gray-500">
                            No enrollments found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

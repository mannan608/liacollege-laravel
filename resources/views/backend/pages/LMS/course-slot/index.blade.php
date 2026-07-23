@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="fixed top-3 right-5 z-[99999] w-full max-w-sm">
                <div class="relative">
                    <button @click="show = false" class="absolute top-3 right-3 z-10 text-gray-500 hover:text-gray-700">
                        ✕
                    </button>

                    <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
                </div>
            </div>
        @endif

        <div class="flex flex-col gap-4 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Course Slot Management</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage training schedules, teachers, and availability.</p>
            </div>

            <a href="{{ role_route('role.course-slots.create') }}"
                class="inline-flex items-center justify-center rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-brand-500">
                + Add New Slot
            </a>
        </div>

        <form method="GET" class="grid grid-cols-1 gap-4 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900 lg:grid-cols-4">
            <div class="lg:col-span-2">
                <x-form.input-text name="search" label="Search" value="{{ request('search') }}" placeholder="Search by title, course, or center..." />
            </div>

            <div>
                <x-form.select-input name="status" label="Status" value="{{ request('status') }}" :options="[
                    '' => 'All Status',
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ]" />
            </div>

            <div class="flex items-end gap-3">
                <button type="submit"
                    class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">
                    Filter
                </button>
                <a href="{{ role_route('role.course-slots.index') }}"
                    class="rounded-lg border border-gray-300 px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                    Reset
                </a>
            </div>
        </form>

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                    <thead class="bg-gray-50 dark:bg-gray-800/50">
                        <tr>
                            <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Course</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Center</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Schedule</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Capacity</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Price</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Status</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Teachers</th>
                            <th class="px-5 py-3 text-right text-xs font-semibold uppercase tracking-wide text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                        @forelse ($slots as $slot)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/30">
                                <td class="px-5 py-4 text-sm text-gray-800 dark:text-gray-200">
                                    <div class="font-medium">{{ $slot->title ?: optional($slot->course)->name }}</div>
                                    <div class="text-xs text-gray-500">{{ optional($slot->course)->name }}</div>
                                </td>
                                <td class="px-5 py-4 text-sm text-gray-700 dark:text-gray-300">
                                    {{ optional($slot->trainingCenter)->name }}
                                </td>
                                <td class="px-5 py-4 text-sm text-gray-700 dark:text-gray-300">
                                    <div>{{ optional($slot->training_date)->format('d M Y') }}</div>
                                    <div class="text-xs text-gray-500">{{ $slot->start_time }} - {{ $slot->end_time }}</div>
                                </td>
                                <td class="px-5 py-4 text-sm text-gray-700 dark:text-gray-300">
                                    {{ $slot->available_seats }} / {{ $slot->capacity }}
                                </td>
                                <td class="px-5 py-4 text-sm text-gray-700 dark:text-gray-300">
                                    {{ number_format((float) $slot->price, 2) }}
                                </td>
                                <td class="px-5 py-4 text-sm">
                                    <span class="rounded-full px-3 py-1 text-xs font-medium {{ $slot->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-700' }}">
                                        {{ ucfirst($slot->status) }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-sm text-gray-700 dark:text-gray-300">
                                    {{ $slot->users->pluck('user.name')->filter()->join(', ') }}
                                </td>
                                <td class="px-5 py-4 text-right text-sm">
                                    <div class="inline-flex gap-2">
                                        <a href="{{ role_route('role.course-slots.show', ['course_slot' => $slot->id]) }}"
                                            class="rounded-lg border border-gray-300 px-3 py-2 text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                                            View
                                        </a>
                                        <a href="{{ role_route('role.course-slots.edit', ['course_slot' => $slot->id]) }}"
                                            class="rounded-lg border border-blue-300 px-3 py-2 text-blue-700 hover:bg-blue-50 dark:border-blue-800 dark:text-blue-300 dark:hover:bg-blue-950/30">
                                            Edit
                                        </a>
                                        <form action="{{ role_route('role.course-slots.destroy', ['course_slot' => $slot->id]) }}" method="POST"
                                            onsubmit="return confirm('Delete this course slot?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="rounded-lg border border-red-300 px-3 py-2 text-red-700 hover:bg-red-50 dark:border-red-800 dark:text-red-300 dark:hover:bg-red-950/30">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-5 py-10 text-center text-sm text-gray-500">
                                    No course slots found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-gray-200 px-5 py-4 dark:border-gray-800">
                {{ $slots->links() }}
            </div>
        </div>
    </div>
@endsection

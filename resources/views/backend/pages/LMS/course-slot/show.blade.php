@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                    {{ $courseSlot->title ?: 'Course Slot Details' }}
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ optional($courseSlot->course)->name }} - {{ optional($courseSlot->trainingCenter)->name }}
                </p>
            </div>

            <div class="flex gap-2">
                <a href="{{ role_route('role.course-slots.edit', ['course_slot' => $courseSlot->id]) }}"
                    class="rounded-lg border border-blue-300 px-4 py-2 text-sm font-medium text-blue-700 hover:bg-blue-50 dark:border-blue-800 dark:text-blue-300 dark:hover:bg-blue-950/30">
                    Edit
                </a>
                <a href="{{ role_route('role.course-slots.index') }}"
                    class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                    Back
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="space-y-6 lg:col-span-2">
                <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                    <h4 class="mb-4 text-base font-semibold text-gray-800 dark:text-white">Slot Information</h4>

                    <dl class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <dt class="text-xs font-medium uppercase text-gray-500">Course</dt>
                            <dd class="mt-1 text-sm text-gray-800 dark:text-gray-200">{{ optional($courseSlot->course)->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase text-gray-500">Training Center</dt>
                            <dd class="mt-1 text-sm text-gray-800 dark:text-gray-200">{{ optional($courseSlot->trainingCenter)->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase text-gray-500">Date</dt>
                            <dd class="mt-1 text-sm text-gray-800 dark:text-gray-200">{{ optional($courseSlot->training_date)->format('d M Y') }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase text-gray-500">Time</dt>
                            <dd class="mt-1 text-sm text-gray-800 dark:text-gray-200">{{ $courseSlot->start_time }} - {{ $courseSlot->end_time }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase text-gray-500">Booking Open</dt>
                            <dd class="mt-1 text-sm text-gray-800 dark:text-gray-200">
                                {{ optional($courseSlot->booking_open_at)->format('d M Y, h:i A') ?? '-' }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase text-gray-500">Booking Close</dt>
                            <dd class="mt-1 text-sm text-gray-800 dark:text-gray-200">
                                {{ optional($courseSlot->booking_close_at)->format('d M Y, h:i A') ?? '-' }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase text-gray-500">Capacity</dt>
                            <dd class="mt-1 text-sm text-gray-800 dark:text-gray-200">{{ $courseSlot->capacity }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase text-gray-500">Available Seats</dt>
                            <dd class="mt-1 text-sm text-gray-800 dark:text-gray-200">{{ $courseSlot->available_seats }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase text-gray-500">Price</dt>
                            <dd class="mt-1 text-sm text-gray-800 dark:text-gray-200">{{ number_format((float) $courseSlot->price, 2) }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase text-gray-500">Status</dt>
                            <dd class="mt-1">
                                <span class="rounded-full px-3 py-1 text-xs font-medium {{ $courseSlot->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-700' }}">
                                    {{ ucfirst($courseSlot->status) }}
                                </span>
                            </dd>
                        </div>
                    </dl>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                    <h4 class="mb-4 text-base font-semibold text-gray-800 dark:text-white">Notes</h4>
                    <p class="whitespace-pre-line text-sm text-gray-700 dark:text-gray-300">
                        {{ $courseSlot->notes ?: 'No notes available.' }}
                    </p>
                </div>
            </div>

            <div class="space-y-6">
                <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                    <h4 class="mb-4 text-base font-semibold text-gray-800 dark:text-white">Teachers</h4>

                    <div class="space-y-3">
                        @forelse ($courseSlot->users as $teacher)
                            <div class="rounded-xl border border-gray-200 px-4 py-3 dark:border-gray-800">
                                <div class="text-sm font-medium text-gray-800 dark:text-gray-200">
                                    {{ optional($teacher->user)->name }}
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ optional($teacher->user)->email }}
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">No teachers assigned.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('student.layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">

        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                My Certificate
            </h1>
            <p class="mt-4 text-gray-500 dark:text-gray-400 max-w-2xl">
                Links to PDF copies of your certificates, statements of attainment,
                and confirmations of completion.
            </p>
        </div>

        <!-- Courses Section -->
        <div class="mb-10">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-8 h-8 rounded bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.499 5.221 50.55 50.55 0 00-2.658.813m-15.482 0A50.553 50.553 0 0112 13.489a50.55 50.55 0 0112-2.658" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Courses</h2>
            </div>

            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr
                            class="border-b border-gray-200 dark:border-gray-700 text-left text-xs uppercase text-gray-500 dark:text-gray-400">
                            <th class="px-6 py-3 w-16 text-center">#</th>
                            <th class="px-6 py-3">Title</th>
                            <th class="px-6 py-3 w-40 text-center">Issue Date</th>
                            <th class="px-6 py-3 w-40 text-center">Expiry Date</th>
                            <th class="px-6 py-3 w-32 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="border-b border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                            <td class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">{{$course->slot?->id}}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                    </svg>
                                    <span class="text-gray-900 dark:text-white font-medium">{{ $course?->slot?->course?->name ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-emerald-600 dark:text-emerald-400 text-sm font-medium">{{ $certificate?->created_at?->format('d M Y') ?? '-' }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-amber-600 dark:text-amber-400 text-sm font-medium">N/A</span>
                            </td>


                            <td class="px-6 py-4 text-center">
                                @if ($certificate)
                                    <a href="{{ asset($certificate->file) }}" target="_blank"
                                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/30 transition text-sm font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        View
                                    </a>
                                @else
                                    <span class="text-gray-500 text-xs">Not Available</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

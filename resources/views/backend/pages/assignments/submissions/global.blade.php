@extends('backend.layouts.app')

@section('content')

<div class="px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 mb-2">
                <a href="{{ role_route('role.assignments.index') }}" class="hover:text-primary-600">
                    Assignments
                </a>
                <span>/</span>
                <span>Submissions</span>
            </div>

            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                All Submissions
            </h1>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                View every submitted assignment and who submitted it.
            </p>
        </div>

        <div class="px-4 py-3 rounded-xl bg-purple-50 border border-purple-100">
            <p class="text-xs font-semibold uppercase tracking-wide text-purple-500">
                Total Submissions
            </p>
            <p class="text-xl font-bold text-purple-700">
                {{ $submissions->total() }}
            </p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 shadow-sm border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
        @if($submissions->count())
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-900/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Assignment</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Course</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Student</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Submitted</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Marks</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($submissions as $submission)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900 dark:text-white">
                                        {{ $submission->assignment->title ?? 'Unknown assignment' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-primary-600">
                                        {{ $submission->assignment->course->name ?? 'Unknown course' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900 dark:text-white">
                                        {{ $submission->student->user->name ?? 'Unknown student' }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $submission->student->user->email ?? '' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                                    @if($submission->submitted_at)
                                        <div>{{ $submission->submitted_at->format('d M Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $submission->submitted_at->format('h:i A') }}</div>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($submission->status === 'graded')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Graded</span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800">Submitted</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($submission->marks !== null)
                                        <span class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $submission->marks }}
                                        </span>
                                        <span class="text-sm text-gray-500">
                                            / {{ $submission->assignment->total_marks ?? '' }}
                                        </span>
                                    @else
                                        <span class="text-sm text-gray-400">Not graded</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <a
                                        href="{{ role_route('role.assignments.submissions.show', [
                                            'assignment' => $submission->assignment,
                                            'submission' => $submission,
                                        ]) }}"
                                        class="px-3 py-1.5 text-sm font-medium text-blue-600 hover:text-blue-800"
                                    >
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($submissions->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $submissions->links() }}
                </div>
            @endif
        @else
            <div class="px-6 py-16 text-center">
                <div class="mx-auto w-14 h-14 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                    <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>

                <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">
                    No submissions yet
                </h3>

                <p class="mt-1 text-sm text-gray-500">
                    Students have not submitted any assignments yet.
                </p>
            </div>
        @endif
    </div>
</div>

@endsection

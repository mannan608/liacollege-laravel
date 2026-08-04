@extends('backend.layouts.app')

@section('content')

<div class="px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 md:flex-row
                md:items-start md:justify-between mb-6">

        <div>

            <a
                href="{{ role_route('role.assignments.index', [
                    'course' => $course
                ]) }}"
                class="inline-flex items-center gap-1 text-sm
                       text-gray-500 hover:text-gray-900
                       dark:text-gray-400 dark:hover:text-white mb-4"
            >
                ← Back to Assignments
            </a>

            <h1 class="text-2xl font-bold
                       text-gray-900 dark:text-white">
                {{ $assignment->title }}
            </h1>

            <p class="mt-1 text-sm text-gray-500
                      dark:text-gray-400">
                Course: {{ $course->name }}
            </p>

        </div>


        <div class="flex items-center gap-2">

            <a
                href="{{ role_route('role.assignments.edit', [
                    'course' => $course,
                    'assignment' => $assignment,
                ]) }}"
                class="inline-flex items-center gap-2
                       px-4 py-2.5 rounded-lg
                       bg-indigo-600 hover:bg-indigo-700
                       text-white text-sm font-medium"
            >
                Edit Assignment
            </a>

        </div>

    </div>


    {{-- Assignment Overview --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

        {{-- Due Date --}}
        <div class="bg-white dark:bg-gray-800
                    border border-gray-200 dark:border-gray-700
                    rounded-xl p-5">

            <p class="text-sm text-gray-500">
                Due Date
            </p>

            @if($assignment->due_date)

                <p class="mt-1 text-lg font-semibold
                          text-gray-900 dark:text-white">
                    {{ $assignment->due_date->format('d M Y') }}
                </p>

                <p class="text-sm text-gray-500">
                    {{ $assignment->due_date->format('h:i A') }}
                </p>

            @else

                <p class="mt-1 text-lg font-semibold
                          text-gray-400">
                    No deadline
                </p>

            @endif

        </div>


        {{-- Marks --}}
        <div class="bg-white dark:bg-gray-800
                    border border-gray-200 dark:border-gray-700
                    rounded-xl p-5">

            <p class="text-sm text-gray-500">
                Total Marks
            </p>

            <p class="mt-1 text-2xl font-bold
                      text-gray-900 dark:text-white">
                {{ $assignment->total_marks }}
            </p>

        </div>


        {{-- Status --}}
        <div class="bg-white dark:bg-gray-800
                    border border-gray-200 dark:border-gray-700
                    rounded-xl p-5">

            <p class="text-sm text-gray-500">
                Status
            </p>

            @if($assignment->status === 'active')

                <span class="inline-flex mt-2 px-3 py-1
                             rounded-full text-sm font-medium
                             bg-green-100 text-green-800">
                    Active
                </span>

            @else

                <span class="inline-flex mt-2 px-3 py-1
                             rounded-full text-sm font-medium
                             bg-gray-100 text-gray-700">
                    Inactive
                </span>

            @endif

        </div>

    </div>


    {{-- Description / Instructions --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

        {{-- Description --}}
        <div class="bg-white dark:bg-gray-800
                    border border-gray-200 dark:border-gray-700
                    rounded-xl p-6">

            <h2 class="text-lg font-semibold
                       text-gray-900 dark:text-white mb-4">
                Description
            </h2>

            @if($assignment->description)

                <div class="text-sm leading-6
                            text-gray-600 dark:text-gray-300
                            whitespace-pre-line">
                    {{ $assignment->description }}
                </div>

            @else

                <p class="text-sm text-gray-400">
                    No description provided.
                </p>

            @endif

        </div>


        {{-- Instructions --}}
        <div class="bg-white dark:bg-gray-800
                    border border-gray-200 dark:border-gray-700
                    rounded-xl p-6">

            <h2 class="text-lg font-semibold
                       text-gray-900 dark:text-white mb-4">
                Instructions
            </h2>

            @if($assignment->instructions)

                <div class="text-sm leading-6
                            text-gray-600 dark:text-gray-300
                            whitespace-pre-line">
                    {{ $assignment->instructions }}
                </div>

            @else

                <p class="text-sm text-gray-400">
                    No instructions provided.
                </p>

            @endif

        </div>

    </div>


    {{-- Attachment --}}
    @if($assignment->attachment)

        <div class="bg-white dark:bg-gray-800
                    border border-gray-200 dark:border-gray-700
                    rounded-xl p-6 mb-6">

            <div class="flex items-center
                        justify-between gap-4">

                <div>

                    <h2 class="text-lg font-semibold
                               text-gray-900 dark:text-white">
                        Assignment Attachment
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        {{ basename($assignment->attachment) }}
                    </p>

                </div>

                <a
                    href="{{ asset('storage/' . $assignment->attachment) }}"
                    target="_blank"
                    class="px-4 py-2 rounded-lg
                           bg-blue-600 hover:bg-blue-700
                           text-white text-sm font-medium"
                >
                    Download / View
                </a>

            </div>

        </div>

    @endif


    {{-- Student Submissions --}}
    <div class="bg-white dark:bg-gray-800
                border border-gray-200 dark:border-gray-700
                rounded-xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b
                    border-gray-200 dark:border-gray-700">

            <div class="flex items-center
                        justify-between">

                <div>

                    <h2 class="text-lg font-semibold
                               text-gray-900 dark:text-white">
                        Student Submissions
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Students who have submitted this assignment.
                    </p>

                </div>

                <span class="px-3 py-1 rounded-full
                             bg-blue-100 text-blue-800
                             text-sm font-medium">
                    {{ $assignment->submissions->count() }}
                    submissions
                </span>

            </div>

        </div>


        @if($assignment->submissions->count())

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y
                              divide-gray-200 dark:divide-gray-700">

                    <thead class="bg-gray-50 dark:bg-gray-900/50">

                        <tr>

                            <th class="px-6 py-3 text-left
                                       text-xs font-semibold
                                       uppercase tracking-wider
                                       text-gray-500">
                                Student
                            </th>

                            <th class="px-6 py-3 text-left
                                       text-xs font-semibold
                                       uppercase tracking-wider
                                       text-gray-500">
                                Submitted
                            </th>

                            <th class="px-6 py-3 text-left
                                       text-xs font-semibold
                                       uppercase tracking-wider
                                       text-gray-500">
                                Status
                            </th>

                            <th class="px-6 py-3 text-left
                                       text-xs font-semibold
                                       uppercase tracking-wider
                                       text-gray-500">
                                Marks
                            </th>

                            <th class="px-6 py-3 text-right
                                       text-xs font-semibold
                                       uppercase tracking-wider
                                       text-gray-500">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y
                                  divide-gray-200
                                  dark:divide-gray-700">

                        @foreach($assignment->submissions as $submission)

                            <tr class="hover:bg-gray-50
                                       dark:hover:bg-gray-700/50">

                                {{-- Student --}}
                                <td class="px-6 py-4">

                                    <div class="font-medium
                                                text-gray-900
                                                dark:text-white">

                                        {{ $submission->student?->user?->name
                                            ?? 'Unknown Student'
                                        }}

                                    </div>

                                    @if($submission->student?->user?->email)

                                        <div class="text-xs text-gray-500">
                                            {{ $submission->student->user->email }}
                                        </div>

                                    @endif

                                </td>


                                {{-- Submitted --}}
                                <td class="px-6 py-4">

                                    @if($submission->submitted_at)

                                        <div class="text-sm text-gray-900
                                                    dark:text-white">

                                            {{ $submission->submitted_at->format('d M Y') }}

                                        </div>

                                        <div class="text-xs text-gray-500">

                                            {{ $submission->submitted_at->format('h:i A') }}

                                        </div>

                                    @else

                                        <span class="text-sm text-gray-400">
                                            Not submitted
                                        </span>

                                    @endif

                                </td>


                                {{-- Status --}}
                                <td class="px-6 py-4">

                                    @if($submission->status === 'graded')

                                        <span class="inline-flex px-2.5 py-1
                                                     rounded-full
                                                     text-xs font-medium
                                                     bg-green-100
                                                     text-green-800">
                                            Graded
                                        </span>

                                    @elseif($submission->status === 'returned')

                                        <span class="inline-flex px-2.5 py-1
                                                     rounded-full
                                                     text-xs font-medium
                                                     bg-yellow-100
                                                     text-yellow-800">
                                            Returned
                                        </span>

                                    @else

                                        <span class="inline-flex px-2.5 py-1
                                                     rounded-full
                                                     text-xs font-medium
                                                     bg-blue-100
                                                     text-blue-800">
                                            Submitted
                                        </span>

                                    @endif

                                </td>


                                {{-- Marks --}}
                                <td class="px-6 py-4">

                                    @if($submission->marks !== null)

                                        <span class="font-semibold
                                                     text-gray-900
                                                     dark:text-white">

                                            {{ $submission->marks }}
                                            /
                                            {{ $assignment->total_marks }}

                                        </span>

                                    @else

                                        <span class="text-gray-400">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- Action --}}
                                <td class="px-6 py-4 text-right">

                                    <button
                                        type="button"
                                        class="px-3 py-1.5 rounded-lg
                                               bg-blue-600 hover:bg-blue-700
                                               text-white text-sm font-medium"
                                    >
                                        View
                                    </button>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="px-6 py-16 text-center">

                <div class="mx-auto w-14 h-14 rounded-full
                            bg-gray-100 dark:bg-gray-700
                            flex items-center justify-center">

                    <svg
                        class="w-7 h-7 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2-2z"
                        />
                    </svg>

                </div>

                <h3 class="mt-4 text-lg font-semibold
                           text-gray-900 dark:text-white">
                    No submissions yet
                </h3>

                <p class="mt-1 text-sm text-gray-500">
                    Students have not submitted this assignment.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection
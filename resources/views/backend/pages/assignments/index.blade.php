@extends('backend.layouts.app')

@section('content')

<div class="px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">

        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 mb-2">
                <a
                    href="{{ role_route('role.courses.index') }}"
                    class="hover:text-brand-600"
                >
                    Courses
                </a>

                <span>/</span>

                <span>Assignments</span>
            </div>

            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                Assignments
            </h1>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Manage assignments across all courses.
            </p>
        </div>

        <a
            href="{{ role_route('role.assignments.create') }}"
            class="inline-flex items-center justify-center gap-2 px-4 py-2.5
                   bg-brand-600 hover:bg-brand-700
                   text-white text-sm font-medium rounded-lg
                   transition"
        >
            <svg
                class="w-5 h-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 4v16m8-8H4"
                />
            </svg>

            Add Assignment
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-6 rounded-lg border border-green-200
                    bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif


    {{-- Assignments --}}
    <div class="bg-white dark:bg-gray-800 shadow-sm
                border border-gray-200 dark:border-gray-700
                rounded-xl overflow-hidden">

        @if($assignments->count())

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y
                              divide-gray-200 dark:divide-gray-700">

                    <thead class="bg-gray-50 dark:bg-gray-900/50">

                        <tr>

                            <th class="px-6 py-3 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-gray-500">
                                Assignment
                            </th>

                            <th class="px-6 py-3 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-gray-500">
                                Course
                            </th>

                            <th class="px-6 py-3 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-gray-500">
                                Due Date
                            </th>

                            <th class="px-6 py-3 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-gray-500">
                                Marks
                            </th>

                            <th class="px-6 py-3 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-gray-500">
                                Submissions
                            </th>

                            <th class="px-6 py-3 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-gray-500">
                                Status
                            </th>

                            <th class="px-6 py-3 text-right text-xs
                                       font-semibold uppercase tracking-wider
                                       text-gray-500">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-200
                                  dark:divide-gray-700">

                        @foreach($assignments as $assignment)

                            <tr class="hover:bg-gray-50
                                       dark:hover:bg-gray-700/50">

                                {{-- Assignment --}}
                                <td class="px-6 py-4">

                                    <div class="font-medium text-gray-900
                                                dark:text-white">
                                        {{ $assignment->title }}
                                    </div>

                                    @if($assignment->description)
                                        <div class="mt-1 text-sm text-gray-500
                                                    dark:text-gray-400
                                                    line-clamp-2">
                                            {{ $assignment->description }}
                                        </div>
                                    @endif

                                </td>


                                {{-- Course --}}
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm font-medium text-brand-600">
                                        {{ $assignment->course?->name ?? 'Unknown course' }}
                                    </div>

                                </td>


                                {{-- Due Date --}}
                                <td class="px-6 py-4 whitespace-nowrap">

                                    @if($assignment->due_date)

                                        <div class="text-sm text-gray-900
                                                    dark:text-white">
                                            {{ $assignment->due_date->format('d M Y') }}
                                        </div>

                                        <div class="text-xs text-gray-500">
                                            {{ $assignment->due_date->format('h:i A') }}
                                        </div>

                                    @else

                                        <span class="text-sm text-gray-400">
                                            No deadline
                                        </span>

                                    @endif

                                </td>


                                {{-- Marks --}}
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <span class="text-sm font-medium
                                                 text-gray-900
                                                 dark:text-white">
                                        {{ $assignment->total_marks }}
                                    </span>

                                </td>


                                {{-- Submissions --}}
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <span class="inline-flex items-center
                                                 px-2.5 py-1 rounded-full
                                                 text-xs font-medium
                                                 bg-blue-100 text-blue-800">
                                        {{ $assignment->submissions_count }}
                                        submitted
                                    </span>

                                </td>


                                {{-- Status --}}
                                <td class="px-6 py-4 whitespace-nowrap">

                                    @if($assignment->status === 'active')

                                        <span class="inline-flex items-center
                                                     px-2.5 py-1 rounded-full
                                                     text-xs font-medium
                                                     bg-green-100 text-green-800">
                                            Active
                                        </span>

                                    @else

                                        <span class="inline-flex items-center
                                                     px-2.5 py-1 rounded-full
                                                     text-xs font-medium
                                                     bg-gray-100 text-gray-700">
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td class="px-6 py-4 whitespace-nowrap text-right">

                                    <div class="flex items-center
                                                justify-end gap-2">

                                        <a
                                            href="{{ role_route('role.assignments.edit', [
                                                'assignment' => $assignment,
                                            ]) }}"
                                            class="px-3 py-1.5 text-sm
                                                   font-medium text-indigo-600
                                                   hover:text-indigo-800"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            method="POST"
                                            action="{{ role_route('role.assignments.destroy', [
                                                'assignment' => $assignment,
                                            ]) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this assignment?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="px-3 py-1.5 text-sm
                                                       font-medium text-red-600
                                                       hover:text-red-800"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            @if($assignments->hasPages())

                <div class="px-6 py-4 border-t
                            border-gray-200 dark:border-gray-700">

                    {{ $assignments->links() }}

                </div>

            @endif

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
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        />
                    </svg>

                </div>

                <h3 class="mt-4 text-lg font-semibold
                           text-gray-900 dark:text-white">
                    No assignments yet
                </h3>

                <p class="mt-1 text-sm text-gray-500">
                    Create the first assignment for this course.
                </p>

                <a
                    href="{{ role_route('role.assignments.create') }}"
                    class="inline-flex mt-5 px-4 py-2.5
                           bg-brand-600 hover:bg-brand-700
                           text-white rounded-lg text-sm font-medium"
                >
                    Create Assignment
                </a>

            </div>

        @endif

    </div>

</div>

@endsection

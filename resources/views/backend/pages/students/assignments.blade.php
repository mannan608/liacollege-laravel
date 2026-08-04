@extends('backend.layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Header --}}
    <div class="mb-6">

        <a
            href=""
            class="inline-flex items-center gap-2
                   text-sm font-medium text-slate-500
                   hover:text-purple-600 mb-4"
        >
            ← Back 
        </a>

        <div
            class="bg-white rounded-2xl
                   border border-slate-200
                   shadow-sm p-6"
        >

            <div class="flex items-center gap-4">

                <div
                    class="w-14 h-14 rounded-full
                           bg-purple-100
                           flex items-center justify-center
                           text-xl font-bold text-purple-700"
                >
                    {{ strtoupper(
                        substr(
                            $student->user->name ?? 'S',
                            0,
                            1
                        )
                    ) }}
                </div>

                <div>

                    <h1 class="text-2xl font-bold text-slate-800">
                        {{ $student->user->name }}
                    </h1>

                    <p class="text-sm text-slate-500">
                        {{ $student->user->email ?? '' }}
                    </p>

                    <p class="mt-1 text-sm text-purple-600 font-medium">
                        Assignment Submissions
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- Table --}}
    <div
        class="bg-white rounded-2xl
               border border-slate-200
               shadow-sm overflow-hidden"
    >

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50
                              border-b border-slate-200">

                    <tr>

                        <th class="px-6 py-4 text-left
                                   text-xs font-bold
                                   uppercase tracking-wide
                                   text-slate-500">
                            Assignment
                        </th>

                        <th class="px-6 py-4 text-left
                                   text-xs font-bold
                                   uppercase tracking-wide
                                   text-slate-500">
                            Course
                        </th>

                        <th class="px-6 py-4 text-left
                                   text-xs font-bold
                                   uppercase tracking-wide
                                   text-slate-500">
                            Submitted
                        </th>

                        <th class="px-6 py-4 text-left
                                   text-xs font-bold
                                   uppercase tracking-wide
                                   text-slate-500">
                            Status
                        </th>

                        <th class="px-6 py-4 text-left
                                   text-xs font-bold
                                   uppercase tracking-wide
                                   text-slate-500">
                            Marks
                        </th>

                        <th class="px-6 py-4 text-right
                                   text-xs font-bold
                                   uppercase tracking-wide
                                   text-slate-500">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse($submissions as $submission)

                        <tr class="hover:bg-slate-50">

                            {{-- Assignment --}}
                            <td class="px-6 py-4">

                                <div class="font-semibold text-slate-800">
                                    {{ $submission->assignment->title }}
                                </div>

                                @if($submission->assignment->due_date)

                                    <div class="text-xs text-slate-400 mt-1">
                                        Due:
                                        {{ $submission->assignment->due_date->format('d M Y h:i A') }}
                                    </div>

                                @endif

                            </td>


                            {{-- Course --}}
                            <td class="px-6 py-4">

                                <span
                                    class="inline-flex px-2.5 py-1
                                           rounded-lg
                                           bg-purple-50
                                           text-purple-700
                                           text-xs font-semibold"
                                >
                                    {{ $submission->assignment->course->title }}
                                </span>

                            </td>


                            {{-- Submitted --}}
                            <td class="px-6 py-4 text-sm text-slate-600">

                                @if($submission->submitted_at)

                                    {{ $submission->submitted_at->format('d M Y') }}

                                    <div class="text-xs text-slate-400">
                                        {{ $submission->submitted_at->format('h:i A') }}
                                    </div>

                                @else

                                    —

                                @endif

                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-4">

                                @if($submission->status === 'graded')

                                    <span
                                        class="inline-flex px-2.5 py-1
                                               rounded-full
                                               bg-green-50
                                               border border-green-200
                                               text-xs font-bold
                                               text-green-700"
                                    >
                                        Graded
                                    </span>

                                @else

                                    <span
                                        class="inline-flex px-2.5 py-1
                                               rounded-full
                                               bg-amber-50
                                               border border-amber-200
                                               text-xs font-bold
                                               text-amber-700"
                                    >
                                        Submitted
                                    </span>

                                @endif

                            </td>


                            {{-- Marks --}}
                            <td class="px-6 py-4">

                                @if($submission->marks !== null)

                                    <span class="font-bold text-slate-700">
                                        {{ $submission->marks }}
                                    </span>

                                    <span class="text-slate-400">
                                        /
                                        {{ $submission->assignment->total_marks }}
                                    </span>

                                @else

                                    <span class="text-slate-400 text-sm">
                                        Not graded
                                    </span>

                                @endif

                            </td>


                            {{-- Action --}}
                            <td class="px-6 py-4 text-right">

                                <a
                                    href="{{ role_route('role.students.assignments.show', ['student' => $student, 'submission' => $submission]) }}"
                                    class="inline-flex items-center gap-2
                                           px-4 py-2
                                           rounded-xl
                                           bg-slate-800
                                           hover:bg-slate-900
                                           text-white
                                           text-sm font-semibold
                                           transition"
                                >

                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639l3.5-8.667A1.5 1.5 0 016.93 2h10.14a1.5 1.5 0 011.394.984l3.5 8.667a1.012 1.012 0 010 .639l-3.5 8.667A1.5 1.5 0 0117.07 22H6.93a1.5 1.5 0 01-1.394-.984l-3.5-8.667z"
                                        />

                                        <circle
                                            cx="12"
                                            cy="12"
                                            r="3"
                                        />
                                    </svg>

                                    View

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="px-6 py-16 text-center"
                            >

                                <p class="text-slate-500 font-semibold">
                                    No assignments submitted yet.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Pagination --}}
    @if($submissions->hasPages())

        <div class="mt-6">
            {{ $submissions->links() }}
        </div>

    @endif

</div>

@endsection

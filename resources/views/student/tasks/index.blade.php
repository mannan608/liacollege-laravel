@extends('student.layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-6 py-10">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">My Assignments</h1>
                <p class="text-slate-500 mt-1 text-sm">Stay on top of your tasks and deadlines</p>
            </div>
        </div>

        @forelse($assignments as $assignment)
            @php
                $isOverdue = $assignment->due_date && $assignment->due_date->isPast();

                $submission = $assignment->submissions->where('student_id', auth()->user()->student->id)->first();

                $status = $submission?->status ?? 'pending';
            @endphp

            <div
                class="bg-white rounded-2xl shadow-sm border border-slate-200
               p-6 mb-4
               hover:shadow-xl hover:-translate-y-1
               transition-all duration-300 group">

                <div class="flex items-start justify-between gap-5 flex-wrap">

                    {{-- Left --}}
                    <div class="flex items-start gap-4 flex-1 min-w-[280px]">

                        {{-- Icon --}}
                        <div
                            class="w-12 h-12 rounded-xl
                           bg-orange-50 border border-orange-200
                           flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                        </div>


                        {{-- Assignment Info --}}
                        <div class="flex-1 min-w-0">

                            <h3
                                class="text-lg font-bold text-slate-800
                               group-hover:text-orange-600
                               transition-colors duration-200">
                                {{ $assignment->title }}
                            </h3>


                            {{-- Course --}}
                            @if ($assignment->course)
                                <p class="text-xs font-semibold text-orange-500 mt-1">
                                    {{ $assignment->course->name }}
                                </p>
                            @endif


                            {{-- Description --}}
                            @if ($assignment->description)
                                <p
                                    class="text-slate-500 text-sm mt-1
                                   leading-relaxed line-clamp-2">
                                    {{ $assignment->description }}
                                </p>
                            @endif


                            {{-- Meta --}}
                            <div class="flex items-center gap-4 mt-3 flex-wrap">

                                {{-- Due Date --}}
                                <span
                                    class="text-xs font-semibold
                                   flex items-center gap-1.5
                                   {{ $isOverdue ? 'text-red-500' : 'text-slate-400' }}">

                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                    </svg>

                                    @if ($assignment->due_date)
                                        {{ $isOverdue ? 'Overdue:' : 'Due:' }}

                                        {{ $assignment->due_date->format('d M Y, h:i A') }}
                                    @else
                                        No deadline
                                    @endif

                                </span>


                                {{-- Marks --}}
                                <span
                                    class="text-xs font-semibold
                                   text-slate-400 flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 7h6m-6 4h6m-6 4h3m8-12v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h8l4 4Z" />
                                    </svg>

                                    {{ $assignment->total_marks }} Marks
                                </span>


                                {{-- Status --}}
                                @if ($status === 'graded')
                                    <span
                                        class="px-2.5 py-0.5 rounded-full
                                       text-[11px] font-bold
                                       bg-green-50 text-green-700
                                       border border-green-200
                                       uppercase tracking-wide">
                                        Graded
                                    </span>
                                @elseif($status === 'submitted')
                                    <span
                                        class="px-2.5 py-0.5 rounded-full
                                       text-[11px] font-bold
                                       bg-blue-50 text-blue-700
                                       border border-blue-200
                                       uppercase tracking-wide">
                                        Submitted
                                    </span>
                                @elseif($status === 'returned')
                                    <span
                                        class="px-2.5 py-0.5 rounded-full
                                       text-[11px] font-bold
                                       bg-yellow-50 text-yellow-700
                                       border border-yellow-200
                                       uppercase tracking-wide">
                                        Returned
                                    </span>
                                @elseif($isOverdue)
                                    <span
                                        class="px-2.5 py-0.5 rounded-full
                                       text-[11px] font-bold
                                       bg-red-50 text-red-700
                                       border border-red-200
                                       uppercase tracking-wide">
                                        Overdue
                                    </span>
                                @else
                                    <span
                                        class="px-2.5 py-0.5 rounded-full
                                       text-[11px] font-bold
                                       bg-amber-50 text-amber-700
                                       border border-amber-200
                                       uppercase tracking-wide">
                                        Pending
                                    </span>
                                @endif

                            </div>

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="flex items-center gap-2 shrink-0
                       w-full sm:w-auto">

                        {{-- View --}}
                        <a href="{{ role_route('student.tasks.show', [
                            'course' => $course,
    'assignment' => $assignment
]) }}"
                            class="px-4 py-2.5 rounded-xl text-sm font-semibold
                           text-slate-600 bg-slate-50
                           hover:bg-slate-100
                           border border-slate-200
                           transition-all duration-200
                           flex items-center justify-center gap-2
                           hover:shadow-sm">

                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639l3.5-8.667A1.5 1.5 0 0 1 6.93 2h10.14a1.5 1.5 0 0 1 1.394.984l3.5 8.667a1.012 1.012 0 0 1 0 .639l-3.5 8.667A1.5 1.5 0 0 1 17.07 22H6.93a1.5 1.5 0 0 1-1.394-.984l-3.5-8.667ZM15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                            View

                        </a>


                        {{-- Submit / Resubmit --}}
                        @if (!$submission)
                            <a href="{{ role_route('student.tasks.submit', [
                                'course' => $course,
    'assignment' => $assignment
]) }}"
                                class="px-4 py-2.5 rounded-xl text-sm font-semibold
                               text-white
                               bg-gradient-to-r from-orange-500 to-amber-500
                               hover:from-orange-600 hover:to-amber-600
                               shadow-lg shadow-orange-500/25
                               transition-all duration-200
                               flex items-center justify-center gap-2
                               hover:-translate-y-0.5
                               hover:shadow-orange-500/40">

                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0Z" />
                                </svg>

                                Submit

                            </a>
                        @elseif($status === 'graded')
                            <span
                                class="px-4 py-2.5 rounded-xl text-sm font-semibold
                               text-green-700 bg-green-50
                               border border-green-200
                               flex items-center gap-2">

                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>

                                {{ $submission->marks }}/{{ $assignment->total_marks }}

                            </span>
                        @else
                            <a href="{{ role_route('student.tasks.submit', [
                                'course' => $course,
                                'assignment' => $assignment,
                            ]) }}"
                                class="px-4 py-2.5 rounded-xl text-sm font-semibold
                               text-orange-700 bg-orange-50
                               hover:bg-orange-100
                               border border-orange-200
                               transition-all duration-200
                               flex items-center justify-center gap-2">

                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 0 0 4.582 9M4 4l4 4" />
                                </svg>

                                Resubmit

                            </a>
                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-2xl border border-slate-200
                p-12 text-center">

                <div
                    class="mx-auto w-16 h-16 rounded-2xl
                   bg-orange-50 border border-orange-100
                   flex items-center justify-center">
                    <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2Z" />
                    </svg>
                </div>

                <h3 class="mt-5 text-lg font-bold text-slate-800">
                    No assignments available
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    You currently have no assignments for your enrolled courses.
                </p>

            </div>
        @endforelse


    </div>
@endsection

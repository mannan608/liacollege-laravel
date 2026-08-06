@extends('student.layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Success --}}
    @if(session('success'))

        <div class="mb-6 rounded-xl border border-green-200
                    bg-green-50 px-5 py-4
                    text-sm text-green-700">

            {{ session('success') }}

        </div>

    @endif


    {{-- Error --}}
    @if(session('error'))

        <div class="mb-6 rounded-xl border border-red-200
                    bg-red-50 px-5 py-4
                    text-sm text-red-700">

            {{ session('error') }}

        </div>

    @endif


    {{-- Back --}}
    <div class="mb-6">

        <a
            href="{{ route('student.tasks.index', $assignment->course) }}"
            class="inline-flex items-center gap-2
                   text-sm font-medium
                   text-slate-500 hover:text-orange-600"
        >
            ← Back to Assignments
        </a>

    </div>


    {{-- Header --}}
    <div class="bg-white rounded-2xl border border-slate-200
                shadow-sm p-6 sm:p-8 mb-6">

        <div class="flex flex-col lg:flex-row
                    lg:items-start lg:justify-between gap-6">

            <div class="flex items-start gap-4">

                <div
                    class="w-14 h-14 rounded-2xl
                           bg-orange-50 border border-orange-200
                           flex items-center justify-center shrink-0"
                >
                    <svg
                        class="w-7 h-7 text-orange-500"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2Z"
                        />
                    </svg>
                </div>


                <div>

                    <h1 class="text-2xl font-bold text-slate-800">
                        {{ $assignment->title }}
                    </h1>

                    <p class="mt-1 text-sm font-medium text-orange-500">
                        {{ $assignment->course->name }}
                    </p>

                    @if($assignment->description)

                        <p class="mt-3 text-sm text-slate-500
                                  leading-relaxed max-w-3xl">
                            {{ $assignment->description }}
                        </p>

                    @endif

                </div>

            </div>


            {{-- Status --}}
            <div class="shrink-0">

                @if($submission?->status === 'graded')

                    <span
                        class="inline-flex px-3 py-1.5 rounded-full
                               bg-green-50 border border-green-200
                               text-sm font-bold text-green-700"
                    >
                        Graded
                    </span>

                @elseif($submission)

                    <span
                        class="inline-flex px-3 py-1.5 rounded-full
                               bg-blue-50 border border-blue-200
                               text-sm font-bold text-blue-700"
                    >
                        Submitted
                    </span>

                @else

                    <span
                        class="inline-flex px-3 py-1.5 rounded-full
                               bg-amber-50 border border-amber-200
                               text-sm font-bold text-amber-700"
                    >
                        Pending
                    </span>

                @endif

            </div>

        </div>


        {{-- Meta --}}
        <div class="flex flex-wrap gap-3 mt-6 pt-6
                    border-t border-slate-100">

            <div class="inline-flex items-center gap-2
                        px-3 py-2 rounded-lg bg-slate-50">

                <svg
                    class="w-4 h-4 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25"
                    />
                </svg>

                <span class="text-sm font-medium text-slate-600">
                    @if($assignment->due_date)
                        Due {{ $assignment->due_date->format('d M Y, h:i A') }}
                    @else
                        No deadline
                    @endif
                </span>

            </div>


            <div class="inline-flex items-center gap-2
                        px-3 py-2 rounded-lg bg-slate-50">

                <span class="text-sm font-medium text-slate-600">
                    {{ $assignment->total_marks }} Marks
                </span>

            </div>

        </div>

    </div>


    {{-- Main --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


        {{-- Left --}}
        <div class="lg:col-span-2 space-y-6">


            {{-- Instructions --}}
            <div
                class="bg-white rounded-2xl border border-slate-200
                       shadow-sm p-6 sm:p-8"
            >

                <h2 class="text-lg font-bold text-slate-800 mb-4">
                    Instructions
                </h2>

                @if($assignment->instructions)

                    <div
                        class="text-sm leading-7 text-slate-600
                               whitespace-pre-line"
                    >
                        {{ $assignment->instructions }}
                    </div>

                @else

                    <p class="text-sm text-slate-400">
                        No instructions provided.
                    </p>

                @endif

            </div>


            {{-- Existing Submission --}}
            @if($submission)

                <div
                    class="bg-white rounded-2xl border border-slate-200
                           shadow-sm p-6 sm:p-8"
                >

                    <div class="flex items-center justify-between mb-5">

                        <h2 class="text-lg font-bold text-slate-800">
                            Your Submission
                        </h2>

                        @if($submission->status === 'graded')

                            <span class="text-sm font-bold text-green-600">
                                {{ $submission->marks }}
                                /
                                {{ $assignment->total_marks }}
                            </span>

                        @endif

                    </div>


                    <div class="space-y-4">

                        <div>

                            <p class="text-xs font-semibold
                                      uppercase tracking-wide
                                      text-slate-400">
                                Submitted
                            </p>

                            <p class="mt-1 text-sm font-medium text-slate-700">
                                {{ $submission->submitted_at?->format('d M Y, h:i A') }}
                            </p>

                        </div>


                        @if($submission->file)

                            <div
                                class="flex items-center justify-between
                                       gap-4 p-4 rounded-xl bg-slate-50"
                            >

                                <div class="flex items-center gap-3">

                                    <div
                                        class="w-10 h-10 rounded-lg
                                               bg-orange-50
                                               flex items-center justify-center"
                                    >
                                        <svg
                                            class="w-5 h-5 text-orange-500"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M7 21h10a2 2 0 002-2V9.414A2 2 0 0018.414 8L14 3.586A2 2 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2Z"
                                            />
                                        </svg>
                                    </div>

                                    <div>

                                        <p class="text-sm font-semibold
                                                  text-slate-700">
                                            Submitted File
                                        </p>

                                        <p class="text-xs text-slate-400">
                                            {{ basename($submission->file) }}
                                        </p>

                                    </div>

                                </div>

                                <a
                                    href="{{ asset($submission->file) }}"
                                    target="_blank"
                                    class="text-sm font-semibold
                                           text-orange-600
                                           hover:text-orange-700"
                                >
                                    View
                                </a>

                            </div>

                        @endif


                        @if($submission->comment)

                            <div>

                                <p class="text-xs font-semibold
                                          uppercase tracking-wide
                                          text-slate-400">
                                    Your Comment
                                </p>

                                <p
                                    class="mt-1 text-sm text-slate-600
                                           whitespace-pre-line"
                                >
                                    {{ $submission->comment }}
                                </p>

                            </div>

                        @endif


                        @if($submission->feedback)

                            <div
                                class="p-4 rounded-xl
                                       bg-green-50 border border-green-200"
                            >

                                <p class="text-xs font-bold
                                          uppercase tracking-wide
                                          text-green-700">
                                    Teacher Feedback
                                </p>

                                <p
                                    class="mt-2 text-sm text-green-800
                                           whitespace-pre-line"
                                >
                                    {{ $submission->feedback }}
                                </p>

                            </div>

                        @endif

                    </div>

                </div>

            @endif

        </div>


        {{-- Right --}}
        <div class="space-y-6">


            {{-- Attachment --}}
            @if($assignment->attachment)

                <div
                    class="bg-white rounded-2xl border border-slate-200
                           shadow-sm p-6"
                >

                    <h2 class="text-lg font-bold text-slate-800 mb-4">
                        Assignment File
                    </h2>

                    <div
                        class="p-4 rounded-xl bg-slate-50
                               border border-slate-100"
                    >

                        <p class="text-sm font-semibold text-slate-700
                                  break-all">
                            {{ basename($assignment->attachment) }}
                        </p>

                        <a
                            href="{{ asset($assignment->attachment) }}"
                            target="_blank"
                            class="inline-flex items-center gap-2 mt-4
                                   px-4 py-2 rounded-lg
                                   bg-slate-800 hover:bg-slate-900
                                   text-white text-sm font-semibold"
                        >
                            Download File
                        </a>

                    </div>

                </div>

            @endif


            {{-- Submit --}}
            <div
                class="bg-white rounded-2xl border border-slate-200
                       shadow-sm p-6"
            >

                @if($submission?->status === 'graded')

                    <div class="text-center">

                        <div
                            class="mx-auto w-14 h-14 rounded-full
                                   bg-green-50 flex items-center
                                   justify-center"
                        >

                            <svg
                                class="w-7 h-7 text-green-500"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                />
                            </svg>

                        </div>

                        <h3 class="mt-4 font-bold text-slate-800">
                            Assignment Graded
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            You received
                            <strong>
                                {{ $submission->marks }}
                                / {{ $assignment->total_marks }}
                            </strong>
                        </p>

                    </div>

                @else

                    <h2 class="text-lg font-bold text-slate-800">
                        {{ $submission ? 'Resubmit Assignment' : 'Submit Assignment' }}
                    </h2>

                    @if($assignment->due_date)

                        <p class="mt-2 text-sm text-slate-500">

                            @if($assignment->due_date->isPast())

                                <span class="text-red-600 font-semibold">
                                    Submission deadline has passed.
                                </span>

                            @else

                                Deadline:
                                {{ $assignment->due_date->format('d M Y, h:i A') }}

                            @endif

                        </p>

                    @endif


                    @if(
                        !$assignment->due_date ||
                        now()->lte($assignment->due_date)
                    )

                        <a
                            href="{{ route('student.tasks.submit', [
                                'course' => $assignment->course,
                                'assignment' => $assignment
                            ]) }}"
                            class="mt-5 w-full inline-flex
                                   items-center justify-center gap-2
                                   px-4 py-3 rounded-xl
                                   bg-gradient-to-r
                                   from-orange-500 to-amber-500
                                   hover:from-orange-600
                                   hover:to-amber-600
                                   text-white text-sm font-bold
                                   shadow-lg shadow-orange-500/20
                                   transition"
                        >
                            {{ $submission ? 'Resubmit Assignment' : 'Submit Assignment' }}
                        </a>

                    @endif

                @endif

            </div>

        </div>

    </div>

</div>

@endsection
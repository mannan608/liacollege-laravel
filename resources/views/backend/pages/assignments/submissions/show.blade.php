@extends('backend.layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Back --}}
    <div class="mb-6">

        <a
            href="{{ role_route(
                'admin.assignments.submissions.index',
                ['assignment' => $assignment]
            ) }}"
            class="inline-flex items-center gap-2
                   text-sm font-medium text-slate-500
                   hover:text-purple-600"
        >
            ← Back to Submissions
        </a>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div
            class="mb-6 px-5 py-4 rounded-xl
                   bg-green-50 border border-green-200
                   text-sm text-green-700"
        >
            {{ session('success') }}
        </div>

    @endif


    {{-- Header --}}
    <div
        class="bg-white rounded-2xl border border-slate-200
               shadow-sm p-6 mb-6"
    >

        <div class="flex flex-col sm:flex-row
                    sm:items-center sm:justify-between gap-5">

            <div>

                <p class="text-sm font-semibold text-purple-600">
                    {{ $assignment->course->name }}
                </p>

                <h1 class="mt-1 text-2xl font-bold text-slate-800">
                    {{ $assignment->title }}
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Student Submission
                </p>

            </div>

            @if($submission->status === 'graded')

                <span
                    class="inline-flex self-start px-3 py-1.5
                           rounded-full bg-green-50
                           border border-green-200
                           text-sm font-bold text-green-700"
                >
                    Graded
                </span>

            @else

                <span
                    class="inline-flex self-start px-3 py-1.5
                           rounded-full bg-amber-50
                           border border-amber-200
                           text-sm font-bold text-amber-700"
                >
                    Awaiting Grade
                </span>

            @endif

        </div>

    </div>


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Student --}}
        <div class="lg:col-span-2 space-y-6">

            <div
                class="bg-white rounded-2xl border border-slate-200
                       shadow-sm p-6"
            >

                <h2 class="text-lg font-bold text-slate-800 mb-5">
                    Student Information
                </h2>

                <div class="flex items-center gap-4">

                    <div
                        class="w-12 h-12 rounded-full
                               bg-purple-100 text-purple-700
                               flex items-center justify-center
                               font-bold"
                    >
                        {{ strtoupper(
                            substr(
                                $submission->student->user->name ?? 'S',
                                0,
                                1
                            )
                        ) }}
                    </div>

                    <div>

                        <h3 class="font-bold text-slate-800">
                            {{ $submission->student->user->name ?? 'Unknown' }}
                        </h3>

                        <p class="text-sm text-slate-500">
                            {{ $submission->student->user->email ?? '' }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Submitted File --}}
            <div
                class="bg-white rounded-2xl border border-slate-200
                       shadow-sm p-6"
            >

                <h2 class="text-lg font-bold text-slate-800 mb-5">
                    Submitted Work
                </h2>

                @if($submission->file)

                    <div
                        class="flex flex-col sm:flex-row
                               sm:items-center sm:justify-between
                               gap-4 p-5 rounded-xl
                               bg-slate-50 border border-slate-200"
                    >

                        <div class="flex items-center gap-4">

                            <div
                                class="w-12 h-12 rounded-xl
                                       bg-purple-50
                                       flex items-center justify-center"
                            >

                                <svg
                                    class="w-6 h-6 text-purple-600"
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

                                <p class="font-semibold text-slate-700
                                          break-all">
                                    {{ basename($submission->file) }}
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Submitted
                                    {{ $submission->submitted_at?->format('d M Y, h:i A') }}
                                </p>

                            </div>

                        </div>


                        <a
                            href="{{ role_route(
                                'admin.assignments.submissions.download',
                                [
                                    'assignment' => $assignment,
                                    'submission' => $submission,
                                ]
                            ) }}"
                            class="inline-flex items-center justify-center
                                   gap-2 px-4 py-2.5 rounded-xl
                                   bg-slate-800 hover:bg-slate-900
                                   text-white text-sm font-semibold"
                        >
                            Download
                        </a>

                    </div>

                @else

                    <p class="text-sm text-red-500">
                        No file was submitted.
                    </p>

                @endif

            </div>


            {{-- Student Comment --}}
            <div
                class="bg-white rounded-2xl border border-slate-200
                       shadow-sm p-6"
            >

                <h2 class="text-lg font-bold text-slate-800 mb-4">
                    Student Comment
                </h2>

                @if($submission->comment)

                    <div
                        class="rounded-xl bg-slate-50
                               border border-slate-100 p-4
                               text-sm text-slate-600
                               whitespace-pre-line"
                    >
                        {{ $submission->comment }}
                    </div>

                @else

                    <p class="text-sm text-slate-400">
                        No comment provided.
                    </p>

                @endif

            </div>

        </div>


        {{-- Grading --}}
        <div>

            <div
                class="bg-white rounded-2xl border border-slate-200
                       shadow-sm p-6 sticky top-6"
            >

                <h2 class="text-lg font-bold text-slate-800">
                    Grade Submission
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Maximum marks:
                    <strong>
                        {{ $assignment->total_marks }}
                    </strong>
                </p>


                <form
                    method="POST"
                    action="{{ role_route(
                        'admin.assignments.submissions.grade',
                        [
                            'assignment' => $assignment,
                            'submission' => $submission,
                        ]
                    ) }}"
                    class="mt-6 space-y-5"
                >

                    @csrf
                    @method('PUT')


                    {{-- Marks --}}
                    <div>

                        <label
                            for="marks"
                            class="block text-sm font-semibold
                                   text-slate-700 mb-2"
                        >
                            Marks
                        </label>

                        <div class="relative">

                            <input
                                type="number"
                                id="marks"
                                name="marks"
                                min="0"
                                max="{{ $assignment->total_marks }}"
                                step="0.01"
                                value="{{ old('marks', $submission->marks) }}"
                                required
                                class="w-full rounded-xl
                                       border border-slate-300
                                       px-4 py-3 pr-20
                                       text-sm
                                       focus:ring-2
                                       focus:ring-purple-500
                                       focus:border-purple-500"
                            >

                            <span
                                class="absolute right-4 top-1/2
                                       -translate-y-1/2
                                       text-sm text-slate-400"
                            >
                                / {{ $assignment->total_marks }}
                            </span>

                        </div>

                        @error('marks')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Feedback --}}
                    <div>

                        <label
                            for="feedback"
                            class="block text-sm font-semibold
                                   text-slate-700 mb-2"
                        >
                            Feedback
                        </label>

                        <textarea
                            id="feedback"
                            name="feedback"
                            rows="7"
                            maxlength="5000"
                            placeholder="Write feedback for the student..."
                            class="w-full rounded-xl
                                   border border-slate-300
                                   px-4 py-3 text-sm
                                   focus:ring-2
                                   focus:ring-purple-500
                                   focus:border-purple-500"
                        >{{ old('feedback', $submission->feedback) }}</textarea>

                        @error('feedback')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <button
                        type="submit"
                        class="w-full px-5 py-3 rounded-xl
                               bg-gradient-to-r
                               from-purple-600 to-indigo-600
                               hover:from-purple-700
                               hover:to-indigo-700
                               text-white text-sm font-bold
                               shadow-lg shadow-purple-500/20
                               transition"
                    >
                        {{ $submission->status === 'graded'
                            ? 'Update Grade'
                            : 'Save Grade'
                        }}
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
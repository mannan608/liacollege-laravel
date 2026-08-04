@extends('backend.layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Back --}}
    <div class="mb-6">

        <a
            href=""
            class="inline-flex items-center gap-2
                   text-sm font-medium
                   text-slate-500
                   hover:text-purple-600"
        >
            ← Back to Student Assignments
        </a>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div
            class="mb-6 p-4 rounded-xl
                   bg-green-50
                   border border-green-200
                   text-sm text-green-700"
        >
            {{ session('success') }}
        </div>

    @endif


    {{-- Header --}}
    <div
        class="bg-white rounded-2xl
               border border-slate-200
               shadow-sm p-6 mb-6"
    >

        <div class="flex flex-col
                    md:flex-row
                    md:items-center
                    md:justify-between gap-5">

            <div>

                <p class="text-sm font-semibold text-purple-600">
                    {{ $submission->assignment->course->title }}
                </p>

                <h1 class="text-2xl font-bold text-slate-800 mt-1">
                    {{ $submission->assignment->title }}
                </h1>

                <p class="text-sm text-slate-500 mt-2">
                    Submitted by
                    <strong>
                        {{ $student->user->name }}
                    </strong>
                </p>

            </div>


            @if($submission->status === 'graded')

                <span
                    class="px-3 py-1.5 rounded-full
                           bg-green-50
                           border border-green-200
                           text-sm font-bold
                           text-green-700"
                >
                    Graded
                </span>

            @else

                <span
                    class="px-3 py-1.5 rounded-full
                           bg-amber-50
                           border border-amber-200
                           text-sm font-bold
                           text-amber-700"
                >
                    Awaiting Grade
                </span>

            @endif

        </div>

    </div>


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


        {{-- Submission --}}
        <div class="lg:col-span-2 space-y-6">


            {{-- Student --}}
            <div
                class="bg-white rounded-2xl
                       border border-slate-200
                       shadow-sm p-6"
            >

                <h2 class="text-lg font-bold text-slate-800 mb-5">
                    Student
                </h2>

                <div class="flex items-center gap-4">

                    <div
                        class="w-12 h-12 rounded-full
                               bg-purple-100
                               flex items-center justify-center
                               text-lg font-bold
                               text-purple-700"
                    >
                        {{ strtoupper(
                            substr(
                                $student->user->name,
                                0,
                                1
                            )
                        ) }}
                    </div>

                    <div>

                        <p class="font-bold text-slate-800">
                            {{ $student->user->name }}
                        </p>

                        <p class="text-sm text-slate-500">
                            {{ $student->user->email ?? '' }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- File --}}
            <div
                class="bg-white rounded-2xl
                       border border-slate-200
                       shadow-sm p-6"
            >

                <div class="flex items-center
                            justify-between mb-5">

                    <h2 class="text-lg font-bold text-slate-800">
                        Submitted File
                    </h2>

                    <span class="text-xs text-slate-400">
                        {{ $submission->submitted_at?->format('d M Y h:i A') }}
                    </span>

                </div>


                @if($submission->file)

                    <div
                        class="flex items-center
                               justify-between gap-4
                               p-4 rounded-xl
                               bg-slate-50
                               border border-slate-200"
                    >

                        <div class="flex items-center gap-3">

                            <div
                                class="w-11 h-11 rounded-xl
                                       bg-purple-50
                                       flex items-center justify-center"
                            >

                                <svg
                                    class="w-5 h-5 text-purple-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414A2 2 0 0018.414 8L14 3.586A2 2 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                                    />
                                </svg>

                            </div>

                            <div>

                                <p class="font-semibold text-slate-700 break-all">
                                    {{ basename($submission->file) }}
                                </p>

                                <p class="text-xs text-slate-400">
                                    Student submission
                                </p>

                            </div>

                        </div>


                        <a
                            href="{{ asset($submission->file) }}"
    download
                            class="shrink-0
                                   inline-flex items-center gap-2
                                   px-4 py-2.5
                                   rounded-xl
                                   bg-slate-800
                                   hover:bg-slate-900
                                   text-white
                                   text-sm font-semibold"
                        >

                            <svg
                                class="w-4 h-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 3v12m0 0l4-4m-4 4l-4-4M4 21h16"
                                />
                            </svg>

                            Download

                        </a>

                    </div>

                @else

                    <p class="text-sm text-red-500">
                        No file submitted.
                    </p>

                @endif

            </div>


            {{-- Student comment --}}
            <div
                class="bg-white rounded-2xl
                       border border-slate-200
                       shadow-sm p-6"
            >

                <h2 class="text-lg font-bold text-slate-800 mb-4">
                    Student Comment
                </h2>

                @if($submission->comment)

                    <div
                        class="p-4 rounded-xl
                               bg-slate-50
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


            {{-- Existing Feedback --}}
            @if($submission->feedback)

                <div
                    class="bg-green-50
                           border border-green-200
                           rounded-2xl p-6"
                >

                    <h2 class="text-lg font-bold text-green-800 mb-3">
                        Current Feedback
                    </h2>

                    <p
                        class="text-sm text-green-700
                               whitespace-pre-line"
                    >
                        {{ $submission->feedback }}
                    </p>

                </div>

            @endif

        </div>


        {{-- Grade --}}
        <div>

            <div
                class="bg-white rounded-2xl
                       border border-slate-200
                       shadow-sm p-6
                       sticky top-6"
            >

                <h2 class="text-lg font-bold text-slate-800">
                    Grade Assignment
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Maximum:
                    <strong>
                        {{ $submission->assignment->total_marks }}
                    </strong>
                    marks
                </p>


                <form
                    method="POST"
                    action="{{ role_route('role.assignments.submissions.grade', ['student' => $student, 'submission' => $submission]) }}"
                    class="mt-6 space-y-5"
                >

                    @csrf
                    @method('PUT')


                    {{-- Marks --}}
                    <div>

                        <label
                            for="marks"
                            class="block text-sm
                                   font-semibold text-slate-700 mb-2"
                        >
                            Marks
                        </label>

                        <input
                            type="number"
                            name="marks"
                            id="marks"
                            min="0"
                            max="{{ $submission->assignment->total_marks }}"
                            step="0.01"
                            value="{{ old(
                                'marks',
                                $submission->marks
                            ) }}"
                            required
                            class="w-full rounded-xl
                                   border border-slate-300
                                   px-4 py-3
                                   text-sm
                                   focus:border-purple-500
                                   focus:ring-2
                                   focus:ring-purple-500"
                        >

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
                            class="block text-sm
                                   font-semibold text-slate-700 mb-2"
                        >
                            Feedback
                        </label>

                        <textarea
                            name="feedback"
                            id="feedback"
                            rows="7"
                            maxlength="5000"
                            placeholder="Write feedback for the student..."
                            class="w-full rounded-xl
                                   border border-slate-300
                                   px-4 py-3
                                   text-sm
                                   focus:border-purple-500
                                   focus:ring-2
                                   focus:ring-purple-500"
                        >{{ old(
                            'feedback',
                            $submission->feedback
                        ) }}</textarea>

                        @error('feedback')

                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    <button
                        type="submit"
                        class="w-full py-3 rounded-xl
                               bg-gradient-to-r
                               from-purple-600
                               to-indigo-600
                               hover:from-purple-700
                               hover:to-indigo-700
                               text-white
                               text-sm font-bold
                               shadow-lg
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
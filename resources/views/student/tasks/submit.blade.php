@extends('student.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Back --}}
    <div class="mb-6">

       <a
    href="{{ route('student.tasks.show', [
        'course' => $assignment->course_id,
        'assignment' => $assignment->id,
    ]) }}"
    class="inline-flex items-center gap-2
           text-sm font-medium
           text-slate-500 hover:text-orange-600"
>
    ← Back to Assignment
</a>

    </div>


    {{-- Header --}}
    <div class="mb-6">

        <p class="text-sm font-semibold text-orange-500">
            {{ $assignment->course->name }}
        </p>

        <h1 class="mt-1 text-2xl font-bold text-slate-800">
            {{ $submission ? 'Resubmit Assignment' : 'Submit Assignment' }}
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            {{ $assignment->title }}
        </p>

    </div>


    {{-- Errors --}}
    @if($errors->any())

        <div
            class="mb-6 rounded-xl border border-red-200
                   bg-red-50 p-4"
        >

            <ul class="list-disc list-inside
                       text-sm text-red-700 space-y-1">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- Error --}}
    @if(session('error'))

        <div
            class="mb-6 rounded-xl border border-red-200
                   bg-red-50 p-4 text-sm text-red-700"
        >
            {{ session('error') }}
        </div>

    @endif


    {{-- Existing Submission --}}
    @if($submission)

        <div
            class="mb-6 rounded-2xl border border-blue-200
                   bg-blue-50 p-5"
        >

            <div class="flex items-start gap-3">

                <svg
                    class="w-5 h-5 text-blue-500 mt-0.5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M12 22a10 10 0 100-20 10 10 0 000 20Z"
                    />
                </svg>

                <div>

                    <h3 class="text-sm font-bold text-blue-800">
                        You already submitted this assignment.
                    </h3>

                    <p class="mt-1 text-sm text-blue-700">
                        Submitting again will replace your previous
                        submission.
                    </p>

                </div>

            </div>

        </div>

    @endif


    {{-- Form --}}
    <form
        method="POST"
        action="{{ route('student.tasks.store', [
            'course' => $assignment->course,
            'assignment' => $assignment
        ]) }}"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf


        {{-- Assignment Info --}}
        <div
            class="bg-white rounded-2xl border border-slate-200
                   shadow-sm p-6"
        >

            <h2 class="text-lg font-bold text-slate-800 mb-5">
                Assignment Information
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                <div>

                    <p class="text-xs font-semibold uppercase
                              tracking-wide text-slate-400">
                        Total Marks
                    </p>

                    <p class="mt-1 text-sm font-semibold text-slate-700">
                        {{ $assignment->total_marks }}
                    </p>

                </div>


                <div>

                    <p class="text-xs font-semibold uppercase
                              tracking-wide text-slate-400">
                        Due Date
                    </p>

                    <p class="mt-1 text-sm font-semibold
                              {{ $assignment->due_date?->isPast()
                                    ? 'text-red-600'
                                    : 'text-slate-700'
                              }}"
                    >

                        @if($assignment->due_date)

                            {{ $assignment->due_date->format('d M Y, h:i A') }}

                        @else

                            No deadline

                        @endif

                    </p>

                </div>

            </div>

        </div>


        {{-- File --}}
        <div
            class="bg-white rounded-2xl border border-slate-200
                   shadow-sm p-6"
        >

            <h2 class="text-lg font-bold text-slate-800">
                Your Submission
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Upload your completed assignment.
            </p>


            <div class="mt-5">

                <label
                    for="file"
                    class="block text-sm font-semibold
                           text-slate-700 mb-2"
                >
                    Assignment File
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="file"
                    id="file"
                    name="file"
                    required
                    accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip"
                    class="block w-full text-sm text-slate-600
                           border border-slate-300 rounded-xl
                           cursor-pointer
                           file:mr-4 file:py-3 file:px-4
                           file:border-0
                           file:bg-slate-100
                           file:text-slate-700
                           file:font-semibold
                           hover:file:bg-slate-200"
                >

                <p class="mt-2 text-xs text-slate-400">
                    PDF, Word, Excel, PowerPoint or ZIP.
                    Maximum file size: 20 MB.
                </p>

            </div>

        </div>


        {{-- Comment --}}
        <div
            class="bg-white rounded-2xl border border-slate-200
                   shadow-sm p-6"
        >

            <label
                for="comment"
                class="block text-sm font-semibold
                       text-slate-700 mb-2"
            >
                Comment
                <span class="text-xs font-normal text-slate-400">
                    (Optional)
                </span>
            </label>

            <textarea
                id="comment"
                name="comment"
                rows="5"
                maxlength="5000"
                placeholder="Add a comment for your instructor..."
                class="w-full rounded-xl border border-slate-300
                       px-4 py-3 text-sm text-slate-700
                       focus:ring-2 focus:ring-orange-500
                       focus:border-orange-500"
            >{{ old('comment', $submission?->comment) }}</textarea>

        </div>


        {{-- Submit --}}
        <div class="flex items-center justify-end gap-3">

           <a
    href="{{ route('student.tasks.show', [
        'course' => $assignment->course_id,
        'assignment' => $assignment->id,
    ]) }}"
    class="px-5 py-3 rounded-xl
           border border-slate-300
           text-sm font-semibold text-slate-600
           hover:bg-slate-50"
>
    Cancel
</a>

            <button
                type="submit"
                class="px-6 py-3 rounded-xl
                       bg-gradient-to-r
                       from-orange-500 to-amber-500
                       hover:from-orange-600
                       hover:to-amber-600
                       text-white text-sm font-bold
                       shadow-lg shadow-orange-500/20
                       transition"
            >
                {{ $submission ? 'Resubmit Assignment' : 'Submit Assignment' }}
            </button>

        </div>

    </form>

</div>

@endsection
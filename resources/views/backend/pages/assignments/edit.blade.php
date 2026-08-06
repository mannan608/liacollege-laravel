@extends('backend.layouts.app')

@section('content')

<div class="px-4 sm:px-6 lg:px-8 py-6 max-w-5xl mx-auto">

    {{-- Header --}}
    <div class="mb-6">

        <a
            href="{{ role_route('role.assignments.index') }}"
            class="inline-flex items-center gap-1 text-sm
                   text-gray-500 hover:text-gray-900
                   dark:text-gray-400 dark:hover:text-white mb-4"
        >
            ← Back to Assignments
        </a>

        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Edit Assignment
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Update the assignment details below.
        </p>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="mb-6 rounded-lg border border-red-200
                    bg-red-50 dark:bg-red-900/20
                    dark:border-red-800 p-4">

            <ul class="list-disc list-inside text-sm text-red-700
                       dark:text-red-400 space-y-1">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <form
        method="POST"
        action="{{ role_route('role.assignments.update', [
            'assignment' => $assignment,
        ]) }}"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf
        @method('PUT')


        {{-- Basic Information --}}
        <div class="bg-white dark:bg-gray-800
                    border border-gray-200 dark:border-gray-700
                    rounded-xl shadow-sm p-6">

            <h2 class="text-lg font-semibold
                       text-gray-900 dark:text-white mb-5">
                Assignment Information
            </h2>


            {{-- Course --}}
            <div class="mb-5">

                <label
                    for="course_id"
                    class="block text-sm font-medium
                           text-gray-700 dark:text-gray-300 mb-2"
                >
                    Course
                    <span class="text-red-500">*</span>
                </label>

                <select
                    id="course_id"
                    name="course_id"
                    required
                    class="w-full rounded-lg border border-gray-300
                           dark:border-gray-600 dark:bg-gray-700
                           dark:text-white px-4 py-2.5
                           focus:ring-2 focus:ring-brand-500
                           focus:border-brand-500"
                >
                    <option value="">Select a course</option>

                    @foreach($courses as $course)
                        <option
                            value="{{ $course->id }}"
                            @selected(old('course_id', $assignment->course_id) == $course->id)
                        >
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>

            </div>


            {{-- Title --}}
            <div class="mb-5">

                <label
                    for="title"
                    class="block text-sm font-medium
                           text-gray-700 dark:text-gray-300 mb-2"
                >
                    Assignment Title
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $assignment->title) }}"
                    required
                    placeholder="e.g. First Aid Risk Assessment"
                    class="w-full rounded-lg border border-gray-300
                           dark:border-gray-600 dark:bg-gray-700
                           dark:text-white px-4 py-2.5
                           focus:ring-2 focus:ring-brand-500
                           focus:border-brand-500"
                >

            </div>


            {{-- Description --}}
            <div class="mb-5">

                <label
                    for="description"
                    class="block text-sm font-medium
                           text-gray-700 dark:text-gray-300 mb-2"
                >
                    Short Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="3"
                    placeholder="Brief description of the assignment..."
                    class="w-full rounded-lg border border-gray-300
                           dark:border-gray-600 dark:bg-gray-700
                           dark:text-white px-4 py-2.5
                           focus:ring-2 focus:ring-brand-500
                           focus:border-brand-500"
                >{{ old('description', $assignment->description) }}</textarea>

            </div>


            {{-- Instructions --}}
            <div>

                <label
                    for="instructions"
                    class="block text-sm font-medium
                           text-gray-700 dark:text-gray-300 mb-2"
                >
                    Instructions
                </label>

                <textarea
                    id="instructions"
                    name="instructions"
                    rows="8"
                    placeholder="Provide detailed instructions for students..."
                    class="w-full rounded-lg border border-gray-300
                           dark:border-gray-600 dark:bg-gray-700
                           dark:text-white px-4 py-2.5
                           focus:ring-2 focus:ring-brand-500
                           focus:border-brand-500"
                >{{ old('instructions', $assignment->instructions) }}</textarea>

            </div>

        </div>


        {{-- Assignment Settings --}}
        <div class="bg-white dark:bg-gray-800
                    border border-gray-200 dark:border-gray-700
                    rounded-xl shadow-sm p-6">

            <h2 class="text-lg font-semibold
                       text-gray-900 dark:text-white mb-5">
                Assignment Settings
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                {{-- Due Date --}}
                <div>

                    <label
                        for="due_date"
                        class="block text-sm font-medium
                               text-gray-700 dark:text-gray-300 mb-2"
                    >
                        Due Date
                    </label>

                    <input
                        type="datetime-local"
                        id="due_date"
                        name="due_date"
                        value="{{ old(
                            'due_date',
                            $assignment->due_date
                                ? $assignment->due_date->format('Y-m-d\TH:i')
                                : ''
                        ) }}"
                        class="w-full rounded-lg border border-gray-300
                               dark:border-gray-600 dark:bg-gray-700
                               dark:text-white px-4 py-2.5
                               focus:ring-2 focus:ring-brand-500"
                    >

                </div>


                {{-- Total Marks --}}
                <div>

                    <label
                        for="total_marks"
                        class="block text-sm font-medium
                               text-gray-700 dark:text-gray-300 mb-2"
                    >
                        Total Marks
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="number"
                        id="total_marks"
                        name="total_marks"
                        value="{{ old('total_marks', $assignment->total_marks) }}"
                        min="1"
                        required
                        class="w-full rounded-lg border border-gray-300
                               dark:border-gray-600 dark:bg-gray-700
                               dark:text-white px-4 py-2.5
                               focus:ring-2 focus:ring-brand-500"
                    >

                </div>


                {{-- Status --}}
                <div>

                    <label
                        for="status"
                        class="block text-sm font-medium
                               text-gray-700 dark:text-gray-300 mb-2"
                    >
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="w-full rounded-lg border border-gray-300
                               dark:border-gray-600 dark:bg-gray-700
                               dark:text-white px-4 py-2.5
                               focus:ring-2 focus:ring-brand-500"
                    >

                        <option
                            value="active"
                            @selected(old('status', $assignment->status) === 'active')
                        >
                            Active
                        </option>

                        <option
                            value="inactive"
                            @selected(old('status', $assignment->status) === 'inactive')
                        >
                            Inactive
                        </option>

                    </select>

                </div>

            </div>

        </div>


        {{-- Attachment --}}
        <div class="bg-white dark:bg-gray-800
                    border border-gray-200 dark:border-gray-700
                    rounded-xl shadow-sm p-6">

            <h2 class="text-lg font-semibold
                       text-gray-900 dark:text-white mb-2">
                Assignment Attachment
            </h2>

            <p class="text-sm text-gray-500 dark:text-gray-400 mb-5">
                Optional. Students will be able to download this file.
            </p>

            {{-- Current Attachment Preview --}}
            @if($assignment->attachment)

                <div class="flex items-center justify-between gap-4
                            p-4 mb-5 rounded-lg
                            bg-gray-50 dark:bg-gray-700">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-lg
                                    bg-blue-100 dark:bg-blue-900/30
                                    flex items-center justify-center">

                            <svg
                                class="w-5 h-5 text-blue-600 dark:text-blue-400"
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

                        <div>
                            <p class="text-sm font-medium
                                      text-gray-900 dark:text-white">
                                Current attachment
                            </p>

                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                {{ basename($assignment->attachment) }}
                            </p>
                        </div>

                    </div>

                    <a
                        href="{{ asset($assignment->attachment) }}"
                        target="_blank"
                        class="text-sm font-medium text-blue-600
                               hover:text-blue-800 dark:text-blue-400"
                    >
                        View File
                    </a>

                </div>

            @endif


            <label
                for="attachment"
                class="block text-sm font-medium
                       text-gray-700 dark:text-gray-300 mb-2"
            >
                {{ $assignment->attachment
                    ? 'Replace Attachment (optional)'
                    : 'Upload Attachment'
                }}
            </label>

            <input
                type="file"
                id="attachment"
                name="attachment"
                accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip"
                class="block w-full text-sm text-gray-600
                       file:mr-4 file:py-2.5 file:px-4
                       file:rounded-lg file:border-0
                       file:text-sm file:font-medium
                       file:bg-gray-100 file:text-gray-700
                       hover:file:bg-gray-200"
            >

            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                PDF, Word, Excel, PowerPoint or ZIP. Maximum 20 MB.
                @if($assignment->attachment)
                    Leave empty to keep the current file.
                @endif
            </p>

        </div>


        {{-- Buttons --}}
        <div class="flex items-center justify-end gap-3">

            <a
                href="{{ role_route('role.assignments.index') }}"
                class="px-5 py-2.5 rounded-lg border
                       border-gray-300 text-gray-700
                       hover:bg-gray-50 text-sm font-medium
                       dark:border-gray-600 dark:text-gray-300
                       dark:hover:bg-gray-700"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="px-5 py-2.5 rounded-lg
                       bg-brand-600 hover:bg-brand-700
                       text-white text-sm font-medium"
            >
                Update Assignment
            </button>

        </div>

    </form>

</div>

@endsection

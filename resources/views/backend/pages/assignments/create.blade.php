@extends('backend.layouts.app')

@section('content')

<div class="px-4 sm:px-6 lg:px-8 py-6 max-w-5xl mx-auto">

    {{-- Header --}}
    <div class="mb-6">

        <a
            href="{{ role_route('role.assignments.index') }}"
            class="inline-flex items-center gap-1 text-sm
                   text-gray-500 hover:text-gray-900 mb-4"
        >
            Back to Assignments
        </a>

        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Create Assignment
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Create an assignment and choose the course it belongs to.
        </p>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="mb-6 rounded-lg border border-red-200
                    bg-red-50 p-4">

            <ul class="list-disc list-inside text-sm text-red-700 space-y-1">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <form
        method="POST"
        action="{{ role_route('role.assignments.store') }}"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf


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
                            @selected(old('course_id') == $course->id)
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
                    value="{{ old('title') }}"
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
                >{{ old('description') }}</textarea>

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
                >{{ old('instructions') }}</textarea>

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
                        value="{{ old('due_date') }}"
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
                        value="{{ old('total_marks', 100) }}"
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
                            @selected(old('status', 'active') === 'active')
                        >
                            Active
                        </option>

                        <option
                            value="inactive"
                            @selected(old('status') === 'inactive')
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

            <p class="text-sm text-gray-500 mb-5">
                Optional. Students will be able to download this file.
            </p>

            <input
                type="file"
                name="attachment"
                accept=".pdf,.doc,.docx"
                class="block w-full text-sm text-gray-600
                       file:mr-4 file:py-2.5 file:px-4
                       file:rounded-lg file:border-0
                       file:text-sm file:font-medium
                       file:bg-gray-100 file:text-gray-700
                       hover:file:bg-gray-200"
            >

            <p class="mt-2 text-xs text-gray-500">
                PDF, Word, Excel, PowerPoint or ZIP. Maximum 20 MB.
            </p>

        </div>


        {{-- Buttons --}}
        <div class="flex items-center justify-end gap-3">

            <a
                href="{{ role_route('role.assignments.index') }}"
                class="px-5 py-2.5 rounded-lg border
                       border-gray-300 text-gray-700
                       hover:bg-gray-50 text-sm font-medium"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="px-5 py-2.5 rounded-lg
                       bg-brand-600 hover:bg-brand-700
                       text-white text-sm font-medium"
            >
                Create Assignment
            </button>

        </div>

    </form>

</div>

@endsection

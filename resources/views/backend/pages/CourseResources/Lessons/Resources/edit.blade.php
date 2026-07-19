@extends('backend.layouts.app')

@section('content')
    <form
        action="{{ role_route('role.lessons.update', [
            'course' => $course->id,
            'module' => $module->id,
            'lesson' => $lesson->id,
        ]) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

            <div class="space-y-6 lg:col-span-8">

                {{-- Lesson Information --}}
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">

                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Edit Lesson
                        </h2>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Module: {{ $module->title }}
                        </p>

                    </div>

                    <div class="space-y-5 p-5">

                        {{-- Title --}}
                        <x-form.input-text
                            name="title"
                            label="Lesson Title"
                            value="{{ old('title', $lesson->title) }}"
                            placeholder="Enter lesson title..."
                        />

                        {{-- Duration --}}
                        <div>

                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Duration
                            </label>

                            <div class="relative">

                                <input
                                    type="number"
                                    name="duration"
                                    min="0"
                                    value="{{ old('duration', $lesson->duration) }}"
                                    placeholder="Enter duration in minutes"
                                    class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 pr-24 text-sm text-gray-800 outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                                >

                                <span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-sm text-gray-400">
                                    Minutes
                                </span>

                            </div>

                            @error('duration')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Content --}}
                        <div>

                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Lesson Content
                            </label>

                            <textarea
                                name="content"
                                rows="8"
                                placeholder="Write lesson content..."
                                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                            >{{ old('content', $lesson->content) }}</textarea>

                            @error('content')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- Lesson Types --}}
                @php
                    $selectedLessonTypes = old(
                        'lesson_types',
                        $lesson->lesson_types ?? []
                    );
                @endphp

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">

                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Lesson Types
                        </h2>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Select one or more lesson types.
                        </p>

                    </div>

                    <div class="p-5">

                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">

                            @foreach (config('course.lesson_types', []) as $value => $label)

                                <label
                                    class="flex cursor-pointer items-center gap-3 rounded-xl border border-gray-200 p-4 transition hover:border-brand-400 hover:bg-brand-50 dark:border-gray-700 dark:hover:border-brand-500 dark:hover:bg-brand-500/10">

                                    <input
                                        type="checkbox"
                                        name="lesson_types[]"
                                        value="{{ $value }}"
                                        @checked(in_array(
                                            $value,
                                            $selectedLessonTypes
                                        ))
                                        class="size-4 rounded border-gray-300 text-brand-600 focus:ring-brand-500"
                                    >

                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                        {{ $label }}
                                    </span>

                                </label>

                            @endforeach

                        </div>

                        @error('lesson_types')
                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                        @error('lesson_types.*')
                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- Status --}}
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">

                    <div class="flex items-center justify-between gap-4 p-5">

                        <div>

                            <h2 class="text-sm font-semibold text-gray-800 dark:text-white">
                                Lesson Status
                            </h2>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Make this lesson active.
                            </p>

                        </div>

                        <label class="relative inline-flex cursor-pointer items-center">

                            <input
                                type="checkbox"
                                name="status"
                                value="1"
                                class="peer sr-only"
                                @checked(old('status', $lesson->status))
                            >

                            <div class="h-6 w-11 rounded-full bg-gray-200 transition peer-checked:bg-brand-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-300 dark:bg-gray-700 dark:peer-focus:ring-brand-800"></div>

                            <div class="absolute left-[2px] top-[2px] size-5 rounded-full border border-gray-300 bg-white transition peer-checked:translate-x-full peer-checked:border-white"></div>

                        </label>

                    </div>

                </div>


                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-500">

                    Update Lesson

                </button>

            </div>

        </div>

    </form>
@endsection
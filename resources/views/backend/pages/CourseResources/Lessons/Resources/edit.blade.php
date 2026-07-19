@extends('backend.layouts.app')

@section('content')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div class="mx-auto max-w-5xl p-6"
        x-data="lessonResourceForm(
            @js($resource->resource_type)
        )">

        <div class="mb-6 flex items-center justify-between">

            <div>
                <h2 class="text-2xl font-bold text-slate-900">
                    Edit Lesson Resource
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    {{ $lesson->title }}
                </p>
            </div>

            <a href="{{ role_route('role.resources.index', [
                'course' => $course->id,
                'module' => $module->id,
                'lesson' => $lesson->id,
            ]) }}"
                class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">

                Back

            </a>

        </div>


        <form action="{{ role_route('role.resources.update', [
            'course' => $course->id,
            'module' => $module->id,
            'lesson' => $lesson->id,
            'resource' => $resource->id,
        ]) }}"
            method="POST"
            enctype="multipart/form-data"
            class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            @csrf
            @method('PUT')


            <div class="space-y-6">

                {{-- Type --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Resource Type
                    </label>

                    <select name="resource_type"
                        x-model="resourceType"
                        class="w-full rounded-lg border border-slate-200 px-3 py-3 text-sm outline-none focus:border-brand-500">

                        <option value="video">
                            Video
                        </option>

                        <option value="content">
                            Content
                        </option>

                        <option value="file">
                            File
                        </option>

                        <option value="quiz">
                            Quiz
                        </option>

                    </select>

                </div>


                {{-- Dynamic Fields --}}
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">

                    {{-- Title --}}
                    <div class="mb-5">

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Resource Title
                        </label>

                        <input type="text"
                            name="title"
                            value="{{ old('title', $resource->title) }}"
                            class="w-full rounded-lg border border-slate-200 bg-white px-3 py-3 text-sm outline-none focus:border-brand-500">

                    </div>


                    {{-- Video --}}
                    <div x-show="resourceType === 'video'"
                        x-cloak>

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Video URL
                        </label>

                        <input type="url"
                            name="url"
                            value="{{ old('url', $resource->url) }}"
                            class="w-full rounded-lg border border-slate-200 bg-white px-3 py-3 text-sm outline-none focus:border-brand-500">

                    </div>


                    {{-- Content --}}
                    <div x-show="resourceType === 'content'"
                        x-cloak>

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Content
                        </label>

                        <textarea name="description"
                            rows="8"
                            class="w-full rounded-lg border border-slate-200 bg-white px-3 py-3 text-sm outline-none focus:border-brand-500">{{ old('description', $resource->description) }}</textarea>

                    </div>


                    {{-- File --}}
                    <div x-show="resourceType === 'file'"
                        x-cloak>

                        @if ($resource->file_path)

                            <div class="mb-4 rounded-lg border border-slate-200 bg-white p-3 text-sm">

                                Current File:

                                <a href="{{ asset($resource->file_path) }}"
                                    target="_blank"
                                    class="font-semibold text-brand-600 hover:underline">

                                    {{ basename($resource->file_path) }}

                                </a>

                            </div>

                        @endif

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Replace File
                        </label>

                        <input type="file"
                            name="file"
                            accept=".pdf,.doc,.docx,.ppt,.pptx"
                            class="w-full rounded-lg border border-slate-200 bg-white px-3 py-3 text-sm outline-none focus:border-brand-500">

                    </div>


                    {{-- Quiz --}}
                    <div x-show="resourceType === 'quiz'"
                        x-cloak>

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Select Quiz
                        </label>

                        <select name="quiz_id"
                            class="w-full rounded-lg border border-slate-200 bg-white px-3 py-3 text-sm outline-none focus:border-brand-500">

                            @foreach ($quizzes as $quiz)

                                <option value="{{ $quiz['id'] }}"
                                    @selected(old('quiz_id', $resource->url) == $quiz['id'])>

                                    {{ $quiz['title'] }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                {{-- Status --}}
                <div>

                    <input type="hidden"
                        name="status"
                        value="0">

                    <label class="inline-flex items-center gap-3">

                        <input type="checkbox"
                            name="status"
                            value="1"
                            @checked(old('status', $resource->status))
                            class="h-4 w-4 rounded border-slate-300 text-brand-600">

                        <span class="text-sm font-medium text-slate-700">
                            Active Resource
                        </span>

                    </label>

                </div>


                <div class="flex justify-end gap-3 border-t border-slate-200 pt-5">

                    <a href="{{ role_route('role.resources.index', [
                        'course' => $course->id,
                        'module' => $module->id,
                        'lesson' => $lesson->id,
                    ]) }}"
                        class="rounded-lg px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-100">

                        Cancel

                    </a>

                    <button type="submit"
                        class="rounded-lg bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-brand-700">

                        Update Resource

                    </button>

                </div>

            </div>

        </form>

    </div>


    <script>
        function lessonResourceForm(initialType) {
            return {
                resourceType: @json(old('resource_type', $resource->resource_type)),
            };
        }
    </script>
@endsection
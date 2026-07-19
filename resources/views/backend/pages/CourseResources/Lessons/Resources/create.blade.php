@extends('backend.layouts.app')

@section('content')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div class="mx-auto max-w-6xl p-6"
        x-data="lessonResourceForm()">

        {{-- Header --}}
        <div class="mb-6 flex items-center justify-between">

            <div>
                <h2 class="text-2xl font-bold text-slate-900">
                    Add Lesson Resources dsfdsf
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


        {{-- Form --}}
        <form action="{{ role_route('role.resources.store', [
            'course' => $course->id,
            'module' => $module->id,
            'lesson' => $lesson->id,
        ]) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf


            {{-- Validation Errors --}}
            @if ($errors->any())

                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">

                    <ul class="list-disc space-y-1 pl-5">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

                {{-- LEFT: ADD RESOURCE --}}
                <div class="lg:col-span-5">

                    <div class="sticky top-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                        <div class="mb-5">

                            <h3 class="text-lg font-semibold text-slate-900">
                                Add Resource
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Select a type and add a resource.
                            </p>

                        </div>


                        {{-- Resource Type --}}
                        <div class="mb-5">

                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Resource Type
                            </label>

                            <select x-model="current.type"
                                class="w-full rounded-lg border border-slate-200 px-3 py-3 text-sm outline-none focus:border-brand-500">

                                <option value="">
                                    Select resource type
                                </option>

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
                        <div x-show="current.type"
                            x-cloak
                            class="space-y-5 rounded-xl border border-slate-200 bg-slate-50 p-5">


                            {{-- Title --}}
                            <div>

                                <label class="mb-2 block text-sm font-semibold text-slate-700">
                                    Resource Title
                                </label>

                                <input type="text"
                                    x-model="current.title"
                                    placeholder="Enter resource title..."
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-3 text-sm outline-none focus:border-brand-500">

                            </div>


                            {{-- VIDEO --}}
                            <div x-show="current.type === 'video'"
                                x-cloak>

                                <label class="mb-2 block text-sm font-semibold text-slate-700">
                                    Video URL
                                </label>

                                <input type="url"
                                    x-model="current.url"
                                    placeholder="https://youtube.com/..."
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-3 text-sm outline-none focus:border-brand-500">

                            </div>


                            {{-- CONTENT --}}
                            <div x-show="current.type === 'content'"
                                x-cloak>

                                <label class="mb-2 block text-sm font-semibold text-slate-700">
                                    Content
                                </label>

                                <textarea x-model="current.description"
                                    rows="7"
                                    placeholder="Write lesson content..."
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-3 text-sm outline-none focus:border-brand-500"></textarea>

                            </div>


                            {{-- FILE --}}
                            <div x-show="current.type === 'file'"
                                x-cloak>

                                <label class="mb-2 block text-sm font-semibold text-slate-700">
                                    Upload File
                                </label>

                                <input type="file"
                                    x-ref="fileInput"
                                    @change="current.file = $event.target.files[0]"
                                    accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip"
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-3 text-sm outline-none focus:border-brand-500">

                            </div>


                            {{-- QUIZ --}}
                            <div x-show="current.type === 'quiz'"
                                x-cloak>

                                <label class="mb-2 block text-sm font-semibold text-slate-700">
                                    Select Quiz
                                </label>

                                <select x-model="current.quiz_id"
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-3 text-sm outline-none focus:border-brand-500">

                                    <option value="">
                                        Select a quiz
                                    </option>

                                    @foreach ($quizzes as $quiz)

                                        <option value="{{ $quiz['id'] }}">
                                            {{ $quiz['title'] }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- Add Button --}}
                            <button type="button"
                                @click="addResource()"
                                class="w-full rounded-lg bg-brand-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-brand-700">

                                + Add Resource

                            </button>

                        </div>

                    </div>

                </div>


                {{-- RIGHT: RESOURCE LIST --}}
                <div class="lg:col-span-7">

                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="flex items-center justify-between border-b border-slate-200 p-5">

                            <div>

                                <h3 class="text-lg font-semibold text-slate-900">
                                    New Resources
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    Resources to be added to this lesson.
                                </p>

                            </div>

                            <span class="rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-700"
                                x-text="resources.length + ' Resource(s)'">
                            </span>

                        </div>


                        {{-- Empty State --}}
                        <div x-show="resources.length === 0"
                            class="p-12 text-center">

                            <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-slate-100">

                                <svg class="h-7 w-7 text-slate-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4v16m8-8H4" />

                                </svg>

                            </div>

                            <p class="text-sm font-medium text-slate-600">
                                No resources added yet
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                Select a resource type and add one.
                            </p>

                        </div>


                        {{-- Resource Items --}}
                        <div class="divide-y divide-slate-100">

                            <template x-for="(resource, index) in resources"
                                :key="resource.key">

                                <div class="p-5">

                                    <div class="flex items-start justify-between gap-4">

                                        <div class="flex items-start gap-3">

                                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-50 text-xs font-bold uppercase text-brand-700"
                                                x-text="resource.type.substring(0, 3)">
                                            </div>

                                            <div>

                                                <h4 class="font-semibold text-slate-900"
                                                    x-text="resource.title">
                                                </h4>

                                                <p class="mt-1 text-xs uppercase tracking-wide text-slate-400"
                                                    x-text="resource.type">
                                                </p>

                                            </div>

                                        </div>


                                        <button type="button"
                                            @click="removeResource(index)"
                                            class="rounded-lg p-2 text-slate-400 hover:bg-red-50 hover:text-red-600">

                                            <svg class="h-5 w-5"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />

                                            </svg>

                                        </button>

                                    </div>


                                    {{-- Hidden Fields --}}
                                    <input type="hidden"
                                        :name="`resources[${index}][title]`"
                                        :value="resource.title">

                                    <input type="hidden"
                                        :name="`resources[${index}][resource_type]`"
                                        :value="resource.type">

                                    <input type="hidden"
                                        :name="`resources[${index}][status]`"
                                        value="1">

                                    <input type="hidden"
                                        :name="`resources[${index}][url]`"
                                        :value="resource.url">

                                    <input type="hidden"
                                        :name="`resources[${index}][description]`"
                                        :value="resource.description">

                                    <input type="hidden"
                                        :name="`resources[${index}][quiz_id]`"
                                        :value="resource.quiz_id">


                                    {{-- File --}}
                                    <template x-if="resource.type === 'file' && resource.file">

                                        <div class="mt-4 rounded-lg border border-slate-200 bg-slate-50 p-3">

                                            <div class="flex items-center gap-3">

                                                <svg class="h-5 w-5 text-brand-600"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 21h10a2 2 0 002-2V9l-6-6H7a2 2 0 00-2 2v14a2 2 0 002 2z" />

                                                </svg>

                                                <span class="text-sm text-slate-600"
                                                    x-text="resource.file.name">
                                                </span>

                                            </div>

                                        </div>

                                    </template>


                                    {{-- File Input --}}
                                    <template x-if="resource.type === 'file' && resource.file">

                                        <input type="file"
                                            :name="`resources[${index}][file]`"
                                            :data-index="index"
                                            class="hidden">

                                    </template>

                                </div>

                            </template>

                        </div>


                        {{-- Footer --}}
                        <div class="flex justify-end gap-3 border-t border-slate-200 p-5">

                            <a href="{{ role_route('role.resources.index', [
                                'course' => $course->id,
                                'module' => $module->id,
                                'lesson' => $lesson->id,
                            ]) }}"
                                class="rounded-lg px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-100">

                                Cancel

                            </a>

                            <button type="submit"
                                :disabled="resources.length === 0"
                                class="rounded-lg bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-700 disabled:cursor-not-allowed disabled:opacity-50">

                                Save All Resources

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>


    <script>
        function lessonResourceForm() {
            return {

                current: {
                    type: '',
                    title: '',
                    url: '',
                    description: '',
                    quiz_id: '',
                    file: null,
                },

                resources: [],

                addResource() {

                    if (!this.current.type) {
                        alert('Please select a resource type.');
                        return;
                    }

                    if (!this.current.title.trim()) {
                        alert('Please enter resource title.');
                        return;
                    }

                    if (this.current.type === 'video' && !this.current.url) {
                        alert('Please enter video URL.');
                        return;
                    }

                    if (this.current.type === 'content' && !this.current.description.trim()) {
                        alert('Please enter content.');
                        return;
                    }

                    if (this.current.type === 'file' && !this.current.file) {
                        alert('Please select a file.');
                        return;
                    }

                    if (this.current.type === 'quiz' && !this.current.quiz_id) {
                        alert('Please select a quiz.');
                        return;
                    }

                    this.resources.push({
                        key: Date.now() + Math.random(),

                        type: this.current.type,
                        title: this.current.title,
                        url: this.current.url,
                        description: this.current.description,
                        quiz_id: this.current.quiz_id,
                        file: this.current.file,
                    });

                    this.resetCurrent();

                },

                removeResource(index) {
                    this.resources.splice(index, 1);
                },

                resetCurrent() {

                    this.current = {
                        type: '',
                        title: '',
                        url: '',
                        description: '',
                        quiz_id: '',
                        file: null,
                    };

                    if (this.$refs.fileInput) {
                        this.$refs.fileInput.value = '';
                    }

                },

            };
        }
    </script>

@endsection
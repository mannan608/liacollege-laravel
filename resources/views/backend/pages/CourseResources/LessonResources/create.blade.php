@extends('backend.layouts.app')

@php
    $isEdit = !is_null($lesson);
    $selectedLessonId = old('lesson_id', $lesson->id ?? request('lesson_id'));

    $state = [
        'videos' => old('videos', $resourceBundle['videos'] ?? []),
        'contents' => old('contents', $resourceBundle['contents'] ?? []),
        'files' => old('files', $resourceBundle['files'] ?? []),
        'quizzes' => old('quizzes', $resourceBundle['quizzes'] ?? []),
    ];
@endphp

@section('content')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div class="mx-auto max-w-7xl p-6" x-data="lessonResourceForm(window.lessonResourceInitialState)">

        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="fixed right-5 top-5 z-50 w-full max-w-sm">
                <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                <p class="font-semibold">Please review the highlighted fields and try again.</p>
                <ul class="mt-2 list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div
            class="mb-6 flex flex-col gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-600">
                    {{ $isEdit ? 'Edit' : 'Create' }}
                </p>
                <h3 class="mt-1 text-2xl font-bold text-slate-900">{{ $pageTitle ?? 'Lesson Resources' }}</h3>
                <p class="mt-1 text-sm text-slate-500">{{ $course->name }}</p>
            </div>

            <a href="{{ role_route('role.resources.index', ['course' => $course->id, 'module' => $module->id, 'lesson' => $lesson->id]) }}"
                class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition-colors hover:bg-slate-50">
                Back to list
            </a>
        </div>

        <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data"
            class="space-y-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            @csrf
            @if ($formMethod !== 'POST')
                @method($formMethod)
            @endif

         <input type="hidden" name="lesson_id" value="{{ $selectedLessonId }}">

            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h4 class="text-base font-semibold text-slate-900">Video Resources</h4>
                        <p class="text-sm text-slate-500">Add one or more video links for the lesson.</p>
                    </div>
                    <button type="button" @click="addVideo()"
                        class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-brand-700">
                        + Add Video
                    </button>
                </div>

                <div class="mt-4 space-y-4">
                    <template x-for="(video, index) in videos" :key="`video-${index}`">
                        <div class="rounded-xl border border-slate-200 bg-white p-4">
                            <div class="mb-4 flex items-center justify-between">
                                <p class="text-sm font-semibold text-slate-700">Video <span x-text="index + 1"></span></p>
                                <button type="button" @click="removeVideo(index)"
                                    class="rounded-lg px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-50">
                                    Remove
                                </button>
                            </div>

                            <div class="grid gap-4 md:grid-cols-2">
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-semibold uppercase tracking-wider text-slate-500">Title</label>
                                    <input type="text" :name="`videos[${index}][title]`" x-model="video.title"
                                        class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500"
                                        placeholder="Introduction">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-xs font-semibold uppercase tracking-wider text-slate-500">URL</label>
                                    <input type="url" :name="`videos[${index}][url]`" x-model="video.url"
                                        class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500"
                                        placeholder="https://youtube.com/...">
                                </div>
                            </div>
                        </div>
                    </template>

                    <div x-show="videos.length === 0" x-cloak
                        class="rounded-xl border border-dashed border-slate-300 bg-white px-4 py-8 text-center text-sm text-slate-500">
                        No videos added yet.
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h4 class="text-base font-semibold text-slate-900">Content Resources</h4>
                        <p class="text-sm text-slate-500">Use these for rich text or HTML lesson notes.</p>
                    </div>
                    <button type="button" @click="addContent()"
                        class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-brand-700">
                        + Add Content
                    </button>
                </div>

                <div class="mt-4 space-y-4">
                    <template x-for="(content, index) in contents" :key="`content-${index}`">
                        <div class="rounded-xl border border-slate-200 bg-white p-4">
                            <div class="mb-4 flex items-center justify-between">
                                <p class="text-sm font-semibold text-slate-700">Content <span x-text="index + 1"></span></p>
                                <button type="button" @click="removeContent(index)"
                                    class="rounded-lg px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-50">
                                    Remove
                                </button>
                            </div>

                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-semibold uppercase tracking-wider text-slate-500">Title</label>
                                    <input type="text" :name="`contents[${index}][title]`" x-model="content.title"
                                        class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500"
                                        placeholder="Laravel Overview">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-semibold uppercase tracking-wider text-slate-500">Content</label>
                                    <textarea :name="`contents[${index}][content]`" x-model="content.content" rows="5"
                                        class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500"
                                        placeholder="<p>Laravel is ...</p>"></textarea>
                                </div>
                            </div>
                        </div>
                    </template>

                    <div x-show="contents.length === 0" x-cloak
                        class="rounded-xl border border-dashed border-slate-300 bg-white px-4 py-8 text-center text-sm text-slate-500">
                        No content blocks added yet.
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h4 class="text-base font-semibold text-slate-900">File Resources</h4>
                        <p class="text-sm text-slate-500">Upload PDFs, docs, or slide decks.</p>
                    </div>
                    <button type="button" @click="addFile()"
                        class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-brand-700">
                        + Add File
                    </button>
                </div>

                <div class="mt-4 space-y-4">
                    <template x-for="(file, index) in files" :key="`file-${index}`">
                        <div class="rounded-xl border border-slate-200 bg-white p-4">
                            <div class="mb-4 flex items-center justify-between">
                                <p class="text-sm font-semibold text-slate-700">File <span x-text="index + 1"></span></p>
                                <button type="button" @click="removeFile(index)"
                                    class="rounded-lg px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-50">
                                    Remove
                                </button>
                            </div>

                            <input type="hidden" :name="`files[${index}][existing_file_path]`"
                                :value="file.existing_file_path ?? ''">

                            <div class="grid gap-4 md:grid-cols-2">
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-semibold uppercase tracking-wider text-slate-500">Title</label>
                                    <input type="text" :name="`files[${index}][title]`" x-model="file.title"
                                        class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500"
                                        placeholder="Cheatsheet">
                                </div>

                                <div class="space-y-2">
                                    <label class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                                        File {{ $isEdit ? '(replace only if needed)' : '' }}
                                    </label>
                                    <input type="file" :name="`files[${index}][file]`"
                                        @change="handleFileSelect($event, index)"
                                        class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none focus:border-brand-500"
                                        accept=".pdf,.doc,.docx,.ppt,.pptx">

                                    <div class="text-xs text-slate-500">
                                        <template x-if="file.file_name">
                                            <span>Selected: <span class="font-semibold text-slate-700"
                                                    x-text="file.file_name"></span></span>
                                        </template>
                                        <template x-if="!file.file_name && file.existing_file_name">
                                            <span>Current: <a :href="file.existing_file_url" target="_blank"
                                                    class="font-semibold text-brand-600 hover:underline"
                                                    x-text="file.existing_file_name"></a></span>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <div x-show="files.length === 0" x-cloak
                        class="rounded-xl border border-dashed border-slate-300 bg-white px-4 py-8 text-center text-sm text-slate-500">
                        No files added yet.
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h4 class="text-base font-semibold text-slate-900">Quiz Resources</h4>
                        <p class="text-sm text-slate-500">Attach an existing quiz by ID.</p>
                    </div>
                    <button type="button" @click="addQuiz()"
                        class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-brand-700">
                        + Add Quiz
                    </button>
                </div>

                <div class="mt-4 space-y-4">
                    <template x-for="(quiz, index) in quizzes" :key="`quiz-${index}`">
                        <div class="rounded-xl border border-slate-200 bg-white p-4">
                            <div class="mb-4 flex items-center justify-between">
                                <p class="text-sm font-semibold text-slate-700">Quiz <span x-text="index + 1"></span></p>
                                <button type="button" @click="removeQuiz(index)"
                                    class="rounded-lg px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-50">
                                    Remove
                                </button>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-semibold uppercase tracking-wider text-slate-500">Quiz
                                    ID</label>
                                <select :name="`quizzes[${index}][quiz_id]`" x-model="quiz.quiz_id"
                                    class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500">
                                    <option value="">Select a quiz</option>

                                    <option value="1">Quiz 1</option>
                                    <option value="2">Quiz 2</option>
                                    <option value="3">Quiz 3</option>
                                </select>
                            </div>
                        </div>
                    </template>

                    <div x-show="quizzes.length === 0" x-cloak
                        class="rounded-xl border border-dashed border-slate-300 bg-white px-4 py-8 text-center text-sm text-slate-500">
                        No quizzes added yet.
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3">
                <a href="{{ role_route('role.resources.index', ['course' => $course->id, 'module' => $module->id, 'lesson' => $lesson->id]) }}"
                    class="rounded-lg px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-100">
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-brand-700">
                    {{ $submitLabel ?? 'Save Resources' }}
                </button>
            </div>
        </form>
    </div>

    <script>
        window.lessonResourceInitialState = @json($state);

        function lessonResourceForm(initialState) {
            return {
                videos: Array.isArray(initialState?.videos) ? initialState.videos : [],
                contents: Array.isArray(initialState?.contents) ? initialState.contents : [],
                files: Array.isArray(initialState?.files) ? initialState.files.map((file) => ({
                    title: file?.title ?? '',
                    existing_file_path: file?.existing_file_path ?? '',
                    existing_file_name: file?.existing_file_name ?? (file?.existing_file_path ? String(file
                        .existing_file_path).split('/').pop() : ''),
                    existing_file_url: file?.existing_file_url ?? (file?.existing_file_path ?
                        `/storage/${String(file.existing_file_path).replace(/^\/+/, '')}` : ''),
                    file_name: '',
                })) : [],
                quizzes: Array.isArray(initialState?.quizzes) ? initialState.quizzes : [],

                addVideo() {
                    this.videos.push({
                        title: '',
                        url: '',
                    });
                },

                removeVideo(index) {
                    this.videos.splice(index, 1);
                },

                addContent() {
                    this.contents.push({
                        title: '',
                        content: '',
                    });
                },

                removeContent(index) {
                    this.contents.splice(index, 1);
                },

                addFile() {
                    this.files.push({
                        title: '',
                        existing_file_path: '',
                        existing_file_name: '',
                        existing_file_url: '',
                        file_name: '',
                    });
                },

                removeFile(index) {
                    this.files.splice(index, 1);
                },

                handleFileSelect(event, index) {
                    const file = event.target.files?.[0];
                    if (!file) {
                        this.files[index].file_name = '';
                        return;
                    }

                    this.files[index].file_name = file.name;
                },

                addQuiz() {
                    this.quizzes.push({
                        quiz_id: '',
                    });
                },

                removeQuiz(index) {
                    this.quizzes.splice(index, 1);
                },
            };
        }
    </script>
@endsection

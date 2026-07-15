@extends('backend.layouts.app')

@section('content')
    @php
        $initialModules = old('modules', $modules ?? []);
    @endphp

    <div class="mx-auto max-w-7xl p-6">
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
            class="mb-6 flex flex-col gap-4 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-600">{{ $isEdit ?? false ? 'Edit' : 'Create' }}</p>
                <h3 class="mt-1 text-2xl font-bold text-gray-900">{{ $pageTitle ?? 'Course Modules' }}</h3>
                <p class="mt-1 text-sm text-gray-500">{{ $course->name }}</p>
            </div>

            <a href="{{ role_route('role.modules.index', ['course' => $course->id]) }}"
                class="inline-flex items-center justify-center rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition-colors hover:bg-gray-50">
                Back to modules
            </a>
        </div>

        <form x-data="moduleLessonBuilder(@js($initialModules))" action="{{ $formAction ?? role_route('role.module.store', ['course' => $course->id]) }}"
            method="POST" class="space-y-6">
            @csrf
            @if (($formMethod ?? 'POST') !== 'POST')
                @method($formMethod)
            @endif

            <input type="hidden" name="course_id" value="{{ $course->id }}">

            <template x-for="(module, moduleIndex) in modules" :key="module.uid">
                <section class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
                    <div
                        class="flex flex-col gap-4 border-b border-gray-100 bg-gray-50/80 px-6 py-4 md:flex-row md:items-center md:justify-between">
                        <div class="flex items-center gap-3">
                            <span
                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700"
                                x-text="moduleIndex + 1"></span>
                            <div>
                                <h4 class="text-base font-semibold text-gray-900">Module</h4>
                                <p class="text-xs text-gray-500">Module #<span x-text="moduleIndex + 1"></span></p>
                            </div>
                        </div>

                        <button type="button" @click="removeModule(module.uid)" x-show="modules.length > 1"
                            class="inline-flex items-center justify-center rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition-colors hover:bg-red-100">
                            Remove module
                        </button>
                    </div>

                    <div class="space-y-6 p-6">
                        <div class="space-y-2">
                            <label class="text-xs font-semibold uppercase tracking-wider text-gray-500">Module title</label>
                            <input type="hidden" :name="`modules[${moduleIndex}][id]`" x-show="module.id" :value="module.id">
                            <input type="text" :name="`modules[${moduleIndex}][title]`" x-model="module.title"
                                placeholder="e.g. Introduction"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-800 placeholder-gray-400 outline-none transition-all focus:border-brand-500 focus:bg-white">
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <label class="text-xs font-semibold uppercase tracking-wider text-gray-500">Lessons</label>
                            </div>

                            <template x-for="(lesson, lessonIndex) in module.lessons" :key="lesson.uid">
                                <div class="rounded-xl border border-gray-200 bg-gray-50/50 p-5">
                                    <div class="mb-4 flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="flex h-6 w-6 items-center justify-center rounded-md bg-gray-200 text-[10px] font-bold text-gray-600"
                                                x-text="lessonIndex + 1"></span>
                                            <span class="text-xs font-medium text-gray-400">Lesson</span>
                                        </div>

                                        <button type="button" @click="removeLesson(module.uid, lesson.uid)"
                                            x-show="module.lessons.length > 1"
                                            class="inline-flex items-center justify-center rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition-colors hover:bg-red-100">
                                            Remove lesson
                                        </button>
                                    </div>

                                    <div class="grid gap-4">
                                        <div class="space-y-2">
                                            <label class="text-sm font-medium text-gray-600">Lesson title</label>
                                            <input type="hidden"
                                                :name="`modules[${moduleIndex}][lessons][${lessonIndex}][id]`"
                                                x-show="lesson.id" :value="lesson.id">
                                            <input type="text"
                                                :name="`modules[${moduleIndex}][lessons][${lessonIndex}][title]`"
                                                x-model="lesson.title" placeholder="Enter lesson title"
                                                class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none transition-all focus:border-brand-500">
                                        </div>

                                        <div class="space-y-2">
                                            <label class="text-sm font-medium text-gray-600">Lesson content</label>
                                            <textarea :name="`modules[${moduleIndex}][lessons][${lessonIndex}][content]`" x-model="lesson.content"
                                                rows="3" placeholder="Enter lesson content"
                                                class="w-full resize-y rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none transition-all focus:border-brand-500"></textarea>
                                        </div>

                                        <div class="space-y-2">
                                            <label class="text-sm font-medium text-gray-600">Duration in minutes</label>
                                            <input type="number" min="0" step="1"
                                                :name="`modules[${moduleIndex}][lessons][${lessonIndex}][duration]`"
                                                x-model="lesson.duration" placeholder="0"
                                                class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none transition-all focus:border-brand-500">
                                        </div>

                                        <div class="space-y-3">
                                            <label class="text-sm font-medium text-gray-600">Lesson types</label>
                                            <div class="flex flex-wrap gap-2">
                                                <template x-for="type in lessonTypeOptions" :key="type.value">
                                                    <label class="cursor-pointer">
                                                        <input type="checkbox" :value="type.value"
                                                            :name="`modules[${moduleIndex}][lessons][${lessonIndex}][lesson_types][]`"
                                                            x-model="lesson.lesson_types" class="checkbox-custom peer hidden">
                                                        <div
                                                            class="field-chip flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-600 hover:border-gray-300 peer-checked:border-brand-500 peer-checked:bg-brand-50 peer-checked:text-brand-600">
                                                            <span x-text="type.label"></span>
                                                        </div>
                                                    </label>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>

                            <button type="button" @click="addLesson(module.uid)"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-dashed border-brand-200 bg-brand-50/50 py-3 text-sm font-semibold text-brand-600 transition-all hover:border-brand-400 hover:bg-brand-100">
                                Add lesson
                            </button>
                        </div>
                    </div>
                </section>
            </template>

            <div class="flex flex-col gap-4 md:flex-row">
                <button type="button" @click="addModule()"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-brand-600 bg-brand-50 px-5 py-3.5 text-sm font-semibold text-brand-600 transition-all hover:bg-brand-100 md:w-1/2">
                    Add new module
                </button>

                <button type="submit"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-600 px-6 py-4 text-sm font-bold text-white shadow-lg shadow-brand-500/25 transition-all hover:bg-brand-700 md:w-1/2">
                    {{ $submitLabel ?? 'Save Modules' }}
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function moduleLessonBuilder(initialModules = []) {
            let nextUid = 1;

            const makeUid = (prefix) => `${prefix}-${Date.now()}-${nextUid++}`;

            const normalizeLesson = (lesson = {}) => ({
                uid: lesson.id ? `lesson-${lesson.id}` : makeUid('lesson'),
                id: lesson.id ?? null,
                title: lesson.title ?? '',
                content: lesson.content ?? '',
                duration: lesson.duration ?? 0,
                lesson_types: Array.isArray(lesson.lesson_types) && lesson.lesson_types.length ? lesson.lesson_types : ['text'],
                status: lesson.status ?? true,
            });

            const normalizeModule = (module = {}) => ({
                uid: module.id ? `module-${module.id}` : makeUid('module'),
                id: module.id ?? null,
                title: module.title ?? '',
                lessons: Array.isArray(module.lessons) && module.lessons.length
                    ? module.lessons.map((lesson) => normalizeLesson(lesson))
                    : [normalizeLesson()],
            });

            const preparedModules = Array.isArray(initialModules) && initialModules.length
                ? initialModules.map((module) => normalizeModule(module))
                : [normalizeModule()];

            return {
                lessonTypeOptions: [
                    { value: 'video', label: 'Video' },
                    { value: 'pdf', label: 'PDF' },
                    { value: 'text', label: 'Text' },
                    { value: 'mixed', label: 'Mixed' },
                    { value: 'quiz', label: 'Quiz' },
                    { value: 'assignment', label: 'Assignment' },
                    { value: 'link', label: 'Link' },
                ],
                modules: preparedModules,

                addModule() {
                    this.modules.push(normalizeModule());
                },

                removeModule(moduleUid) {
                    if (this.modules.length > 1) {
                        this.modules = this.modules.filter((module) => module.uid !== moduleUid);
                    }
                },

                addLesson(moduleUid) {
                    const module = this.modules.find((item) => item.uid === moduleUid);

                    if (!module) {
                        return;
                    }

                    module.lessons.push(normalizeLesson());
                },

                removeLesson(moduleUid, lessonUid) {
                    const module = this.modules.find((item) => item.uid === moduleUid);

                    if (!module || module.lessons.length <= 1) {
                        return;
                    }

                    module.lessons = module.lessons.filter((lesson) => lesson.uid !== lessonUid);
                },
            };
        }
    </script>
@endpush

@push('styles')
    <style>
        [x-cloak] {
            display: none !important;
        }

        .field-chip {
            transition: all 0.2s ease;
        }

        .field-chip:hover {
            transform: translateY(-1px);
        }

        .checkbox-custom:checked + div {
            background-color: var(--color-brand-50);
            border-color: var(--color-brand-500);
            color: var(--color-brand-600);
        }
    </style>
@endpush

@extends('backend.layouts.app')

@section('content')
    @php
        $editMode = $editMode ?? false;
        $initialModules = [];

        if ($editMode && isset($module) && $module && $module->exists) {
            $initialModules = [
                [
                    'id' => $module->id,
                    'title' => $module->title,
                    'lessons' => $module->lessons->map(function ($lesson) {
                        return [
                            'id' => $lesson->id,
                            'title' => $lesson->title,
                            'content' => $lesson->content,
                            'duration' => $lesson->duration,
                            'lesson_types' => $lesson->lesson_types ?? [],
                        ];
                    })->values(),
                ],
            ];
        }
    @endphp

    <form x-data="moduleLessonBuilder({{ \Illuminate\Support\Js::from($initialModules) }}, {{ \Illuminate\Support\Js::from($editMode) }})"
        @submit.prevent="submitForm($event)"
        action="{{ $formAction ?? role_route($editMode ? 'role.module.update' : 'role.module.store', $editMode ? ['course' => $course->id, 'module' => $module->id] : ['course' => $course->id]) }}"
        method="POST" enctype="multipart/form-data">

        @csrf
        @if(($formMethod ?? 'POST') !== 'POST')
            @method($formMethod)
        @endif

        <input type="hidden" name="course_id" value="{{ $course->id }}">

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

            <div class="lg:col-span-8 space-y-6">

                {{-- Course Information --}}
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">

                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Course Modules: {{ $course->name }}
                        </h2>

                    </div>

                    <div class="p-5 space-y-5">

                        <!-- Empty State -->
                        <template x-if="modules.length === 0">
                            <div class="animate-in rounded-3xl border-2 border-dashed border-gray-200 bg-gray-50/60 p-16 text-center">
                                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-700">No modules yet</h3>
                                <p class="mt-1 text-sm text-gray-400">Get started by adding your first module below</p>
                                <button type="button" @click="addModule()"
                                    class="btn-primary mt-6 inline-flex items-center gap-2 rounded-xl bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-brand-500/25">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add First Module
                                </button>
                            </div>
                        </template>

                        <!-- ALL MODULES -->
                        <template x-for="(module, moduleIndex) in modules" :key="module.uid">

                            <div class="section-card animate-in mb-6 overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                                <!-- Module Header -->
                                <div class="flex items-center justify-between border-b border-gray-100 bg-gradient-to-r from-gray-50/80 to-white px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700"
                                            x-text="moduleIndex + 1"></div>
                                        <div>
                                            <h3 class="text-base font-bold text-gray-800">Module</h3>
                                            <p class="text-xs text-gray-400">Module #<span x-text="moduleIndex + 1"></span></p>
                                        </div>
                                    </div>
                                    <button type="button" @click="removeModule(module.uid)" x-show="modules.length > 1"
                                        class="btn-danger inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Remove
                                    </button>
                                </div>

                                <div class="space-y-6 p-6">

                                    <!-- MODULE TITLE -->
                                    <div class="space-y-2">
                                        <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Module Title
                                        </label>
                                        <template x-if="module.id">
                                            <input type="hidden" :name="`modules[${moduleIndex}][id]`" :value="module.id">
                                        </template>
                                        <input type="text" :name="`modules[${moduleIndex}][title]`" x-model="module.title"
                                            placeholder="e.g. Introduction"
                                            class="input-field w-full rounded-xl border border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 focus:bg-white">
                                        <div x-show="errors[`modules.${moduleIndex}.title`]" x-transition
                                            class="flex items-center gap-1.5 text-xs font-medium text-red-500"
                                            x-text="errors[`modules.${moduleIndex}.title`]">
                                        </div>
                                    </div>

                                    <!-- LESSONS -->
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between">
                                            <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                                </svg>
                                                Lessons (<span x-text="module.lessons.length"></span>)
                                            </label>
                                        </div>

                                        <template x-for="(lesson, lessonIndex) in module.lessons" :key="lesson.uid">

                                            <div class="row-card animate-in rounded-xl border border-gray-200 bg-gray-50/50 p-5">

                                                <!-- Lesson Header with number and remove -->
                                                <div class="mb-4 flex items-center justify-between">
                                                    <div class="flex items-center gap-2">
                                                        <span class="flex h-6 w-6 items-center justify-center rounded-md bg-gray-200 text-[10px] font-bold text-gray-600"
                                                            x-text="lessonIndex + 1"></span>
                                                        <span class="text-xs font-medium text-gray-400">Lesson</span>
                                                    </div>

                                                    <button type="button" @click="removeLesson(module.uid, lesson.uid)"
                                                        x-show="module.lessons.length > 1"
                                                        class="btn-danger inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-100">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </div>

                                                <div class="grid gap-4">

                                                    <!-- LESSON TITLE -->
                                                    <div class="space-y-2">
                                                        <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                            </svg>
                                                            Lesson Title
                                                        </label>
                                                        <template x-if="lesson.id">
                                                            <input type="hidden"
                                                                :name="`modules[${moduleIndex}][lessons][${lessonIndex}][id]`"
                                                                :value="lesson.id">
                                                        </template>
                                                        <input type="text"
                                                            :name="`modules[${moduleIndex}][lessons][${lessonIndex}][title]`"
                                                            x-model="lesson.title" placeholder="Enter lesson title"
                                                            class="input-field w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500">
                                                        <div x-show="errors[`modules.${moduleIndex}.lessons.${lessonIndex}.title`]" x-transition
                                                            class="flex items-center gap-1.5 text-xs font-medium text-red-500"
                                                            x-text="errors[`modules.${moduleIndex}.lessons.${lessonIndex}.title`]">
                                                        </div>
                                                    </div>

                                                    <!-- LESSON CONTENT -->
                                                    <div class="space-y-2">
                                                        <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M4 6h16M4 12h16M4 18h7" />
                                                            </svg>
                                                            Lesson Content
                                                        </label>
                                                        <textarea :name="`modules[${moduleIndex}][lessons][${lessonIndex}][content]`" x-model="lesson.content" rows="3"
                                                            placeholder="Enter lesson content"
                                                            class="input-field w-full resize-y rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500"></textarea>
                                                        <div x-show="errors[`modules.${moduleIndex}.lessons.${lessonIndex}.content`]" x-transition
                                                            class="flex items-center gap-1.5 text-xs font-medium text-red-500"
                                                            x-text="errors[`modules.${moduleIndex}.lessons.${lessonIndex}.content`]">
                                                        </div>
                                                    </div>

                                                    <!-- DURATION -->
                                                    <div class="space-y-2">
                                                        <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            Duration (minutes)
                                                        </label>
                                                        <input type="number" min="0" step="1"
                                                            :name="`modules[${moduleIndex}][lessons][${lessonIndex}][duration]`"
                                                            x-model="lesson.duration" placeholder="0"
                                                            class="input-field w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500">
                                                        <div x-show="errors[`modules.${moduleIndex}.lessons.${lessonIndex}.duration`]" x-transition
                                                            class="flex items-center gap-1.5 text-xs font-medium text-red-500"
                                                            x-text="errors[`modules.${moduleIndex}.lessons.${lessonIndex}.duration`]">
                                                        </div>
                                                    </div>

                                                    <!-- LESSON TYPES -->
                                                    <div class="space-y-3">
                                                        <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            Lesson Types
                                                        </label>
                                                        <div class="flex flex-wrap gap-2">
                                                            <template x-for="type in lessonTypeOptions" :key="type.value">
                                                                <label class="cursor-pointer">
                                                                    <input type="checkbox" :value="type.value"
                                                                        :name="`modules[${moduleIndex}][lessons][${lessonIndex}][lesson_types][]`"
                                                                        x-model="lesson.lesson_types"
                                                                        class="checkbox-custom peer hidden">
                                                                    <div
                                                                        class="field-chip flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-600 hover:border-gray-300">
                                                                        <span x-text="type.label"></span>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="check-icon h-4 w-4 text-brand-600 opacity-0 transition-all duration-200"
                                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                                        </svg>
                                                                    </div>
                                                                </label>
                                                            </template>
                                                        </div>
                                                        <div x-show="errors[`modules.${moduleIndex}.lessons.${lessonIndex}.lesson_types`]" x-transition
                                                            class="flex items-center gap-1.5 text-xs font-medium text-red-500"
                                                            x-text="errors[`modules.${moduleIndex}.lessons.${lessonIndex}.lesson_types`]">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </template>

                                        <!-- ADD LESSON -->
                                        <button type="button" @click="addLesson(module.uid)"
                                            class="btn-primary inline-flex w-full items-center justify-center gap-2 rounded-xl border border-dashed border-brand-200 bg-brand-50/50 py-3 text-sm font-semibold text-brand-600 transition-all hover:border-brand-400 hover:bg-brand-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                            </svg>
                                            Add Lesson
                                        </button>

                                    </div>

                                </div>
                            </div>

                        </template>

                        <!-- ADD MODULE & SAVE -->
                        <div class="flex justify-between flex-col md:flex-row md:gap-10">

                            <div x-show="!editMode && modules.length > 0" class="mt-6 w-full md:w-1/2">
                                <button type="button" @click="addModule()"
                                    class="btn-primary inline-flex w-full items-center justify-center gap-2 border border-brand-600 rounded-xl bg-brand-50 px-5 py-3.5 text-sm font-semibold text-brand-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Add New Module
                                </button>
                            </div>

                            <button type="submit" x-show="modules.length > 0"
                                class="btn-primary mt-6 inline-flex w-full md:w-1/2 items-center justify-center gap-2 rounded-xl bg-brand-600 px-6 py-4 text-sm font-bold text-white shadow-lg shadow-brand-500/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ $submitLabel ?? 'Save Modules' }}
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="lg:col-span-4">
            </div>

        </div>
    </form>

    @if ($errors->any())
        <div class="bg-red-100 p-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
       function moduleLessonBuilder(initialModules = [], editMode = false) {
    const normalizedModules = initialModules.map(module => ({
        ...module,
        uid: module.id || crypto.randomUUID(),
        lessons: (module.lessons || []).map(lesson => ({
            ...lesson,
            uid: lesson.id || crypto.randomUUID(),
            lesson_types: lesson.lesson_types || [],
        })),
    }));

    const hasInitialModules = normalizedModules.length > 0;

    return {
        errors: {},
        editMode,

     
        modules: hasInitialModules ? normalizedModules : [{
            uid: crypto.randomUUID(),
            id: null,
            title: '',
            lessons: [{
                uid: crypto.randomUUID(),
                id: null,
                title: '',
                content: '',
                duration: 0,
                lesson_types: [],
            }]
        }],

        lessonTypeOptions: [
            { value: 'video', label: 'Video' },
            { value: 'text', label: 'Text' },
            { value: 'quiz', label: 'Quiz' },
            { value: 'assignment', label: 'Assignment' },
            { value: 'live_session', label: 'Live Session' },
        ],

        async submitForm(event) {
            this.errors = {};
            const form = event.target;
            const formData = new FormData(form);

         

            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            if (response.status === 422) {
                this.errors = data.errors || {};
                return;
            }

            if (response.ok && data.success) {
                window.location.href = data.redirect;
            } else {
                alert(data.message || 'Something went wrong');
            }
        },

        addModule() {
            if (this.editMode) return;
            this.modules.push({
                uid: crypto.randomUUID(),
                id: null,        
                title: '',
                lessons: [{
                    uid: crypto.randomUUID(),
                    id: null,    
                    title: '',
                    content: '',
                    duration: 0,
                    lesson_types: [],
                }]
            });
        },

        removeModule(moduleUid) {
            if (this.editMode) return;
            if (this.modules.length <= 1) {
                // Optional: Prevent deleting last module
                // return;
            }
            this.modules = this.modules.filter(module => module.uid !== moduleUid);
        },

        addLesson(moduleUid) {
            const module = this.modules.find(m => m.uid === moduleUid);
            if (!module) return;

            module.lessons.push({
                uid: crypto.randomUUID(),
                id: null,        
                title: '',
                content: '',
                duration: 0,
                lesson_types: [],
            });
        },

        removeLesson(moduleUid, lessonUid) {
            const module = this.modules.find(m => m.uid === moduleUid);
            if (!module) return;

            if (module.lessons.length <= 1) {
                // Optional: Prevent deleting last lesson
                // return;
            }
            module.lessons = module.lessons.filter(lesson => lesson.uid !== lessonUid);
        }
    };
}
    </script>

@endsection

<style>
    [x-cloak] {
        display: none !important;
    }

    .field-chip {
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .field-chip:active {
        transform: scale(0.96);
    }

    .section-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .section-card:hover {
        transform: translateY(-2px);
    }

    .row-card {
        transition: all 0.2s ease;
    }

    .row-card:hover {
        border-color: #c7d2fe;
    }

    .btn-danger {
        transition: all 0.2s ease;
    }

    .btn-danger:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px -2px rgba(239, 68, 68, 0.2);
    }

    .input-field {
        transition: all 0.2s ease;
    }

    .input-field:focus {
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(8px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-in {
        animation: slideIn 0.3s ease forwards;
    }

    .checkbox-custom:checked + div {
        background-color: var(--color-brand-50);
        border-color: var(--color-brand-500);
        color: var(--color-brand-500);
    }

    .checkbox-custom:checked + div .check-icon {
        opacity: 1;
        transform: scale(1);
    }
</style>

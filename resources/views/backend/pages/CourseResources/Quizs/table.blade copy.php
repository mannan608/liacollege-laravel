<div x-data="courseManager()" x-init="init()" >

    <!-- Empty State -->
    <div x-show="modules.length === 0" x-cloak class="rounded-2xl border border-dashed border-gray-300 bg-white py-20 text-center">
        <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0111.25 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H7.5M12 9.75l-3 3m0 0l3 3m-3-3h7.5" />
        </svg>
        <h3 class="mt-4 text-sm font-semibold text-gray-900">No modules yet</h3>
        <p class="mt-1 text-sm text-gray-500">Get started by creating your first module.</p>
        <button class="mt-4 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">Add Module</button>
    </div>

    <!-- Modules List -->
    <div class="space-y-4">

        <template x-for="module in modules" :key="module.id">
            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition-shadow duration-200 hover:shadow-md">

                <!-- Module Header -->
                <div @click="toggleModule(module.id)" class="flex cursor-pointer select-none items-center justify-between px-5 py-4 transition-colors hover:bg-gray-50">
                    <div class="flex min-w-0 flex-1 items-center gap-4">

                        <!-- Chevron -->
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-indigo-50">
                            <svg :class="activeModule === module.id ? 'rotate-90' : ''" class="h-4 w-4 text-indigo-600 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>

                        <!-- Module Info -->
                        <div class="flex min-w-0 flex-col">
                            <span x-text="module.title" class="truncate text-base font-semibold text-gray-900"></span>
                            <span class="text-xs text-gray-400" x-text="module.lessons.length + ' lesson' + (module.lessons.length !== 1 ? 's' : '')"></span>
                        </div>

                        <!-- Status Badge -->
                        <span class="ml-2 rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>
                    </div>

                    <!-- Module Actions -->
                    <div class="flex items-center gap-2" @click.stop>

                        <a :href="moduleLessonCreateUrl(module.id)" class="inline-flex items-center gap-1.5 rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-xs font-medium text-gray-600 shadow-sm transition-all hover:border-indigo-300 hover:text-indigo-600 hover:shadow">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add lesson
                        </a>

                        <a :href="moduleEditUrl(module.id)" class="inline-flex items-center gap-1.5 rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-xs font-medium text-gray-600 shadow-sm transition-all hover:border-indigo-300 hover:text-indigo-600 hover:shadow">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            Edit
                        </a>

                        <button class="rounded-lg p-1.5 text-gray-400 transition hover:bg-gray-100 hover:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Lessons Panel -->
                <div x-show="activeModule === module.id" x-cloak
                    x-transition:enter="transition-all ease-out duration-300"
                    x-transition:enter-start="max-h-0 opacity-0" x-transition:enter-end="max-h-[2000px] opacity-100"
                    x-transition:leave="transition-all ease-in duration-200"
                    x-transition:leave-start="max-h-[2000px] opacity-100" x-transition:leave-end="max-h-0 opacity-0"
                    class="overflow-hidden border-t border-gray-100">

                    <div class="px-5 pb-5 pt-2">

                        <!-- No Lessons -->
                        <div x-show="module.lessons.length === 0" class="flex flex-col items-center py-8 text-center">
                            <svg class="h-8 w-8 text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0111.25 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H7.5" />
                            </svg>
                            <p class="mt-2 text-sm text-gray-400">No lessons yet. Add your first lesson.</p>
                        </div>

                        <!-- Lessons List -->
                        <template x-for="lesson in module.lessons" :key="lesson.id">
                            <div class="mb-3 rounded-lg border border-gray-100 bg-gray-50/50 last:mb-0">

                                <!-- Lesson Row -->
                                <div class="flex items-center justify-between px-4 py-3">

                                    <div class="flex min-w-0 flex-1 items-center gap-3">
                                        <!-- Lesson Icon -->
                                        <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-white shadow-sm">
                                            <svg class="h-4 w-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                            </svg>
                                        </div>

                                        <div class="flex min-w-0 flex-col">
                                            <span x-text="lesson.title" class="truncate text-sm font-medium text-gray-800"></span>
                                            <div class="mt-0.5 flex items-center gap-2">
                                                <span class="inline-flex items-center rounded-full bg-indigo-50 px-2 py-0.5 text-[10px] font-semibold text-indigo-700 ring-1 ring-inset ring-indigo-700/10" x-text="(lesson.lesson_types ?? ['text']).join(', ')"></span>
                                                <span class="text-xs text-gray-400" x-text="`Duration: ${lesson.duration ?? 0} min`"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Lesson Actions -->
                                    <div class="flex items-center gap-2">

                                        <a :href="resourceCreateUrl(lesson.id)" class="inline-flex items-center gap-1 rounded-md border border-gray-200 bg-white px-2.5 py-1 text-xs font-medium text-gray-500 shadow-sm transition-all hover:border-indigo-300 hover:text-indigo-600">
                                            <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                            Add resource
                                        </a>

                                        <a :href="moduleEditUrl(lesson.module_id)" class="inline-flex items-center gap-1 rounded-md border border-gray-200 bg-white px-2.5 py-1 text-xs font-medium text-gray-500 shadow-sm transition-all hover:border-indigo-300 hover:text-indigo-600">
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                            Edit
                                        </a>

                                        <button class="rounded p-1 text-gray-300 transition hover:bg-white hover:text-gray-500 hover:shadow-sm">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Resources -->
                                <div x-show="lesson.resources && lesson.resources.length > 0" class="mx-4 mb-3 space-y-1.5 rounded-lg border border-gray-100 bg-white p-3">
                                    <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400">Resources</p>
                                    <template x-for="resource in lesson.resources" :key="resource.id">
                                        <div class="flex items-center gap-3 rounded-md px-2 py-1.5 transition-colors hover:bg-gray-50">
                                            <div class="h-2 w-2 flex-shrink-0 rounded-full bg-indigo-400"></div>
                                            <svg class="h-4 w-4 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0111.25 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H7.5M12 9.75l-3 3m0 0l3 3m-3-3h7.5" />
                                            </svg>
                                            <span x-text="resource.name" class="text-xs text-gray-600"></span>
                                        </div>
                                    </template>
                                </div>

                            </div>
                        </template>

                    </div>
                </div>

            </div>
        </template>

    </div>

</div>

<script>
    function courseManager() {
        return {
         modules: @json($items),
            editUrlTemplate: '/admin/courses/1/modules/MODULE_ID/edit',
            resourceCreateUrlTemplate: '/admin/courses/1/lessons/LESSON_ID/resources/create',
            activeModule: null,

            init() {
                if (this.modules.length > 0) {
                    this.activeModule = this.modules[0].id;
                }
            },

            toggleModule(id) {
                this.activeModule = this.activeModule === id ? null : id;
            },

            moduleEditUrl(moduleId) {
                return this.editUrlTemplate.replace('MODULE_ID', moduleId);
            },

            resourceCreateUrl(lessonId) {
                return this.resourceCreateUrlTemplate.replace('LESSON_ID', lessonId);
            },
        }
    }
</script>

<style>
    [x-cloak] { display: none !important; }
</style>
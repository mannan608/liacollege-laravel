<div x-data="courseManager(@js($items), @js($editUrl ?? ''))" x-init="init()">

    <!-- Empty State -->
    <div x-show="modules.length === 0" x-cloak class="py-16 text-center">
        <p class="text-sm text-gray-400">
            No modules yet. Click "Add module" to get started.
        </p>
    </div>

    <!-- Modules List -->
    <div class="space-y-3">

        <template x-for="module in modules" :key="module.id">
            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white transition-shadow hover:shadow-sm">

                <!-- Module Header -->
                <div @click="toggleModule(module.id)"
                    class="flex cursor-pointer select-none items-center justify-between px-4 py-3.5 transition-colors bg-gray-50">

                    <div class="flex min-w-0 flex-1 items-center gap-3">

                        <!-- Chevron -->
                        <svg :class="activeModule === module.id ? 'rotate-90' : ''"
                            class="h-5 w-5 flex-shrink-0 text-gray-400 transition-transform duration-200" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 18l6-6-6-6" />
                        </svg>

                        <!-- Module Title -->
                        <span x-text="module.title" class="truncate text-base font-medium text-gray-900"></span>

                        <!-- Lesson Count -->
                        <span class="flex-shrink-0 rounded-md bg-gray-100 px-2 py-0.5 text-xs text-gray-400"
                            x-text="module.lessons.length + ' lesson' + (module.lessons.length !== 1 ? 's' : '')"></span>

                    </div>

                    <!-- Module Actions -->
                    <div class="flex items-center gap-2" @click.stop>

                        <a :href="moduleLessonCreateUrl(module.id)"
                            class="inline-flex items-center gap-1.5 rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-xs font-medium text-gray-600 transition-colors hover:bg-gray-50 hover:text-gray-900">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M12 5v14M5 12h14" />
                            </svg>

                            Add lesson
                        </a>

                        <a :href="moduleEditUrl()"
                            class="inline-flex items-center gap-1.5 rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-xs font-medium text-gray-600 transition-colors hover:bg-gray-50 hover:text-gray-900">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>

                            Edit
                        </a>

                    </div>

                </div>

                <!-- Lessons -->
                <div x-show="activeModule === module.id" x-cloak
                    x-transition:enter="transition-all ease-out duration-300"
                    x-transition:enter-start="max-h-0 opacity-0" x-transition:enter-end="max-h-[2000px] opacity-100"
                    x-transition:leave="transition-all ease-in duration-200"
                    x-transition:leave-start="max-h-[2000px] opacity-100" x-transition:leave-end="max-h-0 opacity-0"
                    class="overflow-hidden">

                    <div class="pb-4 pl-12 pr-4">

                        <!-- No Lessons -->
                        <div x-show="module.lessons.length === 0" class="py-3 text-sm text-gray-400">
                            No lessons yet.
                        </div>

                        <!-- Lessons List -->
                        <template x-for="lesson in module.lessons" :key="lesson.id">

                            <div class="mb-2 border-b border-gray-200 last:mb-0 last:border-0">

                                <!-- Lesson Row -->
                                <div
                                    class="flex items-center justify-between rounded-lg px-3 py-2.5 transition-colors hover:bg-gray-50">

                                    <div class="flex min-w-0 flex-1 items-center gap-3">
                                        <span x-text="lesson.title" class="truncate text-sm text-gray-600"></span>
                                        <span x-text="(lesson.lesson_types ?? ['text']).join(', ')"
                                            class="rounded-full bg-brand-50 px-3 py-1 text-xs font-medium text-brand-700"></span>
                                        <span x-text="`Duration: ${lesson.duration ?? 0} minutes`"
                                            class="truncate text-sm text-gray-600"></span>
                                    </div>

                                    <!-- Lesson Actions -->
                                    <div class="flex items-center gap-2">

                                        <a :href="lessonResourceCreateUrl(lesson.id)"
                                            class="inline-flex items-center gap-1.5 rounded-md border border-gray-200 bg-white px-2.5 py-1 text-xs font-medium text-gray-500 transition-colors hover:bg-gray-50 hover:text-gray-700">
                                            <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2"
                                                viewBox="0 0 24 24">
                                                <path d="M12 5v14M5 12h14" />
                                            </svg>

                                            Add resource
                                        </a>

                                        <a :href="lessonEditUrl(lesson.id)"
                                            class="inline-flex items-center gap-1.5 rounded-md border border-gray-200 bg-white px-2.5 py-1 text-xs font-medium text-gray-500 transition-colors hover:bg-gray-50 hover:text-gray-700">
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24">
                                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                            </svg>

                                            Edit
                                        </a>

                                    </div>

                                </div>

                                <!-- Resources -->
                                <div x-show="lesson.resources && lesson.resources.length > 0"
                                    class="ml-5 mt-1 space-y-1">

                                    <template x-for="resource in lesson.resources" :key="resource.id">

                                        <div
                                            class="flex items-center gap-2 rounded-md px-2 py-1 transition-colors hover:bg-gray-50">

                                            <div class="h-1.5 w-1.5 flex-shrink-0 rounded-full bg-gray-300"></div>

                                            <span x-text="resource.name" class="text-xs text-gray-400"></span>

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
    function courseManager(modules = [], editUrl = '') {
        return {
            modules: modules,
            editUrl: editUrl,
            activeModule: null,

            init() {
                if (this.modules.length > 0) {
                    this.activeModule = this.modules[0].id;
                }
            },

            toggleModule(id) {
                this.activeModule =
                    this.activeModule === id ? null : id;
            },

            moduleEditUrl() {
                return this.editUrl || '/modules';
            },
        }
    }
</script>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

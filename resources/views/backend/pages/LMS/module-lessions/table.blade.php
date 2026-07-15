<div x-data="courseManager()" x-init="init()">



    <!-- Empty State -->
    <div x-show="modules.length === 0" x-cloak class="text-center py-16">
        <p class="text-gray-400 text-sm">No modules yet. Click "Add module" to get started.</p>
    </div>

    <!-- Modules List -->
    <div class="space-y-3">
        <template x-for="module in modules" :key="module.id">
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden transition-shadow hover:shadow-sm">
                
                <!-- Module Header -->
                <div @click="toggleModule(module.id)" 
                     class="flex items-center justify-between px-4 py-3.5 cursor-pointer hover:bg-gray-50 transition-colors select-none">
                    <div class="flex items-center gap-3 flex-1 min-w-0">
                        <!-- Chevron -->
                        <svg :class="activeModule === module.id ? 'rotate-90' : ''"
                             class="w-5 h-5 text-gray-400 flex-shrink-0 transition-transform duration-200" 
                             fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 18l6-6-6-6"/>
                        </svg>
                        
                        <!-- Module Name -->
                        <span x-text="module.name" class="text-base font-medium text-gray-900 truncate"></span>
                        
                        <!-- Lesson Count Badge -->
                        <span class="text-xs text-gray-400 bg-gray-100 px-2 py-0.5 rounded-md flex-shrink-0"
                              x-text="module.lessons.length + ' lesson' + (module.lessons.length !== 1 ? 's' : '')">
                        </span>
                    </div>

                    <!-- Module Actions (ALWAYS VISIBLE) -->
                    <div class="flex items-center gap-2" @click.stop>
                        <a :href="`/modules/${module.id}/lessons/create`" 
                           class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 5v14M5 12h14"/>
                            </svg>
                            Add lesson
                        </a>
                        <a :href="`/modules/${module.id}/edit`" 
                           class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                            </svg>
                            Edit
                        </a>
                    </div>
                </div>

                <!-- Lessons Container (Accordion) -->
                <div x-show="activeModule === module.id" 
                     x-transition:enter="transition-all ease-out duration-300"
                     x-transition:enter-start="max-h-0 opacity-0"
                     x-transition:enter-end="max-h-[2000px] opacity-100"
                     x-transition:leave="transition-all ease-in duration-200"
                     x-transition:leave-start="max-h-[2000px] opacity-100"
                     x-transition:leave-end="max-h-0 opacity-0"
                     class="overflow-hidden">
                    <div class="px-4 pb-4 pl-12">
                        
                        <!-- No Lessons -->
                        <div x-show="module.lessons.length === 0" class="py-3 text-sm text-gray-400">
                            No lessons yet.
                        </div>

                        <!-- Lessons List -->
                        <template x-for="lesson in module.lessons" :key="lesson.id">
                            <div class="mb-2">
                                <!-- Lesson Row -->
                                <div class="flex items-center justify-between py-2.5 px-3 rounded-lg hover:bg-gray-50 transition-colors">
                                    <span x-text="lesson.name" class="text-sm text-gray-600 truncate flex-1"></span>
                                    
                                    <!-- Lesson Actions (ALWAYS VISIBLE) -->
                                    <div class="flex items-center gap-2">
                                        <a :href="`/lessons/${lesson.id}/resources/create`" 
                                           class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium text-gray-500 bg-white border border-gray-200 rounded-md hover:bg-gray-50 hover:text-gray-700 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path d="M12 5v14M5 12h14"/>
                                            </svg>
                                            Add resource
                                        </a>
                                        <a :href="`/lessons/${lesson.id}/edit`" 
                                           class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium text-gray-500 bg-white border border-gray-200 rounded-md hover:bg-gray-50 hover:text-gray-700 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                            </svg>
                                            Edit
                                        </a>
                                    </div>
                                </div>

                                <!-- Resources -->
                                <div x-show="lesson.resources.length > 0" class="ml-5 mt-1 space-y-1">
                                    <template x-for="resource in lesson.resources" :key="resource.id">
                                        <div class="flex items-center gap-2 py-1 px-2 rounded-md hover:bg-gray-50 transition-colors">
                                            <div class="w-1.5 h-1.5 rounded-full bg-gray-300 flex-shrink-0"></div>
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
function courseManager() {
    return {
        modules: [],
        activeModule: null, // Only one module can be expanded at a time

        init() {
           
            this.modules = [
                {
                    id: 1,
                    name: 'Introduction to JavaScript',
                    lessons: [
                        { id: 101, name: 'Variables & Data Types', resources: [{id: 1001, name: 'Slides.pdf'}, {id: 1002, name: 'Code.zip'}] },
                        { id: 102, name: 'Functions & Scope', resources: [{id: 1003, name: 'Notes.md'}] }
                    ]
                },
                {
                    id: 2,
                    name: 'DOM Manipulation',
                    lessons: [
                        { id: 201, name: 'Selecting Elements', resources: [] },
                        { id: 202, name: 'Event Listeners', resources: [{id: 2001, name: 'Demo.html'}] }
                    ]
                },
                {
                    id: 3,
                    name: 'Async Programming',
                    lessons: [
                        { id: 301, name: 'Callbacks & Promises', resources: [] },
                        { id: 302, name: 'Async/Await Patterns', resources: [{id: 3001, name: 'Exercise.js'}] }
                    ]
                }
            ];
            
            // Auto-expand first module on load
            if (this.modules.length > 0) {
                this.activeModule = this.modules[0].id;
            }
        },

        toggleModule(id) {
            // Accordion: if clicking already active, collapse it. Otherwise switch to new one.
            this.activeModule = (this.activeModule === id) ? null : id;
        }
    }
}
</script>

   <style>
        [x-cloak] { display: none !important; }
    </style>
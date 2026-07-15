@extends('backend.layouts.app')

@section('content')
    <div x-data="courseBuilder()" class="p-6 max-w-4xl mx-auto">

        <!-- Header -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Course Module</h1>
                <p class="text-sm text-gray-500 mt-1">Create and organize your course modules</p>
            </div>
        </div>
        <div class="space-y-6">

            <!-- Module Cards -->
            <template x-for="(mod, modIndex) in modules" :key="mod.id">
                <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm overflow-hidden">

                    <!-- Module Header -->
                    <div
                        class="flex items-center justify-between border-b border-gray-100 bg-gradient-to-r from-gray-50/80 to-white px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700"
                                x-text="modIndex + 1"></div>
                            <div>
                                <h3 class="text-base font-bold text-gray-800">Course Module</h3>
                                <p class="text-xs text-gray-400">Module #<span x-text="modIndex + 1"></span></p>
                            </div>
                        </div>
                        <button @click="removeModule(mod.id)" x-show="modules.length > 1"
                            class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-100 transition-colors">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Remove
                        </button>
                    </div>

                    <!-- Module Body -->
                    <div class="p-6 space-y-6">

                        <!-- Module Name -->
                        <div class="space-y-2">
                            <label
                                class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                <svg class="h-3.5 w-3.5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Module Name
                            </label>
                            <input type="text" x-model="mod.title" placeholder="e.g., Module 1"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 focus:bg-white transition-all">
                        </div>

                        <!-- Lessons Section -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <label
                                    class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                    <svg class="h-3.5 w-3.5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                    Lessons (<span x-text="mod.rows.length"></span>)
                                </label>
                            </div>

                            <!-- Lesson Items -->
                            <template x-for="(row, rowIndex) in mod.rows" :key="row.id">
                                <div class="rounded-xl border border-gray-200 bg-gray-50/50 p-5">
                                    <div class="mb-4 flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="flex h-6 w-6 items-center justify-center rounded-md bg-gray-200 text-[10px] font-bold text-gray-600"
                                                x-text="rowIndex + 1"></span>
                                            <span class="text-xs font-medium text-gray-400">Item</span>
                                        </div>
                                        <button @click="removeRow(mod.id, row.id)" x-show="mod.rows.length > 1"
                                            class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-100 transition-colors">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="flex flex-col gap-4">
                                        <div class="flex flex-col gap-2">
                                            <label class="text-sm font-medium text-gray-600">Lesson Name</label>
                                            <input type="text" x-model="row.title" placeholder="Enter lesson name..."
                                                class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 transition-all">
                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <label class="text-sm font-medium text-gray-600">Lesson Content</label>
                                            <textarea x-model="row.content" rows="3" placeholder="Enter lesson content..."
                                                class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 transition-all resize-y"></textarea>
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label class="text-sm font-medium text-gray-600">Duration</label>
                                            <input type="text" x-model="row.duration" placeholder="e.g. 45 min"
                                                class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 transition-all">
                                        </div>
                                        <div class="space-y-3">
                                            <label class="flex items-center gap-2 text-sm font-medium text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                                </svg>
                                                Lesson Types
                                            </label>
                                            <div class="flex flex-wrap gap-2">
                                                <!-- Text -->
                                                <label class="cursor-pointer">
                                                    <input type="checkbox" value="text"
                                                        :name="`modules[${modIndex}][lessons][${rowIndex}][lesson_types][]`"
                                                        x-model="row.lesson_types" class="checkbox-custom peer hidden">
                                                    <div
                                                        class="field-chip flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-600 hover:border-gray-300 peer-checked:bg-brand-50 peer-checked:border-brand-500 peer-checked:text-brand-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M4 6h16M4 12h16M4 18h7" />
                                                        </svg>
                                                        <span>Text</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="check-icon h-4 w-4 text-brand-600 opacity-0 peer-checked:opacity-100 transition-all duration-200"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2.5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                </label>

                                                <!-- Link -->
                                                <label class="cursor-pointer">
                                                    <input type="checkbox" value="link"
                                                        :name="`modules[${modIndex}][lessons][${rowIndex}][lesson_types][]`"
                                                        x-model="row.lesson_types" class="checkbox-custom peer hidden">
                                                    <div
                                                        class="field-chip flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-600 hover:border-gray-300 peer-checked:bg-brand-50 peer-checked:border-brand-500 peer-checked:text-brand-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                                        </svg>
                                                        <span>Link</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="check-icon h-4 w-4 text-brand-600 opacity-0 peer-checked:opacity-100 transition-all duration-200"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2.5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                </label>

                                                <!-- File -->
                                                <label class="cursor-pointer">
                                                    <input type="checkbox" value="pdf"
                                                        :name="`modules[${modIndex}][lessons][${rowIndex}][lesson_types][]`"
                                                        x-model="row.lesson_types" class="checkbox-custom peer hidden">
                                                    <div
                                                        class="field-chip flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-600 hover:border-gray-300 peer-checked:bg-brand-50 peer-checked:border-brand-500 peer-checked:text-brand-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                                        </svg>
                                                        <span>PDF</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="check-icon h-4 w-4 text-brand-600 opacity-0 peer-checked:opacity-100 transition-all duration-200"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2.5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                </label>

                                                <!-- Video -->
                                                <label class="cursor-pointer">
                                                    <input type="checkbox" value="video"
                                                        :name="`modules[${modIndex}][lessons][${rowIndex}][lesson_types][]`"
                                                        x-model="row.lesson_types" class="checkbox-custom peer hidden">
                                                    <div
                                                        class="field-chip flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-600 hover:border-gray-300 peer-checked:bg-brand-50 peer-checked:border-brand-500 peer-checked:text-brand-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                        </svg>
                                                        <span>Video</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="check-icon h-4 w-4 text-brand-600 opacity-0 peer-checked:opacity-100 transition-all duration-200"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2.5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                </label>

                                                <!-- Quiz -->
                                                <label class="cursor-pointer">
                                                    <input type="checkbox" value="quiz"
                                                        :name="`modules[${modIndex}][lessons][${rowIndex}][lesson_types][]`"
                                                        x-model="row.lesson_types" class="checkbox-custom peer hidden">
                                                    <div
                                                        class="field-chip flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-600 hover:border-gray-300 peer-checked:bg-brand-50 peer-checked:border-brand-500 peer-checked:text-brand-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <span>Quiz</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="check-icon h-4 w-4 text-brand-600 opacity-0 peer-checked:opacity-100 transition-all duration-200"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2.5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                </label>

                                                <!-- Assignment -->
                                                <label class="cursor-pointer">
                                                    <input type="checkbox" value="assignment"
                                                        :name="`modules[${modIndex}][lessons][${rowIndex}][lesson_types][]`"
                                                        x-model="row.lesson_types" class="checkbox-custom peer hidden">
                                                    <div
                                                        class="field-chip flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-600 hover:border-gray-300 peer-checked:bg-brand-50 peer-checked:border-brand-500 peer-checked:text-brand-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                        <span>Assignment</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="check-icon h-4 w-4 text-brand-600 opacity-0 peer-checked:opacity-100 transition-all duration-200"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2.5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                </label>

                                                <!-- Mixed -->
                                                <label class="cursor-pointer">
                                                    <input type="checkbox" value="mixed"
                                                        :name="`modules[${modIndex}][lessons][${rowIndex}][lesson_types][]`"
                                                        x-model="row.lesson_types" class="checkbox-custom peer hidden">
                                                    <div
                                                        class="field-chip flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-600 hover:border-gray-300 peer-checked:bg-brand-50 peer-checked:border-brand-500 peer-checked:text-brand-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <span>Mixed</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="check-icon h-4 w-4 text-brand-600 opacity-0 peer-checked:opacity-100 transition-all duration-200"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2.5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </template>

                            <!-- Add Lesson Button -->
                            <button @click="addRow(mod.id)"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-dashed border-brand-200 bg-brand-50/50 py-3 text-sm font-semibold text-brand-600 transition-all hover:border-brand-400 hover:bg-brand-100">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                                Add Lesson
                            </button>
                        </div>
                    </div>
                </div>
            </template>

            <!-- Bottom Actions -->
            <div class="flex flex-col md:flex-row gap-4">
                <button @click="addModule()"
                    class="inline-flex w-full md:w-1/2 items-center justify-center gap-2 border border-brand-600 rounded-xl bg-brand-50 px-5 py-3.5 text-sm font-semibold text-brand-600 hover:bg-brand-100 transition-all">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New Module
                </button>
                <button
                    class="inline-flex w-full md:w-1/2 items-center justify-center gap-2 rounded-xl bg-brand-600 px-6 py-4 text-sm font-bold text-white hover:bg-brand-700 transition-all shadow-lg shadow-brand-500/25">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Save Resources
                </button>
            </div>
        </div>


    </div>
@endsection
<script>
    function courseBuilder() {
        let moduleId = 1;
        let rowId = 1;

        return {
            modules: [{
                id: moduleId++,
                title: '',
                rows: [{
                    id: rowId++,
                    title: '',
                    content: '',
                    duration: '',
                    lesson_types: ['text']
                }]
            }],

            addModule() {
                this.modules.push({
                    id: moduleId++,
                    title: '',
                    rows: [{
                        id: rowId++,
                        title: '',
                        content: '',
                        duration: '',
                        lesson_types: ['text']
                    }]
                });
            },

            removeModule(id) {
                if (this.modules.length > 1) {
                    this.modules = this.modules.filter(m => m.id !== id);
                }
            },

            addRow(moduleId) {
                const mod = this.modules.find(m => m.id === moduleId);
                if (mod) {
                    mod.rows.push({
                        id: rowId++,
                        title: '',
                        content: '',
                        duration: '',
                        lesson_types: ['text']
                    });
                }
            },

            removeRow(moduleId, rowId) {
                const mod = this.modules.find(m => m.id === moduleId);
                if (mod && mod.rows.length > 1) {
                    mod.rows = mod.rows.filter(r => r.id !== rowId);
                }
            }
        };
    }
</script>

<style>
    .checkbox-custom:checked+div {
        background-color: var(--color-brand-50);
        border-color: var(--color-brand-500);
        color: var(--color-brand-500);
    }

    .checkbox-custom:checked+div .check-icon {
        opacity: 1;
        transform: scale(1);
    }
</style>

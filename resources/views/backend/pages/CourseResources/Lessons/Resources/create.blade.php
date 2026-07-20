@extends('backend.layouts.app')

@section('content')
    {{-- <div x-data="sectionBuilder()" class="max-w-4xl mx-auto p-6 space-y-6"> --}}
    <form
        action="{{ isset($isEdit)
            ? role_route('role.resources.update', [
                'course' => $course,
                'module' => $module,
                'lesson' => $lesson,
                'resource' => $lesson,
            ])
            : role_route('role.resources.store', [
                'course' => $course,
                'module' => $module,
                'lesson' => $lesson,
            ]) }}"
        method="POST" enctype="multipart/form-data" x-data="sectionBuilder()">

        @csrf

        @isset($isEdit)
            @method('PUT')
        @endisset
        <!-- Page Title -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Dynamic Section Builder</h1>
            <p class="text-sm text-gray-400 mt-1">Create multiple sections with different types and items</p>
        </div>

        <!-- Empty State -->
        <template x-if="sections.length === 0">
            <div class="rounded-3xl border-2 border-dashed border-gray-200 bg-gray-50/60 p-16 text-center animate-in">
                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-700">No sections yet</h3>
                <p class="mt-1 text-sm text-gray-400">Get started by adding your first resource section below</p>
                <button type="button" @click="addSection()"
                    class="mt-6 inline-flex items-center gap-2 rounded-xl bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-brand-500/25 hover:bg-brand-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add First Section
                </button>
            </div>
        </template>

        <!-- ALL SECTIONS -->
        <template x-for="(section, sectionIndex) in sections" :key="section.id">
            <input type="hidden" :name="'sections[' + sectionIndex + '][id]'" :value="section.id">
            <div class="mb-6 overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm animate-in">

                <!-- Section Header -->
                <div
                    class="flex items-center justify-between border-b border-gray-100 bg-gradient-to-r from-gray-50/80 to-white px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700"
                            x-text="sectionIndex + 1"></div>
                        <div>
                            <h3 class="text-base font-bold text-gray-800" x-text="section.name || 'Untitled Section'"></h3>
                            <p class="text-xs text-gray-400">Section #<span x-text="sectionIndex + 1"></span> <span
                                    x-show="section.type"
                                    class="ml-1 px-2 py-0.5 rounded-full bg-brand-50 text-brand-600 text-[10px] font-semibold uppercase"
                                    x-text="section.type"></span></p>
                        </div>
                    </div>
                    <button type="button" @click="removeSection(section.id)" x-show="sections.length > 1"
                        class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Remove
                    </button>
                </div>

                <div class="space-y-6 p-6">

                    <!-- SECTION TYPE SELECTOR -->
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                            Section Type
                        </label>
                        <select x-model="section.type" :name="'sections[' + sectionIndex + '][resource_type]'"
                            @change="onTypeChange(section)"
                            class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-800 outline-none focus:border-brand-500 focus:bg-white transition-colors cursor-pointer">
                            <option value="" disabled>Select a type...</option>
                            <option value="video">Video</option>
                            <option value="content">Content</option>
                            <option value="quiz">Quiz</option>
                            <option value="file">File</option>
                        </select>
                    </div>

                    <!-- SECTION NAME -->
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Section Name
                        </label>
                        <input type="text" x-model="section.name" :name="'sections[' + sectionIndex + '][title]'"
                            :placeholder="'e.g., Week 1 ' + (section.type ? section.type.charAt(0).toUpperCase() + section.type.slice(
                                1) + 's' : 'Materials')"
                            class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 focus:bg-white transition-colors">
                    </div>

                    <!-- ITEMS -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <label
                                class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                                Items (<span x-text="section.items.length"></span>)
                            </label>
                        </div>

                        <!-- No type selected hint -->
                        <template x-if="!section.type">
                            <div class="rounded-xl border border-dashed border-gray-200 bg-gray-50/50 p-6 text-center">
                                <p class="text-sm text-gray-400">Select a section type above to add items</p>
                            </div>
                        </template>

                        <template x-for="(item, itemIndex) in section.items" :key="item.id">
                            <input type="hidden" :name="'sections[' + sectionIndex + '][items][' + itemIndex + '][id]'"
                                :value="item.id">
                            <div class="rounded-xl border border-gray-200 bg-gray-50/50 p-5 animate-in">

                                <!-- Item Header -->
                                <div class="mb-4 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="flex h-6 w-6 items-center justify-center rounded-md bg-gray-200 text-[10px] font-bold text-gray-600"
                                            x-text="itemIndex + 1"></span>
                                        <span class="text-xs font-medium text-gray-400">Item</span>
                                    </div>
                                    <button type="button" @click="removeItem(section.id, item.id)"
                                        x-show="section.items.length > 1"
                                        class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-100 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Dynamic Form Fields based on type -->
                                <div class="flex flex-col gap-4">

                                    <!-- Title (common for all types) -->
                                    <div class="flex flex-col gap-2">
                                        <label class="text-sm font-medium text-gray-600">Title</label>
                                        <input type="text" x-model="item.title"
                                            :name="'sections[' + sectionIndex + '][items][' + itemIndex + '][title]'"
                                            :placeholder="'Enter ' + (section.type || 'item') + ' title'"
                                            class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 transition-colors">
                                    </div>

                                    <!-- URL (for video, link, image, audio) -->
                                    <template x-if="['video','link','image','audio'].includes(section.type)">
                                        <div class="flex flex-col gap-2">
                                            <label class="text-sm font-medium text-gray-600">URL</label>
                                            <div class="relative">
                                                <div
                                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                                    </svg>
                                                </div>
                                                <input type="url" x-model="item.url"
                                                    :name="'sections[' + sectionIndex + '][items][' + itemIndex + '][url]'"
                                                    placeholder="https://example.com"
                                                    class="w-full rounded-lg border border-gray-200 bg-white py-2.5 pl-10 pr-3.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 transition-colors">
                                            </div>
                                        </div>
                                    </template>

                                    <!-- Description (optional for all types) -->
                                    <div class="flex flex-col gap-2">
                                        <label class="text-sm font-medium text-gray-600">Description <span
                                                class="text-gray-300 font-normal">(optional)</span></label>
                                        <textarea x-model="item.description" :name="'sections[' + sectionIndex + '][items][' + itemIndex + '][description]'"
                                            rows="2" placeholder="Add a brief description..."
                                            class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 resize-none transition-colors"></textarea>
                                    </div>

                                    <!-- File upload (for document, file, image, audio) -->
                                    <template x-if="['document','file','image','audio'].includes(section.type)">
                                        <div class="flex flex-col gap-2">
                                            <label class="text-sm font-medium text-gray-600">Upload File</label>
                                            <div class="relative">
                                                <input type="file"
                                                    :name="'sections[' + sectionIndex + '][items][' + itemIndex + '][file]'"
                                                    class="block w-full cursor-pointer rounded-lg border border-dashed border-gray-300 bg-white px-4 py-3 text-sm text-gray-500 file:mr-4 file:ml-0 file:rounded-md file:border-0 file:bg-brand-50 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-brand-700 hover:border-brand-300 transition-colors">
                                            </div>
                                        </div>
                                    </template>

                                    <!-- Duration (for video, audio) -->
                                    <template x-if="['video','audio'].includes(section.type)">
                                        <div class="flex flex-col gap-2">
                                            <label class="text-sm font-medium text-gray-600">Duration <span
                                                    class="text-gray-300 font-normal">(optional)</span></label>
                                            <input type="text" x-model="item.duration"
                                                :name="'sections[' + sectionIndex + '][items][' + itemIndex + '][duration]'"
                                                placeholder="e.g., 10:30 or 5 min"
                                                class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 transition-colors">
                                        </div>
                                    </template>

                                </div>
                            </div>
                        </template>

                        <!-- ADD ITEM -->
                        <button type="button" @click="addItem(section.id)" x-show="section.type"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-dashed border-brand-200 bg-brand-50/50 py-3 text-sm font-semibold text-brand-600 transition-all hover:border-brand-400 hover:bg-brand-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Item
                        </button>

                    </div>

                </div>
            </div>
        </template>

        <!-- ADD SECTION & SAVE -->
        <div class="flex flex-col md:flex-row md:gap-4" x-show="sections.length > 0">
            <button type="button" @click="addSection()"
                class="inline-flex w-full md:w-1/2 items-center justify-center gap-2 rounded-xl border border-brand-600 bg-brand-50 px-5 py-3.5 text-sm font-semibold text-brand-600 hover:bg-brand-100 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add New Section
            </button>

            <button type="submit"
                class="mt-3 md:mt-0 inline-flex w-full md:w-1/2 items-center justify-center gap-2 rounded-xl bg-brand-600 px-6 py-4 text-sm font-bold text-white hover:bg-brand-700 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Save All Sections
            </button>
        </div>



    </form>

    <script>
        function sectionBuilder() {
            return {
                sections: [],
                nextId: 1,
                nextItemId: 1,

                addSection() {
                    this.sections.push({
                        id: this.nextId++,
                        type: '',
                        name: '',
                        items: []
                    });
                },

                removeSection(id) {
                    this.sections = this.sections.filter(s => s.id !== id);
                },

                onTypeChange(section) {
                    // Auto-add first item when type is selected
                    if (section.items.length === 0) {
                        this.addItem(section.id);
                    }
                },

                addItem(sectionId) {
                    const section = this.sections.find(s => s.id === sectionId);
                    if (!section) return;

                    const baseItem = {
                        id: this.nextItemId++,
                        title: '',
                        description: ''
                    };

                    // Add type-specific fields
                    if (['video', 'link', 'image', 'audio'].includes(section.type)) {
                        baseItem.url = '';
                    }
                    if (['video', 'audio'].includes(section.type)) {
                        baseItem.duration = '';
                    }

                    section.items.push(baseItem);
                },

                removeItem(sectionId, itemId) {
                    const section = this.sections.find(s => s.id === sectionId);
                    if (section) {
                        section.items = section.items.filter(i => i.id !== itemId);
                    }
                },


            }
        }
    </script>

    <style>
        .animate-in {
            animation: fadeSlideIn 0.3s ease-out;
        }

        @keyframes fadeSlideIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection

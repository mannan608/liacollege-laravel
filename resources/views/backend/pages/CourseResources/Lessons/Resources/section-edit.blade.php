@extends('backend.layouts.app')

@section('content')
    <form method="POST"
        action="{{ role_route('role.resources.update', [
            'course' => $course->id,
            'module' => $module->id,
            'lesson' => $lesson->id,
            'resource' => $resource->id,
        ]) }}"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
                <div class="flex items-center gap-2 text-red-700 font-semibold mb-2">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Please fix the following errors:
                </div>
                <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <!-- Page Title -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Edit Section: {{ $resource->title }}</h1>
            <p class="text-sm text-gray-400 mt-1">Update this resource section</p>
        </div>

        <!-- Hidden Section ID -->
        <input type="hidden" name="id" value="{{ $resource->id }}">

        <div class="mb-6 overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

            <div class="space-y-6 p-6">

                <!-- SECTION TYPE -->
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        Section Type *
                    </label>
                    <select name="resource_type"
                        class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-800 outline-none focus:border-brand-500 focus:bg-white transition-colors cursor-pointer">
                        <option value="" disabled>Select a type...</option>
                        <option value="video" {{ $resource->resource_type === 'video' ? 'selected' : '' }}>Video</option>
                        <option value="content" {{ $resource->resource_type === 'content' ? 'selected' : '' }}>Content
                        </option>
                        <option value="file" {{ $resource->resource_type === 'file' ? 'selected' : '' }}>File</option>
                    </select>
                    @error('resource_type')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- SECTION NAME -->
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Section Name *
                    </label>
                    <input type="text" name="title" value="{{ old('title', $resource->title) }}"
                        class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-800 outline-none focus:border-brand-500 focus:bg-white transition-colors">
                    @error('title')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- STATUS -->
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Status
                    </label>
                    <select name="status"
                        class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-800 outline-none focus:border-brand-500 focus:bg-white transition-colors">
                        <option value="1" {{ $resource->status ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$resource->status ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

            </div>
        </div>

        <!-- ITEMS -->
        <div class="mb-6" x-data="{
            items: {{ $resource->resources->map(
                    fn($r) => [
                        'id' => $r->id,
                        'title' => $r->title,
                        'description' => $r->description,
                        'url' => $r->url,
                        'duration' => $r->duration,
                        'file_path' => $r->file_path,
                    ],
                )->values()->toJson() }},
            sectionType: '{{ $resource->resource_type }}',
        
            addItem() {
                this.items.push({
                    id: null,
                    title: '',
                    description: '',
                    url: '',
                    duration: '',
                    file_path: null
                });
            },
        
            removeItem(index) {
                if (this.items.length > 1) {
                    this.items.splice(index, 1);
                }
            }
        }">

            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    Items (<span x-text="items.length"></span>)
                </label>
            </div>

            <template x-for="(item, index) in items" :key="index">
                <div class="mb-4 rounded-xl border border-gray-200 bg-gray-50/50 p-5">

                    <!-- Hidden ID for existing items -->
                    <input type="hidden" :name="'items[' + index + '][id]'" :value="item.id">

                    <!-- Item Header -->
                    <div class="mb-4 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span
                                class="flex h-6 w-6 items-center justify-center rounded-md bg-gray-200 text-[10px] font-bold text-gray-600"
                                x-text="index + 1"></span>
                            <span class="text-xs font-medium text-gray-400">Item</span>
                        </div>
                        <button type="button" @click="removeItem(index)" x-show="items.length > 1"
                            class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex flex-col gap-4">

                        <!-- Title -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-medium text-gray-600">Title *</label>
                            <input type="text" :name="'items[' + index + '][title]'" x-model="item.title"
                                class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 outline-none focus:border-brand-500 transition-colors">
                        </div>

                        <!-- URL (video only) -->
                        <div class="flex flex-col gap-2" x-show="sectionType === 'video'">
                            <label class="text-sm font-medium text-gray-600">URL</label>
                            <input type="url" :name="'items[' + index + '][url]'" x-model="item.url"
                                placeholder="https://youtube.com/watch?v=..."
                                class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 transition-colors">
                        </div>

                        <!-- Description -->
                        {{-- <div class="flex flex-col gap-2">
                            <label class="text-sm font-medium text-gray-600">Description <span class="text-gray-300 font-normal">(optional)</span></label>
                            <textarea :name="'items[' + index + '][description]'" x-model="item.description" rows="2"
                                      class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 resize-none transition-colors"></textarea>
                        </div> --}}
                        <div x-data x-init="ClassicEditor
                            .create($refs.editor)
                            .then(editor => {
                        
                                editor.setData(item.description || '');
                        
                                editor.model.document.on('change:data', () => {
                                    item.description = editor.getData();
                                });
                        
                            })
                            .catch(error => console.error(error));">

                            <textarea x-ref="editor"></textarea>

                            <input type="hidden" x-model="item.description" :name="'items[' + index + '][description]'">

                        </div>

                        <!-- File (file type only) -->
                        <div class="flex flex-col gap-2" x-show="sectionType === 'file'">
                            <label class="text-sm font-medium text-gray-600">Upload File</label>

                            <!-- Show existing file -->
                            <template x-if="item.file_path && !item.newFile">
                                <div class="flex items-center gap-2 mb-2 p-2 bg-blue-50 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm text-blue-700" x-text="item.file_path.split('/').pop()"></span>
                                    <button type="button" @click="item.file_path = null"
                                        class="text-xs text-red-500 hover:text-red-700 ml-auto">Remove</button>
                                </div>
                            </template>

                            <input type="file" :name="'items[' + index + '][file]'"
                                class="block w-full cursor-pointer rounded-lg border border-dashed border-gray-300 bg-white px-4 py-3 text-sm text-gray-500 file:mr-4 file:rounded-md file:border-0 file:bg-brand-50 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-brand-700 hover:border-brand-300 transition-colors">
                        </div>

                        <!-- Duration (video only) -->
                        <div class="flex flex-col gap-2" x-show="sectionType === 'video'">
                            <label class="text-sm font-medium text-gray-600">Duration <span
                                    class="text-gray-300 font-normal">(optional)</span></label>
                            <input type="text" :name="'items[' + index + '][duration]'" x-model="item.duration"
                                placeholder="e.g., 10:30 or 5 min"
                                class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 transition-colors">
                        </div>

                    </div>
                </div>
            </template>

            <!-- Add Item Button -->
            <button type="button" @click="addItem()"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-dashed border-brand-200 bg-brand-50/50 py-3 text-sm font-semibold text-brand-600 transition-all hover:border-brand-400 hover:bg-brand-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Add Item
            </button>

        </div>

        <!-- Actions -->
        <div class="flex flex-col md:flex-row gap-4">
            <a href="{{ role_route('role.resources.index', ['course' => $course->id, 'module' => $module->id, 'lesson' => $lesson->id]) }}"
                class="inline-flex w-full md:w-1/2 items-center justify-center gap-2 rounded-xl border border-gray-200 bg-white px-6 py-4 text-sm font-bold text-gray-700 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit"
                class="inline-flex w-full md:w-1/2 items-center justify-center gap-2 rounded-xl bg-brand-600 px-6 py-4 text-sm font-bold text-white hover:bg-brand-700 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Update Section
            </button>
        </div>

    </form>
@endsection
<style>
        .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable, .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
    height: 280px;
}
</style>

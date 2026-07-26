@extends('backend.layouts.app')

@section('content')
<div x-data="documentsApp()" x-cloak
    class="bg-gray-50 dark:bg-[#0c0c0f] text-gray-900 dark:text-white transition-colors duration-300">

    <main class="mx-auto max-w-5xl px-6 py-10">

        <!-- Header -->
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">My Documents</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Manage your uploaded documents.
                </p>
            </div>
            <button @click="openModal('upload')"
                class="inline-flex shrink-0 items-center gap-2 rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-brand-700 active:scale-[0.97]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4" />
                </svg>
                Upload Document
            </button>
        </div>

        <!-- Documents Grid -->
        @if ($documents->count())
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($documents as $document)
                    @php
                        $ext = strtolower($document->extension);
                        $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']);
                        $isPdf = $ext === 'pdf';
                    @endphp

                    <div class="group overflow-hidden rounded-xl border border-gray-200 bg-white transition hover:shadow-md dark:border-gray-800 dark:bg-gray-900">

                        <!-- Preview -->
                        <div class="relative aspect-[4/3] cursor-pointer bg-gray-100 dark:bg-gray-800"
                            @click="openPreview('{{ asset($document->file) }}', '{{ $document->name }}', '{{ $ext }}', {{ $isImage ? 'true' : 'false' }}, {{ $isPdf ? 'true' : 'false' }})">

                            @if ($isImage)
                                <img src="{{ asset($document->file) }}" alt="{{ $document->name }}"
                                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
                            @elseif($isPdf)
                                <div class="flex h-full w-full flex-col items-center justify-center bg-red-50 dark:bg-red-900/20">
                                    <svg class="h-12 w-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3h4.5M9 3.75H6.375A2.625 2.625 0 003.75 6.375v11.25A2.625 2.625 0 006.375 20.25h11.25A2.625 2.625 0 0020.25 17.625V9.75L14.25 3.75H9z" />
                                    </svg>
                                    <span class="mt-1 text-[10px] font-bold uppercase tracking-wider text-red-600 dark:text-red-400">PDF</span>
                                </div>
                            @else
                                <div class="flex h-full w-full flex-col items-center justify-center bg-gray-50 dark:bg-gray-800">
                                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3h4.5M9 3.75H6.375A2.625 2.625 0 003.75 6.375v11.25A2.625 2.625 0 006.375 20.25h11.25A2.625 2.625 0 0020.25 17.625V9.75L14.25 3.75H9z" />
                                    </svg>
                                    <span class="mt-1 text-[10px] font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">{{ $ext }}</span>
                                </div>
                            @endif

                            <!-- Hover overlay -->
                            <div class="absolute inset-0 flex items-center justify-center bg-black/0 transition-colors group-hover:bg-black/10">
                                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-white/90 shadow-lg backdrop-blur-sm opacity-0 transition-opacity group-hover:opacity-100 dark:bg-black/60">
                                    <svg class="h-4 w-4 text-gray-700 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.25 12s3.75-6 9.75-6 9.75 6 9.75 6-3.75 6-9.75 6S2.25 12 2.25 12z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Info -->
                        <div class="p-4">
                            <div class="min-w-0">
                                <h3 class="truncate text-sm font-semibold text-gray-900 dark:text-gray-100" title="{{ $document->name }}">
                                    {{ $document->name }}
                                </h3>
                                <div class="mt-1 flex items-center gap-2 text-[11px] text-gray-400 dark:text-gray-500">
                                    <span class="rounded bg-gray-100 px-1.5 py-0.5 text-[10px] font-bold uppercase tracking-wider dark:bg-gray-800">
                                        {{ $ext }}
                                    </span>
                                    @if ($document->size)
                                        <span>{{ number_format($document->size / 1024 / 1024, 2) }} MB</span>
                                    @endif
                                    <span>·</span>
                                    <span>{{ $document->created_at->format('d M Y') }}</span>
                                </div>
                            </div>

                            <!-- Simple Actions -->
                            <div class="mt-3 flex items-center gap-2">
                                <button @click="openPreview('{{ asset($document->file) }}', '{{ $document->name }}', '{{ $ext }}', {{ $isImage ? 'true' : 'false' }}, {{ $isPdf ? 'true' : 'false' }})"
                                    class="inline-flex flex-1 items-center justify-center gap-1.5 rounded-lg border border-gray-200 py-1.5 text-xs font-medium text-gray-600 transition hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.25 12s3.75-6 9.75-6 9.75 6 9.75 6-3.75 6-9.75 6S2.25 12 2.25 12z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    View
                                </button>
                                <a href="{{ route('documents.download', [$student, $document]) }}"
                                    class="inline-flex flex-1 items-center justify-center gap-1.5 rounded-lg border border-gray-200 py-1.5 text-xs font-medium text-gray-600 transition hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 3v12m0 0l-4-4m4 4l4-4M4.5 21h15" />
                                    </svg>
                                    Download
                                </a>
                                <button @click="openReplace({{ $document->id }}, '{{ $document->name }}', '{{ $document->document_type }}', '{{ route('documents.replace', [$student, $document]) }}')"
                                    class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-gray-400 transition hover:bg-amber-50 hover:text-amber-600 dark:hover:bg-amber-900/20 dark:hover:text-amber-400"
                                    title="Replace">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <button @click="confirmDelete({{ $document->id }}, '{{ $document->name }}', '{{ route('documents.destroy', [$student, $document]) }}')"
                                    class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-gray-400 transition hover:bg-red-50 hover:text-red-600 dark:hover:bg-red-900/20 dark:hover:text-red-400"
                                    title="Delete">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-gray-300 bg-white py-16 dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg>
                </div>
                <h3 class="mt-4 text-base font-semibold text-gray-900 dark:text-white">No documents yet</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Upload your first document to get started.</p>
                <button @click="openModal('upload')"
                    class="mt-5 inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Upload Document
                </button>
            </div>
        @endif

    </main>

    <!-- Upload Modal -->
    <div x-show="modals.upload" x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm"
        @click.self="closeModal('upload')" @keydown.escape.window="closeModal('upload')">
        <div x-show="modals.upload" x-transition.scale
            class="mx-4 w-full max-w-md rounded-2xl border border-gray-200 bg-white shadow-2xl dark:border-gray-700 dark:bg-gray-800">
            <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Upload Document</h3>
                <button @click="closeModal('upload')"
                    class="rounded-lg p-1 text-gray-400 hover:bg-gray-100 hover:text-gray-600 dark:hover:bg-gray-700">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <form action="{{ role_route('role.documents.store', ['student' => $student->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <div class="mb-4">
                    <label for="document_type" class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-gray-700 dark:text-gray-300">
                        Document Type <span class="text-red-500">*</span>
                    </label>
                    <select id="document_type" name="document_type" x-model="uploadForm.type" required
                        class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 focus:border-brand-500 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                        <option value="">Select document type</option>
                        @foreach($documentTypes as $type)
                            <option value="{{ $type }}" @selected(old('document_type') === $type)>{{ $type }}</option>
                        @endforeach
                    </select>
                    @error('document_type')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                     <div class="mb-4">
                           <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Document</label>
                        <div class="relative rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 p-6 transition hover:border-brand-400 dark:border-gray-600 dark:bg-gray-700/30"
                            :class="{ 'border-brand-400 bg-brand-50/30': dragOver }"
                            @dragover.prevent="dragOver = true"
                            @dragleave.prevent="dragOver = false"
                            @drop.prevent="handleDrop($event)">
                            <input type="file" name="document" x-ref="uploadInput"
                                @change="uploadFileName = $event.target.files[0]?.name"
                                accept=".pdf,.jpg,.jpeg,.png" required
                                class="absolute inset-0 z-10 h-full w-full cursor-pointer opacity-0">
                            <div class="flex flex-col items-center text-center">
                                <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                                    <span class="font-medium text-brand-600 dark:text-brand-400">Click to upload</span> or drag and drop
                                </p>
                                <p class="mt-1 text-xs text-gray-400">PDF, JPG, PNG up to 10MB</p>
                            </div>
                        </div>
                     </div>
                        <div x-show="uploadFileName" x-transition
                            class="mt-2 flex items-center gap-2 rounded-lg border border-gray-200 bg-white p-2 dark:border-gray-700 dark:bg-gray-800">
                            <svg class="h-4 w-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="flex-1 truncate text-sm text-gray-700 dark:text-gray-300" x-text="uploadFileName"></span>
                            <button type="button" @click="uploadFileName = ''; $refs.uploadInput.value = ''"
                                class="text-gray-400 hover:text-red-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        @error('document')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" @click="closeModal('upload')"
                            class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">Cancel</button>
                        <button type="submit" :disabled="!uploadFileName"
                            class="rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-700 disabled:cursor-not-allowed disabled:opacity-50">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Preview Modal -->
    <div x-show="modals.preview" x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm"
        @click.self="closeModal('preview')" @keydown.escape.window="closeModal('preview')">
        <div x-show="modals.preview" x-transition.scale
            class="mx-4 flex w-full max-w-4xl flex-col overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-gray-900"
            style="max-height: 90vh;">
            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4 dark:border-gray-700">
                <div class="min-w-0">
                    <h3 class="truncate text-lg font-semibold text-gray-900 dark:text-white" x-text="previewDoc?.name"></h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400" x-text="(previewDoc?.ext || '').toUpperCase() + ' Document'"></p>
                </div>
                <div class="ml-4 flex items-center gap-2">
                    <a :href="previewDoc?.url" download
                        class="inline-flex items-center gap-1.5 rounded-lg bg-gray-100 px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v12m0 0l-4-4m4 4l4-4M4.5 21h15" />
                        </svg>
                        Download
                    </a>
                    <button @click="closeModal('preview')"
                        class="rounded-lg p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-600 dark:hover:bg-gray-800">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex flex-1 items-center justify-center overflow-auto bg-gray-50 p-4 dark:bg-gray-950">
                <img x-show="previewDoc?.isImage" :src="previewDoc?.url"
                    class="max-h-full max-w-full rounded-lg object-contain shadow-lg" :alt="previewDoc?.name">
                <iframe x-show="previewDoc?.isPdf" :src="previewDoc?.url" class="h-[60vh] w-full rounded-lg"
                    frameborder="0"></iframe>
                <div x-show="!previewDoc?.isImage && !previewDoc?.isPdf" class="text-center">
                    <div class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-2xl bg-gray-200 dark:bg-gray-800">
                        <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3h4.5M9 3.75H6.375A2.625 2.625 0 003.75 6.375v11.25A2.625 2.625 0 006.375 20.25h11.25A2.625 2.625 0 0020.25 17.625V9.75L14.25 3.75H9z" />
                        </svg>
                    </div>
                    <p class="mb-4 text-sm text-gray-500 dark:text-gray-400">Preview not available for this file type</p>
                    <a :href="previewDoc?.url" download
                        class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v12m0 0l-4-4m4 4l4-4M4.5 21h15" />
                        </svg>
                        Download File
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div x-show="modals.delete" x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm"
        @click.self="closeModal('delete')" @keydown.escape.window="closeModal('delete')">
        <div x-show="modals.delete" x-transition.scale
            class="mx-4 w-full max-w-sm rounded-2xl border border-gray-200 bg-white p-6 text-center shadow-2xl dark:border-gray-700 dark:bg-gray-800">
            <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/20">
                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Delete Document?</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Delete <span class="font-medium text-gray-700 dark:text-gray-300" x-text="deleteDoc?.name"></span>? This cannot be undone.
            </p>
            <form :action="deleteDoc?.action" method="POST" class="mt-6 flex justify-center gap-3">
                @csrf
                @method('DELETE')
                <button type="button" @click="closeModal('delete')"
                    class="rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">Cancel</button>
                <button type="submit"
                    class="rounded-lg bg-red-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-700">Delete</button>
            </form>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('documentsApp', () => ({
            modals: { upload: false, preview: false, delete: false, replace: false },
            dragOver: false,
            uploadFileName: '',
            previewDoc: null,
            deleteDoc: null,
            replaceDoc: null,

            openModal(name) {
                this.modals[name] = true;
                document.body.style.overflow = 'hidden';
            },

            closeModal(name) {
                this.modals[name] = false;
                if (!Object.values(this.modals).some(v => v)) {
                    document.body.style.overflow = '';
                }
                if (name === 'preview') {
                    setTimeout(() => this.previewDoc = null, 200);
                }
               
            },

            openPreview(url, name, ext, isImage, isPdf) {
                this.previewDoc = { url, name, ext, isImage, isPdf };
                this.openModal('preview');
            },

            openReplace(id, name, docType, actionUrl) {
                this.replaceDoc = { id, name, docType, action: actionUrl, newFileName: '' };
                this.openModal('replace');
                this.$nextTick(() => {
                    if (this.$refs.replaceInput) this.$refs.replaceInput.value = '';
                });
            },

            confirmDelete(id, name, actionUrl) {
                this.deleteDoc = { id, name, action: actionUrl };
                this.openModal('delete');
            },

            handleDrop(e) {
                this.dragOver = false;
                const file = e.dataTransfer.files[0];
                if (file) {
                    this.uploadFileName = file.name;
                    this.$refs.uploadInput.files = e.dataTransfer.files;
                }
            }
        }));
    });
</script>
@endpush
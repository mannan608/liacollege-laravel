@extends('backend.layouts.app')

@section('content')
@php
    $documentCount = $documents->count();
@endphp

<div x-data="documentsApp()" x-init="init(@js($errors->any()))" x-cloak
    class="min-h-[calc(100vh-6rem)] bg-gray-50 text-gray-900 transition-colors duration-300 dark:bg-[#0c0c0f] dark:text-white">

    <main class="mx-auto max-w-6xl px-6 py-10">
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <div class="mb-2 inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-brand-700 dark:border-brand-900/40 dark:bg-brand-900/20 dark:text-brand-300">
                    Student Documents
                </div>
                <h1 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
                    {{ $student->user?->name ?? 'Student' }}
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Upload, preview, download, and delete student documents from one place.
                </p>
            </div>

            @can('student.edit')
                <button type="button" @click="openModal('upload')"
                    class="inline-flex items-center gap-2 rounded-xl bg-brand-600 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-brand-700 active:scale-[0.98]">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4v16m8-8H4" />
                    </svg>
                    Upload Document
                </button>
            @endcan
        </div>

        @if ($documents->count())
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">
                @foreach ($documents as $document)
                    @php
                        $ext = strtolower($document->extension ?: pathinfo($document->file, PATHINFO_EXTENSION));
                        $downloadUrl = role_route('role.documents.download', ['student' => $student, 'document' => $document]);
                        $previewPayload = [
                            'url' => asset($document->file),
                            'downloadUrl' => $downloadUrl,
                            'name' => $document->name,
                            'ext' => $ext,
                            'type' => $document->document_type,
                            'notes' => $document->notes,
                            'isImage' => $document->isImage(),
                            'isPdf' => $document->isPdf(),
                        ];
                    @endphp

                    <article class="group overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-lg dark:border-gray-800 dark:bg-gray-900">
                        <button type="button"
                            class="relative block w-full overflow-hidden bg-gray-100 text-left focus:outline-none"
                            @click="openPreview(@js($previewPayload))">
                            <div class="aspect-[4/3]">
                                @if ($document->isImage())
                                    <img src="{{ asset($document->file) }}" alt="{{ $document->name }}"
                                        class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                                @elseif ($document->isPdf())
                                    <div class="flex h-full w-full flex-col items-center justify-center bg-red-50 dark:bg-red-950/20">
                                        <svg class="h-12 w-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3h4.5M9 3.75H6.375A2.625 2.625 0 003.75 6.375v11.25A2.625 2.625 0 006.375 20.25h11.25A2.625 2.625 0 0020.25 17.625V9.75L14.25 3.75H9z" />
                                        </svg>
                                        <span class="mt-2 text-[11px] font-semibold uppercase tracking-[0.2em] text-red-600 dark:text-red-400">PDF</span>
                                    </div>
                                @else
                                    <div class="flex h-full w-full flex-col items-center justify-center bg-gray-50 dark:bg-gray-800">
                                        <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3h4.5M9 3.75H6.375A2.625 2.625 0 003.75 6.375v11.25A2.625 2.625 0 006.375 20.25h11.25A2.625 2.625 0 0020.25 17.625V9.75L14.25 3.75H9z" />
                                        </svg>
                                        <span class="mt-2 text-[11px] font-semibold uppercase tracking-[0.2em] text-gray-500 dark:text-gray-400">
                                            {{ $ext ?: 'FILE' }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <div class="absolute inset-0 flex items-center justify-center bg-black/0 transition-colors duration-200 group-hover:bg-black/15">
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white/90 opacity-0 shadow-lg backdrop-blur-sm transition-opacity group-hover:opacity-100 dark:bg-black/60">
                                    <svg class="h-5 w-5 text-gray-800 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.25 12s3.75-6 9.75-6 9.75 6 9.75 6-3.75 6-9.75 6S2.25 12 2.25 12z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </div>
                        </button>

                        <div class="p-4">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0 flex-1">
                                    <h3 class="truncate text-sm font-semibold text-gray-900 dark:text-white" title="{{ $document->name }}">
                                        {{ $document->name }}
                                    </h3>
                                    <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] text-gray-500 dark:text-gray-400">
                                        <span class="rounded-full bg-gray-100 px-2.5 py-1 font-semibold uppercase tracking-wider text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                                            {{ $document->document_type }}
                                        </span>
                                        <span>{{ $document->formatted_size }}</span>
                                        <span>|</span>
                                        <span>{{ $document->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            @if ($document->notes)
                                <p class="mt-3 rounded-xl bg-gray-50 px-3 py-2 text-sm text-gray-600 dark:bg-gray-800 dark:text-gray-300" title="{{ $document->notes }}">
                                    {{ $document->notes }}
                                </p>
                            @endif

                            <div class="mt-4 flex items-center gap-2">
                                <button type="button"
                                    @click="openPreview(@js($previewPayload))"
                                    class="inline-flex flex-1 items-center justify-center gap-1.5 rounded-xl border border-gray-200 px-3 py-2 text-xs font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.25 12s3.75-6 9.75-6 9.75 6 9.75 6-3.75 6-9.75 6S2.25 12 2.25 12z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Preview
                                </button>

                                <a href="{{ $downloadUrl }}"
                                    class="inline-flex flex-1 items-center justify-center gap-1.5 rounded-xl border border-gray-200 px-3 py-2 text-xs font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 3v12m0 0l-4-4m4 4l4-4M4.5 21h15" />
                                    </svg>
                                    Download
                                </a>

                                @can('student.edit')
                                    <button type="button"
                                        @click="confirmDelete(@js([
                                            'name' => $document->name,
                                            'action' => role_route('role.documents.destroy', ['student' => $student, 'document' => $document]),
                                        ]))"
                                        class="inline-flex h-10 w-10 items-center justify-center rounded-xl text-gray-400 transition hover:bg-red-50 hover:text-red-600 dark:hover:bg-red-950/30 dark:hover:text-red-400"
                                        title="Delete">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                @endcan
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="flex flex-col items-center justify-center rounded-3xl border border-dashed border-gray-300 bg-white px-6 py-16 text-center dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gray-100 dark:bg-gray-800">
                    <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="mt-4 text-base font-semibold text-gray-900 dark:text-white">No documents yet</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Upload a document, add an optional note, and keep everything attached to this student.
                </p>
                @can('student.edit')
                    <button type="button" @click="openModal('upload')"
                        class="mt-6 inline-flex items-center gap-2 rounded-xl border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        Upload Document
                    </button>
                @endcan
            </div>
        @endif
    </main>

    @can('student.edit')
        <div x-show="modals.upload" x-transition.opacity
            class="fixed inset-0 z-99999 flex items-center justify-center bg-black/50 px-4 py-6 backdrop-blur-sm"
            @click.self="closeModal('upload')" @keydown.escape.window="closeModal('upload')">
            <div x-show="modals.upload" x-transition.scale
                class="w-full max-w-lg overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-2xl dark:border-gray-700 dark:bg-gray-900">
                <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4 dark:border-gray-800">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Upload Document</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Select type, add a note if needed, then upload one file.</p>
                    </div>
                    <button type="button" @click="closeModal('upload')"
                        class="rounded-lg p-2 text-gray-400 transition hover:bg-gray-100 hover:text-gray-600 dark:hover:bg-gray-800">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form action="{{ role_route('role.documents.store', ['student' => $student]) }}" method="POST" enctype="multipart/form-data" class="space-y-5 px-6 py-6">
                    @csrf

                    <div>
                        <label for="document_type" class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-gray-700 dark:text-gray-300">
                            Document Type <span class="text-red-500">*</span>
                        </label>
                        <select id="document_type" name="document_type" required
                            class="block w-full rounded-xl border border-gray-300 bg-white px-3 py-3 text-sm text-gray-900 focus:border-brand-500 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            <option value="">Select document type</option>
                            @foreach ($documentTypes as $type)
                                <option value="{{ $type }}" @selected(old('document_type') === $type)>{{ $type }}</option>
                            @endforeach
                        </select>
                        @error('document_type')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="notes" class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-gray-700 dark:text-gray-300">
                            Note
                        </label>
                        <textarea id="notes" name="notes" rows="3"
                            placeholder="Optional note about this file"
                            class="block w-full rounded-xl border border-gray-300 bg-white px-3 py-3 text-sm text-gray-900 focus:border-brand-500 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white">{{ old('notes') }}</textarea>
                        @error('notes')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-gray-700 dark:text-gray-300">
                            File <span class="text-red-500">*</span>
                        </label>
                        <div class="relative rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 p-6 transition hover:border-brand-400 dark:border-gray-600 dark:bg-gray-800/40"
                            :class="{ 'border-brand-400 bg-brand-50/40 dark:bg-brand-900/10': dragOver }"
                            @dragover.prevent="dragOver = true"
                            @dragleave.prevent="dragOver = false"
                            @drop.prevent="handleDrop($event)">
                            <input type="file" name="document" x-ref="uploadInput" accept=".pdf,.jpg,.jpeg,.png" required
                                @change="setUploadFile($event.target.files[0] ?? null)"
                                class="absolute inset-0 z-10 h-full w-full cursor-pointer opacity-0">
                            <div class="pointer-events-none flex flex-col items-center text-center">
                                <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mt-3 text-sm font-medium text-gray-700 dark:text-gray-200">
                                    <span class="text-brand-600 dark:text-brand-400">Click to upload</span> or drag and drop
                                </p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">PDF, JPG, and PNG up to 10MB</p>
                            </div>
                        </div>

                        <div x-show="uploadFileName" x-transition
                            class="mt-3 flex items-center gap-3 rounded-xl border border-gray-200 bg-white p-3 dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-brand-50 text-brand-600 dark:bg-brand-900/20 dark:text-brand-300">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="truncate text-sm font-medium text-gray-900 dark:text-white" x-text="uploadFileName"></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Selected file</p>
                            </div>
                            <button type="button" @click="clearUploadFile()"
                                class="rounded-lg p-2 text-gray-400 transition hover:bg-red-50 hover:text-red-600 dark:hover:bg-red-950/30 dark:hover:text-red-400"
                                title="Remove file">
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

                    <div class="flex justify-end gap-2 pt-1">
                        <button type="button" @click="closeModal('upload')"
                            class="rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                            Cancel
                        </button>
                        <button type="submit"
                            class="rounded-xl bg-brand-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-brand-700">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endcan

    <div x-show="modals.preview" x-transition.opacity
        class="fixed inset-0 z-99999 flex items-center justify-center bg-black/80 px-4 py-6 backdrop-blur-sm"
        @click.self="closeModal('preview')" @keydown.escape.window="closeModal('preview')">
        <div x-show="modals.preview" x-transition.scale
            class="flex w-full max-w-5xl flex-col overflow-hidden rounded-3xl bg-white shadow-2xl dark:bg-gray-950"
            style="max-height: 92vh;">
            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4 dark:border-gray-800">
                <div class="min-w-0">
                    <h3 class="truncate text-lg font-semibold text-gray-900 dark:text-white" x-text="previewDoc?.name"></h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        <span x-text="previewDoc?.type"></span>
                        <span class="px-1">|</span>
                        <span x-text="(previewDoc?.ext || '').toUpperCase()"></span>
                    </p>
                </div>

                <div class="ml-4 flex items-center gap-2">
                    <a :href="previewDoc?.downloadUrl" download
                        class="inline-flex items-center gap-1.5 rounded-xl bg-gray-100 px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v12m0 0l-4-4m4 4l4-4M4.5 21h15" />
                        </svg>
                        Download
                    </a>
                    <button type="button" @click="closeModal('preview')"
                        class="rounded-xl p-2 text-gray-400 transition hover:bg-gray-100 hover:text-gray-600 dark:hover:bg-gray-800">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="grid gap-0 md:grid-cols-[minmax(0,1fr)_18rem]">
                <div class="flex min-h-[55vh] items-center justify-center overflow-auto bg-gray-100 p-4 dark:bg-gray-950">
                    <template x-if="previewDoc?.isImage">
                        <img :src="previewDoc?.url" :alt="previewDoc?.name"
                            class="max-h-[80vh] max-w-full rounded-2xl object-contain shadow-lg">
                    </template>

                    <template x-if="previewDoc?.isPdf">
                        <iframe :src="previewDoc?.url" class="h-[80vh] w-full rounded-2xl bg-white" frameborder="0"></iframe>
                    </template>

                    <template x-if="!previewDoc?.isImage && !previewDoc?.isPdf">
                        <div class="mx-auto max-w-sm rounded-3xl border border-gray-200 bg-white p-8 text-center shadow-sm dark:border-gray-800 dark:bg-gray-900">
                            <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-gray-100 dark:bg-gray-800">
                                <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3h4.5M9 3.75H6.375A2.625 2.625 0 003.75 6.375v11.25A2.625 2.625 0 006.375 20.25h11.25A2.625 2.625 0 0020.25 17.625V9.75L14.25 3.75H9z" />
                                </svg>
                            </div>
                            <h4 class="text-base font-semibold text-gray-900 dark:text-white">Preview not available</h4>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                This file type cannot be previewed directly in the browser.
                            </p>
                            <a :href="previewDoc?.downloadUrl" download
                                class="mt-5 inline-flex items-center gap-2 rounded-xl bg-brand-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-brand-700">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 3v12m0 0l-4-4m4 4l4-4M4.5 21h15" />
                                </svg>
                                Download file
                            </a>
                        </div>
                    </template>
                </div>

                <aside class="border-t border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900 md:border-l md:border-t-0">
                    <div class="rounded-2xl bg-gray-50 p-4 dark:bg-gray-800/70">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Details</p>
                        <dl class="mt-3 space-y-3 text-sm">
                            <div>
                                <dt class="text-gray-500 dark:text-gray-400">Type</dt>
                                <dd class="font-medium text-gray-900 dark:text-white" x-text="previewDoc?.type"></dd>
                            </div>
                            <div>
                                <dt class="text-gray-500 dark:text-gray-400">Extension</dt>
                                <dd class="font-medium text-gray-900 dark:text-white" x-text="(previewDoc?.ext || '').toUpperCase() || '-'"></dd>
                            </div>
                            <div>
                                <dt class="text-gray-500 dark:text-gray-400">Preview</dt>
                                <dd class="font-medium text-gray-900 dark:text-white" x-text="previewDoc?.isImage ? 'Image' : (previewDoc?.isPdf ? 'PDF' : 'Unsupported')"></dd>
                            </div>
                        </dl>
                    </div>

                    <div class="mt-4 rounded-2xl border border-gray-200 p-4 dark:border-gray-800">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Note</p>
                        <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-300" x-text="previewDoc?.notes || 'No note provided.'"></p>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <div x-show="modals.delete" x-transition.opacity
        class="fixed inset-0 z-99999 flex items-center justify-center bg-black/50 px-4 py-6 backdrop-blur-sm"
        @click.self="closeModal('delete')" @keydown.escape.window="closeModal('delete')">
        <div x-show="modals.delete" x-transition.scale
            class="w-full max-w-md rounded-3xl border border-gray-200 bg-white p-6 shadow-2xl dark:border-gray-700 dark:bg-gray-900">
            <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-red-100 dark:bg-red-950/30">
                <svg class="h-7 w-7 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
            </div>
            <h3 class="text-center text-lg font-semibold text-gray-900 dark:text-white">Delete document?</h3>
            <p class="mt-2 text-center text-sm text-gray-500 dark:text-gray-400">
                Delete <span class="font-medium text-gray-700 dark:text-gray-300" x-text="deleteDoc?.name"></span>.
                This cannot be undone.
            </p>

            <form :action="deleteDoc?.action" method="POST" class="mt-6 flex justify-center gap-3">
                @csrf
                @method('DELETE')
                <button type="button" @click="closeModal('delete')"
                    class="rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit"
                    class="rounded-xl bg-red-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-red-700">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('documentsApp', () => ({
            modals: {
                upload: false,
                preview: false,
                delete: false,
            },
            dragOver: false,
            uploadFileName: '',
            previewDoc: null,
            deleteDoc: null,

            init(hasErrors) {
                if (hasErrors) {
                    this.openModal('upload');
                }
            },

            openModal(name) {
                this.modals[name] = true;
                document.body.style.overflow = 'hidden';
            },

            closeModal(name) {
                this.modals[name] = false;

                if (!Object.values(this.modals).some(Boolean)) {
                    document.body.style.overflow = '';
                }

                if (name === 'preview') {
                    setTimeout(() => {
                        this.previewDoc = null;
                    }, 200);
                }

                if (name === 'delete') {
                    setTimeout(() => {
                        this.deleteDoc = null;
                    }, 200);
                }
            },

            openPreview(document) {
                this.previewDoc = document;
                this.openModal('preview');
            },

            confirmDelete(document) {
                this.deleteDoc = document;
                this.openModal('delete');
            },

            setUploadFile(file) {
                this.uploadFileName = file ? file.name : '';
            },

            clearUploadFile() {
                this.uploadFileName = '';
                if (this.$refs.uploadInput) {
                    this.$refs.uploadInput.value = '';
                }
            },

            handleDrop(e) {
                this.dragOver = false;
                const file = e.dataTransfer.files[0];

                if (file) {
                    this.setUploadFile(file);
                    this.$refs.uploadInput.files = e.dataTransfer.files;
                }
            },
        }));
    });
</script>
@endpush

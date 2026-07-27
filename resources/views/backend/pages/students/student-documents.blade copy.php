@extends('backend.layouts.app')

@section('content')
<div x-data="studentDocuments()" x-cloak class="space-y-6">
    
    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-center gap-3">
            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-50 dark:bg-brand-900/20">
                <svg class="h-6 w-6 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-900 dark:text-white">Student Documents</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Upload and manage student documents</p>
            </div>
            @if($documents->count() > 0)
                <span class="inline-flex h-6 min-w-[1.5rem] items-center justify-center rounded-full bg-green-100 px-2 text-xs font-semibold text-green-700 dark:bg-green-900/30 dark:text-green-300">
                    {{ $documents->count() }}
                </span>
            @endif
        </div>

        @can('student.edit')
        <button type="button" @click="showUpload = !showUpload"
            class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            <span x-text="showUpload ? 'Hide Upload' : 'Upload Document'"></span>
        </button>
        @endcan
    </div>

    @can('student.edit')
    {{-- Upload Section --}}
    <div x-show="showUpload"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="p-6">
            <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">Upload New Documents</h3>

            <form action="{{ role_route('role.documents.store', ['student' => $student]) }}" method="POST" enctype="multipart/form-data" @submit="submitUpload($event)">
                @csrf

                {{-- Document Type --}}
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

                {{-- Drag & Drop Zone --}}
                <div class="mb-4">
                    <label class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-gray-700 dark:text-gray-300">
                        Upload Files <span class="text-red-500">*</span>
                        <span class="ml-1 font-normal normal-case tracking-normal text-gray-400">(PDF, JPG, PNG – Max 10MB each)</span>
                    </label>
                    
                    <div 
                        class="relative rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 p-8 transition-all duration-200 dark:border-gray-600 dark:bg-gray-700/30"
                        :class="{ 'border-brand-400 bg-brand-50/50 dark:border-brand-500 dark:bg-brand-900/10': dragActive }"
                        @dragover.prevent="dragActive = true"
                        @dragleave.prevent="dragActive = false"
                        @drop.prevent="handleDrop($event)">
                        
                        <input type="file" name="documents[]" multiple x-ref="fileInput" 
                            @change="handleFiles($event.target.files)"
                            accept=".pdf,.jpg,.jpeg,.png" required
                            class="absolute inset-0 z-10 h-full w-full cursor-pointer opacity-0">
                        
                        <div class="flex flex-col items-center justify-center text-center pointer-events-none">
                            <div class="mb-3 flex h-14 w-14 items-center justify-center rounded-full bg-white shadow-sm dark:bg-gray-700">
                                <svg class="h-7 w-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                                <span class="text-brand-600 dark:text-brand-400">Click to upload</span> or drag and drop
                            </p>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">PDF, JPG, PNG up to 10MB each</p>
                        </div>
                    </div>
                    @error('documents')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                    @error('documents.*')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- File Previews (Alpine managed) --}}
                <div x-show="uploadForm.files.length > 0" class="mb-4 space-y-2">
                    <template x-for="(file, index) in uploadForm.files" :key="index">
                        <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white p-3 dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg"
                                    :class="file.type === 'application/pdf' ? 'bg-red-50 text-red-600 dark:bg-red-900/20 dark:text-red-400' : 'bg-green-50 text-green-600 dark:bg-green-900/20 dark:text-green-400'">
                                    {{-- PDF Icon --}}
                                    <svg x-show="file.type === 'application/pdf'" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z"/>
                                    </svg>
                                    {{-- Image Icon --}}
                                    <svg x-show="file.type !== 'application/pdf'" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-white" x-text="file.name"></p>
                                    <p class="text-xs text-gray-500" x-text="formatSize(file.size)"></p>
                                </div>
                            </div>
                            <button type="button" @click="removeUploadFile(index)" 
                                class="rounded-md p-1.5 text-gray-400 hover:bg-red-50 hover:text-red-600 dark:hover:bg-red-900/20">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </template>
                </div>

                {{-- Notes --}}
                <div class="mb-4">
                    <x-form.textarea-input name="notes" label="Notes / Remarks" rows="2"
                        placeholder="Add any notes or remarks about these documents..."
                        :value="old('notes')" />
                </div>

                <div class="flex justify-end">
                    <button type="submit" :disabled="uploadForm.files.length === 0 || !uploadForm.type"
                        class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        Upload Document(s)
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endcan

    {{-- Documents Grid --}}
    <div class="space-y-8">
        @forelse($documentTypes as $typeLabel)
            @php
                $typeDocs = $groupedDocuments->get($typeLabel, collect());
            @endphp
            
            @if($typeDocs->count() > 0)
            <div>
                <div class="mb-3 flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 rounded-md bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-700 dark:bg-brand-900/30 dark:text-brand-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                        {{ $typeLabel }}
                    </span>
                    <span class="text-xs text-gray-400">{{ $typeDocs->count() }} file(s)</span>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($typeDocs as $doc)
                    <div class="group relative overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition hover:shadow-md dark:border-gray-700 dark:bg-gray-800">
                        
                        {{-- Preview Area --}}
                        <div class="relative flex h-32 items-center justify-center bg-gray-50 dark:bg-gray-700/50">
                            <div class="flex h-16 w-16 items-center justify-center rounded-2xl
                                {{ $doc->isPdf() ? 'bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400' : 'bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400' }}">
                                @if($doc->isPdf())
                                    <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z"/>
                                    </svg>
                                @else
                                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                @endif
                            </div>

                            {{-- Hover Actions --}}
                            <div class="absolute inset-0 flex items-center justify-center gap-2 bg-gray-900/60 opacity-0 backdrop-blur-sm transition-opacity group-hover:opacity-100">
                                <a href="{{ role_route('role.documents.download', ['student' => $student, 'document' => $doc]) }}"
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white text-gray-700 shadow-lg transition hover:bg-brand-50 hover:text-brand-600">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                </a>

                                @can('student.edit')
                                <button type="button" @click="openReplaceModal({{ $doc->id }}, '{{ $doc->name }}', '{{ $doc->document_type }}', '{{ $doc->notes }}')"
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white text-gray-700 shadow-lg transition hover:bg-amber-50 hover:text-amber-600">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                </button>

                                <button type="button" @click="confirmDelete({{ $doc->id }}, '{{ $doc->name }}')"
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white text-gray-700 shadow-lg transition hover:bg-red-50 hover:text-red-600">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                                @endcan
                            </div>
                        </div>

                        {{-- Info --}}
                        <div class="p-4">
                            <h4 class="truncate text-sm font-semibold text-gray-900 dark:text-white" title="{{ $doc->name }}">
                                {{ \Illuminate\Support\Str::limit($doc->name, 35) }}
                            </h4>
                            
                            @if($doc->notes)
                                <p class="mt-1 line-clamp-2 text-xs text-gray-500 dark:text-gray-400" title="{{ $doc->notes }}">
                                    {{ \Illuminate\Support\Str::limit($doc->notes, 60) }}
                                </p>
                            @endif

                            <div class="mt-3 flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                                <span>{{ $doc->formatted_size }}</span>
                                <span>{{ $doc->created_at?->format('d M Y') }}</span>
                            </div>

                            <div class="mt-2 flex items-center gap-1.5">
                                <div class="flex h-5 w-5 items-center justify-center rounded-full bg-gray-200 text-[10px] font-bold text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                    {{ strtoupper(substr($doc->uploadedBy?->name ?? 'U', 0, 1)) }}
                                </div>
                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $doc->uploadedBy?->name ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        @empty
            {{-- Empty State --}}
            <div class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-gray-300 bg-white py-16 dark:border-gray-700 dark:bg-gray-800">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
                    <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="mt-4 text-sm font-semibold text-gray-900 dark:text-white">No Documents</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">No documents have been uploaded for this student yet.</p>
                @can('student.edit')
                <button type="button" @click="showUpload = true" class="mt-4 text-sm font-medium text-brand-600 hover:text-brand-700 dark:text-brand-400">Upload your first document</button>
                @endcan
            </div>
        @endforelse
    </div>

    {{-- Replace Document Modal --}}
    @can('student.edit')
    <div x-show="replaceModal.open" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/50 backdrop-blur-sm dark:bg-gray-950/50"
        @keydown.escape.window="closeReplaceModal()"
        @click.self="closeReplaceModal()">
        
        <div x-show="replaceModal.open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="mx-4 w-full max-w-lg rounded-2xl border border-gray-200 bg-white p-6 shadow-2xl dark:border-gray-700 dark:bg-gray-800">
            
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Replace Document</h3>
                    <p class="mt-0.5 text-sm text-gray-500 dark:text-gray-400" x-text="replaceModal.docName"></p>
                </div>
                <button type="button" @click="closeReplaceModal()"
                    class="rounded-lg p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-600 dark:hover:bg-gray-700">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <form id="replaceForm" :action="replaceModal.action" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="replace_document_type" class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-gray-700 dark:text-gray-300">Document Type</label>
                        <select id="replace_document_type" name="document_type" x-model="replaceModal.docType"
                            class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 focus:border-brand-500 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            @foreach($documentTypes as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-gray-700 dark:text-gray-300">
                            New File <span class="text-red-500">*</span>
                            <span class="ml-1 font-normal normal-case tracking-normal text-gray-400">(PDF, JPG, PNG – Max 10MB)</span>
                        </label>
                        <div class="relative rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 p-4 transition hover:border-brand-400 dark:border-gray-600 dark:bg-gray-700/30">
                            <input type="file" name="document" required x-ref="replaceFileInput"
                                @change="replaceModal.newFileName = $event.target.files[0]?.name"
                                accept=".pdf,.jpg,.jpeg,.png"
                                class="absolute inset-0 z-10 h-full w-full cursor-pointer opacity-0">
                            <div class="flex items-center justify-center gap-2 text-sm text-gray-600 dark:text-gray-300">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                <span x-text="replaceModal.newFileName || 'Click to select new file'"></span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <x-form.textarea-input name="notes" label="Notes / Remarks" rows="2"
                            placeholder="Update notes (leave blank to keep existing)"
                            ::value="replaceModal.notes" />
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-2">
                    <button type="button" @click="closeReplaceModal()"
                        class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        Cancel
                    </button>
                    <button type="submit"
                        class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                        Replace Document
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endcan

    {{-- Delete Confirmation Modal --}}
    @can('student.edit')
    <div x-show="deleteModal.open" x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/50 backdrop-blur-sm dark:bg-gray-950/50"
        @keydown.escape.window="deleteModal.open = false">
        
        <div x-show="deleteModal.open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            class="mx-4 w-full max-w-sm rounded-2xl border border-gray-200 bg-white p-6 shadow-2xl dark:border-gray-700 dark:bg-gray-800">
            
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/20">
                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            
            <h3 class="mt-4 text-lg font-bold text-gray-900 dark:text-white">Delete Document?</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Are you sure you want to delete <span class="font-semibold text-gray-700 dark:text-gray-300" x-text="deleteModal.docName"></span>? This action cannot be undone.
            </p>
            
            <div class="mt-6 flex justify-end gap-2">
                <button type="button" @click="deleteModal.open = false"
                    class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                    Cancel
                </button>
                <form :action="deleteModal.action" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-700">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endcan

    {{-- Toast Notification --}}
    <div x-show="toast.show" x-transition
        class="fixed bottom-6 right-6 z-50 flex items-center gap-3 rounded-xl border border-gray-200 bg-white px-4 py-3 shadow-lg dark:border-gray-700 dark:bg-gray-800">
        <div class="flex h-8 w-8 items-center justify-center rounded-full"
            :class="toast.type === 'success' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600'">
            <svg x-show="toast.type === 'success'" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <svg x-show="toast.type === 'error'" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>
        <p class="text-sm font-medium text-gray-900 dark:text-white" x-text="toast.message"></p>
    </div>

</div>
@endsection

@can('student.edit')
@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('studentDocuments', () => ({
            showUpload: {{ $errors->any() ? 'true' : 'false' }},
            dragActive: false,
            uploadForm: {
                type: '{{ old('document_type', '') }}',
                files: [],
                notes: ''
            },
            replaceModal: {
                open: false,
                docId: null,
                docName: '',
                docType: '',
                notes: '',
                newFileName: '',
                action: ''
            },
            deleteModal: {
                open: false,
                docId: null,
                docName: '',
                action: ''
            },
            toast: {
                show: false,
                message: '',
                type: 'success'
            },

            handleDrop(e) {
                this.dragActive = false;
                const files = Array.from(e.dataTransfer.files);
                this.addFiles(files);
            },

            handleFiles(fileList) {
                const files = Array.from(fileList);
                this.addFiles(files);
            },

            addFiles(files) {
                const validTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
                files.forEach(file => {
                    if (validTypes.includes(file.type) && file.size <= 10 * 1024 * 1024) {
                        this.uploadForm.files.push(file);
                    }
                });
                // Sync to the actual file input for form submission
                this.syncFilesToInput();
            },

            removeUploadFile(index) {
                this.uploadForm.files.splice(index, 1);
                this.syncFilesToInput();
            },

            syncFilesToInput() {
                const dt = new DataTransfer();
                this.uploadForm.files.forEach(file => dt.items.add(file));
                this.$refs.fileInput.files = dt.files;
            },

            formatSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
            },

            submitUpload(event) {
                if (this.uploadForm.files.length === 0 || !this.uploadForm.type) {
                    event.preventDefault();
                    this.showToast('Please select a document type and at least one file.', 'error');
                    return;
                }
            },

            openReplaceModal(docId, docName, docType, notes) {
                const studentId = {{ $student->id }};
                const role = '{{ request()->route('role') }}';
                this.replaceModal = {
                    open: true,
                    docId: docId,
                    docName: docName,
                    docType: docType,
                    notes: notes || '',
                    newFileName: '',
                    action: `/${role}/students/${studentId}/documents/${docId}/replace`
                };
                this.$nextTick(() => {
                    this.$refs.replaceFileInput.value = '';
                });
            },

            closeReplaceModal() {
                this.replaceModal.open = false;
                setTimeout(() => {
                    this.replaceModal.action = '';
                    this.replaceModal.newFileName = '';
                }, 200);
            },

            confirmDelete(docId, docName) {
                const studentId = {{ $student->id }};
                const role = '{{ request()->route('role') }}';
                this.deleteModal = {
                    open: true,
                    docId: docId,
                    docName: docName,
                    action: `/${role}/students/${studentId}/documents/${docId}`
                };
            },

            showToast(message, type = 'success') {
                this.toast = { show: true, message, type };
                setTimeout(() => this.toast.show = false, 3000);
            }
        }));
    });

    // Show session messages as toasts
    @if(session('success'))
        document.addEventListener('alpine:initialized', () => {
            const el = document.querySelector('[x-data]');
            if (el && el.__x) {
                el.__x.getUnobservedData().showToast('{{ session('success') }}', 'success');
            }
        });
    @endif
    @if(session('error'))
        document.addEventListener('alpine:initialized', () => {
            const el = document.querySelector('[x-data]');
            if (el && el.__x) {
                el.__x.getUnobservedData().showToast('{{ session('error') }}', 'error');
            }
        });
    @endif
</script>
@endpush
@endcan

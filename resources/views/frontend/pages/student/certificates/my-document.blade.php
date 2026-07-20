@extends('frontend.pages.student.layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-[#0c0c0f] text-gray-900 dark:text-white transition-colors duration-300">

        <main class="max-w-5xl mx-auto px-6 py-10">

            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-5 mb-10">
                <div>
                    <h1 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-white mb-2">
                        My Documents
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 max-w-xl leading-relaxed">
                        Manage your uploaded documents. Share evidence of recognised prior learning,
                        prerequisite completions, or identity documents with Lia College and your Assessor.
                    </p>
                </div>

                <button onclick="openUploadModal()"
                    class="shrink-0 inline-flex items-center gap-2 px-5 py-2.5 bg-brand-600 hover:bg-brand-500 active:bg-brand-700 text-white text-sm font-medium rounded-lg transition-all active:scale-[0.97]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    Upload Document
                </button>
            </div>

            <!-- Documents List -->
            @if ($documents->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

                    @foreach ($documents as $document)
                        @php
                            $ext = strtolower($document->extension);
                            $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']);
                            $isPdf = $ext === 'pdf';
                            $isDoc = in_array($ext, ['doc', 'docx']);
                            $isSpreadsheet = in_array($ext, ['xls', 'xlsx', 'csv']);
                        @endphp

                        <div
                            class="group relative bg-white dark:bg-gray-900/80 border border-gray-200/80 dark:border-gray-800 rounded-2xl overflow-hidden transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-700 hover:shadow-xl hover:shadow-gray-200/40 dark:hover:shadow-black/30 hover:-translate-y-1">

                            <!-- Preview Area -->
                            <div class="relative aspect-[4/3] bg-gray-100 dark:bg-gray-800 overflow-hidden cursor-pointer"
                                onclick="openPreviewModal('{{ asset($document->file) }}', '{{ $document->name }}', '{{ $ext }}', {{ $document->id }})">

                                @if ($isImage)
                                    <!-- Image Preview -->
                                    <img src="{{ asset($document->file) }}" alt="{{ $document->name }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    <div
                                        class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-200">
                                    </div>
                                @elseif($isPdf)
                                    <!-- PDF Preview -->
                                    <div
                                        class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-red-50 to-orange-50 dark:from-red-900/20 dark:to-orange-900/20">
                                        <svg class="w-16 h-16 text-red-500 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3h4.5M9 3.75H6.375A2.625 2.625 0 003.75 6.375v11.25A2.625 2.625 0 006.375 20.25h11.25A2.625 2.625 0 0020.25 17.625V9.75L14.25 3.75H9z" />
                                        </svg>
                                        <span
                                            class="text-xs font-medium text-red-600 dark:text-red-400 uppercase tracking-wider">PDF</span>
                                    </div>
                                @else
                                    <!-- Generic File Preview -->
                                    <div
                                        class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-gray-100 to-gray-50 dark:from-gray-800 dark:to-gray-900">
                                        @if ($isDoc)
                                            <svg class="w-16 h-16 text-blue-500 mb-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3h4.5M9 3.75H6.375A2.625 2.625 0 003.75 6.375v11.25A2.625 2.625 0 006.375 20.25h11.25A2.625 2.625 0 0020.25 17.625V9.75L14.25 3.75H9z" />
                                            </svg>
                                            <span
                                                class="text-xs font-medium text-blue-600 dark:text-blue-400 uppercase tracking-wider">DOC</span>
                                        @elseif($isSpreadsheet)
                                            <svg class="w-16 h-16 text-emerald-500 mb-2" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3h4.5M9 3.75H6.375A2.625 2.625 0 003.75 6.375v11.25A2.625 2.625 0 006.375 20.25h11.25A2.625 2.625 0 0020.25 17.625V9.75L14.25 3.75H9z" />
                                            </svg>
                                            <span
                                                class="text-xs font-medium text-emerald-600 dark:text-emerald-400 uppercase tracking-wider">XLS</span>
                                        @else
                                            <svg class="w-16 h-16 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3h4.5M9 3.75H6.375A2.625 2.625 0 003.75 6.375v11.25A2.625 2.625 0 006.375 20.25h11.25A2.625 2.625 0 0020.25 17.625V9.75L14.25 3.75H9z" />
                                            </svg>
                                            <span
                                                class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ $ext }}</span>
                                        @endif
                                    </div>
                                @endif

                                <!-- Hover Overlay with View Icon -->
                                <div
                                    class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                    <div
                                        class="w-12 h-12 rounded-full bg-white/90 dark:bg-black/60 backdrop-blur-sm flex items-center justify-center shadow-lg">
                                        <svg class="w-5 h-5 text-gray-700 dark:text-white" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.25 12s3.75-6 9.75-6 9.75 6 9.75 6-3.75 6-9.75 6S2.25 12 2.25 12z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="p-4">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="min-w-0 flex-1">
                                        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 truncate"
                                            title="{{ $document->name }}">
                                            {{ $document->name }}
                                        </h3>

                                        <div class="flex items-center gap-2.5 mt-1.5">
                                            <span
                                                class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 border border-gray-200/60 dark:border-gray-700">
                                                {{ $ext }}
                                            </span>
                                            @if ($document->size)
                                                <span class="text-[11px] text-gray-400 dark:text-gray-500 font-medium">
                                                    {{ number_format($document->size / 1024 / 1024, 2) }} MB
                                                </span>
                                            @endif
                                        </div>

                                        <p class="mt-1.5 text-[11px] text-gray-400 dark:text-gray-500">
                                            {{ $document->created_at->format('d M Y') }}
                                        </p>
                                    </div>

                                    <!-- Actions Dropdown -->
                                    <div class="relative">
                                        <button type="button" onclick="toggleDocumentMenu({{ $document->id }})"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6.75h.008v.008H12V6.75zm0 5.25h.008v.008H12V12zm0 5.25h.008v.008H12v-.008z" />
                                            </svg>
                                        </button>

                                        <div id="document-menu-{{ $document->id }}"
                                            class="hidden absolute right-0 bottom-10 z-20 w-44 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-xl shadow-gray-200/30 dark:shadow-black/30 overflow-hidden ring-1 ring-black/5">

                                            <button
                                                onclick="openPreviewModal('{{ asset($document->file) }}', '{{ $document->name }}', '{{ $ext }}', {{ $document->id }})"
                                                class="w-full flex items-center gap-2.5 px-3.5 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors text-left">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.25 12s3.75-6 9.75-6 9.75 6 9.75 6-3.75 6-9.75 6S2.25 12 2.25 12z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                Preview
                                            </button>

                                            <a href="{{ asset($document->file) }}" download
                                                class="flex items-center gap-2.5 px-3.5 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 3v12m0 0l-4-4m4 4l4-4M4.5 21h15" />
                                                </svg>
                                                Download
                                            </a>

                                            <div class="border-t border-gray-100 dark:border-gray-700"></div>

                                            <button type="button"
                                                onclick="openDeleteModal(
        {{ $document->id }},
        @js($document->name)
    )"
                                                class="w-full flex items-center gap-2.5
           px-3.5 py-2.5
           text-sm text-red-600 dark:text-red-400
           hover:bg-red-50 dark:hover:bg-red-900/20
           transition-colors text-left">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>

                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @else
                <!-- Empty State -->
                <div
                    class="bg-white dark:bg-gray-900/80 border border-gray-200/80 dark:border-gray-800 rounded-2xl min-h-[420px] flex flex-col items-center justify-center text-center p-10 transition-all">

                    <div
                        class="w-16 h-16 rounded-2xl bg-gradient-to-br from-gray-100 to-gray-50 dark:from-gray-800 dark:to-gray-900 flex items-center justify-center mb-6 shadow-sm border border-gray-100 dark:border-gray-700/50">
                        <svg class="w-7 h-7 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                        </svg>
                    </div>

                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1.5">No documents yet</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-8 max-w-xs mx-auto leading-relaxed">
                        You haven't uploaded any documents. Upload your first document to get started.
                    </p>

                    <button onclick="openUploadModal()"
                        class="inline-flex items-center gap-2 px-5 py-2.5 border border-gray-300 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-600 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 text-sm font-medium rounded-lg transition-all active:scale-[0.97]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Upload Your First Document
                    </button>

                    <p class="mt-6 text-xs text-gray-400 dark:text-gray-600">
                        Supports PDF, JPG, PNG up to 10MB
                    </p>
                </div>
            @endif

        </main>
    </div>

    <!-- Upload Modal -->
    <div id="upload-document-modal" class="fixed inset-0 z-99999 hidden" aria-hidden="true">
        <div class="fixed inset-0 bg-black/40 backdrop-blur-sm transition-opacity" onclick="closeUploadModal()"></div>
        <div class="flex min-h-full items-center justify-center p-4">
            <div
                class="relative w-full max-w-lg bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Upload Document</h3>
                    <button type="button" onclick="closeUploadModal()"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors rounded-lg p-1 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-6">
                    <form action="{{ route('student.student-document') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-form.file-uploader name="document" label="Select Document" accept=".pdf,.jpg,.jpeg,.png" />
                        <input type="hidden" id="docIdUploadLibrary" name="docIdUploadLibrary" value="4250322">
                        <div
                            class="flex items-center justify-end gap-3 mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                            <button type="button" onclick="closeUploadModal()"
                                class="px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">Cancel</button>
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-colors shadow-sm">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Modal -->
    <div id="preview-modal" class="fixed inset-0 z-99999 hidden" aria-hidden="true">
        <div class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity" onclick="closePreviewModal()"></div>
        <div class="flex min-h-full items-center justify-center p-4">
            <div
                class="relative w-full max-w-4xl bg-white dark:bg-gray-900 rounded-2xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">
                <!-- Header -->
                <div
                    class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-gray-700 shrink-0">
                    <div class="min-w-0">
                        <h3 id="preview-title" class="text-lg font-semibold text-gray-900 dark:text-white truncate"></h3>
                        <p id="preview-meta" class="text-xs text-gray-500 dark:text-gray-400 mt-0.5"></p>
                    </div>
                    <div class="flex items-center gap-2 ml-4">
                        <a id="preview-download" href="#" download
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v12m0 0l-4-4m4 4l4-4M4.5 21h15" />
                            </svg>
                            Download
                        </a>
                        <button type="button" onclick="closePreviewModal()"
                            class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors rounded-lg p-1.5 hover:bg-gray-100 dark:hover:bg-gray-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Content -->
                <div class="flex-1 overflow-auto bg-gray-50 dark:bg-gray-950 p-4 flex items-center justify-center">
                    <img id="preview-image" src="" alt=""
                        class="max-w-full max-h-full object-contain rounded-lg shadow-lg hidden">
                    <iframe id="preview-pdf" src="" class="w-full h-full min-h-[60vh] rounded-lg hidden"
                        frameborder="0"></iframe>
                    <div id="preview-fallback" class="text-center hidden">
                        <div
                            class="w-24 h-24 rounded-2xl bg-gray-200 dark:bg-gray-800 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3h4.5M9 3.75H6.375A2.625 2.625 0 003.75 6.375v11.25A2.625 2.625 0 006.375 20.25h11.25A2.625 2.625 0 0020.25 17.625V9.75L14.25 3.75H9z" />
                            </svg>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mb-4">Preview not available for this file type
                        </p>
                        <a id="preview-download-fallback" href="#" download
                            class="inline-flex items-center gap-2 px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white text-sm font-medium rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v12m0 0l-4-4m4 4l4-4M4.5 21h15" />
                            </svg>
                            Download File
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="delete-modal" class="fixed inset-0 z-99999 hidden" aria-hidden="true">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeDeleteModal()"></div>
        <div class="flex min-h-full items-center justify-center p-4">
            <div
                class="relative w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 p-6 text-center">

                <div
                    class="w-14 h-14 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>

                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Delete Document</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                    Are you sure you want to delete <span id="delete-filename"
                        class="font-medium text-gray-700 dark:text-gray-300"></span>? This action cannot be undone.
                </p>
                <form id="delete-form" action="{{ route('student.student-document.destroy', $document) }}"
                    method="POST" class="flex items-center justify-center gap-3">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="closeDeleteModal()"
                        class="px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors shadow-sm">
                        Delete Document
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Upload Modal
        function openUploadModal() {
            document.getElementById('upload-document-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeUploadModal() {
            document.getElementById('upload-document-modal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Preview Modal
        function openPreviewModal(url, name, ext, id) {
            const modal = document.getElementById('preview-modal');
            const img = document.getElementById('preview-image');
            const pdf = document.getElementById('preview-pdf');
            const fallback = document.getElementById('preview-fallback');
            const title = document.getElementById('preview-title');
            const meta = document.getElementById('preview-meta');
            const downloadBtn = document.getElementById('preview-download');
            const downloadFallback = document.getElementById('preview-download-fallback');

            // Reset
            img.classList.add('hidden');
            pdf.classList.add('hidden');
            fallback.classList.add('hidden');

            title.textContent = name;
            meta.textContent = ext.toUpperCase() + ' Document';
            downloadBtn.href = url;
            downloadFallback.href = url;

            const isImage = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'].includes(ext.toLowerCase());
            const isPdf = ext.toLowerCase() === 'pdf';

            if (isImage) {
                img.src = url;
                img.alt = name;
                img.classList.remove('hidden');
            } else if (isPdf) {
                pdf.src = url;
                pdf.classList.remove('hidden');
            } else {
                fallback.classList.remove('hidden');
            }

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closePreviewModal() {
            document.getElementById('preview-modal').classList.add('hidden');
            document.getElementById('preview-pdf').src = ''; // Stop PDF loading
            document.body.style.overflow = '';
        }

        // Delete Modal
        function openDeleteModal(id, name) {
            const modal = document.getElementById('delete-modal');
            document.getElementById('delete-filename').textContent = name;
            document.getElementById('delete-form').action = `/student/documents/${id}`;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            document.getElementById('delete-modal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Dropdown
        function toggleDocumentMenu(id) {
            const menu = document.getElementById('document-menu-' + id);
            const isHidden = menu.classList.contains('hidden');
            document.querySelectorAll('[id^="document-menu-"]').forEach(el => el.classList.add('hidden'));
            if (isHidden) menu.classList.remove('hidden');
        }

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            if (!e.target.closest('[id^="document-menu-"]') && !e.target.closest(
                    'button[onclick^="toggleDocumentMenu"]')) {
                document.querySelectorAll('[id^="document-menu-"]').forEach(el => el.classList.add('hidden'));
            }
        });

        // Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeUploadModal();
                closePreviewModal();
                closeDeleteModal();
            }
        });
    </script>

@endsection

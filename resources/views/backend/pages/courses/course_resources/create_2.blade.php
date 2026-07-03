@extends('backend.layouts.app')

@section('content')
    <div class="form-container">

                        <div class="section-area">
                            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 space-y-6">

                                <!-- SECTION NAME -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-slate-700 tracking-wide uppercase">
                                        Section Name
                                    </label>
                                    <input type="text" :name="`sections[${sectionIndex}][section_name]`"
                                        x-model="section.section_name" placeholder="e.g., Section Name"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-0 focus:ring-brand-500 focus:border-brand-500 transition-all duration-200">
                                </div>

                                <!-- FIELD TYPES -->
                                <div class="space-y-3">
                                    <label class="block text-sm font-semibold text-slate-700 tracking-wide uppercase">
                                        Select Fields
                                    </label>
                                    <div class="flex flex-wrap gap-3">
                                        <!-- Text Option -->
                                        <label class="group relative flex items-center cursor-pointer">
                                            <input type="checkbox" value="text"
                                                :name="`sections[${sectionIndex}][field_types][]`"
                                                x-model="section.field_types" class="peer sr-only">
                                            <div
                                                class="flex items-center gap-3 px-5 py-3 bg-white border border-slate-200 rounded-xl peer-checked:border-brand-500 peer-checked:bg-brand-50 peer-checked:text-brand-700 hover:border-slate-300 transition-all duration-200">
                                                <svg class="w-5 h-5 text-slate-400 peer-checked:text-brand-600 transition-colors"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 6h16M4 12h16M4 18h7" />
                                                </svg>
                                                <span
                                                    class="font-medium text-slate-600 peer-checked:text-brand-700">Text</span>
                                                <svg class="w-5 h-5 text-brand-600 opacity-0 peer-checked:opacity-100 transition-opacity"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                        </label>

                                        <label class="group relative flex items-center cursor-pointer">
                                            <input type="checkbox" value="text"
                                                :name="`sections[${sectionIndex}][field_types][]`"
                                                x-model="section.field_types" class="peer sr-only">
                                            <div
                                                class="flex items-center gap-3 px-5 py-3 bg-white border border-slate-200 rounded-xl peer-checked:border-brand-500 peer-checked:bg-brand-50 peer-checked:text-brand-700 hover:border-slate-300 transition-all duration-200">
                                                <svg class="w-5 h-5 text-slate-400 peer-checked:text-brand-600 transition-colors"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 6h16M4 12h16M4 18h7" />
                                                </svg>
                                                <span
                                                    class="font-medium text-slate-600 peer-checked:text-brand-700">Link/Url</span>
                                                <svg class="w-5 h-5 text-brand-600 opacity-0 peer-checked:opacity-100 transition-opacity"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                        </label>

                                        <!-- File Option -->
                                        <label class="group relative flex items-center cursor-pointer">
                                            <input type="checkbox" value="file"
                                                :name="`sections[${sectionIndex}][field_types][]`"
                                                x-model="section.field_types" class="peer sr-only">
                                            <div
                                                class="flex items-center gap-3 px-5 py-3 bg-white border border-slate-200 rounded-xl peer-checked:border-brand-500 peer-checked:bg-brand-50 peer-checked:text-brand-700 hover:border-slate-300 transition-all duration-200">
                                                <svg class="w-5 h-5 text-slate-400 peer-checked:text-brand-600 transition-colors"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                                </svg>
                                                <span
                                                    class="font-medium text-slate-600 peer-checked:text-brand-700">File</span>
                                                <svg class="w-5 h-5 text-brand-600 opacity-0 peer-checked:opacity-100 transition-opacity"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row-area bg-white rounded-xl shadow-sm border border-slate-200 p-6 space-y-6 mt-5">
                                <div class="flex flex-col gap-3">
                                    {{-- Text --}}
                                    <x-form.input-text name="text" label="Text" value="{{ old('text') }}"
                                        placeholder="Enter Text..." />
                                    {{-- Link/URL --}}
                                    <x-form.input-text name="text" label="Text" value="{{ old('text') }}"
                                        placeholder="Enter Link/URL..." />
                                    <!-- FILE -->
                                    <div class="space-y-3">
                                        <x-form.file-uploader name="" label="File Uploader" />
                                        <div class="flex gap-6 mb-3">
                                            <label class="flex items-center gap-2">
                                                <input type="hidden"
                                                    :name="`sections[${sectionIndex}][rows][${rowIndex}][is_downloadable]`"
                                                    value="0">
                                                <input type="checkbox" value="1" checked
                                                    :name="`sections[${sectionIndex}][rows][${rowIndex}][is_downloadable]`">
                                                <span>Is Downloadable</span>
                                            </label>
                                            <label class="flex items-center gap-2">
                                                <input type="hidden"
                                                    :name="`sections[${sectionIndex}][rows][${rowIndex}][is_document_submission]`"
                                                    value="0">
                                                <input type="checkbox" value="1" checked
                                                    :name="`sections[${sectionIndex}][rows][${rowIndex}][is_document_submission]`">
                                                <span>Is Document Submission</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="row-action flex items-center justify-end gap-3 mt-4 pt-4 border-t border-slate-100">
                                    <button type="button"
                                        class="group inline-flex items-center gap-2 px-4 py-2.5 bg-white text-red-600 font-medium text-sm rounded-lg border border-red-200 hover:bg-red-50 hover:border-red-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-200">
                                        <svg class="w-4 h-4 text-red-500 group-hover:scale-110 transition-transform duration-200"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </button>

                                    <button type="button"
                                        class="group inline-flex items-center gap-2 px-4 py-2.5 bg-white text-indigo-600 font-medium text-sm rounded-lg border border-indigo-200 hover:bg-indigo-50 hover:border-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200">
                                        <svg class="w-4 h-4 text-indigo-500 group-hover:scale-110 transition-transform duration-200"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                                        </svg>
                                        Duplicate
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="section-actions">
                            <div
                                class="row-action flex items-center justify-start gap-3 mt-4 pt-4 border-t border-slate-100">
                                <button type="button"
                                    class="group inline-flex items-center gap-2 px-4 py-2.5 bg-white text-red-600 font-medium text-sm rounded-lg border border-red-200 hover:bg-red-50 hover:border-red-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-200">
                                    <svg class="w-4 h-4 text-red-500 group-hover:scale-110 transition-transform duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>

                                <button type="button"
                                    class="group inline-flex items-center gap-2 px-4 py-2.5 bg-white text-indigo-600 font-medium text-sm rounded-lg border border-indigo-200 hover:bg-indigo-50 hover:border-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200">
                                    <svg class="w-4 h-4 text-indigo-500 group-hover:scale-110 transition-transform duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                                    </svg>
                                    Duplicate
                                </button>
                            </div>

                        </div>

                    </div>
                    <div class="pt-6 border-t border-slate-200">
                        <button type="submit"
                            class="w-full group relative inline-flex items-center justify-center gap-2.5 px-8 py-3.5 bg-indigo-600 text-white font-semibold text-sm rounded-xl shadow-lg shadow-indigo-500/30 hover:bg-indigo-700 hover:shadow-indigo-500/40 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200">
                            <span>Save Resource</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </button>
                    </div>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Resource Manager</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }

        .field-chip {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .field-chip:active {
            transform: scale(0.96);
        }

        .section-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .section-card:hover {
            transform: translateY(-2px);
        }

        .row-card {
            transition: all 0.2s ease;
        }
        .row-card:hover {
            border-color: #c7d2fe;
        }

        .btn-primary {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px -4px rgba(79, 70, 229, 0.3);
        }
        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-danger {
            transition: all 0.2s ease;
        }
        .btn-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px -2px rgba(239, 68, 68, 0.2);
        }

        .input-field {
            transition: all 0.2s ease;
        }
        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .file-input::-webkit-file-upload-button {
            transition: all 0.2s ease;
        }
        .file-input:hover::-webkit-file-upload-button {
            background-color: #e0e7ff;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-in {
            animation: slideIn 0.3s ease forwards;
        }

        .checkbox-custom:checked + div {
            background-color: #eef2ff;
            border-color: #4f46e5;
            color: #4338ca;
        }

        .checkbox-custom:checked + div .check-icon {
            opacity: 1;
            transform: scale(1);
        }
    </style>
<base target="_blank">
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-gray-50 to-slate-100 font-sans text-slate-800 antialiased">

    <div x-data="resourceManager()" x-cloak class="mx-auto max-w-4xl px-4 py-12 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-10 text-center">
            <div class="mb-3 inline-flex items-center justify-center rounded-2xl bg-indigo-600 p-3 shadow-lg shadow-indigo-500/25">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Course Resources</h1>
            <p class="mt-2 text-base text-slate-500">Organize, manage, and structure your course materials efficiently</p>
        </div>

        <form @submit.prevent="saveResources()">

            <!-- Empty State -->
            <template x-if="sections.length === 0">
                <div class="animate-in rounded-3xl border-2 border-dashed border-slate-200 bg-white/60 p-16 text-center backdrop-blur-sm">
                    <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-700">No sections yet</h3>
                    <p class="mt-1 text-sm text-slate-400">Get started by adding your first resource section below</p>
                    <button type="button" @click="addSection()"
                        class="btn-primary mt-6 inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Add First Section
                    </button>
                </div>
            </template>

            <!-- Sections -->
            <template x-for="(section, sectionIndex) in sections" :key="section.id">
                <div class="section-card animate-in mb-6 overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm">

                    <!-- Section Header -->
                    <div class="flex items-center justify-between border-b border-slate-100 bg-gradient-to-r from-slate-50/80 to-white px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-100 text-xs font-bold text-indigo-700" x-text="sectionIndex + 1"></div>
                            <div>
                                <h3 class="text-base font-bold text-slate-800">Resource Section</h3>
                                <p class="text-xs text-slate-400">Section #<span x-text="sectionIndex + 1"></span></p>
                            </div>
                        </div>
                        <button type="button" @click="removeSection(section.id)"
                            x-show="sections.length > 1"
                            class="btn-danger inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Remove
                        </button>
                    </div>

                    <div class="space-y-6 p-6">

                        <!-- Section Name -->
                        <div class="space-y-2">
                            <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Section Name
                            </label>
                            <input type="text" :name="`sections[${sectionIndex}][section_name]`"
                                x-model="section.section_name" placeholder="e.g., Week 1 Materials, Assignments, References"
                                class="input-field w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm text-slate-800 placeholder-slate-400 outline-none focus:border-indigo-500 focus:bg-white">
                            <div x-show="errors[`sections.${sectionIndex}.section_name`]"
                                x-transition
                                class="flex items-center gap-1.5 text-xs font-medium text-red-500"
                                x-text="errors[`sections.${sectionIndex}.section_name`]">
                            </div>
                        </div>

                        <!-- Field Types -->
                        <div class="space-y-3">
                            <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                                Select Field Types
                            </label>
                            <div class="flex flex-wrap gap-2">
                                <label class="cursor-pointer">
                                    <input type="checkbox" value="text" :name="`sections[${sectionIndex}][field_types][]`"
                                        x-model="section.field_types" class="checkbox-custom peer hidden">
                                    <div class="field-chip flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-medium text-slate-600 hover:border-slate-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                                        </svg>
                                        <span>Text</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="check-icon h-4 w-4 text-indigo-600 opacity-0 transition-all duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="checkbox" value="link" :name="`sections[${sectionIndex}][field_types][]`"
                                        x-model="section.field_types" class="checkbox-custom peer hidden">
                                    <div class="field-chip flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-medium text-slate-600 hover:border-slate-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                        </svg>
                                        <span>Link</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="check-icon h-4 w-4 text-indigo-600 opacity-0 transition-all duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="checkbox" value="file" :name="`sections[${sectionIndex}][field_types][]`"
                                        x-model="section.field_types" class="checkbox-custom peer hidden">
                                    <div class="field-chip flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-medium text-slate-600 hover:border-slate-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                        </svg>
                                        <span>File</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="check-icon h-4 w-4 text-indigo-600 opacity-0 transition-all duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="checkbox" value="checkbox" :name="`sections[${sectionIndex}][field_types][]`"
                                        x-model="section.field_types" class="checkbox-custom peer hidden">
                                    <div class="field-chip flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-medium text-slate-600 hover:border-slate-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Checkbox</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="check-icon h-4 w-4 text-indigo-600 opacity-0 transition-all duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="checkbox" value="radio" :name="`sections[${sectionIndex}][field_types][]`"
                                        x-model="section.field_types" class="checkbox-custom peer hidden">
                                    <div class="field-chip flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-medium text-slate-600 hover:border-slate-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Radio</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="check-icon h-4 w-4 text-indigo-600 opacity-0 transition-all duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Rows -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <label class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                    Items (<span x-text="section.rows.length"></span>)
                                </label>
                            </div>

                            <template x-for="(row, rowIndex) in section.rows" :key="row.id">
                                <div class="row-card animate-in rounded-xl border border-slate-200 bg-slate-50/50 p-5">

                                    <!-- Row Header with number and remove -->
                                    <div class="mb-4 flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="flex h-6 w-6 items-center justify-center rounded-md bg-slate-200 text-[10px] font-bold text-slate-600" x-text="rowIndex + 1"></span>
                                            <span class="text-xs font-medium text-slate-400">Item</span>
                                        </div>
                                        <button type="button" @click="removeRow(section.id, row.id)"
                                            x-show="section.rows.length > 1"
                                            class="inline-flex items-center gap-1 rounded-lg px-2 py-1 text-xs font-medium text-slate-400 transition-colors hover:bg-red-50 hover:text-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Remove
                                        </button>
                                    </div>

                                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">

                                        <!-- TEXT -->
                                        <template x-if="section.field_types.includes('text')">
                                            <div class="space-y-1.5">
                                                <label class="text-xs font-medium text-slate-600">Name</label>
                                                <input type="text" :name="`sections[${sectionIndex}][rows][${rowIndex}][text]`"
                                                    x-model="row.text" placeholder="Enter item name"
                                                    class="input-field w-full rounded-lg border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 placeholder-slate-400 outline-none focus:border-indigo-500">
                                            </div>
                                        </template>

                                        <!-- LINK -->
                                        <template x-if="section.field_types.includes('link')">
                                            <div class="space-y-1.5">
                                                <label class="text-xs font-medium text-slate-600">URL</label>
                                                <div class="relative">
                                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                                        </svg>
                                                    </div>
                                                    <input type="url" :name="`sections[${sectionIndex}][rows][${rowIndex}][link]`"
                                                        x-model="row.link" placeholder="https://example.com"
                                                        class="input-field w-full rounded-lg border border-slate-200 bg-white py-2.5 pl-10 pr-3.5 text-sm text-slate-800 placeholder-slate-400 outline-none focus:border-indigo-500">
                                                </div>
                                            </div>
                                        </template>
                                    </div>

                                    <!-- FILE -->
                                    <template x-if="section.field_types.includes('file')">
                                        <div class="mt-4 space-y-3">
                                            <div class="space-y-1.5">
                                                <label class="text-xs font-medium text-slate-600">Upload File</label>
                                                <div class="relative">
                                                    <input type="file" :name="`sections[${sectionIndex}][rows][${rowIndex}][file]`"
                                                        class="file-input block w-full cursor-pointer rounded-lg border border-dashed border-slate-300 bg-white px-4 py-3 text-sm text-slate-500 file:mr-4 file:rounded-md file:border-0 file:bg-indigo-50 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-indigo-700 hover:border-indigo-300">
                                                    <input type="hidden" :name="`sections[${sectionIndex}][rows][${rowIndex}][existing_file]`" :value="row.file || ''">
                                                </div>
                                                <template x-if="row.file">
                                                    <a :href="`/${row.file}`" target="_blank"
                                                        class="inline-flex items-center gap-1.5 text-xs font-medium text-indigo-600 hover:text-indigo-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                                        </svg>
                                                        View Current File
                                                    </a>
                                                </template>
                                            </div>
                                            <div class="flex flex-wrap gap-4">
                                                <label class="flex cursor-pointer items-center gap-2">
                                                    <input type="hidden" :name="`sections[${sectionIndex}][rows][${rowIndex}][is_downloadable]`" value="0">
                                                    <input type="checkbox" value="1" x-model="row.is_downloadable"
                                                        :name="`sections[${sectionIndex}][rows][${rowIndex}][is_downloadable]`"
                                                        class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0">
                                                    <span class="text-xs font-medium text-slate-600">Downloadable</span>
                                                </label>
                                                <label class="flex cursor-pointer items-center gap-2">
                                                    <input type="hidden" :name="`sections[${sectionIndex}][rows][${rowIndex}][is_document_submission]`" value="0">
                                                    <input type="checkbox" value="1" x-model="row.is_document_submission"
                                                        :name="`sections[${sectionIndex}][rows][${rowIndex}][is_document_submission]`"
                                                        class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0">
                                                    <span class="text-xs font-medium text-slate-600">Document Submission</span>
                                                </label>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- CHECKBOX -->
                                    <template x-if="section.field_types.includes('checkbox')">
                                        <div class="mt-4 space-y-1.5">
                                            <label class="text-xs font-medium text-slate-600">Checkbox Label</label>
                                            <input type="text" :name="`sections[${sectionIndex}][rows][${rowIndex}][checkbox]`"
                                                x-model="row.checkbox" placeholder="Enter checkbox label"
                                                class="input-field w-full rounded-lg border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 placeholder-slate-400 outline-none focus:border-indigo-500">
                                        </div>
                                    </template>

                                    <!-- RADIO -->
                                    <template x-if="section.field_types.includes('radio')">
                                        <div class="mt-4 space-y-1.5">
                                            <label class="text-xs font-medium text-slate-600">Radio Label</label>
                                            <input type="text" :name="`sections[${sectionIndex}][rows][${rowIndex}][radio]`"
                                                x-model="row.radio" placeholder="Enter radio label"
                                                class="input-field w-full rounded-lg border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 placeholder-slate-400 outline-none focus:border-indigo-500">
                                        </div>
                                    </template>

                                </div>
                            </template>

                            <!-- Add Row Button -->
                            <button type="button" @click="addRow(section.id)"
                                class="btn-primary inline-flex w-full items-center justify-center gap-2 rounded-xl border-2 border-dashed border-indigo-200 bg-indigo-50/50 py-3 text-sm font-semibold text-indigo-600 transition-all hover:border-indigo-400 hover:bg-indigo-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                                Add Item
                            </button>
                        </div>

                    </div>
                </div>
            </template>

            <!-- Add Section Button -->
            <div x-show="sections.length > 0" class="mt-6">
                <button type="button" @click="addSection()"
                    class="btn-primary inline-flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3.5 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New Section
                </button>
            </div>

            <!-- Save Button -->
            <div x-show="sections.length > 0" class="mt-8">
                <button type="submit"
                    class="btn-primary inline-flex w-full items-center justify-center gap-2 rounded-xl bg-slate-900 px-6 py-4 text-sm font-bold text-white shadow-xl shadow-slate-900/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Save All Resources
                </button>
            </div>

        </form>
    </div>

    <script>
        function resourceManager() {
            return {
                sections: [
                    {
                        id: Date.now(),
                        section_name: '',
                        field_types: [],
                        rows: [
                            { id: Date.now() + 1, text: '', link: '', file: '', is_downloadable: false, is_document_submission: false, checkbox: '', radio: '' }
                        ]
                    }
                ],
                errors: {},

                addSection() {
                    this.sections.push({
                        id: Date.now(),
                        section_name: '',
                        field_types: [],
                        rows: [
                            { id: Date.now() + 1, text: '', link: '', file: '', is_downloadable: false, is_document_submission: false, checkbox: '', radio: '' }
                        ]
                    });
                },

                removeSection(id) {
                    if (this.sections.length > 1) {
                        this.sections = this.sections.filter(s => s.id !== id);
                    }
                },

                addRow(sectionId) {
                    const section = this.sections.find(s => s.id === sectionId);
                    if (section) {
                        section.rows.push({
                            id: Date.now(),
                            text: '',
                            link: '',
                            file: '',
                            is_downloadable: false,
                            is_document_submission: false,
                            checkbox: '',
                            radio: ''
                        });
                    }
                },

                removeRow(sectionId, rowId) {
                    const section = this.sections.find(s => s.id === sectionId);
                    if (section && section.rows.length > 1) {
                        section.rows = section.rows.filter(r => r.id !== rowId);
                    }
                },

                saveResources() {
                    // Validation logic here
                    this.errors = {};
                    let hasErrors = false;

                    this.sections.forEach((section, index) => {
                        if (!section.section_name.trim()) {
                            this.errors[`sections.${index}.section_name`] = 'Section name is required';
                            hasErrors = true;
                        }
                    });

                    if (!hasErrors) {
                        alert('Resources saved successfully!');
                    }
                }
            }
        }
    </script>
</body>
</html>
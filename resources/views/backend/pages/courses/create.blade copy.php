@extends('backend.layouts.app')

@section('content')
 

    <form x-data="courseBuilder({{ \Illuminate\Support\Js::from($initialSections) }})" @submit.prevent="submitForm($event)"
        action="{{ role_route('role.resources.store', ['course' => $course]) }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

            <div class="lg:col-span-8 space-y-6">



                {{-- Course Information --}}
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">

                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Course Resources: {{ $course->name }}
                        </h2>

                    </div>

                    <div class="p-5 space-y-5">
                        <div class="">
                            <input type="hidden" name="category_id" value="{{ $category->id ?? '' }}">

                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-medium text-gray-600">Course Section Name</label>
                                <input type="text" name="name"
                                    value="{{ old('name', $category->name ?? '') }}" placeholder="Enter course section name"
                                    class="input-field w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500">
                            </div>

                        </div>

                        <div>
                            <!-- Empty State -->
                            <template x-if="sections.length === 0">
                                <div
                                    class="animate-in rounded-3xl border-2 border-dashed border-gray-200 bg-gray-50/60 p-16 text-center">
                                    <div
                                        class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-700">No sections yet</h3>
                                    <p class="mt-1 text-sm text-gray-400">Get started by adding your first resource section
                                        below</p>
                                    <button type="button" @click="addSection()"
                                        class="btn-primary mt-6 inline-flex items-center gap-2 rounded-xl bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-brand-500/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                        </svg>
                                        Add First Section
                                    </button>
                                </div>
                            </template>

                            <!-- ALL SECTIONS -->
                            <template x-for="(section, sectionIndex) in sections" :key="section.id">

                                <div
                                    class="section-card animate-in mb-6 overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                                    <!-- Section Header -->
                                    <div
                                        class="flex items-center justify-between border-b border-gray-100 bg-gradient-to-r from-gray-50/80 to-white px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700"
                                                x-text="sectionIndex + 1"></div>
                                            <div>
                                                <h3 class="text-base font-bold text-gray-800">Resource Section</h3>
                                                <p class="text-xs text-gray-400">Section #<span
                                                        x-text="sectionIndex + 1"></span></p>
                                            </div>
                                        </div>
                                        <button type="button" @click="removeSection(section.id)"
                                            x-show="sections.length > 1"
                                            class="btn-danger inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Remove
                                        </button>
                                    </div>

                                    <div class="space-y-6 p-6">

                                        <!-- SECTION NAME -->
                                        <div class="space-y-2">
                                            <label
                                                class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Section Name
                                            </label>
                                            <input type="text" :name="`sections[${sectionIndex}][section_name]`"
                                                x-model="section.section_name"
                                                placeholder="e.g., Week 1 Materials, Assignments, References"
                                                class="input-field w-full rounded-xl border border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 focus:bg-white">
                                            <div x-show="errors[`sections.${sectionIndex}.section_name`]" x-transition
                                                class="flex items-center gap-1.5 text-xs font-medium text-red-500"
                                                x-text="errors[`sections.${sectionIndex}.section_name`]">
                                            </div>
                                        </div>


                                      


                                        <!-- ROWS -->
                                        <div class="space-y-4">
                                           

                                        </div>

                                    </div>
                                </div>

                            </template>

                            <!-- ADD SECTION -->
                            <div class="flex justify-between flex-col md:flex-row md:gap-10">

                                <div x-show="sections.length > 0" class="mt-6 w-full md:w-1/2 ">
                                    <button type="button" @click="addSection()"
                                        class="btn-primary inline-flex w-full items-center justify-center gap-2 border border-brand-600 rounded-xl bg-brand-50 px-5 py-3.5 text-sm font-semibold text-brand-600 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Add New Section
                                    </button>
                                </div>

                                <button type="submit" x-show="sections.length > 0"
                                    class="btn-primary mt-6 inline-flex w-full md:w-1/2 items-center justify-center gap-2 rounded-xl bg-brand-600 px-6 py-4 text-sm font-bold text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Save Resources
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4">


            </div>
        </div>
    </form>
    @if ($errors->any())
        <div class="bg-red-100 p-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script>
        function courseBuilder(initialSections = []) {
            const normalizedSections = initialSections.map(section => ({
                ...section,
                field_types: section.field_types || [],
                rows: (section.rows || []).map(row => ({
                    text: '',
                    file: '',
                    checkbox: '',
                    radio: '',
                    is_downloadable: true,
                    is_document_submission: true,
                    ...row,
                })),
            }));

            const maxSectionId = normalizedSections.reduce((max, section) => Math.max(max, Number(section.id) || 0), 0);
            const maxRowId = normalizedSections.flatMap(section => section.rows)
                .reduce((max, row) => Math.max(max, Number(row.id) || 0), 0);
            const hasInitialSections = normalizedSections.length > 0;

            return {

                errors: {},

                sectionCounter: maxSectionId + (hasInitialSections ? 1 : 2),
                rowCounter: maxRowId + (hasInitialSections ? 1 : 2),

                sections: hasInitialSections ? normalizedSections : [{
                    id: maxSectionId + 1,
                    section_name: '',
                    field_types: [],
                    rows: [{
                        id: maxRowId + 1,
                        text: '',
                        file: '',
                        checkbox: '',
                        radio: '',
                        is_downloadable: true,
                        is_document_submission: true,
                    }]
                }],

                async submitForm(event) {

                    this.errors = {};

                    const form = event.target;

                    const response = await fetch(
                        form.action, {
                            method: 'POST',
                            body: new FormData(form),
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        }
                    );

                    const data = await response.json();

                    if (response.status === 422) {

                        Object.keys(data.errors).forEach(key => {
                            this.errors[key] = data.errors[key][0];
                        });

                        return;
                    }

                    if (response.ok) {

                        window.location.href = data.redirect;
                    }
                },

                addSection() {

                    this.sections.push({
                        id: this.sectionCounter++,
                        section_name: '',
                        field_types: [],
                        rows: [{
                            id: this.rowCounter++,
                            text: '',
                            file: '',
                            checkbox: '',
                            radio: '',
                            is_downloadable: true,
                            is_document_submission: true,
                        }]
                    });

                },

                removeSection(sectionId) {

                    this.sections = this.sections.filter(
                        section => section.id !== sectionId
                    );

                },

                addRow(sectionId) {

                    const section = this.sections.find(
                        section => section.id === sectionId
                    );

                    if (!section) return;

                    section.rows.push({
                        id: this.rowCounter++,
                        text: '',
                        file: '',
                        checkbox: '',
                        radio: '',
                        is_downloadable: true,
                        is_document_submission: true,
                    });

                },

                removeRow(sectionId, rowId) {

                    const section = this.sections.find(
                        section => section.id === sectionId
                    );

                    if (!section) return;

                    section.rows = section.rows.filter(
                        row => row.id !== rowId
                    );

                }

            };
        }
    </script>
@endsection

<style>
    [x-cloak] {
        display: none !important;
    }

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
        from {
            opacity: 0;
            transform: translateY(8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-in {
        animation: slideIn 0.3s ease forwards;
    }

    /* .checkbox-custom:checked+div {
        background-color: #eef2ff;
        border-color: #4f46e5;
        color: #4338ca;
    } */
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

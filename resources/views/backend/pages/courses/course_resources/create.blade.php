@extends('backend.layouts.app')

@section('content')
    @php
        $initialSections = $course->sections->map(function ($section) {
            return [
                'id' => $section->id,
                'section_name' => $section->section_name,
                'field_types' => $section->field_types ?? [],
                'rows' => $section->rows->map(function ($row) {
                    return [
                        'id' => $row->id,
                        'text' => $row->data['text'] ?? '',
                        'file' => $row->data['file'] ?? '',
                        'checkbox' => $row->data['checkbox'] ?? '',
                        'radio' => $row->data['radio'] ?? '',
                        'is_downloadable' => $row->is_downloadable,
                        'is_document_submission' => $row->is_document_submission,
                    ];
                })->values(),
            ];
        })->values();
    @endphp

    <form x-data="courseBuilder({{ \Illuminate\Support\Js::from($initialSections) }})" @submit.prevent="submitForm($event)" action="{{ role_route('role.resources.store', ['course' => $course]) }}"
        method="POST" enctype="multipart/form-data">

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
                        <div>

                            <!-- ALL SECTIONS -->
                            <template x-for="(section, sectionIndex) in sections" :key="section.id">

                                <div class="border rounded p-5 mb-6 bg-gray-50">

                                    <!-- SECTION NAME -->
                                    <div class="mb-4">

                                        <label>Section Name</label>

                                        <input type="text" :name="`sections[${sectionIndex}][section_name]`"
                                            x-model="section.section_name" class="border rounded w-full p-2">

                                    </div>


                                    <!-- FIELD TYPES -->
                                    <div class="mb-4">

                                        <label>Select Fields</label>

                                        <div class="flex gap-4 mt-2">

                                            <label>
                                                <input type="checkbox" value="text"
                                                    :name="`sections[${sectionIndex}][field_types][]`"
                                                    x-model="section.field_types">
                                                Text
                                            </label>

                                            <label>
                                                <input type="checkbox" value="file"
                                                    :name="`sections[${sectionIndex}][field_types][]`"
                                                    x-model="section.field_types">
                                                File
                                            </label>

                                            <label>
                                                <input type="checkbox" value="checkbox"
                                                    :name="`sections[${sectionIndex}][field_types][]`"
                                                    x-model="section.field_types">
                                                Checkbox
                                            </label>

                                            <label>
                                                <input type="checkbox" value="radio"
                                                    :name="`sections[${sectionIndex}][field_types][]`"
                                                    x-model="section.field_types">
                                                Radio
                                            </label>

                                        </div>

                                    </div>


                                    <!-- ROWS -->
                                    <template x-for="(row, rowIndex) in section.rows" :key="row.id">

                                        <div class="border p-4 rounded mb-4 bg-white">

                                            <!-- TEXT -->
                                            <template x-if="section.field_types.includes('text')">

                                                <div class="mb-3">

                                                    <label>Text</label>

                                                    <input type="text"
                                                        :name="`sections[${sectionIndex}][rows][${rowIndex}][text]`"
                                                        x-model="row.text"
                                                        class="border rounded w-full p-2">

                                                </div>

                                            </template>


                                            <!-- FILE -->

                                            <template x-if="section.field_types.includes('file')">

                                                <div class="space-y-3">

                                                    <div>
                                                        <label class="block mb-1 font-medium">File</label>

                                                        <input type="file"
                                                            :name="`sections[${sectionIndex}][rows][${rowIndex}][file]`"
                                                            class="border rounded w-full p-2">
                                                        <input type="hidden"
                                                            :name="`sections[${sectionIndex}][rows][${rowIndex}][existing_file]`"
                                                            :value="row.file || ''">
                                                        <template x-if="row.file">
                                                            <a :href="`/${row.file}`" target="_blank"
                                                                class="mt-1 inline-block text-sm text-brand-600 hover:text-brand-700">
                                                                View current file
                                                            </a>
                                                        </template>
                                                    </div>
                                                    <div class="flex flex-col gap-2 mb-3">
                                                        <label class="flex items-center gap-2">
                                                            <input type="hidden"
                                                                :name="`sections[${sectionIndex}][rows][${rowIndex}][is_downloadable]`"
                                                                value="0">
                                                            <input type="checkbox" value="1"
                                                                x-model="row.is_downloadable"
                                                                :name="`sections[${sectionIndex}][rows][${rowIndex}][is_downloadable]`">
                                                            <span>Is Downloadable</span>

                                                        </label>

                                                        <label class="flex items-center gap-2">
                                                            <input type="hidden"
                                                                :name="`sections[${sectionIndex}][rows][${rowIndex}][is_document_submission]`"
                                                                value="0">
                                                            <input type="checkbox" value="1"
                                                                x-model="row.is_document_submission"
                                                                :name="`sections[${sectionIndex}][rows][${rowIndex}][is_document_submission]`">
                                                            <span>Is Document Submission</span>

                                                        </label>

                                                    </div>

                                                </div>

                                            </template>

                                            <!-- CHECKBOX -->
                                            <template x-if="section.field_types.includes('checkbox')">
                                                <div class="mb-3">
                                                    <label>Checkbox Label</label>
                                                    <input type="text"
                                                        :name="`sections[${sectionIndex}][rows][${rowIndex}][checkbox]`"
                                                        x-model="row.checkbox" class="border rounded w-full p-2">
                                                </div>
                                            </template>

                                            <!-- RADIO -->
                                            <template x-if="section.field_types.includes('radio')">
                                                <div class="mb-3">
                                                    <label>Radio Label</label>
                                                    <input type="text"
                                                        :name="`sections[${sectionIndex}][rows][${rowIndex}][radio]`"
                                                        x-model="row.radio" class="border rounded w-full p-2">
                                                </div>
                                            </template>

                                            <!-- REMOVE ROW -->
                                            <button type="button" @click="removeRow(section.id, row.id)"
                                                class="bg-red-500 text-white px-4 py-2 rounded ">
                                                Remove Row
                                            </button>

                                        </div>

                                    </template>

                                    <!-- ADD ROW -->
                                    <button type="button" @click="addRow(section.id)"
                                        class="bg-blue-500 text-white px-4 py-2 rounded">
                                        Add More Row
                                    </button>

                                    <!-- REMOVE SECTION -->
                                    <button type="button" @click="removeSection(section.id)"
                                        class="bg-red-700 text-white px-4 py-2 rounded ml-2">
                                        Remove Section
                                    </button>

                                </div>
                                <div x-show="errors[`sections.${sectionIndex}.section_name`]"
                                    class="text-red-500 text-sm mt-1"
                                    x-text="errors[`sections.${sectionIndex}.section_name`]">
                                </div>

                            </template>

                            <!-- ADD SECTION -->
                            <button type="button" @click="addSection()"
                                class="bg-green-600 text-white px-5 py-3 rounded">
                                Add New Section
                            </button>
                        </div>
                        <button type="submit" class="bg-black text-white px-5 py-3 rounded mt-6">
                            Save Resources
                        </button>
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

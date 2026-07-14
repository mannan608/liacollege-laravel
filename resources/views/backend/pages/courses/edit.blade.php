@extends('backend.layouts.app')

@php
    $oldIncludes = old('includes', $course->includes->pluck('title')->all());

    if (!is_array($oldIncludes)) {
        $oldIncludes = [];
    }

    $includeRows = collect($oldIncludes)
        ->map(function ($include, $index) {
            if (is_array($include)) {
                $include = $include['title'] ?? '';
            }

            return [
                'id' => $index + 1,
                'title' => trim((string) $include),
            ];
        })
        ->filter(fn ($row) => $row['title'] !== '')
        ->values()
        ->all();

    if (empty($includeRows)) {
        $includeRows = [
            [
                'id' => 1,
                'title' => '',
            ],
        ];
    }
@endphp

@section('content')
    <form x-data="courseForm({
        includeRows: @json($includeRows),
        includesCpr: {{ old('includes_cpr', $course->includes_cpr) ? 'true' : 'false' }}
    })" action="{{ role_route('role.courses.update', ['course' => $course->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
            <div class="lg:col-span-8 space-y-6">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Course Information
                        </h2>
                    </div>

                    <div class="p-5 space-y-5">
                        <div class="grid grid-cols-1 gap-5">
                            <x-form.input-text name="name" label="Course Name"
                                value="{{ old('name', $course->name) }}" placeholder="Enter Course Name..." />

                            <x-form.input-text name="code" label="Course Code"
                                value="{{ old('code', $course->code) }}" placeholder="Enter Course Code..." />

                            <x-form.input-text name="cricos" label="Cricos No"
                                value="{{ old('cricos', $course->cricos) }}" placeholder="Enter Cricos No..." />
                        </div>

                        <x-form.file-uploader name="thumbnail" label="Thumbnail" accept="image/*"
                            :existing="$course->thumbnail ? asset($course->thumbnail) : null" />

                        <x-form.textarea-input name="description" label="Description" rows="5"
                            placeholder="Enter Course description..." :value="old('description', $course->description)" />
                    </div>
                </div>

                <div x-show="checked" x-transition x-cloak
                    class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Course Includes
                        </h2>
                    </div>

                    <div class="p-5 space-y-4">
                        <div class="space-y-4">
                            <template x-for="(row, index) in includeRows" :key="row.id">
                                <div class="flex items-center gap-3">
                                    <div class="flex-1">
                                        <input type="text" :name="`includes[${index}][title]`" x-model="row.title"
                                            :disabled="!checked" placeholder="Enter course include"
                                            class="input-field w-full rounded-xl border border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 focus:bg-white">
                                    </div>

                                    <button type="button" @click="removeIncludeRow(row.id)" x-show="includeRows.length > 1"
                                        class="inline-flex items-center justify-center rounded-lg border border-red-200 bg-red-50 p-2.5 text-red-600 hover:bg-red-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>

                        <button type="button" @click="addIncludeRow()"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-dashed border-brand-200 bg-brand-50/50 py-3 text-sm font-semibold text-brand-600 transition-all hover:border-brand-400 hover:bg-brand-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Include
                        </button>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-6">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Category
                        </h2>
                    </div>
                    <div class="p-5 space-y-5">
                        <x-form.select-input name="course_category_id" label="Category"
                            value="{{ old('course_category_id', $course->course_category_id) }}" :options="$categories" />

                        <x-form.select-input name="status" label="Status" :options="[
                            'active' => 'Active',
                            'inactive' => 'Inactive',
                        ]" value="{{ old('status', $course->status) }}" />
                    </div>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Course Details
                        </h2>
                    </div>

                    <div class="p-5 space-y-4">
                        <x-form.input-text name="price" label="Price" type="number" step="0.01"
                            value="{{ old('price', $course->price) }}" placeholder="Enter Price..." />

                        <x-form.input-text name="duration" label="Duration"
                            value="{{ old('duration', $course->duration) }}" placeholder="3 Hours" />

                        <div class="flex items-center gap-2">
                            <input type="hidden" name="includes_cpr" value="0">
                            <input type="checkbox" name="includes_cpr" id="includes_cpr" value="1" x-model="includesCpr"
                                @change="checked = includesCpr"
                                class="h-4 w-4 rounded border-gray-300 text-brand-600 focus:ring-brand-500"
                                {{ old('includes_cpr', $course->includes_cpr) ? 'checked' : '' }}>
                            <label for="includes_cpr" class="text-sm font-medium text-gray-700">Include CPR</label>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">
                    Update Course
                </button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
    function courseForm(state = {}) {
        return {
            includesCpr: state.includesCpr ?? false,
            checked: state.includesCpr ?? false,
            includeRows: Array.isArray(state.includeRows) && state.includeRows.length ? state.includeRows : [{ id: 1, title: '' }],
            nextId: Array.isArray(state.includeRows) && state.includeRows.length
                ? Math.max(...state.includeRows.map((row) => row.id || 0)) + 1
                : 2,

            addIncludeRow() {
                this.includeRows.push({
                    id: this.nextId++,
                    title: '',
                });
            },

            removeIncludeRow(id) {
                if (this.includeRows.length <= 1) {
                    return;
                }

                this.includeRows = this.includeRows.filter((row) => row.id !== id);
            }
        };
    }
    </script>
@endpush

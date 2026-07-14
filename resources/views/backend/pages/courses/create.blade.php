@extends('backend.layouts.app')

@section('content')
    <form x-data="courseForm()" action="{{ role_route('role.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

            <div class="lg:col-span-8 space-y-6">

                {{-- Course Information --}}
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Course Information
                        </h2>
                    </div>

                    <div class="p-5 space-y-5">

                        <div class="grid grid-cols-1 gap-5">
                            {{-- Name --}}
                            <x-form.input-text name="name" label="Course Name" value="{{ old('name') }}"
                                placeholder="Enter Course Name..." />

                            {{-- Code --}}
                            <x-form.input-text name="code" label="Course Code" value="{{ old('code') }}"
                                placeholder="Enter Course Code..." />

                            {{-- Cricos --}}
                            <x-form.input-text name="cricos" label="Cricos No" value="{{ old('cricos') }}"
                                placeholder="Enter Cricos No..." />
                        </div>

                        <x-form.file-uploader name="thumbnail" label="Thumbnail" accept="image/*" />

                        <x-form.textarea-input name="description" label="Description" rows="5"
                            placeholder="Enter Course description..." :value="old('description')" />
                    </div>
                    <div class="flex justify-end p-5">
                        <button type="submit"
                            class="w-fit rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">
                            Create Course
                        </button>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-6">

                {{-- Category --}}
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Category
                        </h2>
                    </div>
                    <div class="p-5">
                        <x-form.select-input name="course_category_id" label="Category" value="" :options="$categories" />
                    </div>
                </div>

                {{-- Course Details --}}
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Course Details
                        </h2>
                    </div>

                    <div class="p-5 space-y-4">

                        <x-form.input-text name="price" label="Price" type="number" step="0.01"
                            value="{{ old('price') }}" placeholder="Enter Price..." />

                        <x-form.input-text name="duration" label="Duration" value="{{ old('duration') }}"
                            placeholder="3 Hours" />

                        {{-- CPR Checkbox - use x-model instead of isolated x-data --}}
                        <div class="flex items-center gap-2">
                            <input type="hidden" name="includes_cpr" value="0">
                            <input type="checkbox" name="includes_cpr" id="includes_cpr" value="1"
                                x-model="includesCpr"
                                class="h-4 w-4 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                            <label for="includes_cpr" class="text-sm font-medium text-gray-700">Includes CPR</label>
                        </div>

                        {{-- Dynamic CPR Section --}}
                        <div x-show="includesCpr" x-transition x-cloak
                            class="mt-4 rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">

                            <div class="mb-4 flex items-center justify-between">
                                <h3 class="text-base font-bold text-gray-800 dark:text-white">CPR Details</h3>
                                <span class="text-xs text-gray-400" x-text="includeRows.length + ' item(s)'"></span>
                            </div>

                            <div class="space-y-4">
                                <template x-for="(row, index) in includeRows" :key="row.id">
                                    <div class="flex items-center gap-3 animate-in">
                                        <div class="flex-1">
                                            <input type="text" :name="`includes[${index}][title]`" x-model="row.title"
                                                placeholder="Enter CPR detail"
                                                class="input-field w-full rounded-xl border border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500 focus:bg-white">
                                        </div>

                                        <button type="button" @click="removeCprRow(row.id)" x-show="includeRows.length > 1"
                                            class="btn-danger inline-flex items-center justify-center rounded-lg border border-red-200 bg-red-50 p-2.5 text-red-600 hover:bg-red-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </template>

                                <button type="button" @click="addCprRow()"
                                    class="btn-primary inline-flex w-full items-center justify-center gap-2 rounded-xl border border-dashed border-brand-200 bg-brand-50/50 py-3 text-sm font-semibold text-brand-600 transition-all hover:border-brand-400 hover:bg-brand-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add CPR Item
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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
@endsection

<script>
    function courseForm() {
        return {
            includesCpr: {{ old('includes_cpr') ? 'true' : 'false' }},
            includeRows: @json(old('includes', [['id' => 1, 'title' => '']])),
            cprCounter: 2,

            init() {
                // If there are old values, set counter accordingly
                if (this.includeRows.length > 0) {
                    this.cprCounter = Math.max(...this.includeRows.map(r => r.id || 0)) + 1;
                }
            },

            addCprRow() {
    this.includeRows.push({
        id: this.cprCounter++,
        title: ''
    });
},

            removeCprRow(id) {
                this.includeRows = this.includeRows.filter(row => row.id !== id);
            }
        };
    }
</script>
@extends('backend.layouts.app')

@section('content')
    <form action="{{ role_route('role.course-slots.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
            <div class="space-y-6 lg:col-span-8">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Course Slot Information</h2>
                    </div>

                    <div class="p-5 space-y-5">
                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                            <x-form.select-input name="course_id" label="Course" value="{{ old('course_id') }}" :options="$courses->pluck('name', 'id')->toArray()" />
                            <x-form.select-input name="training_center_id" label="Training Center" value="{{ old('training_center_id') }}" :options="$trainingCenters->pluck('name', 'id')->toArray()" />
                        </div>

                        <x-form.input-text name="title" label="Slot Title" value="{{ old('title') }}" placeholder="Enter slot title..." />

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                            <x-form.input-text name="training_date" label="Training Date" type="date" value="{{ old('training_date') }}" />
                            <x-form.input-text name="start_time" label="Start Time" type="time" value="{{ old('start_time') }}" />
                            <x-form.input-text name="end_time" label="End Time" type="time" value="{{ old('end_time') }}" />
                        </div>

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                            <x-form.input-text name="booking_open_at" label="Booking Open At" type="datetime-local" value="{{ old('booking_open_at') }}" />
                            <x-form.input-text name="booking_close_at" label="Booking Close At" type="datetime-local" value="{{ old('booking_close_at') }}" />
                        </div>

                        <x-form.textarea-input name="notes" label="Notes" rows="4" value="{{ old('notes') }}" placeholder="Additional notes..." />
                    </div>
                </div>
            </div>

            <div class="space-y-6 lg:col-span-4">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Slot Settings</h2>
                    </div>

                    <div class="p-5 space-y-5">
                        <x-form.input-text name="capacity" label="Capacity" type="number" min="1" value="{{ old('capacity') }}" placeholder="Enter capacity..." />
                        <x-form.input-text name="price" label="Price" type="number" step="0.01" min="0" value="{{ old('price') }}" placeholder="Enter price..." />

                        <x-form.select-input name="status" label="Status" value="{{ old('status', 'active') }}" :options="[
                            'active' => 'Active',
                            'inactive' => 'Inactive',
                        ]" />

                        <x-form.multi-select name="teacher_ids[]" label="Teachers" :options="$teachers" :selected="old('teacher_ids', [])" placeholder="Select teachers..." />
                    </div>
                </div>

                <button type="submit"
                    class="w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">
                    Create Course Slot
                </button>
            </div>
        </div>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <h6>Please fix the following errors:</h6>

        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection

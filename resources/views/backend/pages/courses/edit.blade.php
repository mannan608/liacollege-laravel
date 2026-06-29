@extends('backend.layouts.app')

@section('content')
    <form action="{{ role_route('role.courses.update', ['course' => $course->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
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

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Name --}}
                            <x-form.input-text name="name" label="Course Name" value="{{ old('name', $course->name) }}" placeholder="Enter Course Name..." />

                            {{-- Code --}}
                            <x-form.input-text name="code" label="Course Code" value="{{ old('code', $course->code) }}"  placeholder="Enter Course Code..." />

                            {{-- Cricos --}}
                            <x-form.input-text name="cricos" label="Cricos No" value="{{ old('cricos', $course->cricos) }}"  placeholder="Enter Cricos No..." />

                            {{-- Price --}}
                            <x-form.input-text name="price" label="Price" value="{{ old('price', $course->price) }}"  placeholder="Enter Price..." />
                            <x-form.input-text name="discount_percentage" label="Discount Percentage" value="{{ old('discount_percentage', $course->discount_percentage) }}"  placeholder="Enter Discount Percentage..." />
                        </div>

                        <x-form.file-uploader 
                            name="thumbnail" 
                            label="Thumbnail" 
                            accept="image/*" 
                            :existing="$course->thumbnail ? asset(($course->thumbnail)) : null" 
                        />

                        <x-form.file-uploader 
                            name="course_material" 
                            label="Course Material" 
                            accept="pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar" 
                            :existing="$course->course_material ? asset(($course->course_material)) : null" 
                        />

                        <x-form.textarea-input name="overview" label="Overview" rows="5"
                            placeholder="Enter Course overview..." :value="old('overview', $course->overview)" />

                        <x-form.textarea-input name="entry_requirements" label="Entry Requirements" rows="5"
                            placeholder="Enter Entry Requirements..." :value="old('entry_requirements', $course->entry_requirements)" />
                            
                        <x-form.textarea-input name="description" label="Description" rows="5"
                            placeholder="Enter Course description..." :value="old('description', $course->description)" />
                    </div>

                </div>
            </div>

            <div class="lg:col-span-4">             

                <div class="mt-5">
                    <button type="submit"
                        class=" w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">
                        Update Course
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

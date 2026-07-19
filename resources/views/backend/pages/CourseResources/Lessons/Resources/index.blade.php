@extends('backend.layouts.app')

@section('content')
    <div class="">

        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="fixed top-3 right-5 z-99999 w-full max-w-sm">
                <div class="relative">
                    <button @click="show = false" class="absolute top-3 right-3 z-10 text-gray-500 hover:text-gray-700">
                        ✕
                    </button>

                    <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
                </div>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
              
                <p class="mt-1 text-sm text-gray-500">Manage lessons for this course.</p>
            </div>
            <a href="{{ role_route('role.lessons.create', ['course' => $course->id, 'module' => $module->id]) }}"
                class="px-4 py-2 bg-brand-600 text-white rounded-lg text-sm font-medium hover:bg-brand-500 transition-colors">
                + Add New Lessons
            </a>
        </div>

        @include('backend.pages.CourseResources.Lessons.table', ['items' => $lessons])
    </div>
@endsection

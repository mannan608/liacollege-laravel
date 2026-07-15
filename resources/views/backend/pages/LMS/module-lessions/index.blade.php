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
                <h3 class="mt-1 text-2xl font-bold text-gray-900">{{ $course->name }}</h3>
                <p class="mt-1 text-sm text-gray-500">Manage modules and lessons for this course.</p>
            </div>
            <a  href="{{ role_route('role.module.create', ['course' => $course->id]) }}"
                class="px-4 py-2 bg-brand-600 text-white rounded-lg text-sm font-medium hover:bg-brand-600 transition-colors">
                + Add New Module
            </a>
        </div>
       @include('backend.pages.LMS.module-lessions.table', ['items' => $course->modules])

    </div>
@endsection

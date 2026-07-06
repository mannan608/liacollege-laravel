@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
       @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="fixed top-3 right-5 z-9999 w-full max-w-sm">
                <div class="relative">
                    <button @click="show = false" class="absolute top-3 right-3 z-10 text-gray-500 hover:text-gray-700">
                        ✕
                    </button>

                    <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
                </div>
            </div>
        @endif
        <div class="flex flex-col">
                <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-slate-900">Course Permissions</h1>
                <p class="mt-1.5 text-sm text-slate-500">Manage document access for {{ $student->user->name }}</p>
            </div>

                <div class="space-y-8">
                    @include('backend.pages.students.partials.course-permission-card', ['student' => $student])
                </div>

        </div>
    </div>
@endsection

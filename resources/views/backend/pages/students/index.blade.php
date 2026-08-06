@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="fixed top-3 right-5 z-9999 w-full max-w-sm">
                <div class="relative">
                    <button @click="show = false" class="absolute top-3 right-3 z-10 text-gray-500 hover:text-gray-700">
                        x
                    </button>

                    <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
                </div>
            </div>
        @endif

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Students</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Create student accounts, enroll them into course slots, and manage enrollment approval.
                </p>
            </div>

            @can('student.create')
                <a href="{{ role_route('role.students.create') }}"
                    class="inline-flex items-center rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
                    Add Student
                </a>
            @endcan
        </div>

        @include('backend.pages.LMS.enrollments.table', ['students' => $students])

        <div>
            {{ $students->links() }}
        </div>
    </div>
@endsection

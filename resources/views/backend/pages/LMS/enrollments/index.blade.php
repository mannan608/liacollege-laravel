@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="fixed top-3 right-5 z-99999 w-full max-w-sm">
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
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Enrollments</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Review pending enrollments and approve, cancel, or reset them to pending.
                </p>
            </div>
        </div>

        @include('backend.pages.LMS.enrollments.table', ['items' => $enrollments])

        <div>
            {{ $enrollments->links() }}
        </div>
    </div>
@endsection

@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        @if (session('success'))
            <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
        @endif
        <div class="flex flex-col gap-8">
            <div class="">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Give Course Permission</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage course,</p>
                {{ $student->user->name }}
            </div>

            <div class="space-y-8">
                <div class="space-y-8">
                    @include('backend.pages.students.partials.course-permission-card')
                </div>
            </div>

        </div>
    </div>
@endsection

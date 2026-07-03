@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        @if (session('success'))
            <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
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

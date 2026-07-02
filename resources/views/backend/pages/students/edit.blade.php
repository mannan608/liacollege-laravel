@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Edit Student</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Leave password blank to keep the current password.</p>
        </div>

        <form method="POST" action="{{ role_route('role.students.update', ['student' => $student]) }}" class="space-y-6">
            @csrf
            @method('PUT')
            @include('backend.pages.students.partials.form', ['student' => $student])
        </form>
    </div>
@endsection

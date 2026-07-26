@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Edit Student</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Update the student's details, enrollment, and payment method.</p>
        </div>

        <form method="POST" action="{{ role_route('role.students.update', ['student' => $student]) }}" class="space-y-6">
            @csrf
            @method('PUT')
            @include('backend.pages.students.partials.form', ['student' => $student])
        </form>

        @can('student.delete')
            <form method="POST"
                action="{{ role_route('role.students.destroy', ['student' => $student]) }}"
                onsubmit="return confirm('Are you sure you want to delete this student? This action cannot be undone.')">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="inline-flex items-center gap-2 rounded-lg border border-red-200 bg-white px-5 py-2.5 text-sm font-medium text-red-600 transition-colors hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-200 dark:border-red-900/40 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-red-900/20">
                    Delete Student
                </button>
            </form>
        @endcan
    </div>
@endsection

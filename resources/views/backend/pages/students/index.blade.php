@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition>
                <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
            </div>
        @endif

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Students</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage accounts, status, primary role, and assigned
                    roles.</p>
            </div>

            @can('student.create')
                <a href="{{ role_route('role.students.create') }}"
                    class="inline-flex items-center rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
                    Add Student
                </a>
            @endcan
        </div>

        <div class="overflow-hidden rounded-lg border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Name</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500 max-w[50%]">Enroll Courses</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Courses Permission</th>
                        {{-- <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Assignment</th> --}}
                        <th class="px-4 py-3 text-right text-xs font-medium uppercase text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @foreach ($students as $student)
                        <tr>
                            <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-white">
                                {{ $student->user?->name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $student->user?->email }}</td>
                            <td class="px-4 py-3 text-sm text-gray-500 max-w[50%]">
                                <div class="flex flex-wrap gap-2">
                                @foreach ($student->courses as $course)
                                    <span class="inline-block rounded bg-blue-100 px-2 py-1 text-xs text-blue-700">
                                        {{ $course->name }}
                                    </span>
                                @endforeach
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500">
                                @if ($student->courses->count() > 0)
                                    <a href="{{ role_route('role.students.course-permission', [
                                        'student' => $student,
                                    ]) }}"
                                        class="inline-flex items-center rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white">
                                        Permission
                                    </a>
                                @endif

                            </td>
                            <td class="px-4 py-3 text-right text-sm">
                                <div class="inline-flex items-center gap-3">

                                    @can('student.view')
                                        <a href="{{ role_route('role.students.show', ['student' => $student]) }}"
                                            class="text-gray-600 hover:text-gray-900">
                                            View
                                        </a>
                                    @endcan

                                    @can('student.edit')
                                        <a href="{{ role_route('role.students.edit', ['student' => $student]) }}"
                                            class="text-brand-600 hover:text-brand-700">
                                            Edit
                                        </a>
                                    @endcan

                                    @can('student.delete')
                                        <form method="POST"
                                            action="{{ role_route('role.students.destroy', ['student' => $student]) }}"
                                            onsubmit="return confirm('Delete this student?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="text-red-600 hover:text-red-700">
                                                Delete
                                            </button>
                                        </form>
                                    @endcan

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $students->links() }}
    </div>
@endsection

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
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500 max-w[50%]">Enroll
                            Courses</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Start Date</th>
                        {{-- <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Assignment</th> --}}
                        <th class="px-4 py-3 text-right text-xs font-medium uppercase text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @foreach ($enrollments as $enrollment)
                        <tr>
                            <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-white">
                                {{ $enrollment->student->user?->name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $enrollment->student->user?->email }}</td>
                            <td class="px-4 py-3 text-sm text-gray-500 max-w[50%]">
                                <div class="flex flex-wrap gap-2">
                                    {{-- @foreach ($student->courses as $course)
                                        <span class="inline-block rounded bg-blue-100 px-2 py-1 text-xs text-blue-700">
                                            {{ $course->name }}
                                        </span>
                                    @endforeach --}}
                                    {{ $enrollment->slot->course->name }}
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500">
                               {{ $enrollment->slot->training_date->format('d M Y') }}

                            </td>                          
                            {{-- <td class="px-4 py-3 text-right">
                                <div class="inline-flex items-center gap-1">
                                    @can('student.view')
                                        <a href="{{ role_route('role.students.show', ['student' => $student]) }}"
                                            class="group inline-flex items-center justify-center rounded-lg p-2 text-gray-500 transition-colors hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                            title="View Details">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <span class="sr-only">View</span>
                                        </a>
                                    @endcan

                                    @can('student.edit')
                                        <a href="{{ role_route('role.students.edit', ['student' => $student]) }}"
                                            class="group inline-flex items-center justify-center rounded-lg p-2 text-gray-500 transition-colors hover:bg-brand-50 hover:text-brand-600 dark:text-gray-400 dark:hover:bg-brand-900/20 dark:hover:text-brand-400"
                                            title="Edit Student">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <span class="sr-only">Edit</span>
                                        </a>
                                    @endcan

                                    @can('student.delete')
                                        <form method="POST"
                                            action="{{ role_route('role.students.destroy', ['student' => $student]) }}"
                                            class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this student? This action cannot be undone.')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="inline-flex items-center justify-center rounded-lg p-2 text-gray-500 transition-colors hover:bg-red-50 hover:text-red-600 dark:text-gray-400 dark:hover:bg-red-900/20 dark:hover:text-red-400"
                                                title="Delete Student">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                <span class="sr-only">Delete</span>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- {{ $students->links() }} --}}
    </div>
@endsection

@extends('backend.layouts.app')

@section('content')
    @php
        $user = $student->user;
    @endphp

    <div class="space-y-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">{{ $user?->name }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user?->email }}</p>
            </div>

            @can('student.edit')
                <a href="{{ role_route('role.students.edit', ['student' => $student]) }}"
                    class="inline-flex items-center rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
                    Edit Student
                </a>
            @endcan
        </div>

        <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
    <div class="p-6">
        <!-- Header Row -->
        <div class="flex gap-4 justify-end">           
          
              <!-- Document Button -->
            <a href="{{ role_route('role.documents.create' , ['student' => $student]) }}"
               class="group inline-flex items-center gap-2 rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-medium text-white transition-colors hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                <svg class="h-4 w-4 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                Upload Document
            </a>

            <!-- Assignment Button -->
            <a href="{{ role_route('role.students.assignments', ['student' => $student]) }}"
               class="group inline-flex items-center gap-2 rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-medium text-white transition-colors hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                <svg class="h-4 w-4 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                Assignment
            </a>
        </div>

        <!-- Divider -->
        <div class="my-6 border-t border-gray-100 dark:border-gray-700"></div>

        <!-- Courses Section -->
        <div>
            <div class="mb-3 flex items-center gap-2">
                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Enrolled Courses</h3>             
            </div>

            {{-- @forelse ($student->courses as $course)
                <div class="flex flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 rounded-lg border border-gray-200 bg-gray-50 px-3 py-1.5 text-sm font-medium text-gray-700 transition-colors hover:border-brand-200 hover:bg-brand-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-gray-300 dark:hover:border-brand-800 dark:hover:bg-brand-900/20">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                        {{ $course->name }}
                    </span>
                </div>
            @empty
                <div class="flex items-center gap-2 rounded-lg border border-dashed border-gray-200 bg-gray-50/50 px-4 py-3 dark:border-gray-700 dark:bg-gray-800/50">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                    </svg>
                    <span class="text-sm text-gray-500 dark:text-gray-400">No courses enrolled.</span>
                </div>
            @endforelse --}}

            @include('backend.pages.students.enroll-course-table', ['items' => $student->enrollments])
        </div>
    </div>
</div>
    </div>
@endsection

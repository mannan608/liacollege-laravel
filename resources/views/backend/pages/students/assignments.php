@extends('backend.layouts.app')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Students</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Manage accounts, status, primary role, and assigned
                roles.</p>
        </div>
    </div>

    <div class="overflow-hidden rounded-lg border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">StudentName</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Enroll Courses</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Task Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Assignment</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                @forelse($student->assignmentSubmissions as $submission)
                <tr>
                    <td>
                        {{ $student->user->name }}
                    </td>

                    <td>
                        @foreach($student->courses as $course)
                        <span>{{ $course->name }}</span><br>
                        @endforeach
                    </td>

                    <td>
                        {{ $submission->courseSectionRow->row_name ?? '-' }}
                    </td>

                    <td>
                        <a href="{{ asset('storage/'.$submission->file) }}"
                            target="_blank"
                            class="text-blue-600">
                            Download
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        No assignments submitted.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
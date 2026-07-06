@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                    Submitted Assignments
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    View the exact task each student submitted, including course and section context.
                </p>
            </div>
        </div>

        <div class="overflow-hidden rounded-lg border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Student</th>
                            <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Course</th>
                            <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Section</th>
                            <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Task</th>
                            <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Submitted File</th>
                            <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Submitted At</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @forelse($student->assignmentSubmissions as $submission)
                            @php
                                $row = $submission->courseSectionRow;
                                $section = $row?->section;
                                $category = $section?->category;
                                $course = $category?->course;
                                $taskTitle = $row->data['text'] ?? 'Untitled Task';
                            @endphp

                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                    {{ $student->user->name }}
                                </td>

                                <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                    {{ $course->name ?? '-' }}
                                </td>

                                <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                    {{ $section->section_name ?? '-' }}
                                </td>

                                <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                    {{ $taskTitle }}
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <a href="{{ asset($submission->file) }}"
                                        target="_blank"
                                        class="inline-flex items-center rounded-lg bg-brand-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-brand-700">
                                        Download
                                    </a>
                                </td>

                                <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">
                                    {{ $submission->created_at?->format('d M Y, h:i A') ?? '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-sm text-gray-500 dark:text-gray-400">
                                    No assignments submitted.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends('frontend.pages.student.layout.app')

@section('content')
    <div class="">
        <div class="mb-10">
            <div class="bg-white mb-6">
                <div class=" px-6 py-8">
                    <h1 class="text-2xl font-semibold text-gray-900 tracking-tight">Enrolled Courses</h1>
                    <p class="mt-1 text-sm text-gray-500">Browse materials and manage your assignments</p>
                </div>
            </div>

            <div id="course-tabs" class="flex gap-4 overflow-x-auto pb-4 snap-x snap-mandatory scrollbar-hide">

                @foreach ($courses as $course)
                    <button onclick="scrollToCourse({{ $course->id }})"
                        class="course-tab shrink-0 group px-6 py-4 bg-white border border-gray-200 rounded-xl hover:border-brand-500  transition-all duration-300 focus:outline-none focus:ring-0 focus:ring-brand-500 focus:ring-offset-0 min-w-65"
                        data-course-id="{{ $course->id }}">

                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-linear-to-br from-brand-500 to-brand-600 rounded-2xl flex items-center justify-center text-white shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18 9.246 18 10.832 18.477 12 19.253zm0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18 14.754 18 13.168 18.477 12 19.253z" />
                                </svg>
                            </div>

                            <div class="text-left">
                                <h3
                                    class="font-semibold text-slate-800 group-hover:text-brand-600 transition-colors line-clamp-1 text-lg md:text-xl lg:text-2xl">
                                    {{ $course->name }}
                                </h3>
                                <p class="text-xs text-slate-500 mt-0.5 group-hover:text-brand-600 transition-colors">
                                    {{ $course->sections->count() }} Sections
                                </p>
                            </div>
                        </div>
                    </button>
                @endforeach
            </div>
        </div>

        <div class="mt-6 flex flex-col gap-6">
            @foreach ($courses as $course)
                <div id="course-{{ $course->id }}"
                    class="course-section scroll-mt-24 bg-white rounded-xl border border-slate-100 overflow-hidden">
                    <div class="bg-linear-to-r from-brand-500 to-brand-500 px-4 py-5 sm:px-6 sm:py-6 lg:px-8">

                        <div class="flex items-center justify-between gap-4">
                            <div class="min-w-0">
                                <h2 class="truncate text-lg font-bold text-white md:text-xl lg:text-2xl">
                                    {{ $course->name }}
                                </h2>
                                <p class="mt-1 text-sm text-white/80 sm:text-base">
                                    Course Materials & Resources
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- Sections -->
                    <div class="p-3 sm:p-5 lg:p-6">

                        <div class="space-y-4 sm:space-y-6 lg:space-y-8">
                            @if ($course->sections->isNotEmpty())
                                @foreach ($course->sections as $section)
                                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-50/60">

                                        <!-- Section Header -->
                                        <div class="border-b border-slate-200 bg-white px-4 py-3 sm:px-5 sm:py-4">

                                            <div class="flex items-center gap-3">

                                                <div
                                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 11H5m14-4H5m14 8H5m14 4H5" />
                                                    </svg>
                                                </div>

                                                <h3 class="text-lg font-semibold text-slate-800 sm:text-xl lg:text-2xl">
                                                    {{ $section->section_name }}
                                                </h3>

                                            </div>
                                        </div>
                                        <div class="divide-y divide-slate-200">
                                            @foreach ($section->rows as $row)
                                                <div @class([
                                                    'group bg-white px-4 transition-all duration-200 sm:px-5',
                                                    'py-4 sm:py-5' => !empty($row->data['file']),
                                                    'py-2 sm:py-2' => empty($row->data['file']),
                                                ])>
                                                    <div
                                                        class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                                                        <!-- Left Content -->
                                                        <div class="flex items-start gap-3 min-w-0 flex-1 ml-10">
                                                            @if (!empty($row->data['file']))
                                                                <div
                                                                    class="mt-0.5 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-500 group-hover:bg-brand-50 group-hover:text-brand-600 transition-colors">
                                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                                                    </svg>
                                                                </div>
                                                            @endif
                                                            @if (!empty($row->data['link']))
                                                                <a href="{{ $row->data['link'] }}" target="_blank"
                                                                    rel="noopener noreferrer"
                                                                    class="text-sm md:text-base lg:text-lg text-gray-500 underline hover:text-brand-600 leading-relaxed font-medium">
                                                                    {{ $row->data['text'] ?? '' }}
                                                                </a>
                                                            @else
                                                                <span
                                                                    class="text-sm md:text-base lg:text-lg text-gray-500 leading-relaxed font-medium">
                                                                    {{ $row->data['text'] ?? '' }}
                                                                </span>
                                                            @endif
                                                        </div>

                                                        @if (!empty($row->data['file']))
                                                            <!-- Actions -->
                                                            <div class="flex items-baseline gap-4 shrink-0">
                                                                @if ($row->is_downloadable)
                                                                    <a href="{{ asset($row->data['file']) }}" download
                                                                        class="inline-flex items-center gap-1.5 rounded-lg bg-brand-500 px-3.5 py-2 text-sm font-medium text-white hover:bg-brand-800 transition-colors focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-1">
                                                                        <svg class="w-3.5 h-3.5" fill="none"
                                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                                        </svg>
                                                                        Download
                                                                    </a>
                                                                @endif
                                                                @php
                                                                    $submission = $submissions[$row->id] ?? null;
                                                                @endphp

                                                                @if ($row->is_document_submission)
                                                                    <form action="{{ route('student.rows.submit', $row) }}"
                                                                        method="POST" enctype="multipart/form-data"
                                                                        class="inline-block">
                                                                        @csrf

                                                                        <input type="file" name="file"
                                                                            id="file-{{ $row->id }}" class="hidden"
                                                                            accept=".pdf,.doc,.docx,.zip,.rar,.png,.jpg,.jpeg"
                                                                            onchange="this.form.submit()">

                                                                        @if ($submission)
                                                                            {{-- Submitted State: Show file info + update action --}}
                                                                            <div
                                                                                class="flex flex-col items-end justify-end gap-0.5">
                                                                                <button type="button"
                                                                                    onclick="document.getElementById('file-{{ $row->id }}').click()"
                                                                                    class="inline-flex items-center gap-1.5 rounded-lg bg-brand-50 border border-brand-500 px-3.5 py-1.5 text-sm font-medium text-brand-500 hover:bg-brand-50 hover:border-brand-500 transition-all focus:outline-none focus:ring-0 focus:ring-brand-500 focus:ring-offset-1"
                                                                                    title="Update Assignment">
                                                                                    <svg class="w-3.5 h-3.5 " fill="none"
                                                                                        stroke="currentColor"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                                                    </svg>
                                                                                    Update Assignment
                                                                                </button>
                                                                                {{-- File Info --}}
                                                                                <div class="flex-1 min-w-0 mt-1">
                                                                                    <a href="{{ asset($submission->file) }}"
                                                                                        target="_blank"
                                                                                        class="inline-flex items-center gap-1.5 text-xs font-medium text-brand-600 hover:text-brand-700">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            class="h-3.5 w-3.5"
                                                                                            fill="none"
                                                                                            viewBox="0 0 24 24"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="2">
                                                                                            <path stroke-linecap="round"
                                                                                                stroke-linejoin="round"
                                                                                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                                                                        </svg>
                                                                                        View Current File
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <button type="button"
                                                                                onclick="document.getElementById('file-{{ $row->id }}').click()"
                                                                                class="inline-flex items-center gap-1.5 rounded-lg bg-brand-50 border border-brand-500 px-3.5 py-1.5 text-sm font-medium text-brand-500 hover:bg-brand-50 hover:border-brand-500 transition-all focus:outline-none focus:ring-0 focus:ring-brand-500 focus:ring-offset-1"
                                                                                title="Update Assignment">
                                                                                <svg class="w-3.5 h-3.5" fill="none"
                                                                                    stroke="currentColor"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        stroke-width="2"
                                                                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                                                </svg>
                                                                                Submit Assignment
                                                                            </button>
                                                                        @endif
                                                                    </form>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="rounded-lg  px-6 py-8 text-center">
                                    <svg class="mx-auto h-10 w-10 text-yellow-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z" />
                                    </svg>

                                    <h3 class="mt-3 text-lg font-semibold text-gray-800">
                                        No Permission
                                    </h3>

                                    <p class="mt-2 text-sm text-gray-600">
                                        You don't have permission to access this course yet.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection


    <script>
        function scrollToCourse(courseId) {
            const element = document.getElementById(`course-${courseId}`);
            if (element) {
                const headerOffset = 100;
                const elementPosition = element.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.scrollY - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });

            }
        }
    </script>

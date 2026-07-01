@extends('frontend.pages.student.layout.app')

@section('content')
    <div class="">
        <h1>Student dashboard</h1>
        <div class="mt-6 flex flex-col gap-6">
            @foreach ($courses as $course)
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <div class="bg-gradient-to-r from-brand-600 to-brand-500 px-4 py-5 sm:px-6 sm:py-6 lg:px-8">

                        <div class="flex items-center justify-between gap-4">
                            <div class="min-w-0">
                                <h2 class="truncate text-lg font-bold text-white sm:text-xl lg:text-2xl">
                                    {{ $course->name }}
                                </h2>

                                <p class="mt-1 text-xs text-white/80 sm:text-sm">
                                    Course Materials & Resources
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- Sections -->
                    <div class="p-3 sm:p-5 lg:p-6">

                        <div class="space-y-4 sm:space-y-5 lg:space-y-6">

                            @foreach ($course->sections as $section)
                                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-50/60">

                                    <!-- Section Header -->
                                    <div class="border-b border-slate-200 bg-white px-4 py-3 sm:px-5 sm:py-4">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 11H5m14-4H5m14 8H5m14 4H5" />
                                                </svg>
                                            </div>

                                            <h3 class="text-sm font-semibold text-slate-800 sm:text-base lg:text-lg">
                                                {{ $section->section_name }}
                                            </h3>

                                        </div>
                                    </div>
                                    <div class="divide-y divide-slate-200">

                                        @foreach ($section->rows as $row)
                                            <div
                                                class="group bg-white px-4 py-4 transition-all duration-200 hover:bg-slate-50 sm:px-5 sm:py-5">

                                                <div
                                                    class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                                                    <!-- Left Content -->
                                                    <div class="flex min-w-0 flex-1 items-center gap-4">

                                                        <div
                                                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-brand-100 text-brand-600 sm:h-10 sm:w-10">

                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4 w-4 sm:h-5 sm:w-5" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                                            </svg>

                                                        </div>

                                                        <div class="min-w-0 flex-1">
                                                            <h4
                                                                class="text-sm font-semibold leading-relaxed text-slate-800 sm:text-base line-clamp-1">
                                                                {{ $row->data['text'] }}
                                                            </h4>
                                                        </div>

                                                    </div>

                                                    @if (!empty($row->data['file']))
                                                        <!-- Right Actions -->
                                                        <div
                                                            class="flex w-full flex-col gap-2 sm:flex-row lg:w-auto lg:flex-nowrap lg:justify-end">

                                                            <button type="button"
                                                                class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700">
                                                                Submit Work
                                                            </button>
                                                            {{-- @if ($row->is_document_submission)
                                                                <a href="{{ route('student.assignment.submit', $row) }}"
                                                                    class="btn btn-success">
                                                                    Submit Document
                                                                </a>
                                                            @endif --}}

                                                            <a href="{{ asset($row->data['file']) }}" download
                                                                class="inline-flex items-center justify-center rounded-xl bg-emerald-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-emerald-700">
                                                                Download
                                                            </a>
                                                            {{-- @if ($row->is_downloadable)
                                                                <a href="{{ asset($row->data['file']) }}" target="_blank"
                                                                    class="btn btn-primary">
                                                                    Download
                                                                </a>
                                                            @endif --}}

                                                        </div>
                                                    @endif

                                                </div>

                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>
            @endforeach
        </div>
    @endsection

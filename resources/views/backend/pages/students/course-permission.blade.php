@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        @if (session('success'))
            <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
        @endif

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Give Course Permission</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage course,</p>
                {{ $student->user->name }}

                <div class="space-y-8">
                    @foreach ($enrolledCourses as $course)
                        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                            <!-- Course Header -->
                            <div class="border-b border-slate-100 bg-gradient-to-r from-brand-600 to-brand-500 px-6 py-5">
                                <h2 class="text-xl font-bold text-white">
                                    {{ $course->name }}
                                </h2>

                                <p class="mt-1 text-sm text-white/80">
                                    {{ $course->sections->count() }} Sections
                                </p>
                            </div>

                            <!-- Sections -->
                            <div class="p-6">
                                <div class="space-y-6">

                                    @foreach ($course->sections as $section)
                                        <div class="rounded-xl border border-slate-200 bg-slate-50">

                                            <!-- Section Header -->
                                            <div
                                                class="flex items-center justify-between border-b border-slate-200 px-5 py-4">
                                                <h3 class="font-semibold text-slate-800">
                                                    {{ $section->section_name }}
                                                </h3>

                                                <span
                                                    class="rounded-full bg-brand-100 px-3 py-1 text-xs font-medium text-brand-700">
                                                    {{ $section->rows->count() }} Documents
                                                </span>
                                            </div>

                                            <!-- Rows -->
                                            <div class="divide-y divide-slate-200">
                                                @foreach ($section->rows as $row)
                                                    <div
                                                        class="flex items-center gap-3 px-5 py-4 transition hover:bg-white">

                                                        <div
                                                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                                            </svg>
                                                        </div>

                                                        <div class="flex-1">
                                                            <p class="font-medium text-slate-800">
                                                                {{ $row->data['text'] ?? 'N/A' }}
                                                            </p>
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
            </div>
        </div>
    </div>
@endsection

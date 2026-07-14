@extends('backend.layouts.fullscreen-layout')

@section('content')
    <div class="relative z-1 bg-neutral-100 p-6 sm:p-0 dark:bg-gray-900">
        <div class="relative h-screen w-full p-0 dark:bg-gray-900">
            <!-- Form -->
            <div class="flex w-full h-full items-center justify-center ">
                <div
                    class="w-full max-w-6xl bg-white/80 backdrop-blur-xl rounded-2xl shadow-[0_8px_40px_-12px_rgba(0,0,0,0.12)] border border-white/60 overflow-hidden transition-all duration-500 hover:shadow-[0_20px_60px_-12px_rgba(0,0,0,0.18)]">

                    <!-- Header Section -->
                    <div
                        class="relative bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 px-8 py-10 overflow-hidden">
                        <!-- Subtle pattern overlay -->
                        <div class="absolute inset-0 opacity-[0.03]"
                            style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 24px 24px;">
                        </div>

                        <!-- Decorative glow -->
                        <div class="absolute -top-20 -right-20 w-64 h-64 bg-cyan-400/10 rounded-full blur-3xl"></div>
                        <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-emerald-400/8 rounded-full blur-2xl"></div>

                        <div class="relative z-10">
                            <div class="flex items-center gap-2 mb-5">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 border border-white/10 text-xs font-semibold text-cyan-300 tracking-wide uppercase backdrop-blur-sm">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Training Enrolment
                                </span>
                            </div>

                            <h1 class="text-3xl font-bold text-white tracking-tight leading-tight mb-3">
                                HLTAID011 Provide First Aid
                            </h1>

                            <div class="flex items-center gap-3 text-slate-300">
                                <div
                                    class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center backdrop-blur-sm border border-white/5">
                                    <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium">Sydney FA Quay Street</span>
                            </div>
                        </div>
                    </div>

                    <!-- Body Content -->
                    <div class="px-8 py-8">

                        <!-- Starting Date Badge -->
                        <div class="mb-8">
                            <div
                                class="inline-flex items-center gap-3 px-5 py-3.5 rounded-xl bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-100/80 shadow-sm">
                                <div
                                    class="w-10 h-10 rounded-lg bg-emerald-500 flex items-center justify-center shadow-lg shadow-emerald-500/20">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[11px] font-bold text-emerald-600 uppercase tracking-widest">Starting
                                        Date</p>
                                    <p class="text-base font-semibold text-slate-800">Monday, 13 July 2026</p>
                                </div>
                            </div>
                        </div>

                        <!-- Schedule Section -->
                        <div class="mb-8">
                            <div class="flex items-center gap-2 mb-5">
                                <div class="w-1 h-5 rounded-full bg-gradient-to-b from-cyan-500 to-blue-500"></div>
                                <h2 class="text-lg font-bold text-slate-800 tracking-tight">Practical Session Schedule</h2>
                            </div>

                            <div class="overflow-hidden rounded-xl border border-gray-100 dark:border-white/5 bg-white">
                                <div class="max-w-full overflow-x-auto">
                                    <table class="w-full text-left border-collapse">
                                        <thead
                                            class="bg-gray-50 dark:bg-white/2 border-b border-gray-100 dark:border-white/5">
                                            <tr>
                                                <th
                                                    class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    #</th>
                                                <th
                                                    class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date Day</th>
                                                <th
                                                    class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Start Time</th>
                                                <th
                                                    class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    End Time</th>
                                                <th
                                                    class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Location</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-100 dark:divide-white/5">

                                            <tr class="hover:bg-gray-50/50 dark:hover:bg-white/1 transition-colors">
                                                <td class="px-5 py-4">
                                                    <span
                                                        class="px-2 py-1 bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded text-xs font-mono">101</span>
                                                </td>
                                                <td class="px-5 py-4">
                                                    Mon, 13 Jul 2026
                                                </td>
                                                <td class="px-5 py-4 text-sm text-gray-700 dark:text-gray-300">
                                                    08:30am
                                                </td>
                                                <td class="px-5 py-4 text-sm text-gray-500 dark:text-gray-400">
                                                    11:30am
                                                </td>
                                                <td class="px-5 py-4 text-sm text-gray-500 dark:text-gray-400">
                                                    Prince Centre, Level 5, 8 Quay Street, Haymarket NSW 2000, Australia
                                                    <a href="#" class="ml-1 text-cyan-600 hover:text-cyan-700 font-semibold underline underline-offset-2 decoration-cyan-300 hover:decoration-cyan-500 transition-all duration-200">(Map)</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent mb-8"></div>

                        <!-- Actions -->
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4">

                            <!-- Continue Button -->
                            <a href="{{route('enrollmentCourseCheckout')}}"
                                class="btn-sheen group relative px-8 py-3.5 rounded-xl bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 text-white font-semibold text-sm shadow-lg shadow-slate-900/20 hover:shadow-xl hover:shadow-slate-900/30 active:scale-[0.98] transition-all duration-300 overflow-hidden">
                                <span class="relative flex items-center justify-center gap-2">
                                    Continue
                                    <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform duration-300"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </span>
                            </a>

                            <!-- Sign In Link -->
                            <div class="flex items-center gap-2 text-sm text-slate-500">
                                <span>Already enrolled?</span>
                                <a href="#"
                                    class="group/link inline-flex items-center gap-1 font-semibold text-slate-700 hover:text-cyan-600 transition-colors duration-200">
                                    Sign In
                                    <svg class="w-3.5 h-3.5 group-hover/link:translate-x-0.5 transition-transform duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
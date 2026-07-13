@extends('frontend.pages.student.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-950">
    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm mb-8">
            <a href="#" class="text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300 transition-colors">
                My Enrolments
            </a>
            <svg class="w-4 h-4 text-gray-300 dark:text-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"/>
            </svg>
            <span class="font-medium text-gray-800 dark:text-white">HLTAID011 Provide First Aid</span>
        </nav>

        <!-- Header -->
        <div class="flex flex-col gap-6 mb-10">
            <div>
                <h1 class="text-2xl font-medium text-gray-900 dark:text-white tracking-tight leading-tight">
                    HLTAID011 Provide First Aid
                </h1>
                <p class="text-gray-500 dark:text-gray-400 mt-2 text-base">First Aid & CPR Certification</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3">
                <a href="#" class="inline-flex items-center gap-2.5 px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl hover:border-gray-300 dark:hover:border-gray-700 transition-all text-sm font-medium text-gray-700 dark:text-gray-200">
                    <svg class="w-4 h-4 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                    Enrolment Documents
                </a>

                <a href="#" target="_blank" class="inline-flex items-center gap-2.5 px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl hover:border-gray-300 dark:hover:border-gray-700 transition-all text-sm font-medium text-gray-700 dark:text-gray-200">
                    <svg class="w-4 h-4 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    Confirmation Letter
                </a>

                <a href="#" target="_blank" class="inline-flex items-center gap-2.5 px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl hover:border-gray-300 dark:hover:border-gray-700 transition-all text-sm font-medium text-gray-700 dark:text-gray-200">
                    <svg class="w-4 h-4 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                    Signed Terms
                </a>

                <a href="#" target="_blank" class="inline-flex items-center gap-2.5 px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl hover:border-gray-300 dark:hover:border-gray-700 transition-all text-sm font-medium text-gray-700 dark:text-gray-200">
                    <svg class="w-4 h-4 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                    Academic Transcript
                </a>

                <a href="#" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100 text-white dark:text-gray-900 rounded-xl font-medium text-sm transition-all">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="8" y1="6" x2="21" y2="6"/>
                        <line x1="8" y1="12" x2="21" y2="12"/>
                        <line x1="8" y1="18" x2="21" y2="18"/>
                        <line x1="3" y1="6" x2="3.01" y2="6"/>
                        <line x1="3" y1="12" x2="3.01" y2="12"/>
                        <line x1="3" y1="18" x2="3.01" y2="18"/>
                    </svg>
                    Tasks
                </a>
            </div>
        </div>

        <!-- Course Introduction -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6 mb-8">
            <h3 class="text-[15px] font-medium text-gray-900 dark:text-white mb-3 flex items-center gap-2.5">
                <span class="w-7 h-7 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="16" x2="12" y2="12"/>
                        <line x1="12" y1="8" x2="12.01" y2="8"/>
                    </svg>
                </span>
                Course Introduction
            </h3>
            <div class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed pl-9.5">
                Welcome to your online learning. You can download the learning slides via the PDF under the words "Learning Material" or download the PDF's as you go next to each module.<br><br>
                Click on the blue "Start button" to commence.
            </div>
        </div>

        <!-- Learning Material -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-950 flex items-center justify-between">
                <h4 class="font-medium text-[15px] text-gray-900 dark:text-white">Learning Material</h4>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="#" target="_blank" class="group flex gap-4 items-start p-5 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-gray-300 dark:hover:border-gray-700 transition-all hover:bg-gray-50 dark:hover:bg-gray-800/50">
                        <div class="w-10 h-10 bg-red-50 dark:bg-red-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="16" y1="13" x2="8" y2="13"/>
                                <line x1="16" y1="17" x2="8" y2="17"/>
                                <polyline points="10 9 9 9 8 9"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-sm text-gray-900 dark:text-white group-hover:text-gray-700 dark:group-hover:text-gray-200 transition-colors">CBD College Student Handbook.pdf</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">PDF · 2.4 MB</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-300 group-hover:text-gray-500 transition-colors flex-shrink-0 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"/>
                        </svg>
                    </a>

                    <a href="#" target="_blank" class="group flex gap-4 items-start p-5 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-gray-300 dark:hover:border-gray-700 transition-all hover:bg-gray-50 dark:hover:bg-gray-800/50">
                        <div class="w-10 h-10 bg-red-50 dark:bg-red-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="16" y1="13" x2="8" y2="13"/>
                                <line x1="16" y1="17" x2="8" y2="17"/>
                                <polyline points="10 9 9 9 8 9"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-sm text-gray-900 dark:text-white group-hover:text-gray-700 dark:group-hover:text-gray-200 transition-colors">Support for students at CBD College.pdf</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">PDF · 1.8 MB</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-300 group-hover:text-gray-500 transition-colors flex-shrink-0 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Practical Session Schedule -->
        <div class="mb-8">
            <h4 class="text-[20px] font-medium text-gray-900 dark:text-white mb-6">Practical Session Schedule</h4>

            <!-- Tabs -->
            <div class="inline-flex bg-gray-100 dark:bg-gray-800 rounded-xl p-1 mb-6">
                <button onclick="switchTab(0)" id="tab-cal" class="tab-btn-sched active px-6 py-2.5 rounded-lg text-sm font-medium transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    Calendar
                </button>
                <button onclick="switchTab(1)" id="tab-list" class="tab-btn-sched px-6 py-2.5 rounded-lg text-sm font-medium transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="8" y1="6" x2="21" y2="6"/>
                        <line x1="8" y1="12" x2="21" y2="12"/>
                        <line x1="8" y1="18" x2="21" y2="18"/>
                        <line x1="3" y1="6" x2="3.01" y2="6"/>
                        <line x1="3" y1="12" x2="3.01" y2="12"/>
                        <line x1="3" y1="18" x2="3.01" y2="18"/>
                    </svg>
                    List
                </button>
            </div>

            <!-- Calendar Tab -->
            <div id="calendar-tab" class="tab-content-sched bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6">
                <div class="text-center py-12 text-sm text-gray-400">
                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-300 dark:text-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    Calendar view placeholder<br>
                    <span class="text-xs">Your existing FullCalendar integration goes here</span>
                </div>
            </div>

            <!-- List Tab -->
            <div id="list-tab" class="tab-content-sched hidden bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 dark:bg-gray-950 border-b border-gray-200 dark:border-gray-800">
                        <tr>
                            <th class="text-left px-6 py-4 font-medium text-gray-500 dark:text-gray-400">Date</th>
                            <th class="text-left px-6 py-4 font-medium text-gray-500 dark:text-gray-400">Time</th>
                            <th class="text-left px-6 py-4 font-medium text-gray-500 dark:text-gray-400">Location</th>
                            <th class="text-left px-6 py-4 font-medium text-gray-500 dark:text-gray-400">Status</th>
                            <th class="text-right px-6 py-4 font-medium text-gray-500 dark:text-gray-400">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Fri, 15 Jul 2026</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">09:00 — 13:00</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">Room 302, Building B</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-400 text-xs font-medium">Confirmed</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-xs font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors">Details</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Mon, 18 Jul 2026</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">14:00 — 16:00</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">Online via Zoom</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-amber-50 dark:bg-amber-900/20 text-amber-700 dark:text-amber-400 text-xs font-medium">Pending</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-xs font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors">Details</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Wed, 20 Jul 2026</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">10:00 — 12:00</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">Exam Hall A</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 text-xs font-medium">Scheduled</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-xs font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors">Details</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Course Modules -->
        <div class="mb-12">
            <h4 class="text-[20px] font-medium text-gray-900 dark:text-white mb-6">Course Modules</h4>

            <div class="space-y-4">
                <!-- Unit Card 1 -->
                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden">
                    <div class="px-6 py-5 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-emerald-50 dark:bg-emerald-900/20 text-emerald-700 dark:text-emerald-400 text-xs font-medium">COMPLETE</span>
                            <span class="font-medium text-gray-900 dark:text-white">HLTAID011 Provide First Aid</span>
                        </div>
                        <button class="px-4 py-2 text-xs font-medium border border-gray-200 dark:border-gray-700 hover:border-gray-300 dark:hover:border-gray-600 rounded-lg transition-colors text-gray-700 dark:text-gray-300">
                            Unit Material
                        </button>
                    </div>

                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-950 border-b border-gray-200 dark:border-gray-800">
                            <tr>
                                <th class="text-left pl-6 py-4 font-medium text-gray-500 dark:text-gray-400">Module</th>
                                <th class="text-center py-4 font-medium text-gray-500 dark:text-gray-400">Status</th>
                                <th class="text-center py-4 font-medium text-gray-500 dark:text-gray-400">Result</th>
                                <th class="text-right pr-6 py-4 font-medium text-gray-500 dark:text-gray-400">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                <td class="pl-6 py-5">
                                    <div class="font-medium text-gray-900 dark:text-white">Part 1: CPR online training and quiz</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">eLearning Presentation (SCORM)</div>
                                </td>
                                <td class="text-center">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-emerald-50 dark:bg-emerald-900/20 text-emerald-700 dark:text-emerald-400 text-xs font-medium">Completed</span>
                                </td>
                                <td class="text-center font-medium text-emerald-600 dark:text-emerald-400">100%</td>
                                <td class="pr-6 text-right">
                                    <button class="px-5 py-2.5 bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100 text-white dark:text-gray-900 rounded-lg text-xs font-medium transition-colors">
                                        Open
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                <td class="pl-6 py-5">
                                    <div class="font-medium text-gray-900 dark:text-white">Part 2: First Aid theory assessment</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Online Quiz (20 questions)</div>
                                </td>
                                <td class="text-center">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-emerald-50 dark:bg-emerald-900/20 text-emerald-700 dark:text-emerald-400 text-xs font-medium">Completed</span>
                                </td>
                                <td class="text-center font-medium text-emerald-600 dark:text-emerald-400">95%</td>
                                <td class="pr-6 text-right">
                                    <button class="px-5 py-2.5 bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100 text-white dark:text-gray-900 rounded-lg text-xs font-medium transition-colors">
                                        Open
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                <td class="pl-6 py-5">
                                    <div class="font-medium text-gray-900 dark:text-white">Part 3: Practical demonstration video</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Video Upload Assessment</div>
                                </td>
                                <td class="text-center">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-amber-50 dark:bg-amber-900/20 text-amber-700 dark:text-amber-400 text-xs font-medium">In Progress</span>
                                </td>
                                <td class="text-center font-medium text-gray-400 dark:text-gray-500">—</td>
                                <td class="pr-6 text-right">
                                    <button class="px-5 py-2.5 bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100 text-white dark:text-gray-900 rounded-lg text-xs font-medium transition-colors">
                                        Start
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                <td class="pl-6 py-5">
                                    <div class="font-medium text-gray-900 dark:text-white">Part 4: Final practical assessment</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">In-person Session</div>
                                </td>
                                <td class="text-center">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400 text-xs font-medium">Not Started</span>
                                </td>
                                <td class="text-center font-medium text-gray-400 dark:text-gray-500">—</td>
                                <td class="pr-6 text-right">
                                    <button class="px-5 py-2.5 border border-gray-200 dark:border-gray-700 text-gray-400 dark:text-gray-500 rounded-lg text-xs font-medium cursor-not-allowed">
                                        Locked
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Unit Card 2 -->
                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden">
                    <div class="px-6 py-5 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-amber-50 dark:bg-amber-900/20 text-amber-700 dark:text-amber-400 text-xs font-medium">IN PROGRESS</span>
                            <span class="font-medium text-gray-900 dark:text-white">HLTAID009 CPR & AED</span>
                        </div>
                        <button class="px-4 py-2 text-xs font-medium border border-gray-200 dark:border-gray-700 hover:border-gray-300 dark:hover:border-gray-600 rounded-lg transition-colors text-gray-700 dark:text-gray-300">
                            Unit Material
                        </button>
                    </div>

                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-950 border-b border-gray-200 dark:border-gray-800">
                            <tr>
                                <th class="text-left pl-6 py-4 font-medium text-gray-500 dark:text-gray-400">Module</th>
                                <th class="text-center py-4 font-medium text-gray-500 dark:text-gray-400">Status</th>
                                <th class="text-center py-4 font-medium text-gray-500 dark:text-gray-400">Result</th>
                                <th class="text-right pr-6 py-4 font-medium text-gray-500 dark:text-gray-400">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                <td class="pl-6 py-5">
                                    <div class="font-medium text-gray-900 dark:text-white">Module 1: CPR fundamentals</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">eLearning Presentation</div>
                                </td>
                                <td class="text-center">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-emerald-50 dark:bg-emerald-900/20 text-emerald-700 dark:text-emerald-400 text-xs font-medium">Completed</span>
                                </td>
                                <td class="text-center font-medium text-emerald-600 dark:text-emerald-400">88%</td>
                                <td class="pr-6 text-right">
                                    <button class="px-5 py-2.5 bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100 text-white dark:text-gray-900 rounded-lg text-xs font-medium transition-colors">
                                        Open
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                <td class="pl-6 py-5">
                                    <div class="font-medium text-gray-900 dark:text-white">Module 2: AED operation</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Interactive Simulation</div>
                                </td>
                                <td class="text-center">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-amber-50 dark:bg-amber-900/20 text-amber-700 dark:text-amber-400 text-xs font-medium">In Progress</span>
                                </td>
                                <td class="text-center font-medium text-gray-400 dark:text-gray-500">—</td>
                                <td class="pr-6 text-right">
                                    <button class="px-5 py-2.5 bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100 text-white dark:text-gray-900 rounded-lg text-xs font-medium transition-colors">
                                        Continue
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                <td class="pl-6 py-5">
                                    <div class="font-medium text-gray-900 dark:text-white">Module 3: Practical skills check</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Video Assessment</div>
                                </td>
                                <td class="text-center">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400 text-xs font-medium">Not Started</span>
                                </td>
                                <td class="text-center font-medium text-gray-400 dark:text-gray-500">—</td>
                                <td class="pr-6 text-right">
                                    <button class="px-5 py-2.5 border border-gray-200 dark:border-gray-700 text-gray-400 dark:text-gray-500 rounded-lg text-xs font-medium cursor-not-allowed">
                                        Locked
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .tab-btn-sched.active {
        background: #ffffff;
        color: #111827;
        box-shadow: 0 1px 3px rgba(0,0,0,0.08);
    }
    .dark .tab-btn-sched.active {
        background: #111827;
        color: #ffffff;
    }
    .tab-btn-sched:not(.active) {
        color: #9ca3af;
    }
    .tab-btn-sched:not(.active):hover {
        color: #6b7280;
    }
</style>

<script>
    function switchTab(index) {
        var cal = document.getElementById('calendar-tab');
        var list = document.getElementById('list-tab');
        var btnCal = document.getElementById('tab-cal');
        var btnList = document.getElementById('tab-list');
        if (index === 0) {
            cal.classList.remove('hidden');
            list.classList.add('hidden');
            btnCal.classList.add('active');
            btnList.classList.remove('active');
        } else {
            cal.classList.add('hidden');
            list.classList.remove('hidden');
            btnList.classList.add('active');
            btnCal.classList.remove('active');
        }
    }
</script>
@endsection
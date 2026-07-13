@extends('frontend.pages.student.layouts.app')

@section('content')
<div class="max-w-full px-0 py-8">

    <!-- Greeting -->
    <div class="mb-8">
        <h1 class="text-[28px] font-medium leading-tight text-gray-900 dark:text-white">
            Hello Sudikshya 👋
        </h1>
        <p class="text-base text-gray-500 dark:text-gray-400 mt-2">
            Welcome back to your personal training portal.
        </p>
    </div>

    <!-- Tabs -->
    <div class="flex gap-8 border-b border-gray-200 dark:border-gray-800 mb-6">
        <button id="tab-schedule"
                class="tab-btn flex items-center gap-2 pb-3 text-sm font-medium text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors relative">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
            Schedule
        </button>
        <button id="tab-messages"
                class="tab-btn active flex items-center gap-2 pb-3 text-sm font-medium text-gray-900 dark:text-white transition-colors relative">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                <polyline points="22,6 12,13 2,6"/>
            </svg>
            Messages
            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
        </button>
    </div>

    <!-- Messages Pane -->
    <div id="pane-messages" class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- Unread Messages -->
        <div class="lg:col-span-7">
            <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-800 flex items-center justify-between">
                    <h5 class="font-medium text-[15px] text-gray-900 dark:text-white">Unread messages</h5>
                    <a href="#" class="text-[13px] font-medium text-gray-500 hover:text-gray-900 dark:hover:text-white transition-colors flex items-center gap-1">
                        View all
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"/>
                        </svg>
                    </a>
                </div>

                <div class="divide-y divide-gray-200 dark:divide-gray-800">
                    <!-- Message 1 -->
                    <div class="px-6 py-5 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors flex gap-4 items-start">
                        <div class="w-9 h-9 rounded-lg bg-gray-900 dark:bg-white flex-shrink-0 flex items-center justify-center text-white dark:text-gray-900 text-sm font-medium">
                            A
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-baseline">
                                <p class="font-medium text-sm text-gray-900 dark:text-white">Administrator</p>
                                <span class="text-xs text-gray-400 whitespace-nowrap">11 Jul 2026 · 09:26am</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1 line-clamp-2">
                                First Aid Certificate Notification
                            </p>
                        </div>
                        <a href="#" class="mt-1 px-4 py-2 text-[13px] font-medium bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100 text-white dark:text-gray-900 rounded-lg transition-colors">
                            Read
                        </a>
                    </div>
                    <!-- Message 2 -->
                    <div class="px-6 py-5 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors flex gap-4 items-start">
                        <div class="w-9 h-9 rounded-lg bg-gray-900 dark:bg-white flex-shrink-0 flex items-center justify-center text-white dark:text-gray-900 text-sm font-medium">
                            J
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-baseline">
                                <p class="font-medium text-sm text-gray-900 dark:text-white">John Smith</p>
                                <span class="text-xs text-gray-400 whitespace-nowrap">10 Jul 2026 · 02:15pm</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1 line-clamp-2">
                                Reminder: Your practical assessment is scheduled for next week. Please review the pre-reading materials before attending.
                            </p>
                        </div>
                        <a href="#" class="mt-1 px-4 py-2 text-[13px] font-medium bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100 text-white dark:text-gray-900 rounded-lg transition-colors">
                            Read
                        </a>
                    </div>
                    <!-- Message 3 -->
                    <div class="px-6 py-5 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors flex gap-4 items-start">
                        <div class="w-9 h-9 rounded-lg bg-gray-900 dark:bg-white flex-shrink-0 flex items-center justify-center text-white dark:text-gray-900 text-sm font-medium">
                            S
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-baseline">
                                <p class="font-medium text-sm text-gray-900 dark:text-white">Support Team</p>
                                <span class="text-xs text-gray-400 whitespace-nowrap">08 Jul 2026 · 11:00am</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1 line-clamp-2">
                                Your account password was successfully updated. If you did not make this change, please contact us immediately.
                            </p>
                        </div>
                        <a href="#" class="mt-1 px-4 py-2 text-[13px] font-medium bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100 text-white dark:text-gray-900 rounded-lg transition-colors">
                            Read
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar / Enrolments -->
        <div class="lg:col-span-5">
            <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6">
                <h5 class="font-medium text-[15px] text-gray-900 dark:text-white">My enrolments</h5>
                <p class="text-[13px] text-gray-500 dark:text-gray-400 mt-1 mb-5">
                    Click "Open course" to continue learning
                </p>

                <!-- Enrolment Card 1 -->
                <div class="bg-gray-50 dark:bg-gray-800/50 rounded-lg p-5 border border-gray-200 dark:border-gray-700 mb-4">
                    <div>
                        <span class="inline-block px-2.5 py-0.5 text-[10px] font-mono font-medium tracking-wider bg-emerald-100/60 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 rounded-md">ACTIVE</span>
                        <h4 class="mt-3 text-[17px] font-medium text-gray-900 dark:text-white leading-tight">
                            HLTAID011 Provide First Aid
                        </h4>
                    </div>
                    <div class="mt-5 space-y-0">
                        <div class="flex justify-between text-[13px] py-2.5 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-gray-400">Commences</span>
                            <span class="font-medium text-gray-700 dark:text-gray-300">Fri, 12 Jun 2026</span>
                        </div>
                        <div class="flex justify-between text-[13px] py-2.5">
                            <span class="text-gray-400">Progress</span>
                            <div class="flex items-center gap-2">
                                <div class="h-1.5 w-20 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="h-full w-full bg-emerald-500 rounded-full"></div>
                                </div>
                                <span class="text-emerald-600 dark:text-emerald-400 font-medium text-xs">100%</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col md:flex-row gap-6">
                        <a href="{{route('student.Course-details')}}" class="w-full md:w-1/2 py-3.5 bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100 text-white dark:text-gray-900 font-medium text-sm rounded-lg transition-colors flex items-center justify-center gap-2">
                            Open course
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                        <button class="w-full md:w-1/2 py-3 border border-gray-300 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-600 text-gray-700 dark:text-gray-300 font-medium text-sm rounded-lg transition-colors">
                            Leave feedback
                        </button>
                    </div>
                </div>

                <!-- Enrolment Card 2 -->
                <div class="bg-gray-50 dark:bg-gray-800/50 rounded-lg p-5 border border-gray-200 dark:border-gray-700">
                    <div>
                        <span class="inline-block px-2.5 py-0.5 text-[10px] font-mono font-medium tracking-wider bg-amber-100/60 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400 rounded-md">PENDING</span>
                        <h4 class="mt-3 text-[17px] font-medium text-gray-900 dark:text-white leading-tight">
                            HLTAID009 CPR & AED
                        </h4>
                    </div>
                    <div class="mt-5 space-y-0">
                        <div class="flex justify-between text-[13px] py-2.5 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-gray-400">Commences</span>
                            <span class="font-medium text-gray-700 dark:text-gray-300">Mon, 28 Jul 2026</span>
                        </div>
                        <div class="flex justify-between text-[13px] py-2.5">
                            <span class="text-gray-400">Progress</span>
                            <div class="flex items-center gap-2">
                                <div class="h-1.5 w-20 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="h-full w-[35%] bg-amber-500 rounded-full"></div>
                                </div>
                                <span class="text-amber-600 dark:text-amber-400 font-medium text-xs">35%</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col md:flex-row gap-6">
                        <a href="{{route('student.Course-details')}}" class="w-full md:w-1/2 py-3.5 bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100 text-white dark:text-gray-900 font-medium text-sm rounded-lg transition-colors flex items-center justify-center gap-2">
                            Open course
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                        <button class="w-full md:w-1/2 py-3 border border-gray-300 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-600 text-gray-700 dark:text-gray-300 font-medium text-sm rounded-lg transition-colors">
                            Leave feedback
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Schedule Pane -->
    <div id="pane-schedule" class="grid grid-cols-1 lg:grid-cols-12 gap-6 hidden">

        <div class="lg:col-span-7">
            <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-800 flex items-center justify-between">
                    <h5 class="font-medium text-[15px] text-gray-900 dark:text-white">Upcoming sessions</h5>
                    <a href="#" class="text-[13px] font-medium text-gray-500 hover:text-gray-900 dark:hover:text-white transition-colors flex items-center gap-1">
                        View all
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"/>
                        </svg>
                    </a>
                </div>

                <!-- Session 1 -->
                <div class="px-6 py-5 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors flex gap-4 items-start border-b border-gray-200 dark:border-gray-800">
                    <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-800 flex-shrink-0 flex flex-col items-center justify-center text-center">
                        <span class="text-[10px] font-medium text-gray-500 uppercase">Jul</span>
                        <span class="text-lg font-semibold text-gray-900 dark:text-white leading-none">15</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-sm text-gray-900 dark:text-white">Practical Assessment — HLTAID011</p>
                        <p class="text-xs text-gray-500 mt-1">09:00am — 01:00pm · Room 302, Building B</p>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="inline-block px-2 py-0.5 text-[10px] font-mono font-medium tracking-wider bg-blue-100/60 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 rounded-md">CONFIRMED</span>
                        </div>
                    </div>
                    <button class="mt-1 px-3 py-1.5 text-[12px] font-medium border border-gray-300 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg transition-colors">
                        Details
                    </button>
                </div>

                <!-- Session 2 -->
                <div class="px-6 py-5 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors flex gap-4 items-start border-b border-gray-200 dark:border-gray-800">
                    <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-800 flex-shrink-0 flex flex-col items-center justify-center text-center">
                        <span class="text-[10px] font-medium text-gray-500 uppercase">Jul</span>
                        <span class="text-lg font-semibold text-gray-900 dark:text-white leading-none">22</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-sm text-gray-900 dark:text-white">CPR Refresher — HLTAID009</p>
                        <p class="text-xs text-gray-500 mt-1">02:00pm — 04:00pm · Online via Zoom</p>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="inline-block px-2 py-0.5 text-[10px] font-mono font-medium tracking-wider bg-amber-100/60 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400 rounded-md">PENDING</span>
                        </div>
                    </div>
                    <button class="mt-1 px-3 py-1.5 text-[12px] font-medium border border-gray-300 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg transition-colors">
                        Details
                    </button>
                </div>

                <!-- Session 3 -->
                <div class="px-6 py-5 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors flex gap-4 items-start">
                    <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-800 flex-shrink-0 flex flex-col items-center justify-center text-center">
                        <span class="text-[10px] font-medium text-gray-500 uppercase">Aug</span>
                        <span class="text-lg font-semibold text-gray-900 dark:text-white leading-none">05</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-sm text-gray-900 dark:text-white">Final Theory Exam — HLTAID011</p>
                        <p class="text-xs text-gray-500 mt-1">10:00am — 12:00pm · Exam Hall A</p>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="inline-block px-2 py-0.5 text-[10px] font-mono font-medium tracking-wider bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-md">SCHEDULED</span>
                        </div>
                    </div>
                    <button class="mt-1 px-3 py-1.5 text-[12px] font-medium border border-gray-300 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg transition-colors">
                        Details
                    </button>
                </div>
            </div>
        </div>

        <div class="lg:col-span-5">
            <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6">
                <h5 class="font-medium text-[15px] text-gray-900 dark:text-white">My enrolments</h5>
                <p class="text-[13px] text-gray-500 dark:text-gray-400 mt-1 mb-5">
                    Click "Open course" to continue learning
                </p>

                <!-- Enrolment Card 1 -->
                <div class="bg-gray-50 dark:bg-gray-800/50 rounded-lg p-5 border border-gray-200 dark:border-gray-700 mb-4">
                    <div>
                        <span class="inline-block px-2.5 py-0.5 text-[10px] font-mono font-medium tracking-wider bg-emerald-100/60 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 rounded-md">ACTIVE</span>
                        <h4 class="mt-3 text-[17px] font-medium text-gray-900 dark:text-white leading-tight">
                            HLTAID011 Provide First Aid
                        </h4>
                    </div>
                    <div class="mt-5 space-y-0">
                        <div class="flex justify-between text-[13px] py-2.5 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-gray-400">Commences</span>
                            <span class="font-medium text-gray-700 dark:text-gray-300">Fri, 12 Jun 2026</span>
                        </div>
                        <div class="flex justify-between text-[13px] py-2.5">
                            <span class="text-gray-400">Progress</span>
                            <div class="flex items-center gap-2">
                                <div class="h-1.5 w-20 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="h-full w-full bg-emerald-500 rounded-full"></div>
                                </div>
                                <span class="text-emerald-600 dark:text-emerald-400 font-medium text-xs">100%</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col md:flex-row gap-6">
                        <a href="{{route('student.Course-details')}}" class="w-full md:w-1/2 py-3.5 bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100 text-white dark:text-gray-900 font-medium text-sm rounded-lg transition-colors flex items-center justify-center gap-2">
                            Open course
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                        <button class="w-full md:w-1/2 py-3 border border-gray-300 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-600 text-gray-700 dark:text-gray-300 font-medium text-sm rounded-lg transition-colors">
                            Leave feedback
                        </button>
                    </div>
                </div>

                <!-- Enrolment Card 2 -->
                <div class="bg-gray-50 dark:bg-gray-800/50 rounded-lg p-5 border border-gray-200 dark:border-gray-700">
                    <div>
                        <span class="inline-block px-2.5 py-0.5 text-[10px] font-mono font-medium tracking-wider bg-amber-100/60 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400 rounded-md">PENDING</span>
                        <h4 class="mt-3 text-[17px] font-medium text-gray-900 dark:text-white leading-tight">
                            HLTAID009 CPR & AED
                        </h4>
                    </div>
                    <div class="mt-5 space-y-0">
                        <div class="flex justify-between text-[13px] py-2.5 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-gray-400">Commences</span>
                            <span class="font-medium text-gray-700 dark:text-gray-300">Mon, 28 Jul 2026</span>
                        </div>
                        <div class="flex justify-between text-[13px] py-2.5">
                            <span class="text-gray-400">Progress</span>
                            <div class="flex items-center gap-2">
                                <div class="h-1.5 w-20 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="h-full w-[35%] bg-amber-500 rounded-full"></div>
                                </div>
                                <span class="text-amber-600 dark:text-amber-400 font-medium text-xs">35%</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col md:flex-row gap-6">
                        <a href="{{route('student.Course-details')}}" class="w-full md:w-1/2 py-3.5 bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100 text-white dark:text-gray-900 font-medium text-sm rounded-lg transition-colors flex items-center justify-center gap-2">
                            Open course
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                        <button class="w-full md:w-1/2 py-3 border border-gray-300 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-600 text-gray-700 dark:text-gray-300 font-medium text-sm rounded-lg transition-colors">
                            Leave feedback
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tab styles -->
    <style>
        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 2px;
            background: currentColor;
            border-radius: 1px;
        }
    </style>

    <!-- Tab script -->
    <script>
        (function() {
            var ts = document.getElementById('tab-schedule');
            var tm = document.getElementById('tab-messages');
            var ps = document.getElementById('pane-schedule');
            var pm = document.getElementById('pane-messages');

            ts.addEventListener('click', function() {
                ts.classList.add('active');
                ts.classList.remove('text-gray-400');
                ts.classList.add('text-gray-900','dark:text-white');
                tm.classList.remove('active','text-gray-900','dark:text-white');
                tm.classList.add('text-gray-400');
                ps.classList.remove('hidden');
                pm.classList.add('hidden');
            });

            tm.addEventListener('click', function() {
                tm.classList.add('active');
                tm.classList.remove('text-gray-400');
                tm.classList.add('text-gray-900','dark:text-white');
                ts.classList.remove('active','text-gray-900','dark:text-white');
                ts.classList.add('text-gray-400');
                pm.classList.remove('hidden');
                ps.classList.add('hidden');
            });
        })();
    </script>

</div>
@endsection

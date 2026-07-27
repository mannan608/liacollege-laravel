@extends('student.layouts.app')

@section('content')
      <div class="max-w-4xl mx-auto px-6 py-10">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">My Assignments</h1>
                <p class="text-slate-500 mt-1 text-sm">Stay on top of your tasks and deadlines</p>
            </div>
        </div>
           <!-- Stats Bar -->
        <div class="my-8 grid grid-cols-3 gap-4">
            <div class="bg-white rounded-2xl p-5 text-center border border-slate-200 shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="text-3xl font-extrabold text-slate-800">5</div>
                <div class="text-xs font-bold text-slate-500 mt-1 uppercase tracking-wider">Total Tasks</div>
            </div>
            <div class="bg-white rounded-2xl p-5 text-center border border-slate-200 shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="text-3xl font-extrabold text-amber-500">3</div>
                <div class="text-xs font-bold text-slate-500 mt-1 uppercase tracking-wider">Pending</div>
            </div>
            <div class="bg-white rounded-2xl p-5 text-center border border-slate-200 shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="text-3xl font-extrabold text-emerald-500">2</div>
                <div class="text-xs font-bold text-slate-500 mt-1 uppercase tracking-wider">Completed</div>
            </div>
        </div>

        <!-- Task 1 -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-4 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex items-start justify-between gap-5 flex-wrap">
                <div class="flex items-start gap-4 flex-1 min-w-[280px]">
                    <div class="w-12 h-12 rounded-xl bg-orange-50 border border-orange-200 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-slate-800 group-hover:text-orange-600 transition-colors duration-200">Data Analysis Report</h3>
                        <p class="text-slate-500 text-sm mt-1 leading-relaxed">Analyze Q3 sales data and create visualizations with charts</p>
                        <div class="flex items-center gap-4 mt-3 flex-wrap">
                            <span class="text-xs font-semibold text-slate-400 flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                                </svg>
                                Due: Oct 28, 2026
                            </span>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200 uppercase tracking-wide">Pending</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <button class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 bg-slate-50 hover:bg-slate-100 border border-slate-200 transition-all duration-200 flex items-center gap-2 hover:shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639l3.5-8.667A1.5 1.5 0 0 1 6.93 2h10.14a1.5 1.5 0 0 1 1.394.984l3.5 8.667a1.012 1.012 0 0 1 0 .639l-3.5 8.667A1.5 1.5 0 0 1 17.07 22H6.93a1.5 1.5 0 0 1-1.394-.984l-3.5-8.667ZM15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                        View
                    </button>
                    <button class="px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 shadow-lg shadow-orange-500/25 transition-all duration-200 flex items-center gap-2 hover:-translate-y-0.5 hover:shadow-orange-500/40">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        Submit
                    </button>
                </div>
            </div>
        </div>

        <!-- Task 2 -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-4 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex items-start justify-between gap-5 flex-wrap">
                <div class="flex items-start gap-4 flex-1 min-w-[280px]">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-200 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-slate-800 group-hover:text-blue-600 transition-colors duration-200">Research Essay</h3>
                        <p class="text-slate-500 text-sm mt-1 leading-relaxed">Write a 2000-word essay on climate change policies and impacts</p>
                        <div class="flex items-center gap-4 mt-3 flex-wrap">
                            <span class="text-xs font-semibold text-slate-400 flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                                </svg>
                                Due: Oct 30, 2026
                            </span>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200 uppercase tracking-wide">Pending</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <button class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 bg-slate-50 hover:bg-slate-100 border border-slate-200 transition-all duration-200 flex items-center gap-2 hover:shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639l3.5-8.667A1.5 1.5 0 0 1 6.93 2h10.14a1.5 1.5 0 0 1 1.394.984l3.5 8.667a1.012 1.012 0 0 1 0 .639l-3.5 8.667A1.5 1.5 0 0 1 17.07 22H6.93a1.5 1.5 0 0 1-1.394-.984l-3.5-8.667ZM15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                        View
                    </button>
                    <button class="px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600 shadow-lg shadow-blue-500/25 transition-all duration-200 flex items-center gap-2 hover:-translate-y-0.5 hover:shadow-blue-500/40">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        Submit
                    </button>
                </div>
            </div>
        </div>

        <!-- Task 3 -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-4 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex items-start justify-between gap-5 flex-wrap">
                <div class="flex items-start gap-4 flex-1 min-w-[280px]">
                    <div class="w-12 h-12 rounded-xl bg-violet-50 border border-violet-200 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-violet-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-slate-800 group-hover:text-violet-600 transition-colors duration-200">Web Development Project</h3>
                        <p class="text-slate-500 text-sm mt-1 leading-relaxed">Build a responsive landing page using React and Tailwind CSS</p>
                        <div class="flex items-center gap-4 mt-3 flex-wrap">
                            <span class="text-xs font-semibold text-slate-400 flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                                </svg>
                                Due: Nov 2, 2026
                            </span>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200 uppercase tracking-wide">Pending</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <button class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 bg-slate-50 hover:bg-slate-100 border border-slate-200 transition-all duration-200 flex items-center gap-2 hover:shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639l3.5-8.667A1.5 1.5 0 0 1 6.93 2h10.14a1.5 1.5 0 0 1 1.394.984l3.5 8.667a1.012 1.012 0 0 1 0 .639l-3.5 8.667A1.5 1.5 0 0 1 17.07 22H6.93a1.5 1.5 0 0 1-1.394-.984l-3.5-8.667ZM15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                        View
                    </button>
                    <button class="px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-violet-500 to-purple-500 hover:from-violet-600 hover:to-purple-600 shadow-lg shadow-violet-500/25 transition-all duration-200 flex items-center gap-2 hover:-translate-y-0.5 hover:shadow-violet-500/40">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        Submit
                    </button>
                </div>
            </div>
        </div>

        <!-- Task 4 - Submitted -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-4 opacity-70 hover:opacity-90 transition-opacity duration-300">
            <div class="flex items-start justify-between gap-5 flex-wrap">
                <div class="flex items-start gap-4 flex-1 min-w-[280px]">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 border border-emerald-200 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-slate-800 line-through decoration-slate-400 decoration-2">Math Problem Set</h3>
                        <p class="text-slate-500 text-sm mt-1 leading-relaxed">Complete chapters 4-6 exercises with full working shown</p>
                        <div class="flex items-center gap-4 mt-3 flex-wrap">
                            <span class="text-xs font-semibold text-slate-400 flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                                </svg>
                                Submitted: Oct 20, 2026
                            </span>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 uppercase tracking-wide">Submitted</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <button class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 bg-slate-50 hover:bg-slate-100 border border-slate-200 transition-all duration-200 flex items-center gap-2 hover:shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639l3.5-8.667A1.5 1.5 0 0 1 6.93 2h10.14a1.5 1.5 0 0 1 1.394.984l3.5 8.667a1.012 1.012 0 0 1 0 .639l-3.5 8.667A1.5 1.5 0 0 1 17.07 22H6.93a1.5 1.5 0 0 1-1.394-.984l-3.5-8.667ZM15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                        View
                    </button>
                    <button disabled class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-400 bg-slate-100 border border-slate-200 cursor-not-allowed flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                        </svg>
                        Done
                    </button>
                </div>
            </div>
        </div>     
    </div>
@endsection
@extends('backend.layouts.fullscreen-layout')

@section('content')
    <div class="flex h-screen overflow-hidden">

        <aside class="w-80 lg:w-96 bg-white border-r border-slate-200 flex flex-col flex-shrink-0">

            <!-- Course Info -->
            <div class="p-6 bg-gradient-to-br from-orange-500 via-orange-600 to-red-500 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2">
                </div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2">
                </div>
                <div class="relative">
                    <div class="flex items-center gap-2 mb-3">
                        <span
                            class="px-2 py-0.5 bg-white/20 backdrop-blur-sm rounded-md text-xs font-medium">{{ $course->name }}</span>
                    </div>
                    <h2 class="text-2xl font-bold leading-snug">{{ $course->name }}</h2>
                    <p class="text-orange-100 mt-1 text-sm">{{ $module->title }}</p>
                    <div class="mt-5">
                        <div class="flex justify-between text-sm mb-2 font-medium">
                            <span class="text-orange-100">Progress</span>
                            <span>68%</span>
                        </div>
                        <div class="h-2.5 bg-white/25 rounded-full overflow-hidden backdrop-blur-sm">
                            <div
                                class="h-full w-[68%] bg-white rounded-full shadow-sm transition-all duration-700 ease-out">
                            </div>
                        </div>
                        <p class="text-xs text-orange-100 mt-2">7 of 10 lessons completed</p>
                    </div>
                </div>
            </div>

            <!-- Lesson List -->
            <div class="flex-1 overflow-y-auto scrollbar-thin">
                <div class="p-4">
                    <h3 class="text-slate-400 text-xs uppercase font-bold tracking-wider mb-4 px-2">Course Content</h3>
                    @foreach ($module->lessons as $lesson)  
                    <!-- Lesson -->
                    <div
                        class="flex items-center  gap-3 p-3 rounded-xl hover:bg-gray-50 cursor-pointer transition-all border border-gray-100 hover:border-gray-100 mb-1 group">
                        <div
                            class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center group-hover:bg-slate-200 transition-colors">
                            <svg class="w-4 h-4 text-slate-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-medium text-sm text-slate-700 group-hover:text-slate-900 truncate">{{$lesson->title}}</h4>
                            <p class="text-xs text-slate-400 mt-0.5">{{$lesson->duration}} min</p>
                        </div>
                        <div class="w-5 h-5 rounded-full border-2 border-slate-300 flex-shrink-0"></div>
                    </div>

                    @endforeach
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto bg-slate-50/50">

            <!-- Header -->
            <div class="bg-white border-b border-slate-200 sticky top-0 z-40">
                <div class="max-w-5xl mx-auto px-6 lg:px-10 py-5 flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-xs font-bold text-orange-500 uppercase tracking-wider">Lesson 1 of 10</span>
                        </div>
                        <h1 class="text-2xl lg:text-3xl font-bold text-slate-900 tracking-tight">Introduction to CPR</h1>
                    </div>
                    <div class="flex items-center gap-3">
                        <button
                            class="px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:bg-slate-50 hover:border-slate-300 transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Notes
                        </button>
                        <button
                            class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-orange-500 to-orange-600 text-white text-sm font-semibold hover:from-orange-600 hover:to-orange-700 transition-all shadow-lg shadow-orange-500/25 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Mark Complete
                        </button>
                    </div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto px-6 lg:px-10 py-8 space-y-6">

                <!-- Video Section -->
                <div
                    class="bg-slate-900 rounded-2xl overflow-hidden shadow-xl shadow-slate-900/20 ring-1 ring-slate-900/10">
                    <div class="aspect-video relative group">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                            allowfullscreen></iframe>
                    </div>
                </div>

                <!-- Content Tabs -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="border-b border-slate-100">
                        <div class="flex overflow-x-auto scrollbar-hide">
                            <button onclick="switchTab('overview')" id="tab-overview"
                                class="px-6 py-4 text-sm font-semibold text-orange-600 border-b-2 border-orange-500 whitespace-nowrap">Overview</button>
                            <button onclick="switchTab('resources')" id="tab-resources"
                                class="px-6 py-4 text-sm font-medium text-slate-500 hover:text-slate-700 border-b-2 border-transparent whitespace-nowrap transition">Resources</button>
                            <button onclick="switchTab('transcript')" id="tab-transcript"
                                class="px-6 py-4 text-sm font-medium text-slate-500 hover:text-slate-700 border-b-2 border-transparent whitespace-nowrap transition">Transcript</button>
                        </div>
                    </div>

                    <!-- Overview Tab -->
                    <div id="content-overview" class="p-6 lg:p-8">
                        <h2 class="text-xl font-bold text-slate-900 mb-4">Lesson Overview</h2>
                        <p class="text-slate-600 leading-relaxed">
                            Cardiopulmonary resuscitation (CPR) is an emergency lifesaving procedure performed when the
                            heart stops beating. Immediate CPR can double or triple chances of survival after cardiac
                            arrest.
                        </p>
                        <p class="text-slate-600 leading-relaxed mt-4">In this lesson, you will learn:</p>
                        <ul class="mt-4 space-y-3">
                            <li class="flex gap-3 items-start">
                                <div
                                    class="w-5 h-5 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-sm text-slate-700">What CPR is and why it matters</span>
                            </li>
                            <li class="flex gap-3 items-start">
                                <div
                                    class="w-5 h-5 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-sm text-slate-700">Recognizing emergency situations</span>
                            </li>
                            <li class="flex gap-3 items-start">
                                <div
                                    class="w-5 h-5 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-sm text-slate-700">Basic CPR process overview</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Resources Tab -->
                    <div id="content-resources" class="p-6 lg:p-8 hidden">
                        <div class="space-y-3">
                            <a href="#"
                                class="flex items-center gap-4 p-4 rounded-xl border border-slate-200 hover:border-orange-300 hover:bg-orange-50/30 transition group">
                                <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-slate-900 group-hover:text-orange-700 transition">
                                        CPR Guidelines.pdf</p>
                                    <p class="text-xs text-slate-500">2.4 MB - PDF Document</p>
                                </div>
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-orange-500 transition" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                            <a href="#"
                                class="flex items-center gap-4 p-4 rounded-xl border border-slate-200 hover:border-orange-300 hover:bg-orange-50/30 transition group">
                                <div
                                    class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-slate-900 group-hover:text-orange-700 transition">
                                        Practice Checklist.zip</p>
                                    <p class="text-xs text-slate-500">156 KB - ZIP Archive</p>
                                </div>
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-orange-500 transition" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Transcript Tab -->
                    <div id="content-transcript" class="p-6 lg:p-8 hidden">
                        <div class="space-y-4 max-h-96 overflow-y-auto pr-2">
                            <div class="flex gap-3">
                                <span class="text-xs font-mono text-slate-400 pt-0.5 flex-shrink-0 w-10">00:00</span>
                                <p class="text-sm text-slate-600">Welcome to Introduction to CPR. In this lesson, we will
                                    cover the fundamentals of cardiopulmonary resuscitation.</p>
                            </div>
                            <div class="flex gap-3">
                                <span class="text-xs font-mono text-slate-400 pt-0.5 flex-shrink-0 w-10">02:15</span>
                                <p class="text-sm text-slate-600">CPR is a lifesaving technique that is useful in many
                                    emergencies, including heart attacks or near drownings.</p>
                            </div>
                            <div class="flex gap-3">
                                <span class="text-xs font-mono text-slate-400 pt-0.5 flex-shrink-0 w-10">05:30</span>
                                <p class="text-sm text-slate-600">The American Heart Association recommends starting with
                                    hard and fast chest compressions.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quiz Card -->
                <div
                    class="bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-700 rounded-2xl p-8 text-white relative overflow-hidden shadow-xl shadow-purple-500/20">
                    <div
                        class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2">
                    </div>
                    <div class="relative flex flex-col md:flex-row justify-between items-center gap-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold">Ready for the Quiz?</h3>
                                <p class="mt-1 text-purple-100 text-sm">Test your understanding with 10 questions before
                                    moving forward.</p>
                            </div>
                        </div>
                        <button
                            class="px-8 py-3.5 bg-white text-purple-700 rounded-xl font-bold hover:shadow-2xl hover:scale-105 transition-all flex-shrink-0">
                            Start Quiz
                        </button>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="flex justify-between pt-4">
                    <button
                        class="px-6 py-3 bg-white rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:bg-slate-50 hover:border-slate-300 transition-all flex items-center gap-2 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Previous Lesson
                    </button>
                    <button
                        class="px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl text-sm font-semibold hover:from-orange-600 hover:to-orange-700 transition-all flex items-center gap-2 shadow-lg shadow-orange-500/25">
                        Next Lesson
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </main>

    </div>
@endsection

<style>
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 20px;
    }
</style>

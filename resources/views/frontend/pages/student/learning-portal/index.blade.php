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
                        <a href="{{ route('student.lesson.resources', [$course, $module, $lesson]) }}"
                            class="flex items-center  gap-3 p-3 rounded-xl hover:bg-gray-50 cursor-pointer transition-all border border-gray-100 hover:border-gray-100 mb-1 group">
                            <div
                                class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center group-hover:bg-slate-200 transition-colors">
                                <svg class="w-4 h-4 text-slate-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-medium text-sm text-slate-700 group-hover:text-slate-900 truncate">
                                    {{ $lesson->title }}</h4>
                                <p class="text-xs text-slate-400 mt-0.5">{{ $lesson->duration }} min</p>
                            </div>
                            <div class="w-5 h-5 rounded-full border-2 border-slate-300 flex-shrink-0"></div>
                        </a>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Mark Complete
                        </button>
                    </div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto px-6 lg:px-10 py-8 space-y-6">
                {{-- show lesson content/resource --}}               

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

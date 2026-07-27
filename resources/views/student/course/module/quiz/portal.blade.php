@extends('backend.layouts.fullscreen-layout')

@section('content')
  @php
        $activeLessonId = $lesson?->id;
    @endphp
    <div class="flex h-screen overflow-hidden">

        <aside class="w-80 lg:w-96 bg-white border-r border-slate-200 flex flex-col flex-shrink-0">

            <!-- Course Info -->
            <div class="p-6 bg-gradient-to-br from-brand-500 via-brand-600 to-brand-500 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2">
                </div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2">
                </div>
                <div class="relative">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-2 py-0.5 bg-white/20 backdrop-blur-sm rounded-md text-xs font-medium">Couese
                            Name</span>
                    </div>
                    <p class="text-brand-100 mt-1 text-sm">Module Name</p>
                    <div class="mt-5">
                        <div class="flex justify-between text-sm mb-2 font-medium">
                            <span class="text-brand-100">Progress</span>
                            <span>68%</span>
                        </div>
                        <div class="h-2.5 bg-white/25 rounded-full overflow-hidden backdrop-blur-sm">
                            <div
                                class="h-full w-[68%] bg-white rounded-full shadow-sm transition-all duration-700 ease-out">
                            </div>
                        </div>
                        <p class="text-xs text-brand-100 mt-2">7 of 10 lessons completed</p>
                    </div>
                </div>
            </div>

            <!-- Lesson List -->
            <div class="flex-1 overflow-y-auto scrollbar-thin">
                <div class="p-4">
                    <h3 class="text-slate-400 text-xs uppercase font-bold tracking-wider mb-4 px-2">Course Content</h3>
                    @foreach ($module->lessons as $moduleLesson)
                        <!-- Lesson -->
                        <a href="{{ route('student.lesson.resources', [$course, $module, $moduleLesson]) }}"
                            class="flex items-center gap-3 p-3 rounded-xl cursor-pointer transition-all border mb-1 group
                            {{ $activeLessonId === $moduleLesson->slug ? 'bg-brand-50 border-brand-200' : 'hover:bg-gray-50 border-gray-100 hover:border-gray-100' }}">
                            <div
                                class="w-10 h-10 rounded-lg flex items-center justify-center transition-colors
                                {{ $activeLessonId === $moduleLesson->slug ? 'bg-brand-100 text-brand-600' : 'bg-slate-100 text-slate-500 group-hover:bg-slate-200' }}">
                                <svg class="w-4 h-4 text-slate-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4
                                    class="font-medium text-sm truncate
                                    {{ $activeLessonId === $moduleLesson->slug ? 'text-slate-900' : 'text-slate-700 group-hover:text-slate-900' }}">
                                    {{ $moduleLesson->title }}</h4>
                                <p class="text-xs text-slate-400 mt-0.5">{{ $moduleLesson->duration }} min</p>
                            </div>
                            <div
                                class="w-5 h-5 rounded-full border-2 flex-shrink-0
                                {{ $activeLessonId === $moduleLesson->slug ? 'border-brand-500 bg-brand-500' : 'border-slate-300' }}">
                            </div>
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
                            <span class="text-xs font-bold text-brand-500 uppercase tracking-wider">
                                {{ $lesson ? 'Selected Lesson' : 'Choose a lesson' }}
                            </span>
                        </div>
                        <h1 class="text-base md:text-lg lg:text-xl font-bold text-slate-900 tracking-tight">
                            {{ $lesson?->title ?? 'Lesson content will appear here' }}
                        </h1>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('student.dashboard') }}"
                            class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-brand-500 to-brand-600 text-white text-sm font-semibold hover:from-brand-600 hover:to-brand-700 transition-all shadow-lg shadow-brand-500/25 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Go to Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto px-6 lg:px-10 py-8 space-y-6">
                {{-- Render active lesson blade --}}
                <section class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 lg:p-8">
                    @if ($lessonView)
                        @include($lessonView)
                    @else
                        <p class="text-sm text-slate-500">
                            Lesson content not found.
                        </p>
                    @endif
                </section>
                {{-- <section class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 lg:p-8">
                    <p class="text-sm text-slate-500">This lesson does not have any resource sections yet.</p>
                </section> --}}

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

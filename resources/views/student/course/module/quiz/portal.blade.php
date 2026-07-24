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
                        <span
                            class="px-2 py-0.5 bg-white/20 backdrop-blur-sm rounded-md text-xs font-medium">{{ $course->name }}</span>
                    </div>
                    <h2 class="text-2xl font-bold leading-snug">{{ $course->name }}</h2>
                    <p class="text-brand-100 mt-1 text-sm">{{ $module->title }}</p>
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
                            {{ $activeLessonId === $moduleLesson->id ? 'bg-brand-50 border-brand-200' : 'hover:bg-gray-50 border-gray-100 hover:border-gray-100' }}">
                            <div
                                class="w-10 h-10 rounded-lg flex items-center justify-center transition-colors
                                {{ $activeLessonId === $moduleLesson->id ? 'bg-brand-100 text-brand-600' : 'bg-slate-100 text-slate-500 group-hover:bg-slate-200' }}">
                                <svg class="w-4 h-4 text-slate-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4
                                    class="font-medium text-sm truncate
                                    {{ $activeLessonId === $moduleLesson->id ? 'text-slate-900' : 'text-slate-700 group-hover:text-slate-900' }}">
                                    {{ $moduleLesson->title }}</h4>
                                <p class="text-xs text-slate-400 mt-0.5">{{ $moduleLesson->duration }} min</p>
                            </div>
                            <div
                                class="w-5 h-5 rounded-full border-2 flex-shrink-0
                                {{ $activeLessonId === $moduleLesson->id ? 'border-brand-500 bg-brand-500' : 'border-slate-300' }}">
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
                        {{-- <button
                            class="px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:bg-slate-50 hover:border-slate-300 transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Notes
                        </button> --}}
                        <a href="{{route('student.dashboard')}}"
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
                @if ($lesson)
                    @forelse ($lesson->resourceSections as $section)
                         @foreach ($section->resources as $resource)
                                    {{-- ================= VIDEO ================= --}}
                                    @if ($section->resource_type == 'video')
                                        @php
                                            $videoId = null;
                                            if ($resource->url) {
                                                parse_str(parse_url($resource->url, PHP_URL_QUERY), $query);
                                                $videoId = $query['v'] ?? null;
                                            }
                                        @endphp

                                        @if ($videoId)
                                            <div class="overflow-hidden rounded-2xl border shadow-sm">
                                                <div class="aspect-video">
                                                    <iframe class="w-full h-full"
                                                        src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&rel=0"
                                                        title="{{ $resource->title }}" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        allowfullscreen>
                                                    </iframe>
                                                </div>
                                                <div class="p-6">
                                                    <h3 class="text-xl font-semibold">
                                                        {{ $resource->title }}
                                                    </h3>
                                                    @if ($resource->description)
                                                        <p class="mt-3 text-slate-600">
                                                            {{ $resource->description }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    {{-- ================= CONTENT ================= --}}
                                    @if ($section->resource_type == 'content')
                                        <article class="prose max-w-none">

                                            <h2>

                                                {{ $resource->title }}

                                            </h2>

                                            {!! $resource->description !!}

                                        </article>
                                    @endif

                                    {{-- ================= FILE ================= --}}
                                    @if ($section->resource_type == 'file')
                                        <div class="rounded-xl border border-slate-200 p-5 hover:bg-slate-50 transition">

                                            <div class="flex items-center justify-between">

                                                <div class="flex items-center gap-4">

                                                    <div
                                                        class="h-14 w-14 rounded-xl bg-red-100 flex items-center justify-center text-2xl">

                                                        📄

                                                    </div>

                                                    <div>

                                                        <h3 class="font-semibold">

                                                            {{ $resource->title }}

                                                        </h3>

                                                        <p class="text-sm text-slate-500">

                                                            {{ $resource->description }}

                                                        </p>

                                                    </div>

                                                </div>

                                                <a href="{{ asset($resource->file_path) }}" target="_blank"
                                                    class="rounded-lg bg-orange-500 px-5 py-2 text-white hover:bg-orange-600">

                                                    Download

                                                </a>

                                            </div>

                                        </div>
                                    @endif
                                    {{-- ================= QUIZ ================= --}}
                                    @if ($section->resource_type == 'quiz')
                                        <div class="rounded-2xl border border-orange-200 bg-orange-50 p-8">

                                            <div class="flex items-center justify-between">

                                                <div>

                                                    <h3 class="text-2xl font-bold">

                                                        {{ $resource->title }}

                                                    </h3>

                                                    <p class="mt-3 text-slate-600">

                                                        {{ $resource->description }}

                                                    </p>

                                                </div>

                                                <div>

                                                    <a href="#"
                                                        class="rounded-xl bg-orange-500 px-6 py-3 text-white font-semibold hover:bg-orange-600">

                                                        Start Quiz

                                                    </a>

                                                </div>

                                            </div>

                                        </div>
                                    @endif
                                @endforeach
                    @empty
                        <section class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 lg:p-8">
                            <p class="text-sm text-slate-500">This lesson does not have any resource sections yet.</p>
                        </section>
                    @endforelse
                @else
                    <section class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 lg:p-8">
                        <h2 class="text-lg font-semibold text-slate-900">Select a lesson</h2>
                        <p class="mt-2 text-sm text-slate-500">
                            Choose a lesson from the left sidebar to load its content, resource sections, and resources.
                        </p>
                    </section>
                @endif

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

@extends('backend.layouts.app')

@section('content')
    <div class="mx-auto max-w-7xl p-6">
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="fixed right-5 top-5 z-50 w-full max-w-sm">
                <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
            </div>
        @endif

        <div class="mb-6 flex flex-col gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-600">Lesson resources</p>
                <h3 class="mt-1 text-2xl font-bold text-slate-900">{{ $lesson->title }}</h3>
                <p class="mt-1 text-sm text-slate-500">
                    {{ $course->name }} · {{ $module->title ?? 'Unknown module' }}
                </p>
            </div>

            <a href="{{ role_route('role.resources.create', ['course' => $course->id, 'module' => $module->id, 'lesson' => $lesson->id]) }}"
                class="inline-flex items-center justify-center rounded-xl bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-brand-700">
                + Add Lesson Resources
            </a>
        </div>

        @php
            $videoCount = $resources->where('resource_type', 'video')->count();
            $contentCount = $resources->where('resource_type', 'content')->count();
            $fileCount = $resources->where('resource_type', 'file')->count();
            $quizCount = $resources->where('resource_type', 'quiz')->count();
        @endphp

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                <div class="min-w-0">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">
                        Resource summary
                    </p>
                    <h4 class="mt-1 text-xl font-bold text-slate-900">{{ $lesson->title }}</h4>

                    <div class="mt-3 flex flex-wrap gap-2">
                        <span class="rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-700">
                            Videos: {{ $videoCount }}
                        </span>
                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                            Contents: {{ $contentCount }}
                        </span>
                        <span class="rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">
                            Files: {{ $fileCount }}
                        </span>
                        <span class="rounded-full bg-violet-50 px-3 py-1 text-xs font-semibold text-violet-700">
                            Quizzes: {{ $quizCount }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="mt-5 grid gap-3 md:grid-cols-2 xl:grid-cols-4">
                @forelse ($resources as $resource)
                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-sm font-semibold text-slate-800">{{ $resource->title }}</p>
                            <span class="rounded-full px-2.5 py-1 text-[11px] font-semibold uppercase tracking-wider
                                @class([
                                    'bg-red-100 text-red-700' => $resource->resource_type === 'video',
                                    'bg-emerald-100 text-emerald-700' => $resource->resource_type === 'content',
                                    'bg-amber-100 text-amber-700' => $resource->resource_type === 'file',
                                    'bg-violet-100 text-violet-700' => $resource->resource_type === 'quiz',
                                ])">
                                {{ $resource->resource_type }}
                            </span>
                        </div>

                        <div class="mt-3 text-sm text-slate-600">
                            @if ($resource->resource_type === 'video')
                                <a href="{{ $resource->url }}" target="_blank" class="text-brand-600 hover:underline">
                                    {{ $resource->url }}
                                </a>
                            @elseif ($resource->resource_type === 'content')
                                <div class="line-clamp-3">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($resource->description ?? ''), 120) }}
                                </div>
                            @elseif ($resource->resource_type === 'file')
                                @if ($resource->file_url)
                                    <a href="{{ $resource->file_url }}" target="_blank" class="text-brand-600 hover:underline">
                                        {{ basename($resource->file_path) }}
                                    </a>
                                @else
                                    <span class="text-slate-400">No file attached</span>
                                @endif
                            @else
                                <span>Quiz ID: {{ $resource->url }}</span>
                            @endif
                        </div>

                        <div class="mt-4 flex gap-2">
                            <a href="{{ role_route('role.resources.edit', ['course' => $course->id, 'module' => $module->id, 'lesson' => $lesson->id, 'resource' => $resource->id]) }}"
                                class="rounded-lg border border-slate-300 bg-white px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                                Edit
                            </a>
                            <form action="{{ role_route('role.resources.destroy', ['course' => $course->id, 'module' => $module->id, 'lesson' => $lesson->id, 'resource' => $resource->id]) }}"
                                method="POST" onsubmit="return confirm('Delete this resource?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-100">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="rounded-xl border border-dashed border-slate-300 bg-slate-50 px-4 py-8 text-center text-sm text-slate-500 md:col-span-2 xl:col-span-4">
                        No resources attached to this lesson yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

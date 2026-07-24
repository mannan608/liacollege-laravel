@extends('student.layouts.app')

@section('content')
    <div>
        <div class="mb-10">
            <div class="bg-white mb-6">
                <div class="px-6 py-8">
                    <h1 class="text-2xl font-semibold text-gray-900 tracking-tight">
                        {{ $course->name }}
                    </h1>
                    <p class="mt-1 text-sm text-gray-500">
                        Course content modules
                    </p>
                </div>
            </div>

            <div id="category-tabs" class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                @forelse ($course->coursecontentcategories as $category)
                    <button onclick="scrollToCategory({{ $category->id }})"
                        class="category-tab shrink-0 group px-6 py-4 bg-white border border-gray-200 rounded-xl hover:border-brand-500 transition-all duration-300 focus:outline-none focus:ring-0 focus:ring-brand-500 focus:ring-offset-0 min-w-65"
                        data-category-id="{{ $category->id }}">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-linear-to-br from-brand-500 to-brand-600 rounded-2xl flex items-center justify-center text-white shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14-4H5m14 8H5m14 4H5" />
                                </svg>
                            </div>

                            <div class="text-left min-w-0">
                                <h3
                                    class="font-semibold text-slate-800 group-hover:text-brand-600 transition-colors line-clamp-1 text-base md:text-lg lg:text-xl">
                                    {{ $category->name }}
                                </h3>
                                <p class="text-xs text-slate-500 mt-0.5 group-hover:text-brand-600 transition-colors">
                                    {{ $course->name }}
                                </p>
                            </div>
                        </div>
                    </button>
                @empty
                    <div class="rounded-lg px-6 py-8 text-center bg-white border border-gray-200 lg:col-span-2">
                        <h3 class="mt-3 text-lg font-semibold text-gray-800">
                            No content available
                        </h3>
                        <p class="mt-2 text-sm text-gray-600">
                            This course does not have any published content modules yet.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="mt-6 flex flex-col gap-6 md:gap-8 lg:gap-10 w-full max-w-4xl">
            @forelse ($course->coursecontentcategories as $category)
                <div id="category-{{ $category->id }}"
                    class="category-section scroll-mt-24 bg-white rounded-xl border border-slate-100 overflow-hidden">
                    <div class="bg-linear-to-r from-brand-500 to-brand-500 px-4 py-5 sm:px-6 sm:py-6 lg:px-8">
                        <div class="flex items-center justify-between gap-4">
                            <div class="min-w-0">
                                <h2 class="truncate font-bold text-white text-base md:text-lg lg:text-xl">
                                    {{ $category->name }}
                                </h2>
                                <p class="mt-1 text-xs text-white/80">
                                    {{ $course->name }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 sm:p-5 lg:p-6">
                        @if ($category->sections->isNotEmpty())
                            <div class="space-y-4 sm:space-y-6 lg:space-y-8">
                                @foreach ($category->sections as $section)
                                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-50/60">
                                        <div class="border-b border-slate-200 bg-white px-4 py-3 sm:px-5 sm:py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 11H5m14-4H5m14 8H5m14 4H5" />
                                                    </svg>
                                                </div>

                                                <div class="min-w-0">
                                                    <h3 class="truncate font-semibold text-slate-800 text-base md:text-lg lg:text-xl">
                                                        {{ $section->section_name }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="divide-y divide-slate-200 bg-white">
                                            @foreach ($section->rows as $row)
                                                <div class="group px-4 py-4 transition-all duration-200 sm:px-5 sm:py-5">
                                                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                                                        <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:gap-4">
                                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-500 group-hover:bg-brand-50 group-hover:text-brand-600 transition-colors">
                                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                                                </svg>
                                                            </div>

                                                            <div class="min-w-0">
                                                                @if (!empty($row->data['link']))
                                                                    <a href="{{ $row->data['link'] }}"
                                                                        target="_blank"
                                                                        rel="noopener noreferrer"
                                                                        class="line-clamp-1 text-sm md:text-base text-gray-500 underline hover:text-brand-600 leading-relaxed font-medium">
                                                                        {{ $row->data['text'] ?? 'Open resource' }}
                                                                    </a>
                                                                @else
                                                                    <span class="text-sm md:text-base text-gray-500 leading-relaxed font-medium line-clamp-1">
                                                                        {{ $row->data['text'] ?? '' }}
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        @if (!empty($row->data['file']))
                                                            <div class="flex items-baseline gap-4 shrink-0">
                                                                <a href="{{ asset($row->data['file']) }}"
                                                                    target="_blank"
                                                                    class="inline-flex items-center gap-1.5 rounded-lg bg-brand-500 px-3.5 py-2 text-sm font-medium text-white hover:bg-brand-800 transition-colors focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-1">
                                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                                    </svg>
                                                                   Download
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="rounded-lg px-6 py-8 text-center">
                                <h3 class="mt-3 text-lg font-semibold text-gray-800">
                                    No sections available
                                </h3>
                                <p class="mt-2 text-sm text-gray-600">
                                    This category has not been populated with sections yet.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="rounded-lg px-6 py-8 text-center">
                    <h3 class="mt-3 text-lg font-semibold text-gray-800">
                        No Permission
                    </h3>
                    <p class="mt-2 text-sm text-gray-600">
                        You don't have permission to access this course yet.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

<script>
    function scrollToCategory(categoryId) {
        const element = document.getElementById(`category-${categoryId}`);

        if (element) {
            const headerOffset = 100;
            const elementPosition = element.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.scrollY - headerOffset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    }
</script>

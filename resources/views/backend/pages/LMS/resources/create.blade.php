@extends('backend.layouts.app')

@php
    $isEdit = ! is_null($resource);
    $selectedLesson = old('lesson_id', $resource->lesson_id ?? request('lesson_id', ''));
    $selectedType = old('resource_type', $resource->resource_type ?? 'pdf');
    $selectedOrder = old('sort_order', $resource->sort_order ?? 0);
@endphp

@section('content')
    <div class="mx-auto max-w-3xl p-6">

        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="fixed right-5 top-5 z-50 w-full max-w-sm">
                <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                <p class="font-semibold">Please review the highlighted fields and try again.</p>
                <ul class="mt-2 list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-6 flex items-center justify-between rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-600">{{ $isEdit ? 'Edit' : 'Create' }}</p>
                <h3 class="mt-1 text-2xl font-bold text-gray-900">{{ $pageTitle ?? 'Lesson Resource' }}</h3>
                <p class="mt-1 text-sm text-gray-500">{{ $course->name }}</p>
            </div>

            <a href="{{ role_route('role.resources.index', ['course' => $course->id]) }}"
                class="inline-flex items-center justify-center rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition-colors hover:bg-gray-50">
                Back
            </a>
        </div>

        <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data" class="space-y-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            @csrf
            @if ($formMethod !== 'POST')
                @method($formMethod)
            @endif

            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-600">Lesson</label>
                <select name="lesson_id"
                    class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 outline-none focus:border-brand-500">
                    <option value="">Select lesson</option>
                    @foreach ($lessons as $lesson)
                        <option value="{{ $lesson->id }}" {{ (string) $selectedLesson === (string) $lesson->id ? 'selected' : '' }}>
                            {{ $lesson->module->title ?? '' }} &raquo; {{ $lesson->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-600">Title</label>
                <input type="text" name="title" value="{{ old('title', $resource->title ?? '') }}"
                    placeholder="e.g. Introduction video"
                    class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-brand-500">
            </div>

            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-600">Resource type</label>
                <select name="resource_type"
                    class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 outline-none focus:border-brand-500">
                    @foreach ($resourceTypes as $type)
                        <option value="{{ $type }}" {{ $selectedType === $type ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-600">
                    File {{ $isEdit ? '(leave empty to keep current)' : '' }}
                </label>
                <input type="file" name="file"
                    class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 outline-none focus:border-brand-500">
                @if ($isEdit && $resource->file_path)
                    <p class="text-xs text-gray-500">
                        Current:
                        <a href="{{ $resource->file_url }}" target="_blank" class="text-brand-600 hover:underline">
                            {{ basename($resource->file_path) }}
                        </a>
                    </p>
                @endif
            </div>

            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-600">Sort order</label>
                <input type="number" name="sort_order" min="0" value="{{ $selectedOrder }}"
                    class="w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-800 outline-none focus:border-brand-500">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-600 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-brand-500/25 transition-all hover:bg-brand-700">
                    {{ $submitLabel ?? 'Save Resource' }}
                </button>
            </div>
        </form>
    </div>
@endsection

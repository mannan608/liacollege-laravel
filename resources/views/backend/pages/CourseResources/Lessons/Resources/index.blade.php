@extends('backend.layouts.app')

@section('content')

<div class="mx-auto max-w-7xl p-6">

    <div class="mb-6 flex items-center justify-between">

        <div>
            <h2 class="text-2xl font-bold text-slate-900">
                Lesson Resources
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                {{ $lesson->title }}
            </p>
        </div>

        <a href="{{ role_route('role.resources.create', [
            'course' => $course->id,
            'module' => $module->id,
            'lesson' => $lesson->id,
        ]) }}"
            class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-700">

            + Add Resource

        </a>

    </div>

    @include(
        'backend.pages.CourseResources.Lessons.Resources.table',
        [
            'items'  => $sections,
            'course' => $course,
            'module' => $module,
            'lesson' => $lesson,
        ]
    )

</div>

@endsection
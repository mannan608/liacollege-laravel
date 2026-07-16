@extends('backend.layouts.app')

@section('content')
    <div class="">

          @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="fixed top-3 right-5 z-99999 w-full max-w-sm">
                <div class="relative">
                    <button @click="show = false" class="absolute top-3 right-3 z-10 text-gray-500 hover:text-gray-700">
                        ✕
                    </button>

                    <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
                </div>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Lesson Resources</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage resources for lessons of this course.
                </p>
            </div>
            <a  href="{{ role_route('role.resources.create', ['course' => $course->id]) }}"
                class="px-4 py-2 bg-brand-600 text-white rounded-lg text-sm font-medium hover:bg-brand-600 transition-colors">
                + Add New Resource
            </a>
        </div>

        @if ($resources->isEmpty())
            <div class="rounded-xl border border-gray-200 bg-white p-10 text-center text-sm text-gray-400">
                No resources yet. Click "Add New Resource" to get started.
            </div>
        @else
            <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        <tr>
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Lesson</th>
                            <th class="px-4 py-3">Module</th>
                            <th class="px-4 py-3">Type</th>
                            <th class="px-4 py-3">File</th>
                            <th class="px-4 py-3">Order</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($resources as $resource)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-500">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 font-medium text-gray-800">{{ $resource->title }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $resource->lesson->title ?? '-' }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $resource->lesson->module->title ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    <span class="rounded-full bg-brand-50 px-3 py-1 text-xs font-medium uppercase text-brand-700">
                                        {{ $resource->resource_type }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    @if ($resource->file_path)
                                        <a href="{{ $resource->file_url }}" target="_blank"
                                            class="text-brand-600 hover:underline">View</a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-gray-600">{{ $resource->sort_order }}</td>
                                <td class="px-4 py-3 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ role_route('role.resources.edit', ['course' => $course->id, 'resource' => $resource->id]) }}"
                                            class="rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-xs font-medium text-gray-600 hover:bg-gray-50">
                                            Edit
                                        </a>
                                        <form method="POST"
                                            action="{{ role_route('role.resources.destroy', ['course' => $course->id, 'resource' => $resource->id]) }}"
                                            onsubmit="return confirm('Delete this resource?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-medium text-red-600 hover:bg-red-100">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $resources->links() }}
            </div>
        @endif
    </div>
@endsection

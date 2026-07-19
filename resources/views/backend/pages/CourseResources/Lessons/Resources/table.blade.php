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


        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">

            <table class="w-full text-left">

                <thead class="border-b border-slate-200 bg-slate-50">

                    <tr>

                        <th class="px-5 py-4 text-xs uppercase text-slate-500">
                            ID
                        </th>

                        <th class="px-5 py-4 text-xs uppercase text-slate-500">
                            Title
                        </th>

                        <th class="px-5 py-4 text-xs uppercase text-slate-500">
                            Type
                        </th>

                        <th class="px-5 py-4 text-xs uppercase text-slate-500">
                            Status
                        </th>

                        <th class="px-5 py-4 text-right text-xs uppercase text-slate-500">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($resources as $resource)

                        <tr class="hover:bg-slate-50">

                            <td class="px-5 py-4 text-sm">
                                {{ $resource->id }}
                            </td>

                            <td class="px-5 py-4 text-sm font-medium text-slate-700">
                                {{ $resource->title }}
                            </td>

                            <td class="px-5 py-4">

                                <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">

                                    {{ ucfirst($resource->resource_type) }}

                                </span>

                            </td>

                            <td class="px-5 py-4">

                                @if ($resource->status)

                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs text-gray-600">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <td class="px-5 py-4">

                                <div class="flex justify-end gap-2">

                                    <a href="{{ role_route('role.resources.edit', [
                                        'course' => $course->id,
                                        'module' => $module->id,
                                        'lesson' => $lesson->id,
                                        'resource' => $resource->id,
                                    ]) }}"
                                        class="rounded-lg p-2 text-gray-500 hover:bg-blue-50 hover:text-blue-600">

                                        Edit

                                    </a>


                                    <form action="{{ role_route('role.resources.destroy', [
                                        'course' => $course->id,
                                        'module' => $module->id,
                                        'lesson' => $lesson->id,
                                        'resource' => $resource->id,
                                    ]) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            onclick="return confirm('Delete this resource?')"
                                            class="rounded-lg p-2 text-gray-500 hover:bg-red-50 hover:text-red-600">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
                                class="px-5 py-10 text-center text-sm text-slate-500">

                                No resources found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="border-t border-slate-200 px-5 py-4">

                {{ $resources->links() }}

            </div>

        </div>

    </div>

@endsection
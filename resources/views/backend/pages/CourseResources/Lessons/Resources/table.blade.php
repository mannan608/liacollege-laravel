<div class="overflow-hidden rounded-xl border border-slate-200 bg-white">

    <table class="w-full text-left">

        <thead class="border-b border-slate-200 bg-slate-50">

            <tr>

                <th class="px-5 py-4 text-xs uppercase text-slate-500">
                    ID
                </th>

                <th class="px-5 py-4 text-xs uppercase text-slate-500">
                    Section Title
                </th>

                <th class="px-5 py-4 text-xs uppercase text-slate-500">
                    Type
                </th>

                <th class="px-5 py-4 text-xs uppercase text-slate-500">
                    Resources
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

            @forelse($items as $item)
                <tr class="hover:bg-slate-50">

                    <td class="px-5 py-4 text-sm">
                        {{ $item->id }}
                    </td>

                    <td class="px-5 py-4 text-sm font-medium text-slate-700">
                        {{ $item->title }}
                    </td>

                    <td class="px-5 py-4">

                        <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
                            {{ ucfirst($item->resource_type) }}
                        </span>

                    </td>

                    <td class="px-5 py-4">

                        <span class="rounded-full bg-indigo-100 px-3 py-1 text-xs font-medium text-indigo-700">
                            {{ $item->resources->count() }}
                        </span>

                    </td>

                    <td class="px-5 py-4">

                        @if ($item->status)
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
                                'resource' => $item->id,
                            ]) }}"
                                class="p-2 text-gray-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-500/10 rounded-lg transition-all">
                                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>

                            <form
                                action="{{ role_route('role.resources.destroy', [
                                    'course' => $course->id,
                                    'module' => $module->id,
                                    'lesson' => $lesson->id,
                                    'resource' => $item->id,
                                ]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition-all"
                                    onclick="return confirm('Delete this resource?')">

                                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>

                                </button>
                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="px-5 py-10 text-center text-sm text-slate-500">

                        No resource sections found.

                    </td>

                </tr>
            @endforelse

        </tbody>

    </table>

    <div class="border-t border-slate-200 px-5 py-4">

        {{ $items->links() }}

    </div>

</div>

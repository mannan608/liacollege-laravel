@php
    $collection =
        $items instanceof \Illuminate\Pagination\AbstractPaginator ? $items->getCollection() : collect($items);

    $routeRole = request()->route('role');

    $tableRowData = $collection
        ->map(function ($course) use ($routeRole) {
            return [
                'id' => $course->id,
                'name' => $course->name,
                'permission_roles' => $course->permissionRoles
                    ->map(function ($permissionRole) use ($course, $routeRole) {
                        return [
                            'id' => $permissionRole->id,
                            'name' => $permissionRole->name,
                            'edit_url' => route('role.course-permissions.edit', [
                                'role' => $routeRole,
                                'course' => $course,
                                'permission_role' => $permissionRole,
                            ]),
                        ];
                    })
                    ->values(),
            ];
        })
        ->values();
@endphp

<div x-data="{ tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }}, courseBaseUrl: {{ \Illuminate\Support\Js::from(url('/' . $routeRole . '/courses')) }}, coursePermissionBaseUrl: {{ \Illuminate\Support\Js::from(url('/' . $routeRole . '/course-permissions')) }} }">
    <div class="overflow-hidden rounded-xl border border-gray-100 bg-white dark:border-white/5">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full border-collapse text-left">
                <thead class="border-b border-gray-100 bg-gray-50 dark:border-white/5 dark:bg-white/2">
                    <tr>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-gray-500">Id</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-gray-500">Name</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-gray-500">Permission Roles</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-gray-500 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-white/5">
                    <template x-if="tableRowData.length === 0">
                        <tr>
                            <td colspan="4" class="px-5 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                                No course records found.
                            </td>
                        </tr>
                    </template>
                    <template x-for="row in tableRowData" :key="row.id">
                        <tr class="transition-colors hover:bg-gray-50/50 dark:hover:bg-white/1">
                            <td class="px-5 py-4">
                                <span class="rounded bg-gray-100 px-2 py-1 font-mono text-xs text-gray-600 dark:bg-gray-800 dark:text-gray-400" x-text="row.id"></span>
                            </td>
                            <td class="px-5 py-4 text-sm text-gray-700 dark:text-gray-300" x-text="row.name"></td>
                            <td class="px-5 py-4 text-sm text-gray-500 dark:text-gray-400">
                                <template x-if="row.permission_roles.length === 0">
                                    <span class="text-gray-400">No Roles</span>
                                </template>
                                <template x-for="permRole in row.permission_roles" :key="permRole.id">
                                    <a :href="permRole.edit_url" class="mr-1 inline-block">
                                        <span class="inline-block rounded bg-blue-100 px-2 py-1 text-xs text-blue-700" x-text="permRole.name"></span>
                                    </a>
                                </template>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <a :href="coursePermissionBaseUrl + '/' + row.id + '/create'"
                                    class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white">
                                    Create Permission
                                </a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        @if ($items instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="border-t border-gray-100 px-5 py-4 dark:border-white/5">
                {{ $items->links() }}
            </div>
        @endif
    </div>
</div>
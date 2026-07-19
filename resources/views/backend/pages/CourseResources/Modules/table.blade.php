@php
    $collection =
        $items instanceof \Illuminate\Pagination\AbstractPaginator
            ? $items->getCollection()
            : collect($items);

    $tableRowData = $collection
        ->map(function ($module) {
            return [
                'id' => $module->id,
                'title' => $module->title,
            ];
        })
        ->values();

    $role = request()->route('role');
@endphp

<div x-data="{
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},

    moduleBaseUrl: {{ \Illuminate\Support\Js::from(
        url('/' . $role . '/courses/' . $course->id . '/modules')
    ) }},

    showDeleteModal: false,
    rowToDelete: null,

    openDeleteModal(row) {
        this.rowToDelete = row;
        this.showDeleteModal = true;
    },

    closeDeleteModal() {
        this.showDeleteModal = false;
        this.rowToDelete = null;
    },

    confirmDelete() {
        if (!this.rowToDelete) return;

        this.$refs.deleteForm.submit();
    }
}" @keydown.escape.window="closeDeleteModal()">

    {{-- Delete Form --}}
    <form x-ref="deleteForm"
        :action="rowToDelete ? (moduleBaseUrl + '/' + rowToDelete.id) : '#'"
        method="POST"
        class="hidden">

        @csrf
        @method('DELETE')
    </form>


    {{-- Delete Modal --}}
    <div x-show="showDeleteModal"
        x-cloak
        class="fixed inset-0 z-[99999]">

        <div class="absolute inset-0 bg-gray-900/50"
            @click="closeDeleteModal()">
        </div>

        <div class="absolute inset-0 flex items-center justify-center p-4">

            <div class="w-full max-w-md rounded-xl border border-gray-200 bg-white shadow-xl dark:border-gray-800 dark:bg-gray-900">

                <div class="p-5">

                    <div class="text-base font-semibold text-gray-800 dark:text-white/90">
                        Delete Course Module?
                    </div>

                    <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        This will permanently delete module:

                        <span class="font-semibold text-gray-800 dark:text-white"
                            x-text="rowToDelete ? rowToDelete.title : ''">
                        </span>
                    </div>

                    <div class="mt-5 flex justify-end gap-3">

                        <button type="button"
                            @click="closeDeleteModal()"
                            class="inline-flex items-center justify-center rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800">

                            Cancel
                        </button>

                        <button type="button"
                            @click="confirmDelete()"
                            class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">

                            Delete
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Table --}}
    <div class="overflow-hidden rounded-xl border border-gray-100 bg-white dark:border-white/[0.05]">

        <div class="max-w-full overflow-x-auto">

            <table class="w-full border-collapse text-left">

                <thead class="border-b border-gray-100 bg-gray-50 dark:border-white/[0.05] dark:bg-white/[0.02]">

                    <tr>

                        <th class="px-5 py-4 text-xs font-medium uppercase text-gray-500">
                            ID
                        </th>

                        <th class="px-5 py-4 text-xs font-medium uppercase text-gray-500">
                            Module Name
                        </th>

                          <th class="px-5 py-4 text-xs font-medium uppercase text-gray-500">
                           Add Lesson
                        </th>

                        <th class="px-5 py-4 text-right text-xs font-medium uppercase text-gray-500">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100 dark:divide-white/[0.05]">

                    {{-- Empty State --}}
                    <template x-if="tableRowData.length === 0">

                        <tr>

                            <td colspan="3"
                                class="px-5 py-10 text-center text-sm text-gray-500 dark:text-gray-400">

                                No module records found.

                            </td>

                        </tr>

                    </template>


                    {{-- Rows --}}
                    <template x-for="row in tableRowData"
                        :key="row.id">

                        <tr class="transition-colors hover:bg-gray-50">

                            <td class="px-5 py-4">

                                <span class="rounded bg-gray-100 px-2 py-1 font-mono text-xs">

                                    <span x-text="row.id"></span>

                                </span>

                            </td>

                            <td class="px-5 py-4 text-sm text-gray-700"
                                x-text="row.title">
                            </td>

                            <td class="px-5 py-4 text-sm text-gray-700" >
                                <a :href="moduleBaseUrl + '/' + row.id + '/lessons'"
                            class="inline-flex items-center gap-1.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-1.5 text-xs font-medium text-gray-600 dark:text-gray-300 shadow-sm transition-all hover:border-indigo-300 hover:text-indigo-600 dark:hover:text-indigo-400 hover:shadow">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add lesson
                        </a>

                            </td>

                            <td class="px-5 py-4">

                                <div class="flex justify-end gap-2">

                                    {{-- Edit --}}
                                    @can('course.edit')

                                        <a :href="moduleBaseUrl + '/' + row.id + '/edit'"
                                            class="rounded-lg p-2 text-gray-500 hover:bg-blue-50 hover:text-blue-600">

                                            <svg class="size-5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />

                                            </svg>

                                        </a>

                                    @endcan


                                    {{-- Delete --}}
                                    @can('course.edit')

                                        <button type="button"
                                            @click="openDeleteModal(row)"
                                            class="rounded-lg p-2 text-gray-500 hover:bg-red-50 hover:text-red-600">

                                            <svg class="size-5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />

                                            </svg>

                                        </button>

                                    @endcan

                                </div>

                            </td>

                        </tr>

                    </template>

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if ($items instanceof \Illuminate\Pagination\AbstractPaginator)

            <div class="border-t border-gray-100 px-5 py-4 dark:border-white/[0.05]">

                {{ $items->links() }}

            </div>

        @endif

    </div>

</div>
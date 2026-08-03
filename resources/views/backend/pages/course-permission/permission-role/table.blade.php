@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;

    $collection =
        $items instanceof \Illuminate\Pagination\AbstractPaginator ? $items->getCollection() : collect($items);

    $tableRowData = $collection
        ->map(function ($course) {
            return [
                'id' => $course->id,
                'name' => $course->name,                
            ];
        })
        ->values();

    // dd($tableRowData);
    $role = request()->route('role');
@endphp

<div x-data="{
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},
    courseBaseUrl: {{ \Illuminate\Support\Js::from(url('/' . $role . '/courses')) }},
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
    },

}" @keydown.escape.window="closeDeleteModal()">
    <form x-ref="deleteForm" :action="rowToDelete ? (courseBaseUrl + '/' + rowToDelete.id) : '#'" method="POST"
        class="hidden">
        @csrf
        @method('DELETE')
    </form>

    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-99999">
        <div class="absolute inset-0 bg-gray-900/50" @click="closeDeleteModal()"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div
                class="w-full max-w-md rounded-xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 shadow-xl">
                <div class="p-5">
                    <div class="text-base font-semibold text-gray-800 dark:text-white/90">Delete course?</div>
                    <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        This will permanently delete course:
                        <span class="font-mono" x-text="rowToDelete ? rowToDelete.name : ''"></span>
                    </div>
                    <div class="mt-5 flex justify-end gap-3">
                        <button type="button" @click="closeDeleteModal()"
                            class="inline-flex items-center justify-center rounded-lg border border-gray-300 dark:border-gray-700 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800">
                            Cancel
                        </button>
                        <button type="button" @click="confirmDelete()"
                            class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-gray-100 dark:border-white/5 bg-white">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 dark:bg-white/2 border-b border-gray-100 dark:border-white/5">
                    <tr>
                        <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                        <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Course
                            Resources</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-white/5">
                    <template x-if="tableRowData.length === 0">
                        <tr>
                            <td colspan="7" class="px-5 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                                No course records found.
                            </td>
                        </tr>
                    </template>
                    <template x-for="row in tableRowData" :key="row.id">
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-white/1 transition-colors">
                            <td class="px-5 py-4">
                                <span
                                    class="px-2 py-1 bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded text-xs font-mono"
                                    x-text="row.id"></span>
                            </td>
                            
                            <td class="px-5 py-4 text-sm text-gray-700 dark:text-gray-300" x-text="row.name"></td>
                            
                            <td class="px-5 py-4 text-sm text-gray-500 dark:text-gray-400">
                                <div class="flex gap-4">                                   
                                    <a :href="courseBaseUrl + '/' + row.id + '/permission-roles'"
                                        class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white">
                                        Create Permission
                                    </a>
                                </div>
                            </td>                            
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

</div>

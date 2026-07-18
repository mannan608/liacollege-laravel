@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;

    $collection = $items instanceof \Illuminate\Pagination\AbstractPaginator 
        ? $items->getCollection() 
        : collect($items);

    $tableRowData = $collection->map(function ($module) {
        return [
            'id' => $module->id,
            'title' => $module->title,          // Fixed: was 'name', now matches display
            'created_at' => $module->created_at,
            'lessons_count' => count($module->lessons ?? []),
            'lessons' => collect($module->lessons ?? [])->map(function ($lesson) {
                return [
                    'id' => $lesson->id,
                    'title' => $lesson->title,
                    'type' => $lesson->lesson_types[0] ?? 'text',
                    'duration' => $lesson->duration,
                    'status' => $lesson->status,
                ];
            })->values(),
        ];
    })->values();

    $role = request()->route('role');
@endphp

<div x-data="{
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},
    courseBaseUrl: {{ \Illuminate\Support\Js::from(url('/' . $role . '/courses')) }},
    courseId: {{ $course->id }},
    showDeleteModal: false,
    rowToDelete: null,
    expandedRow: null,

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

    toggleExpand(rowId) {
        this.expandedRow = this.expandedRow === rowId ? null : rowId;
    },

    formatDate(dateString) {
        return new Date(dateString).toLocaleDateString('en-US', { 
            month: 'short', day: 'numeric', year: 'numeric' 
        });
    }
}" @keydown.escape.window="closeDeleteModal()">

    {{-- Delete Modal --}}
    <form x-ref="deleteForm"
        :action="rowToDelete
            ? (courseBaseUrl + '/' + courseId + '/module/' + rowToDelete.id)
            : '#'" 
        method="POST"
        class="hidden">
        @csrf
        @method('DELETE')
    </form>

    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-[9999]">
        <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" 
             @click="closeDeleteModal()"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="w-full max-w-md rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 shadow-2xl transform transition-all"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100">
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-red-100 dark:bg-red-900/30 rounded-full">
                            <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="text-lg font-semibold text-gray-900 dark:text-white">Delete Module?</div>
                    </div>
                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        This will permanently delete module 
                        <span class="font-semibold text-gray-900 dark:text-gray-200" x-text="rowToDelete ? rowToDelete.title : ''"></span>
                        <span x-show="rowToDelete && rowToDelete.lessons_count > 0">
                            and its <span class="font-semibold" x-text="rowToDelete.lessons_count"></span> lesson(s)
                        </span>.
                        This action cannot be undone.
                    </div>
                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" @click="closeDeleteModal()"
                            class="inline-flex items-center justify-center rounded-xl border border-gray-300 dark:border-gray-700 px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            Cancel
                        </button>
                        <button type="button" @click="confirmDelete()"
                            class="inline-flex items-center justify-center rounded-xl bg-red-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-red-700 shadow-lg shadow-red-600/20 transition-all">
                            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Delete Module
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Table Container --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 shadow-sm">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50/80 dark:bg-gray-800/50 border-b border-gray-200 dark:border-gray-700">
                    <tr>
                        <th class="px-5 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider w-16">ID</th>
                        <th class="px-5 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Module Name</th>
                        <th class="px-5 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-center">Lessons</th>
                        <th class="px-5 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Created</th>
                        <th class="px-5 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    {{-- Empty State --}}
                    <template x-if="tableRowData.length === 0">
                        <tr>
                            <td colspan="5" class="px-5 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400 dark:text-gray-500">
                                    <svg class="w-12 h-12 mb-3 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                    <p class="text-sm font-medium">No modules found</p>
                                    <p class="text-xs mt-1">Get started by creating your first module</p>
                                </div>
                            </td>
                        </tr>
                    </template>

                    {{-- Data Rows --}}
                    <template x-for="row in tableRowData" :key="row.id">
                        <div>
                            {{-- Main Row --}}
                            <tr class="hover:bg-gray-50/60 dark:hover:bg-gray-800/40 transition-colors group">
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center justify-center px-2.5 py-1 bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-lg text-xs font-mono font-medium min-w-[2.5rem]">
                                        #<span x-text="row.id"></span>
                                    </span>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <button @click="toggleExpand(row.id)" 
                                                class="p-1 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                                                :class="{ 'rotate-90': expandedRow === row.id }">
                                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" 
                                                 :class="{ 'rotate-90 text-gray-600': expandedRow === row.id }"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </button>
                                        <div>
                                            <div class="text-sm font-semibold text-gray-900 dark:text-gray-100" x-text="row.title"></div>
                                            <div class="text-xs text-gray-500 dark:text-gray-500 mt-0.5" x-show="row.lessons_count > 0">
                                                <span x-text="row.lessons_count"></span> lesson<span x-show="row.lessons_count !== 1">s</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium"
                                          :class="row.lessons_count > 0 ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300' : 'bg-gray-100 text-gray-500 dark:bg-gray-800 dark:text-gray-500'">
                                        <span x-text="row.lessons_count"></span>
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-sm text-gray-500 dark:text-gray-400" x-text="formatDate(row.created_at)"></td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex justify-end gap-1">
                                        <a :href="courseBaseUrl + '/' + courseId + '/module/' + row.id + '/edit'"
                                            class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-500/10 rounded-lg transition-all"
                                            title="Edit module">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                        <button type="button" @click="openDeleteModal(row)"
                                            class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition-all"
                                            title="Delete module">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            {{-- Expanded Lessons Panel --}}
                            <tr x-show="expandedRow === row.id" x-collapse>
                                <td colspan="5" class="bg-gray-50/50 dark:bg-gray-800/30 border-b border-gray-100 dark:border-gray-800">
                                    <div class="px-5 py-4 pl-16">
                                        <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3 flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                            Lessons
                                        </div>
                                        
                                        <template x-if="row.lessons.length === 0">
                                            <div class="text-sm text-gray-500 dark:text-gray-500 italic py-2">
                                                No lessons in this module yet.
                                            </div>
                                        </template>

                                        <div class="space-y-2">
                                            <template x-for="lesson in row.lessons" :key="lesson.id">
                                                <div class="flex items-center justify-between p-3 bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-gray-300 dark:hover:border-gray-600 transition-colors">
                                                    <div class="flex items-center gap-3">
                                                        <div class="p-1.5 rounded-lg bg-indigo-50 dark:bg-indigo-900/20">
                                                            <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100" x-text="lesson.title"></div>
                                                            <div class="flex items-center gap-2 mt-0.5">
                                                                <span class="text-xs text-gray-500 dark:text-gray-500 capitalize" x-text="lesson.type"></span>
                                                                <span class="w-1 h-1 rounded-full bg-gray-300 dark:bg-gray-600"></span>
                                                                <span class="text-xs text-gray-500 dark:text-gray-500" x-text="lesson.duration + ' min'"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        <span class="px-2 py-1 rounded-md text-xs font-medium"
                                                              :class="lesson.status ? 'bg-green-50 text-green-700 dark:bg-green-900/20 dark:text-green-400' : 'bg-gray-100 text-gray-500 dark:bg-gray-800 dark:text-gray-500'"
                                                              x-text="lesson.status ? 'Active' : 'Draft'">
                                                        </span>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </div>
                    </template>
                </tbody>
            </table>
        </div>

        @if ($items instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="px-5 py-4 border-t border-gray-200 dark:border-gray-800 bg-gray-50/50 dark:bg-gray-900/50">
                {{ $items->links() }}
            </div>
        @endif
    </div>
</div>
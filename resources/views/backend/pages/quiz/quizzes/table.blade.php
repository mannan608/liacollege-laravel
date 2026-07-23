@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;

    $collection = $items instanceof \Illuminate\Pagination\AbstractPaginator ? $items->getCollection() : collect($items);

    $tableRowData = $collection
        ->map(function ($quiz) {
            return [
                'id' => $quiz->id,
                'title' => $quiz->title,
                'slug' => $quiz->slug,
                'creator_name' => $quiz->creator?->name ?? 'Unknown',
                'questions_count' => $quiz->questions_count ?? 0,
                'attempts_count' => $quiz->attempts_count ?? 0,
                'status' => $quiz->status,
                'created_at' => $quiz->created_at?->format('M d, Y') ?? '-',
            ];
        })
        ->values();

    $role = request()->route('role');
@endphp

<div x-data="{
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},
    quizBaseUrl: {{ \Illuminate\Support\Js::from(url('/' . $role . '/quizzes')) }},
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
    {{-- Delete Confirmation Modal --}}
    <form x-ref="deleteForm" :action="rowToDelete ? (quizBaseUrl + '/' + rowToDelete.id) : '#'" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-[99999]">
        <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" @click="closeDeleteModal()"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="w-full max-w-md rounded-xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 shadow-xl transform transition-all">
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="text-lg font-semibold text-gray-900 dark:text-white">Delete Quiz?</div>
                    </div>
                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        This will permanently delete the quiz:
                        <span class="font-mono font-medium text-gray-800 dark:text-gray-200" x-text="rowToDelete ? rowToDelete.title : ''"></span>
                    </div>
                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" @click="closeDeleteModal()"
                            class="inline-flex items-center justify-center rounded-lg border border-gray-300 dark:border-gray-700 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            Cancel
                        </button>
                        <button type="button" @click="confirmDelete()"
                            class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700 transition-colors shadow-sm">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-white/5 bg-white dark:bg-gray-900 shadow-sm">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 dark:bg-white/5 border-b border-gray-200 dark:border-white/5">
                    <tr>
                        <th class="text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider px-6 py-4">Quiz</th>
                        <th class="text-center text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider px-4 py-4">Questions</th>
                        <th class="text-center text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider px-4 py-4">Attempts</th>
                        <th class="text-center text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider px-4 py-4">Status</th>
                        <th class="text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider px-4 py-4">Created</th>
                        <th class="text-right text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-white/5">
                    <template x-if="tableRowData.length === 0">
                        <tr>
                            <td colspan="6" class="text-center py-12 text-gray-400 dark:text-gray-500">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                                <p class="text-sm">No quizzes yet. Create your first one!</p>
                            </td>
                        </tr>
                    </template>
                    <template x-for="row in tableRowData" :key="row.id">
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-brand-500 to-brand-600 flex items-center justify-center text-white font-bold text-sm shrink-0"
                                         x-text="row.title ? row.title.substring(0, 2).toUpperCase() : 'QZ'">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100" x-text="row.title"></p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400" x-text="'by ' + row.creator_name"></p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center px-4 py-4">
                                <span class="inline-flex items-center gap-1.5 text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span x-text="row.questions_count"></span>
                                </span>
                            </td>
                            <td class="text-center px-4 py-4">
                                <span class="inline-flex items-center gap-1.5 text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    <span x-text="row.attempts_count"></span>
                                </span>
                            </td>
                            <td class="text-center px-4 py-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium border"
                                      :class="{
                                          'bg-amber-100 text-amber-700 border-amber-200 dark:bg-amber-900/30 dark:text-amber-400 dark:border-amber-800': row.status === 'draft',
                                          'bg-emerald-100 text-emerald-700 border-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-400 dark:border-emerald-800': row.status === 'published',
                                          'bg-gray-100 text-gray-600 border-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700': row.status === 'archived'
                                      }">
                                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                    <span x-text="row.status ? row.status.charAt(0).toUpperCase() + row.status.slice(1) : ''"></span>
                                </span>
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-400" x-text="row.created_at"></td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    {{-- Publish Button (Draft Only) --}}
                                    <template x-if="row.status === 'draft'">
                                        <form :action="quizBaseUrl + '/' + row.id + '/publish'" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="p-2 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 rounded-lg transition-colors" title="Publish">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </template>

                                    {{-- View --}}
                                    <a :href="quizBaseUrl + '/' + row.id" 
                                       class="p-2 text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-500/10 rounded-lg transition-colors" title="View">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    {{-- Edit --}}
                                    <a :href="quizBaseUrl + '/' + row.id + '/edit'" 
                                       class="p-2 text-amber-600 dark:text-amber-400 hover:bg-amber-50 dark:hover:bg-amber-500/10 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    {{-- Questions --}}
                                    <a :href="quizBaseUrl + '/' + row.id + '/questions'" 
                                       class="p-2 text-purple-600 dark:text-purple-400 hover:bg-purple-50 dark:hover:bg-purple-500/10 rounded-lg transition-colors" title="Questions">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </a>

                                    {{-- Delete --}}
                                    <button type="button" @click="openDeleteModal(row)"
                                            class="p-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition-colors" title="Delete">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        @if ($items instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="px-5 py-4 border-t border-gray-100 dark:border-white/5">
                {{ $items->links() }}
            </div>
        @endif
    </div>
</div>
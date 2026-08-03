@php
    $isFullAccess = $role->is_full_access ?? false;
@endphp

<div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-5">
    <div class="flex items-start justify-between gap-4">
        <div>
            <h2 class="text-lg font-semibold text-slate-900">Content Access Tree</h2>
            <p class="mt-1 text-sm text-slate-500">
                Tick the content this role may view. Category access includes all child sections and rows.
            </p>
        </div>
        @if($isFullAccess)
            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
                Full Access Enabled
            </span>
        @endif
    </div>

    @if($isFullAccess)
        <div class="rounded-xl border border-dashed border-emerald-300 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            This role can already see everything in the course.
        </div>
    @else
        <div class="space-y-5">
            @foreach ($course->coursecontentcategories as $category)
                <div class="rounded-2xl border border-slate-200 overflow-hidden">
                    <div class="flex items-center justify-between gap-4 border-b border-slate-200 bg-slate-50 px-4 py-3">
                        <label class="flex items-center gap-3">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                @checked(in_array($category->id, $selectedCategories ?? [], true))
                                class="h-4 w-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                            <span class="text-sm font-semibold text-slate-900">{{ $category->name }}</span>
                        </label>
                    </div>

                    <div class="divide-y divide-slate-100 bg-white">
                        @forelse ($category->sections as $section)
                            <div class="px-4 py-4">
                                <div class="flex items-center justify-between gap-4">
                                    <label class="flex items-center gap-3">
                                        <input type="checkbox" name="sections[]" value="{{ $section->id }}"
                                            @checked(in_array($section->id, $selectedSections ?? [], true))
                                            class="h-4 w-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                                        <span class="text-sm font-semibold text-slate-800">{{ $section->section_name }}</span>
                                    </label>
                                </div>

                                <div class="mt-3 space-y-2 pl-7">
                                    @foreach ($section->rows as $row)
                                        <label class="flex items-start gap-3 rounded-xl border border-slate-100 px-3 py-2 hover:bg-slate-50">
                                            <input type="checkbox" name="rows[]" value="{{ $row->id }}"
                                                @checked(in_array($row->id, $selectedRows ?? [], true))
                                                class="mt-1 h-4 w-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                                            <span class="text-sm text-slate-700">
                                                {{ $row->data['text'] ?? 'Untitled row' }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @empty
                            <div class="px-4 py-4 text-sm text-slate-500">
                                No sections available.
                            </div>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

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
        <span id="full-access-badge"
              class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700 {{ $isFullAccess ? '' : 'hidden' }}">
            Full Access Enabled
        </span>
    </div>

    {{-- Full-access notice (shown when full access is ON) --}}
    <div id="full-access-notice"
         class="rounded-xl border border-dashed border-emerald-300 bg-emerald-50 px-4 py-3 text-sm text-emerald-700 {{ $isFullAccess ? '' : 'hidden' }}">
        This role can already see everything in the course.
    </div>

    {{-- Access tree — always rendered so JS can toggle it; hidden when full access is ON --}}
    <div id="content-access-tree" class="space-y-5 {{ $isFullAccess ? 'hidden' : '' }}">
        @foreach ($course->coursecontentcategories as $category)
            <div class="rounded-2xl border border-slate-200 overflow-hidden">
                <div class="flex items-center justify-between gap-4 border-b border-slate-200 bg-slate-50 px-4 py-3">
                    <label class="flex items-center gap-3">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                               data-role="category" data-category-id="{{ $category->id }}"
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
                                           data-role="section"
                                           data-category-id="{{ $category->id }}"
                                           data-section-id="{{ $section->id }}"
                                           @checked(in_array($section->id, $selectedSections ?? [], true))
                                           class="h-4 w-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                                    <span class="text-sm font-semibold text-slate-800">{{ $section->section_name }}</span>
                                </label>
                            </div>

                            <div class="mt-3 space-y-2 pl-7">
                                @foreach ($section->rows as $row)
                                    <label class="flex items-start gap-3 rounded-xl border border-slate-100 px-3 py-2 hover:bg-slate-50">
                                        <input type="checkbox" name="rows[]" value="{{ $row->id }}"
                                               data-role="row"
                                               data-category-id="{{ $category->id }}"
                                               data-section-id="{{ $section->id }}"
                                               data-row-id="{{ $row->id }}"
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
</div>

<script>
(function () {
    const tree   = document.getElementById('content-access-tree');
    const notice = document.getElementById('full-access-notice');
    const badge  = document.getElementById('full-access-badge');
    if (!tree) return;

    /* ---------- query helpers ---------- */
    const qCategory = (catId) =>
        tree.querySelector(`input[data-role="category"][data-category-id="${catId}"]`);

    const qSection = (catId, secId) =>
        tree.querySelector(`input[data-role="section"][data-category-id="${catId}"][data-section-id="${secId}"]`);

    const qSectionsInCategory = (catId) =>
        tree.querySelectorAll(`input[data-role="section"][data-category-id="${catId}"]`);

    const qRowsInSection = (catId, secId) =>
        tree.querySelectorAll(`input[data-role="row"][data-category-id="${catId}"][data-section-id="${secId}"]`);

    /* ---------- child → parent sync ---------- */

    function syncSectionFromRows(catId, secId) {
        const sec = qSection(catId, secId);
        if (!sec) return;
        const rows = qRowsInSection(catId, secId);
        if (rows.length === 0) return;
        sec.checked = Array.from(rows).every(r => r.checked);
        syncCategoryFromSections(catId);
    }

    // Re-evaluates a category's checked state based on its sections.
    function syncCategoryFromSections(catId) {
        const cat = qCategory(catId);
        if (!cat) return;
        const sections = qSectionsInCategory(catId);
        if (sections.length === 0) return;
        cat.checked = Array.from(sections).every(s => s.checked);
    }

    /* ---------- indeterminate (partial-fill) indicators ---------- */
    function refreshIndeterminate() {
        // Sections: indeterminate when some but not all rows are checked
        tree.querySelectorAll('input[data-role="section"]').forEach(sec => {
            const rows = qRowsInSection(sec.dataset.categoryId, sec.dataset.sectionId);
            if (rows.length === 0) { sec.indeterminate = false; return; }
            const n = Array.from(rows).filter(r => r.checked).length;
            sec.indeterminate = n > 0 && n < rows.length;
        });

        tree.querySelectorAll('input[data-role="category"]').forEach(cat => {
            const sections = qSectionsInCategory(cat.dataset.categoryId);
            if (sections.length === 0) { cat.indeterminate = false; return; }
            const allChecked = Array.from(sections).every(s => s.checked);
            const anyActive  = Array.from(sections).some(s => s.checked || s.indeterminate);
            cat.indeterminate = anyActive && !allChecked;
        });
    }

    /* ---------- delegated change handler ---------- */
    tree.addEventListener('change', function (e) {
        const cb = e.target;
        if (cb.type !== 'checkbox') return;

        const role  = cb.dataset.role;
        const catId = cb.dataset.categoryId;
        const secId = cb.dataset.sectionId;

        if (role === 'category') {
            // ── Category toggled ──
            // Check/uncheck every section AND every row beneath them.
            qSectionsInCategory(catId).forEach(sec => {
                sec.checked = cb.checked;
                qRowsInSection(catId, sec.dataset.sectionId).forEach(row => {
                    row.checked = cb.checked;
                });
            });
        } else if (role === 'section') {
            // ── Section toggled ──
            // Check/uncheck every row in this section, then re-evaluate category.
            qRowsInSection(catId, secId).forEach(row => {
                row.checked = cb.checked;
            });
            syncCategoryFromSections(catId);
        } else if (role === 'row') {
            // ── Row toggled ──
            // Re-evaluate parent section (which cascades to category).
            syncSectionFromRows(catId, secId);
        }

        refreshIndeterminate();
    });
    const faToggle = document.querySelector(
        'input[name="is_full_access"], select[name="is_full_access"], [data-full-access-toggle]'
    );

    function applyFullAccess(isOn) {
        if (isOn) {
            // Full Access ON → hide tree, clear all selections
            tree.classList.add('hidden');
            if (notice) notice.classList.remove('hidden');
            if (badge)  badge.classList.remove('hidden');
            tree.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                cb.checked = false;
                cb.indeterminate = false;
            });
        } else {
            // Full Access OFF → show tree, ready for manual selection
            tree.classList.remove('hidden');
            if (notice) notice.classList.add('hidden');
            if (badge)  badge.classList.add('hidden');
        }
    }

    if (faToggle) {
        const readToggle = (el) => {
            if (el.type === 'checkbox') return el.checked;
            if (el.tagName === 'SELECT')
                return ['1', 'on', 'true', 'yes'].includes(String(el.value).toLowerCase());
            // Custom toggle component fallback
            return el.getAttribute('aria-checked') === 'true'
                || el.dataset.checked === 'true';
        };

        faToggle.addEventListener('change', function () {
            applyFullAccess(readToggle(this));
        });

        // Some custom toggle components fire "input" rather than "change"
        faToggle.addEventListener('input', function () {
            if (this.type !== 'checkbox' && this.tagName !== 'SELECT') {
                applyFullAccess(readToggle(this));
            }
        });
    }

    /* ---------- initialise ---------- */
    refreshIndeterminate();
})();
</script>
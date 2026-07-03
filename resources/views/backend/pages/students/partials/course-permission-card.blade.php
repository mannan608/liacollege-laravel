<div x-data="coursePermission()">

        <form action="{{ role_route('role.students.course-permission.store', ['student' => $student->id]) }}"
            method="POST">
            @csrf        

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach ($enrolledCourses as $course)
                    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden"
                        data-course="{{ $course->id }}">

                        <!-- Course Header -->
                        <div class="bg-brand-600  px-6 py-5">
                            <div class="flex items-center justify-between gap-4">
                                <div class="min-w-0">
                                    <h2 class="text-lg font-bold text-white truncate">
                                        {{ $course->name }}
                                    </h2>
                                    <p class="mt-1 text-xs font-medium text-brand-100 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                        </svg>
                                        {{ $course->sections->count() }} Sections
                                    </p>
                                </div>

                                <!-- Course Checkbox -->
                                <label class="flex items-center gap-2.5 cursor-pointer shrink-0">
                                    <input type="checkbox" class="course-checkbox w-5 h-5 rounded border-2 border-white bg-white text-brand-500 focus:ring-0 focus:ring-white focus:ring-offset-0 cursor-pointer"
                                        name="permissions[{{ $course->id }}][full_course]" value="1"
                                        data-course="{{ $course->id }}" @checked(in_array($course->id, $grantedCourses))
                                        @change="toggleCourse($event)">
                                    <span class="text-sm font-semibold text-white">Full Course</span>
                                </label>
                            </div>
                        </div>

                        <!-- Sections -->
                        <div class="p-5 bg-slate-50">
                            <div class="space-y-4">

                                @foreach ($course->sections as $section)
                                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden"
                                        data-section="{{ $section->id }}" data-course="{{ $course->id }}">

                                        <!-- Section Header -->
                                        <div class="flex items-center justify-between px-5 py-3.5 border-b border-slate-100 bg-slate-50">
                                            <label class="flex items-center gap-3 cursor-pointer min-w-0">
                                                <input type="checkbox" class="section-checkbox w-4 h-4 rounded border-2 border-slate-300 text-brand-600 focus:ring-2 focus:ring-brand-500/20 focus:ring-offset-0 cursor-pointer"
                                                    name="permissions[{{ $course->id }}][sections][]"
                                                    value="{{ $section->id }}" data-course="{{ $course->id }}"
                                                    data-section="{{ $section->id }}" @checked(in_array($course->id, $grantedCourses) || in_array($section->id, $grantedSections))
                                                    @change="toggleSection($event)">
                                                <h3 class="text-sm font-semibold text-slate-700 truncate">
                                                    {{ $section->section_name }}
                                                </h3>
                                            </label>
                                        </div>

                                        <!-- Rows -->
                                        <div class="divide-y divide-slate-100">

                                            @foreach ($section->rows as $row)
                                                <div class="flex items-start gap-3 px-5 py-4 hover:bg-slate-50/80 transition-colors duration-150">
                                                    <label class="flex items-center gap-3 cursor-pointer flex-1 min-w-0">
                                                        <input type="checkbox" class="row-checkbox w-4 h-4 rounded border-2 border-slate-300 text-brand-600 focus:ring-2 focus:ring-brand-500/20 focus:ring-offset-0 mt-0.5 cursor-pointer shrink-0"
                                                            name="permissions[{{ $course->id }}][rows][]"
                                                            value="{{ $row->id }}" data-course="{{ $course->id }}"
                                                            data-section="{{ $section->id }}"
                                                            data-row="{{ $row->id }}" @checked(in_array($course->id, $grantedCourses) ||
                                                                    in_array($section->id, $grantedSections) ||
                                                                    in_array($row->id, $grantedRows))
                                                            @change="toggleRow($event)">

                                                        @if ($row->data['file'] ?? false)
                                                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-slate-100 text-slate-400 shrink-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                                                </svg>
                                                            </div>                                                            
                                                        @endif

                                                        <div class="flex-1 min-w-0">
                                                            <p class="text-sm font-medium text-slate-700 leading-relaxed line-clamp-2">
                                                                {{ $row->data['text'] ?? 'N/A' }}
                                                            </p>

                                                            @if ($row->data['file'] ?? false)
                                                                <div class="mt-1 flex flex-wrap items-center gap-4">
                                                                    {{-- DOWNLOAD PERMISSION --}}
                                                                    @if ($row->is_downloadable)
                                                                        <label class="inline-flex items-center gap-2 cursor-pointer">
                                                                            <input type="checkbox"
                                                                                name="permissions[{{ $course->id }}][doc_permissions][{{ $row->id }}][download]"
                                                                                value="1" @checked(data_get($existingPermissions, $row->id . '.download', false))
                                                                                class="w-3.5 h-3.5 rounded border border-slate-300 text-emerald-500 focus:ring-2 focus:ring-emerald-500/20 focus:ring-offset-0 cursor-pointer">
                                                                            <span class="text-xs text-slate-500">Download</span>
                                                                        </label>
                                                                    @endif

                                                                    {{-- SUBMISSION PERMISSION --}}
                                                                    @if ($row->is_document_submission)
                                                                        <label class="inline-flex items-center gap-2 cursor-pointer">
                                                                            <input type="checkbox"
                                                                                name="permissions[{{ $course->id }}][doc_permissions][{{ $row->id }}][submission]"
                                                                                value="1" @checked(data_get($existingPermissions, $row->id . '.submission', false))
                                                                                class="w-3.5 h-3.5 rounded border border-slate-300 text-emerald-500 focus:ring-2 focus:ring-emerald-500/20 focus:ring-offset-0 cursor-pointer">
                                                                            <span class="text-xs text-slate-500">Submission</span>
                                                                        </label>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </label>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Submit Button -->
            <div class="mt-8 flex justify-start">
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-600 px-8 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-500/25 hover:bg-brand-700 hover:shadow-brand-500/30 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 active:scale-[0.98] transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Save Permissions
                </button>
            </div>
        </form>

</div>

<script>
    function coursePermission() {
        return {
            init() {

                this.$nextTick(() => {

                    document.querySelectorAll('.section-checkbox').forEach(section => {
                        this.updateSection(section.dataset.section);
                    });

                    document.querySelectorAll('.course-checkbox').forEach(course => {
                        this.updateCourse(course.dataset.course);
                    });

                });

            },

            toggleCourse(event) {

                const courseId = event.target.dataset.course;
                const checked = event.target.checked;

                document.querySelectorAll(
                    `[data-course="${courseId}"].section-checkbox,
                 .section-checkbox[data-course="${courseId}"]`
                ).forEach(el => el.checked = checked);

                document.querySelectorAll(
                    `.row-checkbox[data-course="${courseId}"]`
                ).forEach(el => el.checked = checked);
            },

            toggleSection(event) {

                const sectionId = event.target.dataset.section;
                const courseId = event.target.dataset.course;
                const checked = event.target.checked;

                document.querySelectorAll(
                    `.row-checkbox[data-section="${sectionId}"]`
                ).forEach(el => el.checked = checked);

                this.updateCourse(courseId);
            },

            toggleRow(event) {

                const sectionId = event.target.dataset.section;
                const courseId = event.target.dataset.course;

                this.updateSection(sectionId);
                this.updateCourse(courseId);
            },

            updateSection(sectionId) {

                const rows = document.querySelectorAll(
                    `.row-checkbox[data-section="${sectionId}"]`
                );

                const checkedRows = document.querySelectorAll(
                    `.row-checkbox[data-section="${sectionId}"]:checked`
                );

                const sectionCheckbox = document.querySelector(
                    `.section-checkbox[data-section="${sectionId}"]`
                );

                sectionCheckbox.checked =
                    rows.length === checkedRows.length;
            },

            updateCourse(courseId) {

                const sections = document.querySelectorAll(
                    `.section-checkbox[data-course="${courseId}"]`
                );

                const checkedSections = document.querySelectorAll(
                    `.section-checkbox[data-course="${courseId}"]:checked`
                );

                const courseCheckbox = document.querySelector(
                    `.course-checkbox[data-course="${courseId}"]`
                );

                courseCheckbox.checked =
                    sections.length === checkedSections.length;
            }

        }
    }
</script>
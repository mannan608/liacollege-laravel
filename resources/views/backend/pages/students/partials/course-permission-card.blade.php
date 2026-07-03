<div x-data="coursePermission()">

    <div class="space-y-8">
        <form action="{{ role_route('role.students.course-permission.store', ['student' => $student->id]) }}"
            method="POST">
            @csrf
            <div class="flex gap-6">
                @foreach ($enrolledCourses as $course)
                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm w-1/2 h-fit"
                        data-course="{{ $course->id }}">

                        <!-- Course Header -->
                        <div class="border-b border-slate-100 bg-linear-to-r from-brand-600 to-brand-500 px-6 py-5">

                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-xl font-bold text-white">
                                        {{ $course->name }}
                                    </h2>

                                    <p class="mt-1 text-sm text-white/80">
                                        {{ $course->sections->count() }} Sections
                                    </p>
                                </div>

                                <!-- Course Checkbox -->
                                <label class="flex items-center gap-2 text-white">
                                    <input type="checkbox" class="course-checkbox"
                                        name="permissions[{{ $course->id }}][full_course]" value="1"
                                        data-course="{{ $course->id }}" @checked(in_array($course->id, $grantedCourses))
                                        @change="toggleCourse($event)">

                                    <span>Full Course</span>
                                </label>
                            </div>

                        </div>

                        <!-- Sections -->
                        <div class="p-6">
                            <div class="space-y-6">

                                @foreach ($course->sections as $section)
                                    <div class="rounded-xl border border-slate-200 bg-slate-50"
                                        data-section="{{ $section->id }}" data-course="{{ $course->id }}">

                                        <!-- Section Header -->
                                        <div
                                            class="flex items-center justify-between border-b border-slate-200 px-5 py-4">

                                            <div class="flex items-center gap-3">
                                                <input type="checkbox" class="section-checkbox"
                                                    name="permissions[{{ $course->id }}][sections][]"
                                                    value="{{ $section->id }}" data-course="{{ $course->id }}"
                                                    data-section="{{ $section->id }}" @checked(in_array($course->id, $grantedCourses) || in_array($section->id, $grantedSections))
                                                    @change="toggleSection($event)">

                                                <h3 class="font-semibold text-slate-800">
                                                    {{ $section->section_name }}
                                                </h3>
                                            </div>

                                            <span
                                                class="rounded-full bg-brand-100 px-3 py-1 text-xs font-medium text-brand-700">
                                                {{ $section->rows->count() }} Documents
                                            </span>

                                        </div>

                                        <!-- Rows -->
                                        <div class="divide-y divide-slate-200">

                                            @foreach ($section->rows as $row)
                                                <div
                                                    class="flex items-center gap-3 px-5 py-4 transition hover:bg-white">
                                                    <input type="checkbox" class="row-checkbox"
                                                        name="permissions[{{ $course->id }}][rows][]"
                                                        value="{{ $row->id }}" data-course="{{ $course->id }}"
                                                        data-section="{{ $section->id }}"
                                                        data-row="{{ $row->id }}" @checked(in_array($course->id, $grantedCourses) ||
                                                                in_array($section->id, $grantedSections) ||
                                                                in_array($row->id, $grantedRows))
                                                        @change="toggleRow($event)">

                                                    @if ($row->data['file'] ?? false)
                                                        <div
                                                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                                            </svg>
                                                        </div>
                                                    @endif

                                                    <div class="flex-1 flex gap-3 justify-between">
                                                        <p
                                                            class="font-medium text-slate-800 leading-relaxed line-clamp-2 text-[15px]">
                                                            {{ $row->data['text'] ?? 'N/A' }}
                                                        </p>
                                                        @if ($row->data['file'] ?? false)
                                                            <div class="ml-8 flex gap-4 text-sm">

                                                                {{-- DOWNLOAD PERMISSION --}}
                                                                @if ($row->is_downloadable)
                                                                    <label class="flex items-center gap-2">

                                                                        <input type="checkbox"
                                                                            name="permissions[{{ $course->id }}][doc_permissions][{{ $row->id }}][download]"
                                                                            value="1" @checked(data_get($existingPermissions, $row->id . '.download', false))>

                                                                        <span>Download</span>

                                                                    </label>
                                                                @endif


                                                                {{-- SUBMISSION PERMISSION --}}
                                                                @if ($row->is_document_submission)
                                                                    <label class="flex items-center gap-2">

                                                                        <input type="checkbox"
                                                                            name="permissions[{{ $course->id }}][doc_permissions][{{ $row->id }}][submission]"
                                                                            value="1" @checked(data_get($existingPermissions, $row->id . '.submission', false))>

                                                                        <span>Submission</span>

                                                                    </label>
                                                                @endif

                                                            </div>
                                                        @endif
                                                    </div>

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
            <div class="flex">
                <button type="submit"
                    class="mt-5 w-40 rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">Save</button>
            </div>
        </form>
    </div>

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

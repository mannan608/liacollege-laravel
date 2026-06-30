@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        @if (session('success'))
            <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
        @endif

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Give Course Permission</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage course,</p>
                {{ $student->user->name }}

                <div class="space-y-8">
                    <div class="space-y-8">
                        @include('backend.pages.students.partials.course-permission-card')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function coursePermission() {
        return {

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

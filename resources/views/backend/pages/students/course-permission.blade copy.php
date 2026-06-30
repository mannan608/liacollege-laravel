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
                    @include("backend.pages.students.partials.course-permission-card")
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
function coursePermission() {
    return {

        course: {
            checked: false,

            sections: [
                {
                    id: 1,
                    name: 'Assignments',
                    checked: false,

                    rows: [
                        { id: 1, name: 'Assignment 1', checked: false },
                        { id: 2, name: 'Assignment 2', checked: false },
                        { id: 3, name: 'Assignment 3', checked: false },
                    ]
                },

                {
                    id: 2,
                    name: 'Books',
                    checked: false,

                    rows: [
                        { id: 4, name: 'Book 1', checked: false },
                        { id: 5, name: 'Book 2', checked: false },
                    ]
                },

                {
                    id: 3,
                    name: 'Videos',
                    checked: false,

                    rows: [
                        { id: 6, name: 'Video 1', checked: false },
                        { id: 7, name: 'Video 2', checked: false },
                    ]
                }
            ]
        },

        toggleCourse() {

            this.course.sections.forEach(section => {

                section.checked = this.course.checked;

                section.rows.forEach(row => {
                    row.checked = this.course.checked;
                });

            });

        },

        toggleSection(section) {

            section.rows.forEach(row => {
                row.checked = section.checked;
            });

            this.updateCourse();
        },

        toggleRow(section) {

            section.checked = section.rows.every(
                row => row.checked
            );

            this.updateCourse();
        },

        updateCourse() {

            this.course.checked = this.course.sections.every(
                section => section.checked
            );

        }

    }
}
</script>
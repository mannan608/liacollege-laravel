@extends('backend.layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-white/5">
            <div class="px-6 py-5 border-b border-gray-200 dark:border-white/5">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Quiz Details</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Create the quiz first, then add questions.</p>
            </div>

            <form action="{{ role_route('role.quizzes.store') }}" method="POST" class="p-6 space-y-6">
                @csrf

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="course_id" class="block mb-2 font-medium">
                            Course
                        </label>
                        <select name="course_id" id="course_id" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full  rounded-lg border border-gray-300 bg-transparent  px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            <option value="">Select Course</option>
                        </select>
                    </div>

                    <div>
                        <label for="module_id" class="block mb-2 font-medium">
                            Module
                        </label>
                        <select name="module_id" id="module_id" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full  rounded-lg border border-gray-300 bg-transparent  px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            <option value="">Select Module</option>
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label for="lesson_id" class="block mb-2 font-medium">
                            Lesson
                        </label>
                        <select name="lesson_id" id="lesson_id" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full  rounded-lg border border-gray-300 bg-transparent  px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            <option value="">Select Lesson</option>
                        </select>
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                            Choose a course, module, or lesson. Selecting a lesson will automatically align the module and course.
                        </p>
                    </div>

                </div>

                <x-form.input-text name="title" label="Quiz Title" value="{{ old('title') }}"
                    placeholder="e.g., JavaScript Fundamentals" required />

                <x-form.textarea-input name="description" label="Description" rows="3"
                    placeholder="Brief description..." value="{{ old('description') }}" />



                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <x-form.input-text name="time_limit_minutes" label="Time Limit (minutes)" type="number"
                        value="{{ old('time_limit_minutes') }}" placeholder="Optional" min="1" max="300" />

                    <x-form.input-text name="passing_score" label="Passing Score (%)" type="number"
                        value="{{ old('passing_score', 100) }}" min="0" max="100" required />

                    <x-form.input-text name="max_attempts" label="Max Attempts" type="number"
                        value="{{ old('max_attempts') }}" placeholder="Unlimited" min="1" />
                </div>

                <div class="flex items-center gap-6 pt-2">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="shuffle_questions" value="1"
                            {{ old('shuffle_questions') ? 'checked' : '' }}
                            class="w-5 h-5 text-brand-600 border-gray-300 dark:border-gray-600 rounded focus:ring-brand-500 dark:bg-gray-800">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Shuffle questions for each attempt</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="show_correct_answers" value="1" checked
                            class="w-5 h-5 text-brand-600 border-gray-300 dark:border-gray-600 rounded focus:ring-brand-500 dark:bg-gray-800">
                        <span class="text-sm text-sm text-gray-700 dark:text-gray-300">Show correct answers in
                            results</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="show_explanation" value="1" checked
                            class="w-5 h-5 text-brand-600 border-gray-300 dark:border-gray-600 rounded focus:ring-brand-500 dark:bg-gray-800">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Show explanations</span>
                    </label>
                </div>

                <div class="flex items-center justify-between gap-3 pt-4 border-t border-gray-200 dark:border-white/5">
                    <a href="{{ role_route('role.quizzes.index') }}"
                        class="px-5 py-2.5 text-gray-600 dark:text-gray-300 bg-gray-100 dark:hover:bg-gray-800 rounded-lg font-medium transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-lg font-medium transition-colors shadow-sm">
                        Create Quiz
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const hierarchy = @json($courses);
    const selectedCourseId = @json($selectedCourseId ?? null);
    const selectedModuleId = @json($selectedModuleId ?? null);
    const selectedLessonId = @json($selectedLessonId ?? null);
    const courseSelect = document.getElementById('course_id');
    const moduleSelect = document.getElementById('module_id');
    const lessonSelect = document.getElementById('lesson_id');

    function buildOptions(items, placeholder, selectedId) {
        let options = `<option value="">${placeholder}</option>`;

        items.forEach(function (item) {
            options += `<option value="${item.id}" ${String(selectedId) === String(item.id) ? 'selected' : ''}>${item.title ?? item.name}</option>`;
        });

        return options;
    }

    function getModules(courseId) {
        const course = hierarchy.find(function (item) {
            return String(item.id) === String(courseId);
        });

        return course ? (course.modules || []) : [];
    }

    function getLessons(courseId, moduleId) {
        const modules = getModules(courseId);
        const module = modules.find(function (item) {
            return String(item.id) === String(moduleId);
        });

        return module ? (module.lessons || []) : [];
    }

    function syncModules(selectedId = null) {
        const courseId = courseSelect.value;
        const modules = courseId ? getModules(courseId) : [];
        moduleSelect.innerHTML = buildOptions(modules, 'Select Module', selectedId);
    }

    function syncLessons(selectedId = null) {
        const courseId = courseSelect.value;
        const moduleId = moduleSelect.value;
        const lessons = courseId && moduleId ? getLessons(courseId, moduleId) : [];
        lessonSelect.innerHTML = buildOptions(lessons, 'Select Lesson', selectedId);
    }

    courseSelect.innerHTML = buildOptions(hierarchy, 'Select Course', selectedCourseId);
    syncModules(selectedModuleId);
    syncLessons(selectedLessonId);

    courseSelect.addEventListener('change', function () {
        syncModules();
        syncLessons();
    });

    moduleSelect.addEventListener('change', function () {
        syncLessons();
    });

    if (selectedCourseId) {
        courseSelect.value = String(selectedCourseId);
        syncModules(selectedModuleId);
    }

    if (selectedModuleId) {
        moduleSelect.value = String(selectedModuleId);
        syncLessons(selectedLessonId);
    }

    if (selectedLessonId) {
        lessonSelect.value = String(selectedLessonId);
    }
});

</script>

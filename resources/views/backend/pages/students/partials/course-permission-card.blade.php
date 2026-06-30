<div x-data="coursePermission()">

    <div class="space-y-8">
        <form action="{{ role_route('role.students.course-permission.store', ['student' => $student->id]) }}" method="POST">
            @csrf
            @foreach ($enrolledCourses as $course)
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm"
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
                                {{-- <input type="checkbox" class="course-checkbox h-5 w-5" data-course="{{ $course->id }}"
                                    @change="toggleCourse($event)"> --}}
                                <input type="checkbox" class="course-checkbox"
                                    name="permissions[{{ $course->id }}][full_course]" value="1"
                                    data-course="{{ $course->id }}" @change="toggleCourse($event)">

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
                                    <div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">

                                        <div class="flex items-center gap-3">
                                            {{-- <input type="checkbox" class="section-checkbox h-5 w-5"
                                                data-section="{{ $section->id }}" data-course="{{ $course->id }}"
                                                @change="toggleSection($event)"> --}}
                                            <input type="checkbox" class="section-checkbox"
                                                name="permissions[{{ $course->id }}][sections][]"
                                                value="{{ $section->id }}" data-course="{{ $course->id }}"
                                                data-section="{{ $section->id }}" @change="toggleSection($event)">

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
                                            <div class="flex items-center gap-3 px-5 py-4 transition hover:bg-white">

                                                {{-- <input type="checkbox" name="rows[]" value="{{ $row->id }}"
                                                    class="row-checkbox h-5 w-5" data-row="{{ $row->id }}"
                                                    data-section="{{ $section->id }}"
                                                    data-course="{{ $course->id }}" @change="toggleRow($event)"> --}}
                                                <input type="checkbox" class="row-checkbox"
                                                    name="permissions[{{ $course->id }}][rows][]"
                                                    value="{{ $row->id }}" data-course="{{ $course->id }}"
                                                    data-section="{{ $section->id }}" data-row="{{ $row->id }}"
                                                    @change="toggleRow($event)">

                                                <div
                                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                                    </svg>
                                                </div>

                                                <div class="flex-1">
                                                    <p class="font-medium text-slate-800">
                                                        {{ $row->data['text'] ?? 'N/A' }}
                                                    </p>
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
            <div class="">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

</div>

@extends('frontend.pages.student.layouts.app')

@section('content')
    @php
        $enrollments = [
            [
                'title' => 'Advanced Laravel Development',
                'category' => 'Programming',
                'thumbnail' => '/images/course/course-01.jpg',
                'instructor' => 'John Wilson',
                'avatar' => '/images/user/user-01.jpg',
                'status' => 'Active',
                'progress' => 72,
                'grade' => null,
                'enrolled' => '12 Jun 2026',
                'last_activity' => '2 hours ago',
            ],
            [
                'title' => 'UI/UX Design Masterclass',
                'category' => 'Design',
                'thumbnail' => '/images/course/course-02.jpg',
                'instructor' => 'Emily Brown',
                'avatar' => '/images/user/user-02.jpg',
                'status' => 'Completed',
                'progress' => 100,
                'grade' => 'A+',
                'enrolled' => '18 May 2026',
                'last_activity' => 'Completed',
            ],
            [
                'title' => 'Digital Marketing Bootcamp',
                'category' => 'Marketing',
                'thumbnail' => '/images/course/course-03.jpg',
                'instructor' => 'James Cooper',
                'avatar' => '/images/user/user-03.jpg',
                'status' => 'Pending',
                'progress' => 8,
                'grade' => null,
                'enrolled' => '08 Jul 2026',
                'last_activity' => 'Not Started',
            ],
            [
                'title' => 'Python for AI',
                'category' => 'Programming',
                'thumbnail' => '/images/course/course-04.jpg',
                'instructor' => 'Sophia Miller',
                'avatar' => '/images/user/user-04.jpg',
                'status' => 'Active',
                'progress' => 43,
                'grade' => null,
                'enrolled' => '25 Jun 2026',
                'last_activity' => 'Yesterday',
            ],
        ];

        function badge($status)
        {
            return match ($status) {
                'Active' => 'bg-emerald-50 text-emerald-600 border border-emerald-200',
                'Completed' => 'bg-blue-50 text-blue-600 border border-blue-200',
                'Pending' => 'bg-amber-50 text-amber-600 border border-amber-200',
                default => 'bg-gray-50 text-gray-600 border border-gray-200',
            };
        }
    @endphp

    <div class="rounded-3xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-900">

        {{-- Header --}}
        <div class="flex items-center justify-between border-b border-gray-100 px-7 py-6 dark:border-gray-800">

            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    My Courses
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Track your enrolled courses and learning progress.
                </p>
            </div>

            <div class="rounded-2xl bg-brand-50 px-5 py-3 text-center dark:bg-brand-500/10">
                <p class="text-xs text-gray-500">
                    Total Courses
                </p>

                <h3 class="text-2xl font-bold text-brand-600">
                    {{ count($enrollments) }}
                </h3>
            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead>

                    <tr class="border-b border-gray-100 text-left dark:border-gray-800">

                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Course
                        </th>

                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Status
                        </th>

                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Result
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">

                    @foreach ($enrollments as $course)
                        <tr class="transition hover:bg-gray-50 dark:hover:bg-white/5">

                            {{-- Course --}}
                            <td class="px-6 py-6">

                                <div class="flex items-center gap-4">
                                    <div>

                                        <span class="rounded-full bg-brand-50 px-3 py-1 text-xs font-medium text-brand-600">
                                            {{ $course['category'] }}
                                        </span>

                                        <h4 class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ $course['title'] }}
                                        </h4>

                                    </div>

                                </div>

                            </td>

                            {{-- Status --}}
                            <td class="px-4">

                                <span class="rounded-full px-4 py-2 text-xs font-semibold {{ badge($course['status']) }}">
                                    {{ $course['status'] }}
                                </span>

                            </td>



                            {{-- Grade --}}
                            <td class="px-4">

                                @if ($course['grade'])
                                    <span class="rounded-xl bg-blue-100 px-4 py-2 font-semibold text-blue-700">
                                        {{ $course['grade'] }}
                                    </span>
                                @else
                                    <span class="text-gray-400">
                                        —
                                    </span>
                                @endif

                            </td>

                            {{-- Action --}}
                            <td class="px-6">

                                <div class="flex justify-end gap-3">

                                    @if ($course['status'] == 'Completed')
                                        <button
                                            class="rounded-xl bg-blue-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">

                                            Certificate

                                        </button>
                                    @else
                                        <a href="{{route('student.Course-details')}}"
                                            class="rounded-xl bg-brand-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-brand-700">
                                            Continue
                                        </a>
                                    @endif

                                </div>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
@endsection

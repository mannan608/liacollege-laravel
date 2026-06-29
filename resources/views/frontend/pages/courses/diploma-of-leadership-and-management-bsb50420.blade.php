@extends('frontend.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <section class="relative py-8 md:py-0 min-h-80 md:min-h-90 lg:min-h-110 flex items-center overflow-hidden -mt-4">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('frontend-img/breadcrumb.jpg') }}" alt="Training" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-linear-to-r  bg-secondary-500/75 to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="max-w-2xl">
                <h1 class="text-white font-bold text-2xl sm:text-3xl lg:text-4xl leading-tight mb-4 sm:mb-6">
                    {{ $course->name }}
                </h1>
                <p class="text-slate-200 text-base sm:text-lg leading-relaxed mb-6 sm:mb-8">
                    At Pentagon College, we bridge the gap between academic knowledge
                    and industry demands. Our mission is to provide world-class
                    vocational education that transforms careers and fuels
                    professional growth.
                </p>
            </div>
        </div>
    </section>

    <section class="py-8 md:py-12 lg:py-14 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid grid-cols-1 md:grid-cols-[70%_30%] gap-6 md:gap-0">
                <div class="content pr-0 md:pr-8 lg:pr-10">
                    <div class="w-full aspect-[16/9] overflow-hidden rounded-2xl">
                        <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->name }}"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="mt-5 flex flex-col lg:flex-row gap-6 lg:gap-10">

                        <!-- Course Info -->
                        <div class="flex-1">
                            <ul class="list-disc pl-5 space-y-2 text-neutral-600 text-sm">
                                <li>
                                    <span class="font-medium text-neutral-900 text-sm">Course Code:
                                        {{ $course->code }}</span>
                                    | <span class="font-medium text-neutral-900 text-sm">CRICOS {{ $course->cricos }}</span>
                                </li>

                                <li>
                                    <span class="font-medium text-neutral-900">Mode of Delivery:</span>
                                    Face to Face
                                </li>

                                <li>
                                    <span class="font-medium text-neutral-900">Skill Level:</span>
                                    Advanced Diploma Course
                                </li>

                                <li>
                                    <span class="font-medium text-neutral-900">International Applicants:</span>
                                    Yes
                                </li>

                                <li>
                                    <span class="font-medium text-neutral-900">Start Dates & Intakes:</span>
                                    <a href="{{ route('contact') }}" class="text-brand-600">Contact us</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Logo + CTA -->
                        <div class="w-full lg:w-auto lg:min-w-65 flex flex-col items-start lg:items-center gap-4">

                            <img src="{{ asset('patner_2.png') }}" alt="Partner Logo"
                                class="w-40 md:w-48 lg:w-34 h-auto object-contain">

                           <a href="{{ route('enroll-course', $course['slug']) }}"
                        class="group/btn text-sm flex items-center gap-2 px-5 py-2.5 bg-brand-500 text-white hover:bg-brand-500  hover:text-white rounded-xl font-medium transition-all">

                        <span>Enroll Course</span>
                    </a>

                        </div>

                    </div>

                    <div class="mt-8 md:mt-10 lg:mt-12">
                        <h1 class="text-brand-600 font-bold text-lg sm:text-xl lg:text-2xl leading-tight mb-4 sm:mb-6">
                            Course Description
                        </h1>
                        <div class="mb-6 border-b border-brand-500/20">
                            <ul class="flex flex-nowrap md:flex-wrap overflow-x-auto -mb-px text-sm md:text-base font-medium"
                                id="default-tab" data-tabs-toggle="#default-tab-content"
                                data-tabs-active-classes="text-brand-500 border-brand-500"
                                data-tabs-inactive-classes="text-neutral-500 border-transparent hover:text-brand-500 hover:border-brand-500"
                                role="tablist">

                                <li class="me-0.5 md:me-1 lg:me-2" role="presentation">
                                    <button
                                        class="inline-block px-2 md:px-4 py-2 md:py-3 border-b-2 rounded-t-lg transition-all duration-300"
                                        id="overview-tab" data-tabs-target="#overview" type="button" role="tab"
                                        aria-controls="overview">
                                        Overview
                                    </button>
                                </li>

                                <li class="me-0.5 md:me-1 lg:me-2" role="presentation">
                                    <button
                                        class="inline-block px-2 md:px-4 py-2 md:py-3 border-b-2 rounded-t-lg transition-all duration-300"
                                        id="entry-requirements-tab" data-tabs-target="#entry-requirements" type="button"
                                        role="tab" aria-controls="entry-requirements">
                                        Entry Requirements
                                    </button>
                                </li>

                                <li class="me-0.5 md:me-1 lg:me-2" role="presentation">
                                    <button
                                        class="inline-block px-2 md:px-4 py-2 md:py-3 border-b-2 rounded-t-lg transition-all duration-300"
                                        id="course-details-tab" data-tabs-target="#course-details" type="button"
                                        role="tab" aria-controls="course-details">
                                        Course Details
                                    </button>
                                </li>

                            </ul>
                        </div>

                        <div id="default-tab-content">

                            <div class="hidden p-3 md:p-4 rounded-xl border border-brand-500" id="overview" role="tabpanel"
                                aria-labelledby="overview-tab">

                                <p class="text-sm md:text-base leading-7 text-neutral-600 mb-3">
                                    This qualification reflects the role of individuals who apply knowledge, practical
                                    skills and experience in leadership and management across a range of enterprise and
                                    industry contexts.
                                </p>
                                <p class="text-sm md:text-base leading-7 text-neutral-600">
                                    Individuals at this level display initiative and judgement in planning, organising,
                                    implementing and monitoring their own workload and the workload of others. They use
                                    communication skills to support individuals and teams to meet organisational or
                                    enterprise requirements.
                                </p>
                                <p class="text-sm md:text-base leading-7 text-neutral-600">
                                    They may plan, design, apply and evaluate solutions to unpredictable problems, and
                                    identify, analyse and synthesise information from a variety of sources.
                                </p>

                            </div>

                            <div class="hidden p-3 md:p-4 rounded-xl border border-brand-500" id="entry-requirements"
                                role="tabpanel" aria-labelledby="entry-requirements-tab">

                                <ul class="list-disc pl-5 space-y-0.5 text-gray-600 text-sm md:text-base mb-3">
                                    <li>Completed Year 12 or overseas equivalent.</li>
                                    <li>This course requires learners to read comprehensive learning content and resources,
                                        undertake a range of written assessments, undertake independent research activities
                                        and engage in online forums and discussions. Furthermore, the delivery mode relies
                                        on the extensive use of written communication. </li>
                                    <li>Learners need to be able to use digital tools, (video/audio recording, computer,
                                        download and upload documents).</li>
                                    <li>English: Minimum score of IELTS 6.0 or equivalent (please refer to the DIBP website)
                                        or an English proficiency of upper intermediate level or above from any NEAS
                                        accredited ELICOS provider.</li>
                                </ul>
                            </div>

                            <div class="hidden p-3 md:p-4 rounded-xl border border-brand-500" id="course-details"
                                role="tabpanel" aria-labelledby="course-details-tab">

                                <div class="space-y-6">

                                    <!-- Course Header -->
                                    <div>
                                        <span
                                            class="inline-flex items-center rounded-full bg-brand-500/10 px-4 py-2 text-sm font-medium text-brand-500">
                                            Diploma
                                        </span>

                                        <h2 class="mt-2 text-lg md:text-xl lg:text-2xl font-bold text-heading">
                                            Diploma of Leadership and Management BSB50420
                                        </h2>
                                    </div>

                                    <!-- Quick Stats -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                                        <div class="rounded-2xl border border-brand-500/10 p-5">
                                            <p class="text-sm text-neutral-500 mb-1">
                                                Total Units
                                            </p>
                                            <h3 class="text-base md:text-lg lg:text-xl font-bold">
                                                12
                                            </h3>
                                        </div>

                                        <div class="rounded-2xl border border-brand-500/10 p-5">
                                            <p class="text-sm text-neutral-500 mb-1">
                                                Core Units
                                            </p>
                                            <h3 class="text-base md:text-lg lg:text-xl font-bold">
                                                6
                                            </h3>
                                        </div>

                                        <div class="rounded-2xl border border-brand-500/10 p-5">
                                            <p class="text-sm text-neutral-500 mb-1">
                                                Elective Units
                                            </p>
                                            <h3 class="text-base md:text-lg lg:text-xl font-bold">
                                                6
                                            </h3>
                                        </div>

                                        <div class="rounded-2xl border border-brand-500/10 p-5">
                                            <p class="text-sm text-neutral-500 mb-1">
                                                Duration
                                            </p>
                                            <h3 class="text-base md:text-lg lg:text-xl font-bold">
                                                78 Weeks
                                            </h3>
                                        </div>

                                    </div>

                                    <!-- Study Load -->
                                    <div>

                                        <h3 class="text-lg md:text-xl font-bold mb-2">
                                            Study Load
                                        </h3>

                                        <div class="flex flex-col sm:flex-row gap-4">

                                            <div class="flex-1 rounded-2xl border border-brand-500/10 p-5">
                                                <p class="text-sm text-neutral-500">
                                                    Duration
                                                </p>
                                                <p class="text-base md:text-lg lg:text-xl font-semibold mt-1">
                                                    78 Weeks
                                                </p>
                                            </div>

                                            <div class="flex-1 rounded-2xl border border-brand-500/10 p-5">
                                                <p class="text-sm text-neutral-500">
                                                    Weekly Study Hours
                                                </p>
                                                <p class="text-base md:text-lg lg:text-xl font-semibold mt-1">
                                                    20 Hours / Week
                                                </p>
                                            </div>

                                        </div>

                                    </div>

                                    <!-- Core Units -->
                                    <div>

                                        <div class="flex items-center justify-between mb-2">
                                            <h3 class="text-lg md:text-xl font-bold">
                                                Core Units
                                            </h3>

                                            <span
                                                class="rounded-full bg-brand-500/10 px-4 py-1 text-sm font-medium text-brand-500">
                                                6 Units
                                            </span>
                                        </div>

                                        <div class="grid gap-3">

                                            <div
                                                class="rounded-lg border border-brand-500/10 p-4 text-sm md:text-[15px] text-neutral-500">
                                                BSBCMM511 Communicate with influence
                                            </div>

                                            <div
                                                class="rounded-lg border border-brand-500/10 p-4 text-sm md:text-[15px] text-neutral-500">
                                                BSBCRT511 Develop critical thinking in others
                                            </div>

                                            <div
                                                class="rounded-lg border border-brand-500/10 p-4 text-sm md:text-[15px] text-neutral-500">
                                                BSBLDR523 Lead and manage effective workplace relationships
                                            </div>

                                            <div
                                                class="rounded-lg border border-brand-500/10 p-4 text-sm md:text-[15px] text-neutral-500">
                                                BSBOPS502 Manage business operational plans
                                            </div>

                                            <div
                                                class="rounded-lg border border-brand-500/10 p-4 text-sm md:text-[15px] text-neutral-500">
                                                BSBPEF502 Develop and use emotional intelligence
                                            </div>

                                            <div
                                                class="rounded-lg border border-brand-500/10 p-4 text-sm md:text-[15px] text-neutral-500">
                                                BSBTWK502 Manage team effectiveness
                                            </div>

                                        </div>

                                    </div>

                                    <!-- Elective Units -->
                                    <div>

                                        <div class="flex items-center justify-between mb-2">
                                            <h3 class="text-lg md:text-xl font-bold">
                                                Elective Units
                                            </h3>

                                            <span
                                                class="rounded-full bg-brand-500/10 px-4 py-1 text-sm font-medium text-brand-500">
                                                6 Units
                                            </span>
                                        </div>

                                        <div class="grid gap-3">

                                            <div
                                                class="rounded-lg border border-brand-500/10 p-4 text-sm md:text-[15px] text-neutral-500">
                                                BSBTWK501 Lead diversity and inclusion
                                            </div>

                                            <div
                                                class="rounded-lg border border-brand-500/10 p-4 text-sm md:text-[15px] text-neutral-500">
                                                BSBTWK503 Manage meetings
                                            </div>

                                            <div
                                                class="rounded-lg border border-brand-500/10 p-4 text-sm md:text-[15px] text-neutral-500">
                                                BSBCMM412 Lead difficult conversations
                                            </div>

                                            <div
                                                class="rounded-lg border border-brand-500/10 p-4 text-sm md:text-[15px] text-neutral-500">
                                                BSBXCM501 Lead communication in the workplace
                                            </div>

                                            <div
                                                class="rounded-lg border border-brand-500/10 p-4 text-sm md:text-[15px] text-neutral-500">
                                                BSBOPS504 Manage business risk
                                            </div>

                                            <div
                                                class="rounded-lg border border-brand-500/10 p-4 text-sm md:text-[15px] text-neutral-500">
                                                BSBLDR522 Manage people performance
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="related-courses">

                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl md:text-3xl font-bold text-neutral-900">
                            Related Courses
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 gap-4">

                        @foreach ($courses as $course)
                            <!-- Course Card -->
                            <a href="{{ route('single-course', $course['slug']) }}" class="group block">
                                <div class="overflow-hidden rounded-2xl border border-brand-500/10">
                                    <div class="aspect-16/10 overflow-hidden">
                                        <img src="{{ asset($course->thumbnail) }}"
                                            alt="{{ $course['name'] }}"
                                            class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                                    </div>

                                    <div class="p-3 md:p-4 lg:p-5">
                                        <h3
                                            class="text-base md:text-lg font-semibold text-neutral-900 group-hover:text-brand-500 transition">
                                            {{ $course['name'] }}
                                        </h3>

                                        <p class="mt-2 text-xs md:text-sm text-neutral-500">
                                            Code : {{ $course['code'] }} | Cricos {{ $course['cricos'] }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>
    </section>

    <section class=" py-8 md:py-12 lg:py-14 bg-white ">
        <x-frontend.consultation-form />
    </section>
    <section class="pt-8 md:pt-12 lg:pt-14">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
            <x-frontend.cta />
        </div>
    </section>
@endsection

@extends('frontend.layouts.app')

@section('content')
    <!-- 2. HERO BANNER -->
    <section class="relative flex min-h-[50vh] items-center overflow-hidden bg-white">
        <!-- Background Image with White Overlay -->
        <div class="absolute inset-0">
            <img src="{{ asset('lia/home-hero-bg.jpg') }}" alt="Aged care worker assisting an elderly man"
                class="h-full w-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-r from-white via-white/95 to-white/70"></div>
        </div>

        <div class="relative z-10 mx-auto w-full max-w-7xl px-4 py-12 sm:px-6 sm:py-14 lg:px-8 lg:py-24">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12">
                <!-- Left Content -->
                <div class="space-y-6 lg:col-span-7">
                    <!-- Badge -->
                    <div
                        class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 shadow-sm">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-500 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
                        </span>
                        <span class="text-sm font-semibold text-slate-700">Nationally Recognised Training</span>
                    </div>

                    <!-- Headline -->
                    <h1 class="text-2xl font-bold leading-tight text-brand-500 sm:text-3xl md:text-4xl lg:text-5xl">
                        CHC33021 Certificate III in<br class="hidden sm:block">
                        Individual Support (Ageing)
                    </h1>

                    <!-- Description -->
                    <p class="max-w-xl text-base leading-relaxed text-slate-600 sm:text-lg">
                        Launch a rewarding career in Australia's growing aged care industry. Gain the practical skills and
                        knowledge to provide person-centred care and empower the elderly in residential and community
                        settings.
                    </p>

                    <!-- CTAs -->
                    <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                        <button
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-brand-500 px-6 py-3 text-base text-white shadow-lg transition-all duration-200 hover:bg-brand-500 hover:shadow-xl sm:text-base">
                            Apply Now
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </button>
                        <button
                            class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-slate-300 bg-white px-8 py-4 text-base text-slate-700 transition-all duration-200 hover:border-brand-500 hover:bg-slate-50 hover:text-brand-500 sm:text-lg">
                            Download Brochure
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Right Info Cards -->
                <div class="lg:col-span-5">
                    <div class="rounded-2xl border border-slate-200 bg-white/90 p-6 shadow-lg backdrop-blur-sm sm:p-8">
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <!-- Duration -->
                            <div class="flex items-start gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-100">
                                    <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor"
                                        stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-brand-500 sm:text-base">Duration</h4>
                                    <p class="text-sm text-slate-500">Up to 12 months</p>
                                </div>
                            </div>
                            <!-- Delivery Mode -->
                            <div class="flex items-start gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-100">
                                    <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor"
                                        stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-brand-500 sm:text-base">Delivery Mode</h4>
                                    <p class="text-sm text-slate-500">Blended or Distance</p>
                                </div>
                            </div>
                            <!-- Work Placement -->
                            <div class="flex items-start gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-100">
                                    <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor"
                                        stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-brand-500 sm:text-base">Work Placement</h4>
                                    <p class="text-sm text-slate-500">120 hours minimum</p>
                                </div>
                            </div>
                            <!-- Qualification -->
                            <div class="flex items-start gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-100">
                                    <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor"
                                        stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-brand-500 sm:text-base">Qualification</h4>
                                    <p class="text-sm text-slate-500">Nationally Recognised</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. COURSE OVERVIEW -->
    <section class="relative overflow-hidden bg-slate-50 py-24">
        <div class="pointer-events-none absolute top-0 right-0 h-64 w-64 rounded-full bg-brand-100/50 blur-3xl"></div>
        <div class="pointer-events-none absolute bottom-0 left-0 h-64 w-64 rounded-full bg-emerald-100/50 blur-3xl"></div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2">
                <!-- Text Content -->
                <div class="space-y-8">
                    <div>
                        <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-brand-600">Course Overview</p>
                        <h2 class="text-3xl font-extrabold text-slate-900 sm:text-4xl">About This Course</h2>
                    </div>
                    <p class="text-lg leading-relaxed text-slate-600">
                        With Australia's ageing population on the rise, CHC33021 Certificate III in Individual Support
                        (Ageing) is a popular course in Australia. We deliver this qualification to fulfil the gap in
                        the growing demand for care workers who are willing to help the elderly to maintain their
                        independence in their homes, residential care homes, and community care. This course is an
                        entry-level qualification. On completion of this course, you will be equipped with the skills
                        and knowledge to provide support and care to elderly clients to ensure their daily needs are
                        met.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">Nationally Recognised Training</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">Practical, hands-on skills development</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">Industry-experienced trainers</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">Pathways to further nursing or community services study</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">High employment outcomes upon completion</span>
                        </li>
                    </ul>
                </div>

                <!-- Image -->
                <div class="relative">
                    <div
                        class="absolute -inset-4 rounded-[2rem] bg-gradient-to-br from-brand-200 to-emerald-200 opacity-50 blur-xl">
                    </div>
                    <div class="absolute inset-0 translate-x-4 translate-y-4 rounded-[1.5rem] bg-brand-100"></div>
                    <img alt="Students in a practical training session"
                        class="relative rounded-[1.5rem] w-full h-auto object-cover shadow-2xl"
                        src="{{ asset('lia/single-course-banar.jpg') }}">
                </div>
            </div>
        </div>
    </section>

    <!-- 4. QUICK INFO CARDS -->
    <section class="border-y border-slate-200 bg-white py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-4 lg:grid-cols-4">
                <!-- Code -->
                <div
                    class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-500/5">
                    <div
                        class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.25 8.25h13.5m-13.5 3.75h13.5m-13.5 3.75h13.5m-13.5 3.75h13.5" />
                        </svg>
                    </div>
                    <span class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Code</span>
                    <span class="text-lg font-bold text-slate-900">CHC33021</span>
                </div>
                <!-- Duration -->
                <div
                    class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-500/5">
                    <div
                        class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Duration</span>
                    <span class="text-lg font-bold text-slate-900">Up to 12 Months</span>
                </div>
                <!-- Study Mode -->
                <div
                    class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-500/5">
                    <div
                        class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                        </svg>
                    </div>
                    <span class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Study
                        Mode</span>
                    <span class="text-lg font-bold text-slate-900">Blended/Distance</span>
                </div>
                <!-- Placement -->
                <div
                    class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-500/5">
                    <div
                        class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </div>
                    <span class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Placement</span>
                    <span class="text-lg font-bold text-slate-900">120 Hours</span>
                </div>
                <!-- Entry -->
                <div
                    class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-500/5">
                    <div
                        class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <span class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Entry</span>
                    <span class="text-lg font-bold text-slate-900">18+ Years</span>
                </div>
                <!-- Fee -->
                <div
                    class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-500/5">
                    <div
                        class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Fee</span>
                    <span class="text-lg font-bold text-slate-900">From $1600</span>
                </div>
                <!-- Campus -->
                <div
                    class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-500/5">
                    <div
                        class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </div>
                    <span class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Campus</span>
                    <span class="text-lg font-bold text-slate-900">Burwood, NSW</span>
                </div>
                <!-- Intakes -->
                <div
                    class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-500/5">
                    <div
                        class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                    </div>
                    <span class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Intakes</span>
                    <span class="text-lg font-bold text-slate-900">Rolling</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. WHY CHOOSE THIS COURSE -->
    <section class="relative overflow-hidden bg-slate-50 py-24">
        <div
            class="pointer-events-none absolute top-1/2 left-0 h-96 w-96 -translate-y-1/2 rounded-full bg-brand-100/40 blur-3xl">
        </div>
        <div
            class="pointer-events-none absolute top-1/2 right-0 h-96 w-96 -translate-y-1/2 rounded-full bg-emerald-100/40 blur-3xl">
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-brand-600">Benefits</p>
                <h2 class="mb-4 text-3xl font-extrabold text-slate-900 sm:text-4xl">Why Choose This Course</h2>
                <p class="mx-auto max-w-2xl text-lg text-slate-600">Discover the benefits of starting your career in aged
                    care.</p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Card 1 -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 text-center shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-brand-200 hover:shadow-xl hover:shadow-brand-500/10">
                    <div
                        class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500 to-violet-600 shadow-lg shadow-brand-500/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-[-3deg]">
                        <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                        </svg>
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-slate-900">High Employment Demand</h3>
                    <p class="leading-relaxed text-slate-600">The aged care sector is one of Australia's fastest-growing
                        industries, offering excellent job security and opportunities.</p>
                    <div
                        class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 rounded-full bg-gradient-to-r from-transparent via-brand-500 to-transparent transition-all duration-500 group-hover:w-3/5">
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 text-center shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/10">
                    <div
                        class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 shadow-lg shadow-emerald-500/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-[-3deg]">
                        <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-slate-900">Rewarding Career</h3>
                    <p class="leading-relaxed text-slate-600">Make a genuine, positive impact on the lives of older
                        Australians by providing essential care and support.</p>
                    <div
                        class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 rounded-full bg-gradient-to-r from-transparent via-emerald-500 to-transparent transition-all duration-500 group-hover:w-3/5">
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 text-center shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-amber-200 hover:shadow-xl hover:shadow-amber-500/10">
                    <div
                        class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 shadow-lg shadow-amber-500/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-[-3deg]">
                        <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.499 5.221 69.494 69.494 0 00-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                        </svg>
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-slate-900">Flexible Learning</h3>
                    <p class="leading-relaxed text-slate-600">Study options designed to fit around your life, with blended
                        and distance modes available.</p>
                    <div
                        class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 rounded-full bg-gradient-to-r from-transparent via-amber-500 to-transparent transition-all duration-500 group-hover:w-3/5">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. CAREER OPPORTUNITIES -->
    <section class="bg-white py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-brand-600">Career Pathways</p>
                <h2 class="mb-4 text-3xl font-extrabold text-slate-900 sm:text-4xl">Where Can This Qualification Take You?
                </h2>
                <p class="mx-auto max-w-2xl text-lg text-slate-600">Upon successful completion, you can pursue various
                    roles in the aged care sector.</p>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div
                    class="group flex items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Personal Care Assistant</h4>
                    </div>
                </div>
                <div
                    class="group flex items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Assistant in Nursing</h4>
                    </div>
                </div>
                <div
                    class="group flex items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Care Service Employee</h4>
                    </div>
                </div>
                <div
                    class="group flex items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">In-home Respite Giver</h4>
                    </div>
                </div>
                <div
                    class="group flex items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Community Care</h4>
                    </div>
                </div>
                <div
                    class="group flex items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Community Support</h4>
                    </div>
                </div>
                <div
                    class="group flex items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Disability Support</h4>
                    </div>
                </div>
                <div
                    class="group flex items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Transport Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. ENTRY REQUIREMENTS -->
    <section class="relative overflow-hidden bg-slate-50 py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-brand-600">Get Started</p>
                <h2 class="text-3xl font-extrabold text-slate-900 sm:text-4xl">Entry Requirements</h2>
            </div>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                <!-- Basic Requirements -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:shadow-xl">
                    {{-- <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-brand-500 to-violet-500"></div> --}}
                    <div class="mb-6 flex items-center gap-3">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-brand-500 to-violet-600 shadow-lg shadow-brand-500/20">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Basic Requirements</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">Must be at least 18 years old.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">Proficient computer skills with internet access.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">Valid Unique Student Identifier (USI).</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">Reasonable level of fitness and flexibility for first aid and
                                manual handling.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">Satisfactory Language, Literacy, and Numeracy (LLN) test result
                                (ACSF Level 3).</span>
                        </li>
                    </ul>
                </div>

                <!-- Additional Requirements -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:shadow-xl">
                    {{-- <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-pink-500 to-rose-500"></div> --}}
                    <div class="mb-6 flex items-center gap-3">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-pink-500 to-rose-600 shadow-lg shadow-pink-500/20">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Additional Requirements (Clearances)</h3>
                    </div>
                    <p class="mb-4 text-slate-600">Required for voluntary work placement:</p>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-rose-100">
                                <svg class="h-4 w-4 text-rose-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">Australian National Criminal History Check.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-rose-100">
                                <svg class="h-4 w-4 text-rose-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">Working with Children Check (WWCC).</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-rose-100">
                                <svg class="h-4 w-4 text-rose-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">NDIS Worker Screening Check (depending on placement
                                provider).</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-rose-100">
                                <svg class="h-4 w-4 text-rose-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700">Necessary vaccinations.</span>
                        </li>
                    </ul>
                    <p class="mt-6 text-sm italic text-slate-500">*Clearances and vaccinations are obtained at the
                        student's own cost.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- 8. COURSE STRUCTURE -->
    <section class="relative overflow-hidden bg-white py-24">
        <div
            class="pointer-events-none absolute top-0 left-1/2 h-64 w-64 -translate-x-1/2 rounded-full bg-brand-100/40 blur-3xl">
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-brand-600">What You'll Learn</p>
                <h2 class="mb-4 text-3xl font-extrabold text-slate-900 sm:text-4xl">Course Structure</h2>
                <div
                    class="mx-auto inline-flex items-center gap-2 rounded-full bg-brand-50 px-5 py-2 text-sm font-bold text-brand-700">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Total Units: 15 Units
                </div>
            </div>
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <!-- Core Units -->
                <div>
                    <div class="mb-6 flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-brand-500 to-violet-600 shadow-lg shadow-brand-500/20">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0111.186 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Core Units <span
                                class="text-base font-medium text-slate-500">(9)</span></h3>
                    </div>
                    <ul class="space-y-3">
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">01</span>
                            <div><span class="font-bold text-slate-900">CHCCCS031</span><span class="text-slate-600"> —
                                    Provide individualized support</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">02</span>
                            <div><span class="font-bold text-slate-900">CHCCCS038</span><span class="text-slate-600"> —
                                    Facilitate the empowerment of people receiving support</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">03</span>
                            <div><span class="font-bold text-slate-900">CHCCCS040</span><span class="text-slate-600"> —
                                    Support independence and wellbeing</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">04</span>
                            <div><span class="font-bold text-slate-900">CHCCCS041</span><span class="text-slate-600"> —
                                    Recognise healthy body systems</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">05</span>
                            <div><span class="font-bold text-slate-900">CHCCOM005</span><span class="text-slate-600"> —
                                    Communicate and work in health or community services</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">06</span>
                            <div><span class="font-bold text-slate-900">CHCDIV001</span><span class="text-slate-600"> —
                                    Work with diverse people</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">07</span>
                            <div><span class="font-bold text-slate-900">CHCLEG001</span><span class="text-slate-600"> —
                                    Work legally and ethically</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">08</span>
                            <div><span class="font-bold text-slate-900">HLTINF006</span><span class="text-slate-600"> —
                                    Apply basic principles and practices of infection prevention and control</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">09</span>
                            <div><span class="font-bold text-slate-900">HLTWHS002</span><span class="text-slate-600"> —
                                    Follow safe work practices for direct client care</span></div>
                        </li>
                    </ul>
                </div>
                <!-- Elective Units -->
                <div>
                    <div class="mb-6 flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-amber-500 to-orange-600 shadow-lg shadow-amber-500/20">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Elective Units <span
                                class="text-base font-medium text-slate-500">(6)</span></h3>
                    </div>
                    <ul class="space-y-3">
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">01</span>
                            <div><span class="font-bold text-slate-900">CHCAGE013</span><span class="text-slate-600"> —
                                    Work effectively in aged care</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">02</span>
                            <div><span class="font-bold text-slate-900">CHCAGE011</span><span class="text-slate-600"> —
                                    Provide support to people living with dementia</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">03</span>
                            <div><span class="font-bold text-slate-900">CHCPAL003</span><span class="text-slate-600"> —
                                    Deliver care services using a palliative approach</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">04</span>
                            <div><span class="font-bold text-slate-900">HLTAID011</span><span class="text-slate-600"> —
                                    Provide First Aid</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">05</span>
                            <div><span class="font-bold text-slate-900">CHCDIS011</span><span class="text-slate-600"> —
                                    Contribute to ongoing skills development using a strengths-based approach</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">06</span>
                            <div><span class="font-bold text-slate-900">CHCDIS020</span><span class="text-slate-600"> —
                                    Work effectively in disability support</span></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. STUDY MODES -->
    <section class="relative overflow-hidden bg-slate-50 py-24">
        <div
            class="pointer-events-none absolute top-1/2 left-0 h-96 w-96 -translate-y-1/2 rounded-full bg-brand-100/30 blur-3xl">
        </div>
        <div
            class="pointer-events-none absolute top-1/2 right-0 h-96 w-96 -translate-y-1/2 rounded-full bg-emerald-100/30 blur-3xl">
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-brand-600">Flexible Options</p>
                <h2 class="mb-4 text-3xl font-extrabold text-slate-900 sm:text-4xl">Study Modes</h2>
                <p class="mx-auto max-w-2xl text-lg text-slate-600">We offer flexible delivery options to suit your
                    learning style and lifestyle.</p>
            </div>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                <!-- Blended Mode -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-brand-200 hover:shadow-xl hover:shadow-brand-500/10">
                    {{-- <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-brand-500 to-violet-500"></div> --}}
                    <div class="mb-6 flex items-center gap-4">
                        <div
                            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500 to-violet-600 shadow-lg shadow-brand-500/20 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Blended Mode</h3>
                    </div>
                    <p class="leading-relaxed text-slate-600">A combination of face-to-face and distance delivery. Theory
                        tasks are completed at your own pace at home. Practical classes (first aid, manual handling,
                        simulation, role-plays) are attended at our Burwood campus.</p>
                    <div class="mt-6 flex flex-wrap gap-2">
                        <span
                            class="inline-flex items-center rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-700">Face-to-Face</span>
                        <span
                            class="inline-flex items-center rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-700">Self-Paced</span>
                        <span
                            class="inline-flex items-center rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-700">Campus
                            Practical</span>
                    </div>
                </div>
                <!-- Distance Mode -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/10">
                    {{-- <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-emerald-500 to-teal-500"></div> --}}
                    <div class="mb-6 flex items-center gap-4">
                        <div
                            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 shadow-lg shadow-emerald-500/20 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Distance Mode</h3>
                    </div>
                    <p class="leading-relaxed text-slate-600">Delivery without face-to-face interaction with the college.
                        Training and support are provided via online technologies. Practical components are learned during
                        an initial 40 hours at the work placement facility (total 160 hours placement).</p>
                    <div class="mt-6 flex flex-wrap gap-2">
                        <span
                            class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">100%
                            Online</span>
                        <span
                            class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">Remote
                            Support</span>
                        <span
                            class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">Work
                            Placement</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. WORK PLACEMENT -->
    <section class="relative overflow-hidden bg-slate-900 py-24">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute top-0 left-1/4 h-96 w-96 -translate-x-1/2 rounded-full bg-brand-600/10 blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 h-96 w-96 translate-x-1/2 rounded-full bg-emerald-600/10 blur-3xl">
            </div>
        </div>
        <div class="relative z-10 mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-brand-400">Real-World Experience</p>
            <h2 class="mb-8 text-3xl font-extrabold text-white sm:text-4xl lg:text-5xl">Gain Real Industry Experience</h2>
            <div
                class="relative overflow-hidden rounded-3xl border border-slate-700/50 bg-slate-800/60 p-10 backdrop-blur-xl sm:p-14">
                {{-- <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-brand-500 via-violet-500 to-emerald-500"></div> --}}
                <div class="mb-6 flex items-center justify-center">
                    <div
                        class="flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500 to-emerald-500 shadow-2xl shadow-brand-500/20">
                        <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                        </svg>
                    </div>
                </div>
                <p class="mb-2 text-5xl font-extrabold text-white sm:text-6xl">120 Hours</p>
                <p class="mb-2 text-lg font-semibold text-brand-300">Minimum Work Placement</p>
                <p class="mx-auto max-w-2xl leading-relaxed text-slate-400">
                    Voluntary work placement is mandatory. Translate classroom skills into the actual workplace.
                    Distance students require an additional 40 hours. Advance College arranges placement for
                    Sydney-based students (Blended mode).
                </p>
            </div>
        </div>
    </section>

    <!-- 11. ASSESSMENT TASKS -->
    <section class="relative overflow-hidden bg-white py-24">
        <div class="pointer-events-none absolute top-0 right-0 h-64 w-64 rounded-full bg-brand-100/40 blur-3xl"></div>
        <div class="pointer-events-none absolute bottom-0 left-0 h-64 w-64 rounded-full bg-emerald-100/40 blur-3xl"></div>
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-brand-600">Evaluation</p>
                <h2 class="mb-4 text-3xl font-extrabold text-slate-900 sm:text-4xl">Assessment Tasks</h2>
                <p class="mx-auto max-w-2xl text-lg text-slate-600">Demonstrate your competency through a mix of theory and
                    practical tasks.</p>
            </div>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                <!-- Theory Tasks -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-50 p-8 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-brand-200 hover:bg-white hover:shadow-xl hover:shadow-brand-500/10">
                    {{-- <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-brand-500 to-violet-500"></div> --}}
                    <div class="mb-6 flex items-center gap-4">
                        <div
                            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500 to-violet-600 shadow-lg shadow-brand-500/20 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Theory Tasks</h3>
                    </div>
                    <p class="leading-relaxed text-slate-600">Conceptual knowledge evidence. Completed via downloadable
                        Word documents or optional printed booklets (additional charge).</p>
                    <div class="mt-6 flex flex-wrap gap-2">
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-700">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            Word Documents
                        </span>
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-700">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                            </svg>
                            Printed Booklets
                        </span>
                    </div>
                </div>
                <!-- Practical Tasks -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-50 p-8 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-emerald-200 hover:bg-white hover:shadow-xl hover:shadow-emerald-500/10">
                    {{-- <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-emerald-500 to-teal-500"></div> --}}
                    <div class="mb-6 flex items-center gap-4">
                        <div
                            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 shadow-lg shadow-emerald-500/20 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Practical Tasks</h3>
                    </div>
                    <p class="leading-relaxed text-slate-600">Classroom-based simulations, role-plays, and direct workplace
                        observations during your 120-hour placement.</p>
                    <div class="mt-6 flex flex-wrap gap-2">
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            Simulations
                        </span>
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                            Role-Plays
                        </span>
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Workplace Observations
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 12. RECOGNITION OPTIONS -->
    <section class="relative overflow-hidden bg-slate-50 py-24">
        <div
            class="pointer-events-none absolute top-1/2 left-0 h-96 w-96 -translate-y-1/2 rounded-full bg-brand-100/30 blur-3xl">
        </div>
        <div
            class="pointer-events-none absolute top-1/2 right-0 h-96 w-96 -translate-y-1/2 rounded-full bg-amber-100/30 blur-3xl">
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-brand-600">Fast Track</p>
                <h2 class="mb-4 text-3xl font-extrabold text-slate-900 sm:text-4xl">Recognition Options</h2>
                <p class="mx-auto max-w-2xl text-lg text-slate-600">Already have skills or prior qualifications? You may be
                    eligible for credit.</p>
            </div>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                <!-- RPL -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-violet-200 hover:shadow-xl hover:shadow-violet-500/10">
                    {{-- <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-violet-500 to-purple-500"></div> --}}
                    <div class="mb-6 flex items-center gap-4">
                        <div
                            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-violet-500 to-purple-600 shadow-lg shadow-violet-500/20 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Recognition of Prior Learning (RPL)</h3>
                    </div>
                    <p class="leading-relaxed text-slate-600">Assessment of relevant prior learning, skills, knowledge, and
                        experiences to meet qualification requirements or gain credit.</p>
                    <div class="mt-6">
                        <a href="#"
                            class="inline-flex items-center gap-2 text-sm font-semibold text-violet-600 transition-colors hover:text-violet-800">
                            Learn more about RPL
                            <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1"
                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Credit Transfer -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-amber-200 hover:shadow-xl hover:shadow-amber-500/10">
                    {{-- <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-amber-500 to-orange-500"></div> --}}
                    <div class="mb-6 flex items-center gap-4">
                        <div
                            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 shadow-lg shadow-amber-500/20 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Credit Transfer</h3>
                    </div>
                    <p class="leading-relaxed text-slate-600">We recognise prior Australian Qualifications Framework (AQF)
                        qualifications and Statements of Attainment issued by other RTOs.</p>
                    <div class="mt-6">
                        <a href="#"
                            class="inline-flex items-center gap-2 text-sm font-semibold text-amber-600 transition-colors hover:text-amber-800">
                            Learn more about Credit Transfer
                            <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1"
                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('frontend.pages.common.why-us')
    @include('frontend.pages.common.faq')

    @include('frontend.pages.common.cta')
       @include("frontend.pages.common.review")
@endsection

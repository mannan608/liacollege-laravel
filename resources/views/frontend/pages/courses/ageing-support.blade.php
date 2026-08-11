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
                        CHC43015 Certificate IV in <br class="hidden sm:block">
                        Ageing Support
                    </h1>

                    <!-- Description -->
                    <p class="max-w-xl text-base leading-relaxed text-slate-600 sm:text-lg">
                        Build advanced skills and knowledge to support older people across residential, home and community
                        care environments. CHC43015 is a nationally recognised qualification designed for experienced
                        support workers seeking greater responsibility, specialised aged care skills and career progression.

                    </p>

                    <div class="grid grid-cols-2 gap-6 sm:grid-cols-2 w-full md:w-[75%]">
                        <div
                            class="group flex items-center justify-center rounded-2xl  bg-white transition-all duration-300 ">
                            <img src="https://liacollege.edu.au/frontend/images/brand/11.png" alt="Brand 1"
                                class="h-32 w-auto object-contain  transition-all duration-300  group-hover:grayscale-0">
                        </div>
                        <div
                            class="group flex items-center justify-center rounded-2xl  bg-white  transition-all duration-300 ">
                            <img src="https://liacollege.edu.au/frontend/images/brand/2.png" alt="Brand 2"
                                class="h-32 w-auto object-contain  transition-all duration-300  group-hover:grayscale-0">
                        </div>
                    </div>

                    <!-- CTAs -->
                    <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                        <button type="button" data-open-apply-modal @click="$dispatch('open-apply-modal')"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-brand-500 px-6 py-3 text-base text-white shadow-lg transition-all duration-200 hover:bg-brand-500 hover:shadow-xl sm:text-base">
                            Apply Now
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </button>
                        <a href="{{ asset('brochure.pdf') }}" download
                            class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-slate-300 bg-white px-8 py-4 text-base text-slate-700 transition-all duration-200 hover:border-brand-500 hover:bg-slate-50 hover:text-brand-500 sm:text-lg">
                            Download Brochure
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Info Cards -->
                <div class="lg:col-span-5 space-y-6">
                    {{-- <div class="rounded-2xl border border-slate-200 bg-white/90 p-6 shadow-lg backdrop-blur-sm sm:p-8"> --}}

                    {{-- </div> --}}

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
                                    <p class="text-sm text-slate-500">Flexible / RPL Assessment</p>
                                </div>
                            </div>
                            <!-- Delivery Mode -->
                            <div class="flex gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-100">
                                    <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor"
                                        stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-brand-500 sm:text-base">Delivery Mode</h4>
                                    <p class="text-sm text-slate-500">Recognition of Prior Learning (RPL)</p>
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
                                    <p class="text-sm text-slate-500">Based on RPL Assessment</p>
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
                        The <strong>CHC43015 Certificate IV in Ageing Support</strong> is designed for support workers who
                        perform specialised tasks and functions in residential, home and community-based aged care
                        environments. It develops advanced skills in person-centred care, service coordination, dementia
                        support, legal and ethical practice, and supporting the wellbeing and independence of older people.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700"><strong>Person-Centred Aged Care</strong> — Develop advanced
                                skills to provide individualised support that respects the needs, preferences, rights and
                                goals of older people.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700"><strong>Dementia & Complex Support</strong> — Build specialised
                                knowledge to support people living with dementia and older people who may have complex
                                support needs.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700"><strong>Service Coordination</strong> — Develop skills to
                                coordinate individualised services and contribute to effective care planning and
                                delivery.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700"><strong>Leadership & Professional Practice</strong> — Build the
                                capability to take greater responsibility within care teams and contribute to quality
                                service delivery.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700"><strong>Legal, Ethical & Safe Practice</strong> — Understand legal
                                and ethical responsibilities, workplace safety, client rights and professional standards in
                                aged care.</span>
                        </li>
                    </ul>
                </div>

                <!-- Image -->
                <div class="relative">
                    <div class="bg-white rounded-2xl p-2">
                        <div class="px-6 pt-4 z-99999 relative -mb-10">
                            <h5 class="text-2xl text-center font-semibold">Quick Enquiry</h5>
                            <p class="text-center text-base mt-2">Get a response within 1 business day</p>
                        </div>
                        <div class="-mt-10">
                            <iframe src="https://api.leadconnectorhq.com/widget/form/wl8u8aa5nPZ36dAGyds8"
                                style="width:100%;height:100%;border:none;border-radius:3px"
                                id="inline-wl8u8aa5nPZ36dAGyds8" data-layout="{'id':'INLINE'}"
                                data-trigger-type="alwaysShow" data-trigger-value=""
                                data-activation-type="alwaysActivated" data-activation-value=""
                                data-deactivation-type="neverDeactivate" data-deactivation-value=""
                                data-form-name="CHC43015 Certificate IV in Ageing Support" data-height="487"
                                data-layout-iframe-id="inline-wl8u8aa5nPZ36dAGyds8" data-form-id="wl8u8aa5nPZ36dAGyds8"
                                title="CHC43015 Certificate IV in Ageing Support">
                            </iframe>
                            <script src="https://link.msgsndr.com/js/form_embed.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. STUDY MODES -->
    <section class="relative overflow-hidden bg-white py-24">
        <div
            class="pointer-events-none absolute top-1/2 left-0 h-96 w-96 -translate-y-1/2 rounded-full bg-brand-100/30 blur-3xl">
        </div>
        <div
            class="pointer-events-none absolute top-1/2 right-0 h-96 w-96 -translate-y-1/2 rounded-full bg-emerald-100/30 blur-3xl">
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-brand-600">Flexible Options</p>
                <h2 class="mb-4 text-3xl font-extrabold text-slate-900 sm:text-4xl">Qualification Modes</h2>
                <p class="mx-auto max-w-2xl text-lg text-slate-600">We offer flexible delivery options to suit your
                    learning style and lifestyle.</p>
            </div>

            <div
                class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300">
                {{-- <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-brand-500 to-violet-500"></div> --}}
                <div class="mb-6 flex items-center justify-center gap-4">
                    <div
                        class="flex w-10 h-10 md:w-12 md:h-12 lg:h-14 lg:w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500 to-violet-600 shadow-lg shadow-brand-500/20 transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-5 w-5 md:h-7 md:w-7 text-white" fill="none" stroke="currentColor"
                            stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900"> Recognition of Prior Learning (RPL)</h3>
                </div>
                <p class="leading-relaxed text-slate-600 text-center">Already working in aged care or have relevant
                    industry
                    experience? <strong>Recognition of Prior Learning (RPL)</strong> allows your existing skills, knowledge
                    and workplace experience to be assessed against the requirements of CHC43015. This can help you avoid
                    repeating training for skills you can already demonstrate.

                    . </p>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 mt-6">
                    <!-- Code -->
                    <div
                        class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-500/5">
                        <div
                            class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.25 8.25h13.5m-13.5 3.75h13.5m-13.5 3.75h13.5m-13.5 3.75h13.5" />
                            </svg>
                        </div>
                        <span class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Code</span>
                        <span class="text-lg font-bold text-slate-900">CHC43015</span>
                    </div>
                    <!-- Duration -->
                    <div
                        class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-500/5">
                        <div
                            class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span
                            class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Duration</span>
                        <span class="text-lg font-bold text-slate-900">Flexible / RPL Assessment</span>
                    </div>
                    <!-- Study Mode -->
                    <div
                        class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-500/5">
                        <div
                            class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                            </svg>
                        </div>
                        <span class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Study
                            Mode</span>
                        <span class="text-lg font-bold text-slate-900">Recognition of Prior Learning (RPL)</span>
                    </div>
                    <!-- Placement -->
                    <div
                        class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-500/5">
                        <div
                            class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </div>
                        <span
                            class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Placement</span>
                        <span class="text-lg font-bold text-slate-900">Based on Assessment Requirements</span>
                    </div>
                    <!-- Entry -->
                    <div
                        class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-500/5">
                        <div
                            class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
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
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Fee</span>
                        <span class="text-lg font-bold text-slate-900">From $2200</span>
                    </div>

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
                <h2 class="mb-4 text-3xl font-extrabold text-slate-900 sm:text-4xl">Why Choose This Qualification?</h2>
                <p class="mx-auto max-w-2xl text-lg text-slate-600">Discover the benefits of starting your career in aged
                    care.</p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Card 1 -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 text-center shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-brand-200 hover:shadow-xl hover:shadow-brand-500/10">
                    <div
                        class="mx-auto mb-6 flex w-10 h-10 md:w-12 md:h-12 lg:h-16 lg:w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500 to-violet-600 shadow-lg shadow-brand-500/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-[-3deg]">
                        <svg class="md:h-7 md:w-7 w-5 h-5 text-white" fill="none" stroke="currentColor"
                            stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                        </svg>
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-slate-900">Strong Career Opportunities</h3>
                    <p class="leading-relaxed text-slate-600">Develop practical skills for employment across aged care,
                        disability support, home care and community services.</p>
                    <div
                        class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 rounded-full bg-gradient-to-r from-transparent via-brand-500 to-transparent transition-all duration-500 group-hover:w-3/5">
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 text-center shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/10">
                    <div
                        class="mx-auto mb-6 flex w-10 h-10 md:w-12 md:h-12 lg:h-16 lg:w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 shadow-lg shadow-emerald-500/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-[-3deg]">
                        <svg class="md:h-7 md:w-7 h-5 w-5 text-white" fill="none" stroke="currentColor"
                            stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-slate-900">Practical, Industry-Relevant Skills</h3>
                    <p class="leading-relaxed text-slate-600">Gain knowledge and skills focused on person-centred care,
                        communication, wellbeing, safety and supporting independence.</p>
                    <div
                        class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 rounded-full bg-gradient-to-r from-transparent via-emerald-500 to-transparent transition-all duration-500 group-hover:w-3/5">
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 text-center shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-amber-200 hover:shadow-xl hover:shadow-amber-500/10">
                    <div
                        class="mx-auto mb-6 flex w-10 h-10 md:w-12 md:h-12 lg:h-16 lg:w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 shadow-lg shadow-amber-500/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-[-3deg]">
                        <svg class="md:h-7 md:w-7 w-5 h-5 text-white" fill="none" stroke="currentColor"
                            stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.499 5.221 69.494 69.494 0 00-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                        </svg>
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-slate-900">Pathway to Further Study</h3>
                    <p class="leading-relaxed text-slate-600">Use the qualification as a foundation for progressing into
                        further study and more specialised roles within the community services and care sectors.
                    </p>
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
                <p class="mx-auto max-w-2xl text-lg text-slate-600">CHC33021 can support career opportunities in a range of
                    community and care environments. Actual job titles, responsibilities and employment requirements can
                    vary between employers and workplaces</p>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-4 md:p-5 lg:p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Senior Personal Care Assistant</h4>
                    </div>
                </div>
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Aged Care Team Leader</h4>
                    </div>
                </div>
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Residential Care Worker</h4>
                    </div>
                </div>
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Residential Care Officer</h4>
                    </div>
                </div>
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Home Care Coordinator</h4>
                    </div>
                </div>
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Care Service Supervisor</h4>
                    </div>
                </div>
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Community Care Worker</h4>
                    </div>
                </div>
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Advanced Aged Care Support Worker</h4>
                    </div>
                </div>
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Personal Care Worker</h4>
                    </div>
                </div>
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Personal Care Assistant</h4>
                    </div>
                </div>
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Support Worker</h4>
                    </div>
                </div>
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Accommodation Support Worker</h4>
                    </div>
                </div>
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Assistant Hostel Supervisor</h4>
                    </div>
                </div>
                <div
                    class="group flex  rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:bg-white hover:shadow-lg hover:shadow-brand-500/5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Community Program Coordinator</h4>
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
            <!-- Basic Requirements -->
            <div
                class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:shadow-xl">

                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                            <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span class="text-slate-700"><strong>Age:</strong> Applicants must be 18 years of age or
                            older.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                            <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span class="text-slate-700"><strong>Language & Literacy : </strong> Sufficient English Language,
                            Literacy, and Numeracy (LLN) skills to complete coursework and assessments successfully.
                        </span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                            <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span class="text-slate-700"><strong>Digital Access:</strong> Reliable access to a computer,
                            internet connection, and online learning resources.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                            <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span class="text-slate-700"><strong>Identification:</strong> Standard 100-point ID
                            verification.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                            <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span class="text-slate-700"><strong>Workplace Evidence (for RPL Candidates):</strong> Documented
                            employment history and relevant industry evidence.</span>
                    </li>

                    <li class="flex flex-col gap-3">
                        <div class="flex items-start gap-3">
                            <div
                                class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-slate-700"><strong>Workplace Placement Requirements:</strong> Ability to meet
                                all
                                host organization standards, which may include:</span>
                        </div>
                        <ul class="space-y-4 pl-8">
                            <li class="flex items-start gap-3">
                                <div
                                    class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-gray-100">
                                    <svg class="h-4 w-4 text-gray-600" fill="none" stroke="currentColor"
                                        stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </div>
                                <span> Police check and relevant background screening</span>

                            </li>
                            <li class="flex items-start gap-3">
                                <div
                                    class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-gray-100">
                                    <svg class="h-4 w-4 text-gray-600" fill="none" stroke="currentColor"
                                        stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </div>
                                <span> Up-to-date vaccination records</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div
                                    class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-gray-100">
                                    <svg class="h-4 w-4 text-gray-600" fill="none" stroke="currentColor"
                                        stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </div>
                                <span>Additional provider-specific workplace checks</span>
                            </li>
                        </ul>
                    </li>

                </ul>
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
                    Total Units: 18 Units
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
                                class="text-base font-medium text-slate-500">(8)</span></h3>
                    </div>
                    <ul class="space-y-3">
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">01</span>
                            <div><span class="font-bold text-slate-900">CHCAGE001</span><span class="text-slate-600"> —
                                    Facilitate the empowerment of older people</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">02</span>
                            <div><span class="font-bold text-slate-900">CHCAGE005</span><span class="text-slate-600"> —
                                    Provide support to people living with dementia</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">03</span>
                            <div><span class="font-bold text-slate-900">CHCCCS011</span><span class="text-slate-600"> —
                                    Meet personal support needs</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">04</span>
                            <div><span class="font-bold text-slate-900">CHCCCS023</span><span class="text-slate-600"> —
                                    Support independence and wellbeing</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">05</span>
                            <div><span class="font-bold text-slate-900">CHCCCS025</span><span class="text-slate-600"> —
                                    Support relationships with carers and families</span></div>
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
                            <div><span class="font-bold text-slate-900">HLTAAP001</span><span class="text-slate-600"> —
                                    Recognise healthy body systems</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xs font-bold text-brand-700">08</span>
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
                                class="text-base font-medium text-slate-500">(10)</span></h3>
                    </div>
                    <ul class="space-y-3">
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">01</span>
                            <div><span class="font-bold text-slate-900">CHCADV001</span><span class="text-slate-600"> —
                                    Facilitate the interests and rights of clients</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">02</span>
                            <div><span class="font-bold text-slate-900">CHCAGE003</span><span class="text-slate-600"> —
                                    Coordinate services for older people</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">03</span>
                            <div><span class="font-bold text-slate-900">CHCAGE004</span><span class="text-slate-600"> —
                                    Implement interventions with older people at risk</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">04</span>
                            <div><span class="font-bold text-slate-900">CHCCCS006</span><span class="text-slate-600"> —
                                    Facilitate individual service planning and delivery</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">05</span>
                            <div><span class="font-bold text-slate-900">CHCLEG003</span><span class="text-slate-600"> —
                                    Manage legal and ethical compliance</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">06</span>
                            <div><span class="font-bold text-slate-900">CHCPAL001</span><span class="text-slate-600"> —
                                    Deliver care services using a palliative approach</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">07</span>
                            <div><span class="font-bold text-slate-900">CHCPRP001</span><span class="text-slate-600"> —
                                    Develop and maintain networks and collaborative partnerships</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">08</span>
                            <div><span class="font-bold text-slate-900">CHCCCS033</span><span class="text-slate-600"> —
                                    Identify and report abuse</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">09</span>
                            <div><span class="font-bold text-slate-900">HLTAID011</span><span class="text-slate-600"> —
                                    Provide First Aid</span></div>
                        </li>
                        <li
                            class="group flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:bg-white hover:shadow-md">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">10</span>
                            <div><span class="font-bold text-slate-900">CHCDIV003</span><span class="text-slate-600"> —
                                    Manage and promote diversity</span></div>
                        </li>
                    </ul>
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
            <div class="grid grid-cols-1">
                <!-- RPL -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-violet-200 hover:shadow-xl hover:shadow-violet-500/10">
                    {{-- <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-violet-500 to-purple-500"></div> --}}
                    <div class="mb-6 flex  gap-4">
                        <div
                            class="flex w-10 h-10 md:w-12 md:h-12 lg:h-14 lg:w-14 items-center justify-center shrink-0 rounded-2xl bg-gradient-to-br from-violet-500 to-purple-600 shadow-lg shadow-violet-500/20 transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-5 w-5 md:h-7 md:w-7 text-white" fill="none" stroke="currentColor"
                                stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                        </div>
                        <h3 class="flex-1 text-2xl font-bold text-slate-900">Recognition of Prior Learning (RPL)</h3>
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
            </div>
        </div>
    </section>


    @include('frontend.pages.common.why-us')
    <!-- 16. FAQ -->
    <section class="py-24 bg-surface reveal-on-scroll">
        <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto max-w-3xl">
            <h2
                class="lg:text-6xl font-headline-lg md:text-5xl sm:text-4xl text-3xl font-bold text-on-surface mb-12 text-center">
                Frequently Asked Questions
            </h2>
            <div class="space-y-4">
                <details class="bg-surface-container-lowest border border-outline-variant/30 rounded-lg group">
                    <summary
                        class="font-headline-md text-lg text-on-surface p-6 cursor-pointer flex justify-between items-center">
                        What is CHC43015 Certificate IV in Ageing Support?
                        <span
                            class="material-symbols-outlined transform group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="p-6 pt-4 font-body-md text-on-surface-variant border-t border-outline-variant/20 mt-2">
                        CHC43015 is a nationally recognised qualification for support workers who perform specialised tasks
                        and functions in residential, home and community-based aged care environments.
                    </div>
                </details>

                <details class="bg-surface-container-lowest border border-outline-variant/30 rounded-lg group">
                    <summary
                        class="font-headline-md text-lg text-on-surface p-6 cursor-pointer flex justify-between items-center">
                        Is CHC43015 nationally recognised?
                        <span
                            class="material-symbols-outlined transform group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="p-6 pt-4 font-body-md text-on-surface-variant border-t border-outline-variant/20 mt-2">
                        Yes. CHC43015 is a current qualification listed on the Australian Government's national training
                        register.
                    </div>
                </details>

                <details class="bg-surface-container-lowest border border-outline-variant/30 rounded-lg group">
                    <summary
                        class="font-headline-md text-lg text-on-surface p-6 cursor-pointer flex justify-between items-center">
                        Can I complete CHC43015 through RPL?
                        <span
                            class="material-symbols-outlined transform group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="p-6 pt-4 font-body-md text-on-surface-variant border-t border-outline-variant/20 mt-2">
                        Yes. Students with relevant aged care experience, previous training and workplace evidence may be
                        eligible for Recognition of Prior Learning.
                    </div>
                </details>

                <details class="bg-surface-container-lowest border border-outline-variant/30 rounded-lg group">
                    <summary
                        class="font-headline-md text-lg text-on-surface p-6 cursor-pointer flex justify-between items-center">
                        What is RPL?
                        <span
                            class="material-symbols-outlined transform group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="p-6 pt-4 font-body-md text-on-surface-variant border-t border-outline-variant/20 mt-2">
                        Recognition of Prior Learning assesses your existing skills, knowledge and experience against the
                        requirements of the qualification. Where competency can be demonstrated, you may not need to repeat
                        training for those skills.
                    </div>
                </details>

                <details class="bg-surface-container-lowest border border-outline-variant/30 rounded-lg group">
                    <summary
                        class="font-headline-md text-lg text-on-surface p-6 cursor-pointer flex justify-between items-center">
                        Do I need previous aged care experience?
                        <span
                            class="material-symbols-outlined transform group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="p-6 pt-4 font-body-md text-on-surface-variant border-t border-outline-variant/20 mt-2">
                        Relevant experience is required particularly for RPL candidates.
                    </div>
                </details>

                <details class="bg-surface-container-lowest border border-outline-variant/30 rounded-lg group">
                    <summary
                        class="font-headline-md text-lg text-on-surface p-6 cursor-pointer flex justify-between items-center">
                        How many units are in CHC43015?
                        <span
                            class="material-symbols-outlined transform group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="p-6 pt-4 font-body-md text-on-surface-variant border-t border-outline-variant/20 mt-2">
                        There are 18 units in total: 15 core units and 3 elective units.
                    </div>
                </details>

                <details class="bg-surface-container-lowest border border-outline-variant/30 rounded-lg group">
                    <summary
                        class="font-headline-md text-lg text-on-surface p-6 cursor-pointer flex justify-between items-center">
                        What jobs can I get after completing CHC43015?
                        <span
                            class="material-symbols-outlined transform group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="p-6 pt-4 font-body-md text-on-surface-variant border-t border-outline-variant/20 mt-2">
                        Potential career outcomes include Senior Personal Care Assistant, Aged Care Team Leader, Residential
                        Care Worker, Home Care Coordinator, Care Service Supervisor, Community Care Worker and Advanced Aged
                        Care Support Worker.
                    </div>
                </details>

                <details class="bg-surface-container-lowest border border-outline-variant/30 rounded-lg group">
                    <summary
                        class="font-headline-md text-lg text-on-surface p-6 cursor-pointer flex justify-between items-center">
                        Can CHC43015 help me progress into leadership roles?
                        <span
                            class="material-symbols-outlined transform group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="p-6 pt-4 font-body-md text-on-surface-variant border-t border-outline-variant/20 mt-2">
                        Yes. The qualification reflects work that can involve greater responsibility, coordination and
                        limited leadership within aged care environments.
                    </div>
                </details>

                <details class="bg-surface-container-lowest border border-outline-variant/30 rounded-lg group">
                    <summary
                        class="font-headline-md text-lg text-on-surface p-6 cursor-pointer flex justify-between items-center">
                        Can I complete CHC43015 through RPL if I am already working in aged care?
                        <span
                            class="material-symbols-outlined transform group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="p-6 pt-4 font-body-md text-on-surface-variant border-t border-outline-variant/20 mt-2">
                        Yes. Your existing workplace skills and experience can potentially be assessed through RPL. You may
                        be required to provide employment evidence, workplace documents, previous qualifications and other
                        evidence of competency.
                    </div>
                </details>

                <details class="bg-surface-container-lowest border border-outline-variant/30 rounded-lg group">
                    <summary
                        class="font-headline-md text-lg text-on-surface p-6 cursor-pointer flex justify-between items-center">
                        Is there a pathway after Certificate IV in Ageing Support?
                        <span
                            class="material-symbols-outlined transform group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="p-6 pt-4 font-body-md text-on-surface-variant border-t border-outline-variant/20 mt-2">
                        Yes. CHC43015 can provide a foundation for further study and career progression within community
                        services, aged care and related fields. Specific pathways and credit arrangements depend on the
                        subsequent qualification and training provider.
                    </div>
                </details>

                <details class="bg-surface-container-lowest border border-outline-variant/30 rounded-lg group">
                    <summary
                        class="font-headline-md text-lg text-on-surface p-6 cursor-pointer flex justify-between items-center">
                        Does CHC43015 have licensing requirements?
                        <span
                            class="material-symbols-outlined transform group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="p-6 pt-4 font-body-md text-on-surface-variant border-t border-outline-variant/20 mt-2">
                        The national qualification states that there are no licensing, legislative, regulatory or
                        certification requirements applying to the qualification at the time of publication. However,
                        individual employers and workplaces may require additional checks or clearances.
                    </div>
                </details>

                <details class="bg-surface-container-lowest border border-outline-variant/30 rounded-lg group">
                    <summary
                        class="font-headline-md text-lg text-on-surface p-6 cursor-pointer flex justify-between items-center">
                        What workplace checks might be required?
                        <span
                            class="material-symbols-outlined transform group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="p-6 pt-4 font-body-md text-on-surface-variant border-t border-outline-variant/20 mt-2">
                        Depending on the employer or placement provider, students may need to provide documentation such as
                        a National Police Check, worker screening clearance, vaccination evidence or other
                        workplace-specific requirements.
                    </div>
                </details>

                <details class="bg-surface-container-lowest border border-outline-variant/30 rounded-lg group">
                    <summary
                        class="font-headline-md text-lg text-on-surface p-6 cursor-pointer flex justify-between items-center">
                        Who is this course suitable for?
                        <span
                            class="material-symbols-outlined transform group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="p-6 pt-4 font-body-md text-on-surface-variant border-t border-outline-variant/20 mt-2">
                        CHC43015 is suitable for people working in or seeking progression within aged care, including
                        experienced personal care assistants, aged care workers, residential care workers, home care
                        workers, community support workers and people seeking senior or coordination-focused
                        responsibilities.
                    </div>
                </details>
            </div>
        </div>
    </section>

    @include('frontend.pages.common.cta')
    @include('frontend.pages.common.review')
@endsection

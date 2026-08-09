@extends('frontend.layouts.app')


@section('content')
     <!-- 2. HERO BANNER -->
<section class="relative flex min-h-[50vh] items-center overflow-hidden bg-white">
    <!-- Background Image with White Overlay -->
    <div class="absolute inset-0">
        <img src="{{ asset('lia/home-hero-bg.jpg') }}" alt="Aged care worker assisting an elderly man" class="h-full w-full object-cover object-center">
        <div class="absolute inset-0 bg-gradient-to-r from-white via-white/95 to-white/70"></div>
    </div>

    <div class="relative z-10 mx-auto w-full max-w-7xl px-4 py-12 sm:px-6 sm:py-14 lg:px-8 lg:py-24">
        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12">
            <!-- Left Content -->
            <div class="space-y-6 lg:col-span-7">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 shadow-sm">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-500 opacity-75"></span>
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
                    <button class="inline-flex items-center justify-center gap-2 rounded-full bg-brand-500 px-6 py-3 text-base text-white shadow-lg transition-all duration-200 hover:bg-brand-500 hover:shadow-xl sm:text-base">
                        Apply Now
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </button>
                    <button class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-slate-300 bg-white px-8 py-4 text-base text-slate-700 transition-all duration-200 hover:border-brand-500 hover:bg-slate-50 hover:text-brand-500 sm:text-lg">
                        Download Brochure
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
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
                                <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-brand-500 sm:text-base">Duration</h4>
                                <p class="text-sm text-slate-500">Up to 12 months</p>
                            </div>
                        </div>
                        <!-- Delivery Mode -->
                        <div class="flex items-start gap-3">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-100">
                                <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"/></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-brand-500 sm:text-base">Delivery Mode</h4>
                                <p class="text-sm text-slate-500">Blended or Distance</p>
                            </div>
                        </div>
                        <!-- Work Placement -->
                        <div class="flex items-start gap-3">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-100">
                                <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-brand-500 sm:text-base">Work Placement</h4>
                                <p class="text-sm text-slate-500">120 hours minimum</p>
                            </div>
                        </div>
                        <!-- Qualification -->
                        <div class="flex items-start gap-3">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-100">
                                <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/></svg>
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
        <!-- 3. Course Overview -->
        <section class="py-24 bg-surface reveal-on-scroll">
            <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="lg:text-6xl font-headline-lg md:text-5xl sm:text-4xl text-3xl font-bold text-on-surface mb-6">About This Course</h2>
                        <p class="font-body-lg text-body-lg text-on-surface-variant mb-8">
                            With Australia’s ageing population on the rise, CHC33021 Certificate III in Individual Support
                            (Ageing) is a popular course in Australia. We deliver this qualification to fulfil the gap in
                            the growing demand for care workers who are willing to help the elderly to maintain their
                            independence in their homes, residential care homes, and community care. This course is an
                            entry-level qualification. On completion of this course, you will be equipped with the skills
                            and knowledge to provide support and care to elderly clients to ensure their daily needs are
                            met.
                        </p>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span class="font-body-md text-on-surface-variant">Nationally Recognised Training</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span class="font-body-md text-on-surface-variant">Practical, hands-on skills
                                    development</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span class="font-body-md text-on-surface-variant">Industry-experienced trainers</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span class="font-body-md text-on-surface-variant">Pathways to further nursing or community
                                    services study</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span class="font-body-md text-on-surface-variant">High employment outcomes upon
                                    completion</span>
                            </li>
                        </ul>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-0 bg-brand-500/5 rounded-[24px] transform translate-x-4 translate-y-4">
                        </div>
                        <img alt="Students in a practical training session"
                            class="relative rounded-[24px] w-full h-auto object-cover soft-shadow"
                            src="{{ asset('lia/single-course-banar.jpg') }}">
                    </div>
                </div>
            </div>
        </section>
        <!-- 4. Quick Info Cards -->
        <section class="py-16 bg-surface-container-lowest border-y border-outline-variant/20 reveal-on-scroll">
            <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="bg-surface rounded-[16px] p-6 border border-outline-variant/30 text-center">
                        <span class="font-label-sm text-on-surface-variant uppercase tracking-wider block mb-2">Code</span>
                        <span class="font-headline-md text-xl text-primary font-bold">CHC33021</span>
                    </div>
                    <div class="bg-surface rounded-[16px] p-6 border border-outline-variant/30 text-center">
                        <span
                            class="font-label-sm text-on-surface-variant uppercase tracking-wider block mb-2">Duration</span>
                        <span class="font-headline-md text-xl text-primary font-bold">Up to 12 Months</span>
                    </div>
                    <div class="bg-surface rounded-[16px] p-6 border border-outline-variant/30 text-center">
                        <span class="font-label-sm text-on-surface-variant uppercase tracking-wider block mb-2">Study
                            Mode</span>
                        <span class="font-headline-md text-xl text-primary font-bold">Blended/Distance</span>
                    </div>
                    <div class="bg-surface rounded-[16px] p-6 border border-outline-variant/30 text-center">
                        <span
                            class="font-label-sm text-on-surface-variant uppercase tracking-wider block mb-2">Placement</span>
                        <span class="font-headline-md text-xl text-primary font-bold">120 Hours</span>
                    </div>
                    <div class="bg-surface rounded-[16px] p-6 border border-outline-variant/30 text-center">
                        <span class="font-label-sm text-on-surface-variant uppercase tracking-wider block mb-2">Entry</span>
                        <span class="font-headline-md text-xl text-primary font-bold">18+ Years</span>
                    </div>
                    <div class="bg-surface rounded-[16px] p-6 border border-outline-variant/30 text-center">
                        <span class="font-label-sm text-on-surface-variant uppercase tracking-wider block mb-2">Fee</span>
                        <span class="font-headline-md text-xl text-primary font-bold">From $1600</span>
                    </div>
                    <div class="bg-surface rounded-[16px] p-6 border border-outline-variant/30 text-center">
                        <span
                            class="font-label-sm text-on-surface-variant uppercase tracking-wider block mb-2">Campus</span>
                        <span class="font-headline-md text-xl text-primary font-bold">Burwood, NSW</span>
                    </div>
                    <div class="bg-surface rounded-[16px] p-6 border border-outline-variant/30 text-center">
                        <span
                            class="font-label-sm text-on-surface-variant uppercase tracking-wider block mb-2">Intakes</span>
                        <span class="font-headline-md text-xl text-primary font-bold">Rolling</span>
                    </div>
                </div>
            </div>
        </section>
        <!-- 5. Why Choose This Course -->
        <section class="py-24 bg-surface reveal-on-scroll">
            <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
                <div class="text-center mb-16">
                    <h2 class="lg:text-6xl font-headline-lg md:text-5xl sm:text-4xl text-3xl font-bold text-on-surface mb-4">Why Choose This Course</h2>
                    <p class="font-body-lg text-on-surface-variant max-w-2xl mx-auto">Discover the benefits of starting your
                        career in aged care.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="bg-surface-container-lowest p-8 rounded-[24px] border border-outline-variant/30 text-center hover-lift">
                        <div class="w-16 h-16 bg-brand-500/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="material-symbols-outlined text-primary text-3xl">trending_up</span>
                        </div>
                        <h3 class="font-headline-md text-xl mb-4 text-on-surface">High Employment Demand</h3>
                        <p class="font-body-md text-on-surface-variant">The aged care sector is one of Australia's
                            fastest-growing industries, offering excellent job security and opportunities.</p>
                    </div>
                    <div
                        class="bg-surface-container-lowest p-8 rounded-[24px] border border-outline-variant/30 text-center hover-lift">
                        <div class="w-16 h-16 bg-brand-500/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="material-symbols-outlined text-primary text-3xl">diversity_1</span>
                        </div>
                        <h3 class="font-headline-md text-xl mb-4 text-on-surface">Rewarding Career</h3>
                        <p class="font-body-md text-on-surface-variant">Make a genuine, positive impact on the lives of
                            older Australians by providing essential care and support.</p>
                    </div>
                    <div
                        class="bg-surface-container-lowest p-8 rounded-[24px] border border-outline-variant/30 text-center hover-lift">
                        <div class="w-16 h-16 bg-brand-500/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="material-symbols-outlined text-primary text-3xl">school</span>
                        </div>
                        <h3 class="font-headline-md text-xl mb-4 text-on-surface">Flexible Learning</h3>
                        <p class="font-body-md text-on-surface-variant">Study options designed to fit around your life,
                            with blended and distance modes available.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- 6. Career Opportunities -->
        <section class="py-24 bg-surface-container-low reveal-on-scroll">
            <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
                <div class="text-center mb-16">
                    <h2 class="lg:text-6xl font-headline-lg md:text-5xl sm:text-4xl text-3xl font-bold text-on-surface mb-4">Where Can This Qualification Take
                        You?</h2>
                    <p class="font-body-lg text-on-surface-variant max-w-2xl mx-auto">Upon successful completion, you can
                        pursue various roles in the aged care sector.</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div
                        class="bg-surface p-6 rounded-[16px] border border-outline-variant/30 hover:border-primary/50 transition-colors">
                        <h4 class="font-headline-md text-lg text-on-surface mb-2 text-center">Personal Care Assistant</h4>
                    </div>
                    <div
                        class="bg-surface p-6 rounded-[16px] border border-outline-variant/30 hover:border-primary/50 transition-colors">
                        <h4 class="font-headline-md text-lg text-on-surface mb-2 text-center">Assistant in Nursing</h4>
                    </div>
                    <div
                        class="bg-surface p-6 rounded-[16px] border border-outline-variant/30 hover:border-primary/50 transition-colors">
                        <h4 class="font-headline-md text-lg text-on-surface mb-2 text-center">Care Service Employee</h4>
                    </div>
                    <div
                        class="bg-surface p-6 rounded-[16px] border border-outline-variant/30 hover:border-primary/50 transition-colors">
                        <h4 class="font-headline-md text-lg text-on-surface mb-2 text-center">In-home Respite Giver</h4>
                    </div>
                    <div
                        class="bg-surface p-6 rounded-[16px] border border-outline-variant/30 hover:border-primary/50 transition-colors">
                        <h4 class="font-headline-md text-lg text-on-surface mb-2 text-center">Community Care</h4>
                    </div>
                    <div
                        class="bg-surface p-6 rounded-[16px] border border-outline-variant/30 hover:border-primary/50 transition-colors">
                        <h4 class="font-headline-md text-lg text-on-surface mb-2 text-center">Community Support</h4>
                    </div>
                    <div
                        class="bg-surface p-6 rounded-[16px] border border-outline-variant/30 hover:border-primary/50 transition-colors">
                        <h4 class="font-headline-md text-lg text-on-surface mb-2 text-center">Disability Support</h4>
                    </div>
                    <div
                        class="bg-surface p-6 rounded-[16px] border border-outline-variant/30 hover:border-primary/50 transition-colors">
                        <h4 class="font-headline-md text-lg text-on-surface mb-2 text-center">Transport Support</h4>
                    </div>
                </div>
            </div>
        </section>
        <!-- 7. Entry Requirements -->
        <section class="py-24 bg-surface reveal-on-scroll">
            <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
                <h2 class="lg:text-6xl font-headline-lg md:text-5xl sm:text-4xl text-3xl font-bold text-on-surface mb-12 text-center">Entry Requirements</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="bg-surface-container-lowest p-8 rounded-[24px] border border-outline-variant/30">
                        <h3 class="font-headline-md text-2xl mb-6 text-primary flex items-center gap-3">
                            <span class="material-symbols-outlined">rule</span> Basic Requirements
                        </h3>
                        <ul class="space-y-4 font-body-md text-on-surface-variant">
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span>Must be at least 18 years old.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span>Proficient computer skills with internet access.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span>Valid Unique Student Identifier (USI).</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span>Reasonable level of fitness and flexibility for first aid and manual handling.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span>Satisfactory Language, Literacy, and Numeracy (LLN) test result (ACSF Level 3).</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-surface-container-lowest p-8 rounded-[24px] border border-outline-variant/30">
                        <h3 class="font-headline-md text-2xl mb-6 text-primary flex items-center gap-3">
                            <span class="material-symbols-outlined">verified_user</span> Additional Requirements
                            (Clearances)
                        </h3>
                        <p class="font-body-md text-on-surface-variant mb-4">Required for voluntary work placement:</p>
                        <ul class="space-y-4 font-body-md text-on-surface-variant">
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span>Australian National Criminal History Check.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span>Working with Children Check (WWCC).</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span>NDIS Worker Screening Check (depending on placement provider).</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary mt-1">check_circle</span>
                                <span>Necessary vaccinations.</span>
                            </li>
                        </ul>
                        <p class="font-body-md text-sm text-on-surface-variant mt-6 italic">*Clearances and vaccinations
                            are obtained at the student's own cost.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- 8. Course Structure -->
        <section class="py-24 bg-surface-container-low reveal-on-scroll">
            <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
                <div class="text-center mb-16">
                    <h2 class="lg:text-6xl font-headline-lg md:text-5xl sm:text-4xl text-3xl font-bold text-on-surface mb-4">Course Structure</h2>
                    <p class="font-body-lg text-primary font-semibold">Total Units: 15 Units</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-headline-md text-2xl mb-6 text-on-surface flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">bookmark</span> Core Units (9)
                        </h3>
                        <ul class="space-y-3 font-body-md text-on-surface-variant">
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">CHCCCS031</span> Provide individualized support
                            </li>
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">CHCCCS038</span> Facilitate the empowerment of
                                people receiving support</li>
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">CHCCCS040</span> Support independence and
                                wellbeing</li>
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">CHCCCS041</span> Recognise healthy body systems
                            </li>
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">CHCCOM005</span> Communicate and work in health
                                or community services</li>
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">CHCDIV001</span> Work with diverse people</li>
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">CHCLEG001</span> Work legally and ethically</li>
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">HLTINF006</span> Apply basic principles and
                                practices of infection prevention and control</li>
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">HLTWHS002</span> Follow safe work practices for
                                direct client care</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-headline-md text-2xl mb-6 text-on-surface flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">extension</span> Elective Units (6)
                        </h3>
                        <ul class="space-y-3 font-body-md text-on-surface-variant">
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">CHCAGE013</span> Work effectively in aged care
                            </li>
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">CHCAGE011</span> Provide support to people living
                                with dementia</li>
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">CHCPAL003</span> Deliver care services using a
                                palliative approach</li>
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">HLTAID011</span> Provide First Aid</li>
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">CHCDIS011</span> Contribute to ongoing skills
                                development using a strengths-based approach</li>
                            <li class="bg-surface p-4 rounded-lg border border-outline-variant/20"><span
                                    class="font-semibold text-on-surface">CHCDIS020</span> Work effectively in disability
                                support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- 9. Study Modes -->
        <section class="py-24 bg-surface reveal-on-scroll">
            <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
                <div class="text-center mb-16">
                    <h2 class="lg:text-6xl font-headline-lg md:text-5xl sm:text-4xl text-3xl font-bold text-on-surface mb-4">Study Modes</h2>
                    <p class="font-body-lg text-on-surface-variant max-w-2xl mx-auto">We offer flexible delivery options to
                        suit your learning style and lifestyle.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div
                        class="bg-surface-container-lowest p-8 rounded-[24px] border border-outline-variant/30 hover-lift">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-brand-500/10 rounded-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary">diversity_3</span>
                            </div>
                            <h3 class="font-headline-md text-2xl text-on-surface">Blended Mode</h3>
                        </div>
                        <p class="font-body-md text-on-surface-variant mb-4">A combination of face-to-face and distance
                            delivery. Theory tasks are completed at your own pace at home. Practical classes (first aid,
                            manual handling, simulation, role-plays) are attended at our Burwood campus.</p>
                    </div>
                    <div
                        class="bg-surface-container-lowest p-8 rounded-[24px] border border-outline-variant/30 hover-lift">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-brand-500/10 rounded-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary">devices</span>
                            </div>
                            <h3 class="font-headline-md text-2xl text-on-surface">Distance Mode</h3>
                        </div>
                        <p class="font-body-md text-on-surface-variant mb-4">Delivery without face-to-face interaction with
                            the college. Training and support are provided via online technologies. Practical components are
                            learned during an initial 40 hours at the work placement facility (total 160 hours placement).
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- 10. Work Placement -->
        <section class="py-24 bg-brand-500 text-on-primary reveal-on-scroll">
            <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto text-center">
                <h2 class="lg:text-6xl font-headline-lg md:text-5xl sm:text-4xl text-3xl font-bold mb-6">Gain Real Industry Experience</h2>
                <div class="inline-block bg-white/10 backdrop-blur-sm p-8 rounded-[24px] border border-white/20">
                    <p class="font-display-lg text-4xl md:text-5xl font-bold mb-4">120 Hours Minimum</p>
                    <p class="font-body-lg max-w-2xl mx-auto opacity-90">
                        Voluntary work placement is mandatory. Translate classroom skills into the actual workplace.
                        Distance students require an additional 40 hours. Advance College arranges placement for
                        Sydney-based students (Blended mode).
                    </p>
                </div>
            </div>
        </section>
        <!-- 11. Assessment -->
        <section class="py-24 bg-surface reveal-on-scroll">
            <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
                <div class="text-center mb-16">
                    <h2 class="lg:text-6xl font-headline-lg md:text-5xl sm:text-4xl text-3xl font-bold text-on-surface mb-4">Assessment Tasks</h2>
                    <p class="font-body-lg text-on-surface-variant max-w-2xl mx-auto">Demonstrate your competency through a
                        mix of theory and practical tasks.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-surface-container-lowest p-8 rounded-[24px] border border-outline-variant/30">
                        <h3 class="font-headline-md text-xl mb-4 text-primary flex items-center gap-2">
                            <span class="material-symbols-outlined">menu_book</span> Theory Tasks
                        </h3>
                        <p class="font-body-md text-on-surface-variant">Conceptual knowledge evidence. Completed via
                            downloadable Word documents or optional printed booklets (additional charge).</p>
                    </div>
                    <div class="bg-surface-container-lowest p-8 rounded-[24px] border border-outline-variant/30">
                        <h3 class="font-headline-md text-xl mb-4 text-primary flex items-center gap-2">
                            <span class="material-symbols-outlined">engineering</span> Practical Tasks
                        </h3>
                        <p class="font-body-md text-on-surface-variant">Classroom-based simulations, role-plays, and direct
                            workplace observations during your 120-hour placement.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- 12. Recognition Options -->
        <section class="py-24 bg-surface-container-low reveal-on-scroll">
            <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-surface p-8 rounded-[24px] border border-outline-variant/30">
                        <h3 class="font-headline-md text-2xl mb-4 text-on-surface">Recognition of Prior Learning (RPL)</h3>
                        <p class="font-body-md text-on-surface-variant">Assessment of relevant prior learning, skills,
                            knowledge, and experiences to meet qualification requirements or gain credit.</p>
                    </div>
                    <div class="bg-surface p-8 rounded-[24px] border border-outline-variant/30">
                        <h3 class="font-headline-md text-2xl mb-4 text-on-surface">Credit Transfer</h3>
                        <p class="font-body-md text-on-surface-variant">We recognise prior Australian Qualifications
                            Framework (AQF) qualifications and Statements of Attainment issued by other RTOs.</p>
                    </div>
                </div>
            </div>
        </section>
     
       @include("frontend.pages.common.why-us")
       @include("frontend.pages.common.faq")
       @include("frontend.pages.common.testimonials")
       @include("frontend.pages.common.cta")
       
@endsection

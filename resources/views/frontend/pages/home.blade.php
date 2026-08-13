@extends('frontend.layouts.app')

@section('title', 'Lia College | Home')


@push('styles')
    <link rel="stylesheet" href="{{ asset('lia/assets/css/custom.css') }}">
@endpush

@section('content')
    <section
        class="relative pt-12 sm:pt-16 pb-24 md:pb-24 md:pt-24 lg:pb-32 flex items-center justify-center min-h-170 overflow-hidden bg-surface-container-low">
        <div
            class="absolute inset-0 z-0 bg-gradient-to-br from-surface-container-low via-white to-primary/5 bg-[length:200%_200%] animate-gradient-flow">
            <img alt="Students throwing graduation caps in the air in a modern auditorium"
                class="w-full h-full object-cover object-center opacity-40 mix-blend-overlay"
                src="{{ asset('lia/home-hero-bg.jpg') }}">
            <div class="absolute inset-0 bg-gradient-to-r from-background/90 via-background/70 to-transparent"></div>
        </div>
        <div
            class="relative z-10 w-full px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto grid grid-cols-1 lg:grid-cols-12 gap-gutter items-center">
            <!-- Left Content -->
            <div class="lg:col-span-6 space-y-8">
                <div
                    class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full border border-outline-variant/50 soft-shadow text-sm md:text-base">
                    <div class="flex text-amber-400">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star_half</span>
                    </div>
                    <span class="font-body-md text-body-md font-semibold text-on-surface">4.9/5 Student Rating</span>
                </div>
                <h1 class="font-bold text-4xl sm:text-5xl md:text-[56px] text-on-surface leading-tight text-center md:text-start">
                   Leadership Institute  <span class="text-secondary-500">Australia</span>
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl text-center md:text-start">
                    Leadership Institute Australia is a nationally recognized training organization dedicated to delivering high-quality vocational education across community services, aged care, individual support, leadership, and project management.
                </p>
                <ul class="space-y-3 font-body-md text-body-md text-on-surface-variant flex flex-col items-center justify-center md:justify-start md:items-start">
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-secondary animate-float"
                            style="font-variation-settings: 'FILL' 1; animation-delay: 0s;">check_circle</span>
                        Accredited Programs Worldwide
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-secondary animate-float"
                            style="font-variation-settings: 'FILL' 1; animation-delay: 0.5s;">check_circle</span>
                        Flexible Learning Options
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-secondary animate-float"
                            style="font-variation-settings: 'FILL' 1; animation-delay: 1s;">check_circle</span>
                        Dedicated Career Support
                    </li>
                </ul>
            </div>
            <!-- Right Form -->
            <div class="lg:col-span-5 lg:col-start-8 mt-12 lg:mt-0">
                <div class="glass-panel p-8 rounded-[20px] soft-shadow relative overflow-hidden">
                    <div
                        class="absolute -top-10 -right-10 w-40 h-40 bg-brand-500/10 rounded-full blur-3xl pointer-events-none">
                    </div>
                    <h3 class="font-semibold text-xl sm:text-2xl md:text-3xl lg:text-4xl text-on-surface mb-6">Start Your Journey</h3>
                    
                    @include('frontend.pages.common.contact-form', ['courses' => $courses])

                    
                </div>
            </div>
        </div>
    </section>
    <!-- Partners Section -->
    <section class="py-12 bg-surface border-y border-outline-variant/20 reveal-on-scroll">
        <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto text-center">
            <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest mb-8">Trusted by
                Accredited By</p>
             <div class="flex flex-wrap justify-center items-center gap-12  transition-all duration-500">
                <img class="h-16 object-contain"
                    data-alt="clean geometric logo of a professional education authority in black and white"
                    src="{{ asset('patner_1.png') }}" alt="patner image">

                <img class="h-16 object-contain" data-alt="sleek corporate mark for a global vocational training federation"
                    src="{{ asset('patner_2.png') }}" alt="patner image">
            </div>
        </div>
    </section>
    <!-- Qualifications Grid -->
    <section class="py-24 md:py-32 bg-surface-container-lowest reveal-on-scroll">
        <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
            <div class="text-center  mb-16">
                <h2 class="lg:text-6xl font-headline-lg md:text-5xl sm:text-4xl text-3xl font-bold text-on-surface mb-4">Explore Our Qualifications</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant">Discover programs designed to equip
                    you with the skills demanded by today's leading employers.</p>
            </div>
           <div class=" mt-8 md:mt-12">
                     <x-frontend.courses :courses="$courses" />
                </div>
        </div>
    </section>
    <!-- Eligibility Section -->
    <section class="py-24 md:py-32 bg-surface-container-low overflow-hidden relative reveal-on-scroll">
        <div
            class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-surface-container-low to-surface opacity-50 pointer-events-none">
        </div>
        <div
            class=" mx-auto flex items-center justify-center relative z-10">
            <!-- Left Image -->
            {{-- <div class="relative rounded-[24px] overflow-hidden soft-shadow">
                <img alt="Advisor speaking with a smiling student in a modern office setting"
                    class="w-full h-auto object-cover"
                    src="{{ asset('lia/eligibility.webp') }}">
                <!-- overlay gradient for depth -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6">
                    <div class="bg-white/90 backdrop-blur-md p-4 rounded-[12px] flex items-center gap-4">
                        <div class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-secondary"
                                style="font-variation-settings: 'FILL' 1;">support_agent</span>
                        </div>
                        <div>
                            <p class="font-headline-md text-sm text-on-surface">Need Guidance?</p>
                            <p class="font-body-md text-xs text-on-surface-variant">Speak with our academic
                                advisors today.</p>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Right Quiz -->
            <div>
                <h2 class="lg:text-5xl font-headline-lg md:text-4xl sm:text-3xl text-2xl font-bold text-on-surface mb-4">Check Your Eligibility</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-10">Find out which programs you
                    qualify for in less than 2 minutes. Our quick assessment helps tailor your educational path.</p>
                {{-- @include('frontend.pages.common.eligibility-form', [
                    'courses' => $courses,
                    'coursesByIndustry' => $coursesByIndustry,
                    'states' => $states,
                    'industries' => $industries
                ]) --}}
                 @include('frontend.pages.common.step-form.eligibility-form')
            </div>
        </div>
    </section>    

      @include("frontend.pages.common.cta")
     @include("frontend.pages.common.review")     


@endsection

{{-- Global Success Modal --}}
@if (session('success'))
    <div
        x-data="{ showModal: true }"
        x-show="showModal"
        x-transition.opacity
        class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/50 p-4"
        style="display: none;"
        @keydown.escape.window="showModal = false"
    >
        <div
            x-show="showModal"
            x-transition
            @click.outside="showModal = false"
            class="w-full max-w-md rounded-2xl bg-white p-8 text-center shadow-2xl"
        >
            {{-- Success Icon --}}
            <div class="mb-4">
                <svg
                    class="mx-auto h-16 w-16 text-green-500"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"
                    />
                </svg>
            </div>

            <h3 class="mb-2 text-xl font-bold text-gray-900">
                Success!
            </h3>

            <p class="mb-6 text-gray-600">
                {{ session('success') }}
            </p>

            <button
                type="button"
                @click="showModal = false"
                class="rounded-lg bg-brand-600 px-6 py-2 text-white transition hover:bg-brand-700"
            >
                Close
            </button>
        </div>
    </div>
@endif

@push('scripts')
    <script src="{{ asset('lia/assets/js/scroll-reveal.js') }}"></script>
@endpush

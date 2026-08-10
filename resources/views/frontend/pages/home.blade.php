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
                    <form class="space-y-5">
                        <div>
                            <label
                                class="block font-label-sm text-label-sm text-on-surface-variant mb-3 uppercase tracking-wider">Full
                                Name</label>
                            <input
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                placeholder="John Doe" type="text">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label
                                    class="block font-label-sm text-label-sm text-on-surface-variant mb-3 uppercase tracking-wider">Email</label>
                                <input
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    placeholder="john@example.com" type="email">
                            </div>
                            <div>
                                <label
                                    class="block font-label-sm text-label-sm text-on-surface-variant mb-3 uppercase tracking-wider">Phone</label>
                                <input
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    placeholder="+1 (555) 000-0000" type="tel">
                            </div>
                        </div>
                        <div>
                            <label
                                class="block font-label-sm text-label-sm text-on-surface-variant mb-3 uppercase tracking-wider">Program
                                of Interest</label>
                            <select
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 appearance-none">
                                <option>Business Management</option>
                                <option>Information Technology</option>
                                <option>Healthcare Administration</option>
                            </select>
                        </div>
                        <button
                            class="w-full bg-brand-500 text-on-primary hover:bg-brand-500-container hover:text-on-primary-container py-3.5 rounded-[12px] font-body-md text-body-md font-semibold mt-4 lift-and-glow"
                            type="button">
                            Request Information
                        </button>
                        <p class="text-xs text-center text-on-surface-variant/70 mt-4">By submitting, you agree to our
                            Privacy Policy.</p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Partners Section -->
    <section class="py-12 bg-surface border-y border-outline-variant/20 reveal-on-scroll">
        <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto text-center">
            <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest mb-8">Trusted by
                Global Industry Leaders</p>
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
            class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center relative z-10">
            <!-- Left Image -->
            <div class="relative rounded-[24px] overflow-hidden soft-shadow">
                <img alt="Advisor speaking with a smiling student in a modern office setting"
                    class="w-full h-auto object-cover"
                    src="https://lh3.googleusercontent.com/aida/AP1WRLvr_vwDpYFieBms7t3vd38e44ZUCDsRgVKqB6l1y8eHObdNrd0kMBw5xTV-80B4uCLymblsH_lKexZU_0ejIvVdBaQyaueaOwjCRnP9Bk0vgcLRXIGChRl6XDe0Iwbztd-J42cxl5wa5O2RtyAqN41kKCYyrkhiPLWUaXTYpf3UKT0Jal1AxaqBMPf3kkCbs27LDvPZPrH-DjwJilRyx3DtmhOlf16s_Eh6UHNIJusQXhfBuPr1iexeNUzW">
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
            </div>
            <!-- Right Quiz -->
            <div>
                <h2 class="lg:text-5xl font-headline-lg md:text-4xl sm:text-3xl text-2xl font-bold text-on-surface mb-4">Check Your Eligibility</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-10">Find out which programs you
                    qualify for in less than 2 minutes. Our quick assessment helps tailor your educational path.</p>
                <div class="bg-surface rounded-[20px] p-8 border border-outline-variant/30 soft-shadow">
                    <!-- Progress -->
                    <div class="mb-8">
                        <div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant mb-2">
                            <span class="">Step 1 of 3</span>
                            <span class="">33% Completed</span>
                        </div>
                        <div class="w-full bg-surface-variant rounded-full h-2">
                            <div class="bg-brand-500 h-2 rounded-full" style="width: 33%"></div>
                        </div>
                    </div>
                    <!-- Question -->
                    <div class="space-y-6">
                        <h4 class="font-headline-md text-xl text-on-surface">What is your highest level of
                            completed education?</h4>
                        <div class="space-y-3">
                            <label
                                class="flex items-center p-4 border border-outline-variant/40 rounded-[12px] cursor-pointer hover:bg-brand-500/5 hover:border-primary/50 transition-all">
                                <input class="text-primary focus:ring-primary w-5 h-5" name="education" type="radio">
                                <span class="ml-3 font-body-md text-on-surface">High School Diploma / GED</span>
                            </label>
                            <label
                                class="flex items-center p-4 border border-primary bg-brand-500/5 rounded-[12px] cursor-pointer transition-all">
                                <input checked="" class="text-primary focus:ring-primary w-5 h-5" name="education"
                                    type="radio">
                                <span class="ml-3 font-body-md text-on-surface font-medium">Associate's
                                    Degree</span>
                            </label>
                            <label
                                class="flex items-center p-4 border border-outline-variant/40 rounded-[12px] cursor-pointer hover:bg-brand-500/5 hover:border-primary/50 transition-all">
                                <input class="text-primary focus:ring-primary w-5 h-5" name="education" type="radio">
                                <span class="ml-3 font-body-md text-on-surface">Bachelor's Degree</span>
                            </label>
                        </div>
                        <div class="pt-4 flex justify-between items-center">
                            <button
                                class="text-on-surface-variant hover:text-on-surface font-body-md text-sm transition-colors disabled:opacity-50"
                                disabled="">Back</button>
                            <button
                                class="bg-brand-500 text-on-primary hover:bg-brand-500-container px-8 py-3 rounded-[12px] font-body-md font-semibold hover-lift transition-colors">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Banner -->
       

     
     @include("frontend.pages.common.review")
       @include("frontend.pages.common.cta")


@endsection

@push('scripts')
    <script src="{{ asset('lia/assets/js/scroll-reveal.js') }}"></script>
@endpush

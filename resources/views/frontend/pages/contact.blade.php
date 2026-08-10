@extends('frontend.layouts.app')

@section('content')
    <!-- Hero -->
    <section
        class="relative bg-gradient-to-br from-brand-900 via-brand-800 to-brand-900 text-white py-16 sm:py-20 md:py-24 lg:py-28 px-4 sm:px-6 overflow-hidden">
        <div
            class="absolute top-0 right-0 w-64 h-64 sm:w-80 sm:h-80 md:w-96 md:h-96 bg-brand-500/10 rounded-full blur-3xl -tranbrand-y-1/2 tranbrand-x-1/3">
        </div>
        <div
            class="absolute bottom-0 left-0 w-48 h-48 sm:w-64 sm:h-64 md:w-72 md:h-72 bg-emerald-500/10 rounded-full blur-3xl tranbrand-y-1/3 -tranbrand-x-1/4">
        </div>
        <div class="relative max-w-5xl mx-auto text-center">
            <span
                class="inline-block px-3 py-1 sm:px-4 sm:py-1.5 rounded-full bg-white/10 text-xs sm:text-sm font-medium tracking-wide mb-4 sm:mb-6 border border-white/10 backdrop-blur-sm">GET
                IN TOUCH</span>
            <h1
                class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold tracking-tight mb-4 sm:mb-6 leading-tight">
                Contact Us</h1>
            <p
                class="text-base sm:text-lg md:text-xl text-brand-300 max-w-2xl mx-auto leading-relaxed font-light px-2 sm:px-0">
                We'd love to hear from you. Reach out for inquiries, campus tours, or just to say hello.</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 py-12 sm:py-16 md:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 lg:gap-10">

            <!-- Left: Info -->
            <div class="lg:col-span-5 space-y-4 sm:space-y-5 lg:space-y-6">

                <!-- Address -->
                <div
                    class="bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-8 shadow-sm border border-neutral-100 transition-all duration-300 hover:shadow-md hover:-tranbrand-y-1">
                    <div class="flex items-start gap-4 sm:gap-5">
                        <div
                            class="shrink-0 w-10 h-10 sm:w-12 sm:h-12 rounded-lg sm:rounded-xl bg-brand-50 flex items-center justify-center text-brand-600">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold text-neutral-900 mb-0.5 sm:mb-1">Main Campus</h3>
                            <p class="text-sm sm:text-base text-neutral-600 leading-relaxed">Level 14, 333 Collins
                                Street<br>Melbourne, VIC 3000</p>
                            <a href="https://maps.google.com/?q=333+Collins+St+Melbourne+VIC+3000" target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-1.5 mt-2 sm:mt-3 text-xs sm:text-sm font-semibold text-brand-600 hover:text-brand-700 transition-colors">
                                Get Directions
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Phone -->
                <div
                    class="bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-8 shadow-sm border border-neutral-100 transition-all duration-300 hover:shadow-md hover:-tranbrand-y-1">
                    <div class="flex items-start gap-4 sm:gap-5">
                        <div
                            class="shrink-0 w-10 h-10 sm:w-12 sm:h-12 rounded-lg sm:rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold text-neutral-900 mb-0.5 sm:mb-1">Phone</h3>
                            <a href="tel:0479110567"
                                class="text-xl sm:text-2xl font-bold text-neutral-900 hover:text-brand-600 transition-colors">0479
                                110 567</a>
                            <p class="text-xs sm:text-sm text-neutral-500 mt-1 sm:mt-2">Available during business hours</p>
                        </div>
                    </div>
                </div>

                <!-- Hours -->
                <div
                    class="bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-8 shadow-sm border border-neutral-100 transition-all duration-300 hover:shadow-md hover:-tranbrand-y-1">
                    <div class="flex items-start gap-4 sm:gap-5">
                        <div
                            class="shrink-0 w-10 h-10 sm:w-12 sm:h-12 rounded-lg sm:rounded-xl bg-amber-50 flex items-center justify-center text-amber-600">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-base sm:text-lg font-semibold text-neutral-900 mb-2 sm:mb-3">Opening Hours</h3>
                            <div class="space-y-1.5 sm:space-y-2">
                                <div
                                    class="flex justify-between items-center py-1.5 sm:py-2 border-b border-neutral-100 gap-4">
                                    <span class="text-sm sm:text-base text-neutral-600">Monday – Friday</span>
                                    <span class="text-sm sm:text-base font-semibold text-neutral-900 text-right">9:00 AM –
                                        6:00 PM</span>
                                </div>
                                <div
                                    class="flex justify-between items-center py-1.5 sm:py-2 border-b border-neutral-100 gap-4">
                                    <span class="text-sm sm:text-base text-neutral-600">Saturday</span>
                                    <span class="text-sm sm:text-base font-semibold text-neutral-900 text-right">9:00 AM –
                                        4:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center py-1.5 sm:py-2 gap-4">
                                    <span class="text-sm sm:text-base text-neutral-600">Sunday</span>
                                    <span class="text-sm sm:text-base font-medium text-neutral-400 text-right">Closed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Right: Form -->
            <div class="lg:col-span-7">
                <div
                    class="bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-8 lg:p-10 shadow-sm border border-neutral-100 h-full">                  

                    <div class="bg-white rounded-2xl p-2">
                        <div class="px-6 pt-4 z-99999 relative">
                            <h2 class="font-headline-md text-headline-md text-slate-900 text-center">Send us a message</h2>
                            <p class="text-slate-500 font-body-md text-center">Fill out the form below and we'll get back to
                                you within 24 hours.</p>
                        </div>

                        <div class="-mt-10">
                            <iframe src="https://api.leadconnectorhq.com/widget/form/1Ni72mn2z8UmAIoTePsS"
                                style="width:100%;height:100%;border:none;border-radius:3px"
                                id="inline-1Ni72mn2z8UmAIoTePsS" data-layout="{'id':'INLINE'}"
                                data-trigger-type="alwaysShow" data-trigger-value="" data-activation-type="alwaysActivated"
                                data-activation-value="" data-deactivation-type="neverDeactivate" data-deactivation-value=""
                                data-form-name="Website Homepage CTA Form" data-height="757"
                                data-layout-iframe-id="inline-1Ni72mn2z8UmAIoTePsS" data-form-id="1Ni72mn2z8UmAIoTePsS"
                                title="Website Homepage CTA Form">
                            </iframe>
                            <script src="https://link.msgsndr.com/js/form_embed.js"></script>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

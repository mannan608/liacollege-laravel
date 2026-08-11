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
                        <a href="{{ route('rpl') }}"
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
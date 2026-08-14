@extends('frontend.layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-amber-500 via-amber-400 to-orange-400 text-white">
        {{-- Decorative background elements --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute -top-24 -right-24 h-96 w-96 rounded-full bg-white blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 h-72 w-72 rounded-full bg-white blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8 lg:py-32">
            <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
                {{-- Left Content --}}
                <div class="text-center lg:text-left">
                    <div
                        class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/15 px-4 py-1.5 backdrop-blur-sm">
                        <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-bold uppercase tracking-widest">Nationally Recognised</span>
                    </div>

                    <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl lg:text-7xl">
                        First Aid <span class="text-white/90">&</span> CPR
                    </h1>

                    <p class="mx-auto mt-6 max-w-xl text-lg leading-relaxed text-white/90 lg:mx-0 lg:text-xl">
                        Nationally recognised first aid and CPR training, delivered hands-on by experienced trainers.
                        Get your certificate issued the same day.
                    </p>

                    <div class="mt-8 flex flex-col items-center gap-4 sm:flex-row lg:justify-start">
                        <a href="#find"
                            class="group inline-flex items-center gap-2 rounded-2xl bg-white px-8 py-4 text-base font-bold text-gray-900 shadow-xl shadow-black/10 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-black/20">
                            Book Your Course
                            <svg class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                        <div class="flex items-center gap-2 text-sm text-white/80">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Same-Day Certification
                        </div>
                    </div>
                </div>

                {{-- Right Image --}}
                <div class="relative hidden lg:block">
                    <div class="relative">
                        <div class="absolute -inset-4 rounded-3xl bg-white/20 blur-2xl"></div>
                        <img src="{{ asset('frontend-img/first-aid.webp') }}" alt="First Aid Training"
                            class="relative rounded-2xl shadow-2xl shadow-black/20 object-cover w-full aspect-[4/3]">
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom wave --}}
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path
                    d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z"
                    fill="#f8fafc" />
            </svg>
        </div>
    </section>

    @include('frontend.pages.first-aid.slot-filter.courses-filter')

    <section>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border border-gray-200 rounded-2xl bg-white p-5 md:p-8">

                <h6 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-4">
                    Also available
                </h6>

                <div class="flex flex-wrap gap-2">

                    @foreach ($courses as $course)
                        <a href="{{ route('first-aid', ['course_id' => $course->id]) }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-gray-200 bg-gray-50 text-sm font-medium text-gray-800 hover:border-gray-400 hover:bg-white hover:text-gray-900 transition-colors duration-150">
                            {{ $course->name }}
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    @endforeach

                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <h2 class="text-2xl font-semibold text-gray-900 mb-8">First aid & CPR courses</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


                @foreach ($courses as $course)
                    <!-- Card 1 -->
                    <article
                        class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col hover:shadow-md transition-shadow duration-200">
                        <div
                            class="inline-flex items-center gap-1.5 bg-green-50 text-green-700 text-xs font-medium px-2.5 py-1 rounded-md w-fit mb-4">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            Nationally recognised
                        </div>
                        <div class="flex items-start justify-between gap-3 mb-2">
                            <h3 class="text-base font-semibold text-gray-900 leading-snug">{{ $course->name }}</h3>
                            <div class="text-right shrink-0">
                                <span class="text-xs text-gray-400 block">from</span>
                                <span class="text-xl font-semibold text-green-600 tabular-nums">${{ $course->price }}</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1.5 text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                            {{ $course->duration }} hours
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed mb-5 flex-grow">{{ $course->description }}</p>


                        <div class="border-t border-gray-100 pt-4 mt-auto">
                            <p class="text-[11px] font-semibold uppercase tracking-wider text-gray-400 mb-3">What is
                                included</p>
                            <ul class="space-y-2">
                                @foreach ($course->includes as $include)
                                    <li class="flex items-start gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-green-600 shrink-0 mt-0.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12l5 5L20 7" />
                                        </svg>

                                        <span>{{ $include->title }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="flex gap-2 mt-5">
                            <a href="#"
                                class="flex-1 inline-flex items-center justify-center gap-1.5 bg-gray-900 text-white text-sm font-medium px-4 py-2.5 rounded-lg hover:bg-gray-800 transition-colors">
                                Book now
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </a>
                            <a href="{{ route('first-aid.show',$course) }}"
                                class="inline-flex items-center justify-center text-sm font-medium text-gray-600 px-4 py-2.5 rounded-lg border border-gray-200 hover:border-gray-400 hover:text-gray-900 transition-colors">
                                Details
                            </a>
                        </div>
                    </article>
                @endforeach

            </div>

            <p class="mt-8 text-sm text-gray-500 text-center">Ready to book? Browse the courses above to find live dates
                and secure your place.</p>

        </div>
    </section>

    {{-- Testimonials Section --}}
    <section class="bg-slate-50 py-16 sm:py-20 lg:py-24">
       @include('frontend.pages.first-aid.review')
    </section>


    {{-- Guides Section --}}
    <section class="bg-white py-16 sm:py-20 lg:py-24">
       @include('frontend.pages.first-aid.guides')
       
    </section>

    {{-- FAQ Section --}}
    <section class="bg-gradient-to-br from-amber-400 via-amber-500 to-orange-500 py-16 sm:py-20 lg:py-24">
       @include('frontend.pages.first-aid.faq')       
    </section>


    {{-- Locations Section --}}
    <section class="bg-slate-50 py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="max-w-2xl">
                <span
                    class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-emerald-700">
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Training Centres
                </span>
                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    First Aid & CPR by Location
                </h2>
                <p class="mt-3 text-base text-slate-500 sm:text-lg">
                    Delivered face-to-face at 15 centres. Choose your nearest centre to see its class dates and book.
                </p>
            </div>

            {{-- Locations Grid --}}
            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                {{-- Location Card 1 --}}
                <a href="/courses/first-aid/sydney"
                    class="group flex gap-4 rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-900/5 transition-all duration-300 hover:shadow-lg hover:shadow-slate-200/50 hover:-translate-y-1 sm:p-6">
                    <div
                        class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <h3 class="text-base font-bold text-slate-900">Sydney</h3>
                        <p class="mt-1 text-sm leading-relaxed text-slate-500">
                            Level 5, 8 Quay Street (Prince Centre), Haymarket NSW 2000
                        </p>
                        <span class="mt-3 inline-flex items-center gap-1.5 text-sm font-bold text-emerald-600">
                            See Sydney dates
                            <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </span>
                    </div>
                </a>

                {{-- Duplicate this block for more locations --}}
            </div>
        </div>
    </section>


    {{-- Other Courses Section --}}
    <section class="bg-white py-12 sm:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-slate-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-slate-900 sm:text-2xl">Other Courses</h2>
            </div>

            {{-- Courses Grid --}}
            <div class="mt-6 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($courses as $course)
                    <a href="{{ route('first-aid', ['course_id' => $course->id]) }}"
                        class="group flex items-center justify-between gap-3 rounded-xl bg-white px-5 py-4 shadow-sm ring-1 ring-slate-900/5 transition-all duration-300 hover:shadow-md hover:ring-slate-900/10">
                        <span class="text-sm font-bold text-slate-900 sm:text-base">{{ $course->name }}</span>
                        <svg class="h-5 w-5 text-slate-400 transition-all group-hover:text-slate-900 group-hover:translate-x-0.5"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection

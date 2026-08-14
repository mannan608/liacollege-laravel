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
                       {{$course->name}}
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

    @include('frontend.pages.first-aid.slot-filter.course-filter')


        <section>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <h2 class="text-2xl font-semibold text-gray-900 mb-8">{{$course->name}}</h2>

            <div class="">
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
                    </article>

            </div>

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
@endsection

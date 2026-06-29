@extends('frontend.layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative py-8 md:py-0 min-h-80 md:min-h-90 lg:min-h-110 flex items-center overflow-hidden -mt-4">

        <div class="absolute inset-0 z-0">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQoY05k-jNBUO0YmxAqoLM5DGm_5330TYZTmlU5wZAkAbZJzZTBJuR8jez1K2SkYI1nH1IH9BSzC87aMBdA1eWSnwXJ8jyvpwgQ2-iyucX3phY7sQMmLA98O57-3JaWaqb0wvkYAv5sy0pwY7ssk-alxoxK7qBlP9VZuDKcxGmeTuAuVOQTUXJOmiqEJoS7bk5GATbF7uAg7y3hvRgSiRkbcK6ll9T1VpwNMrVaEpkgfMbvRb5YDMuc2K52GzVeFS3YJ8VKfagpA"
                alt="Training" class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-linear-to-r  bg-secondary-500/75 to-transparent"></div>
        </div>


        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

            <div class="max-w-2xl">

                <h1 class="text-white font-bold text-2xl sm:text-3xl lg:text-4xl leading-tight mb-4 sm:mb-6">
                    Empowering the Next Generation of Professionals
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
    <section class=" py-8 md:py-12 lg:py-14 bg-white">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="">
                <div class="flex flex-col items-center justify-center">
                    <div class="h-1.5 w-14 bg-brand-500 rounded-full mb-3"></div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 tracking-tight">Our Courses</h1>
                    <p class="text-sm lg:text-base text-gray-600 text-center mt-3">We offer a range of industry-relevant
                        courses which includes Advanced Diploma of Information Technology, Advanced Diploma of Leadership
                        and Management, Diploma of Information Technology, Diploma of Leadership and Management, and
                        Graduate Diploma of Management(Learning).</p>
                </div>
                <div class=" mt-8 md:mt-12">
                    <x-frontend.courses :courses="$courses" />
                </div>
            </div>

        </div>
    </section>
    
    <section class=" py-8 md:py-12 lg:py-14 bg-white ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <x-frontend.consultation-form />
        </div>
    </section>
    <section class="pt-8 md:pt-12 lg:pt-14">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
            <x-frontend.cta />
        </div>
    </section>
@endsection

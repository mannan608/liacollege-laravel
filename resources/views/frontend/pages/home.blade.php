@extends('frontend.layouts.app')

@section('content')
    {{-- background-image: linear-gradient(45deg, #182f59, #00c8f3); --}}
    <section class="bg-secondary-500 -mt-22 pt-22 ">
        <x-frontend.hero />
    </section>
    <section class="bg-white dark:bg-gray-900 py-8 md:py-12 lg:py-14">
        <x-frontend.about />
    </section>
    <section class=" py-8 md:py-12 lg:py-14">
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
                <div class="flex items-center justify-center mt-6 md:mt-8 lg:mt-10">
                    <a href="{{ route('courses') }}"
                        class="inline-flex items-center justify-center bg-brand-600 text-white  px-5 py-3 lg:px-6 lg:py-3  rounded-lg
                        hover:bg-brand-500
                        transition duration-300">
                        VIEW ALL COURSES
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section class="relative text-white mt-6 md:mt-10 lg:mt-16"
        style="
        background-image: url('{{ asset('penta-img/educator-img12.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    ">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/75"></div>
        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-12">
                <!-- Left Content -->
                <div class="flex-1 py-12 lg:py-16">
                    <div class="w-14 h-1.5 bg-brand-500 rounded-full mb-5"></div>
                    <h1
                        class="font-bold leading-tight tracking-tight
                    text-xl sm:text-2xl md:text-3xl lg:text-4xl">
                        Limitless Learning,
                        <br class="hidden sm:block">
                        Limitless Possibilities!
                    </h1>

                    <p class="mt-3 lg:mt-4 text-gray-200
                    text-sm sm:text-base leading-relaxed">
                        Pentagon College has educational programs that develop you for
                        the real workforce. Our activities are designed to ensure that
                        you can effectively transfer your skills and knowledge into
                        workplace practice.
                    </p>

                    <!-- Features -->
                    <div class="mt-3 lg:mt-4 space-y-2">

                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#08C994" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big-icon lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/></svg>
                            <p class="text-sm sm:text-base text-gray-100">
                                Engaging and Modern classroom environment
                            </p>
                        </div>
                        <div class="flex items-start gap-2">
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#08C994" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big-icon lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/></svg>
                            <p class="text-sm sm:text-base text-gray-100">
                                Supportive community environment
                            </p>
                        </div>
                        <div class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#08C994" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big-icon lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/></svg>
                            <p class="text-sm sm:text-base text-gray-100">
                                Diverse backgrounds and inclusive culture
                            </p>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="mt-10">
                        <a href="#"
                            class="inline-flex items-center justify-center
                        bg-brand-600 text-white
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500
                        transition duration-300">

                            JOIN US NOW
                        </a>
                    </div>
                </div>

                <!-- Right Fixed Width -->
                <div class="w-full hidden md:block lg:w-151 -my-8 lg:shrink-0">

                    <div class="bg-white rounded-[300px]  overflow-hidden ">
                        <div class="grid grid-cols-2 gap-4">
                            <div
                                class="aspect-square overflow-hidden flex items-center text-black py-6 pr-4 pl-16 font-medium text-right ">
                                <h6 class="text-base md:text-lg">We aspire to set the standard as a leading training
                                    provider.</h6>
                            </div>
                            <div class="aspect-square overflow-hidden ">
                                <img src="{{ asset('penta-img/educator-img27.jpg') }}" alt=""
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="aspect-square overflow-hidden ">
                                <img src="{{ asset('penta-img/educator-img28.jpg') }}" alt=""
                                    class="w-full h-full object-cover">
                            </div>
                            <div
                                class="aspect-square overflow-hidden flex items-center text-black py-6 pr-16 pl-4 font-medium">
                                <h6 class="text-base md:text-lg">Our mission is to make high-quality education accessible
                                    for all students.</h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class=" pt-10 md:pt-16 lg:pt-22 pb-10 lg:pb-16 bg-white">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center justify-center">
                <div class="h-1.5 w-14 bg-brand-500 rounded-full mb-3"></div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 tracking-tight">Let's Know More About
                    Pentagon College</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-6 md:mt-10">

                <div class="bg-white block  p-6 border rounded-2xl shadow-xs">
                    <h5 class="mb-3 text-base md:text-lg lg:text-xl font-semibold tracking-tight text-heading leading-8">
                        Unlocking the Doors to Success at Pentagon College</h5>
                    <p class="text-body text-sm md:text-base">Section 1: A World of Opportunities Welcome to Pentagon
                        College.</p>
                </div>
                <div class="bg-white block  p-6 border rounded-2xl shadow-xs">
                    <h5 class="mb-3 text-base md:text-lg lg:text-xl font-semibold tracking-tight text-heading leading-8">
                        5 Reasons to Choose Pentagon College for an Exciting Career in Business
                    </h5>
                    <p class="text-body text-sm md:text-base">SIntroduction Welcome to Pentagon College, the leading
                        institution for aspiring.</p>
                </div>
                <div class="bg-white block  p-6 border rounded-2xl shadow-xs">
                    <h5 class="mb-3 text-base md:text-lg lg:text-xl font-semibold tracking-tight text-heading leading-8">
                        Unlocking Your Potential at Pentagon College</h5>
                    <p class="text-body text-sm md:text-base">Discovering Your True Potential At Pentagon College, we
                        believe that.</p>
                </div>

            </div>
        </div>
    </section>
    <section class="">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
            <x-frontend.cta />
        </div>
    </section>
@endsection

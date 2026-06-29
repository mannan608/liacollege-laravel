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


                <div class="flex flex-col sm:flex-row gap-4">

                    <a href="{{ route('courses') }}"
                        class="inline-flex items-center justify-center
                        bg-brand-600 text-white
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500
                        transition duration-300">
                        Our Courses
                    </a>

                </div>

            </div>

        </div>

    </section>

    <section class="py-8 md:py-12 lg:py-14 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="flex flex-col items-center justify-center mb-4 md:mb-6 lg:mb-8">
                <div class="h-1.5 w-14 bg-brand-500 rounded-full mb-3"></div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 tracking-tight text-center">Welcome to
                    Pentagon
                    College</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-0">
                <div class="img pr-0 md:pr-6 lg:pr-8">
                    <img src="{{ asset('penta-img/about-2.jpg') }}" alt="" class="object-cover">
                </div>
                <div class="content flex flex-col gap-3 md:gap-4 lg:gap-6">
                    <p class="lg:text-base text-sm text-neutral-500">Welcome to Pentagon College Australia, a leading
                        institution dedicated to transforming lives through
                        quality education. With a rich heritage and a commitment to excellence, we pride ourselves on
                        providing an exceptional learning experience to students from diverse backgrounds.</p>
                    <p class="lg:text-base text-sm text-neutral-500">

                        At Pentagon College Australia, we believe in fostering a supportive and inclusive community that
                        empowers students to unlock their potential and shape their future. Our passionate faculty members
                        bring a wealth of knowledge and industry expertise, ensuring that our programs are relevant,
                        up-to-date, and aligned with the demands of the ever-evolving professional landscape.
                    </p>
                    <p class="lg:text-base text-sm text-neutral-500">

                        We offer a comprehensive range of courses across various disciplines, including Information
                        Technology, Leadership and Management, and Graduate Diploma programs. Our curriculum is designed to
                        equip students with practical skills, critical thinking abilities, and a global mindset, preparing
                        them for success in their chosen careers.</p>
                </div>
            </div>
            <div class="flex flex-col gap-3 md:gap-4 lg:gap-6 mt-3 md:mt-4 lg:mt-6">
                <p class="lg:text-base text-sm text-neutral-500">With state-of-the-art facilities, modern learning
                    environments, and access to cutting-edge resources, we provide an immersive educational journey that
                    goes beyond traditional classroom settings. We emphasis hands-on learning, collaborative projects, and
                    industry placements, enabling students to gain valuable real-world experience and forge strong industry
                    connections.</p>

                <p class="lg:text-base text-sm text-neutral-500">At Pentagon College Australia, we prioritise the holistic
                    development of our students. Alongside academic excellence, we foster personal growth, cultural
                    diversity, and a sense of social responsibility. Our dedicated support services ensure that each student
                    receives the guidance and assistance they need to thrive academically and personally. </p>
                <p class="lg:text-base text-sm text-neutral-500">
                    We invite you to join our vibrant community of learners and embark on a transformative educational
                    journey. Discover limitless possibilities, unleash your potential, and become a leader in your field.
                    Choose Pentagon College Australia for an education that will empower you to shape a brighter future.
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

    <section class=" py-8 md:py-12 lg:py-14 ">
        <x-frontend.why />
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

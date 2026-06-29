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
            <div class="flex flex-col  mb-3 md:mb-4 lg:mb-6">
                <div class="h-1.5 w-14 bg-brand-500 rounded-full mb-3"></div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 tracking-tight">Student
                    Information</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-[65%_35%] gap-6 md:gap-0">
                <div class="content pr-0 md:pr-8 lg:pr-10">
                    <p class="lg:text-base text-sm text-neutral-500">
                        Welcome to Pentagon College. Here we provide you with everything you need to know about studying
                        with us in Australia. By choosing us as your education provider, you are choosing a high-quality and
                        industry relevant course and education provider to ensure you are set up for the future. Turtles
                        feed on plants and have unique living habits. The website <a href="https://www.replica-watches.net/"
                            class="text-brand-500">www.replicawatch.cx</a> has established itself
                        as a trusted source for premium replica watches. Their collection includes faithful reproductions of
                        Rolex’s most iconic models, crafted with attention to detail and quality materials. Customers can
                        browse various styles, from professional tool watches to elegant dress models, all featuring the
                        distinctive Rolex design language. The site provides comprehensive product information and customer
                        support to ensure buyers make informed decisions when selecting their perfect replica timepiece.</p>


                    <div class="flex flex-col mb-4 md:mb-6 lg:mb-8 mt-4 md:mt-6 lg:mt-8">
                        <div class="h-1.5 w-14 bg-brand-500 rounded-full mb-1 "></div>
                        <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 tracking-tight">
                            Student
                            Information Forms</h1>
                        <p class="text-neutral-500 text-sm mt-2">You can download our student information forms here</p>
                    </div>

                    <div class="form-lists flex flex-wrap gap-4">
                        <a href=""
                            class="inline-flex items-center justify-center
                        bg-white text-brand-500 border border-brand-500
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500 hover:text-white
                        transition duration-300">Application
                            form</a>
                        <a href=""
                            class="inline-flex items-center justify-center
                        bg-white text-brand-500 border border-brand-500
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500 hover:text-white
                        transition duration-300">Complaints
                            and Appeals Form</a>
                        <a href=""
                            class="inline-flex items-center justify-center
                        bg-white text-brand-500 border border-brand-500
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500 hover:text-white
                        transition duration-300">Deferral
                            Application Form</a>
                        <a href=""
                            class="inline-flex items-center justify-center
                        bg-white text-brand-500 border border-brand-500
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500 hover:text-white
                        transition duration-300">International
                            Student Handbook</a>
                        <a href=""
                            class="inline-flex items-center justify-center
                        bg-white text-brand-500 border border-brand-500
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500 hover:text-white
                        transition duration-300">Course
                            Withdrawal/ Fee Refund or Variation of a Course Form</a>
                    </div>

                </div>
                <div class="border border-gray-200 p-6 w-full rounded-lg bg-white max-w-150 mx-auto" id="get-in-touch-form">
                
                    <div class="md:mb-4 mb-3 lg:mb-6">
                        <h1 class="text-center text-xl md:text-2xl lg:text-3xl font-bold text-gray-900">Any Questions? Ask
                            Us!!</h1>
                    </div>
                    <x-frontend.get-in-touch />
            </div>
            </div>

        </div>
    </section>
    <section class=" py-8 md:py-12 lg:py-14 bg-white">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="">
                <div class="flex flex-col items-center justify-center">
                    <div class="h-1.5 w-14 bg-brand-500 rounded-full mb-3"></div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 tracking-tight">FAQ</h1>
                    <p class="text-sm lg:text-base text-gray-600 text-center mt-3">Your questions answered</p>
                </div>
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-neutral-primary text-heading"
                    data-inactive-classes="text-body">
                    <h2 id="accordion-flush-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-semibold rtl:text-right text-body border-b border-default gap-3"
                            data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                            aria-controls="accordion-flush-body-1">
                            <span>Our Courses</span>
                            <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m5 15 7-7 7 7" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-5 border-b border-default text-body">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500">
                                    <thead class="text-xs text-white uppercase bg-brand-500">
                                        <tr class="">
                                            <th scope="col" class="px-6 py-4">
                                                Course Name
                                            </th>
                                            <th scope="col" class="px-6 py-4">
                                                Level
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-center">
                                                Duration (Wks)
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b hover:bg-gray-50 text-sm lg:text-base">
                                            <td class="px-6 py-4 font-medium text-gray-900">
                                                Advanced Diploma of Information Technology ICT60220
                                                <span class="block text-xs text-gray-500">
                                                    CRICOS 109180H
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                Advanced Diploma
                                            </td>
                                            <td class="px-6 py-4 text-center font-semibold">
                                                78
                                            </td>
                                        </tr>

                                        <tr class="bg-white border-b hover:bg-gray-50 text-sm lg:text-base">
                                            <td class="px-6 py-4 font-medium text-gray-900">
                                                Advanced Diploma of Leadership and Management BSB60420
                                                <span class="block text-xs text-gray-500">
                                                    CRICOS 109177C
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                Advanced Diploma
                                            </td>
                                            <td class="px-6 py-4 text-center font-semibold">
                                                65
                                            </td>
                                        </tr>

                                        <tr class="bg-white border-b hover:bg-gray-50 text-sm lg:text-base">
                                            <td class="px-6 py-4 font-medium text-gray-900">
                                                Diploma of Information Technology ICT50220
                                                <span class="block text-xs text-gray-500">
                                                    CRICOS 109179A
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                Diploma
                                            </td>
                                            <td class="px-6 py-4 text-center font-semibold text-sm lg:text-base">
                                                78
                                            </td>
                                        </tr>

                                        <tr class="bg-white border-b hover:bg-gray-50 text-sm lg:text-base">
                                            <td class="px-6 py-4 font-medium text-gray-900">
                                                Diploma of Leadership and Management BSB50420
                                                <span class="block text-xs text-gray-500">
                                                    CRICOS 109176D
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                Diploma
                                            </td>
                                            <td class="px-6 py-4 text-center font-semibold">
                                                78
                                            </td>
                                        </tr>

                                        <tr class="bg-white hover:bg-gray-50 text-sm lg:text-base">
                                            <td class="px-6 py-4 font-medium text-gray-900">
                                                Graduate Diploma of Management (Learning) BSB80120
                                                <span class="block text-xs text-gray-500">
                                                    CRICOS 109178B
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                Graduate Diploma
                                            </td>
                                            <td class="px-6 py-4 text-center font-semibold">
                                                52
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <h2 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-semibold rtl:text-right text-body border-b border-default gap-3"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <span>Visas and Conditions</span>
                            <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m5 15 7-7 7 7" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div class="py-5 border-b border-default text-body">
                            <p class="mb-2 text-sm lg:text-base text-gray-600"> After you have successfully completed the
                                application and enrolment process,
                                you will be issued
                                with a Confirmation of Enrolment (CoE). Once you have this, you can apply to the Department
                                of
                                Home Affairs for a student visa. You may choose to use a Registered Migration Agent or may
                                choose to complete it yourself. More information about how to apply for a visa can be
                                accessed
                                here : <a class="text-brand-500"
                                    href="https://immi.homeaffairs.gov.au/visas/getting-a-visa/visa-finder/study"
                                    class="text-fg-brand hover:underline">https://immi.homeaffairs.gov.au/visas/getting-a-visa/visa-finder/study</a>
                            </p>
                            <p class="text-sm lg:text-base text-gray-600"> Once you have received your visa, you must abide
                                by its conditions. If you don’t, you can be
                                sent home and won’t be able to finish your course. Conditions include (but are not limited
                                to):
                                • Satisfy attendance and/or course progress requirements and maintain a valid enrolment for
                                your
                                course.</p>

                        </div>
                    </div>
                    <h2 id="accordion-flush-heading-3">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-semibold rtl:text-right text-body border-b border-default gap-3"
                            data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                            aria-controls="accordion-flush-body-3">
                            <span>What is a USI and why do I need one?</span>
                            <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m5 15 7-7 7 7" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="py-5 text-body border-b border-default">
                            <p class="mb-2 text-sm lg:text-base text-gray-600">USI is the acronym for Unique Student
                                Identifier. It is a reference number
                                that creates an online record of your training and qualifications attained in Australia. If
                                you don’t have a USI, then you can’t be awarded your qualification or statement of
                                attainment. Under the Unique Student Identifiers Act 2014, all RTOs must ensure they have a
                                valid USI for any student that enrols in nationally recognised training from 2015. This
                                means (unless you have an exemption issued by the USI registrar) that as a student you must
                                provide us with your USI.</p>

                            <p class="mb-2 text-sm lg:text-base text-gray-600">For information about USIs including how to
                                create one visit
                                <a href=" https://www.usi.gov.au/" class="text-brand-500"> https://www.usi.gov.au/</a>.
                                For information on exemptions visit:
                                <a href=" https://www.usi.gov.au/about/privacy-and-unique-studentidentifier/individual-exemptions-students"
                                    class="text-brand-500">
                                    https://www.usi.gov.au/about/privacy-and-unique-studentidentifier/individual-exemptions-students</a>
                                If you are having trouble creating a USI, we will assist you during the orientation session
                                on the first day.
                            </p>

                        </div>
                    </div>

                    <h2 id="accordion-flush-heading-4">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-semibold rtl:text-right text-body border-b border-default gap-3"
                            data-accordion-target="#accordion-flush-body-4" aria-expanded="false"
                            aria-controls="accordion-flush-body-4">
                            <span>RPL and credit transfer</span>
                            <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m5 15 7-7 7 7" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                        <div class="py-5 text-body border-b border-default">
                            <p class="mb-2 text-sm lg:text-base text-gray-600">Credit transfer is a formal recognition of
                                previous studies and can help to
                                reduce the duration of your course, as well as fees. You may apply for a credit transfer for
                                a complete unit or modules within a unit. There is no charge to apply for a credit transfer
                                but you need to let us know that you want to apply for this on your application for
                                enrolment form in the relevant section. You will need to provide a certified copy of your
                                certificate either issued by another education provider or an authenticated VET transcript
                                issued by the USI Registrar.</p>

                            <p class="mb-2 text-sm lg:text-base text-gray-600">Recognition of Prior Learning (RPL) is a
                                process where skills and knowledge
                                that you have gained through work and life experience and other unrecognised training can be
                                formally recognised. You need to let us know that you want to apply for RPL at the time of
                                application by indicating this on the application for enrolment form in the relevant
                                section. There is a charge for RPL and this can be viewed in the Fees and Refunds section of
                                this handbook. RPL can also reduce your course duration and fees. We will inform you in
                                writing of any reduced course duration and fees due to credit transfer and RPL and issue
                                your CoE for the reduced duration of the course.</p>

                        </div>
                    </div>
                    <h2 id="accordion-flush-heading-5">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-semibold rtl:text-right text-body border-b border-default gap-3"
                            data-accordion-target="#accordion-flush-body-5" aria-expanded="false"
                            aria-controls="accordion-flush-body-5">
                            <span>Support and welfare</span>
                            <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m5 15 7-7 7 7" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-5">
                        <div class="py-5 text-body border-b border-default">
                            <p class="mb-2 text-sm lg:text-base text-gray-600">We all need a little extra support sometimes
                                and when you are living and
                                studying overseas – you may need a little bit more than you normally would.

                                We are here to help you – so don’t ever be shy to let us know what you are going through and
                                how we can help. We offer the following in relation to support and welfare:</p>

                            <ul class="list-disc pl-5 space-y-0.5 my-3 text-gray-700 text-sm lg:text-base ">
                                <li>One-to-one support from the trainer/assessor.</li>
                                <li>Support with personal issues.</li>
                                <li>Access to additional learning resources.</li>
                                <li>Reasonable adjustment in assessment.</li>
                                <li>Social events.</li>
                                <li>Buddy program.</li>
                                <li>Information about external sources of support.</li>
                            </ul>

                            <p class="mb-2 text-sm lg:text-base text-gray-600">You may not have studied for a while, may
                                have English as a second language
                                or need additional assistance with literacy or numeracy. We will identify any additional
                                support needs you may have at the time of application and enrolment and may prepare an
                                Student Support Plan for you based on those needs. We have a range of information we can
                                provide you with on a variety of issues – this may be related to accommodation, legal or
                                financial issues, cultural considerations, disability support, stress management – or maybe
                                you are experiencing a bout of homesickness. If you are experiencing it – then we are
                                concerned about it. Please communicate with us because we care. We don’t charge for internal
                                services but you will be responsible for any external provider costs at the time you access
                                the services. We can assist you to find local groups of like-minded people in the area,
                                connect you with other students with similar interest groups or simply be a friendly
                                listening ear when you need one. Depending on your needs, we will provide you with a
                                referral to the relevant local organisation and assist you to access services from them.
                            </p>

                            <p class="text-sm lg:text-base text-gray-600">
                                Please contact Pentagon team for any support or assistance on <br>
                                info@pentagoncollege.edu.au
                                <br> Or call us on +61 2-9037 6310
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 md:py-12 lg:py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

            <!-- Header -->
            <div class="max-w-4xl mx-auto text-center mb-12 lg:mb-16">
                <span
                    class="inline-flex items-center rounded-full bg-brand-500 text-white px-4 py-2 text-sm font-medium">
                    Enrollment Process
                </span>
                <h2 class="mt-4 text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900">
                    Start Your Journey with Pentagon College
                </h2>
                <p class="mt-6 text-sm md:text-base text-gray-600 leading-relaxed">
                    Getting started is easy. Complete your enrolment application, submit your
                    supporting documents, and receive your Confirmation of Enrolment (CoE)
                    to begin your studies in Australia.
                </p>
            </div>

            <!-- Quick Process -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">

                <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm hover:shadow-lg transition">
                    <div
                        class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 rounded-xl bg-brand-500 text-white flex items-center justify-center font-bold text-sm md:text-base mb-4">
                        1
                    </div>
                    <h4 class="font-semibold text-lg mb-2">Apply</h4>
                    <p class="text-gray-600 text-sm">
                        Submit your enrolment form and supporting documents.
                    </p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm hover:shadow-lg transition">
                    <div
                        class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 rounded-xl bg-brand-500 text-white flex items-center justify-center font-bold text-sm md:text-base mb-4">
                        2
                    </div>
                    <h4 class="font-semibold text-lg mb-2">Offer Letter</h4>
                    <p class="text-gray-600 text-sm">
                        Receive your offer letter and student portal access.
                    </p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm hover:shadow-lg transition">
                    <div
                        class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 rounded-xl bg-brand-500 text-white flex items-center justify-center font-bold text-sm md:text-base mb-4">
                        3
                    </div>
                    <h4 class="font-semibold text-lg mb-2">Payment</h4>
                    <p class="text-gray-600 text-sm">
                        Accept the offer and complete your tuition payment.
                    </p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm hover:shadow-lg transition">
                    <div
                        class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 rounded-xl bg-brand-500 text-white flex items-center justify-center font-bold text-sm md:text-base mb-4">
                        4
                    </div>
                    <h4 class="font-semibold text-lg mb-2">Receive CoE</h4>
                    <p class="text-gray-600 text-sm">
                        Get your Confirmation of Enrolment within 48 hours.
                    </p>
                </div>

            </div>

            <!-- Steps -->
            <div class="space-y-8">

                <!-- Step 1 -->
                <div class="bg-white border border-gray-100 rounded-3xl p-6 lg:p-8 shadow-sm">
                    <div class="flex flex-col lg:flex-row gap-6">
                        <div>
                            <div
                                class="w-10 h-10 md:w-12 md:h-12 lg:w-14 lg:h-14 rounded-2xl bg-brand-500 text-white flex items-center justify-center text-base md:text-lg lg:text-xl font-bold">
                                1
                            </div>
                        </div>

                        <div class="flex-1">
                            <h3 class="text-lg lg:text-xl font-bold mb-3">
                                Complete Your Application
                            </h3>

                            <p class="text-gray-600 mb-6 text-sm md:text-base">
                                Download and complete the enrolment form. Upload all
                                required supporting documents based on your application type.
                            </p>

                            <div class="grid md:grid-cols-2 gap-6">

                                <div class="bg-gray-50 rounded-2xl p-6">
                                    <h4 class="font-semibold text-lg mb-4">
                                        Applying in Australia
                                    </h4>

                                    <ul class="list-disc pl-5 space-y-1 text-gray-600 text-sm md:text-base">
                                        <li>Copy of Passport</li>
                                        <li>Visa Status & Expiry Date</li>
                                        <li>Academic Transcript</li>
                                        <li>Proof of English</li>
                                        <li>Release Letter (if applicable)</li>
                                        <li>Current CoEs (if applicable)</li>
                                    </ul>
                                </div>

                                <div class="bg-gray-50 rounded-2xl p-6">
                                    <h4 class="font-semibold text-lg mb-4">
                                        Applying from Overseas
                                    </h4>

                                    <ul class="list-disc pl-5 space-y-1 text-gray-600 text-sm md:text-base">
                                        <li>Copy of Passport</li>
                                        <li>Proof of English</li>
                                        <li>Academic Results (if applicable)</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="bg-white border border-gray-100 rounded-3xl p-6 lg:p-8 shadow-sm">
                    <div class="flex flex-col lg:flex-row gap-6">
                        <div>
                            <div
                                class="w-10 h-10 md:w-12 md:h-12 lg:w-14 lg:h-14 rounded-2xl bg-brand-500 text-white flex items-center justify-center text-base md:text-lg lg:text-xl font-bold">
                                2
                            </div>
                        </div>

                        <div class="flex-1">
                            <h3 class="text-lg lg:text-xl font-bold mb-4">
                                Receive Your Offer Letter
                            </h3>

                            <ul class="list-disc pl-5 space-y-1 text-gray-600 text-sm md:text-base">
                                <li>Student Portal login details will be emailed to you.</li>
                                <li>Offer Letter issued within 48 hours.</li>
                                <li>Conditional Offer Letter may be issued if documents are missing.</li>
                                <li>Full Offer Letter issued after all documents are received.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="bg-white border border-gray-100 rounded-3xl p-6 lg:p-8 shadow-sm">
                    <div class="flex flex-col lg:flex-row gap-6">
                        <div>
                            <div
                                class="w-10 h-10 md:w-12 md:h-12 lg:w-14 lg:h-14 rounded-2xl bg-brand-500 text-white flex items-center justify-center text-base md:text-lg lg:text-xl font-bold">
                                3
                            </div>
                        </div>

                        <div class="flex-1">
                            <h3 class="text-lg lg:text-xl font-bold mb-4">
                                Accept & Make Payment
                            </h3>

                            <p class="text-gray-600 mb-4 text-sm md:text-base">
                                Accept your Offer Letter and Written Agreement before making payment.
                            </p>

                            <ul class="list-disc pl-5 space-y-1 text-gray-600 text-sm md:text-base">
                                <li>Accept the Written Agreement.</li>
                                <li>Complete tuition fee payment.</li>
                                <li>Upload payment receipt or remittance advice.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="bg-white border border-gray-100 rounded-3xl p-6 lg:p-8 shadow-sm">
                    <div class="flex flex-col lg:flex-row gap-6">
                        <div>
                            <div
                                class="w-10 h-10 md:w-12 md:h-12 lg:w-14 lg:h-14 rounded-2xl bg-brand-500 text-white flex items-center justify-center text-base md:text-lg lg:text-xl font-bold">
                                4
                            </div>
                        </div>

                        <div class="flex-1">
                            <h3 class="text-lg lg:text-xl font-bold mb-4">
                                Receive Your CoE
                            </h3>

                            <p class="text-gray-600 text-sm md:text-base">
                                Your Confirmation of Enrolment (CoE) will be issued and uploaded
                                to your student portal within 48 hours after payment confirmation.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Note -->
            <div class="mt-12 bg-brand-500 text-white border border-primary-100 rounded-3xl p-6 lg:p-8">
                <h4 class="text-xl font-semibold mb-3">
                    Important Information
                </h4>

                <p class="text-white leading-relaxed text-sm md:text-base">
                    The Written Agreement is a legally binding contract between the student
                    and the College. All education providers are required by Australian law
                    to retain these agreements in accordance with the National Code of
                    Practice for Registration Authorities and Providers of Education and
                    Training to Overseas Students.
                </p>
            </div>

        </div>
    </section>
    <section class="pt-8 md:pt-12 lg:pt-14">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
            <x-frontend.cta />
        </div>
    </section>
@endsection

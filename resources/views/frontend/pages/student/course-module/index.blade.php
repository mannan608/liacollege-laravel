@extends('frontend.pages.student.layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 py-12">

    <div class="max-w-5xl mx-auto px-8">

        <!-- Breadcrumb -->
        <nav class="flex items-center gap-3 text-sm mb-8">
            <a href="#" class="text-slate-500 hover:text-slate-900 transition">
                My Enrolments
            </a>

            <span class="text-slate-300">/</span>

            <a href="#" class="text-slate-500 hover:text-slate-900 transition">
                Provide First Aid
            </a>

            <span class="text-slate-300">/</span>

            <span class="text-slate-900 font-medium">
                eLearning Presentation (SCORM)
            </span>
        </nav>

        <!-- Main Card -->
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm">

            <!-- Header -->
            <div class="px-12 py-10 border-b border-slate-200">

                <div class="flex items-center gap-5">

                    <div class="w-14 h-14 rounded-xl bg-slate-100 flex items-center justify-center">
                        <i class="fa-solid fa-laptop-code text-xl text-slate-700"></i>
                    </div>

                    <div>
                        <h1 class="text-3xl font-semibold text-slate-900">
                            eLearning Package
                        </h1>

                        <p class="mt-1 text-slate-500">
                            Part 1 • CPR Online Training & Quiz
                        </p>
                    </div>

                </div>

            </div>

            <!-- Body -->
            <div class="px-12 py-12">

                <div class="max-w-3xl mx-auto">

                    <!-- Info Box -->
                    <div class="border border-slate-200 rounded-2xl p-8">

                        <div class="flex items-center gap-2 mb-6">

                            <div class="w-2 h-2 rounded-full bg-amber-500"></div>

                            <span class="text-xs font-semibold tracking-wider text-slate-500 uppercase">
                                Important
                            </span>

                        </div>

                        <p class="text-slate-700 leading-8 text-lg">
                            This online learning tests the knowledge components
                            of the unit of competency that you have enrolled in.
                        </p>

                        <div class="mt-6 inline-flex items-center px-4 py-2 rounded-lg bg-slate-100">

                            <span class="text-sm text-slate-600">
                                Required Score:
                            </span>

                            <span class="ml-2 font-semibold text-slate-900">
                                100%
                            </span>

                        </div>

                        <p class="mt-6 text-slate-600 leading-7">
                            Click the button below to launch your eLearning module.
                            It will open in a new browser tab. After completion,
                            close the tab and return here.
                        </p>

                    </div>

                    <!-- Action -->
                    <div class="mt-10 flex justify-center">

                        <button
                            onclick="window.open('#')"
                            class="group inline-flex items-center gap-3
                            bg-slate-900 hover:bg-slate-800
                            text-white font-medium
                            px-8 py-4 rounded-xl
                            transition-all duration-200">

                            <span>Launch eLearning Module</span>

                            <i class="fa-solid fa-arrow-up-right-from-square text-sm
                            transition-transform duration-200
                            group-hover:translate-x-0.5"></i>

                        </button>

                    </div>

                    <!-- Back -->
                    <div class="mt-6 text-center">

                        <button
                            onclick="window.location='#'"
                            class="text-slate-500 hover:text-slate-900
                            transition font-medium">

                            Go Back

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection
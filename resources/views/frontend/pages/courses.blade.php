@extends('frontend.layouts.app')

@section('content')

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

@endsection

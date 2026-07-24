@extends('backend.layouts.fullscreen-layout')

@section('content')
    <div class="relative z-1 bg-neutral-100 p-6 sm:p-0 dark:bg-gray-900 min-h-screen">
        <div class="relative min-h-screen w-full flex items-center justify-center p-4">
            <div
                class="w-full max-w-2xl bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_8px_40px_-12px_rgba(0,0,0,0.12)] border border-white/60 overflow-hidden">

                <!-- Success Header -->
                <div
                    class="relative bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-600 px-8 py-16 text-center overflow-hidden">
                    <div class="absolute inset-0 opacity-10"
                        style="background-image: radial-gradient(circle at 30px 30px, white 2px, transparent 0); background-size: 60px 60px;">
                    </div>

                    <!-- Big Success Icon -->
                    <div
                        class="mx-auto w-24 h-24 bg-white rounded-2xl flex items-center justify-center shadow-xl shadow-emerald-500/30 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-emerald-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <h1 class="text-4xl font-bold text-white tracking-tight">Payment Successful!</h1>
                    <p class="text-emerald-100 mt-3 text-lg">Your enrolment has been confirmed</p>
                </div>

                <!-- Content -->
                <div class="px-8 py-10">

                    <!-- Booking Info -->
                    <div class="bg-gray-50 dark:bg-gray-900 rounded-2xl p-6 mb-8">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm text-gray-500">Course</p>
                                <p class="font-semibold text-lg text-slate-800">{{ $enrollment->slot->course->name }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Booking ID</p>
                                <p class="font-mono font-semibold text-emerald-600">
                                    #FA-{{ strtoupper(substr(md5(time()), 0, 8)) }}</p>
                            </div>
                        </div>

                        <div class="h-px bg-gray-200 my-6"></div>

                        <div class="grid grid-cols-2 gap-6 text-sm">
                            <div>
                                <p class="text-gray-500">Date</p>
                                <p class="font-medium">Monday, 13 July 2026</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Time</p>
                                <p class="font-medium">08:30 AM - 11:30 AM</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Location</p>
                                <p class="font-medium leading-tight">Prince Centre, Level 5<br>8 Quay Street, Haymarket NSW
                                    2000</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Amount Paid</p>
                                <p class="font-semibold text-emerald-600">$149.00 AUD</p>
                            </div>
                        </div>
                    </div>

                    <!-- Success Message -->
                    <div class="text-center mb-10">
                        <p class="text-slate-600 dark:text-slate-400 text-lg">
                            Thank you for your purchase!<br>
                            You will receive a confirmation email shortly with all the details.
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">

                        @auth
                            <a href="{{ auth()->user()->rolePrefix() === 'student' ? route('student.dashboard') : route('login') }}"
                                class="flex-1 py-4 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-2xl text-center transition-all active:scale-95">

                                Go to Dashboard
                            </a>
                        @endauth

                        <a href="#"
                            class="flex-1 py-4 border border-slate-300 hover:border-slate-400 font-semibold rounded-2xl text-center transition-all active:scale-95">
                            Download Receipt
                        </a>
                    </div>

                    <div class="text-center mt-8">
                        <a href=""
                            class="text-cyan-600 hover:text-cyan-700 font-medium inline-flex items-center gap-2">
                            ← Browse More Courses
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

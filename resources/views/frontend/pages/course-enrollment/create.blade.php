@extends('backend.layouts.fullscreen-layout')

@section('content')
    <div class=" w-full p-0 bg-neutral-100 dark:bg-gray-900">

        <!-- Main Container -->
        <div class="max-w-3xl mx-auto px-6 py-10">

            <!-- Return Student Notice -->
            <div class="mb-8 p-4 rounded-xl bg-amber-50/80 border border-amber-200/60 flex items-start gap-3">
                <svg class="w-5 h-5 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <p class="text-sm text-amber-800 font-medium">If you're a returning student, please <a href="#"
                            class="underline underline-offset-2 decoration-amber-400 hover:decoration-amber-600 font-semibold">log
                            in first</a> to access your existing profile before proceeding.</p>
                </div>
            </div>

            <!-- Main Card -->
            <div
                class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-[0_8px_40px_-12px_rgba(0,0,0,0.12)] border border-white/60 overflow-hidden transition-all duration-500 hover:shadow-[0_20px_60px_-12px_rgba(0,0,0,0.18)]">

                <!-- Header Section -->
                <div class="relative bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 px-8 py-10 overflow-hidden">
                    <div class="absolute inset-0 opacity-[0.03]"
                        style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 24px 24px;">
                    </div>
                    <div class="absolute -top-20 -right-20 w-64 h-64 bg-cyan-400/10 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-emerald-400/8 rounded-full blur-2xl"></div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-2 mb-5">
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 border border-white/10 text-xs font-semibold text-cyan-300 tracking-wide uppercase backdrop-blur-sm">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Training Enrolment
                            </span>
                        </div>

                        <h1 class="text-3xl font-bold text-white tracking-tight leading-tight mb-3">
                            HLTAID011 Provide First Aid
                        </h1>

                        <div class="flex items-center gap-3 text-slate-300">
                            <div
                                class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center backdrop-blur-sm border border-white/5">
                                <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium">Sydney FA Quay Street</span>
                        </div>
                    </div>
                </div>

                <!-- Form Body -->
                <div class="px-8 py-8 space-y-8">

                    <!-- Required Notice -->
                    <div class="flex items-center gap-2 text-xs text-slate-500">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span>
                        <span>All questions in <span class="font-semibold text-slate-700">bold</span> are required to
                            complete your application</span>
                    </div>
                    <form method="POST" action="{{ route('course-enrollment.checkout') }}" class="space-y-8">
                        @csrf

                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="hidden" name="slot_id" value="{{ $slot->id }}">

                        <!-- Name Fields -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-slate-800">
                                    First Name <span class="text-rose-400">*</span>
                                </label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}"
                                    placeholder="First name" required
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-cyan-400 focus:bg-white transition-all duration-200">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-slate-800">
                                    Surname <span class="text-rose-400">*</span>
                                </label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Surname"
                                    required
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-cyan-400 focus:bg-white transition-all duration-200">
                            </div>
                        </div>

                        <!-- Date of Birth -->
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-slate-800">
                                Date of Birth <span class="text-rose-400">*</span>
                            </label>
                            <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-800 focus:outline-none focus:border-cyan-400 focus:bg-white transition-all duration-200">
                        </div>

                        <!-- Email Fields -->
                        <div class="space-y-5">
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-slate-800">
                                    E-mail Address <span class="text-rose-400">*</span>
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="email address"
                                    required
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-cyan-400 focus:bg-white transition-all duration-200">
                                <div
                                    class="flex items-start gap-2 mt-2 p-3 rounded-lg bg-amber-50/60 border border-amber-100/60">
                                    <svg class="w-4 h-4 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                        </path>
                                    </svg>
                                    <p class="text-xs text-amber-800 leading-relaxed">
                                        <span class="font-semibold">Important!</span> Ensure that you enter your own e-mail
                                        address and not one that is shared with any other person. If you are unable to enrol
                                        with your e-mail address and you have trained with us before, ensure that your name
                                        and date of birth are correctly entered. Please <a href="#"
                                            class="underline underline-offset-2 decoration-amber-400 hover:decoration-amber-600 font-semibold">contact
                                            us</a> if you experience any problems.
                                    </p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-slate-800">
                                    Enter E-mail Again <span class="text-rose-400">*</span>
                                </label>
                                <input type="email" name="email_confirmation" value="{{ old('email_confirmation') }}"
                                    placeholder="email address again" required
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-cyan-400 focus:bg-white transition-all duration-200">
                            </div>
                        </div>

                        <!-- Mobile Phone -->
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-slate-800">
                                Mobile Phone Number <span class="text-rose-400">*</span>
                            </label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="mobile number"
                                required
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-cyan-400 focus:bg-white transition-all duration-200">
                        </div>

                        <!-- USI -->
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-slate-800">
                                U.S.I. <span class="text-rose-400">*</span>
                            </label>
                            <input type="text" name="usi" value="{{ old('usi') }}" placeholder="USI" required
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-cyan-400 focus:bg-white transition-all duration-200">
                            <p class="text-xs text-slate-500 mt-2">
                                If you do not yet have your USI, <a href="#"
                                    class="text-cyan-600 hover:text-cyan-700 font-semibold underline underline-offset-2 decoration-cyan-300 hover:decoration-cyan-500 transition-all duration-200">click
                                    here to create one</a>.
                            </p>
                        </div>

                        <!-- Voucher Code -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">
                                Voucher Code <span class="text-slate-400 font-normal">(if you have one)</span>
                            </label>
                            <input type="text" name="voucher_code" value="{{ old('voucher_code') }}"
                                placeholder="voucher code"
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-cyan-400 focus:bg-white transition-all duration-200">
                        </div>

                        <!-- Purchase Order Ref -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">
                                Purchase Order Ref.
                            </label>
                            <input type="text" name="purchase_order_ref" value="{{ old('purchase_order_ref') }}"
                                placeholder="p.o. reference"
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-cyan-400 focus:bg-white transition-all duration-200">
                        </div>

                        <!-- Terms Checkbox -->
                       
                        <div class="pt-2">
                            <label class="flex items-start gap-3 cursor-pointer group">
                                <div class="relative shrink-0 mt-0.5">
                                    <input type="checkbox" name="terms" value="1"
                                        class="custom-checkbox sr-only peer" required>

                                    <!-- Box -->
                                    <div
                                        class="w-5 h-5 rounded-md border-2 border-slate-300 bg-white flex items-center justify-center transition-all duration-200 peer-focus:ring-2 peer-focus:ring-cyan-400/30 group-hover:border-cyan-400 peer-checked:bg-cyan-500 peer-checked:border-cyan-500">
                                    </div>

                                    <!-- SVG as sibling - now peer-checked works -->
                                    <svg class="w-3 h-3 text-white absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 hidden peer-checked:block pointer-events-none"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-sm text-slate-700 leading-relaxed">
                                    I have read the <a href="#"
                                        class="text-cyan-600 hover:text-cyan-700 font-semibold underline underline-offset-2 decoration-cyan-300 hover:decoration-cyan-500 transition-all duration-200">Terms
                                        and Conditions</a>
                                </span>
                            </label>
                        </div>

                        <!-- Divider -->
                        <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                        <!-- Payment Details -->
                        <div class="space-y-5">
                            <div class="flex items-center gap-2">
                                <div class="w-1 h-5 rounded-full bg-gradient-to-b from-cyan-500 to-blue-500"></div>
                                <h2 class="text-lg font-bold text-slate-800 tracking-tight">Payment Details</h2>
                            </div>

                            <div
                                class="p-5 rounded-xl bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-100/80 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-emerald-500 flex items-center justify-center shadow-lg shadow-emerald-500/20">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Amount Due
                                        </p>
                                        <p class="text-xl font-bold text-slate-800">${{ number_format($slot->price, 2) }}
                                        </p>
                                    </div>
                                </div>
                                <span
                                    class="text-xs text-emerald-600 font-medium bg-emerald-100/60 px-3 py-1 rounded-full">Due
                                    now</span>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-slate-800">
                                    Payment Method <span class="text-rose-400">*</span>
                                </label>
                                <select name="payment_method" required
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-800 focus:outline-none focus:border-cyan-400 focus:bg-white transition-all duration-200 appearance-none cursor-pointer">
                                    <option value="" disabled selected>Select payment method</option>
                                    <option value="visa">Visa</option>
                                    <option value="mastercard">Mastercard</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                    <option value="cash">Cash</option>
                                </select>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                        <!-- Actions -->
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4 pt-2">

                            <!-- Continue Button -->
                            <button type="submit"
                                class="btn-sheen group relative px-8 py-3.5 rounded-xl bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 text-white font-semibold text-sm shadow-lg shadow-slate-900/20 hover:shadow-xl hover:shadow-slate-900/30 active:scale-[0.98] transition-all duration-300 overflow-hidden">
                                <span class="relative flex items-center justify-center gap-2">
                                    Continue to Checkout
                                    <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform duration-300"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </span>
                            </button>

                            <!-- Sign In Link -->
                            <div class="flex items-center gap-2 text-sm text-slate-500 justify-center sm:justify-end">
                                <span>Already enrolled?</span>
                                <a href="#"
                                    class="group/link inline-flex items-center gap-1 font-semibold text-slate-700 hover:text-cyan-600 transition-colors duration-200">
                                    Sign In
                                    <svg class="w-3.5 h-3.5 group-hover/link:translate-x-0.5 transition-transform duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

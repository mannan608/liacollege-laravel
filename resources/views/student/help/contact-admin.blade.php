@extends('student.layouts.app')

@section('content')
<div class="min-h-[calc(100vh-80px)] bg-slate-50 py-12 px-4 sm:px-6">
    <div class="max-w-2xl mx-auto">

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-600 inline-flex items-center justify-center mb-5 shadow-lg shadow-brand-500/20">
                <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Contact Student Administrator</h1>
            <p class="mt-2 text-base text-slate-500 max-w-md mx-auto leading-relaxed">
                Use this form for general questions, feedback, or issues regarding your enrolment(s).
            </p>
        </div>

        <!-- Notice Card -->
        <div class="bg-amber-50 border border-amber-200 rounded-2xl p-5 mb-8 flex gap-4 items-start">
            <div class="w-9 h-9 rounded-lg bg-amber-500 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <circle cx="12" cy="12" r="10"/>
                    <path stroke-linecap="round" d="M12 16v-4"/>
                    <path stroke-linecap="round" d="M12 8h.01"/>
                </svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-amber-900 mb-1">
                    This form is for <span class="font-bold">administration communication only</span>.
                </p>
                <p class="text-sm text-amber-800/80 leading-relaxed">
                    For learning-related questions, please contact your assessor by opening your course from your dashboard and clicking <strong>"Message Assessor"</strong> at the bottom left.
                </p>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-[0_1px_3px_rgba(0,0,0,0.04),0_8px_32px_rgba(0,0,0,0.04)] overflow-hidden">
            
            <!-- Accent bar -->
            <div class="h-1 bg-gradient-to-r from-brand-500 via-purple-500 to-pink-500"></div>

            <form action="" method="POST" class="p-8">
                @csrf

                <!-- Message -->
                <div class="mb-7">
                    <label for="message" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2.5">
                        Your Message
                    </label>
                    <textarea
                        id="message"
                        name="message"
                        rows="6"
                        placeholder="Describe your question, feedback, or issue in detail..."
                        class="w-full px-4 py-3.5 border-[1.5px] border-slate-200 rounded-xl text-[15px] text-slate-900 bg-slate-50/60 resize-y focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 focus:bg-white transition-all duration-200 outline-none placeholder:text-slate-400 leading-relaxed"
                        required
                    >{{ old('message') }}</textarea>
                    <p class="mt-2 text-xs text-slate-400">Please be as detailed as possible so we can assist you quickly.</p>
                    @error('message')
                        <p class="mt-1.5 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Divider -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="flex-1 h-px bg-slate-200"></div>
                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Course Details (Optional)</span>
                    <div class="flex-1 h-px bg-slate-200"></div>
                </div>

                <p class="text-sm text-slate-500 mb-5 leading-relaxed">
                    If your question relates to a specific course or unit, please provide the following:
                </p>

                <!-- Course Details Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-2">

                    <!-- Recognised Code -->
                    <div>
                        <label for="recognised_code" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2.5">
                            Recognised Code
                        </label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                                    <path d="M9 3v18"/><path d="M15 3v18"/><path d="M3 9h18"/><path d="M3 15h18"/>
                                </svg>
                            </div>
                            <input
                                type="text"
                                id="recognised_code"
                                name="recognised_code"
                                value="{{ old('recognised_code') }}"
                                placeholder="e.g. BSB40120"
                                class="w-full pl-10 pr-4 py-3 border-[1.5px] border-slate-200 rounded-xl text-[15px] text-slate-900 bg-slate-50/60 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 focus:bg-white transition-all duration-200 outline-none placeholder:text-slate-400"
                            >
                        </div>
                        @error('recognised_code')
                            <p class="mt-1.5 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Course/Unit Title -->
                    <div>
                        <label for="course_title" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2.5">
                            Course / Unit Title
                        </label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"/>
                                </svg>
                            </div>
                            <input
                                type="text"
                                id="course_title"
                                name="course_title"
                                value="{{ old('course_title') }}"
                                placeholder="e.g. Cert IV Business"
                                class="w-full pl-10 pr-4 py-3 border-[1.5px] border-slate-200 rounded-xl text-[15px] text-slate-900 bg-slate-50/60 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 focus:bg-white transition-all duration-200 outline-none placeholder:text-slate-400"
                            >
                        </div>
                        @error('course_title')
                            <p class="mt-1.5 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Year Enrolled -->
                    <div>
                        <label for="year_enrolled" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2.5">
                            Year Enrolled
                        </label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2"/>
                                    <path d="M16 2v4M8 2v4M3 10h18"/>
                                </svg>
                            </div>
                            <input
                                type="text"
                                id="year_enrolled"
                                name="year_enrolled"
                                value="{{ old('year_enrolled') }}"
                                placeholder="e.g. 2026"
                                class="w-full pl-10 pr-4 py-3 border-[1.5px] border-slate-200 rounded-xl text-[15px] text-slate-900 bg-slate-50/60 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 focus:bg-white transition-all duration-200 outline-none placeholder:text-slate-400"
                            >
                        </div>
                        @error('year_enrolled')
                            <p class="mt-1.5 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit -->
                <div class="pt-6 flex justify-end">
                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-brand-500 to-brand-600 hover:from-brand-600 hover:to-brand-700 text-white font-semibold text-[15px] px-7 py-3 rounded-xl shadow-lg shadow-brand-500/25 hover:shadow-brand-500/40 transition-all duration-200 active:scale-[0.98]"
                    >
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                        </svg>
                        Send Message
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer note -->
        <p class="text-center text-xs text-slate-400 mt-5">We typically respond within 1-2 business days.</p>

    </div>
</div>
@endsection
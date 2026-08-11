@extends('frontend.layouts.app')

@section('content')
    <main class="font-sans antialiased text-slate-800">
        
        <!-- Hero Section -->
        <section class="relative w-full min-h-[80vh] flex items-center justify-center overflow-hidden">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <img 
                    src="https://lh3.googleusercontent.com/aida/AP1WRLvhlqO5nA1JOwDhvYRZmaFkKnd0so-9Xq_LEgPJsPbt3Os5Qj2v9zbNNbKqpm8oFJBtr3iQFo8GsQyUDL_Bpt3KLyvaI_tKc46-DJLxuV5Rp3x77Vbjjyzb_iOIwZUzTi2Sb8JqZ39mVYVSWAwV1DHTx9TUUkoQKpJdH28lVRWu-ftBN9qdcR6_B0ZASaa6TUsMtZw0IHLlsw6kHT8LR3biaMK7B4LqfKxUw1rc2soWs4ERCCgQd9MsmOt-" 
                    alt="Professional consultation scene in a modern university office"
                    class="w-full h-full object-cover"
                >
            </div>
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-slate-900/60 to-brand-900/50 z-0"></div>
            
            <!-- Content -->
            <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="max-w-3xl">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-brand-200 text-sm font-medium mb-6">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        Nationally Recognised Qualifications
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6 tracking-tight">
                        Convert Your On-the-Job Experience into <span class="text-secondary-500">Formal Credentials</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-slate-200 mb-10 max-w-2xl leading-relaxed">
                        Turn years of hard-earned skills into a nationally recognised qualification. Don't let your experience go unrecognised — fast-track your career today.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="group bg-secondary-500 hover:bg-secondary-500 text-white px-8 py-4 rounded-xl text-base font-semibold transition-all duration-200 flex items-center justify-center gap-2  hover:-translate-y-0.5">
                            Check Your Eligibility
                            <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </button>
                        <button class="group bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white px-8 py-4 rounded-xl text-base font-semibold transition-all duration-200 border border-white/30 flex items-center justify-center gap-2 hover:-translate-y-0.5">
                            Download RPL Guide
                            <svg class="w-5 h-5 transition-transform group-hover:translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Bottom Wave -->
            <div class="absolute bottom-0 left-0 right-0 z-10">
                <svg class="w-full h-16 sm:h-24 text-white fill-current" viewBox="0 0 1440 120" preserveAspectRatio="none">
                    <path d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"/>
                </svg>
            </div>
        </section>

        <!-- Introduction Section -->
        <section class="py-20 lg:py-28 bg-white w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
                    <div class="w-full lg:w-1/2">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-sm font-semibold mb-4">
                            What is RPL?
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mb-6 leading-tight">
                            Recognition of Prior Learning
                        </h2>
                        <div class="space-y-4 text-slate-600 leading-relaxed">
                            <p class="text-lg">
                                You've spent years accumulating valuable skills on the job. You know your industry inside and out, but sometimes, experience alone isn't enough to open certain doors without formal recognition.
                            </p>
                            <p>
                                Recognition of Prior Learning (RPL) is a formal assessment method within the Vocational Education and Training (VET) system. It evaluates your existing competencies against the requirements of a formal qualification.
                            </p>
                            <p>
                                Instead of starting from scratch, RPL allows you to gain course credits or a full qualification based on what you already know, saving you significant time and money without stepping into a traditional classroom.
                            </p>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="relative">
                            <div class="absolute -inset-4 bg-gradient-to-r from-brand-600 to-indigo-600 rounded-3xl opacity-10 blur-2xl"></div>
                            <img 
                                class="relative rounded-2xl shadow-2xl object-cover w-full h-auto aspect-video border border-slate-100"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCCHtddzEYxctt2NxJHIbWfNqc6tuafnOBE3ORprzd84hqC2uRS7se-gSBCrON_O4d1nPhqfZv6QbQKp86zKweuXvy5s6vG113TlIbgDCTYW8ClWLl_u8AOuZj3CX5qjG2BAjcj4NQYL-lNQs8UJ5vuwF144FruCE8mt6Gm7XVIAvQ0lnxjTosnrE9VIDMc-icVFLmbI-pB3VowczmeAH1sUFchj6wzWONK0eMmlBR9bGPWUs9N2GYjGg"
                                alt="Professional certificates and reference letters on a modern desk"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Eligibility Section -->
        <section class="py-20 lg:py-28 bg-slate-50 w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-sm font-semibold mb-4">
                        Eligibility
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mb-4">Who Can Apply?</h2>
                    <p class="text-lg text-slate-600 max-w-2xl mx-auto">Key eligibility factors to ensure your experience meets industry standards.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-brand-500 to-brand-600 text-white flex items-center justify-center mb-6 shadow-lg shadow-brand-500/25 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Substantial Experience</h3>
                        <p class="text-slate-600 leading-relaxed">Significant and relevant on-the-job experience in your industry.</p>
                    </div>
                    
                    <!-- Card 2 -->
                    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white flex items-center justify-center mb-6 shadow-lg shadow-indigo-500/25 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Demonstrated Competency</h3>
                        <p class="text-slate-600 leading-relaxed">Ability to prove your skills match the qualification requirements.</p>
                    </div>
                    
                    <!-- Card 3 -->
                    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 text-white flex items-center justify-center mb-6 shadow-lg shadow-emerald-500/25 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Current Skills</h3>
                        <p class="text-slate-600 leading-relaxed">Your industry knowledge and practices are up-to-date.</p>
                    </div>
                </div>
                
                <!-- International Applicants Banner -->
                <div class="bg-gradient-to-r from-brand-600 to-indigo-700 rounded-2xl p-8 lg:p-10 text-center max-w-4xl mx-auto shadow-xl shadow-brand-600/20 relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="relative">
                        <h3 class="text-2xl font-bold text-white mb-3">International Applicants</h3>
                        <p class="text-brand-100 leading-relaxed max-w-2xl mx-auto">RPL is available for skilled migrants seeking to have their overseas experience recognised for Australian migration and employment purposes.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- The 5-Step RPL Process Section -->
        <section class="py-20 lg:py-28 bg-white w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-sm font-semibold mb-4">
                        Process
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mb-4">The 5-Step RPL Process</h2>
                    <p class="text-lg text-slate-600 max-w-2xl mx-auto">A streamlined pathway to turning your experience into qualifications.</p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 relative">
                    <!-- Connecting Line (Desktop) -->
                    <div class="hidden lg:block absolute top-8 left-[10%] right-[10%] h-0.5 bg-gradient-to-r from-brand-200 via-indigo-200 to-brand-200"></div>
                    
                    <!-- Step 1 -->
                    <div class="relative text-center group">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-brand-500 to-brand-600 text-white flex items-center justify-center text-xl font-bold mb-5 shadow-lg shadow-brand-500/30 relative z-10 group-hover:scale-110 transition-transform duration-300">
                            1
                        </div>
                        <h3 class="font-bold text-lg text-slate-900 mb-2">Select Accredited Provider</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">Find an RTO offering your desired qualification.</p>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="relative text-center group">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-brand-500 to-brand-600 text-white flex items-center justify-center text-xl font-bold mb-5 shadow-lg shadow-brand-500/30 relative z-10 group-hover:scale-110 transition-transform duration-300">
                            2
                        </div>
                        <h3 class="font-bold text-lg text-slate-900 mb-2">Initial Consultation</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">Discuss your background to determine eligibility.</p>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="relative text-center group">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white flex items-center justify-center text-xl font-bold mb-5 shadow-lg shadow-indigo-500/30 relative z-10 group-hover:scale-110 transition-transform duration-300">
                            3
                        </div>
                        <h3 class="font-bold text-lg text-slate-900 mb-2">Prepare Evidence</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">Gather required documentation and portfolio.</p>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="relative text-center group">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white flex items-center justify-center text-xl font-bold mb-5 shadow-lg shadow-indigo-500/30 relative z-10 group-hover:scale-110 transition-transform duration-300">
                            4
                        </div>
                        <h3 class="font-bold text-lg text-slate-900 mb-2">Formal Assessment</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">An assessor evaluates your submitted evidence.</p>
                    </div>
                    
                    <!-- Step 5 -->
                    <div class="relative text-center group">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-600 text-white flex items-center justify-center text-xl font-bold mb-5 shadow-lg shadow-emerald-500/30 relative z-10 group-hover:scale-110 transition-transform duration-300">
                            5
                        </div>
                        <h3 class="font-bold text-lg text-slate-900 mb-2">Receive Outcome</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">Get your qualification or gap training plan.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Evidence Portfolio Section -->
        <section class="py-20 lg:py-28 bg-slate-50 w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-sm font-semibold mb-4">
                        Documentation
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mb-4">Types of Evidence Required</h2>
                    <p class="text-lg text-slate-600 max-w-2xl mx-auto">Build a strong portfolio to support your application.</p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Work Experience -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-3 mb-4 pb-4 border-b border-slate-100">
                            <div class="w-10 h-10 rounded-lg bg-brand-50 text-brand-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900">Work Experience</h3>
                        </div>
                        <ul class="space-y-3 text-slate-600 text-sm">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-brand-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Resumes / CVs
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-brand-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Job descriptions
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-brand-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Employment contracts
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-brand-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Payslips / tax records
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Qualifications -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-3 mb-4 pb-4 border-b border-slate-100">
                            <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900">Qualifications</h3>
                        </div>
                        <ul class="space-y-3 text-slate-600 text-sm">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-indigo-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Previous certificates
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-indigo-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Academic transcripts
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-indigo-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Short course records
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-indigo-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                First aid certificates
                            </li>
                        </ul>
                    </div>
                    
                    <!-- References -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-3 mb-4 pb-4 border-b border-slate-100">
                            <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900">References</h3>
                        </div>
                        <ul class="space-y-3 text-slate-600 text-sm">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-emerald-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Letters from employers
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-emerald-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Client testimonials
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-emerald-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Performance reviews
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-emerald-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Statutory declarations
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Work Samples -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-3 mb-4 pb-4 border-b border-slate-100">
                            <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3 21h18M12 9.75h.008v.008H12V9.75z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900">Work Samples</h3>
                        </div>
                        <ul class="space-y-3 text-slate-600 text-sm">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Photos/videos of work
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Project reports
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Logbooks
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Emails demonstrating skills
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Benefits Section -->
        <section class="py-20 lg:py-28 bg-white w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-sm font-semibold mb-4">
                        Advantages
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mb-4">Key Benefits of RPL</h2>
                    <p class="text-lg text-slate-600 max-w-2xl mx-auto">Accelerate your academic journey by leveraging your real-world experience.</p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Recognition -->
                    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 text-white flex items-center justify-center mb-6 shadow-lg shadow-orange-500/25 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Recognition</h3>
                        <p class="text-slate-600 leading-relaxed">Get formal, nationally recognised credentials for the skills you already possess.</p>
                    </div>
                    
                    <!-- Career Advancement -->
                    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-brand-500 to-indigo-600 text-white flex items-center justify-center mb-6 shadow-lg shadow-brand-500/25 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Career Advancement</h3>
                        <p class="text-slate-600 leading-relaxed">Unlock promotions, higher salary brackets, and new job opportunities with formal qualifications.</p>
                    </div>
                    
                    <!-- Efficiency -->
                    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-emerald-400 to-teal-600 text-white flex items-center justify-center mb-6 shadow-lg shadow-emerald-500/25 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Efficiency</h3>
                        <p class="text-slate-600 leading-relaxed">Save significant time and money by avoiding repetitive study for skills you already know.</p>
                    </div>
                    
                    <!-- Migration Pathway -->
                    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-violet-500 to-purple-600 text-white flex items-center justify-center mb-6 shadow-lg shadow-violet-500/25 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Migration Pathway</h3>
                        <p class="text-slate-600 leading-relaxed">Crucial step for many skilled migration visas requiring formal Australian qualifications.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Application Tips Section -->
        <section class="py-20 lg:py-28 bg-slate-50 w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-sm font-semibold mb-4">
                        Best Practices
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mb-4">Tips for Success</h2>
                    <p class="text-lg text-slate-600 max-w-2xl mx-auto">How to ensure your RPL application is strong and straightforward.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                    <div class="flex gap-5 bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="shrink-0 w-12 h-12 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg text-slate-900 mb-2">Systematic Organization</h4>
                            <p class="text-slate-600 leading-relaxed">Clearly map your evidence to the specific units of competency you are applying for.</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-5 bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="shrink-0 w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg text-slate-900 mb-2">Detailed Descriptions</h4>
                            <p class="text-slate-600 leading-relaxed">Don't assume assessors know your job. Explain your role and responsibilities clearly.</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-5 bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="shrink-0 w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg text-slate-900 mb-2">Professional Presentation</h4>
                            <p class="text-slate-600 leading-relaxed">Submit clean, legible, and well-organized digital or physical portfolios.</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-5 bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="shrink-0 w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg text-slate-900 mb-2">Honesty and Authenticity</h4>
                            <p class="text-slate-600 leading-relaxed">Ensure all work submitted is your own. Plagiarism or false claims will result in rejection.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
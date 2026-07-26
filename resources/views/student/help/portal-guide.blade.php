@extends('backend.layouts.fullscreen-layout')

@section('content')
    {{-- Font Awesome 6 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Header -->
    <header class="bg-slate-950/95 backdrop-blur supports-[backdrop-filter]:bg-slate-950/80 text-white shadow-sm sticky top-0 z-50 border-b border-slate-800">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center text-lg shadow-lg shadow-blue-500/20">
                    <i class="fa-solid fa-graduation-cap text-white"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold tracking-tight text-white">Student LMS</h1>
                    <p class="text-slate-400 text-xs font-medium">Help Center & User Guide</p>
                </div>
            </div>
            <a href="{{ route('student.dashboard') }}" class="inline-flex items-center gap-2 text-sm text-slate-300 hover:text-white transition-colors px-4 py-2 rounded-lg hover:bg-slate-800">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Back to Dashboard</span>
            </a>
        </div>
    </header>

    <!-- Hero / Search -->
    <section class="relative bg-slate-900 text-white pb-28 pt-16 px-6 overflow-hidden">
        {{-- Subtle grid pattern --}}
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: linear-gradient(rgba(255,255,255,.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.1) 1px, transparent 1px); background-size: 48px 48px;"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="relative max-w-3xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 tracking-tight bg-gradient-to-b from-white to-slate-300 bg-clip-text text-transparent">
                How can we help?
            </h2>
            <p class="text-slate-400 text-lg mb-10 max-w-xl mx-auto leading-relaxed">
                Search our knowledge base for instant answers about courses, your account, and the student portal.
            </p>
            
           
            
            {{-- Quick tags --}}
            <div class="mt-6 flex flex-wrap justify-center gap-2">
                <button class="quick-tag px-4 py-1.5 rounded-full bg-white/5 border border-slate-700 text-slate-400 text-sm hover:bg-white/10 hover:text-white hover:border-slate-600 transition-all duration-200" data-query="password">Password</button>
                <button class="quick-tag px-4 py-1.5 rounded-full bg-white/5 border border-slate-700 text-slate-400 text-sm hover:bg-white/10 hover:text-white hover:border-slate-600 transition-all duration-200" data-query="enrolment">Enrolment</button>
                <button class="quick-tag px-4 py-1.5 rounded-full bg-white/5 border border-slate-700 text-slate-400 text-sm hover:bg-white/10 hover:text-white hover:border-slate-600 transition-all duration-200" data-query="login">Login</button>
                <button class="quick-tag px-4 py-1.5 rounded-full bg-white/5 border border-slate-700 text-slate-400 text-sm hover:bg-white/10 hover:text-white hover:border-slate-600 transition-all duration-200" data-query="assessment">Assessment</button>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-6 -mt-14 pb-24 relative z-10">
        
        <!-- Category Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
            <div class="category-card group bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm hover:shadow-xl hover:shadow-blue-900/5 hover:-translate-y-1 transition-all duration-300 cursor-pointer" data-category="account">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl mb-4 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 shadow-sm">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-1 group-hover:text-blue-700 transition-colors">Account & Login</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Password resets, portal access, and profile settings</p>
            </div>
            
            <div class="category-card group bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm hover:shadow-xl hover:shadow-green-900/5 hover:-translate-y-1 transition-all duration-300 cursor-pointer" data-category="classes">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center text-xl mb-4 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300 shadow-sm">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-1 group-hover:text-emerald-700 transition-colors">Classes & Enrolment</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Switching classes, schedules, and course materials</p>
            </div>
            
            <div class="category-card group bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm hover:shadow-xl hover:shadow-purple-900/5 hover:-translate-y-1 transition-all duration-300 cursor-pointer" data-category="assessments">
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center text-xl mb-4 group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300 shadow-sm">
                    <i class="fa-solid fa-file-circle-check"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-1 group-hover:text-purple-700 transition-colors">Assessments</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Exams, assignments, submissions, and results</p>
            </div>
            
            <div class="category-card group bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm hover:shadow-xl hover:shadow-orange-900/5 hover:-translate-y-1 transition-all duration-300 cursor-pointer" data-category="technical">
                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center text-xl mb-4 group-hover:scale-110 group-hover:bg-orange-600 group-hover:text-white transition-all duration-300 shadow-sm">
                    <i class="fa-solid fa-wrench"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-1 group-hover:text-orange-700 transition-colors">Technical Support</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Browser issues, errors, and system requirements</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- FAQ Accordion -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">
                                <i class="fa-regular fa-circle-question text-sm"></i>
                            </div>
                            <h3 class="font-bold text-lg text-slate-800">Frequently Asked Questions</h3>
                        </div>
                        <span class="text-xs font-semibold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-full border border-slate-200" id="faqCount">3 Articles</span>
                    </div>
                    
                    <div class="divide-y divide-slate-100" id="faqContainer">

                        <!-- FAQ Item 1 -->
                        <div class="faq-item" data-keywords="switch class change course enrolment transfer move schedule" data-category="classes">
                            <h2>
                                <button type="button" class="w-full px-6 py-5 flex items-center justify-between hover:bg-slate-50/80 transition-colors text-left group focus:outline-none focus:bg-slate-50" onclick="toggleAccordion(this)" aria-expanded="false">
                                    <div class="flex items-center gap-4 pr-4">
                                        <span class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-sm font-bold shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">1</span>
                                        <span class="font-semibold text-slate-700 group-hover:text-slate-900 transition-colors">How do I switch my class?</span>
                                    </div>
                                    <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center shrink-0 group-hover:bg-slate-200 transition-colors">
                                        <i class="fa-solid fa-chevron-down text-xs rotate-icon transition-transform duration-300"></i>
                                    </span>
                                </button>
                            </h2>
                            <div class="accordion-content bg-slate-50/30" aria-hidden="true">
                                <div class="px-6 pb-6 ml-14 text-slate-600 leading-relaxed space-y-4">
                                    <p class="text-slate-700">To switch your class or course, please follow the steps below:</p>
                                    <ol class="space-y-3 ml-1">
                                        <li class="flex gap-3">
                                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">1</span>
                                            <span>Log in to your <strong>Student Portal</strong> using your current credentials.</span>
                                        </li>
                                        <li class="flex gap-3">
                                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">2</span>
                                            <span>Navigate to <strong>My Enrolment</strong> or <strong>My Courses</strong> from the main dashboard.</span>
                                        </li>
                                        <li class="flex gap-3">
                                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">3</span>
                                            <span>Select the course or unit you wish to change from your active enrolments list.</span>
                                        </li>
                                        <li class="flex gap-3">
                                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">4</span>
                                            <span>Click on the <strong>Request Transfer / Switch Class</strong> button.</span>
                                        </li>
                                        <li class="flex gap-3">
                                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">5</span>
                                            <span>Choose your preferred new class schedule from the available options.</span>
                                        </li>
                                        <li class="flex gap-3">
                                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">6</span>
                                            <span>Review any applicable fees or terms, then submit your request.</span>
                                        </li>
                                    </ol>
                                    <div class="bg-blue-50/80 border border-blue-100 rounded-xl p-4 mt-4 flex gap-3">
                                        <i class="fa-solid fa-circle-info text-blue-500 mt-0.5"></i>
                                        <p class="text-sm text-blue-800 leading-relaxed"><strong>Note:</strong> Class switches are subject to availability and may require approval from your course coordinator. You will receive an email confirmation once your request has been processed.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="faq-item" data-keywords="login log in portal access cannot sign username password trouble error" data-category="account">
                            <h2>
                                <button type="button" class="w-full px-6 py-5 flex items-center justify-between hover:bg-slate-50/80 transition-colors text-left group focus:outline-none focus:bg-slate-50" onclick="toggleAccordion(this)" aria-expanded="false">
                                    <div class="flex items-center gap-4 pr-4">
                                        <span class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center text-sm font-bold shrink-0 group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">2</span>
                                        <span class="font-semibold text-slate-700 group-hover:text-slate-900 transition-colors">I can't log in to the Student Portal</span>
                                    </div>
                                    <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center shrink-0 group-hover:bg-slate-200 transition-colors">
                                        <i class="fa-solid fa-chevron-down text-xs rotate-icon transition-transform duration-300"></i>
                                    </span>
                                </button>
                            </h2>
                            <div class="accordion-content bg-slate-50/30" aria-hidden="true">
                                <div class="px-6 pb-6 ml-14 text-slate-600 leading-relaxed space-y-4">
                                    <p class="text-slate-700">If you are unable to access the Student Portal, try the following troubleshooting steps:</p>
                                    <ul class="space-y-3 ml-1">
                                        <li class="flex gap-3">
                                            <i class="fa-solid fa-check text-emerald-500 mt-1.5 text-xs"></i>
                                            <span>Ensure that <strong>Caps Lock</strong> is turned off on your keyboard.</span>
                                        </li>
                                        <li class="flex gap-3">
                                            <i class="fa-solid fa-check text-emerald-500 mt-1.5 text-xs"></i>
                                            <span>Double-check that you are entering your <strong>username</strong> and <strong>password</strong> exactly as provided.</span>
                                        </li>
                                        <li class="flex gap-3">
                                            <i class="fa-solid fa-check text-emerald-500 mt-1.5 text-xs"></i>
                                            <span>Clear your browser's <strong>cache and cookies</strong>, then restart the browser.</span>
                                        </li>
                                        <li class="flex gap-3">
                                            <i class="fa-solid fa-check text-emerald-500 mt-1.5 text-xs"></i>
                                            <span>Try using an alternative browser (we recommend Chrome, Firefox, or Safari).</span>
                                        </li>
                                        <li class="flex gap-3">
                                            <i class="fa-solid fa-check text-emerald-500 mt-1.5 text-xs"></i>
                                            <span>Ensure your internet connection is stable.</span>
                                        </li>
                                    </ul>
                                    <p class="text-slate-700 mt-2">If you continue to experience issues, use the <strong>Password Reset</strong> link on the login page or contact Technical Support.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="faq-item" data-keywords="reset password forgot change credentials new password account recovery" data-category="account">
                            <h2>
                                <button type="button" class="w-full px-6 py-5 flex items-center justify-between hover:bg-slate-50/80 transition-colors text-left group focus:outline-none focus:bg-slate-50" onclick="toggleAccordion(this)" aria-expanded="false">
                                    <div class="flex items-center gap-4 pr-4">
                                        <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center text-sm font-bold shrink-0 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">3</span>
                                        <span class="font-semibold text-slate-700 group-hover:text-slate-900 transition-colors">How do I reset my password?</span>
                                    </div>
                                    <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center shrink-0 group-hover:bg-slate-200 transition-colors">
                                        <i class="fa-solid fa-chevron-down text-xs rotate-icon transition-transform duration-300"></i>
                                    </span>
                                </button>
                            </h2>
                            <div class="accordion-content bg-slate-50/30" aria-hidden="true">
                                <div class="px-6 pb-6 ml-14 text-slate-600 leading-relaxed space-y-4">
                                    <p class="text-slate-700">If you have forgotten your password or need to change it for security reasons:</p>
                                    <ol class="space-y-3 ml-1">
                                        <li class="flex gap-3">
                                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">1</span>
                                            <span>Go to the <strong>Student Portal Login</strong> page.</span>
                                        </li>
                                        <li class="flex gap-3">
                                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">2</span>
                                            <span>Click the <strong>"Forgot Password?"</strong> link below the password field.</span>
                                        </li>
                                        <li class="flex gap-3">
                                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">3</span>
                                            <span>Enter your registered <strong>email address</strong> or <strong>student ID</strong>.</span>
                                        </li>
                                        <li class="flex gap-3">
                                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">4</span>
                                            <span>Check your email inbox (and spam/junk folder) for a password reset link.</span>
                                        </li>
                                        <li class="flex gap-3">
                                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">5</span>
                                            <span>Click the link and enter your <strong>new password</strong> twice to confirm.</span>
                                        </li>
                                    </ol>
                                    <div class="bg-amber-50 border border-amber-100 rounded-xl p-4 mt-4 flex gap-3">
                                        <i class="fa-solid fa-triangle-exclamation text-amber-500 mt-0.5"></i>
                                        <p class="text-sm text-amber-800 leading-relaxed"><strong>Important:</strong> Password reset links expire after 24 hours. If your link has expired, you will need to request a new one.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 p-6">
                    <h4 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-bolt text-amber-500 text-sm"></i>
                        Quick Actions
                    </h4>
                    <div class="space-y-2.5">
                        <a href="#" class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 hover:border-blue-300 hover:bg-blue-50/50 transition-all duration-200 group">
                            <div class="w-9 h-9 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center group-hover:bg-blue-100 group-hover:text-blue-600 transition-colors">
                                <i class="fa-solid fa-key text-sm"></i>
                            </div>
                            <div>
                                <span class="text-sm font-semibold text-slate-700 group-hover:text-blue-700 block">Reset Password</span>
                                <span class="text-xs text-slate-400">Secure account recovery</span>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-slate-300 ml-auto group-hover:text-blue-400 group-hover:translate-x-0.5 transition-all"></i>
                        </a>
                        <a href="#" class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 hover:border-emerald-300 hover:bg-emerald-50/50 transition-all duration-200 group">
                            <div class="w-9 h-9 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center group-hover:bg-emerald-100 group-hover:text-emerald-600 transition-colors">
                                <i class="fa-solid fa-right-to-bracket text-sm"></i>
                            </div>
                            <div>
                                <span class="text-sm font-semibold text-slate-700 group-hover:text-emerald-700 block">Student Portal</span>
                                <span class="text-xs text-slate-400">Access your dashboard</span>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-slate-300 ml-auto group-hover:text-emerald-400 group-hover:translate-x-0.5 transition-all"></i>
                        </a>
                        <a href="#" class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 hover:border-purple-300 hover:bg-purple-50/50 transition-all duration-200 group">
                            <div class="w-9 h-9 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center group-hover:bg-purple-100 group-hover:text-purple-600 transition-colors">
                                <i class="fa-solid fa-envelope text-sm"></i>
                            </div>
                            <div>
                                <span class="text-sm font-semibold text-slate-700 group-hover:text-purple-700 block">Contact Support</span>
                                <span class="text-xs text-slate-400">Get help from our team</span>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-slate-300 ml-auto group-hover:text-purple-400 group-hover:translate-x-0.5 transition-all"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease;
            opacity: 0;
        }
        .accordion-content.active {
            opacity: 1;
        }
        .rotate-icon {
            display: inline-block;
        }
        .rotate-icon.active {
            transform: rotate(180deg);
        }
        /* Smooth focus visible for accessibility */
        button:focus-visible {
            outline: 2px solid #3b82f6;
            outline-offset: -2px;
        }
        /* Custom scrollbar for webkit */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>

    <script>
        // Accordion functionality
        function toggleAccordion(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('.rotate-icon');
            const isActive = content.classList.contains('active');
            
            // Close all others
            document.querySelectorAll('.accordion-content').forEach(el => {
                el.style.maxHeight = '0px';
                el.classList.remove('active');
                el.setAttribute('aria-hidden', 'true');
            });
            document.querySelectorAll('.faq-item button').forEach(btn => {
                btn.setAttribute('aria-expanded', 'false');
            });
            document.querySelectorAll('.rotate-icon').forEach(el => {
                el.classList.remove('active');
            });
            
            if (!isActive) {
                button.setAttribute('aria-expanded', 'true');
                content.setAttribute('aria-hidden', 'false');
                content.classList.add('active');
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.classList.add('active');
            }
        }

        const faqItems = document.querySelectorAll('.faq-item');
        const faqCount = document.getElementById('faqCount');
        const faqContainer = document.getElementById('faqContainer');

        function performSearch(query) {
            query = query.toLowerCase().trim();
            let visibleCount = 0;
            
            if (query.length > 0) {
                clearBtn.classList.remove('hidden');
                document.querySelector('.search-icon')?.classList.add('text-blue-400');
            } else {
                clearBtn.classList.add('hidden');
                document.querySelector('.search-icon')?.classList.remove('text-blue-400');
            }
            
            faqItems.forEach(item => {
                const questionText = item.querySelector('span.font-semibold').textContent.toLowerCase();
                const keywords = item.getAttribute('data-keywords').toLowerCase();
                const category = item.getAttribute('data-category').toLowerCase();
                
                if (questionText.includes(query) || keywords.includes(query) || category.includes(query) || query === '') {
                    item.style.display = '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            
            faqCount.textContent = `${visibleCount} Article${visibleCount !== 1 ? 's' : ''}`;
            
            if (visibleCount === 0 && query !== '') {
                noResults.classList.remove('hidden');
                faqContainer.classList.add('hidden');
            } else {
                noResults.classList.add('hidden');
                faqContainer.classList.remove('hidden');
            }
        }
     

        

        // Recalculate accordion height on window resize
        window.addEventListener('resize', () => {
            document.querySelectorAll('.accordion-content.active').forEach(content => {
                content.style.maxHeight = content.scrollHeight + 'px';
            });
        });
    </script>
@endsection
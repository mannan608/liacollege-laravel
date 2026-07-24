@extends('backend.layouts.fullscreen-layout')

@section('content')
        <!-- Header -->
    <header class="bg-slate-900 text-white shadow-lg">
        <div class="max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Student LMS</h1>
                    <p class="text-slate-400 text-xs">Help Center & User Guide</p>
                </div>
            </div>
            <a href="{{ route('student.dashboard') }}" class="text-sm text-slate-300 hover:text-white transition-colors">
                <i class="fa-solid fa-arrow-left mr-1"></i> Back to Dashboard
            </a>
        </div>
    </header>

    <!-- Hero / Search -->
    <section class="bg-gradient-to-b from-slate-900 to-slate-800 text-white pb-20 pt-12 px-6">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">How can we help you today?</h2>
            <p class="text-slate-300 mb-8">Search our knowledge base for answers to common questions about your courses, account, and the student portal.</p>           
          
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-6 -mt-10 pb-20">
        
        <!-- Category Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-slate-100 cursor-pointer group">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
                <h3 class="font-bold text-lg mb-1">Account & Login</h3>
                <p class="text-sm text-slate-500">Password resets, portal access, and profile settings</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-slate-100 cursor-pointer group">
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <h3 class="font-bold text-lg mb-1">Classes & Enrolment</h3>
                <p class="text-sm text-slate-500">Switching classes, schedules, and course materials</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-slate-100 cursor-pointer group">
                <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-file-circle-check"></i>
                </div>
                <h3 class="font-bold text-lg mb-1">Assessments</h3>
                <p class="text-sm text-slate-500">Exams, assignments, submissions, and results</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-slate-100 cursor-pointer group">
                <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-lg flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-wrench"></i>
                </div>
                <h3 class="font-bold text-lg mb-1">Technical Support</h3>
                <p class="text-sm text-slate-500">Browser issues, errors, and system requirements</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- FAQ Accordion -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-md border border-slate-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                        <h3 class="font-bold text-lg text-slate-800">
                            <i class="fa-regular fa-circle-question mr-2 text-blue-500"></i>
                            Frequently Asked Questions
                        </h3>
                        <span class="text-xs font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-full" id="faqCount">3 Articles</span>
                    </div>
                    
                    <div class="divide-y divide-slate-100" id="faqContainer">

                        <!-- FAQ Item 1 -->
                        <div class="faq-item" data-keywords="switch class change course enrolment transfer move">
                            <button class="w-full px-6 py-5 flex items-center justify-between hover:bg-slate-50 transition-colors text-left group" onclick="toggleAccordion(this)">
                                <div class="flex items-center gap-4">
                                    <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-sm font-bold shrink-0">1</span>
                                    <span class="font-semibold text-slate-700 group-hover:text-slate-900">How do I switch my class?</span>
                                </div>
                                <i class="fa-solid fa-chevron-down text-slate-400 rotate-icon"></i>
                            </button>
                            <div class="accordion-content bg-slate-50/30">
                                <div class="pr-6 pb-6 ml-14 text-slate-600 leading-relaxed space-y-3">
                                    <p>To switch your class or course, please follow the steps below:</p>
                                    <ol class="list-decimal list-inside space-y-2 ml-2">
                                        <li>Log in to your <strong>Student Portal</strong> using your current credentials.</li>
                                        <li>Navigate to <strong>My Enrolment</strong> or <strong>My Courses</strong> from the main dashboard.</li>
                                        <li>Select the course or unit you wish to change from your active enrolments list.</li>
                                        <li>Click on the <strong>Request Transfer / Switch Class</strong> button.</li>
                                        <li>Choose your preferred new class schedule from the available options.</li>
                                        <li>Review any applicable fees or terms, then submit your request.</li>
                                    </ol>
                                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-md mt-4">
                                        <p class="text-sm text-blue-800"><i class="fa-solid fa-circle-info mr-2"></i><strong>Note:</strong> Class switches are subject to availability and may require approval from your course coordinator. You will receive an email confirmation once your request has been processed.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="faq-item" data-keywords="login log in portal access cannot sign username password trouble">
                            <button class="w-full px-6 py-5 flex items-center justify-between hover:bg-slate-50 transition-colors text-left group" onclick="toggleAccordion(this)">
                                <div class="flex items-center gap-4">
                                    <span class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center text-sm font-bold shrink-0">2</span>
                                    <span class="font-semibold text-slate-700 group-hover:text-slate-900">I Can't Log In to the Student Portal?</span>
                                </div>
                                <i class="fa-solid fa-chevron-down text-slate-400 rotate-icon"></i>
                            </button>
                            <div class="accordion-content bg-slate-50/30">
                                <div class="pr-6 pb-6 ml-14 text-slate-600 leading-relaxed space-y-3">
                                    <p>If you are unable to access the Student Portal, try the following troubleshooting steps:</p>
                                    <ul class="list-disc list-inside space-y-2 ml-2">
                                        <li>Ensure that <strong>Caps Lock</strong> is turned off on your keyboard.</li>
                                        <li>Double-check that you are entering your <strong>username</strong> and <strong>password</strong> exactly as provided (including any special characters).</li>
                                        <li>Clear your browser's <strong>cache and cookies</strong>, then restart the browser.</li>
                                        <li>Try using an alternative browser (we recommend Chrome, Firefox, or Safari).</li>
                                        <li>Ensure your internet connection is stable.</li>
                                    </ul>
                                    <p class="mt-3">If you continue to experience issues after trying the above, use the <strong>Password Reset</strong> link on the login page or contact Technical Support using the form on this page.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="faq-item" data-keywords="reset password forgot change credentials new password account recovery">
                            <button class="w-full px-6 py-5 flex items-center justify-between hover:bg-slate-50 transition-colors text-left group" onclick="toggleAccordion(this)">
                                <div class="flex items-center gap-4">
                                    <span class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-sm font-bold shrink-0">3</span>
                                    <span class="font-semibold text-slate-700 group-hover:text-slate-900">How Do I Reset My Password?</span>
                                </div>
                                <i class="fa-solid fa-chevron-down text-slate-400 rotate-icon"></i>
                            </button>
                            <div class="accordion-content bg-slate-50/30">
                                <div class="pr-6 pb-6 ml-14 text-slate-600 leading-relaxed space-y-3">
                                    <p>If you have forgotten your password or need to change it for security reasons:</p>
                                    <ol class="list-decimal list-inside space-y-2 ml-2">
                                        <li>Go to the <strong>Student Portal Login</strong> page.</li>
                                        <li>Click the <strong>"Forgot Password?"</strong> or <strong>"Reset Password"</strong> link located below the password field.</li>
                                        <li>Enter your registered <strong>email address</strong> or <strong>student ID</strong> in the prompt.</li>
                                        <li>Check your email inbox (and spam/junk folder) for a password reset link.</li>
                                        <li>Click the link and enter your <strong>new password</strong> twice to confirm.</li>
                                        <li>Return to the login page and sign in with your new credentials.</li>
                                    </ol>
                                    <div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded-r-md mt-4">
                                        <p class="text-sm text-amber-800"><i class="fa-solid fa-triangle-exclamation mr-2"></i><strong>Important:</strong> Password reset links expire after 24 hours. If your link has expired, you will need to request a new one.</p>
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
                <div class="bg-white rounded-xl shadow-md border border-slate-100 p-6">
                    <h4 class="font-bold text-slate-800 mb-4">Quick Actions</h4>
                    <div class="space-y-3">
                        <a href="#" class="flex items-center gap-3 p-3 rounded-lg border border-slate-200 hover:border-blue-300 hover:bg-blue-50 transition-all group">
                            <i class="fa-solid fa-key text-slate-400 group-hover:text-blue-500"></i>
                            <span class="text-sm font-medium text-slate-600 group-hover:text-blue-700">Reset Password Now</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 p-3 rounded-lg border border-slate-200 hover:border-green-300 hover:bg-green-50 transition-all group">
                            <i class="fa-solid fa-right-to-bracket text-slate-400 group-hover:text-green-500"></i>
                            <span class="text-sm font-medium text-slate-600 group-hover:text-green-700">Go to Student Portal</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 p-3 rounded-lg border border-slate-200 hover:border-purple-300 hover:bg-purple-50 transition-all group">
                            <i class="fa-solid fa-envelope text-slate-400 group-hover:text-purple-500"></i>
                            <span class="text-sm font-medium text-slate-600 group-hover:text-purple-700">Contact Support Team</span>
                        </a>
                    </div>
                </div> 
            </div>
        </div>
    </main>

@endsection
    <script>
        function toggleAccordion(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('.rotate-icon');
            const isActive = content.style.maxHeight && content.style.maxHeight !== '0px';
            
            // Close all others (optional - remove this block if you want multiple open)
            document.querySelectorAll('.accordion-content').forEach(el => {
                el.style.maxHeight = '0px';
                el.classList.remove('active');
            });
            document.querySelectorAll('.rotate-icon').forEach(el => {
                el.classList.remove('active');
            });
            
            if (!isActive) {
                content.classList.add('active');
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.classList.add('active');
            }
        }

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const faqItems = document.querySelectorAll('.faq-item');
        const faqCount = document.getElementById('faqCount');

        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            let visibleCount = 0;
            
            faqItems.forEach(item => {
                const questionText = item.querySelector('span.font-semibold').textContent.toLowerCase();
                const keywords = item.getAttribute('data-keywords').toLowerCase();
                
                if (questionText.includes(query) || keywords.includes(query) || query === '') {
                    item.style.display = '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            
            faqCount.textContent = `${visibleCount} Article${visibleCount !== 1 ? 's' : ''}`;
        });
    </script>

   <style>
        .accordion-content {
            transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }
        .accordion-content.active {
            opacity: 1;
        }
        .rotate-icon {
            transition: transform 0.3s ease;
        }
        .rotate-icon.active {
            transform: rotate(180deg);
        }
    </style>
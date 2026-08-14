@extends('frontend.layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 py-6 sm:py-8 lg:py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">

        <!-- Main Document Card -->
        <div class="bg-white rounded overflow-hidden">
            <div class="p-6 sm:p-10 lg:p-14">

                <!-- Header -->
                <div class="border-b-2 border-secondary-500/20 pb-6 sm:pb-8 mb-8 sm:mb-10 text-center sm:text-left">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-brand-500 tracking-tight leading-tight">
                       Privacy Policy
                    </h1>
                    <p class="text-lg sm:text-xl text-slate-500 mt-3">
                        Effective Date: <span class="font-semibold text-slate-700">January 1, 2026</span> | Last Updated: <span class="font-semibold text-slate-700">August 11, 2026</span>
                    </p>
                </div>

                <!-- Introduction -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Introduction
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        Welcome to Lia College. These Terms and Conditions govern your access to and use of our website, learning management systems, student portals, and all related services (collectively, the "Services"). By accessing or using our Services, you agree to be bound by these Terms.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Please read these Terms carefully. If you do not agree with any part of these Terms, you must not access or use our Services. These Terms apply to all students, staff, contractors, visitors, and other users of Lia College systems.
                    </p>
                </section>

                <!-- Definitions -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Definitions
                    </h2>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                        <table class="w-full text-left border-collapse min-w-[640px]">
                            <thead>
                                <tr class="bg-brand-500 text-white">
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide w-40 sm:w-48">Term</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide">Definition</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700 text-sm sm:text-base">
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">"We", "Us", "Our"</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">Refers to Lia College, its subsidiaries, affiliates, and respective officers, directors, employees, and agents.</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">"You", "User"</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">Refers to any individual or entity accessing or using our Services, including students, staff, and visitors.</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">"Services"</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">All websites, applications, portals, learning platforms, and digital resources provided by Lia College.</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">"Content"</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">All text, images, videos, audio, data, code, and other materials available through our Services.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Account Registration -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Account Registration and Security
                    </h2>
                    <ul class="list-disc list-inside space-y-3 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>You must provide accurate, current, and complete information during the registration process.</li>
                        <li>You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</li>
                        <li>You agree to notify us immediately of any unauthorized use of your account or any other breach of security.</li>
                        <li>Lia College reserves the right to disable any user account at any time if we believe you have violated these Terms.</li>
                        <li>Accounts may not be transferred, sold, or shared with third parties without explicit written consent from Lia College administration.</li>
                    </ul>
                </section>

                <!-- Acceptable Use -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Acceptable Use Policy
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        You agree to use our Services only for lawful purposes and in accordance with these Terms. The following activities are strictly prohibited:
                    </p>
                    <div class="grid gap-4 sm:gap-6">
                        <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                            <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                Prohibited Conduct
                            </h3>
                            <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li>Using the Services in any manner that could disable, overburden, damage, or impair the site.</li>
                                <li>Attempting to gain unauthorized access to any portion of the Services or any other systems connected to our servers.</li>
                                <li>Engaging in any automated use of the system, such as using scripts to send comments or messages.</li>
                                <li>Uploading or transmitting viruses, Trojan horses, or other malicious code.</li>
                                <li>Interfering with the proper working of the Services or any activity conducted on the Services.</li>
                            </ul>
                        </div>

                        <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                            <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                Content Standards
                            </h3>
                            <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li>All content you submit must not be defamatory, obscene, indecent, abusive, offensive, harassing, violent, hateful, inflammatory, or otherwise objectionable.</li>
                                <li>Content must not promote sexually explicit material, violence, or discrimination based on race, sex, religion, nationality, disability, sexual orientation, or age.</li>
                                <li>You must not infringe any patent, trademark, trade secret, copyright, or other intellectual property rights of any other person.</li>
                                <li>Content must comply with all applicable local, state, federal, and international laws and regulations.</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Intellectual Property -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Intellectual Property Rights
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        The Services and their entire contents, features, and functionality (including but not limited to all information, software, text, displays, images, video, and audio, and the design, selection, and arrangement thereof) are owned by Lia College, its licensors, or other providers of such material and are protected by Australian and international copyright, trademark, patent, trade secret, and other intellectual property or proprietary rights laws.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        These Terms permit you to use the Services for your personal, non-commercial use only. You must not:
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>Reproduce, distribute, modify, create derivative works of, publicly display, publicly perform, republish, download, store, or transmit any of the material on our Services.</li>
                        <li>Delete or alter any copyright, trademark, or other proprietary rights notices from copies of materials from this site.</li>
                        <li>Use any illustrations, photographs, video or audio sequences, or any graphics separately from the accompanying text.</li>
                    </ul>
                </section>

                <!-- User Contributions -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        User Contributions
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        The Services may contain message boards, chat rooms, personal web pages or profiles, forums, bulletin boards, and other interactive features that allow users to post, submit, publish, display, or transmit content or materials.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        Any User Contribution you post to the site will be considered non-confidential and non-proprietary. By providing any User Contribution on the Services, you grant us and our affiliates and service providers a perpetual, irrevocable, royalty-free, fully paid-up, worldwide license to use, reproduce, modify, perform, display, distribute, and otherwise disclose to third parties any such material.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        You represent and warrant that you own or control all rights in and to the User Contributions and have the right to grant the license granted above to us and our affiliates and service providers.
                    </p>
                </section>

                <!-- Privacy -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Privacy and Data Protection
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        Your privacy is important to us. Our collection and use of personal information in connection with the Services is described in our Privacy Policy. By using our Services, you consent to our collection and use of personal data as outlined therein.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        We comply with the Privacy Act 1988 (Cth), the Australian Privacy Principles, and all other applicable data protection legislation. For more information, please refer to our Privacy Policy and Procedure document.
                    </p>
                </section>

                <!-- Payments and Fees -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Payments, Fees, and Refunds
                    </h2>
                    <div class="space-y-4">
                        <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                            <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                Course Fees
                            </h3>
                            <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li>All course fees must be paid in full prior to the commencement date unless an approved payment plan is in place.</li>
                                <li>Fees are subject to change without notice; however, enrolled students will not be affected by fee increases during their current enrolment period.</li>
                                <li>Government funding and subsidies are subject to eligibility criteria and availability.</li>
                            </ul>
                        </div>

                        <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                            <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                Refund Policy
                            </h3>
                            <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li>Applications for refunds must be submitted in writing to the Student Services department.</li>
                                <li>Full refunds are available if cancellation occurs within 14 days of enrolment and before course commencement.</li>
                                <li>Partial refunds may be granted in exceptional circumstances, subject to administrative fees.</li>
                                <li>No refunds will be issued after 50% of the course duration has elapsed.</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Termination -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Termination and Suspension
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        We may terminate or suspend your access to all or part of the Services, without prior notice or liability, for any reason whatsoever, including without limitation if you breach these Terms.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        Upon termination, your right to use the Services will immediately cease. All provisions of these Terms which by their nature should survive termination shall survive, including ownership provisions, warranty disclaimers, indemnity, and limitations of liability.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Grounds for immediate termination include, but are not limited to: academic misconduct, harassment of staff or students, unauthorized access attempts, non-payment of fees, and violation of any applicable laws or regulations.
                    </p>
                </section>

                <!-- Disclaimers -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Disclaimers and Limitation of Liability
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        The Services are provided on an "as is" and "as available" basis without any representations or warranties of any kind, express or implied. Lia College does not warrant that the Services will be uninterrupted, timely, secure, or error-free.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        In no event will Lia College, its affiliates, or their licensors, service providers, employees, agents, officers, or directors be liable for damages of any kind, under any legal theory, arising out of or in connection with your use, or inability to use, the Services.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        This limitation of liability applies to any damages or injury caused by any failure of performance, error, omission, interruption, deletion, defect, delay in operation or transmission, computer virus, communication line failure, theft or destruction or unauthorized access to, alteration of, or use of record.
                    </p>
                </section>

                <!-- Indemnification -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Indemnification
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        You agree to defend, indemnify, and hold harmless Lia College, its affiliates, licensors, and service providers, and its and their respective officers, directors, employees, contractors, agents, licensors, suppliers, successors, and assigns from and against any claims, liabilities, damages, judgments, awards, losses, costs, expenses, or fees (including reasonable attorneys' fees) arising out of or relating to your violation of these Terms or your use of the Services.
                    </p>
                </section>

                <!-- Governing Law -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Governing Law and Jurisdiction
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        These Terms and any dispute or claim arising out of or in connection with them or their subject matter or formation shall be governed by and construed in accordance with the laws of Australia and the State in which Lia College operates.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Any legal suit, action, or proceeding arising out of, or related to, these Terms or the Services shall be instituted exclusively in the courts of Australia. You waive any and all objections to the exercise of jurisdiction over you by such courts and to venue in such courts.
                    </p>
                </section>

                <!-- Changes to Terms -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Changes to These Terms
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        We may revise and update these Terms from time to time in our sole discretion. All changes are effective immediately when we post them, and apply to all access to and use of the Services thereafter.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Your continued use of the Services following the posting of revised Terms means that you accept and agree to the changes. You are expected to check this page frequently so you are aware of any changes, as they are binding on you.
                    </p>
                </section>

                <!-- Contact -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Contact Information
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        If you have any questions, concerns, or comments about these Terms, please contact us:
                    </p>
                    <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                        <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                            <li><strong>Email:</strong> legal@liacollege.edu.au</li>
                            <li><strong>Phone:</strong> 1300 000 000</li>
                            <li><strong>Postal Address:</strong> Lia College, PO Box 000, City, State, Postcode</li>
                            <li><strong>Office Hours:</strong> Monday to Friday, 9:00 AM – 5:00 PM AEST</li>
                        </ul>
                    </div>
                </section>

                <!-- Acknowledgment -->
                <section class="mb-6 sm:mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Acknowledgment
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        BY USING THE SERVICES OR CLICKING TO ACCEPT THESE TERMS, YOU ACKNOWLEDGE THAT YOU HAVE READ, UNDERSTOOD, AND AGREE TO BE BOUND BY THESE TERMS AND CONDITIONS, INCLUDING OUR PRIVACY POLICY, AND THAT YOU HAVE THE AUTHORITY TO ENTER INTO THESE TERMS.
                    </p>
                </section>

            </div>
        </div>
    </div>
</div>
@endsection
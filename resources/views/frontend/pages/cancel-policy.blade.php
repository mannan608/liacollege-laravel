@extends('frontend.layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 py-6 sm:py-8 lg:py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">

        <!-- Back Button -->
        <div class="mb-6 sm:mb-8">
            <a href="{{ route('student.dashboard') }}"
                class="inline-flex items-center gap-2 bg-brand-500 hover:bg-brand-500/90 text-white font-semibold px-5 py-2.5 sm:px-6 sm:py-3 rounded-lg transition-colors duration-200 shadow-sm text-sm sm:text-base">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        <!-- Main Document Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
            <div class="p-6 sm:p-10 lg:p-14">

                <!-- Header -->
                <div class="border-b-2 border-secondary-500/20 pb-6 sm:pb-8 mb-8 sm:mb-10 text-center sm:text-left">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-brand-500 tracking-tight leading-tight">
                        Refund and Cancellation Policy
                    </h1>
                    <p class="text-xl sm:text-2xl font-bold text-secondary-500 mt-2">(FIN2)</p>
                    <p class="text-lg sm:text-xl text-slate-500 mt-3">
                        Effective Date: <span class="font-semibold text-slate-700">January 1, 2026</span>
                    </p>
                </div>

                <!-- Policy Statement -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Policy Statement
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Lia College is committed to ensuring that all refund and cancellation processes are fair, transparent, and compliant with applicable legislative requirements. This policy provides clear guidelines for students seeking to cancel their enrolment or obtain a refund of tuition and related fees. It outlines the circumstances under which refunds are payable, the methods of calculation, and the procedural requirements for lodging a cancellation or refund request.
                    </p>
                </section>

                <!-- Scope -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Scope
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        This policy applies to all enrolled students, prospective students, parents, guardians, sponsors, and third-party payers of Lia College. It covers all vocational education and training (VET) courses, higher education programs, short courses, and professional development workshops offered by the College, whether delivered on-campus, online, or through blended learning modes.
                    </p>
                </section>

                <!-- Legislative Requirements -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Legislative Requirements
                    </h2>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>Education Services for Overseas Students Act 2000 (Cth) (ESOS Act)</li>
                        <li>National Code of Practice for Providers of Education and Training to Overseas Students 2018</li>
                        <li>Higher Education Support Act 2003 (Cth)</li>
                        <li>Australian Consumer Law (Schedule 2 of the Competition and Consumer Act 2010)</li>
                        <li>National Vocational Education and Training Regulator Act 2011 (Cth)</li>
                        <li>Privacy Act 1988 (Cth)</li>
                    </ul>
                </section>

                <!-- Key Terms -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Key Terms
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
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Cancellation</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">The formal termination of a student's enrolment in a course or unit of study prior to the scheduled completion date, initiated by the student or the College.</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Refund</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">The repayment of tuition or other fees to the student or original payer when a student withdraws or a course is discontinued.</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Commencement Date</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">The official start date of the course or study period as published in the offer letter, enrolment agreement, or academic calendar.</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Compassionate or Compelling Circumstances</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">Situations beyond the control of the student that impact their ability to continue studies, including serious illness, bereavement, or major political upheaval in the home country.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Cancellation by Student -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Cancellation by Student
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        A student may cancel their enrolment at any time by submitting a formal written notice to Student Services. The date of cancellation is determined by the date the written notice is received by the College, not the date the student ceases attendance or participation.
                    </p>
                    <div class="space-y-4 sm:space-y-6">
                        <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                            <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                Before Course Commencement
                            </h3>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                                Students who cancel their enrolment before the course commencement date are entitled to a full refund of tuition fees paid, less the non-refundable enrolment administration fee and any non-refundable third-party charges. All cancellation requests must be received in writing at least five business days prior to commencement to qualify for this refund tier.
                            </p>
                        </div>

                        <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                            <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                After Course Commencement
                            </h3>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                Once a course has commenced, refund entitlements are calculated based on the proportion of the course completed and the date of formal written withdrawal. The following schedule applies:
                            </p>
                            <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li>Withdrawal within the first 10% of the scheduled course duration: 90% refund of tuition fees for the current study period.</li>
                                <li>Withdrawal after 10% but up to 25% of the scheduled course duration: 50% refund of tuition fees for the current study period.</li>
                                <li>Withdrawal after 25% but up to 50% of the scheduled course duration: 25% refund of tuition fees for the current study period.</li>
                                <li>Withdrawal after 50% of the scheduled course duration: no refund of tuition fees. The student remains liable for all outstanding fees.</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Refund Entitlements Table -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Refund Entitlements Summary
                    </h2>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                        <table class="w-full text-left border-collapse min-w-[640px]">
                            <thead>
                                <tr class="bg-brand-500 text-white">
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide w-48 sm:w-56">Timing of Withdrawal</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide">Tuition Fee Refund</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide w-40 sm:w-48">Administration Fee</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700 text-sm sm:text-base">
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Before commencement</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">100% of tuition fees paid</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">$250 non-refundable</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Within first 10% of course</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">90% of current study period fees</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">$250 non-refundable</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">10% – 25% of course completed</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">50% of current study period fees</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">$250 non-refundable</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">25% – 50% of course completed</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">25% of current study period fees</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">$250 non-refundable</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">After 50% of course completed</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">No refund</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">N/A</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Course cancelled by College</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">100% of all fees paid, including materials</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">Waived</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Special Circumstances -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Special Circumstances and Exceptions
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        Lia College recognises that exceptional circumstances may necessitate withdrawal outside the standard refund schedule. Applications for special consideration will be assessed on a case-by-case basis by the Student Support and Academic Board.
                    </p>
                    <div class="space-y-4 sm:space-y-6">
                        <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                            <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                Compassionate or Compelling Circumstances
                            </h3>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                Students may apply for a refund outside the standard schedule if they can demonstrate compassionate or compelling circumstances. Supporting documentation must be provided. Eligible circumstances include:
                            </p>
                            <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li>Serious illness or injury of the student, verified by a medical certificate from a registered medical practitioner.</li>
                                <li>Death or serious illness of an immediate family member (parent, sibling, spouse, or child).</li>
                                <li>Major political upheaval or natural disaster in the student's home country requiring immediate return.</li>
                                <li>Traumatic experiences affecting the student, such as involvement in or witnessing a serious accident or crime, supported by appropriate evidence.</li>
                                <li>Inability to begin studying on the course commencement date due to a delay in visa processing beyond the student's control.</li>
                            </ul>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mt-3">
                                Where approved, a pro-rata refund may be granted at the discretion of the College, less the standard non-refundable administration fee.
                            </p>
                        </div>

                        <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                            <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                Visa Refusal (International Students)
                            </h3>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                                International students who are refused a student visa by the Department of Home Affairs are entitled to a full refund of all tuition fees paid, less a $500 non-refundable administration charge. The student must provide the original visa refusal letter from the Department of Home Affairs. Refund requests must be submitted within 12 months of the visa refusal date.
                            </p>
                        </div>

                        <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                            <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                Misconduct or Breach
                            </h3>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                                Students whose enrolment is cancelled by Lia College due to academic misconduct, non-payment of fees, breach of the Student Code of Conduct, or violation of Australian law are not entitled to any refund of tuition fees. Any outstanding fees remain due and payable immediately.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Non-Refundable Items -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Non-Refundable Items
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        The following fees and charges are non-refundable under all circumstances:
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>Enrolment administration and application processing fees.</li>
                        <li>Overseas Student Health Cover (OSHC) premiums where the policy has already commenced.</li>
                        <li>Material fees for goods already supplied, opened, or used (textbooks, uniforms, equipment, software licenses).</li>
                        <li>Late payment fees, debt collection fees, and legal costs incurred due to non-payment.</li>
                        <li>Accommodation placement or airport transfer service fees where the service has been confirmed or utilised.</li>
                        <li>Recognition of Prior Learning (RPL) and Credit Transfer assessment fees.</li>
                        <li>Re-sit or re-assessment fees for failed or incomplete assessments.</li>
                    </ul>
                </section>

                <!-- Cancellation by College -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Cancellation by Lia College
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        Lia College reserves the right to cancel a course, unit, or intake prior to or after commencement due to insufficient enrolment numbers, regulatory changes, loss of accreditation, or other operational necessities.
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>If a course is cancelled prior to commencement, all students affected will receive a full refund of all fees paid, including tuition, materials, and enrolment fees.</li>
                        <li>If a course is cancelled after commencement, students will receive a pro-rata refund for the uncompleted portion of the course, or be offered a transfer to an equivalent alternative course at no additional cost.</li>
                        <li>International students affected by course cancellation will be offered a place in an alternative course that satisfies their visa requirements, or a full refund to allow them to seek enrolment elsewhere.</li>
                        <li>Lia College will notify all affected students in writing at least 14 calendar days prior to the cancellation date where circumstances permit.</li>
                    </ul>
                </section>

                <!-- Procedure -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Procedure for Cancellation and Refund Requests
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        All requests for cancellation and refund must follow the formal procedure outlined below:
                    </p>
                    <ol class="list-decimal list-inside space-y-3 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>Complete the official Cancellation and Refund Request Form, available from Student Services or the student portal.</li>
                        <li>Attach all required supporting documentation (e.g., medical certificate, visa refusal letter, evidence of compassionate circumstances).</li>
                        <li>Submit the form and attachments to Student Services via email to finance@liacollege.edu.au or in person at the Student Services desk.</li>
                        <li>Obtain an acknowledgment of receipt from Student Services. The date of receipt is the official withdrawal date for refund calculation purposes.</li>
                        <li>The Finance and Student Support team will assess the application within 14 business days.</li>
                        <li>If additional information is required, the student will be contacted within 7 business days of submission.</li>
                        <li>A written decision will be issued to the student, including the refund amount, calculation method, and expected payment date.</li>
                        <li>If approved, the refund will be processed within 28 business days of the decision date.</li>
                    </ol>
                </section>

                <!-- Payment of Refunds -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Payment of Refunds
                    </h2>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>Refunds will be paid in Australian Dollars (AUD) unless otherwise agreed in writing.</li>
                        <li>Refunds will be issued to the original payer. Where a third party or sponsor paid the fees, the refund will be directed to that party unless written consent for an alternative arrangement is provided.</li>
                        <li>Refunds will be processed via the original payment method where possible (credit card reversal, bank transfer, or BPAY refund).</li>
                        <li>International bank transfers may incur additional processing fees and currency conversion charges, which will be deducted from the refund amount.</li>
                        <li>Lia College is not liable for delays in refund processing caused by errors in bank details provided by the student or payer.</li>
                    </ul>
                </section>

                <!-- Outstanding Fees -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Outstanding Fees and Debt Recovery
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Students who cancel their enrolment remain liable for any outstanding fees that fall outside the approved refund amount. Failure to settle outstanding debts may result in the withholding of academic transcripts, results, and qualifications. Lia College reserves the right to refer unpaid debts to external collection agencies and recover all associated legal and administrative costs.
                    </p>
                </section>

                <!-- Cooling Off -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Cooling-Off Period
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Domestic students who enter into a payment plan or financial agreement with Lia College have a cooling-off period of 10 business days from the date of signing. During this period, the student may cancel the agreement without penalty and receive a full refund of any deposits paid, provided course commencement has not occurred.
                    </p>
                </section>

                <!-- Dispute Resolution -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Dispute Resolution
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        Students who disagree with a refund decision may lodge a formal appeal in accordance with the Lia College Complaints and Appeals Policy and Procedure. Appeals must be submitted in writing within 20 business days of the refund decision notification and must include grounds for the appeal and any new supporting evidence.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        If a student remains dissatisfied after the internal appeals process, they may escalate the matter to the relevant external ombudsman or regulatory body, including the Australian Skills Quality Authority (ASQA) for VET students or the Tertiary Education Quality and Standards Agency (TEQSA) for higher education students.
                    </p>
                </section>

                <!-- Policy Review -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Policy Review
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        This policy will be reviewed annually and following any changes to Commonwealth, State, or Territory legislation affecting student refunds and cancellations. Management of Lia College will conduct reviews in consultation with the Finance, Student Services, and Compliance departments.
                    </p>
                </section>

                <!-- Contact -->
                <section class="mb-6 sm:mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Contact Information
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        For all cancellation and refund enquiries, please contact the Lia College Finance Department:
                    </p>
                    <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                        <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                            <li><strong>Email:</strong> refunds@liacollege.edu.au</li>
                            <li><strong>Phone:</strong> 1300 000 000 (Option 2 for Finance)</li>
                            <li><strong>Postal Address:</strong> Lia College Finance Department, PO Box 000, City, State, Postcode</li>
                            <li><strong>Office Hours:</strong> Monday to Friday, 9:00 AM – 5:00 PM AEST</li>
                        </ul>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
@endsection
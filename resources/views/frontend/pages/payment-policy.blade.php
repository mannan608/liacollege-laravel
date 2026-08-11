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
                        Payment Policy and Procedure
                    </h1>
                    <p class="text-xl sm:text-2xl font-bold text-secondary-500 mt-2">(FIN1)</p>
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
                        Lia College is committed to providing transparent, fair, and equitable financial arrangements for all students and clients. This Payment Policy outlines the terms and conditions governing fee payments, refunds, payment plans, and financial obligations associated with enrolment in courses and services provided by Lia College.
                    </p>
                </section>

                <!-- Scope -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Scope
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        This policy applies to all students, prospective students, parents, guardians, sponsors, and third-party payers engaging with Lia College for educational services, training programs, and ancillary services. It covers all payment methods, schedules, penalties, refunds, and financial hardship provisions.
                    </p>
                </section>

                <!-- Legislative Requirements -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Legislative Requirements
                    </h2>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>Higher Education Support Act 2003 (Cth)</li>
                        <li>Education Services for Overseas Students Act 2000 (Cth)</li>
                        <li>National Vocational Education and Training Regulator Act 2011 (Cth)</li>
                        <li>Australian Consumer Law (Schedule 2 of the Competition and Consumer Act 2010)</li>
                        <li>Privacy Act 1988 (Cth)</li>
                    </ul>
                </section>

                <!-- Methods of Payment -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Methods of Payment
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        Lia College accepts payment through the following methods. All payments must be made in Australian Dollars (AUD) unless otherwise arranged in writing.
                    </p>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                        <table class="w-full text-left border-collapse min-w-[640px]">
                            <thead>
                                <tr class="bg-brand-500 text-white">
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide w-40 sm:w-48">Method</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide">Details</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide w-32 sm:w-40">Processing Time</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700 text-sm sm:text-base">
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Credit / Debit Card</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">Visa, Mastercard, and American Express accepted online through the secure student portal or in person at Student Services.</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">Immediate</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Bank Transfer (EFT)</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">Direct deposit to Lia College bank account. Student ID must be included in the transaction reference.</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">1-3 business days</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">BPAY</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">Available for domestic students via BPAY Biller Code and Reference Number shown on invoices.</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">1-2 business days</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Payment Plan</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">Approved instalment plans managed through third-party provider or internal direct debit arrangement.</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">As per schedule</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Third-Party / Sponsor</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">Employer, government agency, or scholarship provider payments. Valid purchase order or sponsorship agreement required.</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">As per agreement</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Fee Structure -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Fee Structure and Charges
                    </h2>
                    <ul class="list-disc list-inside space-y-3 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>Tuition fees are determined by the specific course, qualification level, and mode of delivery (on-campus, online, or blended).</li>
                        <li>Additional fees may apply for materials, equipment, uniforms, excursions, work placement administration, and student amenities.</li>
                        <li>International students are subject to tuition fees as specified in their Confirmation of Enrolment (CoE) and written agreement.</li>
                        <li>All advertised fees are inclusive of Goods and Services Tax (GST) where applicable, unless otherwise stated.</li>
                        <li>Lia College reserves the right to adjust fees annually; however, currently enrolled students are protected from mid-course fee increases for the duration of their current enrolment period.</li>
                    </ul>
                </section>

                <!-- Payment Schedule -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Payment Schedule and Due Dates
                    </h2>
                    <div class="space-y-4 sm:space-y-6">
                        <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                            <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                Upfront Payment
                            </h3>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                                Full tuition fees must be paid no later than 14 days prior to the course commencement date, or upon acceptance of the offer, whichever is earlier. Enrolment is not confirmed until payment is received in full.
                            </p>
                        </div>

                        <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                            <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                Instalment Plans
                            </h3>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                Students may apply for an approved payment plan subject to eligibility criteria. Standard terms include:
                            </p>
                            <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li>A non-refundable administration fee of $50 per instalment plan.</li>
                                <li>Minimum deposit of 25% of total course fees prior to commencement.</li>
                                <li>Remaining balance divided into equal monthly instalments over the course duration.</li>
                                <li>All instalments must be completed no later than four weeks before the course end date.</li>
                                <li>Failure to maintain instalment payments may result in suspension of access to learning materials and assessment services.</li>
                            </ul>
                        </div>

                        <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                            <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                International Students
                            </h3>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                                International students must pay at least the first semester or term tuition fees upfront as required by the Department of Home Affairs and ESOS Act. Subsequent semester fees are due 14 days prior to the start of each semester.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Refund Policy -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Refund Policy
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        Refund applications must be submitted in writing to the Student Services department using the official Refund Request Form. Refunds are assessed based on the date of written withdrawal notification and the circumstances outlined below.
                    </p>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                        <table class="w-full text-left border-collapse min-w-[640px]">
                            <thead>
                                <tr class="bg-brand-500 text-white">
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide w-48 sm:w-56">Circumstance</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide">Refund Entitlement</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide w-40 sm:w-48">Administration Fee</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700 text-sm sm:text-base">
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Withdrawal before course commencement</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">Full refund of tuition fees paid, less non-refundable enrolment and material fees.</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">$250 non-refundable</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Withdrawal within 14 days of commencement</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">75% refund of tuition fees paid for the current study period.</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">$250 non-refundable</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Withdrawal after 14 days but before 25% completion</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">50% refund of tuition fees paid for the current study period.</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">$250 non-refundable</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Withdrawal after 25% completion</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">No refund of tuition fees. Student remains liable for any outstanding balance.</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">N/A</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Course cancellation by Lia College</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">Full refund of all fees paid, including enrolment fees, or offer of alternative placement.</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">Waived</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Visa refusal (international students)</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">Full refund less $500 non-refundable administration fee. Must provide official visa refusal letter from the Department of Home Affairs.</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">$500 non-refundable</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mt-4">
                        Refunds will be processed within 28 business days of approved application. Refunds are issued via the original payment method where possible. Third-party or sponsored students will have refunds directed to the original payer unless written consent is provided.
                    </p>
                </section>

                <!-- Late Payment -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Late Payment and Penalties
                    </h2>
                    <ul class="list-disc list-inside space-y-3 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>Accounts outstanding beyond the due date will incur a late payment fee of $50 per month or part thereof.</li>
                        <li>Students with overdue accounts may be restricted from accessing learning platforms, assessment submissions, and academic results.</li>
                        <li>Continued non-payment after 30 days will result in formal warning and potential suspension of enrolment.</li>
                        <li>After 60 days of non-payment, the account may be referred to an external debt collection agency. The student will be liable for all reasonable collection costs and legal fees.</li>
                        <li>International students with overdue fees risk cancellation of enrolment and reporting to the Department of Home Affairs, which may affect visa status.</li>
                    </ul>
                </section>

                <!-- Financial Hardship -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Financial Hardship Provisions
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        Lia College recognises that students may experience unforeseen financial difficulties. We are committed to supporting students through temporary hardship without compromising their educational outcomes.
                    </p>
                    <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                        <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                            <li>Students experiencing financial hardship may apply for a payment extension or revised instalment plan by submitting a Financial Hardship Application Form.</li>
                            <li>Applications must include supporting documentation such as evidence of unemployment, medical expenses, or other exceptional circumstances.</li>
                            <li>Approved hardship arrangements may include extended payment terms, deferred payments, or temporary suspension of late fees.</li>
                            <li>Hardship applications do not exempt students from their ultimate obligation to pay all outstanding fees.</li>
                            <li>All hardship applications are treated confidentially and assessed by the Student Support and Finance team within 10 business days.</li>
                        </ul>
                    </div>
                </section>

                <!-- Cancellation -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Cancellation and Withdrawal Procedure
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        Students wishing to cancel their enrolment or withdraw from a course must follow the formal procedure outlined below:
                    </p>
                    <ol class="list-decimal list-inside space-y-3 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>Submit a written Notice of Withdrawal to Student Services via email or in person.</li>
                        <li>Include full name, student ID, course name, and reason for withdrawal.</li>
                        <li>Attend an exit interview with a Student Support Officer where applicable.</li>
                        <li>Return all Lia College property, including student ID cards, equipment, and library materials.</li>
                        <li>Submit a Refund Request Form if seeking reimbursement of eligible fees.</li>
                        <li>Confirm any outstanding financial obligations and agree to a payment plan if necessary.</li>
                    </ol>
                </section>

                <!-- Debt Recovery -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Debt Recovery
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Lia College reserves the right to pursue recovery of all outstanding debts through appropriate legal channels. This may include referral to external debt collection agencies, legal proceedings, and reporting to relevant credit agencies. All costs associated with debt recovery, including legal fees and collection agency commissions, will be added to the outstanding debt and are the responsibility of the student or debtor.
                    </p>
                </section>

                <!-- Policy Review -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Policy Review
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        This policy will be reviewed annually or following any significant legislative change, fee structure adjustment, or operational requirement. Management of Lia College will conduct reviews in consultation with the Finance and Student Services departments.
                    </p>
                </section>

                <!-- Contact -->
                <section class="mb-6 sm:mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Contact Information
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        For all payment-related enquiries, refund requests, or financial hardship applications, please contact:
                    </p>
                    <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                        <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                            <li><strong>Email:</strong> finance@liacollege.edu.au</li>
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
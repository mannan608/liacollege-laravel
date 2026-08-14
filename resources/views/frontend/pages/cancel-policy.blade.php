@extends('frontend.layouts.app')

@section('content')
    <div class="min-h-screen bg-slate-50 py-6 sm:py-8 lg:py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">

            <!-- Main Document Card -->
            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
                <div class="p-6 sm:p-10 lg:p-14">

                    <!-- Header -->
                    <div class="border-b-2 border-secondary-500/20 pb-6 sm:pb-8 mb-8 sm:mb-10 text-center sm:text-left">
                        <h1
                            class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-brand-500 tracking-tight leading-tight">
                            Student Refund Policy
                        </h1>
                        <p class="text-lg sm:text-xl text-slate-500 mt-3">
                            Leadership Institute Australia | RTO Code: 46049 | ABN: 93653303621
                        </p>
                        <p class="text-base sm:text-lg text-slate-500 mt-2">
                            training@liacollege.edu.au | 0479110567 | www.liacollege.edu.au
                        </p>
                    </div>

                    <!-- Policy Overview -->
                    <section class="mb-8 sm:mb-10">
                        <h2
                            class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                            Policy Overview
                        </h2>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                            Leadership Institute Australia (RTO Code: 46049) is committed to providing fair, transparent,
                            and consistent refund arrangements for all students. This Refund Policy outlines the
                            circumstances under which students may be eligible for a full or partial refund of tuition fees.
                            Leadership Institute Australia ensures that all students are provided with clear information
                            regarding fees, payment terms, and refund conditions before enrolment and the
                            commencement of training.

                        </p>
                    </section>

                    <!-- Application / Enrolment Fee -->
                    <section class="mb-8 sm:mb-10">
                        <h2
                            class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                            Application / Enrolment Fee
                        </h2>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                            The application or enrolment fee is non-refundable, except where Leadership Institute
                            Australia cancels the course before commencement.
                        </p>
                    </section>

                    <!-- Refunds Before Course Commencement -->
                    <section class="mb-8 sm:mb-10">
                        <h2
                            class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                            Refunds Before Course Commencement
                        </h2>

                        <div class="space-y-4 sm:space-y-6">
                            <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                                <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                    Full Refund
                                </h3>
                                <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                    Students will receive a 100% refund of tuition fees paid if:
                                </p>
                                <ul
                                    class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                    <li>Leadership Institute Australia cancels the course before the scheduled commencement
                                        date.
                                    </li>
                                    <li>The course commencement date is changed by the Institute and the student is unable
                                        to
                                        attend.</li>
                                    <li>The student submits a written notice of withdrawal at least 14 calendar days prior
                                        to the
                                        course commencement date.</li>
                                </ul>
                            </div>

                            <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                                <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                                    Partial Refund
                                </h3>
                                <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                    If a student withdraws less than 14 calendar days before the course commencement date, a
                                    partial refund may be approved. The refund will be calculated after deducting:

                                </p>
                                <ul
                                    class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                    <li>the non-refundable application/enrolment fee; and
                                    </li>
                                    <li>any applicable administrative costs incurred by the Institute</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <!-- Refunds After Course Commencement -->
                    <section class="mb-8 sm:mb-10">
                        <h2
                            class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                            Refunds After Course Commencement
                        </h2>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                            Where a student withdraws after training has commenced:
                        </p>
                        <ul
                            class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                            <li>No refund will be provided for training and assessment services already delivered.</li>
                            <li>Any unused portion of prepaid tuition fees may be refunded at the discretion of
                                Leadership Institute Australia, depending on individual circumstances and
                                management approval.
                            </li>
                            <li>All refund requests must be submitted in writing.
                                Students must complete the official Withdrawal Form before a refund request can be
                                assessed.
                            </li>
                        </ul>
                    </section>

                    <!-- Course Cancellation by Leadership Institute Australia -->
                    <section class="mb-8 sm:mb-10">
                        <h2
                            class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                            Course Cancellation by Leadership Institute Australia
                        </h2>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                            If Leadership Institute Australia is unable to deliver a course due to circumstances
                            including, but not limited to:
                        </p>
                        <ul
                            class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base mb-4">
                            <li>insufficient enrolments;</li>
                            <li>trainer or assessor availability;</li>
                            <li>regulatory or legislative changes;</li>
                            <li>unforeseen operational circumstances; or</li>
                            <li>events beyond the Institute's reasonable control,</li>
                        </ul>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                            students will be offered one of the following options:
                        </p>
                        <ol
                            class="list-decimal list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base mb-4">
                            <li>A full refund of all tuition fees paid;</li>
                            <li>Transfer to an alternative available course;</li>
                            <li>A credit towards a future course offered by Leadership Institute Australia.
                                Where a refund is approved due to course cancellation, it will be processed within 14
                                business days.
                            </li>
                        </ol>
                    </section>

                    <!-- Refund Requests -->
                    <section class="mb-8 sm:mb-10">
                        <h2
                            class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                            Refund Requests
                        </h2>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                            To be considered, all refund requests must:
                        </p>
                        <ul
                            class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base mb-4">
                            <li>be submitted in writing using the appropriate Refund Request Form;</li>
                            <li>clearly state the reason for the request; and
                            </li>
                            <li>include any relevant supporting documentation where applicable.
                            </li>
                        </ul>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                            Each request will be reviewed by the Leadership Institute Australia administration
                            team in accordance with this policy.

                        </p>
                    </section>

                    <!-- Refund Processing -->
                    <section class="mb-8 sm:mb-10">
                        <h2
                            class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                            Refund Processing
                        </h2>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                            Approved refunds will be processed within 14–21 business days following approval.
                            Where possible, refunds will be paid using the same payment method used for the
                            original transaction. If this is not possible, an alternative payment method will be
                            arranged with the student.
                        </p>
                    </section>

                    <!-- Exceptional Circumstances -->
                    <section class="mb-8 sm:mb-10">
                        <h2
                            class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                            Exceptional Circumstances
                        </h2>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                            Leadership Institute Australia recognises that exceptional circumstances may affect a
                            student's ability to continue their studies. Refunds may be considered on
                            compassionate grounds, including but not limited to:
                        </p>
                        <ul
                            class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base mb-4">
                            <li>serious illness or injury;</li>
                            <li>compassionate or compelling personal circumstances;</li>
                            <li>family emergencies;</li>
                            <li>natural disasters; or</li>
                            <li>other circumstances approved by the Institute's management.
                                Supporting evidence may be required before a decision is made</li>
                        </ul>

                    </section>

                    <!-- Appeals -->
                    <section class="mb-8 sm:mb-10">
                        <h2
                            class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                            Appeals
                        </h2>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                            Students who are dissatisfied with a refund decision have the right to appeal.
                            Appeals must be lodged in accordance with the Leadership Institute Australia
                            Complaints and Appeals Policy and Procedure. Students will not be disadvantaged for
                            exercising their right to appeal.

                        </p>
                    </section>

                    <!-- Consumer Protection -->
                    <section class="mb-8 sm:mb-10">
                        <h2
                            class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                            Consumer Protection
                        </h2>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                            If a student believes their refund request has not been handled fairly or in accordance
                            with applicable legislation, they may seek advice or lodge a complaint with the
                            relevant consumer protection authority or regulatory body in their State or Territory.
                            Nothing in this policy limits a student's rights under the Australian Consumer Law or
                            other applicable legislation.

                        </p>
                    </section>

                    <!-- Policy Review -->
                    <section class="mb-8 sm:mb-10">
                        <h2
                            class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                            Policy Review
                        </h2>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                            Leadership Institute Australia reserves the right to amend this Refund Policy at any
                            time to ensure ongoing compliance with:
                        </p>
                        <ul
                            class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base mb-4">
                            <li>the Standards for Registered Training Organisations (RTOs) 2015;</li>
                            <li>applicable Commonwealth and State legislation; and</li>
                            <li>other regulatory requirements.</li>
                        </ul>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                            The current version of this policy will be made available to all students through the
                            Institute's official communication channels and prior to enrolment.
                        </p>
                    </section>

                    <!-- Contact Information -->
                    <section class="mb-6 sm:mb-8">
                        <h2
                            class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                            Contact Information
                        </h2>
                        <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                            For all enquiries, please contact Leadership Institute Australia:
                        </p>
                        <div class="bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                            <ul
                                class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li><strong>Email:</strong> training@liacollege.edu.au</li>
                                <li><strong>Phone:</strong> 0479110567</li>
                                <li><strong>Website:</strong> www.liacollege.edu.au</li>
                                <li><strong>RTO Code:</strong> 46049</li>
                                <li><strong>ABN:</strong> 93653303621</li>
                            </ul>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
@endsection

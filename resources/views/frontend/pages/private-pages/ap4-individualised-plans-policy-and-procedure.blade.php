@extends('frontend.layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 py-6 sm:py-8 lg:py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">

        <!-- Back Button -->
        <div class="mb-6 sm:mb-8">
            <a href="{{ route('student.dashboard') }}"
                class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold px-5 py-2.5 sm:px-6 sm:py-3 rounded-lg transition-colors duration-200 shadow-sm text-sm sm:text-base">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        <!-- Main Document Card -->
        <div class="bg-white rounded overflow-hidden">
            <div class="p-6 sm:p-10 lg:p-14">

                <!-- Header -->
                <div class="border-b-2 border-amber-100 pb-6 sm:pb-8 mb-8 sm:mb-10 text-center sm:text-left">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#132b4e] tracking-tight leading-tight">
                        Individualised Plans Policy and Procedure
                    </h1>
                    <p class="text-xl sm:text-2xl font-bold text-[#e6bb73] mt-2">(AP4)</p>
                </div>

                <!-- Policy Statement -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-[#e6bb73] mb-3 sm:mb-4 border-l-4 border-[#e6bb73] pl-4">
                        Policy Statement
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        The purpose of the Individualised Plans Policy is to ensure that Lia College works in partnership
                        with consumers to plan their care and services appropriately. The planned care and services should
                        meet each consumer's needs, goals and preferences and optimise their health and wellbeing. This
                        policy aligns with the Australian Government Aged Care Quality and Safety Commission standards.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Scope -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-[#e6bb73] mb-3 sm:mb-4 border-l-4 border-[#e6bb73] pl-4">
                        Scope
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        This policy applies to Lia College consumers, representatives of consumers, external service
                        providers, Lia College board members, staff, management and medical professionals.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Background -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-[#e6bb73] mb-3 sm:mb-4 border-l-4 border-[#e6bb73] pl-4">
                        Background
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Lia College embeds a person-centred care approach to service delivery. This requires prioritising
                        the consumer's aspirations and strengths within the context of their capacity. It enables the
                        planning of care and services to align with individualised needs whilst providing opportunities for
                        consumer self-agency, participation and growth. Consistent review of care and services also ensures
                        changes and development in consumer health or abilities are identified in a timely manner with
                        appropriate responses actioned to minimise the impact of any loss of ability and to support
                        consumers to live their day-to-day lives with dignity and choice. Involving consumers in the
                        planning process and decision-making will assist consumers in making informed decisions about their
                        options, including how much they want to be involved and consideration of their capacity.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Legislative Requirements -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-[#e6bb73] mb-3 sm:mb-4 border-l-4 border-[#e6bb73] pl-4">
                        Legislative Requirements
                    </h2>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-[#132b4e] text-sm sm:text-base">
                        <li>Aged Care Act 1997 (Cth) User Rights Amendment (Charter of Aged Care Rights) Principles 2019</li>
                        <li>Privacy Act 1988 (Cth), Schedule 1, Australian Privacy Principles</li>
                        <li>Aged Care Quality Standards – Standard 1, Consumer dignity and choice, Standard 2 – Ongoing
                            Assessment and planning with consumers</li>
                        <li>Quality of Care Principles 2014</li>
                        <li>Privacy Act 1988</li>
                        <li>State and Territory mental health, guardianship and administration, enduring power of attorney
                            and medical directive/advance care planning legislation</li>
                        <li>National Disability Service Standards</li>
                        <li>NDIS Practice Standards</li>
                        <li>UN Convention on the Rights of Persons with Disabilities</li>
                    </ul>
                </section>

                <!-- Principles -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-[#e6bb73] mb-3 sm:mb-4 border-l-4 border-[#e6bb73] pl-4">
                        Principles that Inform our Policy
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4 sm:mb-6">
                        All decision-making about our Individualised Plans Procedure is conducted in accordance with the
                        principles of our Individualised Plans Policy.
                    </p>

                    <h3 class="text-lg sm:text-xl font-bold text-[#fcb53b] mb-3 sm:mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#fcb53b] inline-block flex-shrink-0"></span>
                        In Relation to Consumer Needs
                    </h3>
                    <ul class="list-disc list-inside space-y-2 sm:space-y-3 text-slate-700 leading-relaxed marker:text-[#132b4e] text-sm sm:text-base">
                        <li>Lia College has a culture of inclusion and respect for consumers.</li>
                        <li>Lia College supports consumers to exercise choice and independence and actively partners with
                            the consumer to inform ongoing care assessment and planning.</li>
                        <li>Lia College will carry out an ongoing assessment and planning with the consumer, their
                            representatives and others who the consumer wants to be involved in their care and services
                            assessment and planning.</li>
                        <li>Consistent and ongoing sharing of information, asking for feedback from the consumer, and
                            supporting and encouraging consumers to take part in assessing and planning their own care and
                            services are paramount and aligned with a person-centred practice approach.</li>
                        <li>A person-centred approach recognises that making decisions about their own life, and having
                            those decisions respected, is an essential right of each consumer. It improves their health and
                            wellbeing and demonstrates the organisation's values to the consumer.</li>
                        <li>The consumer may choose to have a relative, partner, or friend as a representative involved in
                            decisions about their care. Where a consumer cannot make decisions, they may have a court or
                            tribunal-appointed guardian to make decisions on their behalf.</li>
                        <li>Assessment and planning are also expected to include other organisations, individuals or service
                            providers involved in caring for consumers. Lia College will ensure an effective communication
                            framework is in place with other service providers and relevant other parties such as unpaid
                            carers, family and friends. Collaborative assessment and planning (if the consumer wishes) can
                            help Lia College improve its knowledge and sensitivity related to the consumer's needs, goals
                            and preferences and improve continuity of care and services for the consumer.</li>
                        <li>Lia College respects consumer privacy and will comply with obligations relating to the privacy
                            of information when coordinating care and information exchange with other organisations,
                            individuals or service providers.</li>
                    </ul>
                </section>

                <!-- Key Terms -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-[#e6bb73] mb-3 sm:mb-4 border-l-4 border-[#e6bb73] pl-4">
                        Key Terms
                    </h2>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                        <table class="w-full text-left border-collapse min-w-[640px]">
                            <thead>
                                <tr class="bg-[#132b4e] text-white">
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide w-32 sm:w-40">Term</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide">Meaning</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide w-40 sm:w-48">Source</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700 text-sm sm:text-base">
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-[#132b4e] align-top">Consumer</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">
                                        A person to whom an approved provider provides, or is to provide, care through an aged care service.
                                        <p class="mt-2">A reference to a consumer in a provision of the Aged Care Quality Standards set out
                                            in Schedule 2 includes a reference to a representative of the consumer, so far
                                            as the provision is capable of applying to a representative of a consumer.</p>
                                    </td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">Quality of Care Principles 2014</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-[#132b4e] align-top">Representative</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">
                                        A person nominated by the consumer as a person to be told about matters affecting the consumer; or
                                        <p class="mt-2">A person:</p>
                                        <ul class="list-disc list-inside ml-2 mt-1 space-y-1">
                                            <li>who nominates themselves as a person to be told about matters affecting a consumer; and</li>
                                            <li>who the relevant organisation is satisfied has a connection with the consumer and is concerned for the safety, health and wellbeing of the consumer.</li>
                                        </ul>
                                    </td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">Quality of Care Principles 2014</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-[#132b4e] align-top">Person Centred Approach</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">
                                        Supports the person, at the 'centre of the service', to be involved in making decisions about their life.
                                        <p class="mt-2">Considers each person's life experience, age, gender, culture, heritage, language, beliefs and identity.</p>
                                        <p class="mt-2">Requires flexible services and support to suit the person's wishes and priorities</p>
                                    </td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">NSW Department of Health</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-[#132b4e] align-top">Individualised Plan</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">
                                        Outlines your care needs, the types of services you will receive to meet those needs, who will provide the services and when. It will be developed by your service provider in consultation with you.
                                    </td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">Aged Care Guide</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Links -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-[#e6bb73] mb-3 sm:mb-4 border-l-4 border-[#e6bb73] pl-4">
                        Links to other Policies and Documents
                    </h2>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-[#132b4e] text-sm sm:text-base">
                        <li>Reporting and Recording Behaviour Policy and Procedures</li>
                        <li>Duty of Care Policy and Procedures</li>
                        <li>Management of Care and Service Policy and Procedures</li>
                        <li>Staff Health and Wellbeing Policy and Procedures</li>
                        <li>Confidentiality Policy and Procedures</li>
                        <li>Complaints and Appeals Policy and Procedures</li>
                        <li>Communications Policy and Procedures</li>
                        <li>Privacy Policy and Procedures</li>
                    </ul>
                </section>

                <!-- Induction -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-[#e6bb73] mb-3 sm:mb-4 border-l-4 border-[#e6bb73] pl-4">
                        Induction and Ongoing Training
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3 sm:mb-4">
                        Lia College requires that induction and ongoing training of all staff include the Individualised
                        Plans Policy to enable staff to fulfil their roles effectively.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Lia College promotes information sharing at staff meetings, sharing of information received from
                        industry trends or changes in legislation, and in consultation at policy review sessions.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Policy Created/Reviewed -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-[#e6bb73] mb-3 sm:mb-4 border-l-4 border-[#e6bb73] pl-4">
                        Policy Created/Reviewed
                    </h2>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                        <table class="w-full text-left border-collapse min-w-[500px]">
                            <thead>
                                <tr class="bg-[#132b4e] text-white">
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide">Policy Created/ Reviewed</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide">Modifications</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide">Next Review Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700 text-sm sm:text-base">
                                <tr class="bg-white">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">Implemented December 2022</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top"></td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">May 2023</td>
                                </tr>
                                <tr class="bg-slate-50">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">
                                        <ul class="list-none"></ul>
                                    </td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">
                                        <ul class="list-none"></ul>
                                    </td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">
                                        <ul class="list-none"></ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Monitoring -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-[#e6bb73] mb-3 sm:mb-4 border-l-4 border-[#e6bb73] pl-4">
                        Monitoring, Evaluation and Review
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        This policy will be reviewed every three years or on the occurrence of any relevant legislative
                        change. Management of Lia College will conduct reviews in consultation with the team at staff
                        meetings.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Procedure Header -->
                <section class="mb-6 sm:mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-[#e6bb73] mb-3 sm:mb-4 border-l-4 border-[#e6bb73] pl-4">
                        Individualised Plans Procedure
                    </h2>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Prior to Service Entry -->
                <section class="mb-6 sm:mb-8 bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                    <h3 class="text-lg sm:text-xl font-bold text-[#fcb53b] mb-3 sm:mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#fcb53b] inline-block flex-shrink-0"></span>
                        Prior to Service Entry
                    </h3>
                    <ul class="list-disc list-inside space-y-2 sm:space-y-3 text-slate-700 leading-relaxed marker:text-[#132b4e] text-sm sm:text-base">
                        <li>Consultation will take place with the person and their family, advocate, guardian and/or others
                            as appropriate, about the various perceptions of the person's needs and issues which may impact
                            the delivery of services.</li>
                        <li>Communication and support needs of the individual who will be receiving services from Lia College
                            Care will be addressed to maximise their participation in the planning process.</li>
                        <li>Staff responsible for the individualised plan will take the time to get to know the person (and
                            family) and facilitate opportunities to express aspirations, preferences, and choices. All
                            information provided to people will be in a format they can understand.</li>
                    </ul>
                </section>

                <!-- On entry -->
                <section class="mb-6 sm:mb-8 bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                    <h3 class="text-lg sm:text-xl font-bold text-[#fcb53b] mb-3 sm:mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#fcb53b] inline-block flex-shrink-0"></span>
                        On entry to the Service
                    </h3>
                    <ul class="list-disc list-inside space-y-2 sm:space-y-3 text-slate-700 leading-relaxed marker:text-[#132b4e] text-sm sm:text-base">
                        <li>An initial Individualised Plan will be developed reflecting the needs and aspirations of the
                            person and/or family and the support required to meet those needs.</li>
                        <li>One or more planning meetings will be coordinated to develop the plan. Meetings will be at times
                            and venues convenient to everyone involved to maximise the participation of key people.</li>
                        <li>The individualised plan may be informed by other people who know the person, but it must be
                            person-centred and reflect the decisions and choices of the individual service user first and
                            foremost.</li>
                    </ul>
                </section>

                <!-- Content of the Plan -->
                <section class="mb-6 sm:mb-8 bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                    <h3 class="text-lg sm:text-xl font-bold text-[#fcb53b] mb-3 sm:mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#fcb53b] inline-block flex-shrink-0"></span>
                        Content of the Plan
                    </h3>
                    <ul class="list-disc list-inside space-y-2 sm:space-y-3 text-slate-700 leading-relaxed marker:text-[#132b4e] text-sm sm:text-base">
                        <li>The individualised plan will include goals (and support required) for each of the following:
                            <ul class="list-disc list-inside ml-4 sm:ml-6 mt-2 space-y-1 marker:text-[#e6bb73]">
                                <li>health and wellbeing</li>
                                <li>participation (school/study/work)</li>
                                <li>independent living skills development</li>
                                <li>engagement in the local community</li>
                                <li>recreational activities at home or in the community</li>
                                <li>forming friendships and peer networks</li>
                                <li>managing finances, material possessions and/or accumulating savings</li>
                                <li>self-expression including clothing, appearance (appropriate to their age)</li>
                                <li>exploring different lifestyle choices in relation to food, exercise etc.</li>
                            </ul>
                        </li>
                        <li>Individualised plans may include support to be provided by family, social networks and/or other
                            services.</li>
                        <li>Some goals will be clearly defined, while others may be vague or exploratory. Goals must be
                            realistic.</li>
                        <li>The individualised plan will set clearly defined measurable and achievable targets within the
                            time given frames.</li>
                        <li>Once agreed, a copy of the plan will be made available to the person/family in a format they can
                            understand (and may also be provided to family members and guardians/administrators where
                            appropriate and with the consent of the person if an adult).</li>
                    </ul>
                </section>

                <!-- Monitoring and Reviewing -->
                <section class="mb-6 sm:mb-8 bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                    <h3 class="text-lg sm:text-xl font-bold text-[#fcb53b] mb-3 sm:mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#fcb53b] inline-block flex-shrink-0"></span>
                        Monitoring and Reviewing the Plan
                    </h3>
                    <ul class="list-disc list-inside space-y-2 sm:space-y-3 text-slate-700 leading-relaxed marker:text-[#132b4e] text-sm sm:text-base">
                        <li>The individualised plan is a living document that can be modified or reviewed when required.</li>
                        <li>After the first three months of service delivery, the initial plan will be reviewed.</li>
                        <li>At a minimum, the individualised plan will be reviewed and redeveloped every 12 months (a more
                            frequent schedule may be appropriate for children and young adults).</li>
                    </ul>
                </section>

            </div>
        </div>
    </div>
</div>

@endsection
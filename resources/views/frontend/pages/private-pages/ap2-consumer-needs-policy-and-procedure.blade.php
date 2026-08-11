@extends('frontend.layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">

        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('student.dashboard') }}"
                class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200 shadow-sm text-base">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
            <div class="p-8 sm:p-10 lg:p-14">

                <!-- Header -->
                <div class="border-b border-slate-200 pb-8 mb-10 text-center sm:text-left">
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-[#132b4e] tracking-tight leading-tight">
                        Consumer Needs Policy and Procedure
                    </h1>
                    <p class="text-2xl font-bold text-[#e6bb73] mt-2">(AP2)</p>
                </div>

                <!-- Policy Statement -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Policy Statement</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        The purpose of the Consumer Needs Policy and Procedure is designed to ensure that Lia College works
                        in partnership with consumers to appropriately plan their care and services. The planned care and
                        services should meet each consumer's individual needs, goals and preferences and optimise their
                        health and well-being.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Scope -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Scope</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        This policy applies to Lia College consumers, representatives of consumers, external service
                        providers, Lia College board members, staff and management and medical professionals.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Background -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Background</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        Lia College embeds a person-centred care approach to service delivery. This requires prioritising
                        the consumer's aspirations and strengths within the context of their capacity. This enables the
                        planning of care and services to align with individualised needs whilst providing opportunities for
                        consumer self-agency, participation and growth. Consistent review of care and services also ensures
                        changes and development in consumer health or abilities are identified in a timely manner with
                        appropriate responses actioned to minimise the impact of any loss of ability, and to support
                        consumers to live their day-to-day lives with dignity and choice. Involving consumers in the
                        planning process and descision-making will assist consumers in making informed decisions about their
                        options, including how much they want to be involved and consideration of their capacity.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Legislative Requirements -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Legislative Requirements</h2>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-[#132b4e]">
                        <li>Aged Care Act 1997 (Cth), User Rights Amendment (Charter of Aged Care Rights) Principles 2019</li>
                        <li>Privacy Act 1988 (Cth), Schedule 1, Australian Privacy Principles</li>
                        <li>Aged Care Quality Standards – Standard 1, Consumer dignity and choice, Standard 2 – Ongoing
                            Assessment and planning with consumers</li>
                        <li>Quality of Care Principles 2014</li>
                        <li>Privacy Act 1988</li>
                        <li>Disability Services Act (National Standards for Disability Services) Determination 2014</li>
                        <li>State and Territory mental health, guardianship and administration, enduring power of attorney
                            and medical directive/advance care planning legislation</li>
                    </ul>
                </section>

                <!-- Principles -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Principles that Inform our Policy</h2>
                    <p class="text-slate-700 leading-relaxed text-base mb-6">
                        All decision-making about our <em>Consumer Needs</em><em> Procedure</em> is carried out in accordance
                        with the principles of our <em>Consumer Needs Policy</em>.
                    </p>

                    <ul class="my-4 list-none"></ul>

                    <h3 class="text-xl font-bold text-[#fcb53b] mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#fcb53b] inline-block"></span>
                        Consumer Needs Principles
                    </h3>
                    <div class="space-y-4 text-slate-700 leading-relaxed">
                        <p>Lia College has a culture of inclusion and respect for consumers.</p>
                        <p>Lia College supports consumers to exercise choice and independence and actively partners with the
                            consumer to inform ongoing care assessment and planning.</p>
                        <p>Lia College will carry out an ongoing assessment and planning with the consumer, their
                            representatives and others who the consumer wants to be involved in their care and services
                            assessment and planning.</p>
                        <p>Consistent and ongoing sharing of information, asking for feedback from the consumer, and supporting
                            and encouraging consumers to take part in assessing and planning their own care and services are
                            paramount and aligned with a person-centred practice approach.</p>
                        <p>A person-centred approach recognises that making decisions about their own life, and having those
                            decisions respected, is an essential right of each consumer. It improves their health and well-being
                            and demonstrates the organisation's values to the consumer.</p>
                        <p>The consumer may choose to have a relative, partner, or friend as a representative involved in
                            decisions about their care. Where a consumer lacks the capacity to make decisions, they may have a
                            court or tribunal-appointed guardian to make decisions on their behalf.</p>
                        <p>Assessment and planning are also expected to include other organisations, individuals or service
                            providers involved in caring for consumers. Lia College will ensure an effective communication
                            framework is in place with other service providers and relevant other parties such as unpaid carers,
                            family and friends. Collaborative assessment and planning (if the consumer wishes) can help Lia College
                            Care improve its knowledge and sensitivity related to the consumer's needs, goals and preferences
                            and improve continuity of care and services for the consumer.</p>
                        <p>Lia College respects consumer privacy and will comply with obligations relating to privacy of
                            information when coordinating care and information exchange with other organisations, individuals or
                            service providers.</p>
                    </div>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Key Terms -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Key Terms</h2>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-[#132b4e] text-white">
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide w-40">Term</th>
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide">Meaning</th>
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide w-48">Source</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700">
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-[#132b4e] align-top">Consumer</td>
                                    <td class="px-6 py-4 leading-relaxed align-top">
                                        a)&nbsp;&nbsp;&nbsp; A person to whom an approved provider provides, or is to provide, care through an aged care service.
                                        <p class="mt-2">b)&nbsp;&nbsp;&nbsp; A reference to a consumer in a provision of the Aged Care Quality Standards set out in Schedule 2 includes a reference to a representative of the consumer, so far as the provision is capable of applying to a representative of a consumer.</p>
                                    </td>
                                    <td class="px-6 py-4 align-top">Quality of Care Principles 2014</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-6 py-4 font-medium text-[#132b4e] align-top">Representative</td>
                                    <td class="px-6 py-4 leading-relaxed align-top">
                                        a)&nbsp;&nbsp;&nbsp; A person nominated by the consumer as a person to be told about matters affecting the consumer; or
                                        <p class="mt-2">b)&nbsp;&nbsp;&nbsp; A person:</p>
                                        <ul class="list-disc list-inside ml-4 mt-1 space-y-1 marker:text-[#132b4e]">
                                            <li>who nominates themselves as a person to be told about matters affecting a consumer; and</li>
                                            <li>who the relevant organisation is satisfied has a connection with the consumer and is concerned for the safety, health and well being of the consumer.</li>
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4 align-top">Quality of Care Principles 2014</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-[#132b4e] align-top">Person Centred Approach</td>
                                    <td class="px-6 py-4 leading-relaxed align-top">
                                        a)&nbsp;&nbsp;&nbsp; Supports the person, at the 'centre of the service', to be involved in making decisions about their life.
                                        <p class="mt-2">b)&nbsp;&nbsp;&nbsp; Takes into account each person's life experience, age, gender, culture, heritage, language, beliefs and identity.</p>
                                        <p class="mt-2">c)&nbsp;&nbsp;&nbsp;&nbsp; Requires flexible services and support to suit the person's wishes and priorities.</p>
                                    </td>
                                    <td class="px-6 py-4 align-top">NSW Department of Health</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Links -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Links to other Policies and Documents</h2>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-[#132b4e]">
                        <li>Duty of Care Policy and Procedures</li>
                        <li>Staff Health and Wellbeing Policy and Procedures</li>
                        <li>Confidentiality Policy and Procedures</li>
                        <li>Complaints and Appeals Policy and Procedures</li>
                        <li>Communications Policy and Procedures</li>
                        <li>Privacy Policy and Procedures</li>
                    </ul>
                </section>

                <!-- Induction -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Induction and Ongoing Training</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        Lia College requires that induction and ongoing training of all staff include the Consumer Needs
                        Policy to enable staff to fulfil their roles effectively. In addition, Lia College promotes ongoing
                        commitment to understanding and applying the pinciples of the consumer needs policy and procedure
                        within workforce capacity building resources, forums and activities including (but not limited to)
                        meetings, industry policy and legislative changes, and in line with Lia College's governance
                        frameworks.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Policy Created/Reviewed -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Policy Created/Reviewed</h2>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-[#132b4e] text-white">
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide">Policy Created/ Reviewed</th>
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide">Modifications</th>
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide">Next Review Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700">
                                <tr class="bg-white">
                                    <td class="px-6 py-4 align-top">Implemented September 2022</td>
                                    <td class="px-6 py-4 align-top"></td>
                                    <td class="px-6 py-4 align-top">February 2023</td>
                                </tr>
                                <tr class="bg-slate-50">
                                    <td class="px-6 py-4 align-top">
                                        <ul class="list-none"></ul>
                                    </td>
                                    <td class="px-6 py-4 align-top">
                                        <ul class="list-none"></ul>
                                    </td>
                                    <td class="px-6 py-4 align-top">
                                        <ul class="list-none"></ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Monitoring -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Monitoring, Evaluation and Review</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        This policy will be reviewed annually or on the occurrence of any relevant legislative change.
                        Management of Lia College will conduct reviews in consultation with educators at staff meetings.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Procedure Header -->
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Consumer Needs Procedure</h2>
                    <p class="text-slate-700 leading-relaxed text-base mb-6">
                        Medical or Nurse Practitioners, Home Support Assessors (from the My Aged Care Regional Assessment
                        Service), Comprehensive Assessors (from Aged Care Assessment Teams) or NDIS Support Coordinators
                        will:
                    </p>
                    <ul class="list-disc list-inside space-y-3 text-slate-700 leading-relaxed marker:text-[#132b4e] mb-8">
                        <li>Utilise appropriate coordination tools and resources to involve the consumer and other
                            representatives (with consumer's consent) in the assessment, planning and review of their care
                            and services. Consumers are provided with their individualised plan and can describe how it
                            helps them meet their goals.</li>
                        <li>Proactively partner and engage other relevant service providers (with consumer's consent) and
                            representatives to contribute to the assessment and planning process and understand their role
                            within the plan, including who to contact in different situations.</li>
                        <li>Be provided with education and training about what a care plan entails and the purpose of
                            partnering with consumers, service providers and representatives to assess, plan and review care
                            and services. Where the organisation cannot meet care goals, staff are encouraged to think
                            innovatively in collaboration with others about what solutions could be sourced.</li>
                        <li>Provide information and guidance to the consumer and support them to participate in assessing
                            and planning their care and services. This should include information and resources made
                            available in appropriate formats and language translations to reduce consumer access barriers to
                            participation.</li>
                    </ul>

                    <p class="text-slate-700 leading-relaxed text-base mb-4 font-semibold">Management will:</p>
                    <ul class="list-disc list-inside space-y-3 text-slate-700 leading-relaxed marker:text-[#132b4e]">
                        <li>Ensure staff assigned to assessing consumer needs have the appropriate skills and qualifications
                            to manage complexity in assessing and planning care and services being undertaken.</li>
                        <li>Source and provide training and extra support where there are emerging skill gaps or new
                            legislative requirements for staff, and this will be reviewed annually.</li>
                        <li>Record, monitor and review care assessment and planning tools and processes annually to ensure
                            continuous improvement of service provision.</li>
                        <li>Ensure Lia College's Privacy Policy and Procedure is followed by staff in their understanding
                            that it governs the collection, storage and exchange of consumer information with the consumer,
                            repreatives and service providers.</li>
                    </ul>
                </section>

            </div>
        </div>
    </div>
</div>

@endsection
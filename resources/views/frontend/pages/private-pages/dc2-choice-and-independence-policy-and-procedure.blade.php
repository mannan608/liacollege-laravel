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
                        Choice and Independence Policy and Procedure
                    </h1>
                    <p class="text-2xl font-bold text-[#e6bb73] mt-2">(DC2)</p>
                </div>

                <!-- Policy Statement -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Policy Statement</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        The purpose of the Choice and Independence Policy and associated procedures are designed to ensure
                        that Lia College supports and respects consumers to make decisions about their own care and the way
                        care and services are delivered to them. This recognises that making decisions is an essential right
                        of each consumer and where possible that decisions are made by consumers themselves.This aligns with
                        the Aged Care Quality Standards. Standard 1 supports all of the other Quality Standards, the Aged
                        Care Charter of Rights, consumer and other responsibilities under the Aged Care Act 1997, and
                        obligations under competition and consumer law.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Scope -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Scope</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        This policy applies to residents, staff, management, medical professionals and visitors of Lia College
                        Care.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Background -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Background</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        Consumers need to be supported and respected to act independently, make their own choices and take
                        part in their community because this contributes towards their overall sense of self and belonging
                        in society, their health and well-being. Consumers are shaped by personal characteristics,
                        experiences, values and beliefs which affects the care, services and supports they need and the
                        choice and independence they want to pursue. Lia College embeds a person-centred care approach to
                        ensure that every consumer is supported according to their unique individual needs.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Legislative Requirements -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Legislative Requirements</h2>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-[#132b4e]">
                        <li>Aged Care Act 1997 (Cth)</li>
                        <li>User Rights Amendment (Charter of Aged Care Rights) Principles 2019</li>
                        <li>Privacy Act 1988 (Cth), Schedule 1, Australian Privacy Principles</li>
                        <li>Aged Care Quality Standards – Standard 1, Consumer dignity and choice</li>
                        <li>Quality of Care Principles 2014</li>
                    </ul>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Principles -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Principles that Inform our Policy</h2>
                    <p class="text-slate-700 leading-relaxed text-base mb-4">
                        All decision-making about <em>Choice and Independence</em> is carried out in accordance with the
                        principles of our <em>Choice and Independence Policy</em>.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-base mb-4">Choice and Independence Principles</p>
                    <ul class="list-disc list-inside space-y-3 text-slate-700 leading-relaxed marker:text-[#132b4e]">
                        <li>Dignity and respect – Being treated with dignity and respect are essential to quality of life.
                            Dignified and respectful care and services will help consumers live their lives how they choose,
                            recognise their strengths and individuality, and encourage their independence.</li>
                        <li>Identity, culture and diversity – Care and services are responsive, inclusive and sensitive to
                            each individual's gender, social, spiritual and cultural identity. Respecting the consumer's
                            individuality enables an improved understanding of their unique needs and preferences, leading
                            to better quality care and services.</li>
                        <li>Cultural safety – The consumer defines what cultural safety is, not an organisation.
                            Understanding a consumer's culture, acknowledging differences, and being actively aware and
                            respectful of these differences will lead to a positive experience of the care and services they
                            receive and their confidence to be able to raise concerns when they arise.</li>
                        <li>Choice – The consumer has a right to make informed choices, to understand their options, and to
                            be supported to be independent, including the involvement and access to external supports and
                            services that provide care to the consumer. This involves respecting the consumer's views and
                            aspirations and communicating with them and third parties where appropriate and in line with
                            best practice and legislation. This also involves the organisation creating alternative options
                            where the organisation cannot provide the appropriate level of care and support.</li>
                        <li>Dignity of risk – Together, the organisation and consumer seek solutions that are tailored to
                            each individual and aim for the least restriction on consumer choice where possible. This
                            includes a balanced approach to managing risk and respecting consumer rights and choice.</li>
                        <li>Information – The organisation will provide consumers with timely information in a way that they
                            understand so they can make an informed choice and get the most out of their care and services.
                            The organisation will address barriers to engagement and communication by taking into
                            consideration each consumer's unique needs and abilities.</li>
                        <li>Personal privacy – A key part of treating a consumer with dignity and respect is making sure
                            their privacy is respected. The organisation will ensure that the workforce's behaviour and
                            interactions protect the consumer's privacy. Organisations will respect each consumer's right to
                            privacy in how they collect, use and communicate the consumer's personal information and manage
                            this according to relevant law and best practice guidance.</li>
                    </ul>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Key Terms -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Key Terms</h2>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-[#132b4e] text-white">
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide w-44">Term</th>
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide">Meaning</th>
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide w-48">Source</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700">
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-[#132b4e] align-top">Consumer</td>
                                    <td class="px-6 py-4 leading-relaxed align-top">
                                        <ul class="list-disc list-inside space-y-1 marker:text-[#132b4e]">
                                            <li>A person to whom an approved provider provides, or is to provide, care through an aged care service.</li>
                                            <li>A reference to a consumer in a provision of the Aged Care Quality Standards set out in Schedule 2 includes a reference to a representative of the consumer, so far as the provision is capable of applying to a representative of a consumer.</li>
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4 align-top">Quality of Care Principles 2014</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-6 py-4 font-medium text-[#132b4e] align-top">Person Centred Approach</td>
                                    <td class="px-6 py-4 leading-relaxed align-top">
                                        <ul class="list-disc list-inside space-y-1 marker:text-[#132b4e]">
                                            <li>Supports the person, at the 'centre of the service', to be involved in making decisions about their life.</li>
                                            <li>Takes into account each person's life experience, age, gender, culture, heritage, language, beliefs and identity.</li>
                                            <li>Requires flexible services and support to suit the person's wishes and priorities.</li>
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4 align-top">NSW Department of Health</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-[#132b4e] align-top">Choice</td>
                                    <td class="px-6 py-4 leading-relaxed align-top">
                                        A person's right to make informed choices, to understand their options, and to be as independent as they want.
                                    </td>
                                    <td class="px-6 py-4 align-top">Aged Care Quality Standards – Standard 1, Consumer dignity and choice</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-6 py-4 font-medium text-[#132b4e] align-top">Dignity of Risk</td>
                                    <td class="px-6 py-4 leading-relaxed align-top">
                                        Dignity of risk is about the right of consumers to make their own decisions about their care and services, as well as their right to take risks, with support of the organisation.
                                    </td>
                                    <td class="px-6 py-4 align-top">Aged Care Quality and Safety Commission</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <p class="mb-6">&nbsp;</p>

                <!-- Links -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Links to other Policies and Documents</h2>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-[#132b4e]">
                        <li>Confidentiality Policy and Procedures</li>
                        <li>Complaints and Appeals Policy and Procedures</li>
                        <li>Communications Policy and Procedures</li>
                        <li>Privacy Policy and Procedures</li>
                        <li>Duty of Care Policy and Procedures</li>
                        <li>Staff Health and Wellbeing Policy and Procedures</li>
                    </ul>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Induction -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Induction and Ongoing Training</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        Lia College requires that induction and ongoing training of all staff include the Choice and
                        Independence Policy to enable staff to fulfil their roles effectively. In addition, Lia College
                        promotes ongoing commitment to understanding and applying the principles of the Choice and
                        Independence Policy and Procedure within workforce capacity, building resources, forums and
                        activities, including (but not limited to) meetings, industry policy and legislative changes, and in
                        line with Lia College's governance frameworks.
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
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide">Policy Created/Reviewed</th>
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide">Modifications</th>
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide">Next Review Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700">
                                <tr class="bg-white">
                                    <td class="px-6 py-4 align-top">Implemented March 2022</td>
                                    <td class="px-6 py-4 align-top"></td>
                                    <td class="px-6 py-4 align-top">December 2022</td>
                                </tr>
                                <tr class="bg-slate-50">
                                    <td class="px-6 py-4 align-top">&nbsp;</td>
                                    <td class="px-6 py-4 align-top">&nbsp;</td>
                                    <td class="px-6 py-4 align-top">&nbsp;</td>
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
                        This policy will be reviewed annually or on the occurrence of any relevant legislative Management of
                        Lia College will conduct reviews in consultation with educators at staff meetings.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-base mt-4">Choice and Independence Procedure</p>
                    <ul class="list-disc list-inside space-y-3 text-slate-700 leading-relaxed marker:text-[#132b4e] mt-4">
                        <li>Lia College Staff will ensure the following:</li>
                        <li>Utilise appropriate communication tools, mechanisms and resources to listen to the aspirations
                            of the consumer and other representatives (with consumer's consent) involved in their life and
                            centre these views in any planning and provision of care services. Staff will communicate
                            regularly with the consumer to ensure their choice and views are current and accurate. This will
                            be reflected in practice and record management, including communication about what action is
                            required if staff are aware a consumer's dignity isn't being upheld.</li>
                        <li>Proactively partner and engage with other relevant service providers (with consumer's consent)
                            and representatives to explore alternative options in line with the consumer's choice if the
                            organisation cannot meet the consumer's needs. Staff are also encouraged to think innovatively
                            in collaboration with others about what solutions could be sourced.</li>
                        <li>Be provided with ongoing education and training about respecting and promoting diversity,
                            including differences in culture, beliefs, relationships and sexuality. This is to be reflected
                            and recorded in key organisational frameworks and processes, including orientation, professional
                            training and organisational strategic documents.</li>
                        <li>Provide information and guidance to the consumer to broaden their options in line with their
                            aspirations and specific to their tailored needs. Make all attempts to reduce any barriers to
                            accessing information, including engagement of external resources and services.</li>
                        <li>Ensure staff have the appropriate skills and level of understanding about what choice and
                            independence are for a consumer and why it leads to the best possible care and quality of life.
                            Training and extra support will be provided where there are emerging skill gaps or new
                            legislative requirements for staff, and this will be reviewed annually.</li>
                        <li>Record, monitor and review tools and processes annually to ensure continuous improvement of
                            service provision in relation to consumer choice and independence.</li>
                        <li>Lia College's Privacy and Policy Procedure will govern the collection, storage and exchange of
                            consumer information with the consumer, representatives and service providers.</li>
                    </ul>
                </section>

            </div>
        </div>
    </div>
</div>

@endsection
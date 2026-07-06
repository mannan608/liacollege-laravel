@extends('frontend.pages.student.layout.app')

@section('content')
    <div>
        <div class="tail-container mx-auto px-6 bg-white shadow-xl rounded-2xl overflow-hidden">
        
        <!-- Back Button -->
        <div class="py-6 border-b">
            <a href="#" 
               class="inline-flex items-center gap-2 px-6 py-3 bg-brand-500 hover:bg-teal-700 text-white font-medium rounded-lg transition-colors text-sm">
                ← Back to Dashboard
            </a>
        </div>

        <div class="p-8">
            <!-- Main Title -->
            <h1 class="text-4xl font-bold text-brand-500 text-center leading-tight mb-2">
                Individualised Plans Policy and Procedure
            </h1>
            <h1 class="text-3xl font-semibold text-brand-500 text-center mb-10">
                (AP4)
            </h1>

            <!-- Policy Statement -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Policy Statement
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    The purpose of the Individualised Plans Policy is to ensure that Banksia Care works in partnership with consumers to plan their care and services appropriately. The planned care and services should meet each consumer’s needs, goals and preferences and optimise their health and wellbeing. This policy aligns with the Australian Government Aged Care Quality and Safety Commission standards.
                </p>
            </div>

            <!-- Scope -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Scope
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    This policy applies to Banksia Care consumers, representatives of consumers, external service providers, Banksia Care board members, staff, management and medical professionals.
                </p>
            </div>

            <!-- Background -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Background
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Banksia Care embeds a person-centred care approach to service delivery. This requires prioritising the consumer’s aspirations and strengths within the context of their capacity. It enables the planning of care and services to align with individualised needs whilst providing opportunities for consumer self-agency, participation and growth. Consistent review of care and services also ensures changes and development in consumer health or abilities are identified in a timely manner with appropriate responses actioned to minimise the impact of any loss of ability and to support consumers to live their day-to-day lives with dignity and choice. Involving consumers in the planning process and decision-making will assist consumers in making informed decisions about their options, including how much they want to be involved and consideration of their capacity.
                </p>
            </div>

            <!-- Legislative Requirements -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Legislative Requirements
                </h2>
                <ul class="list-disc pl-8 space-y-2 text-gray-700">
                    <li>Aged Care Act 1997 (Cth) User Rights Amendment (Charter of Aged Care Rights) Principles 2019</li>
                    <li>Privacy Act 1988 (Cth), Schedule 1, Australian Privacy Principles</li>
                    <li>Aged Care Quality Standards – Standard 1, Consumer dignity and choice, Standard 2 – Ongoing Assessment and planning with consumers</li>
                    <li>Quality of Care Principles 2014</li>
                    <li>Privacy Act 1988</li>
                    <li>State and Territory mental health, guardianship and administration, enduring power of attorney and medical directive/advance care planning legislation</li>
                    <li>National Disability Service Standards</li>
                    <li>NDIS Practice Standards</li>
                    <li>UN Convention on the Rights of Persons with Disabilities</li>
                </ul>
            </div>

            <!-- Principles -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Principles that Inform our Policy
                </h2>
                <p class="text-gray-700 leading-relaxed mb-8">
                    All decision-making about our Individualised Plans Procedure is conducted in accordance with the principles of our Individualised Plans Policy.
                </p>

                <h3 class="text-xl font-semibold text-[#da591f] mb-6">In Relation to Consumer Needs</h3>
                <ul class="space-y-4 text-gray-700 pl-2">
                    <li class="flex gap-3"><span class="text-[#da591f] font-bold mt-1">•</span> Banksia Care has a culture of inclusion and respect for consumers.</li>
                    <li class="flex gap-3"><span class="text-[#da591f] font-bold mt-1">•</span> Banksia Care supports consumers to exercise choice and independence and actively partners with the consumer to inform ongoing care assessment and planning.</li>
                    <li class="flex gap-3"><span class="text-[#da591f] font-bold mt-1">•</span> Banksia Care will carry out an ongoing assessment and planning with the consumer, their representatives and others who the consumer wants to be involved in their care and services assessment and planning.</li>
                    <li class="flex gap-3"><span class="text-[#da591f] font-bold mt-1">•</span> Consistent and ongoing sharing of information, asking for feedback from the consumer, and supporting and encouraging consumers to take part in assessing and planning their own care and services are paramount and aligned with a person-centred practice approach.</li>
                    <li class="flex gap-3"><span class="text-[#da591f] font-bold mt-1">•</span> A person-centred approach recognises that making decisions about their own life, and having those decisions respected, is an essential right of each consumer. It improves their health and wellbeing and demonstrates the organisation’s values to the consumer.</li>
                    <li class="flex gap-3"><span class="text-[#da591f] font-bold mt-1">•</span> The consumer may choose to have a relative, partner, or friend as a representative involved in decisions about their care. Where a consumer cannot make decisions, they may have a court or tribunal-appointed guardian to make decisions on their behalf.</li>
                    <li class="flex gap-3"><span class="text-[#da591f] font-bold mt-1">•</span> Assessment and planning are also expected to include other organisations, individuals or service providers involved in caring for consumers. Banksia Care will ensure an effective communication framework is in place with other service providers and relevant other parties such as unpaid carers, family and friends. Collaborative assessment and planning (if the consumer wishes) can help Banksia Care improve its knowledge and sensitivity related to the consumer’s needs, goals and preferences and improve continuity of care and services for the consumer.</li>
                    <li class="flex gap-3"><span class="text-[#da591f] font-bold mt-1">•</span> Banksia Care respects consumer privacy and will comply with obligations relating to the privacy of information when coordinating care and information exchange with other organisations, individuals or service providers.</li>
                </ul>
            </div>

            <!-- Key Terms -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Key Terms
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300 text-left">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-6 py-4 border-b border-gray-300 font-semibold text-brand-500 w-1/4">Term</th>
                                <th class="px-6 py-4 border-b border-gray-300 font-semibold text-brand-500">Meaning</th>
                                <th class="px-6 py-4 border-b border-gray-300 font-semibold text-brand-500 w-1/5">Source</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-5 font-medium align-top">Consumer</td>
                                <td class="px-6 py-5 text-gray-700 align-top">
                                    A person to whom an approved provider provides, or is to provide, care through an aged care service.<br><br>
                                    A reference to a consumer in a provision of the Aged Care Quality Standards set out in Schedule 2 includes a reference to a representative of the consumer, so far as the provision is capable of applying to a representative of a consumer.
                                </td>
                                <td class="px-6 py-5 text-gray-600 align-top">Quality of Care Principles 2014</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5 font-medium align-top">Representative</td>
                                <td class="px-6 py-5 text-gray-700 align-top">
                                    A person nominated by the consumer as a person to be told about matters affecting the consumer; or<br><br>
                                    A person:<br>
                                    • who nominates themselves as a person to be told about matters affecting a consumer; and<br>
                                    • who the relevant organisation is satisfied has a connection with the consumer and is concerned for the safety, health and wellbeing of the consumer.
                                </td>
                                <td class="px-6 py-5 text-gray-600 align-top">Quality of Care Principles 2014</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5 font-medium align-top">Person Centred Approach</td>
                                <td class="px-6 py-5 text-gray-700 align-top">
                                    Supports the person, at the ‘centre of the service’, to be involved in making decisions about their life.<br><br>
                                    Considers each person’s life experience, age, gender, culture, heritage, language, beliefs and identity.<br><br>
                                    Requires flexible services and support to suit the person’s wishes and priorities
                                </td>
                                <td class="px-6 py-5 text-gray-600 align-top">NSW Department of Health</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5 font-medium align-top">Individualised Plan</td>
                                <td class="px-6 py-5 text-gray-700 align-top">
                                    Outlines your care needs, the types of services you will receive to meet those needs, who will provide the services and when. It will be developed by your service provider in consultation with you.
                                </td>
                                <td class="px-6 py-5 text-gray-600 align-top">Aged Care Guide</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Links to other Policies -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Links to other Policies and Documents
                </h2>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 text-gray-700">
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Reporting and Recording Behaviour Policy and Procedures</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Duty of Care Policy and Procedures</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Management of Care and Service Policy and Procedures</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Staff Health and Wellbeing Policy and Procedures</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Confidentiality Policy and Procedures</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Complaints and Appeals Policy and Procedures</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Communications Policy and Procedures</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Privacy Policy and Procedures</li>
                </ul>
            </div>

            <!-- Induction and Training -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Induction and Ongoing Training
                </h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Banksia Care requires that induction and ongoing training of all staff include the Individualised Plans Policy to enable staff to fulfil their roles effectively.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Banksia Care promotes information sharing at staff meetings, sharing of information received from industry trends or changes in legislation, and in consultation at policy review sessions.
                </p>
            </div>

            <!-- Policy Created/Reviewed -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Policy Created/Reviewed
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-6 py-4 border-b border-gray-300 text-left font-semibold text-brand-500">Policy Created / Reviewed</th>
                                <th class="px-6 py-4 border-b border-gray-300 text-left font-semibold text-brand-500">Modifications</th>
                                <th class="px-6 py-4 border-b border-gray-300 text-left font-semibold text-brand-500">Next Review Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-5 border-b">Implemented December 2022</td>
                                <td class="px-6 py-5 border-b"></td>
                                <td class="px-6 py-5 border-b">May 2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Monitoring -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Monitoring, Evaluation and Review
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    This policy will be reviewed every three years or on the occurrence of any relevant legislative change. Management of Banksia Care will conduct reviews in consultation with the team at staff meetings.
                </p>
            </div>

            <!-- Individualised Plans Procedure -->
            <div>
                <h2 class="text-3xl font-bold text-brand-500 mb-10 text-center border-b-2 border-[#da591f] pb-6">
                    Individualised Plans Procedure
                </h2>

                <!-- Prior to Service Entry -->
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                        <span class="w-6 h-px bg-[#da591f]"></span>
                        Prior to Service Entry
                    </h3>
                    <ul class="space-y-4 text-gray-700 pl-6 list-disc">
                        <li>Consultation will take place with the person and their family, advocate, guardian and/or others as appropriate, about the various perceptions of the person’s needs and issues which may impact the delivery of services.</li>
                        <li>Communication and support needs of the individual who will be receiving services from Banksia Care will be addressed to maximise their participation in the planning process.</li>
                        <li>Staff responsible for the individualised plan will take the time to get to know the person (and family) and facilitate opportunities to express aspirations, preferences, and choices. All information provided to people will be in a format they can understand.</li>
                    </ul>
                </div>

                <!-- On entry to the Service -->
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                        <span class="w-6 h-px bg-[#da591f]"></span>
                        On entry to the Service
                    </h3>
                    <ul class="space-y-4 text-gray-700 pl-6 list-disc">
                        <li>An initial Individualised Plan will be developed reflecting the needs and aspirations of the person and/or family and the support required to meet those needs.</li>
                        <li>One or more planning meetings will be coordinated to develop the plan. Meetings will be at times and venues convenient to everyone involved to maximise the participation of key people.</li>
                        <li>The individualised plan may be informed by other people who know the person, but it must be person-centred and reflect the decisions and choices of the individual service user first and foremost.</li>
                    </ul>
                </div>

                <!-- Content of the Plan -->
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                        <span class="w-6 h-px bg-[#da591f]"></span>
                        Content of the Plan
                    </h3>
                    <ul class="space-y-6 text-gray-700">
                        <li>
                            The individualised plan will include goals (and support required) for each of the following:
                            <ul class="list-disc pl-8 mt-3 space-y-1">
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
                        <li>Individualised plans may include support to be provided by family, social networks and/or other services.</li>
                        <li>Some goals will be clearly defined, while others may be vague or exploratory. Goals must be realistic.</li>
                        <li>The individualised plan will set clearly defined measurable and achievable targets within the time given frames.</li>
                        <li>Once agreed, a copy of the plan will be made available to the person/family in a format they can understand (and may also be provided to family members and guardians/administrators where appropriate and with the consent of the person if an adult).</li>
                    </ul>
                </div>

                <!-- Monitoring and Reviewing -->
                <div>
                    <h3 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                        <span class="w-6 h-px bg-[#da591f]"></span>
                        Monitoring and Reviewing the Plan
                    </h3>
                    <ul class="space-y-4 text-gray-700 pl-6 list-disc">
                        <li>The individualised plan is a living document that can be modified or reviewed when required.</li>
                        <li>After the first three months of service delivery, the initial plan will be reviewed.</li>
                        <li>At a minimum, the individualised plan will be reviewed and redeveloped every 12 months (a more frequent schedule may be appropriate for children and young adults).</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

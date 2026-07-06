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
                Consumer Needs Policy and Procedure
            </h1>
            <h1 class="text-3xl font-semibold text-brand-500 text-center mb-10">
                (AP2)
            </h1>

            <!-- Policy Statement -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Policy Statement
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    The purpose of the Consumer Needs Policy and Procedure is designed to ensure that Banksia Care works in partnership with consumers to appropriately plan their care and services. The planned care and services should meet each consumer’s individual needs, goals and preferences and optimise their health and well-being.
                </p>
            </div>

            <!-- Scope -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Scope
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    This policy applies to Banksia Care consumers, representatives of consumers, external service providers, Banksia Care board members, staff and management and medical professionals.
                </p>
            </div>

            <!-- Background -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Background
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Banksia Care embeds a person-centred care approach to service delivery. This requires prioritising the consumer’s aspirations and strengths within the context of their capacity. This enables the planning of care and services to align with individualised needs whilst providing opportunities for consumer self-agency, participation and growth. Consistent review of care and services also ensures changes and development in consumer health or abilities are identified in a timely manner with appropriate responses actioned to minimise the impact of any loss of ability, and to support consumers to live their day-to-day lives with dignity and choice. Involving consumers in the planning process and decision-making will assist consumers in making informed decisions about their options, including how much they want to be involved and consideration of their capacity.
                </p>
            </div>

            <!-- Legislative Requirements -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Legislative Requirements
                </h2>
                <ul class="list-disc pl-8 space-y-2 text-gray-700">
                    <li>Aged Care Act 1997 (Cth), User Rights Amendment (Charter of Aged Care Rights) Principles 2019</li>
                    <li>Privacy Act 1988 (Cth), Schedule 1, Australian Privacy Principles</li>
                    <li>Aged Care Quality Standards – Standard 1, Consumer dignity and choice, Standard 2 – Ongoing Assessment and planning with consumers</li>
                    <li>Quality of Care Principles 2014</li>
                    <li>Privacy Act 1988</li>
                    <li>Disability Services Act (National Standards for Disability Services) Determination 2014</li>
                    <li>State and Territory mental health, guardianship and administration, enduring power of attorney and medical directive/advance care planning legislation</li>
                </ul>
            </div>

            <!-- Principles -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Principles that Inform our Policy
                </h2>
                <p class="text-gray-700 leading-relaxed mb-8 italic">
                    All decision-making about our <em>Consumer Needs Procedure</em> is carried out in accordance with the principles of our <em>Consumer Needs Policy</em>.
                </p>

                <h3 class="text-xl font-semibold text-sub[#da591f] mb-6">Consumer Needs Principles</h3>
                <div class="space-y-6 text-gray-700">
                    <p>Banksia Care has a culture of inclusion and respect for consumers.</p>
                    <p>Banksia Care supports consumers to exercise choice and independence and actively partners with the consumer to inform ongoing care assessment and planning.</p>
                    <p>Banksia Care will carry out an ongoing assessment and planning with the consumer, their representatives and others who the consumer wants to be involved in their care and services assessment and planning.</p>
                    <p>Consistent and ongoing sharing of information, asking for feedback from the consumer, and supporting and encouraging consumers to take part in assessing and planning their own care and services are paramount and aligned with a person-centred practice approach.</p>
                    <p>A person-centred approach recognises that making decisions about their own life, and having those decisions respected, is an essential right of each consumer. It improves their health and well-being and demonstrates the organisation’s values to the consumer.</p>
                    <p>The consumer may choose to have a relative, partner, or friend as a representative involved in decisions about their care. Where a consumer lacks the capacity to make decisions, they may have a court or tribunal-appointed guardian to make decisions on their behalf.</p>
                    <p>Assessment and planning are also expected to include other organisations, individuals or service providers involved in caring for consumers. Banksia Care will ensure an effective communication framework is in place with other service providers and relevant other parties such as unpaid carers, family and friends. Collaborative assessment and planning (if the consumer wishes) can help Banksia Care improve its knowledge and sensitivity related to the consumer’s needs, goals and preferences and improve continuity of care and services for the consumer.</p>
                    <p>Banksia Care respects consumer privacy and will comply with obligations relating to privacy of information when coordinating care and information exchange with other organisations, individuals or service providers.</p>
                </div>
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
                                    a) A person to whom an approved provider provides, or is to provide, care through an aged care service.<br><br>
                                    b) A reference to a consumer in a provision of the Aged Care Quality Standards set out in Schedule 2 includes a reference to a representative of the consumer, so far as the provision is capable of applying to a representative of a consumer.
                                </td>
                                <td class="px-6 py-5 text-gray-600 align-top">Quality of Care Principles 2014</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5 font-medium align-top">Representative</td>
                                <td class="px-6 py-5 text-gray-700 align-top">
                                    a) A person nominated by the consumer as a person to be told about matters affecting the consumer; or<br><br>
                                    b) A person:<br>
                                    i. who nominates themselves as a person to be told about matters affecting a consumer; and<br>
                                    ii. who the relevant organisation is satisfied has a connection with the consumer and is concerned for the safety, health and well being of the consumer.
                                </td>
                                <td class="px-6 py-5 text-gray-600 align-top">Quality of Care Principles 2014</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5 font-medium align-top">Person Centred Approach</td>
                                <td class="px-6 py-5 text-gray-700 align-top">
                                    a) Supports the person, at the ‘centre of the service’, to be involved in making decisions about their life.<br><br>
                                    b) Takes into account each person’s life experience, age, gender, culture, heritage, language, beliefs and identity.<br><br>
                                    c) Requires flexible services and support to suit the person’s wishes and priorities.
                                </td>
                                <td class="px-6 py-5 text-gray-600 align-top">NSW Department of Health</td>
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
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Duty of Care Policy and Procedures</li>
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
                <p class="text-gray-700 leading-relaxed">
                    Banksia Care requires that induction and ongoing training of all staff include the Consumer Needs Policy to enable staff to fulfil their roles effectively. In addition, Banksia care promotes ongoing commitment to understanding and applying the principles of the consumer needs policy and procedure within workforce capacity building resources, forums and activities including (but not limited to) meetings, industry policy and legislative changes, and in line with Banksia Care’s governance frameworks.
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
                                <td class="px-6 py-5 border-b">Implemented September 2022</td>
                                <td class="px-6 py-5 border-b"></td>
                                <td class="px-6 py-5 border-b">February 2023</td>
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
                    This policy will be reviewed annually or on the occurrence of any relevant legislative change. Management of Banksia Care will conduct reviews in consultation with educators at staff meetings.
                </p>
            </div>

            <!-- Procedure -->
            <div>
                <h2 class="text-3xl font-bold text-brand-500 mb-10 text-center border-b-2 border-[#da591f] pb-6">
                    Consumer Needs Procedure
                </h2>

                <p class="text-gray-700 mb-8">
                    Medical or Nurse Practitioners, Home Support Assessors (from the My Aged Care Regional Assessment Service), Comprehensive Assessors (from Aged Care Assessment Teams) or NDIS Support Coordinators will:
                </p>
                
                <ul class="space-y-6 mb-12 pl-6 text-gray-700 list-disc">
                    <li>Utilise appropriate coordination tools and resources to involve the consumer and other representatives (with consumer’s consent) in the assessment, planning and review of their care and services. Consumers are provided with their individualised plan and can describe how it helps them meet their goals.</li>
                    <li>Proactively partner and engage other relevant service providers (with consumer’s consent) and representatives to contribute to the assessment and planning process and understand their role within the plan, including who to contact in different situations.</li>
                    <li>Be provided with education and training about what a care plan entails and the purpose of partnering with consumers, service providers and representatives to assess, plan and review care and services. Where the organisation cannot meet care goals, staff are encouraged to think innovatively in collaboration with others about what solutions could be sourced.</li>
                    <li>Provide information and guidance to the consumer and support them to participate in assessing and planning their care and services. This should include information and resources made available in appropriate formats and language translations to reduce consumer access barriers to participation.</li>
                </ul>

                <p class="text-gray-700 mb-6 font-medium">Management will:</p>
                <ul class="space-y-6 pl-6 text-gray-700 list-disc">
                    <li>Ensure staff assigned to assessing consumer needs have the appropriate skills and qualifications to manage complexity in assessing and planning care and services being undertaken.</li>
                    <li>Source and provide training and extra support where there are emerging skill gaps or new legislative requirements for staff, and this will be reviewed annually.</li>
                    <li>Record, monitor and review care assessment and planning tools and processes annually to ensure continuous improvement of service provision.</li>
                    <li>Ensure Banksia Care’s Privacy Policy and Procedure is followed by staff in their understanding that it governs the collection, storage and exchange of consumer information with the consumer, representatives and service providers.</li>
                </ul>
            </div>
        </div>
    </div>
    </div>
@endsection

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
                Management of Falls Policy and Procedure
            </h1>
            <h1 class="text-3xl font-semibold text-brand-500 text-center mb-10">
                (AP5)
            </h1>

            <!-- Policy Statement -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Policy Statement
                </h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    At Banksia Care, we aim to create a safe environment for clients.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    The Management of Falls Policy aims to prevent falls by assessing client risk factors, implementing proactive systems of support to reduce the risk of falls, creating clear guidelines for responding to falls, and ensuring quality care following a fall.
                </p>
            </div>

            <!-- Scope -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Scope
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    This policy applies to staff, management, contractors and volunteers of Banksia Care.
                </p>
            </div>

            <!-- Background -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Background
                </h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    In the past year, 1 in 3 elderly people in Australia experienced a fall, with 1 in 5 requiring hospitalisation. Falls can seriously impact a person’s health, mental wellbeing and confidence. Falls can cause Psychomotor Regression Syndrome, a complex set of neurological, physiological and psychological changes that may affect the person’s behaviour, balance, gait, psychological state and muscle control, among other factors.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Due to the serious health ramifications associated with falls, Banksia Care adopts a proactive falls prevention and harm minimisation strategy.
                </p>
            </div>

            <!-- Legislative Requirements -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Legislative Requirements
                </h2>
                <ul class="list-disc pl-8 space-y-2 text-gray-700">
                    <li>National Disability Insurance Scheme (Restrictive Practices and Behaviour Support) Rules 2018</li>
                    <li>National Disability Insurance Scheme Act 2013</li>
                    <li>Work Health and Safety Act 2011</li>
                    <li>Work Health and Safety Regulations 2011</li>
                    <li>Aged Care Quality and Safety Commission Act 2018</li>
                    <li>Aged Care Quality and Safety Commission Rules 2018 (Rules)</li>
                    <li>Aged Care Act 1997</li>
                    <li>Australian Human Rights Commission Act 1986</li>
                </ul>
            </div>

            <!-- Principles -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Principles that Inform our Policy
                </h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    All decision-making about our Management of Falls Procedure is conducted in accordance with the principles of our Management of Falls Policy.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    At Banksia Care, we uphold and protect the rights and dignity of clients in our care. We are committed to providing quality care that upholds clients’ rights and dignity while also supporting their safety and wellbeing.
                </p>
                <p class="text-gray-700 mb-4">The Falls Policy and Procedure reflect Banksia Care’s commitment to the following values:</p>
                <ul class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <li class="bg-teal-50 border border-teal-100 p-6 rounded-xl">
                        <strong class="block text-brand-500 mb-2">Protect</strong>
                        <span class="text-gray-600">the rights, choices and dignity of individuals.</span>
                    </li>
                    <li class="bg-teal-50 border border-teal-100 p-6 rounded-xl">
                        <strong class="block text-brand-500 mb-2">Compassion</strong>
                        <span class="text-gray-600">respond to needs, provide comfort and implement the highest standard of personal and clinical care.</span>
                    </li>
                    <li class="bg-teal-50 border border-teal-100 p-6 rounded-xl">
                        <strong class="block text-brand-500 mb-2">Hope</strong>
                        <span class="text-gray-600">enhance independence, promote enjoyment and provide help to ensure a rich and fulfilled life.</span>
                    </li>
                </ul>
                <p class="text-gray-700 leading-relaxed mt-8">
                    At Banksia Care, we embrace falls prevention as a strategy to empower our clients to live more independently and in better health for longer.
                </p>
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
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-5 font-medium">Falls Prevention</td>
                                <td class="px-6 py-5 text-gray-700">Falls prevention is a systematic approach to reducing the risk and severity of falls through assessment, interventions, assistive devices and procedures.</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5 font-medium">FRAT</td>
                                <td class="px-6 py-5 text-gray-700">FRAT stands for Falls Risk Assessment Tool, a standard tool used in the industry to assess a client’s risk of falls and to plan interventions and strategies to reduce risk.</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5 font-medium">Gait</td>
                                <td class="px-6 py-5 text-gray-700">Gait refers to the pattern and balance of a person’s steps when walking.</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5 font-medium">Intervention</td>
                                <td class="px-6 py-5 text-gray-700">An intervention is a therapeutic procedure or treatment strategy designed to support optimal health and wellbeing outcomes for the person.</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5 font-medium">Multifactorial</td>
                                <td class="px-6 py-5 text-gray-700">Multifactorial approaches combine allied health services, medical intervention, assistive devices, environmental adaptations, exercise, technology and human systems to create the best possible approach to supporting the person.</td>
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
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Duty of Care Policy and Procedure</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Code of Conduct Policy and Procedure</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Management of Care and Service Policy and Procedure</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Safety and Risk Management Policy and Procedure</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Individualised Plans Policy and Procedure</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Incident, Injury, Trauma and Illness Policy and Procedure</li>
                </ul>
            </div>

            <!-- Induction and Training -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Induction and Ongoing Training
                </h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Banksia Care requires that induction and ongoing training of all staff include the Management of Falls Policy to enable staff to fulfil their roles effectively.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Banksia Care promotes information sharing at staff meetings, sharing of information received from industry trends or changes in legislation, and in consultation at policy review sessions.
                </p>
                <p class="text-gray-700">All staff must complete FRAT training upon commencement of employment at Banksia Care.</p>
                <p class="text-gray-700">All staff must receive Falls First Responder training upon commencement of employment at Banksia Care.</p>
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
                                <th class="px-6 py-4 border-b border-gray-300 text-left font-semibold text-brand-500">Policy Created/Reviewed</th>
                                <th class="px-6 py-4 border-b border-gray-300 text-left font-semibold text-brand-500">Modifications</th>
                                <th class="px-6 py-4 border-b border-gray-300 text-left font-semibold text-brand-500">Next Review Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-5 border-b">Implemented December 2022</td>
                                <td class="px-6 py-5 border-b"></td>
                                <td class="px-6 py-5 border-b">December 2023</td>
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

            <!-- Management of Falls Procedure -->
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-brand-500 mb-10 text-center border-b-2 border-[#da591f] pb-6">
                    Management of Falls Procedure
                </h2>

                <!-- Initial Assessment -->
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold text-sub[#da591f] mb-6 flex items-center gap-3">
                        <span class="w-6 h-px bg-sub[#da591f]"></span>
                        Initial Assessment
                    </h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Upon initial intake, every client will be assessed using the Falls Risk Assessment Tool to provide a comprehensive and multifactorial falls risk assessment.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        This will be reviewed annually and after any fall or change in the resident’s health status.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        The Falls Risk Assessment includes an assessment of the client’s gait, balance, posture, mobility, muscle and joint strength and function, continence, falls history, psychological state, physiological health and medications. Even when the client’s risk of falls is assessed as low, preventative risk control action must be taken.
                    </p>
                    
                    <div class="bg-amber-50 border border-amber-100 rounded-2xl p-6 mb-6">
                        <p class="text-gray-700 mb-4"><strong>The FRAT may be conducted by Banksia Care nursing or support workers.</strong></p>
                        <p class="text-gray-700">Upon completion, the FRAT must be lodged and securely stored in the Banksia Care client Information Management System (IMS). The FRAT must be updated at the following times:</p>
                        <ul class="list-disc pl-8 space-y-1 mt-3 text-gray-700">
                            <li>after a fall</li>
                            <li>after any change in the client’s health</li>
                            <li>after any change in the client’s medication regime, and</li>
                            <li>the FRAT must be completely reviewed annually.</li>
                        </ul>
                    </div>

                    <p class="text-gray-700 leading-relaxed mb-4">
                        A multidisciplinary team will review each client’s FRAT on submission. This team will include, at a minimum, the Care Coordinator, the Nurse, the client’s GP and a support worker. Where necessary, other allied health professionals will participate in the FRAT review. This team will determine a system of risk reductions, including:
                    </p>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-gray-700 pl-4">
                        <li class="flex items-start gap-2"><span class="text-sub[#da591f]">•</span> environmental modifications</li>
                        <li class="flex items-start gap-2"><span class="text-sub[#da591f]">•</span> assistive devices</li>
                        <li class="flex items-start gap-2"><span class="text-sub[#da591f]">•</span> Allied Health interventions, such as physiotherapy</li>
                        <li class="flex items-start gap-2"><span class="text-sub[#da591f]">•</span> changes to the timing, type or dosage of medication if the medication has a proven increased risk effect (must be authorised by GP)</li>
                        <li class="flex items-start gap-2"><span class="text-sub[#da591f]">•</span> human systems such as the timing or location of meals, bathing, toileting, frequency of changes of incontinence pads and daily exercise routines.</li>
                    </ul>
                </div>

                <!-- Post Falls Procedure -->
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold text-sub[#da591f] mb-6 flex items-center gap-3">
                        <span class="w-6 h-px bg-sub[#da591f]"></span>
                        Post Falls Procedure
                    </h3>
                    <div class="bg-red-50 border border-red-100 rounded-2xl p-8">
                        <p class="font-medium text-gray-800 mb-6">In the event that a client experiences a fall, the following procedure will be followed by any staff member or volunteer nearby at the time.</p>
                        <ul class="space-y-5 text-gray-700">
                            <li class="flex gap-4"><span class="font-bold text-red-600">1.</span> IMMEDIATELY call the shift supervisor. The supervisor will notify the Banksia Care Nurse and call an ambulance.</li>
                            <li class="flex gap-4"><span class="font-bold text-red-600">2.</span> First responders WILL NOT ATTEMPT TO MOVE OR TREAT THE CLIENT unless they are a qualified medical practitioner, such as a Registered Nurse, Ambulance Officer or GP.</li>
                            <li class="flex gap-4"><span class="font-bold text-red-600">3.</span> First responders will stay with the client, talking with them and reassuring them, even if they appear unconscious.</li>
                            <li class="flex gap-4"><span class="font-bold text-red-600">4.</span> Qualified medical personnel attending the fall will perform a physical assessment of the resident at the time of the fall, including vital signs (which may include orthostatic blood pressure readings) and an evaluation of head, neck, spine and/or extremity injuries. Vital signs should be repeated every hour for the first four hours after the fall. Vital signs should then be monitored every four hours for the first 24 hours after the fall.</li>
                            <li class="flex gap-4"><span class="font-bold text-red-600">5.</span> Neurological observations (Glasgow Coma Scale (GCS)) must be commenced if there are any signs of changes in the consciousness of the person after the fall or if the person experiences headaches or vomiting.</li>
                            <li class="flex gap-4"><span class="font-bold text-red-600">6.</span> The first staff member at the scene will write a detailed report documenting the fall, the location, the time of day and what was occurring at the time of the fall using a Banksia Care Incident, Injury, Trauma and Illness Record. This must be submitted to the shift supervisor within 12 hours of the fall occurring.</li>
                            <li class="flex gap-4"><span class="font-bold text-red-600">7.</span> The Incident, Injury, Trauma and Illness Record is an important legal document and must be completed factually and in detail. Within 12 hours after the fall, the Incident, Injury, Trauma and Illness Record must be lodged and securely stored in the Banksia Care client Information Management System (IMS).</li>
                            <li class="flex gap-4"><span class="font-bold text-red-600">8.</span> After the fall, within 48 hours, the client’s FRAT must be updated, and a revised multifactorial risk assessment for the client must be completed.</li>
                            <li class="flex gap-4"><span class="font-bold text-red-600">9.</span> A multidisciplinary care team, including a nurse, support worker, the client’s GP and relevant Allied Health professionals, will design and implement a Post Fall Care Plan to ensure optimal recovery of the client’s physiological and psychological wellbeing and confidence after the fall.</li>
                        </ul>
                    </div>
                </div>

                <!-- Referral Procedure -->
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold text-sub[#da591f] mb-6 flex items-center gap-3">
                        <span class="w-6 h-px bg-sub[#da591f]"></span>
                        Referral Procedure
                    </h3>
                    <p class="text-gray-700 mb-6">
                        To refer a client to a health care professional, the support worker will make a recommendation to the shift supervisor or the Banksia Care nurse, Heather Brinkley.
                    </p>
                    
                    <div class="space-y-8">
                        <div>
                            <p class="font-semibold mb-3 text-gray-800">A client will be referred to a physiotherapist in the following circumstances:</p>
                            <ul class="list-disc pl-8 space-y-2 text-gray-700">
                                <li>If gait changes, balance issues or “sliding steps” are observed during a routine FRAT.</li>
                                <li>A client will automatically be referred to a physiotherapist as part of a Post Fall Plan.</li>
                                <li>If other mobility issues are observed by a staff member and verified by the Banksia Care nurse or shift supervisor.</li>
                            </ul>
                        </div>
                        
                        <div>
                            <p class="font-semibold mb-3 text-gray-800">A client will be referred to their GP:</p>
                            <ul class="list-disc pl-8 space-y-2 text-gray-700">
                                <li>Automatically after any fall</li>
                                <li>If they experience any of the following symptoms: numbness or tingling in the hands and feet, loss of balance, vertigo, blood pressure issues, unusual lack of sleep, any loss of consciousness.</li>
                            </ul>
                        </div>
                        
                        <div>
                            <p class="font-semibold mb-3 text-gray-800">A client will be referred to a psychologist if, after a fall, they experience any symptoms of depressive illness or anxiety lasting for more than one month after the fall.</p>
                        </div>
                    </div>
                </div>

                <!-- Rights and Responsibilities -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                    <div>
                        <h3 class="text-2xl font-semibold text-sub[#da591f] mb-6">Rights and Responsibilities of Managers</h3>
                        <p class="text-gray-700">
                            <strong>Frank Brookes (Care Coordinator)</strong> is responsible for managing the systematic implementation of all FRATs for each client, including managing the FRAT upon intake and the annual review cycle for each client.
                        </p>
                        <p class="mt-6 text-gray-700">
                            <strong>Heather Brinkley (Nurse)</strong> is responsible for coordinating post-fall responses for clients, including organising the multidisciplinary FRAT review and Post Fall Care Plan within 48 hours after a fall.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-sub[#da591f] mb-6">Rights and Responsibilities of Staff</h3>
                        <ul class="space-y-4 text-gray-700">
                            <li>All staff must complete FRAT training upon commencement of employment at Banksia Care.</li>
                            <li>Staff are responsible for understanding and correctly implementing each client’s FRAT.</li>
                            <li>Support workers, volunteers and all other staff are responsible for lodging an Incident, Injury, Trauma and Illness Record if they witness or are the first responder when a client falls.</li>
                        </ul>
                    </div>
                </div>

                <!-- Key Contacts -->
                <div>
                    <h3 class="text-2xl font-semibold text-sub[#da591f] mb-6 flex items-center gap-3">
                        <span class="w-6 h-px bg-sub[#da591f]"></span>
                        Key Contacts and External Organisations
                    </h3>
                    <p class="text-gray-700">
                        The Aged Care Quality and Safety Commission may be contacted concerning legislative requirements and in cases of serious breaches of this policy and procedure.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

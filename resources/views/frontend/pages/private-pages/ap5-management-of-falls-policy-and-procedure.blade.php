@extends('frontend.layouts.app')

@section('content')
<div class="bg-brand-50 min-h-screen py-8 md:py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('student.dashboard') }}"
                class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-full px-6 py-3 transition-colors duration-200 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        <!-- Main Content Card -->
        <article class="bg-white rounded overflow-hidden">
            <div class="p-8 md:p-12 lg:p-16">

                <header class="mb-10 border-b border-brand-100 pb-8">
                    <h1 class="text-4xl md:text-5xl font-extrabold text-brand-900 tracking-tight mb-2">
                        Management of Falls Policy and Procedure
                    </h1>
                    <p class="text-2xl font-bold text-secondary-500">(AP5)</p>
                </header>

                <div class="max-w-none">

                    <h2 class="text-2xl font-bold text-secondary-500 mt-10 mb-4 pb-2 border-b-2 border-amber-100">Policy Statement</h2>
                    <p class="text-brand-700 leading-relaxed mb-4">At Lia College, we aim to create a safe environment for clients.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">The Management of Falls Policy aims to prevent falls by assessing client risk factors, implementing proactive systems of support to reduce the risk of falls, creating clear guidelines for responding to falls, and ensuring quality care following a fall.</p>

                    <h2 class="text-2xl font-bold text-secondary-500 mt-10 mb-4 pb-2 border-b-2 border-amber-100">Scope</h2>
                    <p class="text-brand-700 leading-relaxed mb-4">This policy applies to staff, management, contractors and volunteers of Lia College.</p>

                    <h2 class="text-2xl font-bold text-secondary-500 mt-10 mb-4 pb-2 border-b-2 border-amber-100">Background</h2>
                    <p class="text-brand-700 leading-relaxed mb-4">In the past year, 1 in 3 elderly people in Australia experienced a fall, with 1 in 5 requiring hospitalisation. Falls can seriously impact a person’s health, mental wellbeing and confidence. Falls can cause Psychomotor Regression Syndrome, a complex set of neurological, physiological and psychological changes that may affect the person’s behaviour, balance, gait, psychological state and muscle control, among other factors.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">Due to the serious health ramifications associated with falls, Lia College adopts a proactive falls prevention and harm minimisation strategy.</p>

                    <h2 class="text-2xl font-bold text-secondary-500 mt-10 mb-4 pb-2 border-b-2 border-amber-100">Legislative Requirements</h2>
                    <ul class="list-disc pl-6 space-y-2 text-brand-700 mb-6">
                        <li>National Disability Insurance Scheme (Restrictive Practices and Behaviour Support) Rules 2018</li>
                        <li>National Disability Insurance Scheme Act 2013</li>
                        <li>Work Health and Safety Act 2011</li>
                        <li>Work Health and Safety Regulations 2011</li>
                        <li>Aged Care Quality and Safety Commission Act 2018</li>
                        <li>Aged Care Quality and Safety Commission Rules 2018 (Rules)</li>
                        <li>Aged Care Act 1997</li>
                        <li>Australian Human Rights Commission Act 1986</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-secondary-500 mt-10 mb-4 pb-2 border-b-2 border-amber-100">Principles that Inform our Policy</h2>
                    <p class="text-brand-700 leading-relaxed mb-4">All decision-making about our Management of Falls Procedure is conducted in accordance with the principles of our Management of Falls Policy.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">At Lia College, we uphold and protect the rights and dignity of clients in our care. We are committed to providing quality care that upholds clients’ rights and dignity while also supporting their safety and wellbeing.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">The Falls Policy and Procedure reflect Lia College’s commitment to the following values:</p>
                    <ul class="list-disc pl-6 space-y-2 text-brand-700 mb-6">
                        <li>Protect – the rights, choices and dignity of individuals.</li>
                        <li>Compassion – respond to needs, provide comfort and implement the highest standard of personal and clinical care.</li>
                        <li>Hope – enhance independence, promote enjoyment and provide help to ensure a rich and fulfilled life.</li>
                    </ul>
                    <p class="text-brand-700 leading-relaxed mb-4">At Lia College, we embrace falls prevention as a strategy to empower our clients to live more independently and in better health for longer.</p>

                    <h2 class="text-2xl font-bold text-secondary-500 mt-10 mb-4 pb-2 border-b-2 border-amber-100">Key Terms</h2>
                    <div class="overflow-x-auto mb-8 rounded-lg border border-brand-200 shadow-sm">
                        <table class="min-w-full divide-y divide-brand-200 text-sm">
                            <thead class="bg-brand-50">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-brand-500 uppercase tracking-wider w-1/4">Term</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-brand-500 uppercase tracking-wider">Meaning</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-brand-200">
                                <tr class="hover:bg-brand-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-brand-900">Falls Prevention</td>
                                    <td class="px-6 py-4 text-brand-700">Falls prevention is a systematic approach to reducing the risk and severity of falls through assessment, interventions, assistive devices and procedures.</td>
                                </tr>
                                <tr class="hover:bg-brand-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-brand-900">FRAT</td>
                                    <td class="px-6 py-4 text-brand-700">FRAT stands for Falls Risk Assessment Tool, a standard tool used in the industry to assess a client’s risk of falls and to plan interventions and strategies to reduce risk.</td>
                                </tr>
                                <tr class="hover:bg-brand-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-brand-900">Gait</td>
                                    <td class="px-6 py-4 text-brand-700">Gait refers to the pattern and balance of a person’s steps when walking.</td>
                                </tr>
                                <tr class="hover:bg-brand-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-brand-900">Intervention</td>
                                    <td class="px-6 py-4 text-brand-700">An intervention is a therapeutic procedure or treatment strategy designed to support optimal health and wellbeing outcomes for the person.</td>
                                </tr>
                                <tr class="hover:bg-brand-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-brand-900">Multifactorial</td>
                                    <td class="px-6 py-4 text-brand-700">Multifactorial approaches combine allied health services, medical intervention, assistive devices, environmental adaptations, exercise, technology and human systems to create the best possible approach to supporting the person.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="text-2xl font-bold text-secondary-500 mt-10 mb-4 pb-2 border-b-2 border-amber-100">Links to other Policies and Documents</h2>
                    <ul class="list-disc pl-6 space-y-2 text-brand-700 mb-6">
                        <li>Duty of Care Policy and Procedure</li>
                        <li>Code of Conduct Policy and Procedure</li>
                        <li>Management of Care and Service Policy and Procedure</li>
                        <li>Safety and Risk Management Policy and Procedure</li>
                        <li>Individualised Plans Policy and Procedure</li>
                        <li>Incident, Injury, Trauma and Illness Policy and Procedure</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-secondary-500 mt-10 mb-4 pb-2 border-b-2 border-amber-100">Induction and Ongoing Training</h2>
                    <p class="text-brand-700 leading-relaxed mb-4">Lia College requires that induction and ongoing training of all staff include the Management of Falls Policy to enable staff to fulfil their roles effectively.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">Lia College promotes information sharing at staff meetings, sharing of information received from industry trends or changes in legislation, and in consultation at policy review sessions.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">All staff must complete FRAT training upon commencement of employment at Lia College.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">All staff must receive Falls First Responder training upon commencement of employment at Lia College Care.</p>

                    <h2 class="text-2xl font-bold text-secondary-500 mt-10 mb-4 pb-2 border-b-2 border-amber-100">Policy Created/Reviewed</h2>
                    <div class="overflow-x-auto mb-8 rounded-lg border border-brand-200 shadow-sm">
                        <table class="min-w-full divide-y divide-brand-200 text-sm">
                            <thead class="bg-brand-50">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-brand-500 uppercase tracking-wider">Policy Created/Reviewed</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-brand-500 uppercase tracking-wider">Modifications</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-brand-500 uppercase tracking-wider">Next Review Date</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-brand-200">
                                <tr class="hover:bg-brand-50 transition-colors">
                                    <td class="px-6 py-4 text-brand-700">Implemented December 2022</td>
                                    <td class="px-6 py-4 text-brand-700"></td>
                                    <td class="px-6 py-4 text-brand-700">December 2023</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="text-2xl font-bold text-secondary-500 mt-10 mb-4 pb-2 border-b-2 border-amber-100">Monitoring, Evaluation and Review</h2>
                    <p class="text-brand-700 leading-relaxed mb-4">This policy will be reviewed every three years or on the occurrence of any relevant legislative change. Management of Lia College will conduct reviews in consultation with the team at staff meetings.</p>

                    <h2 class="text-2xl font-bold text-secondary-500 mt-10 mb-4 pb-2 border-b-2 border-amber-100">Management of Falls Procedure</h2>

                    <h3 class="text-xl font-bold text-secondary-500 mt-8 mb-3">Initial Assessment</h3>
                    <p class="text-brand-700 leading-relaxed mb-4">Upon initial intake, every client will be assessed using the Falls Risk Assessment Tool to provide a comprehensive and multifactorial falls risk assessment.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">This will be reviewed annually and after any fall or change in the resident’s health status.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">The Falls Risk Assessment includes an assessment of the client’s gait, balance, posture, mobility, muscle and joint strength and function, continence, falls history, psychological state, physiological health and medications. Even when the client’s risk of falls is assessed as low, preventative risk control action must be taken.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">The FRAT may be conducted by Lia College nursing or support workers.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">Upon completion, the FRAT must be lodged and securely stored in the Lia College client Information Management System (IMS). The FRAT must be updated at the following times:</p>
                    <ul class="list-disc pl-6 space-y-2 text-brand-700 mb-6">
                        <li>after a fall</li>
                        <li>after any change in the client’s health</li>
                        <li>after any change in the client’s medication regime, and</li>
                        <li>the FRAT must be completely reviewed annually.</li>
                    </ul>
                    <p class="text-brand-700 leading-relaxed mb-4">A multidisciplinary team will review each client’s FRAT on submission. This team will include, at a minimum, the Care Coordinator, the Nurse, the client’s GP and a support worker. Where necessary, other allied health professionals will participate in the FRAT review. This team will determine a system of risk reductions, including:</p>
                    <ul class="list-disc pl-6 space-y-2 text-brand-700 mb-6">
                        <li>environmental modifications</li>
                        <li>assistive devices</li>
                        <li>Allied Health interventions, such as physiotherapy</li>
                        <li>changes to the timing, type or dosage of medication if the medication has a proven increased risk effect (must be authorised by GP)</li>
                        <li>human systems such as the timing or location of meals, bathing, toileting, frequency of changes of incontinence pads and daily exercise routines.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-secondary-500 mt-8 mb-3">Post Falls Procedure</h3>
                    <p class="text-brand-700 leading-relaxed mb-4">In the event that a client experiences a fall, the following procedure will be followed by any staff member or volunteer nearby at the time.</p>
                    <ul class="list-disc pl-6 space-y-2 text-brand-700 mb-6">
                        <li>IMMEDIATELY call the shift supervisor. The supervisor will notify the Lia College Nurse and call an ambulance.</li>
                        <li>First responders WILL NOT ATTEMPT TO MOVE OR TREAT THE CLIENT unless they are a qualified medical practitioner, such as a Registered Nurse, Ambulance Officer or GP.</li>
                        <li>First responders will stay with the client, talking with them and reassuring them, even if they appear unconscious.</li>
                        <li>Qualified medical personnel attending the fall will perform a physical assessment of the resident at the time of the fall, including vital signs (which may include orthostatic blood pressure readings) and an evaluation of head, neck, spine and/or extremity injuries. Vital signs should be repeated every hour for the first four hours after the fall. Vital signs should then be monitored every four hours for the first 24 hours after the fall.</li>
                        <li>Neurological observations (Glasgow Coma Scale (GCS)) must be commenced if there are any signs of changes in the consciousness of the person after the fall or if the person experiences headaches or vomiting.</li>
                        <li>The first staff member at the scene will write a detailed report documenting the fall, the location, the time of day and what was occurring at the time of the fall using a Lia College Incident, Injury, Trauma and Illness Record. This must be submitted to the shift supervisor within 12 hours of the fall occurring.</li>
                        <li>The Incident, Injury, Trauma and Illness Record is an important legal document and must be completed factually and in detail. Within 12 hours after the fall, the Incident, Injury, Trauma and Illness Record must be lodged and securely stored in the Lia College client Information Management System (IMS).</li>
                        <li>After the fall, within 48 hours, the client’s FRAT must be updated, and a revised multifactorial risk assessment for the client must be completed.</li>
                        <li>A multidisciplinary care team, including a nurse, support worker, the client’s GP and relevant Allied Health professionals, will design and implement a Post Fall Care Plan to ensure optimal recovery of the client’s physiological and psychological wellbeing and confidence after the fall.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-secondary-500 mt-8 mb-3">Referral Procedure</h3>
                    <p class="text-brand-700 leading-relaxed mb-4">To refer a client to a health care professional, the support worker will make a recommendation to the shift supervisor or the Lia College nurse, Heather Brinkley.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">The following policies apply to referrals:</p>
                    <p class="text-brand-700 leading-relaxed mb-4">A client will be referred to a physiotherapist in the following circumstances:</p>
                    <ul class="list-disc pl-6 space-y-2 text-brand-700 mb-6">
                        <li>If gait changes, balance issues or “sliding steps” are observed during a routine FRAT.</li>
                        <li>A client will automatically be referred to a physiotherapist as part of a Post Fall Plan.</li>
                        <li>If other mobility issues are observed by a staff member and verified by the Lia College nurse or shift supervisor.</li>
                    </ul>
                    <p class="text-brand-700 leading-relaxed mb-4">A client will be referred to their GP:</p>
                    <ul class="list-disc pl-6 space-y-2 text-brand-700 mb-6">
                        <li>Automatically after any fall</li>
                        <li>If they experience any of the following symptoms: numbness or tingling in the hands and feet, loss of balance, vertigo, blood pressure issues, unusual lack of sleep, any loss of consciousness.</li>
                    </ul>
                    <p class="text-brand-700 leading-relaxed mb-4">A client will be referred to a psychologist if, after a fall, they experience any symptoms of depressive illness or anxiety lasting for more than one month after the fall.</p>

                    <h3 class="text-xl font-bold text-secondary-500 mt-8 mb-3">Rights and Responsibilities of Managers</h3>
                    <p class="text-brand-700 leading-relaxed mb-4">Frank Brookes (Care Coordinator) is responsible for managing the systematic implementation of all FRATs for each client, including managing the FRAT upon intake and the annual review cycle for<br>each client.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">Heather Brinkley (Nurse) is responsible for coordinating post-fall responses for clients, including organising the multidisciplinary FRAT review and Post Fall Care Plan within 48 hours after a fall.</p>

                    <h3 class="text-xl font-bold text-secondary-500 mt-8 mb-3">Rights and Responsibilities of Staff</h3>
                    <p class="text-brand-700 leading-relaxed mb-4">All staff must complete FRAT training upon commencement of employment at Lia College.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">Staff are responsible for understanding and correctly implementing each client’s FRAT.</p>
                    <p class="text-brand-700 leading-relaxed mb-4">Support workers, volunteers and all other staff are responsible for lodging an Incident, Injury, Trauma and Illness Record if they witness or are the first responder when a client falls.</p>

                    <h3 class="text-xl font-bold text-secondary-500 mt-8 mb-3">Key Contacts and External Organisations</h3>
                    <p class="text-brand-700 leading-relaxed mb-4">The Aged Care Quality and Safety Commission may be contacted concerning legislative requirements and in cases of serious breaches of this policy and procedure.</p>

                </div>
            </div>
        </article>
    </div>
</div>
@endsection
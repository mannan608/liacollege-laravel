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
                Reporting and Recording Behaviour Policy and Procedure
            </h1>
            <h1 class="text-3xl font-semibold text-brand-500 text-center mb-10">
                (AP3)
            </h1>

            <!-- Policy Statement -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Policy Statement
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    The purpose of the Reporting and Recording Behaviour Policy at Banksia Care is to provide mandatory requirements for Banksia Care staff (particularly the support staff) concerning Reporting and Recording Behaviours
                </p>
            </div>

            <!-- Scope -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Scope
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    This policy applies to staff, management and medical professionals of Banksia Care.
                </p>
            </div>

            <!-- Background -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Background
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Comprehensive recording and report writing, based on vigilant observation of behaviour and events, is essential to verify that something occurred and to record the event’s details. Organising information can be very helpful in clarifying concerns and confirming that important details are not omitted. In most cases, a report does not need to be made in haste and good preparation of a report can result in a more effective and timely response.
                </p>
            </div>

            <!-- Legislative Requirements -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Legislative Requirements
                </h2>
                <ul class="list-disc pl-8 space-y-2 text-gray-700">
                    <li>Aged Care and Other Legislative Amendment (Royal Commission Response No.1) Act 2021 (Cth)</li>
                    <li>Disability Discrimination Act 1992 (Cth)</li>
                    <li>Equal Opportunity Act 1984</li>
                    <li>National Disability Insurance Scheme Act 2013</li>
                </ul>
            </div>

            <!-- Principles -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Principles that Inform our Policy
                </h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    All decision-making about our Reporting and Recording Procedure is carried out in accordance with the principles of our Reporting and Recording Policy.
                </p>
                <p class="text-gray-700 mb-4 font-medium">Our objectives are as follows:</p>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex gap-3"><span class="text-[#da591f] font-bold">•</span> Reduce risk of injury Banksia Care staff and residents from behaviours of concern that correlate to aggressive behaviours that can challenge us.</li>
                    <li class="flex gap-3"><span class="text-[#da591f] font-bold">•</span> Consistently ensure a safe environment exists for staff and residents.</li>
                    <li class="flex gap-3"><span class="text-[#da591f] font-bold">•</span> Support Positive Behaviour Support (PBS) Practitioners to implement PBS plans when required.</li>
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
                                <td class="px-6 py-5 font-medium align-top">Behaviours of concern</td>
                                <td class="px-6 py-5 text-gray-700 align-top">
                                    The behaviour of concern, also termed challenging behaviour, refers to challenging and difficult behaviors exhibited by people with a disability that impact their physical safety or quality of life and/or those around them.<br><br>
                                    Behaviours of concern can be when someone does things that hurt themselves, other people, and/or things. This behaviour can stop them from doing things that ‘regular’ people do, such as going to work or meeting with friends.<br><br>
                                    Behaviour of concern can seriously cause stress for family and/or carers, and possibly harm them.
                                </td>
                                <td class="px-6 py-5 text-gray-600 align-top text-sm">
                                    <a href="https://www.elvescare.com.au/behaviour-of-concern/" target="_blank" class="text-blue-600 hover:underline">https://www.elvescare.com.au/behaviour-of-concern/</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5 font-medium align-top">Behaviour Support Plan (BSP)</td>
                                <td class="px-6 py-5 text-gray-700 align-top">
                                    BSP – is for any resident that requires behaviour support by a provider must have a Behaviour Support Plan (BSP) included in their care plan. Strategies you develop for a BSP will need to be tailored to the person and include consultation with them and their care partners.<br><br>
                                    The BSP will need to include information about the person and their preferences. It should also consider how to change or manage things that may be causing the resident distress and/or how to work out ways to meet their needs.<br><br>
                                    A BSP must also identify what steps to take if things become unsafe. Some plans will be more straightforward. For example, if a person is behaving in particular ways because of treatable pain, strategies that focus on pain management and ongoing observation are likely to help resolve that person’s pain and their behaviour.
                                </td>
                                <td class="px-6 py-5 text-gray-600 align-top text-sm">
                                    <a href="https://www.dementia.com.au/behaviour-support-plans" target="_blank" class="text-blue-600 hover:underline">https://www.dementia.com.au/behaviour-support-plans</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5 font-medium align-top">Emergency situation</td>
                                <td class="px-6 py-5 text-gray-700 align-top">
                                    This is determined when a situation where the employee has taken all appropriate actions or strategies to defuse that behaviour, are unable to do so and the behaviour stays the same or escalate further.
                                </td>
                                <td class="px-6 py-5 text-gray-600 align-top">Banksia Care</td>
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
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Safety and Risk Management Policy and Procedures</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Incident, Injury, Illness and Trauma Policy and Procedures</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Duty of Care Policy and Procedures</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Staff Health and Wellbeing Policy and Procedures</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Palliative Care Management Policy and Procedures</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Restrictive Practice Policy and Procedures</li>
                </ul>
            </div>

            <!-- Induction and Training -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Induction and Ongoing Training
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Banksia Care requires that induction and ongoing training of all staff include the Reporting and Recording Behaviour Policy to enable staff to fulfil their roles effectively. In addition, Banksia Care promotes information sharing at staff meetings, sharing of information received from industry trends or changes in legislation, and in consultation at policy review sessions.
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
                                <td class="px-6 py-5 border-b">Implemented July 2022</td>
                                <td class="px-6 py-5 border-b"></td>
                                <td class="px-6 py-5 border-b">December 2022</td>
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
                    Reporting and Recording Behaviour Procedure
                </h2>
                
                <p class="text-gray-700 mb-10">
                    Banksia Care staff who work directly with residents are responsible for the following.
                </p>

                <!-- Understanding Changes -->
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold text-sub[#da591f] mb-6 flex items-center gap-3">
                        <span class="w-6 h-px bg-sub[#da591f]"></span>
                        Understanding Changes in Behaviour
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Banksia Care’s Privacy and Policy Procedures will govern consumer information collection, storage and exchange with the consumer, reparative and service providers.
                    </p>
                </div>

                <!-- Positive Behaviour Support -->
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold text-sub[#da591f] mb-8 flex items-center gap-3">
                        <span class="w-6 h-px bg-sub[#da591f]"></span>
                        Positive behaviour support strategies which may reduce behaviours of concern
                    </h3>
                    <p class="text-gray-700 mb-8">
                        When a resident has a well-structured, nurturing and engaging lifestyle with an effective way to communicate, problem-solve and feel safe and secure, behaviours of concern are less likely to occur. The following is a list of positive behaviour support strategies that can be used in keeping a person-centred approach and reducing the resident from exhibiting behaviours of concern:
                    </p>

                    <!-- Reinforcement -->
                    <div class="mb-10">
                        <h4 class="text-xl font-semibold text-amber-700 mb-4">Reinforcement</h4>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Positive reinforcement should occur when the behaviour exhibited by the resident is appropriate at the time of the event or task. By positively reinforcing the resident, they will be likely to keep that appropriate behaviour which is an essential part of when the resident is learning a new skill to keep them encouraged and actively engaged.
                        </p>
                        <p class="text-gray-700 leading-relaxed">
                            Reinforcement will be the most effective in encouraging appropriate behaviour when given immediately to the resident after the appropriate behaviour. As the behaviour is learned, the reinforcement should then be given every now and again.
                        </p>
                    </div>

                    <!-- Teaching new skills -->
                    <div class="mb-10">
                        <h4 class="text-xl font-semibold text-amber-700 mb-4">Teaching new skills</h4>
                        <p class="text-gray-700 mb-6">
                            By arranging the resident’s environment with objects and materials that promote engagement, the interactions with the resident should be positive and enjoyable to be able to teach a new skill to them. The environment needs to be positive, and praise given along each step. Different techniques can be used when teaching new skills, as follows:
                        </p>
                        <ul class="space-y-6 text-gray-700">
                            <li><strong>Modelling</strong> – employee shows the resident how to behave or do a task.</li>
                            <li><strong>Prompting</strong> – employee uses words, gestures, and pictures of physical guidance to help the resident complete a task. Over time as the resident learns, the prompting minimises, allowing them to do the task independently.</li>
                            <li><strong>Shaping</strong> – the employee provides positive reinforcement to the resident when the resident shows behaviours close to what is wanted. For example, once mastered, praise the resident for putting their clothes in the washing machine, moving the praise to when they turn it on.</li>
                            <li>
                                <strong>Task analysis</strong> – breaking up the task into smaller steps. For example, the task is brushing your teeth. Break it down into the following steps:
                                <ul class="list-decimal pl-8 mt-3 space-y-1">
                                    <li>Pick up toothpaste and remove the cap.</li>
                                    <li>Pick up the toothbrush.</li>
                                    <li>Put a small amount of toothpaste on the bristles.</li>
                                    <li>Wet the toothbrush.</li>
                                    <li>Brush teeth and spit toothpaste out into the sink, rinse mouth.</li>
                                    <li>Rinse toothbrush and put away.</li>
                                    <li>Replace cap on toothpaste.</li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- Teaching coping skills -->
                    <div class="mb-10">
                        <h4 class="text-xl font-semibold text-amber-700 mb-4">Teaching coping skills</h4>
                        <p class="text-gray-700 leading-relaxed">
                            Everyone uses a specific set of skills to cope with different situations when presented to them. Your residents may need support in coping with changes to the service, waiting or noisy environments.<br><br>
                            The employee can prompt the resident to use different coping skills, such as using their iPad or looking at a magazine when waiting for the doctor. Another could be reminding the resident to relax by breathing slowly when they are feeling agitated in the situation.<br><br>
                            Another positive coping skill is to encourage the resident to express how they feel using verbal cues or pictures for non-verbal cues to best support the resident in that moment of feeling a particular emotion. The employee can also describe feelings when watching a show or movie with the resident or emotions depicted in books.
                        </p>
                    </div>

                    <!-- Active listening, Problem solving, etc. -->
                    <div class="grid grid-cols-1 gap-10">
                        <div>
                            <h4 class="text-xl font-semibold text-amber-700 mb-3">Active listening</h4>
                            <p class="text-gray-700">The employee should stop what they are doing and listen to the resident if appropriate and safe to do so. This involves the employee observing the resident’s body language for cues.</p>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold text-amber-700 mb-3">Problem solving</h4>
                            <p class="text-gray-700">Problem solving has many different steps that residents can utilise to be more independent...</p>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold text-amber-700 mb-3">Redirection / Empowering</h4>
                            <p class="text-gray-700">Ensure that the employee can get the resident’s attention before the behaviour escalates...</p>
                        </div>
                    </div>

                    <!-- When behaviours arise -->
                    <div class="mt-12 bg-amber-50 border border-amber-200 rounded-2xl p-8">
                        <h4 class="text-xl font-semibold text-amber-800 mb-6">When behaviours of concern arise</h4>
                        <p class="text-gray-700 mb-6">If it is an emergency situation, the employee should call their supervisor, or where necessary, call triple 0 (000) for assistance...</p>
                    </div>

                    <!-- Reporting Requirements -->
                    <div class="mt-12">
                        <h4 class="text-xl font-semibold text-amber-700 mb-4">Reporting and recording requirements</h4>
                        <ul class="list-disc pl-8 space-y-3 text-gray-700">
                            <li>The employee must advise their supervisor as soon as possible of the incident...</li>
                            <li>The supervisor is to determine whether the family...</li>
                            <li>Incidents which involve behaviour of concern...</li>
                            <li>Any injuries resulting from challenging behaviours need to be documented by an incident report within 24 hours...</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

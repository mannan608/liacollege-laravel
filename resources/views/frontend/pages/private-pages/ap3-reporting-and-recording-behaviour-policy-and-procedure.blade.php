@extends('frontend.layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 py-6 sm:py-8 lg:py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">

        <!-- Back Button -->
        <div class="mb-6 sm:mb-8">
            <a href="{{ route('student.dashboard') }}"
                class="inline-flex items-center gap-2 bg-brand-500 hover:bg-brand-500/90 text-white font-semibold px-5 py-2.5 sm:px-6 sm:py-3 rounded-lg transition-colors duration-200 shadow-sm text-sm sm:text-base">
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
                <div class="border-b-2 border-secondary-500/20 pb-6 sm:pb-8 mb-8 sm:mb-10 text-center sm:text-left">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-brand-500 tracking-tight leading-tight">
                        Reporting and Recording Behaviour Policy and Procedure
                    </h1>
                    <p class="text-xl sm:text-2xl font-bold text-secondary-500 mt-2">(AP3)</p>
                </div>

                <!-- Policy Statement -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Policy Statement
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        The purpose of the Reporting and Recording Behaviour Policy at Lia College is to provide mandatory
                        requirements for Lia College staff (particularly the support staff) concerning Reporting and
                        Recording Behaviours
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Scope -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Scope
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        This policy applies to staff, management and medical professionals of Lia College.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Background -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Background
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Comprehensive recording and report writing, based on vigilant observation of behaviour and events, is
                        essential to verify that something occurred and to record the event's details. Organising
                        information can be very helpful in clarifying concerns and confirming that important details are not
                        omitted. In most cases, a report does not need to be made in haste and good preparation of a report
                        can result in a more effective and timely response.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Legislative Requirements -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Legislative Requirements
                    </h2>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>Aged Care and Other Legislative Amendment (Royal Commission Response No.1) Act 2021 (Cth)</li>
                        <li>Disability Discrimination Act 1992 (Cth)</li>
                        <li>Equal Opportunity Act 1984</li>
                        <li>National Disability Insurance Scheme Act 2013</li>
                    </ul>
                </section>

                <!-- Principles -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Principles that Inform our Policy
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">
                        All decision-making about our Reporting and Recording Procedure is carried out in accordance with the
                        principles of our Reporting and Recording Policy.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4">Our objectives are as follows:</p>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>Reduce risk of injury Lia College staff and residents from behaviours of concern that correlate
                            to aggressive behaviours that can challenge us.</li>
                        <li>Consistently ensure a safe environment exists for staff and residents.</li>
                        <li>Support Positive Behaviour Support (PBS) Practitioners to implement PBS plans when required.
                        </li>
                    </ul>
                </section>

                <!-- Key Terms -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Key Terms
                    </h2>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                        <table class="w-full text-left border-collapse min-w-[640px]">
                            <thead>
                                <tr class="bg-brand-500 text-white">
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide w-32 sm:w-40">Term</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide">Meaning</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide w-40 sm:w-48">Source</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700 text-sm sm:text-base">
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Behaviours of concern</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">
                                        The behaviour of concern, also termed challenging behaviour, refers to
                                        challenging and difficult behaviors exhibited by people with a disability that impact
                                        their physical safety or quality of life and/or those around them.<p class="mt-2"></p>
                                        <p>Behaviours of concern can be when someone does things that hurt themselves, other
                                            people, and/or things. This behaviour can stop them from doing things that 'regular'
                                            people do, such as going to work or meeting with friends.</p>
                                        <p class="mt-2">Behaviour of concern can seriously cause stress for family and/or carers, and
                                            possibly harm them.</p>
                                    </td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">
                                        <a href="https://www.elvescare.com.au/behaviour-%20of-concern/" class="text-brand-500 hover:underline break-all">
                                            https://www.elvescare.com.au/behaviour- of-concern/
                                        </a>
                                    </td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Behaviour Support Plan (BSP)</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">
                                        BSP – is for any resident that requires behaviour support by a provider
                                        must have a Behaviour Support Plan (BSP) included in their care plan. Strategies you
                                        develop for a BSP will need to be tailored to the person and include consultation with
                                        them and their care partners.<p class="mt-2"></p>
                                        <p>The BSP will need to include information about the person and their preferences. It
                                            should also consider how to change or manage things that may be causing the resident
                                            distress and/or how to work out ways to meet their needs.</p>
                                        <p class="mt-2">A BSP must also identify what steps to take if things become unsafe. Some plans will
                                            be more straightforward. For example, if a person is behaving in particular ways
                                            because of treatable pain, strategies that focus on pain management and ongoing
                                            observation are likely to help resolve that person's pain and their behaviour.</p>
                                    </td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">https://www.dementia.com.au/behaviour- support-plans</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 font-medium text-brand-500 align-top">Emergency situation</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 leading-relaxed align-top">
                                        This is determined when a situation where the employee has taken all
                                        appropriate actions or strategies to defuse that behaviour, are unable to do so and the
                                        behaviour stays the same or escalate further.
                                    </td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">Lia College</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Links -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Links to other Policies and Documents
                    </h2>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                        <li>Safety and Risk Management Policy and Procedures</li>
                        <li>Incident, Injury, Illness and Trauma Policy and Procedures</li>
                        <li>Duty of Care Policy and Procedures</li>
                        <li>Staff Health and Wellbeing Policy and Procedures</li>
                        <li>Palliative Care Management Policy and Procedures</li>
                        <li>Restrictive Practice Policy and Procedures</li>
                    </ul>
                </section>

                <!-- Induction -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Induction and Ongoing Training
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Lia College requires that induction and ongoing training of all staff include the Reporting and
                        Recording Behaviour Policy to enable staff to fulfil their roles effectively. In addition, Lia College
                        Care promotes information sharing at staff meetings, sharing of information received from industry
                        trends or changes in legislation, and in consultation at policy review sessions.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Policy Created/Reviewed -->
                <section class="mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Policy Created/Reviewed
                    </h2>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                        <table class="w-full text-left border-collapse min-w-[500px]">
                            <thead>
                                <tr class="bg-brand-500 text-white">
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide">Policy Created/ Reviewed</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide">Modifications</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-xs sm:text-sm uppercase tracking-wide">Next Review Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700 text-sm sm:text-base">
                                <tr class="bg-white">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">Implemented July 2022</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top"></td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 align-top">December 2022</td>
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
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Monitoring, Evaluation and Review
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        This policy will be reviewed annually or on the occurrence of any relevant legislative change.
                        Management of Lia College will conduct reviews in consultation with educators at staff meetings.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Procedure Header -->
                <section class="mb-6 sm:mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-secondary-500 mb-3 sm:mb-4 border-l-4 border-secondary-500 pl-4">
                        Reporting and Recording Behaviour&nbsp;Procedure
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Lia College staff who work directly with residents are responsible for the following.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Understanding Changes -->
                <section class="mb-8 sm:mb-10 bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                    <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 sm:mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                        Understanding Changes in Behaviour
                    </h3>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                        Lia College's Privacy and Policy Procedures will govern consumer information collection, storage and
                        exchange with the consumer, reparative and service providers.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Positive behaviour support strategies -->
                <section class="mb-8 sm:mb-10 bg-slate-50 rounded-xl p-5 sm:p-6 border border-slate-200">
                    <h3 class="text-lg sm:text-xl font-bold text-secondary-500 mb-3 sm:mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-secondary-500 inline-block flex-shrink-0"></span>
                        Positive behaviour support strategies which may reduce behaviours of concern
                    </h3>
                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-4 sm:mb-6">
                        When a resident has a well-structured, nurturing and engaging lifestyle with an effective way to
                        communicate, problem-solve and feel safe and secure, behaviours of concern are less likely to occur.
                        The following is a list of positive behaviour support strategies that can be used in keeping a
                        person-centred approach and reducing the resident from exhibiting behaviours of concern:
                    </p>

                    <div class="space-y-6 sm:space-y-8">
                        <!-- Reinforcement -->
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-secondary-500 mb-2 sm:mb-3">
                                Reinforcement
                            </h4>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                Positive reinforcement should occur when the behaviour exhibited by the resident is appropriate at
                                the time of the event or task. By positively reinforcing the resident, they will be likely to keep
                                that appropriate behaviour which is an essential part of when the resident is learning a new skill
                                to keep them encouraged and actively engaged.
                            </p>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                                Reinforcement will be the most effective in encouraging appropriate behaviour when given immediately
                                to the resident after the appropriate behaviour. As the behaviour is learned, the reinforcement
                                should then be given every now and again.
                            </p>
                        </div>

                        <ul class="list-none"></ul>

                        <!-- Teaching new skills -->
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-secondary-500 mb-2 sm:mb-3">
                                Teaching new skills
                            </h4>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                By arranging the resident's environment with objects and materials that promote engagement, the
                                interactions with the resident should be positive and enjoyable to be able to teach a new skill to
                                them. The environment needs to be positive, and praise given along each step. Different techniques
                                can be used when teaching new skills, as follows:
                            </p>
                            <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li>Modelling – employee shows the resident how to behave or do a task.</li>
                                <li>Prompting – employee uses words, gestures, and pictures of physical guidance to help the
                                    resident complete a task. Over time as the resident learns, the prompting minimises, allowing
                                    them to do the task independently.</li>
                                <li>Shaping – the employee provides positive reinforcement to the resident when the resident shows
                                    behaviours close to what is wanted. For example, once mastered, praise the resident for putting
                                    their clothes in the washing machine, moving the praise to when they turn it on.</li>
                                <li>Task analysis – breaking up the task into smaller steps. For example, the task is brushing your
                                    teeth. Break it down into the following steps:
                                    <ul class="list-disc list-inside ml-4 sm:ml-6 mt-2 space-y-1 marker:text-secondary-500 text-sm sm:text-base">
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
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-secondary-500 mb-2 sm:mb-3">
                                Teaching coping skills
                            </h4>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                Everyone uses a specific set of skills to cope with different situations when presented to them. Your
                                residents may need support in coping with changes to the service, waiting or noisy environments.
                            </p>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                The employee can prompt the resident to use different coping skills, such as using their iPad or
                                looking at a magazine when waiting for the doctor. Another could be reminding the resident to relax
                                by breathing slowly when they are feeling agitated in the situation.
                            </p>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                                Another positive coping skill is to encourage the resident to express how they feel using verbal cues
                                or pictures for non-verbal cues to best support the resident in that moment of feeling a particular
                                emotion. The employee can also describe feelings when watching a show or movie with the resident or
                                emotions depicted in books.
                            </p>
                        </div>

                        <!-- Active listening -->
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-secondary-500 mb-2 sm:mb-3">
                                Active listening
                            </h4>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                The employee should stop what they are doing and listen to the resident if appropriate and safe to do
                                so. This involves the employee observing the resident's body language for cues.
                            </p>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                If the resident is speaking, listen and remain silent and do not interrupt them or tell them they are
                                wrong.
                            </p>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                Ask clarifying questions when you are not understanding or have trouble following what the resident
                                is telling you. When they have finished telling you, paraphrase to check with them that you have the
                                correct understanding. It is important not to agree with the resident. Just simply state what has
                                been said.
                            </p>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                If a resident is upset, listen for feelings. The resident may not be able to describe the correct
                                feeling. However, caution needs to be applied when labelling feelings. Let the resident describe the
                                underlying emotion to you and validate their feelings with positive language such as: "it sounds
                                like you are really angry at your boss at work". Then state and reassure the resident with "it is
                                okay to feel that way".
                            </p>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                                Once you have reached this point, after the resident has begun to calm down, ask them what they would
                                like you to do. It may be just to listen; it may be to help them cope with their current feelings or
                                perhaps set a goal for change or problem solve the situation with them.
                            </p>
                        </div>

                        <!-- Problem solving -->
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-secondary-500 mb-2 sm:mb-3">
                                Problem solving
                            </h4>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                Problem solving has many different steps that residents can utilise to be more independent. These
                                steps may help the resident identify, and problem solve with or without your assistance:
                            </p>
                            <ol class="list-decimal list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li>Prompt the resident to clearly state what the problem is.</li>
                                <li>Prompt the resident to devise different possible options to solve that problem.</li>
                                <li>Rate each option and look at what the consequences of each option may entail. Caution needs to
                                    be had here as sometimes an option to solve the problem may have undesirable side effects
                                    prompting different behaviours of concern to surface for the resident. Or if it involves another
                                    resident, it may trigger them to display behaviours of concern.</li>
                                <li>Apply dignity of risk to the situation and allow the resident to give the option they have
                                    chosen as an attempt to trial the solution.</li>
                                <li>Review where the option chosen has had the desired outcome for the resident. This is a great
                                    opportunity to provide the resident with positive reinforcement on how they problem solve, what
                                    other options they could try if it didn't work and give praise to the resident for cooperation
                                    and success.</li>
                            </ol>
                        </div>

                        <!-- Redirection -->
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-secondary-500 mb-2 sm:mb-3">
                                Redirection
                            </h4>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                                Ensure that the employee can get the resident's attention before the behaviour escalates and becomes
                                a problem by redirecting them to another task or activity. It can be useful when a particular
                                behaviour is anticipated and when the situation is getting out of hand for the resident. For
                                example, when the resident's favourite TV program is not on, and they are exhibiting frustration,
                                get their attention by redirecting to: "how about we watch that movie you like."
                            </p>
                        </div>

                        <!-- Empowering -->
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-secondary-500 mb-2 sm:mb-3">
                                Empowering
                            </h4>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base">
                                The employee can provide the resident with the support and information they require to make their own
                                choice and decision.
                            </p>
                        </div>

                        <!-- When behaviours of concern arise -->
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-secondary-500 mb-2 sm:mb-3">
                                When behaviours of concern arise
                            </h4>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                If it is an emergency situation, the employee should call their supervisor, or where necessary, call
                                triple 0 (000) for assistance. The employee is to stay where they can monitor the resident's safety
                                until the assistance arrives.
                            </p>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                If a resident is displaying behaviours or concerns, the employee needs to use their judgement to
                                balance their duty of care to the resident while protecting other residents and themselves. If a
                                resident has a Behaviour Support Plan (BSP), that should be accessed to identify the positive
                                strategies to use. In the case of no BSP available, the following strategies can be used:
                            </p>
                            <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                                Taking care not to put themselves at risk of harm, the employee should use the following steps:
                            </p>
                            <ol class="list-decimal list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li>Try redirection with the resident.</li>
                                <li>Remove the resident displaying the behaviour from other residents without using restrictive
                                    practices unless approved by the supervisor.</li>
                                <li>Talk to the resident who is displaying the behaviour of concern in a calm and neutral tone using
                                    short assertive communication in an attempt to diffuse the situation.</li>
                            </ol>
                        </div>

                        <!-- Reporting and recording requirements -->
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-secondary-500 mb-2 sm:mb-3">
                                Reporting and recording requirements
                            </h4>
                            <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li>The employee must advise their supervisor as soon as possible of the incident, even if they
                                    managed to diffuse the situation.</li>
                                <li>The supervisor is to determine whether the family and/or other significant people should be
                                    informed, including referral to a General Practitioner or other specialists, especially if
                                    medication is involved and a trigger of the behaviour.</li>
                                <li>Incidents which involve behaviour of concern or those behaviours which are deemed challenging to
                                    us must be reported using case notes to their supervisor.</li>
                                <li>Any injuries resulting from challenging behaviours need to be documented by an incident report
                                    within 24 hours of the incident occurring.</li>
                            </ul>
                        </div>

                        <!-- Post-incident management -->
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-secondary-500 mb-2 sm:mb-3">
                                Post-incident management of employees, residents and others
                            </h4>
                            <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li>Following an incident where behaviours of concern are witnessed and/or dealt with by the
                                    employee, resident, and other witnesses can be confronting and frightening.</li>
                                <li>Supervisors are encouraged to engage with all involved in the incident to hold a debrief session
                                    where the objective is to acknowledge and validate any reactions and prevent increasing
                                    stressors.</li>
                                <li>Employees involved can be offered counselling services provided by the supervisor on how to
                                    access the services.</li>
                            </ul>
                        </div>

                        <!-- Lia College staff responsibilities -->
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-secondary-500 mb-2 sm:mb-3">
                                Lia College staff who work directly with members are responsible for the following
                            </h4>
                            <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-brand-500 text-sm sm:text-base">
                                <li>Understand and comply with this policy.</li>
                                <li>Seek additional training in Reporting and Recording Behaviour and implementing BSP, as required.
                                </li>
                                <li>Ensure each member who receives support has an individual support plan. These plans will be
                                    person-centred, with a strong focus on choice and control. Consideration will be given to the
                                    member's goals, aspirations, interests, preferences, strengths and capabilities.</li>
                                <li>Work collaboratively with the BSP Practitioner to develop a BSP plan.</li>
                                <li>Report any use of a Restrictive Practice, as per NDIS Commission's regulatory requirements.</li>
                                <li>Lia College will provide training and support for the above and engage approved specialist BSP
                                    Practitioners (as required) to develop BSP plans to reduce and eliminate the use of Restrictive
                                    Practices.</li>
                            </ul>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
@endsection
@extends('frontend.layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">

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
                        Safety and Risk Management Policy and Procedure
                    </h1>
                    <p class="text-2xl font-bold text-[#e6bb73] mt-2">(AP1)</p>
                </div>

                <!-- Policy Statement -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Policy Statement</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        The purpose of the Safety and Risk Management Policy at Lia College is to meet our duty of care
                        requirements for all stakeholders by developing and supporting a service culture where risk
                        assessments are routinely undertaken to minimise risk of all Lia College operations and ensure the
                        safety of all.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Scope -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Scope</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        This policy applies to residents, staff, management, medical professionals, volunteers and visitors
                        of Lia College.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Background -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Background</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        The Royal Commission into Aged Care Quality and Safety (aged care royal commission) hearings (and
                        others in industries outside our sector) illustrated the serious outcomes that occur when an
                        organisation fails to manage risk with the level of attention it warrants. Lia College appreciates
                        that the safety and wellbeing of everyone at our service are paramount to our core values and
                        objectives. We also acknowledge that as far as reasonably practicable, we are responsible and
                        accountable for the safety of all residents as well as anyone who is attending, visiting or
                        providing services to Lia College. Due to their vulnerability, elderly people are susceptible to
                        various risks, both within independent living arrangements and at aged care facilities. As managing
                        risk is the responsibility of everyone, having the guidelines and ability to identify and manage
                        risk increases everyone's ability to make sound decisions.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Legislative Requirements -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Legislative Requirements</h2>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-[#132b4e]">
                        <li>Public Administrations Act 2004.</li>
                        <li>Occupational Health and Safety Act 2004.</li>
                        <li>Occupational Health and Safety Regulations 2017.</li>
                        <li>Australian and New Zealand Standard Risk Management Principles and Guidelines AS/NZS ISO
                            310002009</li>
                    </ul>
                </section>

                <!-- Principles -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Principles that Inform our Policy</h2>
                    <p class="text-slate-700 leading-relaxed text-base mb-4">
                        All decision-making about our <em>Safety and Risk Management</em><em> Procedure</em> is carried out
                        in accordance with the principles of our <em>Safety and Risk Management Policy</em>.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-base mb-4">
                        Lia College identifies the following as areas of potential risks, particularly in relation to the
                        elderly:
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-[#132b4e] mb-6">
                        <li>theft</li>
                        <li>falling</li>
                        <li>medication misuse</li>
                        <li>malnutrition</li>
                        <li>developing dementia</li>
                        <li>not being treated correctly for medical issues</li>
                        <li>depression</li>
                        <li>elder abuse.</li>
                    </ul>
                    <p class="text-slate-700 leading-relaxed text-base mb-4">At Lia College, all risk assessments will:</p>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-[#132b4e]">
                        <li>outline the activity, location, participants and equipment</li>
                        <li>identify potential hazards</li>
                        <li>identify barriers to effective supervision</li>
                        <li>record who is at risk of harm</li>
                        <li>identify the likelihood and severity of harm (including rating the risk outcome)</li>
                        <li>record control measures</li>
                        <li>state any further action required</li>
                        <li>be given a risk score using the tables in the Safety and Risk Management Procedure.</li>
                    </ul>
                </section>

                <!-- Key Terms -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Key Terms</h2>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-[#132b4e] text-white">
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide w-32">Term</th>
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide">Meaning</th>
                                    <th class="px-6 py-4 font-semibold text-sm uppercase tracking-wide w-40">Source</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700">
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-[#132b4e] align-top">Hazard</td>
                                    <td class="px-6 py-4 leading-relaxed align-top">
                                        A potential source of harm. Substances, events, or circumstances can
                                        constitute hazards when their nature would allow them, even just theoretically, to cause
                                        damage to health, life, property, or any other interest of value.
                                    </td>
                                    <td class="px-6 py-4 align-top">Wikipedia</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-6 py-4 font-medium text-[#132b4e] align-top">Risk</td>
                                    <td class="px-6 py-4 leading-relaxed align-top">
                                        The probability of that harm being realised in a specific incident and
                                        the magnitude of potential harm make up its risk.
                                    </td>
                                    <td class="px-6 py-4 align-top">Wikipedia</td>
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
                        <li>Administration of Medication P&amp;P</li>
                        <li>Risk Assessment and Management Plan</li>
                        <li>Medication Log</li>
                        <li>Incident, Injury, Illness and Trauma P&amp;P</li>
                        <li>Duty of Care P&amp;P</li>
                        <li>Staff Health and Wellbeing P&amp;P</li>
                        <li>Workplace Health and Safety P&amp;P</li>
                        <li>Emergency Management P&amp;P</li>
                        <li>Hazard Report</li>
                        <li>Serious Incident Report</li>
                    </ul>
                </section>

                <!-- Induction -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Induction and Ongoing Training</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        Lia College requires that induction and ongoing training of all staff include the <em>Safety and
                            Risk Management Policy</em> to enable staff to fulfil their roles effectively. In addition,
                        Lia College promotes information sharing at staff meetings, sharing of information received from
                        industry trends or changes in legislation, and consultation at policy review sessions.
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
                                    <td class="px-6 py-4 align-top">Implemented July 2022</td>
                                    <td class="px-6 py-4 align-top"></td>
                                    <td class="px-6 py-4 align-top">December 2022</td>
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
                        This policy will be reviewed annually or on the occurrence of any relevant legislative Management of
                        Lia College will conduct reviews in consultation with educators at staff meetings.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Procedure Header -->
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Safety and Risk Management Procedure</h2>
                    <p class="text-slate-700 leading-relaxed text-base mb-4">Management will facilitate the following:</p>
                    <ul class="list-disc list-inside space-y-3 text-slate-700 leading-relaxed marker:text-[#132b4e] mb-8">
                        <li>Ensure risk assessments are completed by delegation to key roles, including but not limited to
                            car coordinators, residential managers, personal care workers, lifestyle team etc.</li>
                        <li>Encourage a "speak up" culture.</li>
                        <li>Utilise risk assessments to maintain safety compliance requirements and manage risk.</li>
                        <li>Ensure ongoing training is provided to all key roles to maintain compliance with risk
                            management.</li>
                        <li>Provide all new staff with online training in risk management (at a minimum) and are aware of
                            the responsibility for identifying and managing risk.</li>
                        <li>Provide staff with ongoing training on other areas of their work that could potentially cause
                            risk – including but not limited to manual handling, lifting, use of equipment, nutrition, and
                            mental health awareness.</li>
                        <li>Create a generic set of risk management assessments (manual handling, noise, working at heights,
                            general equipment use, working alone/after hours etc.) but advise all key roles that these
                            should be treated with caution and used as a starting point only.</li>
                        <li>Ensure contractors are responsible for their own risk assessments and will not allow external
                            work orders to commence without first sighting and approving the assessment.</li>
                        <li>Create a documented framework for managing risk, using an 'identify, detect and respond' risk
                            cycle.</li>
                        <li>Establish clear expectations for conduct and accountabilities for risk.</li>
                    </ul>

                    <p class="text-slate-700 leading-relaxed text-base mb-4 font-semibold">Key roles will ensure the following:</p>
                    <ul class="list-disc list-inside space-y-3 text-slate-700 leading-relaxed marker:text-[#132b4e] mb-8">
                        <li>Comply with Lia College's Safety and Risk Management Policy.</li>
                        <li>Implement a documented framework for managing risk, using an 'identify, detect and respond' risk
                            cycle.</li>
                        <li>Complete a risk assessment for any activity organised that falls under their area of
                            control/management.</li>
                        <li>Encourage a "speak up" culture.</li>
                        <li>Ensure that any risk identified is either removed or adequately reduced and fully controlled.
                        </li>
                        <li>Assist in ongoing training and awareness of all staff they supervise in relation to risk
                            management expectations.</li>
                        <li>Maintain the risk assessment register and ensure it is always up to date and accessible.</li>
                        <li>Review the register annually to ensure ongoing compliance related to any former risk identified
                            through a risk assessment.</li>
                        <li>Identify the types of manual handling equipment available and determine what equipment best
                            suits both residents and staff.</li>
                        <li>Understand that the level of risk may change daily, and a prepared risk assessment will need to
                            be reviewed the activity occurs. For example, changes in weather can change the level of risk.
                        </li>
                    </ul>

                    <p class="text-slate-700 leading-relaxed text-base mb-4 font-semibold">All staff will ensure the following:</p>
                    <ul class="list-disc list-inside space-y-3 text-slate-700 leading-relaxed marker:text-[#132b4e] mb-8">
                        <li>Be responsible for their own safety and that of residents and visitors.</li>
                        <li>Cooperate with management and key roles in minimising any identified risk as a matter of
                            critical importance.</li>
                        <li>Adopt a 'speak up' culture.</li>
                        <li>Follow an 'identify, detect and respond' risk cycle.</li>
                        <li>Follow all safety systems implemented when a risk is identified.</li>
                        <li>Report any observed potential risk/defect to their manager as soon as identified.</li>
                        <li>Undertake manual handling training on how to use specific equipment for lifting, transferring
                            and repositioning residents.</li>
                        <li>Develop the skills to use manual handling equipment efficiently.</li>
                    </ul>
                </section>

                <!-- Risk Score Matrix -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-6 border-l-4 border-[#e6bb73] pl-4">Determining a Risk Score and Risk Management Plan</h2>
                    
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm mb-8">
                        <table class="w-full text-center border-collapse text-sm sm:text-base">
                            <thead>
                                <tr class="bg-emerald-500 text-white">
                                    <th rowspan="8" class="px-4 py-4 font-bold uppercase tracking-wide border-r border-emerald-400 w-24 align-middle">Likelihood</th>
                                    <th colspan="7" class="px-4 py-3 font-bold uppercase tracking-wide">Severity</th>
                                </tr>
                                <tr class="bg-teal-100 text-slate-800">
                                    <th colspan="2" class="px-2 py-2 border-r border-teal-200"></th>
                                    <th class="px-2 py-2 border-r border-teal-200">Trivial</th>
                                    <th class="px-2 py-2 border-r border-teal-200">Minor</th>
                                    <th class="px-2 py-2 border-r border-teal-200">Moderate</th>
                                    <th class="px-2 py-2 border-r border-teal-200">Major</th>
                                    <th class="px-2 py-2">Significant</th>
                                </tr>
                                <tr class="bg-teal-100 text-slate-800">
                                    <th colspan="2" class="px-2 py-2 border-r border-teal-200"></th>
                                    <th class="px-2 py-2 border-r border-teal-200">1</th>
                                    <th class="px-2 py-2 border-r border-teal-200">2</th>
                                    <th class="px-2 py-2 border-r border-teal-200">3</th>
                                    <th class="px-2 py-2 border-r border-teal-200">4</th>
                                    <th class="px-2 py-2">5</th>
                                </tr>
                            </thead>
                            <tbody class="text-slate-800">
                                <tr class="bg-teal-50 border-b border-teal-100">
                                    <td class="px-3 py-3 font-medium bg-teal-100 border-r border-teal-200">Rare</td>
                                    <td class="px-3 py-3 font-medium bg-teal-100 border-r border-teal-200">1</td>
                                    <td class="px-3 py-3 bg-green-500 text-white font-bold border-r border-white/20">1</td>
                                    <td class="px-3 py-3 bg-green-500 text-white font-bold border-r border-white/20">2</td>
                                    <td class="px-3 py-3 bg-green-500 text-white font-bold border-r border-white/20">3</td>
                                    <td class="px-3 py-3 bg-sky-500 text-white font-bold border-r border-white/20">4</td>
                                    <td class="px-3 py-3 bg-sky-500 text-white font-bold">5</td>
                                </tr>
                                <tr class="bg-teal-50 border-b border-teal-100">
                                    <td class="px-3 py-3 font-medium bg-teal-100 border-r border-teal-200">Unlikely</td>
                                    <td class="px-3 py-3 font-medium bg-teal-100 border-r border-teal-200">2</td>
                                    <td class="px-3 py-3 bg-green-500 text-white font-bold border-r border-white/20">2</td>
                                    <td class="px-3 py-3 bg-green-500 text-white font-bold border-r border-white/20">4</td>
                                    <td class="px-3 py-3 bg-sky-500 text-white font-bold border-r border-white/20">6</td>
                                    <td class="px-3 py-3 bg-orange-500 text-white font-bold border-r border-white/20">8</td>
                                    <td class="px-3 py-3 bg-orange-500 text-white font-bold">10</td>
                                </tr>
                                <tr class="bg-teal-50 border-b border-teal-100">
                                    <td class="px-3 py-3 font-medium bg-teal-100 border-r border-teal-200">Possible</td>
                                    <td class="px-3 py-3 font-medium bg-teal-100 border-r border-teal-200">3</td>
                                    <td class="px-3 py-3 bg-green-500 text-white font-bold border-r border-white/20">3</td>
                                    <td class="px-3 py-3 bg-sky-500 text-white font-bold border-r border-white/20">6</td>
                                    <td class="px-3 py-3 bg-orange-500 text-white font-bold border-r border-white/20">9</td>
                                    <td class="px-3 py-3 bg-orange-500 text-white font-bold border-r border-white/20">12</td>
                                    <td class="px-3 py-3 bg-red-500 text-white font-bold">15</td>
                                </tr>
                                <tr class="bg-teal-50 border-b border-teal-100">
                                    <td class="px-3 py-3 font-medium bg-teal-100 border-r border-teal-200">Likely</td>
                                    <td class="px-3 py-3 font-medium bg-teal-100 border-r border-teal-200">4</td>
                                    <td class="px-3 py-3 bg-sky-500 text-white font-bold border-r border-white/20">4</td>
                                    <td class="px-3 py-3 bg-orange-500 text-white font-bold border-r border-white/20">8</td>
                                    <td class="px-3 py-3 bg-orange-500 text-white font-bold border-r border-white/20">12</td>
                                    <td class="px-3 py-3 bg-red-500 text-white font-bold border-r border-white/20">16</td>
                                    <td class="px-3 py-3 bg-red-500 text-white font-bold">20</td>
                                </tr>
                                <tr class="bg-teal-50">
                                    <td class="px-3 py-3 font-medium bg-teal-100 border-r border-teal-200">Certain</td>
                                    <td class="px-3 py-3 font-medium bg-teal-100 border-r border-teal-200">5</td>
                                    <td class="px-3 py-3 bg-sky-500 text-white font-bold border-r border-white/20">5</td>
                                    <td class="px-3 py-3 bg-orange-500 text-white font-bold border-r border-white/20">10</td>
                                    <td class="px-3 py-3 bg-red-500 text-white font-bold border-r border-white/20">15</td>
                                    <td class="px-3 py-3 bg-red-500 text-white font-bold border-r border-white/20">20</td>
                                    <td class="px-3 py-3 bg-red-500 text-white font-bold">25</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <ul class="my-4 list-none"></ul>

                    <!-- Assess Likelihood -->
                    <h3 class="text-xl font-bold text-[#fcb53b] mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#fcb53b] inline-block"></span>
                        Assess the Likelihood
                    </h3>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm mb-8">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-emerald-500 text-white">
                                    <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wide w-40">Likelihood</th>
                                    <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wide w-24">Score</th>
                                    <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wide">Meaning</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700">
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 font-medium bg-teal-50">Rare</td>
                                    <td class="px-6 py-3 font-bold bg-teal-50 text-center">1</td>
                                    <td class="px-6 py-3">The likelihood of this happening is probably never or extremely rare</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 font-medium bg-teal-50">Unlikely</td>
                                    <td class="px-6 py-3 font-bold bg-teal-50 text-center">2</td>
                                    <td class="px-6 py-3">Although you shouldn't expect it to happen, it is always possible it may.</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 font-medium bg-teal-50">Possible</td>
                                    <td class="px-6 py-3 font-bold bg-teal-50 text-center">3</td>
                                    <td class="px-6 py-3">There is the possibility this could reoccur or happen occasionally.</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 font-medium bg-teal-50">Likely</td>
                                    <td class="px-6 py-3 font-bold bg-teal-50 text-center">4</td>
                                    <td class="px-6 py-3">It will more than likely happen or reoccur but not a persisting issue.</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 font-medium bg-teal-50">Certain</td>
                                    <td class="px-6 py-3 font-bold bg-teal-50 text-center">5</td>
                                    <td class="px-6 py-3">It will happen or reoccur, even frequently.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <ul class="my-4 list-none"></ul>

                    <!-- Assess Severity -->
                    <h3 class="text-xl font-bold text-[#fcb53b] mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#fcb53b] inline-block"></span>
                        Assess the Severity
                    </h3>
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm mb-8">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-emerald-500 text-white">
                                    <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wide w-44">Severity</th>
                                    <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wide w-24">Score</th>
                                    <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wide">Meaning</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700">
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 font-medium bg-teal-50">Trivial</td>
                                    <td class="px-6 py-3 font-bold bg-teal-50 text-center">1</td>
                                    <td class="px-6 py-3">No injury – Minor property damage</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 font-medium bg-teal-50">Minor</td>
                                    <td class="px-6 py-3 font-bold bg-teal-50 text-center">2</td>
                                    <td class="px-6 py-3">Slightly harmful – minor cuts and abrasions. Some property damage but minimal and minor.</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 font-medium bg-teal-50">Moderate</td>
                                    <td class="px-6 py-3 font-bold bg-teal-50 text-center">3</td>
                                    <td class="px-6 py-3">Harmful – Lacerations, sprains, minor fractures, asthma, minor burns. Property damage that requires contract work. Interruption to business for less than a day.</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 font-medium bg-teal-50">Major</td>
                                    <td class="px-6 py-3 font-bold bg-teal-50 text-center">4</td>
                                    <td class="px-6 py-3">Extremely harmful – Permanent disability, major fractures, deafness, anaphylaxis reaction, disease. Major impact to the business of 2-5 days.</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 font-medium bg-teal-50">Significant</td>
                                    <td class="px-6 py-3 font-bold bg-teal-50 text-center">5</td>
                                    <td class="px-6 py-3">Fatal – Could result in a fatality or loss of buildings. Could also include or involve interruption to business for 5 or more days.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <ul class="my-4 list-none"></ul>

                    <!-- Risk Score Formula -->
                    <h3 class="text-xl font-bold text-[#fcb53b] mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#fcb53b] inline-block"></span>
                        Likelihood x Severity = Risk Score
                    </h3>
                    <p class="text-slate-700 leading-relaxed text-base mb-4">Use Risk Score and Colour to determine Risk Management Plan.</p>
                    
                    <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm mb-6">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-emerald-500 text-white">
                                    <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wide w-48">Colour</th>
                                    <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wide">Meaning</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700">
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 align-top"><div class="w-full h-8 rounded bg-green-500"></div></td>
                                    <td class="px-6 py-3 align-top">Acceptable with ongoing review and monitoring for Continuous Improvement</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 align-top"><div class="w-full h-8 rounded bg-sky-500"></div></td>
                                    <td class="px-6 py-3 align-top">Acceptable but will require continued monitoring against a developed action plan</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 align-top"><div class="w-full h-8 rounded bg-orange-500"></div></td>
                                    <td class="px-6 py-3 align-top">Requires management approval to proceed but can be managed with mitigation of risk.</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-3 align-top"><div class="w-full h-8 rounded bg-red-500"></div></td>
                                    <td class="px-6 py-3 align-top">Cannot proceed, and is unacceptable as it currently exists. Will need to be fully reviewed and actioned immediately.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p>&nbsp;</p>
                </section>

            </div>
        </div>
    </div>
</div>

@endsection

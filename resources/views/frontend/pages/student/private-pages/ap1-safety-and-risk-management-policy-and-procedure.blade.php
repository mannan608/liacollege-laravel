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
                Safety and Risk Management Policy and Procedure
            </h1>
            <h1 class="text-3xl font-semibold text-brand-500 text-center mb-10">
                (AP1)
            </h1>

            <!-- Policy Statement -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Policy Statement
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    The purpose of the Safety and Risk Management Policy at Banksia Care is to meet our duty of care requirements for all stakeholders by developing and supporting a service culture where risk assessments are routinely undertaken to minimise risk of all Banksia Care operations and ensure the safety of all.
                </p>
            </div>

            <!-- Scope -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Scope
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    This policy applies to residents, staff, management, medical professionals, volunteers and visitors of Banksia Care.
                </p>
            </div>

            <!-- Background -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Background
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    The Royal Commission into Aged Care Quality and Safety (aged care royal commission) hearings (and others in industries outside our sector) illustrated the serious outcomes that occur when an organisation fails to manage risk with the level of attention it warrants. Banksia Care appreciates that the safety and wellbeing of everyone at our service are paramount to our core values and objectives. We also acknowledge that as far as reasonably practicable, we are responsible and accountable for the safety of all residents as well as anyone who is attending, visiting or providing services to Banksia Care. Due to their vulnerability, elderly people are susceptible to various risks, both within independent living arrangements and at aged care facilities. As managing risk is the responsibility of everyone, having the guidelines and ability to identify and manage risk increases everyone’s ability to make sound decisions.
                </p>
            </div>

            <!-- Legislative Requirements -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Legislative Requirements
                </h2>
                <ul class="list-disc pl-8 space-y-2 text-gray-700">
                    <li>Public Administrations Act 2004.</li>
                    <li>Occupational Health and Safety Act 2004.</li>
                    <li>Occupational Health and Safety Regulations 2017.</li>
                    <li>Australian and New Zealand Standard Risk Management Principles and Guidelines AS/NZS ISO 310002009</li>
                </ul>
            </div>

            <!-- Principles -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Principles that Inform our Policy
                </h2>
                <p class="text-gray-700 leading-relaxed mb-8 italic">
                    All decision-making about our <em>Safety and Risk Management Procedure</em> is carried out in accordance with the principles of our <em>Safety and Risk Management Policy</em>.
                </p>

                <p class="text-gray-700 mb-4">Banksia Care identifies the following as areas of potential risks, particularly in relation to the elderly:</p>
                <ul class="grid grid-cols-2 md:grid-cols-3 gap-3 text-gray-700 mb-8">
                    <li class="flex items-center gap-2"><span class="text-red-500">•</span> theft</li>
                    <li class="flex items-center gap-2"><span class="text-red-500">•</span> falling</li>
                    <li class="flex items-center gap-2"><span class="text-red-500">•</span> medication misuse</li>
                    <li class="flex items-center gap-2"><span class="text-red-500">•</span> malnutrition</li>
                    <li class="flex items-center gap-2"><span class="text-red-500">•</span> developing dementia</li>
                    <li class="flex items-center gap-2"><span class="text-red-500">•</span> not being treated correctly for medical issues</li>
                    <li class="flex items-center gap-2"><span class="text-red-500">•</span> depression</li>
                    <li class="flex items-center gap-2"><span class="text-red-500">•</span> elder abuse.</li>
                </ul>

                <p class="text-gray-700 mb-4 font-medium">At Banksia Care, all risk assessments will:</p>
                <ul class="list-disc pl-8 space-y-2 text-gray-700">
                    <li>outline the activity, location, participants and equipment</li>
                    <li>identify potential hazards</li>
                    <li>identify barriers to effective supervision</li>
                    <li>record who is at risk of harm</li>
                    <li>identify the likelihood and severity of harm (including rating the risk outcome)</li>
                    <li>record control measures</li>
                    <li>state any further action required</li>
                    <li>be given a risk score using the tables in the Safety and Risk Management Procedure.</li>
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
                                <th class="px-6 py-4 border-b border-gray-300 font-semibold text-brand-500 w-1/5">Term</th>
                                <th class="px-6 py-4 border-b border-gray-300 font-semibold text-brand-500">Meaning</th>
                                <th class="px-6 py-4 border-b border-gray-300 font-semibold text-brand-500 w-1/5">Source</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-5 font-medium">Hazard</td>
                                <td class="px-6 py-5 text-gray-700">
                                    A potential source of harm. Substances, events, or circumstances can constitute hazards when their nature would allow them, even just theoretically, to cause damage to health, life, property, or any other interest of value.
                                </td>
                                <td class="px-6 py-5 text-gray-600">Wikipedia</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5 font-medium">Risk</td>
                                <td class="px-6 py-5 text-gray-700">
                                    The probability of that harm being realised in a specific incident and the magnitude of potential harm make up its risk.
                                </td>
                                <td class="px-6 py-5 text-gray-600">Wikipedia</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Links -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Links to other Policies and Documents
                </h2>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 text-gray-700">
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Administration of Medication P&amp;P</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Risk Assessment and Management Plan</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Medication Log</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Incident, Injury, Illness and Trauma P&amp;P</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Duty of Care P&amp;P</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Staff Health and Wellbeing P&amp;P</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Workplace Health and Safety P&amp;P</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Emergency Management P&amp;P</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Hazard Report</li>
                    <li class="flex items-start gap-3"><span class="text-[#da591f] mt-1">•</span> Serious Incident Report</li>
                </ul>
            </div>

            <!-- Induction -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#da591f] mb-6 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#da591f] rounded"></span>
                    Induction and Ongoing Training
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Banksia Care requires that induction and ongoing training of all staff include the <em>Safety and Risk Management Policy</em> to enable staff to fulfil their roles effectively. In addition, Banksia Care promotes information sharing at staff meetings, sharing of information received from industry trends or changes in legislation, and consultation at policy review sessions.
                </p>
            </div>

            <!-- Policy Created -->
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
                    This policy will be reviewed annually or on the occurrence of any relevant legislative Management of Banksia Care will conduct reviews in consultation with educators at staff meetings.
                </p>
            </div>

            <!-- Procedure -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-brand-500 mb-10 text-center border-b-2 border-[#da591f] pb-6">
                    Safety and Risk Management Procedure
                </h2>

                <div class="space-y-12">
                    <div>
                        <h3 class="text-xl font-semibold text-sub[#da591f] mb-4">Management will facilitate the following:</h3>
                        <ul class="list-disc pl-8 space-y-3 text-gray-700">
                            <li>Ensure risk assessments are completed by delegation to key roles, including but not limited to car coordinators, residential managers, personal care workers, lifestyle team etc.</li>
                            <li>Encourage a “speak up” culture.</li>
                            <li>Utilise risk assessments to maintain safety compliance requirements and manage risk.</li>
                            <li>Ensure ongoing training is provided to all key roles to maintain compliance with risk management.</li>
                            <li>Provide all new staff with online training in risk management (at a minimum) and are aware of the responsibility for identifying and managing risk.</li>
                            <li>Provide staff with ongoing training on other areas of their work that could potentially cause risk – including but not limited to manual handling, lifting, use of equipment, nutrition, and mental health awareness.</li>
                            <li>Create a generic set of risk management assessments (manual handling, noise, working at heights, general equipment use, working alone/after hours etc.) but advise all key roles that these should be treated with caution and used as a starting point only.</li>
                            <li>Ensure contractors are responsible for their own risk assessments and will not allow external work orders to commence without first sighting and approving the assessment.</li>
                            <li>Create a documented framework for managing risk, using an ‘identify, detect and respond’ risk cycle.</li>
                            <li>Establish clear expectations for conduct and accountabilities for risk.</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-sub[#da591f] mb-4">Key roles will ensure the following:</h3>
                        <ul class="list-disc pl-8 space-y-3 text-gray-700">
                            <li>Comply with Banksia Care’s Safety and Risk Management Policy.</li>
                            <li>Implement a documented framework for managing risk, using an ‘identify, detect and respond’ risk cycle.</li>
                            <li>Complete a risk assessment for any activity organised that falls under their area of control/management.</li>
                            <li>Encourage a “speak up” culture.</li>
                            <li>Ensure that any risk identified is either removed or adequately reduced and fully controlled.</li>
                            <li>Assist in ongoing training and awareness of all staff they supervise in relation to risk management expectations.</li>
                            <li>Maintain the risk assessment register and ensure it is always up to date and accessible.</li>
                            <li>Review the register annually to ensure ongoing compliance related to any former risk identified through a risk assessment.</li>
                            <li>Identify the types of manual handling equipment available and determine what equipment best suits both residents and staff.</li>
                            <li>Understand that the level of risk may change daily, and a prepared risk assessment will need to be reviewed the activity occurs. For example, changes in weather can change the level of risk.</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-sub[#da591f] mb-4">All staff will ensure the following:</h3>
                        <ul class="list-disc pl-8 space-y-3 text-gray-700">
                            <li>Be responsible for their own safety and that of residents and visitors.</li>
                            <li>Cooperate with management and key roles in minimising any identified risk as a matter of critical importance.</li>
                            <li>Adopt a ‘speak up’ culture.</li>
                            <li>Follow an ‘identify, detect and respond’ risk cycle.</li>
                            <li>Follow all safety systems implemented when a risk is identified.</li>
                            <li>Report any observed potential risk/defect to their manager as soon as identified.</li>
                            <li>Undertake manual handling training on how to use specific equipment for lifting, transferring and repositioning residents.</li>
                            <li>Develop the skills to use manual handling equipment efficiently.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Risk Matrix -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-brand-500 mb-8 text-center">Determining a Risk Score and Risk Management Plan</h2>

                <!-- Risk Matrix -->
                <div class="overflow-x-auto mb-12">
                    <table class="risk-table w-full border border-gray-400 text-sm">
                        <thead>
                            <tr class="bg-emerald-300">
                                <th rowspan="2" class="border border-gray-400 font-bold">Likelihood</th>
                                <th colspan="5" class="border border-gray-400 font-bold text-center">Severity</th>
                            </tr>
                            <tr class="bg-emerald-200">
                                <th class="border border-gray-400">Trivial (1)</th>
                                <th class="border border-gray-400">Minor (2)</th>
                                <th class="border border-gray-400">Moderate (3)</th>
                                <th class="border border-gray-400">Major (4)</th>
                                <th class="border border-gray-400">Significant (5)</th>
                            </tr>
                        </thead>
                        <tbody class="text-center font-medium">
                            <tr>
                                <td class="bg-emerald-200 border border-gray-400 font-semibold">Rare (1)</td>
                                <td class="bg-emerald-400">1</td>
                                <td class="bg-emerald-400">2</td>
                                <td class="bg-emerald-400">3</td>
                                <td class="bg-sky-400">4</td>
                                <td class="bg-sky-400">5</td>
                            </tr>
                            <tr>
                                <td class="bg-emerald-200 border border-gray-400 font-semibold">Unlikely (2)</td>
                                <td class="bg-emerald-400">2</td>
                                <td class="bg-emerald-400">4</td>
                                <td class="bg-sky-400">6</td>
                                <td class="bg-orange-400">8</td>
                                <td class="bg-orange-400">10</td>
                            </tr>
                            <tr>
                                <td class="bg-emerald-200 border border-gray-400 font-semibold">Possible (3)</td>
                                <td class="bg-emerald-400">3</td>
                                <td class="bg-sky-400">6</td>
                                <td class="bg-orange-400">9</td>
                                <td class="bg-orange-400">12</td>
                                <td class="bg-red-400">15</td>
                            </tr>
                            <tr>
                                <td class="bg-emerald-200 border border-gray-400 font-semibold">Likely (4)</td>
                                <td class="bg-sky-400">4</td>
                                <td class="bg-orange-400">8</td>
                                <td class="bg-orange-400">12</td>
                                <td class="bg-red-400">16</td>
                                <td class="bg-red-400">20</td>
                            </tr>
                            <tr>
                                <td class="bg-emerald-200 border border-gray-400 font-semibold">Certain (5)</td>
                                <td class="bg-sky-400">5</td>
                                <td class="bg-orange-400">10</td>
                                <td class="bg-red-400">15</td>
                                <td class="bg-red-400">20</td>
                                <td class="bg-red-400">25</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Likelihood Table -->
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold text-sub[#da591f] mb-6">Assess the Likelihood</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-400">
                            <thead>
                                <tr class="bg-emerald-300">
                                    <th class="px-6 py-3 text-left border border-gray-400">Likelihood</th>
                                    <th class="px-6 py-3 text-left border border-gray-400">Score</th>
                                    <th class="px-6 py-3 text-left border border-gray-400">Meaning</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <tr>
                                    <td class="px-6 py-4 bg-emerald-100">Rare</td>
                                    <td class="px-6 py-4 bg-emerald-100 text-center">1</td>
                                    <td class="px-6 py-4">The likelihood of this happening is probably never or extremely rare</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 bg-emerald-100">Unlikely</td>
                                    <td class="px-6 py-4 bg-emerald-100 text-center">2</td>
                                    <td class="px-6 py-4">Although you shouldn’t expect it to happen, it is always possible it may.</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 bg-emerald-100">Possible</td>
                                    <td class="px-6 py-4 bg-emerald-100 text-center">3</td>
                                    <td class="px-6 py-4">There is the possibility this could reoccur or happen occasionally.</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 bg-emerald-100">Likely</td>
                                    <td class="px-6 py-4 bg-emerald-100 text-center">4</td>
                                    <td class="px-6 py-4">It will more than likely happen or reoccur but not a persisting issue.</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 bg-emerald-100">Certain</td>
                                    <td class="px-6 py-4 bg-emerald-100 text-center">5</td>
                                    <td class="px-6 py-4">It will happen or reoccur, even frequently.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Severity Table -->
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold text-sub[#da591f] mb-6">Assess the Severity</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-400">
                            <thead>
                                <tr class="bg-emerald-300">
                                    <th class="px-6 py-3 text-left border border-gray-400">Severity</th>
                                    <th class="px-6 py-3 text-left border border-gray-400">Score</th>
                                    <th class="px-6 py-3 text-left border border-gray-400">Meaning</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <tr>
                                    <td class="px-6 py-4 bg-emerald-100">Trivial</td>
                                    <td class="px-6 py-4 bg-emerald-100 text-center">1</td>
                                    <td class="px-6 py-4">No injury – Minor property damage</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 bg-emerald-100">Minor</td>
                                    <td class="px-6 py-4 bg-emerald-100 text-center">2</td>
                                    <td class="px-6 py-4">Slightly harmful – minor cuts and abrasions. Some property damage but minimal and minor.</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 bg-emerald-100">Moderate</td>
                                    <td class="px-6 py-4 bg-emerald-100 text-center">3</td>
                                    <td class="px-6 py-4">Harmful – Lacerations, sprains, minor fractures, asthma, minor burns. Property damage that requires contract work. Interruption to business for less than a day.</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 bg-emerald-100">Major</td>
                                    <td class="px-6 py-4 bg-emerald-100 text-center">4</td>
                                    <td class="px-6 py-4">Extremely harmful – Permanent disability, major fractures, deafness, anaphylaxis reaction, disease. Major impact to the business of 2-5 days.</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 bg-emerald-100">Significant</td>
                                    <td class="px-6 py-4 bg-emerald-100 text-center">5</td>
                                    <td class="px-6 py-4">Fatal – Could result in a fatality or loss of buildings. Could also include or involve interruption to business for 5 or more days.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Risk Level Table -->
                <div>
                    <h3 class="text-2xl font-semibold text-sub[#da591f] mb-6">Likelihood × Severity = Risk Score</h3>
                    <p class="mb-6 text-gray-700">Use Risk Score and Colour to determine Risk Management Plan.</p>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-400">
                            <thead>
                                <tr class="bg-emerald-300">
                                    <th class="px-8 py-4 text-left border border-gray-400">Colour</th>
                                    <th class="px-8 py-4 text-left border border-gray-400">Meaning</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-8 py-6 bg-emerald-400 border border-gray-400"></td>
                                    <td class="px-8 py-6">Acceptable with ongoing review and monitoring for Continuous Improvement</td>
                                </tr>
                                <tr>
                                    <td class="px-8 py-6 bg-sky-400 border border-gray-400"></td>
                                    <td class="px-8 py-6">Acceptable but will require continued monitoring against a developed action plan</td>
                                </tr>
                                <tr>
                                    <td class="px-8 py-6 bg-orange-400 border border-gray-400"></td>
                                    <td class="px-8 py-6">Requires management approval to proceed but can be managed with mitigation of risk.</td>
                                </tr>
                                <tr>
                                    <td class="px-8 py-6 bg-red-400 border border-gray-400"></td>
                                    <td class="px-8 py-6">Cannot proceed, and is unacceptable as it currently exists. Will need to be fully reviewed and actioned immediately.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
 <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', system-ui, sans-serif;
        }
        .tail-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .risk-table td, .risk-table th {
            padding: 12px 8px;
            text-align: center;
            border: 1px solid #d1d5db;
        }
    </style>
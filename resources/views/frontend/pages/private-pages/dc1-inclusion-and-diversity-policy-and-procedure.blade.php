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
                        Inclusion and Diversity Policy and Procedure
                    </h1>
                    <p class="text-2xl font-bold text-[#e6bb73] mt-2">(DC1)</p>
                </div>

                <!-- Policy Statement -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Policy Statement</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        The purpose of the Inclusion and Diversity Policy at Lia College is to ensure the safety, wellbeing and
                        protection of our residents is the paramount consideration in all decisions staff make and is
                        managed in accordance with professional standards, community expectations and legal requirements.
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
                        Lia College recognises that everyone has the right to be treated with fairness and equity. It is of
                        utmost importance that our stakeholders feel a sense of belonging and are respected for their
                        individual needs. We aim to support the wellbeing of others and embrace individual and cultural
                        diversity. Lia College actively supports the inclusion of all residents and provides an environment
                        which is free from bias and prejudice in which everyone benefits from the principles of fairness and
                        respect.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Legislative Requirements -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Legislative Requirements</h2>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-[#132b4e]">
                        <li>Public Service Act 1999</li>
                        <li>Racial Discrimination Act 1975</li>
                        <li>Sex Discrimination Act 1984</li>
                        <li>Workplace Health and Safety Act 2011</li>
                        <li>Age Discrimination Act 2004</li>
                        <li>Disability Discrimination Act 1992</li>
                        <li>Fair Work Act 2009</li>
                    </ul>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Principles -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Principles that Inform our Policy</h2>
                    <p class="text-slate-700 leading-relaxed text-base mb-4">
                        All decision making about our <em>Inclusion and Diversity Procedure</em> is carried out in accordance
                        with the principles of our <em>Inclusion and Diversity Policy</em>.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-base mb-4">
                        Lia College is diverse. Every resident brings their own unique set of strengths and challenges.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-base mb-4">
                        Our <em>Inclusion and Diversity Policy</em> ensures that all stakeholders have the strategies needed
                        to understand and accept cultural diversity and embracing each resident's uniqueness within our
                        service.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-base mb-4">
                        Our Wellbeing and Support Team will assist and encourage all stakeholders to be culturally competent
                        and respect different ways of being, benefits of diversity and honouring differences.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-base mb-4">
                        Our Inclusion and Diversity Policy refers to the following:
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-slate-700 leading-relaxed marker:text-[#132b4e]">
                        <li>Cultural awareness and inclusion.</li>
                        <li>Implementation of gender equity.</li>
                        <li>Diversity in family household.</li>
                        <li>Guidance and support of Indigenous and Torres Strait Islander people.</li>
                        <li>Supporting and inclusion of additional needs.</li>
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
                                    <td class="px-6 py-4 font-medium text-[#132b4e] align-top">Diversity</td>
                                    <td class="px-6 py-4 leading-relaxed align-top">
                                        Diversity includes characteristics such as age, ethnicity, gender,
                                        intellectual and/or physical ability, cultural background, sexual orientation,
                                        gender identity, or intersex status.
                                        <p class="mt-2">
                                            Diversity extends to aspects, such as education, socioeconomic background, faith,
                                            marital status, family responsibilities, thinking styles, experience and work
                                            styles.
                                        </p>
                                    </td>
                                    <td class="px-6 py-4 align-top">www.business.gov.au</td>
                                </tr>
                                <tr class="bg-slate-50 hover:bg-slate-100 transition-colors">
                                    <td class="px-6 py-4 font-medium text-[#132b4e] align-top">Staff</td>
                                    <td class="px-6 py-4 leading-relaxed align-top">
                                        Any person employed by the service to work in our facilityies or
                                        corporate support role in a permanent, temporary, casual, or contractual capacity.
                                    </td>
                                    <td class="px-6 py-4 align-top">www.business.gov.au</td>
                                </tr>
                                <tr class="bg-white hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-[#132b4e] align-top">Inclusion</td>
                                    <td class="px-6 py-4 leading-relaxed align-top">
                                        Inclusion is the way an organisation's culture, values, workplaces
                                        and
                                        behaviours make a person feel valued, included and able to participate fully. It
                                        relates
                                        to a work environment where all people are treated fairly and respectfully, with
                                        equality of opportunity.
                                    </td>
                                    <td class="px-6 py-4 align-top">https://www.dca.org.au/topics/inclusion</td>
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
                        <li>Anti-Discrimination Act 1991</li>
                        <li>Sex Discrimination Act 1984</li>
                        <li>National Vocational Education and Training Regulator (Transitional Provisions) Act 2011</li>
                        <li>Sex Discrimination Amendment (Sexual Orientation, Gender, Identity and Intersex Status) Act 2013</li>
                    </ul>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Induction -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Induction and Ongoing Training</h2>
                    <p class="text-slate-700 leading-relaxed text-base">
                        Lia College requires that induction and ongoing training of all staff include the <em>Inclusion and
                            Diversity Policy</em> to enable staff to fulfil their roles effectively. In addition, Lia College
                        Care promotes information sharing at staff meetings, sharing of information received from industry
                        trends or changes in legislation, and in consultation at policy review sessions.
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
                        This policy will be reviewed annually or on occurrence of any relevant legislative Management of
                        Lia College will conduct reviews in consultation with the team at staff meetings.
                    </p>
                </section>

                <ul class="my-4 list-none"></ul>

                <!-- Procedure -->
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-[#e6bb73] mb-4 border-l-4 border-[#e6bb73] pl-4">Inclusion and Diversity Procedure</h2>
                    <p class="text-slate-700 leading-relaxed text-base mb-6">
                        Lia College will achieve an inclusive environment for all residents through the following actions:
                    </p>
                    <ul class="list-disc list-inside space-y-4 text-slate-700 leading-relaxed marker:text-[#132b4e]">
                        <li>Implementation of Gender Equity (residents and staff):
                            <ul class="list-disc list-inside ml-6 mt-2 space-y-2 marker:text-[#132b4e]">
                                <li>Staff will monitor and reflect on their own interactions for bias.</li>
                                <li>Gender-inclusive language will be used where appropriate.</li>
                                <li>Staff will promote gender equality wherever possible.</li>
                                <li>Provide facilities appropriate to the needs of the individual.</li>
                                <li>Promote compliance with relevant legislation concerning discrimination and privacy.</li>
                                <li>Support residents in their choice of personal pronoun in everyday use.</li>
                                <li>Support the rights of each resident and staff to dress in accordance with their gender
                                    identity.</li>
                                <li>Challenge stereotypes that promote prejudicial and biased behaviours and practices.</li>
                                <li>Celebrate events that support the wellbeing and positive identity of gender and
                                    sexuality diverse students.</li>
                            </ul>
                        </li>
                        <li>Cultural awareness and inclusions:
                            <ul class="list-disc list-inside ml-6 mt-2 space-y-2 marker:text-[#132b4e]">
                                <li>Staff, residents and families will be provided with resources and opportunities to learn
                                    about culture, cultural safety and cultural awareness.</li>
                                <li>Staff will work together to learn about each other as well as working with residents and
                                    families to establish relevant cultural competence.</li>
                                <li>Staff will respectfully assist residents in learning about similarities and differences
                                    when making inappropriate cultural statements.</li>
                                <li>Staff will help residents to become aware of our shared physical characteristics of what
                                    makes us all human.</li>
                                <li>Lia College will value and recognise cultural diversity through Multicultural
                                    Celebrations.</li>
                            </ul>
                        </li>
                        <li>Guidance and support of Indigenous and Torres Strait Islander People:
                            <ul class="list-disc list-inside ml-6 mt-2 space-y-2 marker:text-[#132b4e]">
                                <li>Staff will deepen their knowledge and understanding of Indigenous and Torres Strait
                                    Islander culture by attending professional development, reading current information and
                                    regularly reflecting together as a team to embed Indigenous and Torres Strait Islander
                                    perspectives and culture.</li>
                                <li>To develop an acknowledgment of the country, which will be displayed and demonstrated at
                                    special events at Lia College.</li>
                                <li>Staff will show respect for the Indigenous and Torres Strait Islander culture, aiming to
                                    instil sensitivity/appreciation of the culture and a knowing and valuing of individuals.</li>
                                <li>Lia College will ensure the organisation is made accessible to Aboriginal and Torres Strait
                                    Islander students to access academic, social and cultural support through targeted
                                    programs.</li>
                                <li>Staff will show sensitivity and respect to the numerous Indigenous and Torres Strait
                                    Islander languages by incorporating, where possible verbal and visual language into the
                                    environment.</li>
                                <li>Lia College will commit to a NAIDOC celebration each year.</li>
                                <li>Staff will access and encourage involvement of the Indigenous and Torres Strait Islander
                                    families, staff and community members who have a vast knowledge of their culture.</li>
                            </ul>
                        </li>
                        <li>Supporting and inclusion of additional needs:
                            <ul class="list-disc list-inside ml-6 mt-2 space-y-2 marker:text-[#132b4e]">
                                <li>Staff will work collaboratively with residents, families and specialists to understand
                                    and support individual needs.</li>
                                <li>Staff will undergo professional development to increase knowledge of additional need
                                    varieties and develop skills to support them.</li>
                                <li>Lia College will wherever possible, provide the required resources to support residents
                                    – ex-visual aids.</li>
                                <li>Provide Individualised Planning processes.</li>
                            </ul>
                        </li>
                        <li>Lia College offers the following support services to all residents:
                            <ul class="list-disc list-inside ml-6 mt-2 space-y-2 marker:text-[#132b4e]">
                                <li>personal support</li>
                                <li>social support</li>
                                <li>domestic support</li>
                                <li>respite for carers</li>
                                <li>allied health</li>
                                <li>home safety audit</li>
                                <li>home modifications and maintenance.</li>
                            </ul>
                        </li>
                        <li>Lia College links with many support services, including:
                            <ul class="list-disc list-inside ml-6 mt-2 space-y-2 marker:text-[#132b4e]">
                                <li>Headspace</li>
                                <li>Beyond Blue</li>
                                <li>True Relationships and Reproductive Health</li>
                                <li>Disability Employment Services</li>
                                <li>Disability Services – NDIS</li>
                                <li>Family and Domestic Violence Services.</li>
                            </ul>
                        </li>
                    </ul>
                </section>

            </div>
        </div>
    </div>
</div>

@endsection
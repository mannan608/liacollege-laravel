@extends('frontend.lia-collage.layouts.app')

@section('content')
    <div class="private-page-container">
        <div class="private-page py-5">

            <!-- Back Button -->
            <div class="py-6 pb-5">
                <a href="{{ route('student.dashboard') }}"
                    class="btn btn-success d-inline-flex align-items-center gap-2 px-5 py-3" style="font-size: 16px">
                    <i class="bi bi-arrow-left"></i>
                    Back to Dashboard
                </a>
            </div>

            <div class="">
                <div class="et_pb_module et_pb_post_content et_pb_post_content_0_tb_body">




                    <h1><span style="color: #006d5d;">Individualised Plans Policy and Procedure</span></h1>
                    <h1><span style="color: #006d5d;">(AP4)</span></h1>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Policy Statement</span></h2>
                    <p>The purpose of the Individualised Plans Policy is to ensure that Banksia Care works in partnership
                        with consumers to plan their care and services appropriately. The planned care and services should
                        meet each consumer’s needs, goals and preferences and optimise their health and wellbeing. This
                        policy aligns with the Australian Government Aged Care Quality and Safety Commission standards.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Scope</span></h2>
                    <p>This policy applies to Banksia Care consumers, representatives of consumers, external service
                        providers, Banksia Care board members, staff, management and medical professionals.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Background</span></h2>
                    <p>Banksia Care embeds a person-centred care approach to service delivery. This requires prioritising
                        the consumer’s aspirations and strengths within the context of their capacity. It enables the
                        planning of care and services to align with individualised needs whilst providing opportunities for
                        consumer self-agency, participation and growth. Consistent review of care and services also ensures
                        changes and development in consumer health or abilities are identified in a timely manner with
                        appropriate responses actioned to minimise the impact of any loss of ability and to support
                        consumers to live their day-to-day lives with dignity and choice. Involving consumers in the
                        planning process and decision-making will assist consumers in making informed decisions about their
                        options, including how much they want to be involved and consideration of their capacity.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Legislative Requirements</span></h2>
                    <ul>
                        <li>Aged Care Act 1997 (Cth) User Rights Amendment (Charter of Aged Care Rights) Principles 2019
                        </li>
                        <li>Privacy Act 1988 (Cth), Schedule 1, Australian Privacy Principles</li>
                        <li>Aged Care Quality Standards – Standard 1, Consumer dignity and choice, Standard 2 – Ongoing
                            Assessment and planning with consumers</li>
                        <li>Quality of Care Principles 2014</li>
                        <li>Privacy Act 1988</li>
                        <li>State and Territory mental health, guardianship and administration, enduring power of attorney
                            and medical directive/advance care planning legislation</li>
                        <li>National Disability Service Standards</li>
                        <li>NDIS Practice Standards</li>
                        <li>UN Convention on the Rights of Persons with Disabilities</li>
                    </ul>
                    <h2><span style="color: #da591f;">Principles that Inform our Policy</span></h2>
                    <p>All decision-making about our Individualised Plans Procedure is conducted in accordance with the
                        principles of our Individualised Plans Policy.</p>
                    <h3><span style="color: #fcb53b;">In Relation to Consumer Needs</span></h3>
                    <ul>
                        <li>Banksia Care has a culture of inclusion and respect for consumers.</li>
                        <li>Banksia Care supports consumers to exercise choice and independence and actively partners with
                            the consumer to inform ongoing care assessment and planning.</li>
                        <li>Banksia Care will carry out an ongoing assessment and planning with the consumer, their
                            representatives and others who the consumer wants to be involved in their care and services
                            assessment and planning.</li>
                        <li>Consistent and ongoing sharing of information, asking for feedback from the consumer, and
                            supporting and encouraging consumers to take part in assessing and planning their own care and
                            services are paramount and aligned with a person-centred practice approach.</li>
                        <li>A person-centred approach recognises that making decisions about their own life, and having
                            those decisions respected, is an essential right of each consumer. It improves their health and
                            wellbeing and demonstrates the organisation’s values to the consumer.</li>
                        <li>The consumer may choose to have a relative, partner, or friend as a representative involved in
                            decisions about their care. Where a consumer cannot make decisions, they may have a court or
                            tribunal-appointed guardian to make decisions on their behalf.</li>
                        <li>Assessment and planning are also expected to include other organisations, individuals or service
                            providers involved in caring for consumers. Banksia Care will ensure an effective communication
                            framework is in place with other service providers and relevant other parties such as unpaid
                            carers, family and friends. Collaborative assessment and planning (if the consumer wishes) can
                            help Banksia Care improve its knowledge and sensitivity related to the consumer’s needs, goals
                            and preferences and improve continuity of care and services for the consumer.</li>
                        <li>Banksia Care respects consumer privacy and will comply with obligations relating to the privacy
                            of information when coordinating care and information exchange with other organisations,
                            individuals or service providers.</li>
                    </ul>
                    <h2><span style="color: #da591f;">Key Terms</span></h2>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered mb-0" style="min-width: 760px;">
                            <thead>
                                <tr>
                                    <td width="145"><strong>Term</strong></td>
                                    <td width="308"><strong>Meaning</strong></td>
                                    <td width="151"><strong>Source</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="145">Consumer</td>
                                    <td width="308">A person to whom an approved provider provides, or is to provide,
                                        care
                                        through an aged care service.<p></p>
                                        <p>A reference to a consumer in a provision of the Aged Care Quality Standards set
                                            out
                                            in Schedule 2 includes a reference to a representative of the consumer, so far
                                            as
                                            the provision is capable of applying to a representative of a consumer.</p>
                                    </td>
                                    <td width="151">Quality of Care Principles 2014</td>
                                </tr>
                                <tr>
                                    <td width="145">Representative</td>
                                    <td width="308">A person nominated by the consumer as a person to be told about
                                        matters
                                        affecting the consumer; or<p></p>
                                        <p>A person:</p>
                                        <p>§&nbsp; who nominates themselves as a person to be told about matters affecting a
                                            consumer; and</p>
                                        <p>§&nbsp; who the relevant organisation is satisfied has a connection with the
                                            consumer
                                            and is concerned for the safety, health and wellbeing of the consumer.</p>
                                    </td>
                                    <td width="151">Quality of Care Principles 2014</td>
                                </tr>
                                <tr>
                                    <td width="145">Person Centred Approach</td>
                                    <td width="308">Supports the person, at the ‘centre of the service’, to be involved
                                        in
                                        making decisions about their life.<p></p>
                                        <p>Considers each person’s life experience, age, gender, culture, heritage,
                                            language,
                                            beliefs and identity.</p>
                                        <p>Requires flexible services and support to suit the person’s wishes and priorities
                                        </p>
                                    </td>
                                    <td width="151">NSW Department of Health</td>
                                </tr>
                                <tr>
                                    <td width="145">Individualised Plan</td>
                                    <td width="308">Outlines your care needs, the types of services you will receive to
                                        meet
                                        those needs, who will provide the services and when. It will be developed by your
                                        service provider in consultation with you.</td>
                                    <td width="151">Aged Care Guide</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Links to other Policies and Documents</span></h2>
                    <ul>
                        <li>Reporting and Recording Behaviour Policy and Procedures</li>
                        <li>Duty of Care Policy and Procedures</li>
                        <li>Management of Care and Service Policy and Procedures</li>
                        <li>Staff Health and Wellbeing Policy and Procedures</li>
                        <li>Confidentiality Policy and Procedures</li>
                        <li>Complaints and Appeals Policy and Procedures</li>
                        <li>Communications Policy and Procedures</li>
                        <li>Privacy Policy and Procedures</li>
                    </ul>
                    <h2><span style="color: #da591f;">Induction and Ongoing Training</span></h2>
                    <p>Banksia Care requires that induction and ongoing training of all staff include the Individualised
                        Plans Policy to enable staff to fulfil their roles effectively.</p>
                    <p>Banksia Care promotes information sharing at staff meetings, sharing of information received from
                        industry trends or changes in legislation, and in consultation at policy review sessions.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Policy Created/Reviewed</span></h2>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered mb-0" style="min-width: 760px;">
                            <tbody>
                                <tr>
                                    <td width="198"><strong>Policy Created/ Reviewed</strong></td>
                                    <td width="255"><strong>Modifications</strong></td>
                                    <td width="151"><strong>Next Review Date</strong></td>
                                </tr>
                                <tr>
                                    <td width="198">Implemented December 2022</td>
                                    <td width="255"></td>
                                    <td width="151">May 2023</td>
                                </tr>
                                <tr>
                                    <td width="198">
                                        <ul></ul>
                                    </td>
                                    <td width="255">
                                        <ul></ul>
                                    </td>
                                    <td width="151">
                                        <ul></ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Monitoring, Evaluation and Review</span></h2>
                    <p>This policy will be reviewed every three years or on the occurrence of any relevant legislative
                        change. Management of Banksia Care will conduct reviews in consultation with the team at staff
                        meetings.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Individualised Plans Procedure</span></h2>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Prior to Service Entry</span></h3>
                    <ul>
                        <li>Consultation will take place with the person and their family, advocate, guardian and/or others
                            as appropriate, about the various perceptions of the person’s needs and issues which may impact
                            the delivery of services.</li>
                        <li>Communication and support needs of the individual who will be receiving services from Banksia
                            Care will be addressed to maximise their participation in the planning process.</li>
                        <li>Staff responsible for the individualised plan will take the time to get to know the person (and
                            family) and facilitate opportunities to express aspirations, preferences, and choices. All
                            information provided to people will be in a format they can understand.</li>
                    </ul>
                    <h3><span style="color: #fcb53b;">On entry to the Service</span></h3>
                    <ul>
                        <li>An initial Individualised Plan will be developed reflecting the needs and aspirations of the
                            person and/or family and the support required to meet those needs.</li>
                        <li>One or more planning meetings will be coordinated to develop the plan. Meetings will be at times
                            and venues convenient to everyone involved to maximise the participation of key people.</li>
                        <li>The individualised plan may be informed by other people who know the person, but it must be
                            person-centred and reflect the decisions and choices of the individual service user first and
                            foremost.</li>
                    </ul>
                    <h3><span style="color: #fcb53b;">Content of the Plan</span></h3>
                    <ul>
                        <li>The individualised plan will include goals (and support required) for each of the following:
                            <ul>
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
                        <li>Individualised plans may include support to be provided by family, social networks and/or other
                            services.</li>
                        <li>Some goals will be clearly defined, while others may be vague or exploratory. Goals must be
                            realistic.</li>
                        <li>The individualised plan will set clearly defined measurable and achievable targets within the
                            time given frames.</li>
                        <li>Once agreed, a copy of the plan will be made available to the person/family in a format they can
                            understand (and may also be provided to family members and guardians/administrators where
                            appropriate and with the consent of the person if an adult).</li>
                    </ul>
                    <h3><span style="color: #fcb53b;">&nbsp;Monitoring and Reviewing the Plan</span></h3>
                    <ul>
                        <li>The individualised plan is a living document that can be modified or reviewed when required.
                        </li>
                        <li>After the first three months of service delivery, the initial plan will be reviewed.</li>
                        <li>At a minimum, the individualised plan will be reviewed and redeveloped every 12 months (a more
                            frequent schedule may be appropriate for children and young adults).</li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
@endsection

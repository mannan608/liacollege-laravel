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




                    <h1><span style="color: #006d5d;">Intervention and Notification Policy and Procedure</span></h1>
                    <h1><span style="color: #006d5d;">(G5)</span></h1>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Policy Statement</span></h2>
                    <p>At Banksia Care, we aim to create a safe, nurturing and empowering environment for clients “where
                        individual needs are met to enable everyone to maintain optimum levels of physical, social and
                        emotional wellbeing”. We strive to protect the rights and dignity of individuals in our care at all
                        times. This policy outlines the acceptable interventions to be used at Banksia Care to respond to
                        residents’ challenging, inappropriate or harmful behaviour.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Scope</span></h2>
                    <p>This policy applies to staff, management, contractors and volunteers of Banksia Care.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Background</span></h2>
                    <p>In order to balance the rights and safety of our clients, this policy aims to provide clear guidance
                        on the use of interventions to respond to residents’ challenging, inappropriate or harmful
                        behaviour.</p>
                    <p>The objectives are:</p>
                    <ul>
                        <li>to encourage and provide a framework for using Positive Behaviour Support as the preferred main
                            system for managing challenging behaviours</li>
                        <li>to ensure restrictive practices are only used as an absolute last resort in response to risk of
                            harm and only after first attempting to use preferred strategies (Positive Behaviour Support)
                        </li>
                        <li>to ensure that staff are educated about prohibited practices and are aware of Banksia Care’s
                            zero-tolerance approach to the use of these practices.</li>
                    </ul>
                    <h2><span style="color: #da591f;">Legislative Requirements</span></h2>
                    <ul>
                        <li>National Disability Insurance Scheme (Restrictive Practices and Behaviour Support) Rules 2018
                        </li>
                        <li>National Disability Insurance Scheme Act 2013</li>
                        <li>Work Health and Safety Act 2011</li>
                        <li>Work Health and Safety Regulations 2011</li>
                        <li>Aged Care Quality and Safety Commission Act 2018</li>
                        <li>Aged Care Quality and Safety Commission Rules 2018 (Rules)</li>
                        <li>Aged Care Act 1997</li>
                        <li>Disability Discrimination Act 1992</li>
                        <li>Age Discrimination Act 1992</li>
                        <li>Australian Human Rights Commission Act 1986</li>
                    </ul>
                    <h2><span style="color: #da591f;">Principles that Inform our Policy</span></h2>
                    <p>All decision-making about our Intervention and Notification Procedure is conducted in accordance with
                        the principles of our Intervention and Notification Policy. The procedure outlines how interventions
                        will be used and what reporting obligations must be followed.</p>
                    <p>At Banksia Care, we uphold and protect the rights and dignity of clients in our care. We seek to
                        create an environment where each client enjoys optimum levels of physical, social and emotional
                        wellbeing.</p>
                    <p>To this end, we commit to adopting person-centred, right-based approaches in our response to
                        challenging behaviours.</p>
                    <p>Our approach seeks to:</p>
                    <ul>
                        <li>understand the person and the environment as well as the behaviour</li>
                        <li>understand the underlying causes of challenging behaviour and address them</li>
                        <li>to use positive, evidence-based approaches</li>
                        <li>to involve the client as an active participant in assessment and establishing positive behaviour
                            support</li>
                        <li>respond to feedback</li>
                        <li>be accountable to clients and their family members</li>
                        <li>comply with legislative requirements through clear reporting.</li>
                    </ul>
                    <h2><span style="color: #da591f;">Key Terms</span></h2>
                   <div class="table-responsive mt-3">
    <table class="table table-bordered mb-0" style="min-width: 760px;">
                        <thead>
                            <tr>
                                <td width="160"><strong>Term</strong></td>
                                <td width="255"><strong>Meaning</strong></td>
                                <td width="226"><strong>Source</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="160">Behaviour Support Plan (BSP)</td>
                                <td width="255">Any resident that requires behaviour support must have a Behaviour
                                    Support Plan (BSP) included in their care plan. BSPs are developed in collaboration with
                                    the client, their family members, and an authorised NDIS behaviour support practitioner.
                                </td>
                                <td width="226"><a
                                        href="https://www.ndiscommission.gov.au/providers/understanding-behaviour-support-and-restrictive-practices-providers">https://www.ndiscommission.gov.au/providers/understanding-behaviour-support-and-restrictive-practices-providers</a>
                                </td>
                            </tr>
                            <tr>
                                <td width="160">Behaviours of concern (also termed challenging behaviour)</td>
                                <td width="255">refers to challenging and difficult behaviours exhibited by people with a
                                    disability that impact the safety of themselves or others, or cause damage to property.
                                </td>
                                <td width="226"><a href="https://www.facs.nsw.gov.au">https://www.facs.nsw.gov.au</a>
                                </td>
                            </tr>
                            <tr>
                                <td width="160">Restrictive practice</td>
                                <td width="255">A restrictive practice is any practice or intervention that has the
                                    effect of restricting the rights or freedom of movement of an aged care consumer</td>
                                <td width="226"><a href="https://www.facs.nsw.gov.au">https://www.facs.nsw.gov.au</a>
                                </td>
                            </tr>
                            <tr>
                                <td width="160">Chemical restraint</td>
                                <td width="255">Chemical restraint involves the use of medication or a chemical substance
                                    to modify a client’s behaviour.</td>
                                <td width="226"><a
                                        href="https://www.ndiscommission.gov.au">https://www.ndiscommission.gov.au</a></td>
                            </tr>
                            <tr>
                                <td width="160">Environmental restraint</td>
                                <td width="255">Environmental restraint involves restricting the client’s free movement
                                    through the environment.</td>
                                <td width="226"><a
                                        href="https://www.ndiscommission.gov.au">https://www.ndiscommission.gov.au</a></td>
                            </tr>
                            <tr>
                                <td width="160">Physical restraint</td>
                                <td width="255">Physical restraint involves the use of physical restrictions to control a
                                    client’s physical movements to modify a client’s behaviour</td>
                                <td width="226"><a
                                        href="https://www.ndiscommission.gov.au">https://www.ndiscommission.gov.au</a></td>
                            </tr>
                            <tr>
                                <td width="160">Mechanical restraint</td>
                                <td width="255">Mechanical restraint involves using equipment or a device to restrict the
                                    client’s movement to modify behaviour</td>
                                <td width="226">Banksia Care</td>
                            </tr>
                            <tr>
                                <td width="160">Seclusion</td>
                                <td width="255">Seclusion involves confining a client in an area alone to modify their
                                    behaviour.</td>
                                <td width="226">Banksia Care</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Links to other Policies and Documents</span></h2>
                    <ul>
                        <li>Reporting and Recording Behaviour Policy and Procedures</li>
                        <li>Duty of Care Policy and Procedures</li>
                        <li>Restrictive Practices Policy and Procedures</li>
                        <li>Code of Conduct Policy and Procedures</li>
                        <li>Management of Care and Service Policy and Procedures</li>
                        <li>Mandatory Reporting Policy and Procedures</li>
                        <li>Whistle-blowers Protection Policy and Procedures</li>
                    </ul>
                    <h2><span style="color: #da591f;">Induction and Ongoing Training</span></h2>
                    <p>Banksia Care requires that induction and ongoing training of all staff include the Intervention and
                        Notification Policy to enable staff to fulfil their roles effectively. In addition, staff must
                        complete Banksia Care training sessions on Behaviour Support, Restrictive Practices and Prohibited
                        Practices before commencing employment.</p>
                    <p>Banksia Care promotes information sharing at staff meetings, sharing of information received from
                        industry trends or changes in legislation, and consultation at policy review sessions.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Policy Created/Reviewed</span></h2>
                    <div class="table-responsive mt-3">
    <table class="table table-bordered mb-0" style="min-width: 760px;">
                        <tbody>
                            <tr>
                                <td width="198"><strong>Policy Created/Reviewed</strong></td>
                                <td width="283"><strong>Modifications</strong></td>
                                <td width="160"><strong>Next Review Date</strong></td>
                            </tr>
                            <tr>
                                <td width="198">Implemented 24 November 2022</td>
                                <td width="283"></td>
                                <td width="160">November 2025</td>
                            </tr>
                            <tr>
                                <td width="198">
                                    <ul></ul>
                                </td>
                                <td width="283">
                                    <ul></ul>
                                </td>
                                <td width="160">
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
                    <h2><span style="color: #da591f;"> Notification and Intervention Procedure</span></h2>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Management will be responsible for the following:</span></h3>
                    <ul>
                        <li>Ensure each client’s support workers receive training when a new Behaviour Support Plan is
                            created.</li>
                        <li>Seek the approval of the NDIS for every new Behaviour Support Plan.</li>
                        <li>Authorise the use of physical, environmental or mechanical restraint or seclusion if authorised
                            in the Behaviour Support Plan. This is permissible only if other positive behaviour
                            interventions have failed.</li>
                        <li>Request the presence of the nurse if a person presents a risk of harm to themselves or others
                            and if other positive behaviour interventions have failed.</li>
                        <li>Ensure the Banksia Care Restrictive Practices Register is updated daily and submitted to NDIS
                            every 28 days.</li>
                    </ul>
                    <h3><span style="color: #fcb53b;">Staff will ensure the following:</span></h3>
                    <ul>
                        <li>Have the right to be safe at work and work in an environment free from physical assault.</li>
                        <li>Ensure they understand and comply with each client’s Behaviour Support Plan.</li>
                        <li>Notify the Care Coordinator if they do not understand any aspect of the Behaviour Support Plan.
                        </li>
                        <li>Complete Banksia Care training session on Behaviour Support, Restrictive Practices and
                            Prohibited Practices before commencing employment.</li>
                        <li>Get approval from their nominated manager or supervisor to use restrictive practices if they are
                            not authorised to do so in the Behaviour Support Plan.</li>
                        <li>Log any use of restrictive practices on the Banksia Care Restrictive Practices Register.</li>
                        <li>Request assistance from the nurse or a supervisor if they believe a client presents a danger to
                            themselves or others.</li>
                        <li>Report any use of prohibited practices by any staff member, contractor or volunteer to the Care
                            Coordinator immediately.</li>
                    </ul>
                    <h3><span style="color: #fcb53b;">In Relation to Behaviour Support Assessment</span></h3>
                    <p>An NDIS accredited behaviour support practitioner must assess any client who displays challenging
                        behaviour. The assessment process should aim to involve the client, their family members, carers or
                        guardians, and the Banksia Care Nurse, Heather Brinkley. The values informing the assessment process
                        must be based on a person-centred approach.</p>
                    <ul>
                        <li>Behaviour support assessment involves a five-step cycle:
                            <ul>
                                <li>seeking informed consent from clients and family members before the assessment</li>
                                <li>maintaining privacy, confidentiality and correct documentation, including a Behaviour
                                    Support Plan</li>
                                <li>training key staff in the implementation of the Behaviour Support Plan</li>
                                <li>eliciting regular feedback from key stakeholders, including the client and their family
                                </li>
                                <li>reviewing Behaviour Support Plans on an annual basis as a minimum.</li>
                            </ul>
                        </li>
                        <li>Behaviour Support Plans will be guided by and comply with the NDIS Positive Behaviour Support
                            Capability Framework.</li>
                        <li>Behaviour Support Plans will consider antecedents, environmental factors and the person’s
                            strengths and interests.</li>
                        <li>Clients and/or their families may dispute Behaviour Support strategies by meeting with or
                            emailing the relevant Care Coordinator.</li>
                    </ul>
                    <h3><span style="color: #fcb53b;">In Relation to Collection of Information</span></h3>
                    <ul>
                        <li>As an overarching policy across all Banksia Care residential facilities, restrictive practices
                            are to be used only as an absolute last resort, in a manner approved by an accredited Behaviour
                            Support practitioner and only after other positive intervention strategies have failed.</li>
                        <li>In instances where a support worker uses a restrictive practice, a supervisor must approve this.
                        </li>
                        <li>Chemical restraint may only be administered as an absolute last resort when other approaches
                            have failed to calm the person down and where a serious risk of harm to self or others is
                            involved.</li>
                        <li>All use of restrictive practices must be logged in the Banksia Care Restrictive Practices
                            Register, which is reported to the NDIS every 28 days by the relevant Care Coordinator.</li>
                    </ul>
                    <h3><span style="color: #fcb53b;">In Relation to Prohibited Practices</span></h3>
                    <ul>
                        <li>Prohibited practices as defined by the NDIS must never be used at a Banksia Care facility or by
                            any staff member, consultant or volunteer.</li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
@endsection

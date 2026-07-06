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




                    <h1><span style="color: #006d5d;">Restrictive Practices Policy and Procedure</span></h1>
                    <h1><span style="color: #006d5d;">(SE5)</span></h1>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Policy Statement</span></h2>
                    <p>The purpose of the Restrictive Practices Policy at Banksia Care is to provide mandatory requirements
                        for Banksia Care staff (particularly the support staff) concerning the use of restrictive practices.
                    </p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Scope</span></h2>
                    <p>This policy applies to support staff, management and specialist services at Banksia Care.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Legislative Requirements</span></h2>
                    <ul>
                        <li>Aged Care and Other Legislative Amendment (Royal Commission Response No.1) Act 2021 (Cth)</li>
                        <li>Disability Discrimination Act 1992 (Cth)</li>
                        <li>Equal Opportunity Act 1984</li>
                        <li>National Disability Insurance Scheme Act 2013</li>
                    </ul>
                    <h2><span style="color: #da591f;">Principles that Inform our Policy</span></h2>
                    <p>All decision-making about our Restrictive Practices Procedure is carried out in accordance with the
                        principles of our Restrictive Practices Policy.</p>
                    <p>Our Policy:</p>
                    <ul>
                        <li>Contributes to minimising and eliminating restrictive practices for people who sometimes exhibit
                            challenging behaviours.</li>
                        <li>Ensures authorised and consented restrictive practices are administered appropriately, with the
                            least infringement of the rights of people with dementia.</li>
                        <li>Ensures safeguards for exceptional circumstances where unauthorised restrictive practices are
                            needed to protect the welfare of individuals and/or the safety of third parties.</li>
                        <li>Supports Positive Behaviour Support (PBS) Practitioners to implement PBS plans.</li>
                    </ul>
                    <h2><span style="color: #da591f;">Key Terms</span></h2>
                   <div class="table-responsive mt-3">
    <table class="table table-bordered mb-0" style="min-width: 760px;">
                        <thead>
                            <tr>
                                <td style="width: 16%;" width="16%"><strong>Term</strong></td>
                                <td style="width: 61.767%;" width="54%"><strong>Meaning </strong></td>
                                <td style="width: 21.233%;" width="29%"><strong>Source</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 16%;" width="16%">Restrictive practice</td>
                                <td style="width: 61.767%;" width="54%">A restrictive practice is any practice or
                                    intervention that has the effect of restricting the rights or freedom of movement of an
                                    aged care consumer.</td>
                                <td style="width: 21.233%;" width="29%"><a
                                        href="https://www.agedcarequality.gov.au/sites/default/files/media/overview-of-restrictive-practices_0.pdf">https://www.agedcarequality.gov.au/sites/default/files/media/overview-of-restrictive-practices_0.pdf</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 16%;" width="16%">Chemical restraint</td>
                                <td style="width: 61.767%;" width="54%">Chemical restraint is a practice or intervention
                                    that is, or that involves, the use of medication or a chemical substance for the primary
                                    purpose of influencing a consumer’s behaviour, but does not include the use of
                                    medication prescribed for:<p></p>
                                    <ul>
                                        <li>the treatment of, or to enable treatment of, the consumer for a diagnosed mental
                                            disorder, a physical illness or a physical condition; or</li>
                                        <li>end of life care for the consumer.</li>
                                    </ul>
                                </td>
                                <td style="width: 21.233%;" width="29%"><a
                                        href="https://www.agedcarequality.gov.au/sites/default/files/media/overview-of-restrictive-practices_0.pdf">https://www.agedcarequality.gov.au/sites/default/files/media/overview-of-restrictive-practices_0.pdf</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 16%;" width="16%">Enrironmental restraint</td>
                                <td style="width: 61.767%;" width="54%">Environmental restraint is a practice or
                                    intervention that restricts, or that involves restricting, a consumer’s free access to
                                    all parts of the consumer’s environment, including items and activities, for the primary
                                    purpose of influencing the consumer’s behaviour.<p></p>
                                    <p>The consumer’s environment includes their room, any common areas within the service,
                                        and the common grounds outside of the service. It does not include another
                                        consumer’s room. Further it does not include areas within the service where a
                                        consumer would not ordinarily be allowed to access, or only access with support from
                                        care staff. This may include the kitchen, laundry, clinical spaces or areas where
                                        medication may be stored, or maintenance sheds for example.</p>
                                </td>
                                <td style="width: 21.233%;" width="29%"><a
                                        href="https://www.agedcarequality.gov.au/sites/default/files/media/overview-of-restrictive-practices_0.pdf">https://www.agedcarequality.gov.au/sites/default/files/media/overview-of-restrictive-practices_0.pdf</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 16%;" width="16%">Mechanical restraint</td>
                                <td style="width: 61.767%;" width="54%">Mechanical restraint is a practice or
                                    intervention that is, or that involves, the use of a device to prevent, restrict or
                                    subdue a consumer’s movement for the primary purpose of influencing the consumer’s
                                    behaviour. It does not include the use of a device for therapeutic or non behavioural
                                    purposes in relation to the consumer.<p></p>
                                    <p>Examples of mechanical restraint include use of a lap belt or princess chair, bed
                                        rails, low beds or use of clothing which limits movement and is unable to be removed
                                        by the consumer.</p>
                                </td>
                                <td style="width: 21.233%;" width="29%"><a
                                        href="https://www.agedcarequality.gov.au/sites/default/files/media/overview-of-restrictive-practices_0.pdf">https://www.agedcarequality.gov.au/sites/default/files/media/overview-of-restrictive-practices_0.pdf</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 16%;" width="16%">Physical restraint</td>
                                <td style="width: 61.767%;" width="54%">Physical restraint is a practice or intervention
                                    that is or involves the use of physical force to prevent, restrict or subdue movement of
                                    a consumer’s body, or part of a consumer’s body, for the primary purpose of influencing
                                    the consumer’s behaviour. This does not include the use of a hands on technique in a
                                    reflexive way to guide or redirect the consumer away from potential harm or injury if it
                                    is consistent with what could reasonably be considered the exercise of care towards the
                                    consumer.<p></p>
                                    <p>Examples of physical restraint are:</p>
                                    <ul>
                                        <li>physically holding a consumer in a specific position to force personal care
                                            issues such as showering to be attended to or for administration of medication,
                                        </li>
                                        <li>pinning a consumer down, or</li>
                                        <li>physically moving a consumer to stop them moving into a specified area where
                                            they may wish to go.</li>
                                    </ul>
                                </td>
                                <td style="width: 21.233%;" width="29%"><a
                                        href="https://www.agedcarequality.gov.au/sites/default/files/media/overview-of-restrictive-practices_0.pdf">https://www.agedcarequality.gov.au/sites/default/files/media/overview-of-restrictive-practices_0.pdf</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 16%;" width="16%">Seclusion</td>
                                <td style="width: 61.767%;" width="54%">Seclusion is a practice or intervention that is,
                                    or that involves, the solitary confinement of a consumer in a room or a physical space
                                    at any hour of the day or night for the primary purpose of influencing the consumer’s
                                    behaviour where:<p></p>
                                    <ul>
                                        <li>voluntary exit is prevented or not facilitated; or</li>
                                        <li>it is implied that voluntary exit is not permitted.</li>
                                    </ul>
                                </td>
                                <td style="width: 21.233%;" width="29%"><a
                                        href="https://www.agedcarequality.gov.au/sites/default/files/media/overview-of-restrictive-practices_0.pdf">https://www.agedcarequality.gov.au/sites/default/files/media/overview-of-restrictive-practices_0.pdf</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 16%;" width="16%">Behaviours of concern</td>
                                <td style="width: 61.767%;" width="54%">The behaviour of concern, also termed challenging
                                    behaviour, refers to challenging and difficult behaviors exhibited by people with a
                                    disability that impact their physical safety or quality of life and/or those around
                                    them.<p></p>
                                    <p>Behaviours of concern can be when someone does things that hurt themselves, other
                                        people, and/or things. This behaviour can stop them from doing things that ‘regular’
                                        people do, such as going to work or meeting with friends.</p>
                                    <p>Behaviour of concern can seriously cause stress for family and/or carers, and
                                        possibly harm them.</p>
                                </td>
                                <td style="width: 21.233%;" width="29%"><a
                                        href="https://www.elvescare.com.au/behaviour-of-concern/">https://www.elvescare.com.au/behaviour-of-concern/</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 16%;" width="16%">Behaviour Support Plan</td>
                                <td style="width: 61.767%;" width="54%">BSP – is for any resident that requires behaviour
                                    support by an aged care provider must have a Behaviour Support Plan (BSP) included in
                                    their care plan. Strategies you develop for a BSP will need to be tailored to the person
                                    and include consultation with them and their care partners.<p></p>
                                    <p>The BSP will need to include information about the person and their preferences. It
                                        should also consider how to change or manage things that may be causing the resident
                                        distress and/or how to work out ways to meet their needs.</p>
                                    <p>A BSP must also identify what steps to take if things become unsafe. Some plans will
                                        be more straightforward. For example, if a person is behaving in particular ways
                                        because of treatable pain, strategies that focus on pain management and ongoing
                                        observation are likely to help resolve that person’s pain and their behaviour.</p>
                                </td>
                                <td style="width: 21.233%;" width="29%"><a
                                        href="https://www.dementia.com.au/behaviour-support-plans">https://www.dementia.com.au/behaviour-support-plans</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                    <ul></ul>
                    <h2><span style="color: #da591f;">Links to other Policies and Documents</span></h2>
                    <ul>
                        <li>Safety and Risk Management Policy and Procedure</li>
                        <li>Privacy and Confidentiality Policy and Procedure</li>
                        <li>Duty of Care Policy and Procedure</li>
                        <li>Code of Conduct Policy and Procedure</li>
                        <li>Code of Ethics</li>
                    </ul>
                    <h2><span style="color: #da591f;">Induction and Ongoing Training</span></h2>
                    <p>Banksia Care requires that induction and ongoing training of all staff include the Restrictive
                        Practices Policy to enable staff to fulfil their roles effectively. In addition, Banksia Care
                        promotes information sharing at staff meetings, sharing of information received from industry trends
                        or changes in legislation, and consultation at policy review sessions.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Policy Created/Reviewed</span></h2>
                    <div class="table-responsive mt-3">
    <table class="table table-bordered mb-0" style="min-width: 760px;">
                        <tbody>
                            <tr>
                                <td width="33%"><strong>Policy Created/Reviewed</strong></td>
                                <td width="33%"><strong>Modifictions </strong></td>
                                <td width="33%"><strong>Next review date</strong></td>
                            </tr>
                            <tr>
                                <td width="33%">November 2022</td>
                                <td width="33%"></td>
                                <td width="33%">November 2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Monitoring, Evaluation and Review</span></h2>
                    <p>This policy will be reviewed on a yearly basis. However, if at any time the legislative, policy or
                        funding environment is so altered that the policy is no longer appropriate in its current form, the
                        policy shall be reviewed immediately and amended accordingly.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Restrictive Practices Procedure</span></h2>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Banksia Care staff who work directly with members are responsible for
                            the following:</span></h3>
                    <ul>
                        <li>Understand changes in behaviour.</li>
                        <li>When a client is displaying any changes in their behaviour, a full assessment of behaviour
                            contributors needs to be reviewed to determine what the cause is. When assessing the behaviour,
                            the following should be considered:
                            <ul>
                                <li>physical abilities</li>
                                <li>cultural differences</li>
                                <li>lingusitc differences</li>
                                <li>religious beliefs</li>
                                <li>life experience.</li>
                            </ul>
                        </li>
                        <li>Understand the restraint types.</li>
                    </ul>
                    <h3><span style="color: #fcb53b;">Restraint Types</span></h3>
                    <p>Physical restraint is any measure that physically withholds a resident from moving freely and
                        withholds basic human rights or needs. It may be withholding food, warmth, clothing, positive social
                        interactions, client’s goods/belongings or favoured activity to control behaviour management when a
                        client exhibits challenging behaviours.</p>
                    <p>Physical restraint can be any of the below, but not limited to:</p>
                    <ul>
                        <li>lap belts/posy restraints or similar</li>
                        <li>table tops</li>
                        <li>bed rails</li>
                        <li>chairs that are difficult to get out of, such as bean bags or similar</li>
                        <li>low bed that are used to prevent a client who can mobilise independently from getting up
                            independently</li>
                        <li>removing mobility aids from clients who require their use</li>
                        <li>physical force ‘hands-on’, no matter how gentle hands-on may be, is a form of restraint as it
                            minimises the resident’s mobility</li>
                        <li>psychological measures where a belief has been created that acts to limit the client’s mobility,
                            for example, placing tape across a doorway</li>
                        <li>any unpleasant physical, sensory or verbal stimuli, for example, voice tone, command/threat that
                            is used to limit the client’s mobility in an attempt to reduce the client’s undesired behaviour.
                        </li>
                    </ul>
                    <p>Environmental restraint is any measure restricting the client’s movement without their explicit and
                        informed consent.</p>
                    <p>Environmental restraint can be any of the below, but not limited to:</p>
                    <ul>
                        <li>limiting a client to a particular environment, for example, confining a client to their bedroom
                            and excluding them from an area to which they want to go</li>
                        <li>restricting a client from accessing outside courtyards or sitting areas</li>
                        <li>preventing a client from leaving the building.</li>
                    </ul>
                    <p>Chemical restraint refers to any measure where any medications are given where no medical conditions
                        have been identified and treated – either over prescribed to treat a condition or over the counter
                        medications are used to alter a client’s behaviour, such as a drowsy tablet.</p>
                    <p>Chemical restraint can be any of the below, but not limited to:</p>
                    <ul>
                        <li>using medication to change a behaviour</li>
                        <li>part of the intended pharmacological effect is to sedate the client</li>
                        <li>over treatment of a medical condition.</li>
                    </ul>
                    <p>Seclusion is a practice or intervention that is, or that involves, the solitary confinement of a
                        client in a room or a physical space. This can happen at any hour of the day or night for the
                        primary purpose of influencing the client’s behaviour where:</p>
                    <ul>
                        <li>voluntary exit is prevented or not facilitated;</li>
                        <li>it is implied that voluntary exit is not permitted; or</li>
                        <li>for the primary purpose of influencing a client’s behaviour.</li>
                    </ul>
                    <p>Seclusion involves the solitary confinement of a client. Examples of seclusion include, but are not
                        limited to:</p>
                    <ul>
                        <li>locking a client in their room or other areas of the facility</li>
                        <li>ordering a client to a specific area within the facility with them believing they are not
                            permitted to leave;</li>
                        <li>staff and other clients retreating to other rooms whilst the client is unable to follow.</li>
                    </ul>
                    <h3><span style="color: #fcb53b;">Strategies for Reducing the Uses of Restraints</span></h3>
                    <p>Environmental:</p>
                    <ul>
                        <li>reducing the noise around the client</li>
                        <li>creating a quiet area for clients to use</li>
                        <li>creating a familiar environment for the client, use/provide familiar objects from the client’s
                            previous residence</li>
                        <li>using appropriate visual reminders and signage to aid orientation to the client</li>
                        <li>implement structured routines for the clients</li>
                        <li>checking on ‘at risk’ clients regularly.</li>
                    </ul>
                    <p>Psychosocial programs:</p>
                    <ul>
                        <li>companionship</li>
                        <li>active listening</li>
                        <li>encouraging visitors</li>
                        <li>therapeutic touch or massage</li>
                        <li>relaxation programs</li>
                        <li>reality orientation or validation</li>
                        <li>increase or decrease (depending on the client) sensory stimulation</li>
                        <li>structured group</li>
                    </ul>
                    <p>Physiological strategies:</p>
                    <ul>
                        <li>comprehensive medical review, including medications (nursing and medical staff only)</li>
                        <li>treat infections (nursing and medical staff only)</li>
                        <li>treat pain appropriately (nursing and medical staff only)</li>
                        <li>physiological alternatives to sedation, such as warm milk/soothing music/meditation moments.
                        </li>
                    </ul>
                    <h3><span style="color: #fcb53b;">When Restraints can be Used</span></h3>
                    <ul>
                        <li>The following requirements must be met for the use of any restrictive practice in relation to a
                            residential aged care recipient.</li>
                        <li>Restrictive practices must only be used as a last resort to prevent harm to the care recipient
                            or other persons. They must only be used after consideration of the likely impact on the care
                            recipient.</li>
                        <li>Best practice alternative behaviour support strategies have been used before the restrictive
                            practice is applied, and the use of these strategies has been documented.</li>
                        <li>Restrictive practices must only be used in proportion to the risk of harm, in the least
                            restrictive form, and for the shortest period possible.</li>
                        <li>The use of restrictive practices must be monitored, reviewed and documented.</li>
                    </ul>
                    <p>Alternative strategies must be considered, including if the restrictive practice can be reduced or
                        stopped.</p>
                    <ul>
                        <li>Informed consent for the use of restrictive practices must be obtained from the care recipient.
                            If the care recipient does not have the capacity to give that consent, it must be obtained from
                            their restrictive practice substitute decision maker.</li>
                        <li>The use of the restrictive practice must comply with the User Rights Principles and Quality
                            Standards.</li>
                        <li>The use of a restrictive practice must be continually monitored, reviewed and documented.</li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
@endsection

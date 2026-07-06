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
                <div class="et_pb_slide_description et_pb_slide_title">
                    <h1 class=""><span style="color: #006d5d;">Privacy and Confidentiality Policy and Procedure</span>
                    </h1>
                    <h1><span style="color: #006d5d;">(DC3)</span></h1>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Policy Statement</span></h2>
                    <p>The purpose of the Privacy and Confidentiality Policy is to ensure the safety, well-being and
                        protection of our residents at Banksia Care is the paramount consideration in all decisions staff at
                        this service make about confidentiality and that confidentiality and privacy is managed in
                        accordance with professional standards, community expectations and legal requirements.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Scope</span></h2>
                    <p>This policy applies to residents, staff, management, medical professionals and visitors of Banksia
                        Care.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Background</span></h2>
                    <p>The establishment of trust between residents, consumers, external providers, management, board
                        members, and staff is an essential part of the ethos of our service which enables protection and
                        appropriateness in the care supports and services provided to consumers within and outside the
                        organisation. Aligned with Banksia’s commitment to person-centred care, everyone needs to know the
                        boundaries of confidentiality to feel safe and comfortable discussing personal issues and concerns.
                    </p>
                    <p>Our attitude to confidentiality and privacy is open and easily understood, and everyone should be
                        able to trust the boundaries of confidentiality operating within the service. This policy provides
                        guidance on our legal obligations and ethical expectations in relation to privacy and
                        confidentiality.</p>
                    <p>We hold two types of information which are covered by this policy, personal and organisational
                        information.</p>
                    <p>Banksia Care ensures it collects, stores, and secures personal information on individuals in a manner
                        that meets the legal requirements of the Australia Privacy Act 1988 (Cth), its associated 13
                        Australian Privacy Principles (APPs), and the Aged Care Quality Standards which protect and enhance
                        the safety, health, wellbeing and quality of life of aged care consumers.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Legislative Requirements</span></h2>
                    <ul>
                        <li>Information Privacy Act 2014</li>
                        <li>Privacy Act 1988</li>
                        <li>National Framework for Alcohol, Tobacco and Other Drug treatment 2019-2029</li>
                        <li>National Quality Framework for Drug and Alcohol Treatment Services</li>
                        <li>Severe Substance Dependence Treatment Act 2010</li>
                        <li>Drugs, Poisons and Controlled Substances Act 1981</li>
                        <li>Mental Health Act 2014</li>
                        <li>Children, Youth and Families Act 2005.</li>
                    </ul>
                    <h2><span style="color: #da591f;">Principles that Inform our Policy</span></h2>
                    <p>All decision-making about our Privacy and Confidentiality Procedure is carried out in accordance with
                        the principles of our Privacy and Confidentiality Policy.</p>
                    <ul>
                        <li>We are committed to ensuring that information is used in an ethical and responsible manner.</li>
                        <li>We recognise the need to be consistent, cautious and thorough in the way that information about
                            clients, stakeholders, staff, Board members, students and volunteers is recorded, stored and
                            managed.</li>
                        <li>All individuals including clients, stakeholders, staff, Board members, students and volunteers
                            have legislated rights to privacy of personal information.</li>
                        <li>In circumstances where the right to privacy may be overridden by other considerations (for
                            example, child protection concerns), staff act in accordance with the relevant policy and/or
                            legal framework.</li>
                        <li>All staff, Board members, students and volunteers are to have an appropriate level of
                            understanding about how to meet the organisation’s legal and ethical obligations to ensure
                            privacy and confidentiality.</li>
                        <li>Banksia Care ensures each individual:
                            <ul>
                                <li>is made aware of any legal requirement for Banksia Care to collect the information</li>
                                <li>is able to access their personal information upon request</li>
                                <li>does not receive unwanted direct marketing</li>
                                <li>can ask for personal information that is incorrect to be corrected</li>
                                <li>is made aware of any consequences for not providing the information requested.</li>
                            </ul>
                        </li>
                    </ul>
                    <h2><span style="color: #da591f;">Key Terms</span></h2>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered mb-0" style="min-width: 760px;">
                            <tbody>
                                <tr>
                                    <td width="160"><strong>Term</strong></td>
                                    <td width="321"><strong>Meaning</strong></td>
                                    <td width="160"><strong>Source</strong></td>
                                </tr>
                                <tr>
                                    <td width="160">Confidentiality</td>
                                    <td width="321">The non-disclosure of information, particularly related to the
                                        patient,
                                        except to another authorised person. It is seen as the patient’s right and is
                                        enshrined
                                        in Article 8 of the European Convention on Human Rights.</td>
                                    <td width="160">The legal dictionary</td>
                                </tr>
                                <tr>
                                    <td width="160">Consent</td>
                                    <td width="321">Voluntary agreement to some act, practice or purpose. Consent has two
                                        elements: knowledge of the matter agreed to and voluntary agreement</td>
                                    <td width="160">Australian Law Reform Commission</td>
                                </tr>
                                <tr>
                                    <td width="160">Individual</td>
                                    <td width="321">A natural person; any person such as a service user, staff member,
                                        board
                                        member, volunteer, student, contractor or a member of the public.</td>
                                    <td width="160">Law Insider Dictionary</td>
                                </tr>
                                <tr>
                                    <td width="160">Personal information</td>
                                    <td width="321">Personal information means information or an opinion (including
                                        information or an opinion forming part of a database) about an individual (Office of
                                        the
                                        Federal Privacy Commissioner, 2001). It may include information such as names,
                                        addresses, bank account details and health conditions. The use of personal
                                        information
                                        is guided by the Privacy Act 1988 (Cth).</td>
                                    <td width="160">Privacy Act 1988</td>
                                </tr>
                                <tr>
                                    <td width="160">Privacy provisions</td>
                                    <td width="321">Privacy provisions of the Privacy Act 1988 (Cth) govern the
                                        collection,
                                        protection and disclosure of personal information provided to us by service users,
                                        board
                                        members, staff, volunteers, students and stakeholders.</td>
                                    <td width="160">Privacy Act 1988</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Links to other Policies and Documents</span></h2>
                    <ul>
                        <li>Whistleblowers Protection Policy and Procedure</li>
                        <li>Mandatory Reporting Policy and Procedure</li>
                        <li>Code of Conduct</li>
                        <li>Customer Complaint Policy and Procedures</li>
                        <li>Record Keeping Policy and Procedure</li>
                    </ul>
                    <h2><span style="color: #da591f;">Induction and Ongoing Training</span></h2>
                    <p>Banksia Care requires that induction and ongoing training of all staff include the Privacy and
                        Confidentiality Policy to enable staff to fulfil their roles effectively. In addition Banksia Care
                        promotes ongoing commitment to understanding and applying the principles of the Privacy and
                        Confidentiality Procedure within workforce capacity building resources, forums and activities
                        including (but not limited to) meetings, industry policy and legislative changes, and in line with
                        Banksia Care’s governance frameworks.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Policy Created/Reviewed</span></h2>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered mb-0" style="min-width: 760px;">
                            <tbody>
                                <tr>
                                    <td width="179"><strong>Policy Created/Reviewed</strong></td>
                                    <td width="302"><strong>Modifications</strong></td>
                                    <td width="160"><strong>Next Review Date</strong></td>
                                </tr>
                                <tr>
                                    <td width="179">Implemented January 2023</td>
                                    <td width="302">New policy</td>
                                    <td width="160">September 2023</td>
                                </tr>
                                <tr>
                                    <td width="179">November 2023</td>
                                    <td width="302">Updated policy list</td>
                                    <td width="160">November 2024</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Monitoring, Evaluation and Review</span></h2>
                    <p>This policy will be reviewed annually or on the occurrence of any relevant legislative Management of
                        Banksia Care will conduct reviews in consultation with educators at staff meetings.</p>
                    <ul></ul>
                    <h2><span style="color: #da591f;">Privacy and Confidentiality Procedure</span></h2>
                    <p>The privacy of personal information is defined by legislation, Privacy Act 1988 (Cth). At all times,
                        we act according to these legal requirements underpinned by the procedures outlined below.</p>
                    <p>We also strive to respect the confidentiality of other sensitive information. However, in the spirit
                        of partnership, we share information with service users and other involved individuals and
                        organisations (subject to consent) where it would be in the best interest of the service user or
                        other individuals to do so.</p>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Collection of Information</span></h3>
                    <p>Personal information collected by us is only for purposes which are directly related to the functions
                        or activities of the organisation. These purposes include:</p>
                    <ul>
                        <li>enquiry about programs</li>
                        <li>referral to programs</li>
                        <li>providing treatment and support to service users</li>
                        <li>administrative activities, including human resources management</li>
                        <li>sector development activities</li>
                        <li>community development activities</li>
                        <li>fundraising</li>
                        <li>complaint handling.</li>
                    </ul>
                    <p>For more detailed information about these purposes and the information handling practices that apply,
                        refer to the File Management Policy, Human Resources Management Policy and Complaints Policy and
                        Procedure.</p>
                    <p>We provide information to service users on collecting health and personal information, including:</p>
                    <ul>
                        <li>purpose of collecting information</li>
                        <li>how the information will be used</li>
                        <li>who information may be transferred to (if anyone), and under what circumstances information will
                            be transferred</li>
                        <li>limits to the privacy of personal information</li>
                        <li>how a service user can access or amend their health information</li>
                        <li>how a service user can make a complaint about the use of their personal information.</li>
                    </ul>
                    <p>In general, personal information (including health information) may be collected from a consumer
                        and/or their represented decision-makers; any person or organisation that assesses health status or
                        care requirements, for example, the Banksia care staff; other service providers; family members.</p>
                    <p>Banksia Care will collect personal information directly from you unless: we have your consent to
                        collect the information from someone else, or we are required or authorised by law to collect the
                        information from someone else, or it is unreasonable or impractical to do so.</p>
                    <p>The types of personal information collected include:</p>
                    <ul>
                        <li>personal information provided by you, including your name, address, telephone number and email
                            address</li>
                        <li>health and financial information in the event that you enter our care facility</li>
                        <li>care plans, assessments and other care-related documentation relevant to your circumstances by
                            representative third parties, including external service providers</li>
                        <li>Government identifiers such as Medicare, Pension or Veteran’s Affairs numbers</li>
                        <li>information that we obtain about you in the course of your interaction with our website,
                            including your internet protocol (IP) address, the date and time of your visit to our website,
                            the pages you have accessed, the links on which you have clicked and the type of browser that
                            you were using</li>
                        <li>aggregated statistical data relating to your use of our website and our services, such as
                            traffic flow and demographics.</li>
                    </ul>
                    <p>See also Service User Rights Policy and Personal Information Consent Form.</p>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Use and Disclosure</span></h3>
                    <p>We only use personal information for the purposes for which it was given or for purposes directly
                        related to one of the functions or activities of the organisation.</p>
                    <p>Banksia Care may use the personal information provided by an individual to market other internal
                        services to them. An individual may opt out of being contacted for marketing purposes at any time by
                        contacting our office. Information will not be passed onto any third-party marketing companies
                        without the prior written consent of the individual.</p>
                    <p>It may be provided to government agencies, other organisations, or individuals if:</p>
                    <ul>
                        <li>the individual has consented</li>
                        <li>it is required or authorised by law</li>
                        <li>it will prevent or lessen a serious and imminent threat to somebody’s life or health.</li>
                    </ul>
                    <p>Further information regarding the use and disclosure of service user information can be found in the
                        File Management Policy, Child Protection Policy and Suicide and Self-Harm Policy.</p>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Data Quality</span></h3>
                    <p>We take steps to ensure that the personal information collected is accurate, up-to-date and complete.
                        These steps include maintaining and updating personal information when individuals advise us that it
                        has changed (and at other times as necessary) and checking that information provided about an
                        individual by another person is correct.</p>
                    <p>All patient notes must be kept in chronological order, with the most recent notes at the front of the
                        file. These notes must be concise, clear and legible.</p>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Data Security</span></h3>
                    <p>We take steps to protect the personal information held against loss, unauthorised access, use,
                        modification or disclosure and against other misuses.</p>
                    <p>These steps include reasonable physical, technical and administrative security safeguards for the
                        electronic and hard copies of paper records, as identified below.</p>
                    <p>Reasonable physical safeguards include:</p>
                    <ul>
                        <li>locking filing cabinets and unattended storage areas</li>
                        <li>physically securing the areas in which the personal information is stored</li>
                        <li>not storing personal information in public areas</li>
                        <li>positioning computer terminals and fax machines so that they cannot be seen or accessed by
                            unauthorised people or members of the public.</li>
                    </ul>
                    <p>Reasonable technical safeguards include:</p>
                    <ul>
                        <li>using passwords to restrict computer access and requiring regular changes to passwords</li>
                        <li>establishing different access levels so that not all staff can view all information</li>
                        <li>ensuring information is transferred securely (for example, not transmitting health information
                            via non-secure email)</li>
                        <li>using electronic audit trails</li>
                        <li>installing virus protection and firewalls.</li>
                    </ul>
                    <p>Reasonable administrative safeguards include the existence of policies and procedures for guidance
                        and training to ensure staff, board members, students, and volunteers are competent in this area.
                    </p>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Access and Correction</span></h3>
                    <p>Individuals may request access to personal information held about them. Access will be provided
                        unless there is a sound reason under the Privacy Act 1988 or other relevant law. Other situations in
                        which access to information may be withheld include the following:</p>
                    <ul>
                        <li>There is a threat to the life or health of an individual.</li>
                        <li>Access to information creates an unreasonable impact on the privacy of others.</li>
                        <li>The request is clearly frivolous or vexatious, or access to the information has been granted
                            previously.</li>
                        <li>There is an existing or anticipated legal dispute resolution proceedings.</li>
                        <li>Denial of access is required by legislation or law enforcement agencies.</li>
                    </ul>
                    <p>We are required to respond to a request to access or amend the information within 45 days of
                        receiving the request.</p>
                    <p>Amendments may be made to personal information to ensure it is accurate, relevant, up-to-date,
                        complete and not misleading, taking into account the information’s purpose. If the request to amend
                        information does not meet these criteria, We may refuse the request.</p>
                    <p>If the requested changes to personal information are not made, the individual may make a statement
                        about the requested changes, which will be attached to the record.</p>
                    <p>More information can be found in the File Access Procedure.</p>
                    <p>The manager is responsible for responding to queries and requests for access and/or amendment to
                        personal information.</p>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Anonymity and Identifiers</span></h3>
                    <p>Wherever it is lawful and practicable, individuals will have the option of not identifying themselves
                        or requesting that we do not store any of their personal information.</p>
                    <p>As required by the Privacy Act 1988, we will not adopt a government-assigned individual identifier
                        number, e.g., a Medicare number, as if it were its own identifier/client code.</p>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Collection Use, and Disclosure of Confidential Information</span></h3>
                    <p>Other information we hold may be confidential, pertaining to an individual or an organisation. The
                        most important factor to consider when determining whether the information is confidential is
                        whether the general public can access the information.</p>
                    <p>Staff members are to refer to the Community Centre Manager before transferring or providing
                        information to an external source if they are unsure if the information is sensitive or confidential
                        to us, its service users, staff and stakeholders.</p>
                    <ul></ul>
                    <h4><span style="color: #b67318;">1. Collection use, and disclosure of confidential information</span>
                    </h4>
                    <p>All staff, board members, students and volunteers agree to adhere to the Code of Conduct when
                        commencing employment, involvement or a placement.</p>
                    <p>The Code of Conduct outlines the organisation’s responsibilities related to the use of information
                        obtained through their employment/involvement/placement.</p>
                    <p>The Code of Conduct states that individuals will use information obtained through their involvement,
                        employment or placement only to carry out their duties and not for financial or other benefit or to
                        take advantage of another person or organisation.</p>
                    <ul></ul>
                    <h4><span style="color: #b67318;">2. Staff information</span></h4>
                    <p>The Human Resources Management Policy details how the organisation handles staff records to manage
                        privacy and confidentiality responsibilities, including storing and accessing staff personnel files
                        and storing unsuccessful position applicants’ information.</p>
                    <ul></ul>
                    <h4><span style="color: #b67318;">3. Stakeholder information</span></h4>
                    <p>We work with a variety of stakeholders, including private consultants. The organisation may collect
                        confidential or sensitive information about its stakeholders as part of a working relationship.</p>
                    <p>Staff will not disclose information about its stakeholders that is not already in the public domain
                        without stakeholder consent.</p>
                    <p>The manner in which staff members manage stakeholder information will be clearly articulated in any
                        contractual agreements that the organisation enters into with a third party.</p>
                    <ul></ul>
                    <h4><span style="color: #b67318;">4. Service user information</span></h4>
                    <p>Detailed information regarding the collection, use and disclosure of service user information can be
                        found in the File Management Policy and associated procedures.</p>
                    <ul></ul>
                    <h4><span style="color: #b67318;">5. Breach of privacy or confidentiality</span></h4>
                    <p>If staff are dissatisfied with the conduct of a colleague with regard to privacy and confidentiality
                        of information, the matter should be raised with the staff member’s direct supervisor. If this is
                        not possible or appropriate, follow the delegations indicated in the Complaints Policy and
                        Procedures. Staff members who are deemed to have breached privacy and confidentiality standards set
                        out in this policy may be subject to disciplinary action.</p>
                    <p>If a service user or stakeholder is dissatisfied with the conduct of a staff member, a complaint
                        should be raised as per the Complaints Policy and Procedures. Information on making a complaint will
                        be made available to service users and stakeholders. Additionally, any staff member can take a
                        complaint over the phone.</p>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Complaints about Privacy</span></h3>
                    <p>Any individual wishing to make a complaint or appeal about how information has been handled within
                        Banksia Care can do so by following Banksia Care’s Complaints and Appeals Policy and Procedure.</p>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Privacy Notices</span></h3>
                    <p>The Privacy and Confidentiality Policy and Procedure will be accessible on Banksia Care’s website.
                    </p>
                    <p>Banksia Care will ensure a privacy notice and declaration are included on other forms that may be
                        required to collect personal or sensitive information from individuals and that these are only used
                        in compliance with Clause 1 of this policy.</p>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Email Marketing</span></h3>
                    <p>Ensure all marketing emails include an opt-out option.</p>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Request to Access Records</span></h3>
                    <p>Individuals may request to access their records using the Request to Access Records Form. Written
                        requests should be sent to Banksia Care Headquarters.</p>
                    <p>Upon receiving a completed form, confirm the request is valid and has been made by the individual (or
                        representative decision-maker) to which the records relate – check identification documents.</p>
                    <p>Arrangements for the provision of records should be made as suitable – mailing copies, providing a
                        time for records to be viewed, etc.</p>
                    <p>Arrangements should be made verbally and confirmed in writing within ten days of receiving the
                        request.</p>
                    <p>Where records are to be mailed, they should only be mailed to the address that is stored on file for
                        that individual unless an alternate change of address information is provided along with proof of
                        identity – such as a driver’s license or utility bill.</p>
                    <p>Where records are to be shown to an individual, the person must produce a photo ID prior, and this
                        should be matched to the records stored on file about the individual to confirm they are only
                        viewing their own records.</p>
                    <p>Keep a note of how the records were accessed on the individual’s file.</p>
                    <ul></ul>
                    <h3><span style="color: #fcb53b;">Amendment to Records</span></h3>
                    <p>When an individual request is made for an incorrect record held about them to be corrected, they can
                        do so by filling in an Amendment to Records Request Form.</p>
                    <p>If it is a change of address or contact details of a current consumer, they can use the Change of
                        Details Form.</p>
                    <p>Upon receipt of a request form, consider whether the records held are correct or not. If the request
                        is valid and the records are incorrect, update the records accordingly.</p>
                    <p>Do not update records if they are found to be correct already.</p>
                    <p>Advise the individual accordingly of the actions taken to follow up on their request.</p>

                </div>
            </div>
        </div>
    </div>
@endsection

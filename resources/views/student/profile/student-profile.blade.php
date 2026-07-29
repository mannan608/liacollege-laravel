@extends('student.layouts.app')


@section('content')
<div class="max-w-5xl mx-auto bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-slate-800 text-white px-8 py-6">
            <h1 class="text-3xl font-bold tracking-tight">My Personal Profile</h1>
        </div>

        <form class="p-8 space-y-8">
            <!-- Introduction -->
            <div class="text-gray-700 leading-relaxed text-base">
                <p>As a Registered Training Organisation we are required to provide vocational education and training information to the Australian Quality Training Framework (AQTF). The information provided by you will be used as statistical data only and will assist future planning for training services in Australia.</p>
            </div>

            <!-- Identity & Cultural Background -->
            <div>
                <h2 class="text-xl font-bold text-slate-800 border-b-2 border-slate-200 pb-2 mb-6">Identity & Cultural Background</h2>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Title</label>
                        <input type="text" value="Ms" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">First name</label>
                        <input type="text" value="Sudikshya" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Middle name(s)</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Surname</label>
                        <input type="text" value="Khanal" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                    </div>
                </div>

                <div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded-r-md mb-4">
                    <p class="text-sm text-amber-800"><i class="fa-solid fa-triangle-exclamation mr-2"></i><strong>Important:</strong> Please ensure that you have entered your full legal name as this is the name that will appear on your certificate.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Name Commonly Known As</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Gender</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                            <option value="">Please select...</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="other">Other</option>
                            <option value="not-stated">Not Stated</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Date of birth</label>
                        <input type="text" value="05/11/1997" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Country of birth</label>
                        <input type="text" value="Nepal" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">City of birth<br><span class="text-xs font-normal text-gray-500">(exactly as per your USI identification records)</span></label>
                    <input type="text" value="Kathmandu" class="w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Unique Student identifier (USI) - required for accredited VET courses from 1 Jan 2015.<br><a href="#" class="text-blue-600 hover:underline text-xs font-normal">Click here for more info or to obtain your new USI</a></label>
                    <input type="text" value="H7JMEDZXUP" class="w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent uppercase tracking-widest font-mono">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Indigenous status</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                            <option value="not-aboriginal" selected>I am NOT of Aboriginal or Torres Strait Island origin</option>
                            <option value="aboriginal">Aboriginal</option>
                            <option value="torres-strait-islander">Torres Strait Islander</option>
                            <option value="both">Both Aboriginal and Torres Strait Islander</option>
                            <option value="not-stated">Not Stated</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Citizenship status</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                            <option value="">Please select...</option>
                            <option value="australian">Australian Citizen</option>
                            <option value="permanent-resident">Permanent Resident</option>
                            <option value="temporary-resident">Temporary Resident</option>
                            <option value="new-zealand">New Zealand Citizen</option>
                            <option value="not-stated" selected>Not Stated</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Main language spoken at home</label>
                    <input type="text" value="English" class="w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Do you consider yourself to have a disability, impairment or long-term condition?</label>
                    <div class="flex gap-6 mt-2">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="disability" value="yes" class="w-4 h-4 text-slate-700 border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-gray-700">Yes</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="disability" value="no" class="w-4 h-4 text-slate-700 border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-gray-700">No</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">If you have any learning disability which warrants our consideration or if you have special requirements regarding delivery of your program of study, please describe these here.</label>
                    <textarea rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent resize-y bg-white"></textarea>
                </div>
            </div>

            <!-- Contact Information -->
            <div>
                <h2 class="text-xl font-bold text-slate-800 border-b-2 border-slate-200 pb-2 mb-6">Contact Information</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">E-mail address</label>
                        <input type="email" value="placement@liacollege.edu.au" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Alternate E-mail address</label>
                        <input type="email" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Home Telephone<br><span class="text-xs font-normal text-gray-500">country/area code/number</span></label>
                        <div class="flex gap-2">
                            <select class="w-1/2 border border-gray-300 rounded-md px-2 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                                <option selected>+61 Australia</option>
                                <option>+1 USA</option>
                                <option>+44 UK</option>
                                <option>+977 Nepal</option>
                            </select>
                            <input type="tel" class="w-1/2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Work Telephone<br><span class="text-xs font-normal text-gray-500">country/area code/number</span></label>
                        <div class="flex gap-2">
                            <select class="w-1/2 border border-gray-300 rounded-md px-2 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                                <option selected>+61 Australia</option>
                                <option>+1 USA</option>
                                <option>+44 UK</option>
                                <option>+977 Nepal</option>
                            </select>
                            <input type="tel" class="w-1/2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Mobile Telephone<br><span class="text-xs font-normal text-gray-500">country/number</span></label>
                        <div class="flex gap-2">
                            <select class="w-1/2 border border-gray-300 rounded-md px-2 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                                <option selected>+61 Australia</option>
                                <option>+1 USA</option>
                                <option>+44 UK</option>
                                <option>+977 Nepal</option>
                            </select>
                            <input type="tel" value="0405106199" class="w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500">
                        </div>
                    </div>
                </div>

                <!-- Address of residence -->
                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
                    <h3 class="font-semibold text-gray-800 mb-4">Address of residence<br><span class="text-xs font-normal text-gray-500">Enter information into applicable fields only.</span></h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Search:</label>
                        <input type="text" placeholder="Begin typing address and select..." class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Floor no.</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Building name</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-600 mb-1">Unit or Apartment no.</label>
                        <input type="text" value="4" class="w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Street no.</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Street Name</label>
                            <input type="text" value="Bousloff Street" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">City or suburb</label>
                            <input type="text" value="WHITLAM" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">State</label>
                            <input type="text" value="Australian Capital Territory" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Post code</label>
                            <input type="text" value="2611" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Country</label>
                            <input type="text" value="Australia" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500">
                        </div>
                    </div>
                </div>

                <!-- Postal Address -->
                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <h3 class="font-semibold text-gray-800 mb-4">Postal Address<br><span class="text-xs font-normal text-gray-500">Enter information into applicable fields only.</span></h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Search:</label>
                        <input type="text" placeholder="Begin typing address and select..." class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Floor no.</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Building name</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-600 mb-1">Unit or apartment no.</label>
                        <input type="text" value="4" class="w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Street no.</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Street name</label>
                            <input type="text" value="Bousloff Street" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500">
                        </div>
                    </div>

                    <div class="mb-4 text-center text-gray-500 font-semibold text-sm">OR</div>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-600 mb-1">Post office box details (e.g. PO Box 123)</label>
                        <input type="text" class="w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">City or suburb</label>
                            <input type="text" value="WHITLAM" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">State</label>
                            <input type="text" value="Australian Capital Territory" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Post code</label>
                            <input type="text" value="2611" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Country</label>
                            <input type="text" value="Australia" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-1 focus:ring-slate-500">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Education & Employment -->
            <div>
                <h2 class="text-xl font-bold text-slate-800 border-b-2 border-slate-200 pb-2 mb-6">Education & Employment</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Are you still attending secondary school?</label>
                        <div class="flex gap-6 mt-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="secondary" value="yes" class="w-4 h-4 text-slate-700 border-gray-300 focus:ring-slate-500 cursor-pointer">
                                <span class="text-gray-700">Yes</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="secondary" value="no" class="w-4 h-4 text-slate-700 border-gray-300 focus:ring-slate-500 cursor-pointer">
                                <span class="text-gray-700">No</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">If YES, what type of school are you attending?</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                            <option>...</option>
                            <option>Government School</option>
                            <option>Non-Government School</option>
                            <option>Home Schooling</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">What is your HIGHEST completed school level?</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                            <option>...</option>
                            <option>Never attended school</option>
                            <option>Year 8 or below</option>
                            <option>Completed Year 9</option>
                            <option>Completed Year 10</option>
                            <option>Completed Year 11</option>
                            <option selected>Completed year 12</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">In which YEAR did you complete that level? (optional)</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tick any of the following qualifications which you have SUCCESSFULLY completed:</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Bachelor or Higher Degree</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Adv. Diploma or Assoc. Degree</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Diploma Level</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Certificate IV</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Certificate III</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Certificate II</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Certificate I</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Miscellaneous Education</span>
                        </label>
                    </div>
                </div>

                <div class="space-y-4 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Which of the following categories BEST describes your current employment status:</label>
                        <select class="w-full md:w-2/3 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                            <option>...</option>
                            <option>Full-time employee</option>
                            <option>Part-time employee</option>
                            <option>Self-employed</option>
                            <option>Employer</option>
                            <option>Unemployed - seeking full-time work</option>
                            <option>Unemployed - seeking part-time work</option>
                            <option>Not employed - not seeking employment</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">If you are employed, please indicate the industry in which you are employed:</label>
                        <select class="w-full md:w-2/3 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                            <option>...</option>
                            <option>Agriculture, Forestry and Fishing</option>
                            <option>Mining</option>
                            <option>Manufacturing</option>
                            <option>Construction</option>
                            <option>Education and Training</option>
                            <option>Health Care and Social Assistance</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">If you are employed, please indicate the broad category of your occupation:</label>
                        <select class="w-full md:w-2/3 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                            <option>...</option>
                            <option>Managers</option>
                            <option>Professionals</option>
                            <option>Technicians and Trades Workers</option>
                            <option>Community and Personal Service Workers</option>
                            <option>Clerical and Administrative Workers</option>
                            <option>Sales Workers</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Which of the following BEST describes your main reason for undertaking the course(s) for which you are registering:</label>
                        <select class="w-full md:w-2/3 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                            <option>...</option>
                            <option>To get a job</option>
                            <option>To develop my existing business</option>
                            <option>To start my own business</option>
                            <option>To try for a different career</option>
                            <option>To get a better job or promotion</option>
                            <option>I wanted extra skills for my job</option>
                            <option>For personal interest or self-development</option>
                            <option>To get into another course of study</option>
                            <option>Other reasons</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-start gap-3 mb-6 border-l-4 border-slate-600 pl-6 py-2">
                    <input type="checkbox" id="ncver" class="mt-1 w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                    <label for="ncver" class="text-gray-700 text-sm cursor-pointer select-none">I understand that I may receive a National Centre for Vocational Education Research (NCVER) student survey and consent to this.</label>
                </div>
            </div>

            <!-- Declaration & Submit -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                <p class="text-gray-700 mb-6">By clicking SUBMIT you declare that the information you have entered above is complete and accurate and you have read our <a href="#" class="text-blue-600 hover:underline font-semibold">PRIVACY NOTICE</a>.</p>
                
                <button type="submit" class="bg-slate-800 text-white px-10 py-3 rounded-md font-semibold hover:bg-slate-700 transition-colors shadow-md cursor-pointer text-lg">
                    SUBMIT
                </button>
            </div>
        </form>
    </div>
@endsection
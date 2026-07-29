@extends('student.layouts.app')


@section('content')
    <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-slate-800 text-white px-8 py-6">
            <h1 class="text-3xl font-bold tracking-tight">My Personal Profile</h1>
        </div>


        <form action="{{ route('student.updateStudentProfile.update') }}" method="POST" class="p-8 space-y-8">

            @csrf
            @method('PUT')
            <!-- Introduction -->
            <div class="text-gray-700 leading-relaxed text-base">
                <p>As a Registered Training Organisation we are required to provide vocational education and training
                    information to the Australian Quality Training Framework (AQTF). The information provided by you will be
                    used as statistical data only and will assist future planning for training services in Australia.</p>
            </div>

          <!-- Identity & Cultural Background -->
            <div>
                <h2 class="text-xl font-bold text-slate-800 border-b-2 border-slate-200 pb-2 mb-6">Identity & Cultural
                    Background</h2>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Title</label>
                        <input type="text" id="title" name="title" placeholder="e.g. Ms, Mr, Mrs, Dr"
                            value="{{ old('title', $student->title) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-1">First name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter first name"
                            value="{{ old('first_name', $student->first_name) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                        @error('first_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="middle_name" class="block text-sm font-semibold text-gray-700 mb-1">Middle name(s)</label>
                        <input type="text" id="middle_name" name="middle_name" placeholder="Enter middle name(s)"
                            value="{{ old('middle_name', $student->middle_name) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                        @error('middle_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-1">Surname</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter surname"
                            value="{{ old('last_name', $student->last_name) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                        @error('last_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded-r-md mb-4">
                    <p class="text-sm text-amber-800"><i
                            class="fa-solid fa-triangle-exclamation mr-2"></i><strong>Important:</strong> Please ensure that
                        you have entered your full legal name as this is the name that will appear on your certificate.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="name_commonly_known_as" class="block text-sm font-semibold text-gray-700 mb-1">Name Commonly Known As</label>
                        <input type="text" id="name_commonly_known_as" name="name_commonly_known_as" placeholder="Enter preferred name"
                            value="{{ old('name_commonly_known_as', $student->name_commonly_known_as) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                        @error('name_commonly_known_as')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-semibold text-gray-700 mb-1">Gender</label>
                        <select id="gender" name="gender"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                            <option value="">Please select...</option>
                            <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>Other</option>
                            <option value="not-stated" {{ old('gender', $student->gender) == 'not-stated' ? 'selected' : '' }}>Not Stated</option>
                        </select>
                        @error('gender')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="date_of_birth" class="block text-sm font-semibold text-gray-700 mb-1">Date of birth</label>
                        <input type="text" id="date_of_birth" name="date_of_birth" placeholder="DD/MM/YYYY"
                            value="{{ old('date_of_birth', $student->date_of_birth ? $student->date_of_birth->format('d/m/Y') : '') }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                        @error('date_of_birth')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="country_of_birth" class="block text-sm font-semibold text-gray-700 mb-1">Country of birth</label>
                        <input type="text" id="country_of_birth" name="country_of_birth" placeholder="Enter country of birth"
                            value="{{ old('country_of_birth', $student->country_of_birth) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                        @error('country_of_birth')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="city_of_birth" class="block text-sm font-semibold text-gray-700 mb-1">City of birth<br><span
                            class="text-xs font-normal text-gray-500">(exactly as per your USI identification
                            records)</span></label>
                    <input type="text" id="city_of_birth" name="city_of_birth" placeholder="Enter city of birth"
                        value="{{ old('city_of_birth', $student->city_of_birth) }}"
                        class="w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                    @error('city_of_birth')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="usi" class="block text-sm font-semibold text-gray-700 mb-1">Unique Student identifier (USI) - required
                        for accredited VET courses from 1 Jan 2015.<br><a href="#"
                            class="text-blue-600 hover:underline text-xs font-normal">Click here for more info or to obtain
                            your new USI</a></label>
                    <input type="text" id="usi" name="usi" placeholder="Enter your USI"
                        value="{{ old('usi', $student->usi) }}"
                        class="w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent uppercase tracking-widest font-mono">
                    @error('usi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="indigenous_status" class="block text-sm font-semibold text-gray-700 mb-1">Indigenous status</label>
                        <select id="indigenous_status" name="indigenous_status"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                            <option value="not-aboriginal" {{ old('indigenous_status', $student->indigenous_status) == 'not-aboriginal' ? 'selected' : '' }}>I am NOT of Aboriginal or Torres Strait Island origin</option>
                            <option value="aboriginal" {{ old('indigenous_status', $student->indigenous_status) == 'aboriginal' ? 'selected' : '' }}>Aboriginal</option>
                            <option value="torres-strait-islander" {{ old('indigenous_status', $student->indigenous_status) == 'torres-strait-islander' ? 'selected' : '' }}>Torres Strait Islander</option>
                            <option value="both" {{ old('indigenous_status', $student->indigenous_status) == 'both' ? 'selected' : '' }}>Both Aboriginal and Torres Strait Islander</option>
                            <option value="not-stated" {{ old('indigenous_status', $student->indigenous_status) == 'not-stated' ? 'selected' : '' }}>Not Stated</option>
                        </select>
                        @error('indigenous_status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="citizenship_status" class="block text-sm font-semibold text-gray-700 mb-1">Citizenship status</label>
                        <select id="citizenship_status" name="citizenship_status"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                            <option value="">Please select...</option>
                            <option value="australian" {{ old('citizenship_status', $student->citizenship_status) == 'australian' ? 'selected' : '' }}>Australian Citizen</option>
                            <option value="permanent-resident" {{ old('citizenship_status', $student->citizenship_status) == 'permanent-resident' ? 'selected' : '' }}>Permanent Resident</option>
                            <option value="temporary-resident" {{ old('citizenship_status', $student->citizenship_status) == 'temporary-resident' ? 'selected' : '' }}>Temporary Resident</option>
                            <option value="new-zealand" {{ old('citizenship_status', $student->citizenship_status) == 'new-zealand' ? 'selected' : '' }}>New Zealand Citizen</option>
                            <option value="not-stated" {{ old('citizenship_status', $student->citizenship_status) == 'not-stated' ? 'selected' : '' }}>Not Stated</option>
                        </select>
                        @error('citizenship_status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="main_language_spoken_at_home" class="block text-sm font-semibold text-gray-700 mb-1">Main language spoken at home</label>
                    <input type="text" id="main_language_spoken_at_home" name="main_language_spoken_at_home" placeholder="Enter language"
                        value="{{ old('main_language_spoken_at_home', $student->main_language_spoken_at_home) }}"
                        class="w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                    @error('main_language_spoken_at_home')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                @php
                    $hasDisability = old('has_disability');
                    if ($hasDisability === null) {
                        $hasDisability = $student->has_disability === true ? 'yes' : ($student->has_disability === false ? 'no' : null);
                    }
                @endphp
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Do you consider yourself to have a
                        disability, impairment or long-term condition?</label>
                    <div class="flex gap-6 mt-2">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="has_disability" value="yes" {{ $hasDisability === 'yes' ? 'checked' : '' }}
                                class="w-4 h-4 text-slate-700 border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-gray-700">Yes</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="has_disability" value="no" {{ $hasDisability === 'no' ? 'checked' : '' }}
                                class="w-4 h-4 text-slate-700 border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-gray-700">No</span>
                        </label>
                    </div>
                    @error('has_disability')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="disability_description" class="block text-sm font-semibold text-gray-700 mb-1">If you have any learning disability which
                        warrants our consideration or if you have special requirements regarding delivery of your program of
                        study, please describe these here.</label>
                    <textarea id="disability_description" name="disability_description" rows="3" placeholder="Describe any special requirements..."
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent resize-y bg-white">{{ old('disability_description', $student->disability_description) }}</textarea>
                    @error('disability_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Contact Information -->
            <div>
                <h2 class="text-xl font-bold text-slate-800 border-b-2 border-slate-200 pb-2 mb-6">Contact Information</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">E-mail address</label>
                        <input type="email" id="email" name="email" placeholder="your.email@example.com"
                            value="{{ old('email', $student->user?->email ?? '') }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="alternate_email" class="block text-sm font-semibold text-gray-700 mb-1">Alternate E-mail address</label>
                        <input type="email" id="alternate_email" name="alternate_email" placeholder="alternate.email@example.com"
                            value="{{ old('alternate_email', $student->alternate_email) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                        @error('alternate_email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Home Telephone<br><span
                                class="text-xs font-normal text-gray-500">country/area code/number</span></label>
                        <div class="flex gap-2">
                            <select name="home_phone_country"
                                class="w-1/2 border border-gray-300 rounded-md px-2 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                                <option value="+61" {{ old('home_phone_country', $student->home_phone_country) == '+61' ? 'selected' : '' }}>+61 Australia</option>
                                <option value="+1" {{ old('home_phone_country', $student->home_phone_country) == '+1' ? 'selected' : '' }}>+1 USA</option>
                                <option value="+44" {{ old('home_phone_country', $student->home_phone_country) == '+44' ? 'selected' : '' }}>+44 UK</option>
                                <option value="+977" {{ old('home_phone_country', $student->home_phone_country) == '+977' ? 'selected' : '' }}>+977 Nepal</option>
                            </select>
                            <input type="tel" name="home_phone" placeholder="Phone number"
                                value="{{ old('home_phone', $student->home_phone) }}"
                                class="w-1/2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                        </div>
                        @error('home_phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Work Telephone<br><span
                                class="text-xs font-normal text-gray-500">country/area code/number</span></label>
                        <div class="flex gap-2">
                            <select name="work_phone_country"
                                class="w-1/2 border border-gray-300 rounded-md px-2 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                                <option value="+61" {{ old('work_phone_country', $student->work_phone_country) == '+61' ? 'selected' : '' }}>+61 Australia</option>
                                <option value="+1" {{ old('work_phone_country', $student->work_phone_country) == '+1' ? 'selected' : '' }}>+1 USA</option>
                                <option value="+44" {{ old('work_phone_country', $student->work_phone_country) == '+44' ? 'selected' : '' }}>+44 UK</option>
                                <option value="+977" {{ old('work_phone_country', $student->work_phone_country) == '+977' ? 'selected' : '' }}>+977 Nepal</option>
                            </select>
                            <input type="tel" name="work_phone" placeholder="Phone number"
                                value="{{ old('work_phone', $student->work_phone) }}"
                                class="w-1/2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                        </div>
                        @error('work_phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Mobile Telephone<br><span
                                class="text-xs font-normal text-gray-500">country/number</span></label>
                        <div class="flex gap-2">
                            <select name="mobile_phone_country"
                                class="w-1/2 border border-gray-300 rounded-md px-2 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                                <option value="+61" {{ old('mobile_phone_country', $student->mobile_phone_country) == '+61' ? 'selected' : '' }}>+61 Australia</option>
                                <option value="+1" {{ old('mobile_phone_country', $student->mobile_phone_country) == '+1' ? 'selected' : '' }}>+1 USA</option>
                                <option value="+44" {{ old('mobile_phone_country', $student->mobile_phone_country) == '+44' ? 'selected' : '' }}>+44 UK</option>
                                <option value="+977" {{ old('mobile_phone_country', $student->mobile_phone_country) == '+977' ? 'selected' : '' }}>+977 Nepal</option>
                            </select>
                            <input type="tel" name="mobile_phone" placeholder="0412345678"
                                value="{{ old('mobile_phone', $student->mobile_phone) }}"
                                class="w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500">
                        </div>
                        @error('mobile_phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Address of residence -->
                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
                    <h3 class="font-semibold text-gray-800 mb-4">Address of residence<br><span
                            class="text-xs font-normal text-gray-500">Enter information into applicable fields only.</span>
                    </h3>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Search:</label>
                        <input type="text" placeholder="Begin typing address and select..."
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="residential_floor_no" class="block text-xs font-semibold text-gray-600 mb-1">Floor no.</label>
                            <input type="text" id="residential_floor_no" name="residential_floor_no" placeholder="e.g. 3"
                                value="{{ old('residential_floor_no', $student->residential_floor_no ?? '') }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                        </div>
                        <div>
                            <label for="residential_building_name" class="block text-xs font-semibold text-gray-600 mb-1">Building name</label>
                            <input type="text" id="residential_building_name" name="residential_building_name" placeholder="Building name"
                                value="{{ old('residential_building_name', $student->residential_building_name) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                            @error('residential_building_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="residential_unit_no" class="block text-xs font-semibold text-gray-600 mb-1">Unit or Apartment no.</label>
                        <input type="text" id="residential_unit_no" name="residential_unit_no" placeholder="e.g. 4"
                            value="{{ old('residential_unit_no', $student->residential_unit_no) }}"
                            class="w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500">
                        @error('residential_unit_no')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="residential_street_no" class="block text-xs font-semibold text-gray-600 mb-1">Street no.</label>
                            <input type="text" id="residential_street_no" name="residential_street_no" placeholder="e.g. 123"
                                value="{{ old('residential_street_no', $student->residential_street_no) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                            @error('residential_street_no')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="residential_street_name" class="block text-xs font-semibold text-gray-600 mb-1">Street Name</label>
                            <input type="text" id="residential_street_name" name="residential_street_name" placeholder="Street name"
                                value="{{ old('residential_street_name', $student->residential_street_name) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500">
                            @error('residential_street_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="residential_city" class="block text-xs font-semibold text-gray-600 mb-1">City or suburb</label>
                            <input type="text" id="residential_city" name="residential_city" placeholder="City or suburb"
                                value="{{ old('residential_city', $student->residential_city) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500">
                            @error('residential_city')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="residential_state" class="block text-xs font-semibold text-gray-600 mb-1">State</label>
                            <input type="text" id="residential_state" name="residential_state" placeholder="State"
                                value="{{ old('residential_state', $student->residential_state) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500">
                            @error('residential_state')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="residential_post_code" class="block text-xs font-semibold text-gray-600 mb-1">Post code</label>
                            <input type="text" id="residential_post_code" name="residential_post_code" placeholder="Post code"
                                value="{{ old('residential_post_code', $student->residential_post_code) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500">
                            @error('residential_post_code')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="residential_country" class="block text-xs font-semibold text-gray-600 mb-1">Country</label>
                            <input type="text" id="residential_country" name="residential_country" placeholder="Country"
                                value="{{ old('residential_country', $student->residential_country) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500">
                            @error('residential_country')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Postal Address -->
                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <h3 class="font-semibold text-gray-800 mb-4">Postal Address<br><span
                            class="text-xs font-normal text-gray-500">Enter information into applicable fields only.</span>
                    </h3>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Search:</label>
                        <input type="text" placeholder="Begin typing address and select..."
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="postal_floor_no" class="block text-xs font-semibold text-gray-600 mb-1">Floor no.</label>
                            <input type="text" id="postal_floor_no" name="postal_floor_no" placeholder="e.g. 3"
                                value="{{ old('postal_floor_no', $student->postal_floor_no ?? '') }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                        </div>
                        <div>
                            <label for="postal_building_name" class="block text-xs font-semibold text-gray-600 mb-1">Building name</label>
                            <input type="text" id="postal_building_name" name="postal_building_name" placeholder="Building name"
                                value="{{ old('postal_building_name', $student->postal_building_name) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                            @error('postal_building_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="postal_unit_no" class="block text-xs font-semibold text-gray-600 mb-1">Unit or apartment no.</label>
                        <input type="text" id="postal_unit_no" name="postal_unit_no" placeholder="e.g. 4"
                            value="{{ old('postal_unit_no', $student->postal_unit_no) }}"
                            class="w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500">
                        @error('postal_unit_no')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="postal_street_no" class="block text-xs font-semibold text-gray-600 mb-1">Street no.</label>
                            <input type="text" id="postal_street_no" name="postal_street_no" placeholder="e.g. 123"
                                value="{{ old('postal_street_no', $student->postal_street_no) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                            @error('postal_street_no')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="postal_street_name" class="block text-xs font-semibold text-gray-600 mb-1">Street name</label>
                            <input type="text" id="postal_street_name" name="postal_street_name" placeholder="Street name"
                                value="{{ old('postal_street_name', $student->postal_street_name) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500">
                            @error('postal_street_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 text-center text-gray-500 font-semibold text-sm">OR</div>

                    <div class="mb-4">
                        <label for="postal_po_box" class="block text-xs font-semibold text-gray-600 mb-1">Post office box details (e.g. PO Box
                            123)</label>
                        <input type="text" id="postal_po_box" name="postal_po_box" placeholder="PO Box 123"
                            value="{{ old('postal_po_box', $student->postal_po_box) }}"
                            class="w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                        @error('postal_po_box')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="postal_city" class="block text-xs font-semibold text-gray-600 mb-1">City or suburb</label>
                            <input type="text" id="postal_city" name="postal_city" placeholder="City or suburb"
                                value="{{ old('postal_city', $student->postal_city) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500">
                            @error('postal_city')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="postal_state" class="block text-xs font-semibold text-gray-600 mb-1">State</label>
                            <input type="text" id="postal_state" name="postal_state" placeholder="State"
                                value="{{ old('postal_state', $student->postal_state) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500">
                            @error('postal_state')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="postal_post_code" class="block text-xs font-semibold text-gray-600 mb-1">Post code</label>
                            <input type="text" id="postal_post_code" name="postal_post_code" placeholder="Post code"
                                value="{{ old('postal_post_code', $student->postal_post_code) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500">
                            @error('postal_post_code')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="postal_country" class="block text-xs font-semibold text-gray-600 mb-1">Country</label>
                            <input type="text" id="postal_country" name="postal_country" placeholder="Country"
                                value="{{ old('postal_country', $student->postal_country) }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-slate-500">
                            @error('postal_country')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Education & Employment -->
            <div>
                <h2 class="text-xl font-bold text-slate-800 border-b-2 border-slate-200 pb-2 mb-6">Education & Employment
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Are you still attending secondary
                            school?</label>
                        <div class="flex gap-6 mt-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="secondary" value="yes"
                                    class="w-4 h-4 text-slate-700 border-gray-300 focus:ring-slate-500 cursor-pointer">
                                <span class="text-gray-700">Yes</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="secondary" value="no"
                                    class="w-4 h-4 text-slate-700 border-gray-300 focus:ring-slate-500 cursor-pointer">
                                <span class="text-gray-700">No</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">If YES, what type of school are you
                            attending?</label>
                        <select
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                            <option>...</option>
                            <option>Government School</option>
                            <option>Non-Government School</option>
                            <option>Home Schooling</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">What is your HIGHEST completed school
                            level?</label>
                        <select
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
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
                        <label class="block text-sm font-semibold text-gray-700 mb-1">In which YEAR did you complete that
                            level? (optional)</label>
                        <input type="text"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tick any of the following qualifications
                        which you have SUCCESSFULLY completed:</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox"
                                class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Bachelor or Higher Degree</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox"
                                class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Adv. Diploma or Assoc. Degree</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox"
                                class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Diploma Level</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox"
                                class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Certificate IV</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox"
                                class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Certificate III</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox"
                                class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Certificate II</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox"
                                class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Certificate I</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox"
                                class="w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                            <span class="text-sm text-gray-700">Miscellaneous Education</span>
                        </label>
                    </div>
                </div>

                <div class="space-y-4 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Which of the following categories
                            BEST describes your current employment status:</label>
                        <select
                            class="w-full md:w-2/3 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
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
                        <label class="block text-sm font-semibold text-gray-700 mb-1">If you are employed, please indicate
                            the industry in which you are employed:</label>
                        <select
                            class="w-full md:w-2/3 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
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
                        <label class="block text-sm font-semibold text-gray-700 mb-1">If you are employed, please indicate
                            the broad category of your occupation:</label>
                        <select
                            class="w-full md:w-2/3 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
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
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Which of the following BEST describes
                            your main reason for undertaking the course(s) for which you are registering:</label>
                        <select
                            class="w-full md:w-2/3 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 bg-white">
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
                    <input type="checkbox" id="ncver"
                        class="mt-1 w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                    <label for="ncver" class="text-gray-700 text-sm cursor-pointer select-none">I understand that I may
                        receive a National Centre for Vocational Education Research (NCVER) student survey and consent to
                        this.</label>
                </div>
            </div>

            <!-- Declaration & Submit -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                <p class="text-gray-700 mb-6">By clicking SUBMIT you declare that the information you have entered above is
                    complete and accurate and you have read our <a href="#"
                        class="text-blue-600 hover:underline font-semibold">PRIVACY NOTICE</a>.</p>

                <button type="submit"
                    class="bg-slate-800 text-white px-10 py-3 rounded-md font-semibold hover:bg-slate-700 transition-colors shadow-md cursor-pointer text-lg">
                    SUBMIT
                </button>
            </div>
        </form>
    </div>
@endsection

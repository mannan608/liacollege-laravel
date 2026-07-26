@extends('student.layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-slate-800 text-white px-8 py-6">
            <h1 class="text-3xl font-bold tracking-tight">Complaint/Appeal Form</h1>
        </div>

        @if(session('success'))
            <div class="m-8 p-4 bg-green-50 border border-green-200 rounded-lg">
                <p class="text-green-800 font-medium">{{ session('success') }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('student.formal-complaint.store') }}" class="p-8 space-y-8">
            @csrf
            <!-- Introduction -->
            <div class="text-gray-700 leading-relaxed text-base">
                <p>We are committed to the continuous improvment of services to all stakeholders. If you have a concern about any part of the services provided to you please use this form to document your complaint or appeal. This will allow us to investigate your issue and and act on any substantiated complaint.</p>
                <p class="mt-4">This facility aheres to the Standards for NVR Registered Training Organisations 2011 which requires that ASQA Registered Training Organisations provide appropriate mechanisms and services to efficiently and effectively address learners' complaints and appeals.</p>
            </div>

            <!-- Authorisation Checkboxes -->
            <div class="space-y-4 border-l-4 border-slate-600 pl-6 py-2">
                <div class="flex items-start gap-3">
                    <input type="checkbox" id="auth1" name="auth_disclosure" value="1" class="mt-1.5 w-5 h-5 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer" {{ old('auth_disclosure') ? 'checked' : '' }}>
                    <label for="auth1" class="text-gray-700 leading-relaxed cursor-pointer select-none">I authorise where necessary, for details submitted within this form, as well as any required personal information about myself and my training to be discretely disclosed to other parties who may need to be involved to help resolve this issue.</label>
                </div>
                @error('auth_disclosure')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
                <div class="flex items-start gap-3">
                    <input type="checkbox" id="auth2" name="auth_terms" value="1" class="mt-1.5 w-5 h-5 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer" {{ old('auth_terms') ? 'checked' : '' }}>
                    <label for="auth2" class="text-gray-700 leading-relaxed cursor-pointer select-none">I have read and understand the terms and conditions of my enrolment and in partcular any clauses pertaining to the complaints and appeals policy and process.</label>
                </div>
                @error('auth_terms')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contact Question -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                <p class="font-semibold text-gray-800 mb-4">Have you already contacted anyone within our organisation about this complaint or appeal?</p>
                <div class="flex gap-8">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="contacted" value="yes" class="w-4 h-4 text-slate-700 border-gray-300 focus:ring-slate-500 cursor-pointer" {{ old('contacted') === 'yes' ? 'checked' : '' }}>
                        <span class="text-gray-700">Yes</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="contacted" value="no" class="w-4 h-4 text-slate-700 border-gray-300 focus:ring-slate-500 cursor-pointer" {{ old('contacted') === 'no' ? 'checked' : '' }}>
                        <span class="text-gray-700">No</span>
                    </label>
                </div>
                @error('contacted')
                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Details of Complaint or Appeal -->
            <div>
                <h2 class="text-xl font-bold text-slate-800 border-b-2 border-slate-200 pb-2 mb-4">Details of Complaint or Appeal</h2>
                <p class="text-gray-700 mb-4">What is the nature of your complaint or appeal? You may select more than one category below.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    @php
                        $complaintTypes = [
                            'Marketing undertaken by our organisation',
                            'Student information provided by our organisation',
                            'Training delivery, resoures and/or materials',
                            'Trainer or other member of our staff',
                            'Fees imposed which were previously undisclosed',
                            'Refund not granted in accordance with agreed terms',
                            'Facilities, equipment or premises',
                            'Record keeping',
                            'Issue of certificates',
                            'Changes to training programs or schedules',
                            'Transfer, withdrawal or deferral of enrolment',
                            'Fraud or criminal activity',
                            'Other'
                        ];
                        $oldComplaintTypes = old('complaint_types', []);
                    @endphp
                    @foreach($complaintTypes as $index => $type)
                        @php
                            $colSpan = ($index === count($complaintTypes) - 1) ? 'md:col-span-2' : '';
                        @endphp
                        <label class="flex items-start gap-3 p-3 rounded-md hover:bg-gray-50 cursor-pointer transition-colors {{ $colSpan }}">
                            <input type="checkbox" name="complaint_types[]" value="{{ $type }}" class="mt-0.5 w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer" {{ in_array($type, $oldComplaintTypes) ? 'checked' : '' }}>
                            <span class="text-gray-700 text-sm">{{ $type }}</span>
                        </label>
                    @endforeach
                </div>
                @error('complaint_types')
                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Course/Unit Details -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                <p class="text-gray-700 mb-4">If your complaint or appeal is in relation to a particular course or unit, please provide the following details:</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Recognised code</label>
                        <input type="text" name="recognised_code" value="{{ old('recognised_code') }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                        @error('recognised_code')
                            <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Course/Unit title</label>
                        <input type="text" name="course_title" value="{{ old('course_title') }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                        @error('course_title')
                            <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Year enrolled</label>
                        <input type="text" name="year_enrolled" value="{{ old('year_enrolled') }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                        @error('year_enrolled')
                            <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Description Textareas -->
            <div class="space-y-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Briefly describe the services being provided to you which pertain to this complaint or appeal:</label>
                    <textarea name="services_description" rows="4" class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent resize-y bg-white">{{ old('services_description') }}</textarea>
                    @error('services_description')
                        <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Describe your complaint or appeal:</label>
                    <textarea name="complaint_description" rows="4" class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent resize-y bg-white">{{ old('complaint_description') }}</textarea>
                    @error('complaint_description')
                        <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Describe any efforts you may have already made to resolve this complaint or appeal:</label>
                    <textarea name="resolution_attempts" rows="4" class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent resize-y bg-white">{{ old('resolution_attempts') }}</textarea>
                    @error('resolution_attempts')
                        <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Please provide any additional information pertaining to this compaint or appeal. This may include, but not limited to, dates, names and content of any written or verbal correspondence.</label>
                    <textarea name="additional_information" rows="4" class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent resize-y bg-white">{{ old('additional_information') }}</textarea>
                    @error('additional_information')
                        <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Resolution -->
            <div>
                <h2 class="text-xl font-bold text-slate-800 border-b-2 border-slate-200 pb-2 mb-4">Resolution</h2>
                <label class="block text-gray-700 font-medium mb-2">What outcome do you hope to be achived by submitting this complaint or appeal?</label>
                <textarea name="desired_outcome" rows="4" class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent resize-y bg-white">{{ old('desired_outcome') }}</textarea>
                @error('desired_outcome')
                    <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Declaration & Form Submission -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                <h2 class="text-xl font-bold text-slate-800 mb-4">Declaration & Form Submission</h2>
                <p class="text-gray-700 mb-4">By submitting this form, I declare that the information provided by me is, to the best of my knowledge true and correct. I Acknowledge that may use the information provided by me to investigate this complaint, and where appropriate, may refer this information to its regulating body in order to resolve.</p>
                <p class="text-gray-700 mb-6">Furthermore, I understand that this information may also be used for investigative and law enforcement purposes.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Enter your full name</label>
                        <input type="text" name="declarant_name" value="{{ old('declarant_name') }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                        @error('declarant_name')
                            <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Submission dated:</label>
                        <input type="text" value="{{ now()->format('l, j F Y') }}" readonly class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-200 text-gray-600 cursor-not-allowed">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4 border-t border-gray-200">
                <button type="submit" class="bg-slate-800 text-white px-8 py-3 rounded-md font-semibold hover:bg-slate-700 transition-colors shadow-md cursor-pointer">
                    Submit Form
                </button>
            </div>
        </form>
    </div>
@endsection

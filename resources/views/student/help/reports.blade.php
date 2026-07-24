@extends('student.layouts.app')

@section('content')
   <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-slate-800 text-white px-8 py-6">
            <h1 class="text-3xl font-bold tracking-tight">Report Technical Issue or Error</h1>
        </div>

        <form class="p-8 space-y-8">
            <!-- Introduction -->
            <div class="text-gray-700 leading-relaxed text-base">
                <p>We are committed to the quality and continuous improvment of our online services. If you have experienced a technical problem or other minor issue regarding the content of your course, please use this form to report the issue. We will attend to the issue and/or advise you further.</p>
            </div>

            <!-- Authorisation Checkbox -->
            <div class="border-l-4 border-slate-600 pl-6 py-2">
                <div class="flex items-start gap-3">
                    <input type="checkbox" id="auth" class="mt-1.5 w-5 h-5 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                    <label for="auth" class="text-gray-700 leading-relaxed cursor-pointer select-none">I authorise where necessary, for details submitted within this form, as well as any required personal information about myself and my training to be discretely disclosed to other parties who may need to be involved to help resolve this issue.</label>
                </div>
            </div>

            <!-- Contact Question -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                <p class="font-semibold text-gray-800 mb-4">Have you already contacted anyone within our organisation about this problem?</p>
                <div class="flex gap-8">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="contacted" value="yes" class="w-4 h-4 text-slate-700 border-gray-300 focus:ring-slate-500 cursor-pointer">
                        <span class="text-gray-700">Yes</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="contacted" value="no" class="w-4 h-4 text-slate-700 border-gray-300 focus:ring-slate-500 cursor-pointer">
                        <span class="text-gray-700">No</span>
                    </label>
                </div>
            </div>

            <!-- Details of The Issue -->
            <div>
                <h2 class="text-xl font-bold text-slate-800 border-b-2 border-slate-200 pb-2 mb-4">Details of The Issue</h2>
                <p class="text-gray-700 mb-4">What is the nature of your issue?</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <label class="flex items-start gap-3 p-3 rounded-md hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="mt-0.5 w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                        <span class="text-gray-700 text-sm">Error in question text</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-md hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="mt-0.5 w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                        <span class="text-gray-700 text-sm">Error in learning material</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-md hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="mt-0.5 w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                        <span class="text-gray-700 text-sm">Inaccessible supplementary learning material</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-md hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="mt-0.5 w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                        <span class="text-gray-700 text-sm">Missing page element</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-md hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="mt-0.5 w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                        <span class="text-gray-700 text-sm">Answer assist problem</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-md hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="mt-0.5 w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                        <span class="text-gray-700 text-sm">Student portal technical issue</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-md hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="mt-0.5 w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                        <span class="text-gray-700 text-sm">Miscellaneous error</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-md hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="mt-0.5 w-4 h-4 text-slate-700 rounded border-gray-300 focus:ring-slate-500 cursor-pointer">
                        <span class="text-gray-700 text-sm">Other</span>
                    </label>
                </div>
            </div>

            <!-- Course/Unit Details -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                <p class="text-gray-700 mb-4">If your issue is in relation to a particular course or unit, please provide the following details:</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Recognised code</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Course/Unit title</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Year enrolled</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
                    </div>
                </div>
            </div>

            <!-- Question ID -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">If the problem pertains to a single exam question, please supply the Question ID (QID) number here:</label>
                <input type="text" class="w-full md:w-1/2 border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent bg-white">
            </div>

            <!-- Describe the problem -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Describe the problem.<br>If applicable to the problem, please include the name of the unit, exam and section.</label>
                <textarea rows="6" class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-transparent resize-y bg-white"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="pt-4 border-t border-gray-200">
                <button type="submit" class="bg-slate-800 text-white px-8 py-3 rounded-md font-semibold hover:bg-slate-700 transition-colors shadow-md cursor-pointer">
                    Submit Report
                </button>
            </div>
        </form>
    </div>
@endsection
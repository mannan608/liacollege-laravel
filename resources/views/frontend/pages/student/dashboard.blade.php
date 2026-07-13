
@extends('frontend.pages.student.layouts.app')

@section('content')
<div id="divContentBody" class="max-w-7xl mx-auto px-6 lg:px-8 py-10">

    {{-- Hidden fields - unchanged --}}
    <input type="hidden" id="student_firstname" value="Sudikshya">
    <input type="hidden" id="student_surname" value="Khanal">

    <!-- Page Header -->
    <div class="mb-10">
        <h1 class="text-3xl lg:text-4xl font-semibold text-slate-900 tracking-tight">
            My Certificates
        </h1>

        <p class="mt-3 text-slate-500 text-base leading-7 max-w-3xl">
            The following are links to PDF copies of your certificates, statements of attainment,
            and confirmations of completion for your successful course or unit completions.
        </p>
    </div>

    <!-- Courses Section -->
    <div class="mb-8">

        <div class="flex items-center gap-3 mb-5">
            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">
                <i class="fa-solid fa-graduation-cap text-slate-600"></i>
            </div>

            <h2 class="text-xl font-semibold text-slate-900">
                Courses
            </h2>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">

            <div class="overflow-x-auto">
                <table class="w-full">

                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="w-16 px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">
                                #
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Title
                            </th>

                            <th class="w-44 px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Issue Date
                            </th>

                            <th class="w-44 px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Expiry Date
                            </th>

                            <th class="w-32 px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-5 text-center text-slate-500 font-medium">
                                1
                            </td>

                            <td class="px-6 py-5">
                                <div class="font-medium text-slate-900">
                                    Provide First Aid
                                </div>
                            </td>

                            <td class="px-6 py-5 text-center text-slate-500">
                                10 Jul 2026
                            </td>

                            <td class="px-6 py-5 text-center text-slate-500">
                                09 Jul 2029
                            </td>

                            <td class="px-6 py-5 text-center">

                                <button
                                    onclick="window.location='cert_director.php?id=4195974'"
                                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 hover:border-slate-300 transition">

                                    <i class="fa-solid fa-eye text-sm"></i>

                                    <span class="font-medium">
                                        View
                                    </span>

                                </button>

                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <!-- Units + Manual Certificates -->
    <div class="grid lg:grid-cols-2 gap-6">

        <!-- Units -->
        <div>

            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">
                    <i class="fa-solid fa-puzzle-piece text-slate-600"></i>
                </div>

                <h2 class="text-xl font-semibold text-slate-900">
                    Units
                </h2>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-10 text-center shadow-sm">

                <div class="w-14 h-14 mx-auto rounded-xl bg-slate-100 flex items-center justify-center mb-5">
                    <i class="fa-solid fa-file-circle-xmark text-xl text-slate-400"></i>
                </div>

                <h4 class="font-medium text-slate-900 mb-2">
                    No Unit Certificates
                </h4>

                <p class="text-slate-500">
                    You have no unit certificates available to view at this time.
                </p>

            </div>

        </div>

        <!-- Manual Certificates -->
        <div>

            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">
                    <i class="fa-solid fa-folder-open text-slate-600"></i>
                </div>

                <h2 class="text-xl font-semibold text-slate-900">
                    Manual Certificates
                </h2>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

                <div class="bg-slate-50 border border-slate-200 rounded-xl px-5 py-4">

                    <div class="flex items-start gap-3">

                        <i class="fa-solid fa-circle-info text-slate-400 mt-0.5"></i>

                        <div>

                            <div class="font-medium text-slate-800">
                                No Documents Found
                            </div>

                            <div class="text-sm text-slate-500 mt-1">
                                There are currently no manually uploaded certificates available.
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="h-10"></div>

</div>
@endsection

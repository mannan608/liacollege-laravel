<footer class="w-full border-t bg-slate-50 border-slate-200 dark:bg-gray-900/95 dark:border-gray-800">

    <div
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-12 sm:py-16">

        {{-- Column 1 --}}
        <div class="space-y-5 text-center sm:text-left">

            <div class="flex sm:justify-start items-center justify-center">
                <a href="/">
                    <img src="{{ asset('logo.webp') }}" alt="logo" class="w-20 h-auto">
                </a>
            </div>

            <ul class="text-slate-500 text-sm space-y-2">

                <li class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                  Level 14 333 Collins St, MELBOURNE, VIC, 3000
                </li>
                  <li class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                  0479 110 567
                </li>
                 <li class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                  training@liacollege.edu.au
                </li>
                  <li class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                  For Admission & Enrolment <br>
                  0468 092 898
                  enrol@liacollege.edu.au
                </li>               

            </ul>

        </div>


        {{-- Column 2 --}}
        <div class="space-y-5 text-center flex flex-col items-center">

            <h4 class="font-bold uppercase tracking-widest text-xs text-slate-900">
                Terms & Policies
            </h4>
            <ul class="space-y-2 text-sm">

                <li><a class="text-slate-500 hover:text-slate-900" href="#"> Privacy Policy</a></li>
                <li><a class="text-slate-500 hover:text-slate-900" href="#">Refund/Cancellation Policy</a></li>
                <li><a class="text-slate-500 hover:text-slate-900" href="#">Course Payment Policy</a></li>

            </ul>
        </div>

        {{-- Column 3 --}}
        <div class="space-y-5 text-center flex flex-col items-center">
            <h4 class="font-bold uppercase tracking-widest text-xs text-slate-900">
                Useful Links
            </h4>
            <ul class="space-y-2 text-sm">

                <li><a class="text-slate-500 hover:text-slate-900" href="https://www.usi.gov.au/"> Create USI</a></li>
                <li><a class="text-slate-500 hover:text-slate-900" href="https://www.checked.com.au/">Create Police Report </a></li>
                <li><a class="text-slate-500 hover:text-slate-900" href="https://www.service.nsw.gov.au/transaction/apply-for-a-working-with-children-check">Working with Children Check (WWCC) </a></li>
                <li><a class="text-slate-500 hover:text-slate-900" href="https://www.service.nsw.gov.au/services/ndiswc">NDIS Check</a></li>
                <li><a class="text-slate-500 hover:text-slate-900" href="https://www.advancecollege.edu.au/policy-and-procedure/">Policy and Procedures</a></li>
            </ul>
        </div>

        {{-- Column 4 --}}
        <div class="space-y-5 text-center sm:flex sm:flex-col sm:items-end sm:text-end">

            <h4 class="font-bold uppercase tracking-widest text-xs text-slate-900">
                Accreditation
            </h4>
            <ul class="space-y-2 text-sm text-slate-500">

                <li class="mb-3">
                    {{-- <div class="flex flex-wrap justify-center items-center gap-4  transition-all duration-500">
                        <img class="h-10 object-contain"
                            data-alt="sleek corporate mark for a global vocational training federation"
                            src="{{ asset('patner_2.png') }}" alt="patner">
                    </div> --}}
                    <div class="grid grid-cols-2 gap-6 sm:grid-cols-2 items-end justify-end ">
                        <div
                            class="group flex items-center justify-center  transition-all duration-300 ">
                            <img src="https://liacollege.edu.au/frontend/images/brand/11.png" alt="Brand 1"
                                class="h-24 w-auto object-contain  transition-all duration-300  group-hover:grayscale-0">
                        </div>
                        <div
                            class="group flex items-center justify-center  transition-all duration-300 ">
                            <img src="https://liacollege.edu.au/frontend/images/brand/2.png" alt="Brand 2"
                                class="h-24 w-auto object-contain  transition-all duration-300  group-hover:grayscale-0">
                        </div>
                    </div>
                </li>
                {{-- <li><strong>RTO No. 46049</strong></li>
                <li>ABN: 93 653 303 621</li> --}}

            </ul>

        </div>

    </div>


    {{-- Bottom Bar --}}

    <div class="border-t border-slate-200 py-6">
        <div
            class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-3 text-center sm:text-left">

            <p class="text-slate-500 text-xs sm:text-sm">
                Copyright © 2026 All Rights Reserved <strong>Education and Training Pty Ltd</strong> trading as  <strong>Leadership Institute Australia</strong>
            </p>

            <span class="text-slate-400 text-xs sm:text-sm">
                RTO <strong>46049</strong> | ABN: <strong>93 653 303 621</strong>
            </span>
        </div>
    </div>
</footer>

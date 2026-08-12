    <!-- Footer -->
    <footer class="bg-brand-500 text-white">

        <!-- Main Footer Content -->
        <div class="max-w-7xl mx-auto px-6 pt-20 pb-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8">

                <!-- Brand Column -->
                <div class="lg:col-span-3">
                    <div class="flex items-center gap-3 mb-6">
                        <!-- Logo Shield -->
                      <a href="/">
                    <img src="{{ asset('logo.webp') }}" alt="logo" class="w-28 h-auto">
                </a>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed mb-8 max-w-xs">
                        Empowering futures through quality education and professional training since 2008.
                    </p>

                    <!-- Terms & Policies -->
                    <div>
                        <h4 class="text-brand-gold text-xs font-semibold tracking-widest uppercase mb-4">Terms & Policies</h4>
                        <ul class="space-y-3">
                            <li>
                                <a href="#" class="group flex items-center gap-2 text-slate-400 hover:text-white transition-colors duration-200 text-sm">
                                    <svg class="w-4 h-4 text-brand-gold/60 group-hover:text-brand-gold transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/></svg>
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('refund-policy') }}" class="group flex items-center gap-2 text-slate-400 hover:text-white transition-colors duration-200 text-sm">
                                    <svg class="w-4 h-4 text-brand-gold/60 group-hover:text-brand-gold transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Refund & Cancellation
                                </a>
                            </li>
                            <li>
                                <a href="#" class="group flex items-center gap-2 text-slate-400 hover:text-white transition-colors duration-200 text-sm">
                                    <svg class="w-4 h-4 text-brand-gold/60 group-hover:text-brand-gold transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"/></svg>
                                    Course Payment Policy
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Useful Links Column -->
                <div class="lg:col-span-3 lg:col-start-5">
                    <h4 class="text-brand-gold text-xs font-semibold tracking-widest uppercase mb-6">Useful Links</h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="https://www.usi.gov.au/" class="group flex items-start gap-3 text-slate-300 hover:text-white transition-colors duration-200">
                                <span class="mt-0.5 w-5 h-5 rounded-md bg-white/5 flex items-center justify-center group-hover:bg-brand-gold/20 transition-colors">
                                    <svg class="w-3 h-3 text-brand-gold" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                                </span>
                                <span class="text-sm">Create USI</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.checked.com.au/" class="group flex items-start gap-3 text-slate-300 hover:text-white transition-colors duration-200">
                                <span class="mt-0.5 w-5 h-5 rounded-md bg-white/5 flex items-center justify-center group-hover:bg-brand-gold/20 transition-colors">
                                    <svg class="w-3 h-3 text-brand-gold" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                                </span>
                                <span class="text-sm">Create Police Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.service.nsw.gov.au/transaction/apply-for-a-working-with-children-check" class="group flex items-start gap-3 text-slate-300 hover:text-white transition-colors duration-200">
                                <span class="mt-0.5 w-5 h-5 rounded-md bg-white/5 flex items-center justify-center group-hover:bg-brand-gold/20 transition-colors">
                                    <svg class="w-3 h-3 text-brand-gold" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                                </span>
                                <span class="text-sm">Working With Children Check</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.service.nsw.gov.au/services/ndiswc" class="group flex items-start gap-3 text-slate-300 hover:text-white transition-colors duration-200">
                                <span class="mt-0.5 w-5 h-5 rounded-md bg-white/5 flex items-center justify-center group-hover:bg-brand-gold/20 transition-colors">
                                    <svg class="w-3 h-3 text-brand-gold" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                                </span>
                                <span class="text-sm">NDIS Check</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="group flex items-start gap-3 text-slate-300 hover:text-white transition-colors duration-200">
                                <span class="mt-0.5 w-5 h-5 rounded-md bg-white/5 flex items-center justify-center group-hover:bg-brand-gold/20 transition-colors">
                                    <svg class="w-3 h-3 text-brand-gold" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                                </span>
                                <span class="text-sm">Policy & Procedures</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Admission Card -->
                    <div class="mt-8 p-5 rounded-2xl bg-gradient-to-br from-white/10 to-white/5 border border-white/10 backdrop-blur-sm">
                        <div class="flex items-center gap-2 mb-3">
                            <svg class="w-4 h-4 text-brand-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                            <span class="text-brand-gold text-xs font-semibold tracking-wide">For Admission & Enrolment</span>
                        </div>
                        <a href="mailto:enrol@liacollege.edu.au" class="text-white text-sm font-medium hover:text-brand-gold transition-colors">enrol@liacollege.edu.au</a>
                        <div class="mt-1 text-slate-400 text-sm">0468 092 898</div>
                    </div>
                </div>

                <!-- Contact & Accreditation Column -->
                <div class="lg:col-span-4 lg:col-start-9">

                    <!-- Accreditation -->
                    <div class="mb-10">
                        <h4 class="text-brand-gold text-xs font-semibold tracking-widest uppercase mb-6">Accreditation</h4>
                        <div class="flex items-center gap-4">
                            <!-- NRT Badge -->
                            <div class="px-4 py-3 rounded-xl bg-white/5 border border-white/10 flex items-center gap-3 hover:bg-white/10 transition-colors">
                                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-red-500 to-red-700 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                                </div>
                                <div>
                                    <div class="text-white text-xs font-bold leading-tight">Nationally</div>
                                    <div class="text-white text-xs font-bold leading-tight">Recognised</div>
                                    <div class="text-slate-400 text-[10px] leading-tight">Training</div>
                                </div>
                            </div>
                            <!-- AQF Badge -->
                            <div class="px-4 py-3 rounded-xl bg-white/5 border border-white/10 flex items-center gap-3 hover:bg-white/10 transition-colors">
                                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.499 5.221 69.78 69.78 0 00-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/></svg>
                                </div>
                                <div>
                                    <div class="text-white text-xs font-bold leading-tight">Australian</div>
                                    <div class="text-white text-xs font-bold leading-tight">Qualifications</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="mb-8">
                        <ul class="space-y-1">
                            <li>
                                <a href="tel:0479110567" class="group flex items-center gap-3 text-slate-300 hover:text-white transition-colors duration-200">
                                    <span class="w-9 h-9 rounded-lg bg-brand-gold/10 flex items-center justify-center group-hover:bg-brand-gold/20 transition-colors">
                                        <svg class="w-4 h-4 text-brand-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                                    </span>
                                    <span class="text-sm">0479 110 567</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:training@liacollege.edu.au" class="group flex items-center gap-3 text-slate-300 hover:text-white transition-colors duration-200">
                                    <span class="w-9 h-9 rounded-lg bg-brand-gold/10 flex items-center justify-center group-hover:bg-brand-gold/20 transition-colors">
                                        <svg class="w-4 h-4 text-brand-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                                    </span>
                                    <span class="text-sm">training@liacollege.edu.au</span>
                                </a>
                            </li>
                            <li>
                                <div class="flex items-start gap-3 text-slate-300">
                                    <span class="w-9 h-9 rounded-lg bg-brand-gold/10 flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4 text-brand-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                                    </span>
                                    <span class="text-sm leading-relaxed">Level 14, 333 Collins St<br>Melbourne, VIC 3000</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="http://wa.me/+61468092898" class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-white text-sm font-semibold transition-all duration-200 shadow-lg shadow-emerald-500/25 hover:shadow-emerald-400/30 hover:-translate-y-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"/></svg>
                            Start Chat
                        </a>
                        <a href="https://api.leadconnectorhq.com/widget/booking/dp31qqshThiwc7Uslqjp" class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-sky-500 hover:bg-sky-400 text-white text-sm font-semibold transition-all duration-200 shadow-lg shadow-sky-500/25 hover:shadow-sky-400/30 hover:-translate-y-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
                            Book Meeting
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-6 py-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-white text-sm text-center md:text-left">
                        &copy; 2026 All rights reserved. Education and Training Pty Ltd. trading as <span class="text-brand-gold font-medium">Leadership Institute Australia</span>
                    </p>
                    <div class="flex items-center gap-6">
                        <div class="flex items-center gap-2 text-white text-sm">
                            <svg class="w-4 h-4 text-brand-gold/60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
                            <span>RTO 46049</span>
                        </div>
                        <div class="flex items-center gap-2 text-white text-sm">
                            <svg class="w-4 h-4 text-brand-gold/60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                            <span>ABN 93 653 303 621</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
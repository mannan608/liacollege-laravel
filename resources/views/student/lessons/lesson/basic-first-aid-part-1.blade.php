<div data-completion-type="scroll">
   <!-- Header -->
    <header class="bg-white border-b border-slate-100 animate-fade-in">
        <div class="  mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">
            <div class="flex flex-col sm:flex-row items-center gap-3 sm:gap-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-teal-500 to-emerald-600 flex items-center justify-center flex-shrink-0 animate-bounce-soft">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <div class="text-center sm:text-left">
                    <p class="text-xs sm:text-sm font-semibold text-teal-600 uppercase tracking-wider">Basic First Aid Part 1</p>
                    <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Recognising an Emergency Situation</h1>
                </div>
            </div>
        </div>
    </header>

    <main class="  mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 space-y-8 sm:space-y-12">
        
        <!-- Hero Image Section -->
        <section class="reveal relative rounded-3xl overflow-hidden border border-slate-200">
            <div class="aspect-[21/9] sm:aspect-[21/8] bg-gradient-to-br from-slate-200 to-slate-300 relative">
              <img src="{{ asset('course-images/part-one/emergency-situation.jpg') }}" alt="">
            </div>
        </section>

        <!-- Emergency Definition -->
        <section class="reveal reveal-delay-1 bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 lg:p-10">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-teal-50 flex items-center justify-center flex-shrink-0 mt-1">
                    <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 mb-3">What is an Emergency?</h3>
                    <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                        An emergency situation can vary in type and severity. When thinking about first aid, an emergency is a situation that poses an <strong class="text-slate-900">immediate risk to health or life</strong>.
                    </p>
                </div>
            </div>
        </section>

        <!-- The 4 Ps -->
        <section class="reveal">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center">
                    <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Principles of First Aid — The 4 Ps</h2>
            </div>
            
           <div
    class="relative rounded-3xl overflow-hidden border border-slate-200 bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('course-images/part-one/torongo.jpg') }}');">
     <div class="aspect-[16/10] sm:aspect-[21/9]  relative">                    
                    <div class="absolute inset-0 flex items-center p-6 sm:p-10">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 w-full">
                            <div class="reveal-delay-1 bg-white/10 backdrop-blur-sm rounded-2xl p-5 border border-white/20 hover:bg-white/20 transition-colors duration-300">
                                <div class="w-10 h-10 rounded-full bg-teal-500/30 flex items-center justify-center mb-3">
                                    <span class="text-lg font-bold text-teal-300">1</span>
                                </div>
                                <h3 class="text-lg font-bold text-white mb-1">Preserve Life</h3>
                                <p class="text-sm text-slate-300">Your top priority is to keep the casualty alive.</p>
                            </div>
                            <div class="reveal-delay-2 bg-white/10 backdrop-blur-sm rounded-2xl p-5 border border-white/20 hover:bg-white/20 transition-colors duration-300">
                                <div class="w-10 h-10 rounded-full bg-emerald-500/30 flex items-center justify-center mb-3">
                                    <span class="text-lg font-bold text-emerald-300">2</span>
                                </div>
                                <h3 class="text-lg font-bold text-white mb-1">Protect from Harm</h3>
                                <p class="text-sm text-slate-300">Shield the casualty from further injury.</p>
                            </div>
                            <div class="reveal-delay-3 bg-white/10 backdrop-blur-sm rounded-2xl p-5 border border-white/20 hover:bg-white/20 transition-colors duration-300">
                                <div class="w-10 h-10 rounded-full bg-cyan-500/30 flex items-center justify-center mb-3">
                                    <span class="text-lg font-bold text-cyan-300">3</span>
                                </div>
                                <h3 class="text-lg font-bold text-white mb-1">Prevent Worsening</h3>
                                <p class="text-sm text-slate-300">Stop the condition from deteriorating.</p>
                            </div>
                            <div class="reveal-delay-4 bg-white/10 backdrop-blur-sm rounded-2xl p-5 border border-white/20 hover:bg-white/20 transition-colors duration-300">
                                <div class="w-10 h-10 rounded-full bg-amber-500/30 flex items-center justify-center mb-3">
                                    <span class="text-lg font-bold text-amber-300">4</span>
                                </div>
                                <h3 class="text-lg font-bold text-white mb-1">Promote Recovery</h3>
                                <p class="text-sm text-slate-300">Support the healing process where possible.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Multiple Casualties -->
        <section class="reveal bg-white rounded-2xl border-l-4 border-rose-500 border-y border-r border-slate-200 p-6 sm:p-8">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-rose-50 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="text-lg sm:text-xl font-bold text-slate-900 mb-4">Multiple Casualties — Priorities for First Aid</h2>
                    <div class="p-4 rounded-xl bg-rose-50 border border-rose-100 mb-4">
                        <p class="text-base sm:text-lg font-semibold text-rose-800 flex items-center gap-2">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            Any <strong>unconscious casualties</strong> should be attended to first.
                        </p>
                    </div>
                    <p class="text-base sm:text-lg font-semibold text-slate-900 mb-3">First Aiders should:</p>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3 p-3 rounded-lg bg-slate-50 border border-slate-100 hover:border-teal-200 hover:bg-teal-50/50 transition-all duration-300">
                            <svg class="w-5 h-5 text-teal-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <p class="text-slate-700">Be careful not to injure themselves in the rendering of first aid</p>
                        </div>
                        <div class="flex items-start gap-3 p-3 rounded-lg bg-slate-50 border border-slate-100 hover:border-teal-200 hover:bg-teal-50/50 transition-all duration-300">
                            <svg class="w-5 h-5 text-teal-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <p class="text-slate-700">Be mindful of manual handling techniques, needle stick injuries, electrocution, chemicals, animals, fire, aggressive people and other dangers that may surround a casualty</p>
                        </div>
                        <div class="flex items-start gap-3 p-3 rounded-lg bg-slate-50 border border-slate-100 hover:border-teal-200 hover:bg-teal-50/50 transition-all duration-300">
                            <svg class="w-5 h-5 text-teal-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <p class="text-slate-700">Be mindful of the risks of infection</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Safe Work Practices - Manual Handling -->
        <section class="reveal">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center">
                    <svg class="w-4 h-4 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"></path>
                    </svg>
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Safe Work Practices — Manual Handling</h2>
            </div>
            
             <div
    class="relative rounded-3xl overflow-hidden border border-slate-200 bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('course-images/part-one/city.jpg') }}');">

                <div class="aspect-[16/10] sm:aspect-[21/9] relative">
                    <div class="absolute inset-0 opacity-15 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-amber-400 via-transparent to-transparent"></div>
                    <div class="absolute inset-0 flex items-center p-6 sm:p-10">
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 w-full">
                            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 sm:p-5 border border-white/20 text-center hover:bg-white/20 transition-all duration-300 hover:scale-[1.02]">
                                <div class="w-12 h-12 rounded-full bg-amber-500/30 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                                </div>
                                <h3 class="text-base sm:text-lg font-bold text-white">Bend Knees</h3>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 sm:p-5 border border-white/20 text-center hover:bg-white/20 transition-all duration-300 hover:scale-[1.02]">
                                <div class="w-12 h-12 rounded-full bg-amber-500/30 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <h3 class="text-base sm:text-lg font-bold text-white">Use Leg &amp; Abdominal Muscles</h3>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 sm:p-5 border border-white/20 text-center hover:bg-white/20 transition-all duration-300 hover:scale-[1.02]">
                                <div class="w-12 h-12 rounded-full bg-amber-500/30 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h3 class="text-base sm:text-lg font-bold text-white">Know Your Limitations</h3>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 sm:p-5 border border-white/20 text-center hover:bg-white/20 transition-all duration-300 hover:scale-[1.02]">
                                <div class="w-12 h-12 rounded-full bg-amber-500/30 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <h3 class="text-base sm:text-lg font-bold text-white">Ask for Help</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Conscious Casualty -->
        <section class="reveal bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="p-6 sm:p-8 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900">A Conscious Casualty</h2>
                </div>
                <p class="mt-3 text-slate-600 text-base sm:text-lg">Do not move the casualty unless absolutely necessary.</p>
            </div>
            
            <div class="p-6 sm:p-8">
                <div class="mb-6">
                    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">Initial Steps</h3>
                    <div class="space-y-3">
                        <div class="flex items-start gap-4 group">
                            <div class="w-8 h-8 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center font-bold text-sm flex-shrink-0 group-hover:bg-teal-600 group-hover:text-white transition-colors duration-300">1</div>
                            <p class="text-slate-700 pt-1">Lay the person down on the floor and make them comfortable</p>
                        </div>
                        <div class="flex items-start gap-4 group">
                            <div class="w-8 h-8 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center font-bold text-sm flex-shrink-0 group-hover:bg-teal-600 group-hover:text-white transition-colors duration-300">2</div>
                            <p class="text-slate-700 pt-1">Assess the person for consciousness, bleeding and complications</p>
                        </div>
                        <div class="flex items-start gap-4 group">
                            <div class="w-8 h-8 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center font-bold text-sm flex-shrink-0 group-hover:bg-teal-600 group-hover:text-white transition-colors duration-300">3</div>
                            <p class="text-slate-700 pt-1">Recruit help</p>
                        </div>
                        <div class="flex items-start gap-4 group">
                            <div class="w-8 h-8 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center font-bold text-sm flex-shrink-0 group-hover:bg-teal-600 group-hover:text-white transition-colors duration-300">4</div>
                            <p class="text-slate-700 pt-1">Call <strong class="text-slate-900">000</strong> if serious injury is suspected</p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-100 pt-6 mb-6">
                    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">If Not Seriously Hurt — Help Them Stand</h3>
                    <div class="space-y-3">
                        <div class="flex items-start gap-4 group">
                            <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm flex-shrink-0 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">1</div>
                            <p class="text-slate-700 pt-1">Roll them onto their side and then</p>
                        </div>
                        <div class="flex items-start gap-4 group">
                            <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm flex-shrink-0 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">2</div>
                            <p class="text-slate-700 pt-1">Onto all fours and then</p>
                        </div>
                        <div class="flex items-start gap-4 group">
                            <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm flex-shrink-0 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">3</div>
                            <p class="text-slate-700 pt-1">Into a kneeling position and finally</p>
                        </div>
                        <div class="flex items-start gap-4 group">
                            <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm flex-shrink-0 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">4</div>
                            <p class="text-slate-700 pt-1">Using a chair as a prop, help the person up and onto the chair</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-amber-50 border border-amber-200">
                    <p class="text-amber-800 font-semibold flex items-center gap-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        If the person is unable to do this with light assistance, an ambulance should be called.
                    </p>
                </div>
            </div>
        </section>

        <!-- Statement Quote -->
        <section class="reveal">
            <div class="bg-gradient-to-r from-slate-100 to-slate-200 rounded-2xl border border-slate-200 p-8 sm:p-12 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-teal-400 via-emerald-400 to-cyan-400"></div>
                <div class="relative">
                    <svg class="w-10 h-10 text-teal-400 mx-auto mb-4 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"></path>
                    </svg>
                    <p class="text-lg sm:text-xl lg:text-2xl font-bold text-slate-800 leading-relaxed max-w-3xl mx-auto">
                        When uncontrollable hazards are present (e.g. fires), a casualty should always be moved to safety, where possible.
                    </p>
                </div>
            </div>
        </section>

        <!-- PPE + Infection Control -->
        <section class="reveal">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- PPE Image Card -->
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden group">
                    <div class="aspect-[4/3] bg-gradient-to-br from-slate-200 to-slate-300 relative overflow-hidden">
                        <img src="{{ asset('course-images/part-one/ppe.jpg') }}" alt="">
                    </div>
                    <div class="p-5 text-center">
                        <p class="text-base font-bold text-slate-900">PPE is important when providing First Aid</p>
                    </div>
                </div>

                <!-- Infection Control Content -->
                <div class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 flex flex-col justify-center">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-xl bg-cyan-50 flex items-center justify-center">
                            <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <h2 class="text-lg sm:text-xl font-bold text-slate-900">Safe Work Practices — Infection Control</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3 p-3 rounded-lg bg-slate-50 border border-slate-100 hover:bg-cyan-50 hover:border-cyan-200 transition-all duration-300">
                            <svg class="w-5 h-5 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <p class="text-slate-700">Wash hands before and after treating a casualty as well as before and after wearing gloves</p>
                        </div>
                        <div class="flex items-start gap-3 p-3 rounded-lg bg-slate-50 border border-slate-100 hover:bg-cyan-50 hover:border-cyan-200 transition-all duration-300">
                            <svg class="w-5 h-5 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <p class="text-slate-700">Use barriers where available e.g. gloves, masks, goggles and a resuscitation barrier device</p>
                        </div>
                        <div class="flex items-start gap-3 p-3 rounded-lg bg-slate-50 border border-slate-100 hover:bg-cyan-50 hover:border-cyan-200 transition-all duration-300">
                            <svg class="w-5 h-5 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <p class="text-slate-700">Remove and dispose of used gloves and masks appropriately</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Needle Stick Risk -->
        <section class="reveal bg-white rounded-2xl border border-slate-200 p-6 sm:p-8">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-rose-50 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg sm:text-xl font-bold text-slate-900 mb-3">Needle Stick Injury Risk</h2>
                    <p class="text-base sm:text-lg text-slate-600 mb-4">The risk of catching a serious infection from a needle stick injury (Hepatitis B, C and HIV) is very low however you can reduce the risk by:</p>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3 p-3 rounded-lg bg-slate-50 border border-slate-100 hover:bg-rose-50 hover:border-rose-200 transition-all duration-300">
                            <svg class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                            <p class="text-slate-700">Never bending or snapping used needles</p>
                        </div>
                        <div class="flex items-start gap-3 p-3 rounded-lg bg-slate-50 border border-slate-100 hover:bg-rose-50 hover:border-rose-200 transition-all duration-300">
                            <svg class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                            <p class="text-slate-700">Never re-cap a needle</p>
                        </div>
                        <div class="flex items-start gap-3 p-3 rounded-lg bg-slate-50 border border-slate-100 hover:bg-rose-50 hover:border-rose-200 transition-all duration-300">
                            <svg class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <p class="text-slate-700">Place needles and sharps into approved containers</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Needle Stick First Aid -->
      <section class="reveal">
    <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden">
        <!-- Top Image Banner -->
        <div 
            class="w-full h-48 sm:h-64 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('course-images/part-one/stick-injury.jpg') }}');">
        </div>
        
        <!-- Content Area -->
        <div class="p-6 sm:p-10">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-rose-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Needle Stick Injury First Aid</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-rose-50 rounded-2xl p-5 border border-rose-100 hover:bg-rose-100 transition-all duration-300 group">
                    <div class="w-10 h-10 rounded-full bg-rose-200 flex items-center justify-center mb-3 group-hover:bg-rose-300 transition-colors">
                        <span class="text-sm font-bold text-rose-700">1</span>
                    </div>
                    <p class="text-slate-700 font-medium">Wash injury site with soap and water</p>
                </div>

                <div class="bg-rose-50 rounded-2xl p-5 border border-rose-100 hover:bg-rose-100 transition-all duration-300 group">
                    <div class="w-10 h-10 rounded-full bg-rose-200 flex items-center justify-center mb-3 group-hover:bg-rose-300 transition-colors">
                        <span class="text-sm font-bold text-rose-700">2</span>
                    </div>
                    <p class="text-slate-700 font-medium">Place syringe in a plastic drink bottle or sharps container</p>
                </div>

                <div class="bg-rose-50 rounded-2xl p-5 border border-rose-100 hover:bg-rose-100 transition-all duration-300 group">
                    <div class="w-10 h-10 rounded-full bg-rose-200 flex items-center justify-center mb-3 group-hover:bg-rose-300 transition-colors">
                        <span class="text-sm font-bold text-rose-700">3</span>
                    </div>
                    <p class="text-slate-700 font-medium">Send syringe to hospital with casualty for analysis as soon as possible</p>
                </div>
            </div>
        </div>
    </div>
</section>
   
    </main>
</div>
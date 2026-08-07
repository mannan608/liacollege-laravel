@extends('frontend.layouts.app')

@section('content')
     <!-- Course Structure -->
<section id="structure" class="py-16 md:py-24 lg:py-32 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-12 md:mb-16 section-reveal">
      <div class="inline-flex items-center gap-2 bg-primary-50 text-primary-700 px-4 py-1.5 rounded-full text-sm font-semibold mb-6">
        <span class="material-symbols-outlined text-base">menu_book</span> Course Structure
      </div>
      <h2 class="section-title font-display text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 mb-6">
        Your Learning <span class="text-gradient">Journey</span>
      </h2>
      <p class="text-lg font-semibold text-primary-600">Total Units: 15 Units (9 Core + 6 Elective)</p>
    </div>
    <div class="grid lg:grid-cols-2 gap-8 md:gap-12">
      <!-- Core Units -->
      <div class="section-reveal stagger-1">
        <div class="flex items-center gap-3 mb-6 md:mb-8">
          <div class="w-10 h-10 rounded-lg bg-primary-100 flex items-center justify-center">
            <span class="material-symbols-outlined text-primary-600">bookmark</span>
          </div>
          <h3 class="text-xl md:text-2xl font-bold text-slate-900">Core Units <span class="text-slate-400 font-normal">(9)</span></h3>
        </div>
        <div class="space-y-3">
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-primary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-primary-600 bg-primary-50 px-2 py-1 rounded-md">CHCCCS031</span><p class="text-slate-700 mt-1 font-medium">Provide individualized support</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-primary-500 transition-colors">chevron_right</span>
            </div>
          </div>
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-primary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-primary-600 bg-primary-50 px-2 py-1 rounded-md">CHCCCS038</span><p class="text-slate-700 mt-1 font-medium">Facilitate the empowerment of people receiving support</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-primary-500 transition-colors">chevron_right</span>
            </div>
          </div>
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-primary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-primary-600 bg-primary-50 px-2 py-1 rounded-md">CHCCCS040</span><p class="text-slate-700 mt-1 font-medium">Support independence and wellbeing</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-primary-500 transition-colors">chevron_right</span>
            </div>
          </div>
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-primary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-primary-600 bg-primary-50 px-2 py-1 rounded-md">CHCCCS041</span><p class="text-slate-700 mt-1 font-medium">Recognise healthy body systems</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-primary-500 transition-colors">chevron_right</span>
            </div>
          </div>
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-primary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-primary-600 bg-primary-50 px-2 py-1 rounded-md">CHCCOM005</span><p class="text-slate-700 mt-1 font-medium">Communicate and work in health or community services</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-primary-500 transition-colors">chevron_right</span>
            </div>
          </div>
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-primary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-primary-600 bg-primary-50 px-2 py-1 rounded-md">CHCDIV001</span><p class="text-slate-700 mt-1 font-medium">Work with diverse people</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-primary-500 transition-colors">chevron_right</span>
            </div>
          </div>
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-primary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-primary-600 bg-primary-50 px-2 py-1 rounded-md">CHCLEG001</span><p class="text-slate-700 mt-1 font-medium">Work legally and ethically</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-primary-500 transition-colors">chevron_right</span>
            </div>
          </div>
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-primary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-primary-600 bg-primary-50 px-2 py-1 rounded-md">HLTINF006</span><p class="text-slate-700 mt-1 font-medium">Apply basic principles of infection prevention and control</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-primary-500 transition-colors">chevron_right</span>
            </div>
          </div>
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-primary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-primary-600 bg-primary-50 px-2 py-1 rounded-md">HLTWHS002</span><p class="text-slate-700 mt-1 font-medium">Follow safe work practices for direct client care</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-primary-500 transition-colors">chevron_right</span>
            </div>
          </div>
        </div>
      </div>
      <!-- Elective Units -->
      <div class="section-reveal stagger-2">
        <div class="flex items-center gap-3 mb-6 md:mb-8">
          <div class="w-10 h-10 rounded-lg bg-secondary-100 flex items-center justify-center">
            <span class="material-symbols-outlined text-secondary-600">extension</span>
          </div>
          <h3 class="text-xl md:text-2xl font-bold text-slate-900">Elective Units <span class="text-slate-400 font-normal">(6)</span></h3>
        </div>
        <div class="space-y-3">
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-secondary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-secondary-600 bg-secondary-50 px-2 py-1 rounded-md">CHCAGE013</span><p class="text-slate-700 mt-1 font-medium">Work effectively in aged care</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-secondary-500 transition-colors">chevron_right</span>
            </div>
          </div>
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-secondary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-secondary-600 bg-secondary-50 px-2 py-1 rounded-md">CHCAGE011</span><p class="text-slate-700 mt-1 font-medium">Provide support to people living with dementia</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-secondary-500 transition-colors">chevron_right</span>
            </div>
          </div>
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-secondary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-secondary-600 bg-secondary-50 px-2 py-1 rounded-md">CHCPAL003</span><p class="text-slate-700 mt-1 font-medium">Deliver care services using a palliative approach</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-secondary-500 transition-colors">chevron_right</span>
            </div>
          </div>
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-secondary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-secondary-600 bg-secondary-50 px-2 py-1 rounded-md">HLTAID011</span><p class="text-slate-700 mt-1 font-medium">Provide First Aid</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-secondary-500 transition-colors">chevron_right</span>
            </div>
          </div>
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-secondary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-secondary-600 bg-secondary-50 px-2 py-1 rounded-md">CHCDIS011</span><p class="text-slate-700 mt-1 font-medium">Contribute to ongoing skills development using strengths-based approach</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-secondary-500 transition-colors">chevron_right</span>
            </div>
          </div>
          <div class="group bg-slate-50 rounded-xl p-4 md:p-5 border border-slate-100 hover:border-secondary-200 hover:shadow-md transition-all cursor-pointer">
            <div class="flex items-center justify-between">
              <div><span class="text-xs font-bold text-secondary-600 bg-secondary-50 px-2 py-1 rounded-md">CHCDIS020</span><p class="text-slate-700 mt-1 font-medium">Work effectively in disability support</p></div>
              <span class="material-symbols-outlined text-slate-300 group-hover:text-secondary-500 transition-colors">chevron_right</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Study Modes -->
<section class="py-16 md:py-24 lg:py-32 bg-slate-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-12 md:mb-16 section-reveal">
      <div class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 px-4 py-1.5 rounded-full text-sm font-semibold mb-6">
        <span class="material-symbols-outlined text-base">devices</span> Study Options
      </div>
      <h2 class="section-title font-display text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 mb-6">
        Flexible Study <span class="text-gradient">Modes</span>
      </h2>
      <p class="text-base md:text-lg text-slate-600">Choose the delivery option that best fits your lifestyle and learning preferences.</p>
    </div>
    <div class="grid md:grid-cols-2 gap-6 md:gap-8 max-w-5xl mx-auto">
      <div class="section-reveal stagger-1 bg-white rounded-3xl p-8 md:p-10 border border-slate-100 shadow-sm card-hover relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-primary-50 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="relative">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-500/25">
              <span class="material-symbols-outlined text-white text-2xl">diversity_3</span>
            </div>
            <h3 class="text-2xl font-bold text-slate-900">Blended Mode</h3>
          </div>
          <p class="text-slate-600 leading-relaxed mb-6">A combination of face-to-face and distance delivery. Theory tasks are completed at your own pace at home. Practical classes (first aid, manual handling, simulation, role-plays) are attended at our Burwood campus.</p>
          <div class="flex flex-wrap gap-2">
            <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">Face-to-Face</span>
            <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">Self-Paced</span>
            <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">Campus Based</span>
          </div>
        </div>
      </div>
      <div class="section-reveal stagger-2 bg-white rounded-3xl p-8 md:p-10 border border-slate-100 shadow-sm card-hover relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-secondary-50 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="relative">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center shadow-lg shadow-purple-500/25">
              <span class="material-symbols-outlined text-white text-2xl">devices</span>
            </div>
            <h3 class="text-2xl font-bold text-slate-900">Distance Mode</h3>
          </div>
          <p class="text-slate-600 leading-relaxed mb-6">Delivery without face-to-face interaction with the college. Training and support are provided via online technologies. Practical components are learned during an initial 40 hours at the work placement facility (total 160 hours placement).</p>
          <div class="flex flex-wrap gap-2">
            <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm font-medium">100% Online</span>
            <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm font-medium">Remote Support</span>
            <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm font-medium">Extended Placement</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Work Placement -->
<section class="py-16 md:py-24 lg:py-32 bg-slate-900 relative overflow-hidden">
  <div class="absolute inset-0">
    <div class="blob bg-primary-600 w-[500px] h-[500px] -bottom-40 -right-40 opacity-20"></div>
    <div class="blob bg-secondary-600 w-[400px] h-[400px] -top-20 -left-20 opacity-15" style="animation-delay: -2s;"></div>
  </div>
  <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center section-reveal">
    <div class="inline-flex items-center gap-2 bg-white/10 text-emerald-300 px-4 py-1.5 rounded-full text-sm font-semibold mb-8 backdrop-blur-sm">
      <span class="material-symbols-outlined text-base">workspace_premium</span> Real Industry Experience
    </div>
    <h2 class="font-display text-3xl md:text-4xl lg:text-6xl font-bold text-white mb-8">
      Gain Real-World <span class="text-gradient">Experience</span>
    </h2>
    <div class="glass-card rounded-3xl p-8 md:p-12 border border-white/10 inline-block max-w-3xl">
      <div class="text-5xl md:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 mb-4">
        120+ Hours
      </div>
      <p class="text-lg md:text-xl text-slate-300 max-w-2xl mx-auto leading-relaxed">
        Voluntary work placement is mandatory. Translate classroom skills into the actual workplace. Distance students require an additional 40 hours. Advance College arranges placement for Sydney-based students (Blended mode).
      </p>
    </div>
    <div class="grid grid-cols-3 gap-6 mt-12 max-w-2xl mx-auto">
      <div class="text-center"><div class="text-3xl md:text-4xl font-bold text-white mb-1">120h</div><div class="text-sm text-slate-400">Minimum Placement</div></div>
      <div class="text-center"><div class="text-3xl md:text-4xl font-bold text-white mb-1">160h</div><div class="text-sm text-slate-400">Distance Mode Total</div></div>
      <div class="text-center"><div class="text-3xl md:text-4xl font-bold text-white mb-1">Sydney</div><div class="text-sm text-slate-400">Placement Arranged</div></div>
    </div>
  </div>
</section>

<!-- Assessment -->
<section class="py-16 md:py-24 lg:py-32 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-12 md:mb-16 section-reveal">
      <div class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 px-4 py-1.5 rounded-full text-sm font-semibold mb-6">
        <span class="material-symbols-outlined text-base">fact_check</span> Assessment
      </div>
      <h2 class="section-title font-display text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 mb-6">
        How You'll Be <span class="text-gradient">Assessed</span>
      </h2>
      <p class="text-base md:text-lg text-slate-600">Demonstrate your competency through a balanced mix of theory and practical tasks.</p>
    </div>
    <div class="grid md:grid-cols-2 gap-6 md:gap-8 max-w-4xl mx-auto">
      <div class="section-reveal stagger-1 bg-gradient-to-br from-slate-50 to-white rounded-3xl p-8 md:p-10 border border-slate-100 card-hover">
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center mb-6 shadow-lg shadow-amber-500/20">
          <span class="material-symbols-outlined text-white text-2xl">menu_book</span>
        </div>
        <h3 class="text-xl md:text-2xl font-bold text-slate-900 mb-4">Theory Tasks</h3>
        <p class="text-slate-600 leading-relaxed">Conceptual knowledge evidence completed via downloadable Word documents or optional printed booklets (additional charge).</p>
      </div>
      <div class="section-reveal stagger-2 bg-gradient-to-br from-slate-50 to-white rounded-3xl p-8 md:p-10 border border-slate-100 card-hover">
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center mb-6 shadow-lg shadow-emerald-500/20">
          <span class="material-symbols-outlined text-white text-2xl">engineering</span>
        </div>
        <h3 class="text-xl md:text-2xl font-bold text-slate-900 mb-4">Practical Tasks</h3>
        <p class="text-slate-600 leading-relaxed">Classroom-based simulations, role-plays, and direct workplace observations during your 120-hour placement.</p>
      </div>
    </div>
  </div>
</section>

<!-- Recognition Options -->
<section class="py-16 md:py-24 lg:py-32 bg-slate-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid md:grid-cols-2 gap-6 md:gap-8 max-w-5xl mx-auto">
      <div class="section-reveal stagger-1 bg-white rounded-3xl p-8 md:p-10 border border-slate-100 shadow-sm card-hover">
        <div class="flex items-center gap-3 mb-6">
          <div class="w-12 h-12 rounded-xl bg-primary-100 flex items-center justify-center">
            <span class="material-symbols-outlined text-primary-600">history_edu</span>
          </div>
          <h3 class="text-xl md:text-2xl font-bold text-slate-900">Recognition of Prior Learning</h3>
        </div>
        <p class="text-slate-600 leading-relaxed">Assessment of relevant prior learning, skills, knowledge, and experiences to meet qualification requirements or gain credit.</p>
      </div>
      <div class="section-reveal stagger-2 bg-white rounded-3xl p-8 md:p-10 border border-slate-100 shadow-sm card-hover">
        <div class="flex items-center gap-3 mb-6">
          <div class="w-12 h-12 rounded-xl bg-secondary-100 flex items-center justify-center">
            <span class="material-symbols-outlined text-secondary-600">swap_horiz</span>
          </div>
          <h3 class="text-xl md:text-2xl font-bold text-slate-900">Credit Transfer</h3>
        </div>
        <p class="text-slate-600 leading-relaxed">We recognise prior Australian Qualifications Framework (AQF) qualifications and Statements of Attainment issued by other RTOs.</p>
      </div>
    </div>
  </div>
</section>
@endsection

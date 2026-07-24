@extends('student.layouts.app')

@section('content')
   <div class="min-h-[50vh] flex items-center justify-center px-4 py-16">
    <div class="text-center max-w-md mx-auto">

        <!-- Illustration -->
        <div class="relative inline-block mb-8">
            <!-- Soft glow behind -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-36 h-36 rounded-full bg-brand-500/5 blur-2xl"></div>
            
            <!-- Icon -->
            <div class="relative w-20 h-20 rounded-3xl bg-slate-100 border border-slate-200 flex items-center justify-center shadow-sm">
                <svg class="w-9 h-9 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"/>
                </svg>
            </div>

            <!-- Decorative dots -->
            <div class="absolute -top-1 -right-2 w-2.5 h-2.5 rounded-full bg-slate-300/60"></div>
            <div class="absolute bottom-2 -left-3 w-1.5 h-1.5 rounded-full bg-slate-300/40"></div>
        </div>

        <!-- Text -->
        <h2 class="text-xl font-bold text-slate-900 tracking-tight mb-2">
            No Links Available
        </h2>
        <p class="text-[15px] text-slate-500 leading-relaxed mb-8 max-w-xs mx-auto">
            There are no links available at this time. Check back later or reach out if you think something's missing.
        </p>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('student.contact-admin') }}" 
               class="inline-flex items-center gap-2 bg-brand-500 hover:bg-brand-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-lg shadow-brand-500/20 transition-all duration-200 active:scale-[0.97]">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                </svg>
                Contact Administrator
            </a>

            <button onclick="window.location.reload()" 
                    class="inline-flex items-center gap-1.5 text-slate-500 hover:text-slate-700 text-sm font-medium px-4 py-2.5 rounded-xl hover:bg-slate-100 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/>
                </svg>
                Refresh
            </button>
        </div>

        <!-- Subtle footer -->
        <p class="text-xs text-slate-400 mt-10">
            Links may be added by your course administrator at any time.
        </p>

    </div>
</div>
@endsection
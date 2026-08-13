@extends('frontend.layouts.app')

@section('content')
 <!-- BREADCRUMB / HERO AREA -->
<section class="relative flex min-h-[50vh] items-center justify-center overflow-hidden bg-brand-900">
    <div class="absolute inset-0">
        <img src="https://liacollege.edu.au/frontend/images/banner/breadcrumb.jpg" alt="" class="h-full w-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-b from-brand-900/80 via-brand-900/60 to-brand-900"></div>
    </div>
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute top-0 left-1/4 h-96 w-96 -tranbrand-x-1/2 rounded-full bg-brand-600/10 blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 h-96 w-96 tranbrand-x-1/2 rounded-full bg-emerald-600/10 blur-3xl"></div>
    </div>
    <div class="relative z-10 mx-auto w-full max-w-7xl px-4 py-24 text-center sm:px-6 lg:px-8">
        {{-- <nav class="mb-6">
            <ol class="flex items-center justify-center gap-2 text-sm">
                <li><a href="index.html" class="text-brand-400 transition-colors hover:text-white">Home</a></li>
                <li><svg class="h-4 w-4 text-brand-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg></li>
                <li class="font-semibold text-brand-400">About</li>
            </ol>
        </nav> --}}
        <h1 class="text-4xl font-extrabold text-white sm:text-5xl lg:text-6xl">About Leadership Institute Australia</h1>
    </div>
</section>

<!-- ABOUT UNIVERSITY INTRO -->
<section class="relative overflow-hidden bg-white py-24">
    <div class="pointer-events-none absolute top-0 right-0 h-64 w-64 rounded-full bg-brand-100/40 blur-3xl"></div>
    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 items-start gap-12 lg:grid-cols-12">
            <div class="lg:col-span-4">
                <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-brand-600">Who We Are</p>
                <h2 class="text-3xl font-extrabold leading-tight text-brand-900 sm:text-4xl">Welcome to Leadership Institute Australia</h2>
            </div>
            <div class="lg:col-span-8">
                <p class="mb-10 text-lg leading-relaxed text-brand-600">
                    At Leadership Institute Australia, we believe education should be practical, empowering, and career-focused. Our nationally recognized qualifications prepare students for real-world roles in community services, aged care, disability support, leadership, and management.
                </p>
                <div class="grid grid-cols-2 gap-6 sm:grid-cols-2">
                    <div class="group flex items-center justify-center rounded-2xl border border-brand-200 bg-brand-50 p-4 transition-all duration-300 ">
                        <img src="{{ asset('lia/11.webp') }}" alt="Brand 1" class="h-28 w-auto object-contain ">
                    </div>
                    <div class="group flex items-center justify-center rounded-2xl border border-brand-200 bg-brand-50 p-4 transition-all duration-300 ">
                        <img src="{{ asset('lia/2.webp') }}" alt="Brand 2" class="h-28 w-auto object-contain ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FEATURE CARDS -->
<section class="relative overflow-hidden bg-brand-50 py-24">
    <div class="pointer-events-none absolute top-1/2 left-0 h-96 w-96 -tranbrand-y-1/2 rounded-full bg-brand-100/30 blur-3xl"></div>
    <div class="pointer-events-none absolute top-1/2 right-0 h-96 w-96 -tranbrand-y-1/2 rounded-full bg-emerald-100/30 blur-3xl"></div>
    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <div class="group relative overflow-hidden rounded-3xl border border-brand-200 bg-white p-8 text-center shadow-sm transition-all duration-300 hover:-tranbrand-y-2 hover:border-brand-200 hover:shadow-xl hover:shadow-brand-500/10">
                <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500 to-violet-600 shadow-lg shadow-brand-500/20 transition-transform duration-300 group-hover:scale-110">
                    <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="mb-4 text-xl font-bold text-brand-900">Courses to Suit Your Lifestyle</h3>
                <p class="leading-relaxed text-brand-600">At Upskilled, we know working professionals look to online learning when it comes to qualifying for tomorrow. Our interactive e-learning platform, MyUpskilled, offers the flexibility you need.</p>
                <div class="absolute bottom-0 left-1/2 h-0.5 w-0 -tranbrand-x-1/2 rounded-full bg-gradient-to-r from-transparent via-brand-500 to-transparent transition-all duration-500 group-hover:w-3/5"></div>
            </div>
            <div class="group relative overflow-hidden rounded-3xl border border-brand-200 bg-white p-8 text-center shadow-sm transition-all duration-300 hover:-tranbrand-y-2 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/10">
                <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 shadow-lg shadow-emerald-500/20 transition-transform duration-300 group-hover:scale-110">
                    <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/></svg>
                </div>
                <h3 class="mb-4 text-xl font-bold text-brand-900">Nationally Recognised Training</h3>
                <p class="leading-relaxed text-brand-600">Over 24 qualifications offered by Upskilled are nationally recognised, ensuring that the qualifications you earn are respected and valued by employers across Australia.</p>
                <div class="absolute bottom-0 left-1/2 h-0.5 w-0 -tranbrand-x-1/2 rounded-full bg-gradient-to-r from-transparent via-emerald-500 to-transparent transition-all duration-500 group-hover:w-3/5"></div>
            </div>
            <div class="group relative overflow-hidden rounded-3xl border border-brand-200 bg-white p-8 text-center shadow-sm transition-all duration-300 hover:-tranbrand-y-2 hover:border-amber-200 hover:shadow-xl hover:shadow-amber-500/10">
                <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 shadow-lg shadow-amber-500/20 transition-transform duration-300 group-hover:scale-110">
                    <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/></svg>
                </div>
                <h3 class="mb-4 text-xl font-bold text-brand-900">Career-Focused Training</h3>
                <p class="leading-relaxed text-brand-600">The courses at Upskilled are designed with career outcomes in mind. They focus on practical skills and knowledge that are directly applicable to the workplace, enhancing your employability and career prospects.</p>
                <div class="absolute bottom-0 left-1/2 h-0.5 w-0 -tranbrand-x-1/2 rounded-full bg-gradient-to-r from-transparent via-amber-500 to-transparent transition-all duration-500 group-hover:w-3/5"></div>
            </div>
        </div>
    </div>
</section>

<!-- HISTORY / QUALITY TRAINING -->
<section class="relative overflow-hidden bg-white py-24">
    <div class="pointer-events-none absolute bottom-0 left-0 h-64 w-64 rounded-full bg-brand-100/30 blur-3xl"></div>
    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2">
            <div class="relative">
                <div class="absolute -inset-4 rounded-[2rem] bg-gradient-to-br from-brand-200 to-emerald-200 opacity-50 blur-xl"></div>
                <div class="absolute inset-0 tranbrand-x-4 tranbrand-y-4 rounded-[1.5rem] bg-brand-100"></div>
                <img src="https://liacollege.edu.au/frontend/images/banner/embark.png" alt="Quality Training" class="relative rounded-[1.5rem] w-full h-auto object-cover shadow-2xl">
            </div>
            <div class="space-y-6">
                <p class="text-sm font-semibold uppercase tracking-widest text-brand-600">Our Story</p>
                <h2 class="text-3xl font-extrabold text-brand-900 sm:text-4xl">Quality Training Provider</h2>
                <p class="text-lg leading-relaxed text-brand-600">
                    For over a decade, Leadership Institute Australia has been dedicated to empowering individuals and organisations through high-quality vocational education and training. Our name reflects our commitment to developing strong leaders, skilled professionals, and capable community contributors.
                </p>
                <p class="text-lg leading-relaxed text-brand-600">
                    Leadership Institute Australia is recognised as a trusted training provider, built on the expertise, passion, and continuous professional development of our training team. We are committed to maintaining the highest standards in education to ensure our students graduate with the knowledge, skills, and confidence needed to succeed.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- FUN FACTS / STATS -->
<section class="relative overflow-hidden bg-brand-900 py-24">
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute top-0 left-1/3 h-96 w-96 -tranbrand-x-1/2 rounded-full bg-brand-600/10 blur-3xl"></div>
        <div class="absolute bottom-0 right-1/3 h-96 w-96 tranbrand-x-1/2 rounded-full bg-emerald-600/10 blur-3xl"></div>
    </div>
    <div class="relative z-10 mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-3">
            <div class="group relative overflow-hidden rounded-3xl border border-brand-700/50 bg-brand-800/60 p-8 text-center backdrop-blur-sm transition-all duration-300 hover:-tranbrand-y-2 hover:border-brand-500/30 hover:shadow-2xl hover:shadow-brand-500/10">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500 to-violet-600 shadow-lg shadow-brand-500/20 transition-transform duration-300 group-hover:scale-110">
                    <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                </div>
                <p class="mb-1 text-4xl font-extrabold text-white sm:text-5xl">90%</p>
                <p class="text-sm font-medium text-brand-400">Post-Graduation Success Rate</p>
            </div>
            <div class="group relative overflow-hidden rounded-3xl border border-brand-700/50 bg-brand-800/60 p-8 text-center backdrop-blur-sm transition-all duration-300 hover:-tranbrand-y-2 hover:border-emerald-500/30 hover:shadow-2xl hover:shadow-emerald-500/10">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 shadow-lg shadow-emerald-500/20 transition-transform duration-300 group-hover:scale-110">
                    <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M18.75 4.236c.982.143 1.954.317 2.916.52A6.003 6.003 0 0116.27 9.728M18.75 4.236V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.228a24.255 24.255 0 012.226-1.591"/></svg>
                </div>
                <p class="mb-1 text-4xl font-extrabold text-white sm:text-5xl">Top 10</p>
                <p class="text-sm font-medium text-brand-400">Colleges that Create Futures</p>
            </div>
            <div class="group relative overflow-hidden rounded-3xl border border-brand-700/50 bg-brand-800/60 p-8 text-center backdrop-blur-sm transition-all duration-300 hover:-tranbrand-y-2 hover:border-amber-500/30 hover:shadow-2xl hover:shadow-amber-500/10">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 shadow-lg shadow-amber-500/20 transition-transform duration-300 group-hover:scale-110">
                    <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
                </div>
                <p class="mb-1 text-4xl font-extrabold text-white sm:text-5xl">No. 1</p>
                <p class="text-sm font-medium text-brand-400">In the Nation for Materials R&D</p>
            </div>
        </div>
    </div>
</section>

<!-- MISSION AND VALUES -->
<section class="relative overflow-hidden bg-brand-50 py-24">
    <div class="pointer-events-none absolute top-0 left-1/2 h-64 w-64 -tranbrand-x-1/2 rounded-full bg-brand-100/40 blur-3xl"></div>
    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-16 text-center">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-brand-600">Our Foundation</p>
            <h2 class="text-3xl font-extrabold text-brand-900 sm:text-4xl">Mission and Values</h2>
        </div>
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
            <div class="group relative overflow-hidden rounded-3xl border border-brand-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-tranbrand-y-2 hover:border-brand-200 hover:shadow-xl hover:shadow-brand-500/10">
                {{-- <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-brand-500 to-violet-500"></div> --}}
                <div class="mb-6 flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-brand-500 to-violet-600 shadow-lg shadow-brand-500/20 transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16 8l2-2"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-brand-900">Our Mission</h3>
                </div>
                <p class="leading-relaxed text-brand-600">
                    To empower individuals through high-quality education and leadership development, equipping them with the skills, knowledge, and confidence to excel in their careers and make a meaningful impact in their communities.
                </p>
            </div>
            <div class="group relative overflow-hidden rounded-3xl border border-brand-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-tranbrand-y-2 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/10">
                {{-- <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-emerald-500 to-teal-500"></div> --}}
                <div class="mb-6 flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 shadow-lg shadow-emerald-500/20 transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-brand-900">Our Values</h3>
                </div>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <div class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                            <svg class="h-3 w-3 text-emerald-600" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        </div>
                        <span class="text-brand-700"><strong class="text-brand-900">Excellence</strong> — We strive for the highest standards in education, training, and personal development.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                            <svg class="h-3 w-3 text-emerald-600" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        </div>
                        <span class="text-brand-700"><strong class="text-brand-900">Integrity</strong> — We act with honesty, transparency, and accountability in everything we do.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                            <svg class="h-3 w-3 text-emerald-600" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        </div>
                        <span class="text-brand-700"><strong class="text-brand-900">Innovation</strong> — We embrace creativity and continuously evolve to meet the needs of a changing world.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                            <svg class="h-3 w-3 text-emerald-600" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        </div>
                        <span class="text-brand-700"><strong class="text-brand-900">Collaboration</strong> — We believe in the power of teamwork, community, and shared growth.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                            <svg class="h-3 w-3 text-emerald-600" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        </div>
                        <span class="text-brand-700"><strong class="text-brand-900">Empowerment</strong> — We inspire and support individuals to unlock their full potential and achieve their goals.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                            <svg class="h-3 w-3 text-emerald-600" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        </div>
                        <span class="text-brand-700"><strong class="text-brand-900">Respect</strong> — We honor diversity, inclusivity, and the unique contributions of every person.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('frontend.lia-collage.layouts.app')
@section('title', 'Find a First Aid, CPR or Childcare First Aid class')

@section('tailwind-styles')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
@endsection

@section('content')
    <div class="">
        <section class="bg-[#e5b35d] text-white">
            <div class="container">
                <div class="grid items-center gap-10 lg:grid-cols-2">
                    <div>
                        <span
                            class="inline-block rounded-full border border-white/20 bg-white/10 px-3 py-1 text-xl font-bold uppercase tracking-wider text-white">Nationally
                            recognised</span>
                        <div class="mt-4 text-5xl font-extrabold text-white sm:text-7xl">First Aid &amp; CPR</div>
                        <p class="mt-4 m-0 max-w-2xl text-lg leading-relaxed text-white">Nationally recognised first aid and
                            CPR, delivered hands-on by experienced trainers. Certificate issued the same day.</p>
                        <div class="mt-7 flex flex-col gap-3 sm:flex-row sm:items-center">
                            <a href="#find" class="btn"
                                style="background:#fff;color:#000;font-size:20px;font-weight:700;padding:16px 32px;border-radius:12px;border:none;box-shadow:0 8px 20px rgba(0,0,0,.15);text-decoration:none;">
                                Choose a date and book online in minutes
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:block">
                        <img src="{{ asset('frontend-img/first-aid.webp') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <section id="find" class="relative z-10 mx-auto -mt-20 scroll-mt-24 px-4 sm:px-6 w-75">
                <div class="rounded-card border border-line bg-white p-6 shadow-lg shadow-brand-900/5 sm:p-8"
                    style="border-radius: 8px">
                    <h6 class="text-xl font-bold text-ink">Find a First Aid, CPR or Childcare First Aid class</h6>
                    <p class="mt-1 text-sm text-muted">Pick a course and location to see live dates and book online in
                        minutes.
                    </p>
                    <form method="GET" action="{{ route('firstAid') }}" id="courseSearchForm">
                        <div class="mt-5 grid gap-4 sm:grid-cols-2">

                            {{-- Course --}}
                            <label class="block">
                                <span class="mb-1.5 block uppercase tracking-wide text-muted">
                                    1. Course
                                </span>

                                <select name="course_id"
                                    class="w-full rounded-xl border border-line bg-white px-4 py-3 text-base font-medium text-ink outline-none focus:border-brand-500"
                                    onchange="this.form.submit()">
                                    <option value="">
                                        Choose a course…
                                    </option>

                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}" @selected(request('course_id') == $course->id)>
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </label>


                            {{-- Location --}}
                            <div class="block">
                                <span class="mb-1.5 block uppercase tracking-wide text-muted">
                                    2. Location
                                </span>

                                <select name="city"
                                    class="w-full rounded-xl border border-line bg-white px-4 py-3 text-base font-medium text-ink outline-none focus:border-brand-500"
                                    onchange="this.form.submit()">
                                    <option value="">
                                        Choose a location…
                                    </option>

                                    <option value="__any__" @selected(request('city') === '__any__')>
                                        Any location
                                    </option>

                                    @foreach ($locations as $location)
                                        <option value="{{ $location->city }}" @selected(request('city') === $location->city)>
                                            {{ $location->city }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </form>
                    <div class="mt-6">
                        <h6 class="text-xs font-bold uppercase tracking-wide text-muted mb-0" style="font-size: 14px">3.
                            Choose a date</h6>
                        <ul class="mt-4 divide-y divide-line overflow-hidden rounded-xl border border-line">

                            @forelse ($slots as $slot)
                                <li class="flex flex-wrap items-center justify-between gap-3 bg-white px-4 py-3">

                                    <div>
                                        <div class="font-semibold text-ink">
                                            {{ \Carbon\Carbon::parse($slot->training_date)->format('D, d F Y') }}

                                            @if ($slot->start_time && $slot->end_time)
                                                <span class="font-normal text-muted">
                                                    ·
                                                    {{ \Carbon\Carbon::parse($slot->start_time)->format('g:ia') }}
                                                    –
                                                    {{ \Carbon\Carbon::parse($slot->end_time)->format('g:ia') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="text-muted text-sm">
                                            {{ $slot->trainingCenter?->name }}
                                        </div>

                                        <div class="text-2xl text-muted">
                                            ${{ number_format($slot->price, 2) }}

                                            @if ($slot->users->count() >= 5)
                                                <span class="font-semibold text-danger">
                                                    · Filling fast
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <a href="{{ route('course-enrollment.create', [
                                        'course' => $slot->course_id,
                                        'slot' => $slot->id,
                                    ]) }}"
                                        class="btn d-inline-flex align-items-center"
                                        style="background:#198754; color:#fff; font-size:14px; font-weight:700; padding:12px 24px; border-radius:10px; border:none; text-decoration:none;">

                                        Enrol Now
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                </li>

                            @empty

                                @if (request()->filled('course_id'))
                                    <li class="px-4 py-6 text-center text-muted">
                                        No available slots found.
                                    </li>
                                @endif
                            @endforelse

                        </ul>
                        {{-- <div class="text-center mt-4">
                        <button type="button" class="btn"
                            style="background:#fff; color:#198754; border:1px solid #dee2e6; padding:6px 20px; font-size:15px; font-weight:700; border-radius:10px;">
                            Load More Dates
                        </button>
                    </div>
                    <div class="mt-4 rounded-xl border border-line bg-gray-100 p-4">
                        <p class="text-sm font-semibold text-ink">Need a later date?</p>
                        <p class="mt-1 text-sm text-muted">Pick a date further ahead to enrol.</p>
                        <div class="mt-3 flex flex-wrap items-center gap-3"><input min="2026-07-12"
                                aria-label="Preferred date"
                                class="rounded-lg border border-line bg-white px-3 py-2 text-sm font-medium text-ink outline-none focus:border-brand-500"
                                type="date" value="">
                        </div>
                    </div> --}}
                    </div>
                </div>
            </section>
        </div>

        <section class="container my-5">
            <div class="bg-light border rounded-3 p-4 p-lg-5 w-75 mx-auto">

                <h6 class="text-uppercase fw-bold text-secondary mb-3">
                    Also Available
                </h6>

                <div class="d-flex flex-wrap gap-2">

                    @foreach ($courses as $course)
                        <a href="{{ route('courses.show', $course->slug) }}"
                            class="btn btn-light border rounded-pill fw-semibold px-4 py-2 text-dark">
                            {{ $course->name }}
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    @endforeach

                </div>

            </div>
        </section>
        <div class="container">
            <section class="mx-auto w-75 px-4 pb-16 pt-14 sm:px-6">
                <h4 class="text-2xl font-bold sm:text-3xl">First Aid &amp; CPR courses</h4>
                <div class="mt-8 grid gap-6 md:grid-cols-2">

                    <!-- HLTAID009 Provide CPR -->
                        <article class="h-100 rounded-4 border bg-white p-4 shadow-sm">
                            <div class="d-flex justify-content-between align-items-start gap-3">
                                <h5 class="fw-bold text-success mb-0">HLTAID009 Provide CPR</h5>
                                <div class="text-end">
                                    <small class="text-muted d-block">from</small>
                                    <span class="fw-bold fs-4 text-success">$45</span>
                                </div>
                            </div>

                            <div class="mt-2 text-muted">
                                <i class="fa-regular fa-clock me-2"></i>1.5 hours
                            </div>

                            <p class="mt-3 mb-0">
                                CPR skills (adults, children and infants) including how to operate an AED.
                            </p>

                            <hr>

                            <p class="fw-bold text-uppercase text-muted small mb-3">
                                What's included
                            </p>

                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-start mb-2">
                                    <i class="fa-solid fa-circle-check text-success me-2 mt-1"></i>
                                    <span>HLTAID009 – Provide cardiopulmonary resuscitation</span>
                                </li>
                            </ul>
                        </article>

                    <!-- HLTAID011 Provide First Aid -->
                        <article class="h-100 rounded-4 border bg-white p-4 shadow-sm">
                            <div class="d-flex justify-content-between align-items-start gap-3">
                                <h5 class="fw-bold text-success mb-0">HLTAID011 Provide First Aid</h5>
                                <div class="text-end">
                                    <small class="text-muted d-block">from</small>
                                    <span class="fw-bold fs-4 text-success">$95</span>
                                </div>
                            </div>

                            <div class="mt-2 text-muted">
                                <i class="fa-regular fa-clock me-2"></i>3 hours
                            </div>

                            <div class="mt-2">
                                <span class="badge bg-success-subtle text-success border border-success">
                                    Includes CPR
                                </span>
                            </div>

                            <p class="mt-3 mb-0">
                                The complete workplace first aid certificate. Includes CPR — most workplaces ask for this
                                one.
                            </p>

                            <hr>

                            <p class="fw-bold text-uppercase text-muted small mb-3">
                                What's included
                            </p>

                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-start mb-2">
                                    <i class="fa-solid fa-circle-check text-success me-2 mt-1"></i>
                                    <span>HLTAID009 – Provide cardiopulmonary resuscitation</span>
                                </li>

                                <li class="d-flex align-items-start mb-2">
                                    <i class="fa-solid fa-circle-check text-success me-2 mt-1"></i>
                                    <span>HLTAID010 – Provide basic emergency life support</span>
                                </li>

                                <li class="d-flex align-items-start">
                                    <i class="fa-solid fa-circle-check text-success me-2 mt-1"></i>
                                    <span>HLTAID011 – Provide First Aid</span>
                                </li>
                            </ul>
                        </article>

                    <!-- HLTAID012 Childcare First Aid -->
                        <article class="h-100 rounded-4 border bg-white p-4 shadow-sm">
                            <div class="d-flex justify-content-between align-items-start gap-3">
                                <h5 class="fw-bold text-success mb-0">HLTAID012 Childcare First Aid</h5>
                                <div class="text-end">
                                    <small class="text-muted d-block">from</small>
                                    <span class="fw-bold fs-4 text-success">$115</span>
                                </div>
                            </div>

                            <div class="mt-2 text-muted">
                                <i class="fa-regular fa-clock me-2"></i>3.5 hours
                            </div>

                            <div class="mt-2">
                                <span class="badge bg-success-subtle text-success border border-success">
                                    Includes CPR &amp; First Aid
                                </span>
                            </div>

                            <p class="mt-3 mb-0">
                                For educators and care staff. Covers everything in Provide First Aid plus child-specific
                                content — and includes CPR.
                            </p>

                            <hr>

                            <p class="fw-bold text-uppercase text-muted small mb-3">
                                What's included
                            </p>

                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-start mb-2">
                                    <i class="fa-solid fa-circle-check text-success me-2 mt-1"></i>
                                    <span>HLTAID009 – Provide cardiopulmonary resuscitation</span>
                                </li>

                                <li class="d-flex align-items-start mb-2">
                                    <i class="fa-solid fa-circle-check text-success me-2 mt-1"></i>
                                    <span>HLTAID010 – Provide basic emergency life support</span>
                                </li>

                                <li class="d-flex align-items-start mb-2">
                                    <i class="fa-solid fa-circle-check text-success me-2 mt-1"></i>
                                    <span>HLTAID011 – Provide First Aid</span>
                                </li>

                                <li class="d-flex align-items-start">
                                    <i class="fa-solid fa-circle-check text-success me-2 mt-1"></i>
                                    <span>HLTAID012 – Provide first aid in an education and care setting</span>
                                </li>
                            </ul>
                        </article>

                </div>
                <p class="mt-5 text-muted">Ready to book? Use the class finder above to see live dates and secure
                    your
                    place.</p>
            </section>
        </div>

        <section class="bg-white px-14 py-24">
            @include('frontend.lia-collage.first-aid.partials.student-review')
        </section>
        <div class="bg-gray-100 px-14 py-24">


            <section class="container ">
                <div class="flex flex-wrap items-end justify-between gap-3">
                    <h6 class="text-2xl font-bold sm:text-3xl m-0">First Aid &amp; CPR guides</h6>
                    <a class="font-bold text-brand-700 hover:text-brand-800" href="/guides">All guides →</a>
                </div>
                <ul class="row g-4 list-unstyled mt-4">
                    <li class="col-12 col-sm-6">
                        <a href="{{ route('first-aid.renew') }}" class="d-flex flex-column h-100 text-decoration-none rounded-4 border bg-white p-4 shadow-sm transition-shadow"
                            style="transition: box-shadow 0.2s;" onmouseover="this.classList.add('shadow');"
                            onmouseout="this.classList.remove('shadow');"
                            href="/guides/how-often-renew-first-aid-certificate">
                            <h6 class="fw-bold text-primary">How often do you need to renew your first aid certificate in
                                Australia?</h6>
                            <p class="mt-2 flex-grow-1 small lh-base text-body">In Australia, refresh your CPR every 12
                                months and your first aid certificate every 3 years. Here's what that means and how to
                                renew.</p>
                            <span class="mt-3 d-inline-flex align-items-center gap-2 small fw-bold text-primary">
                                Read guide
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <path d="M5 12h14M13 6l6 6-6 6"></path>
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="col-12 col-sm-6">
                        <a class="d-flex flex-column h-100 text-decoration-none rounded-4 border bg-white p-4 shadow-sm transition-shadow"
                            style="transition: box-shadow 0.2s;" onmouseover="this.classList.add('shadow');"
                            onmouseout="this.classList.remove('shadow');"
                            href="/guides/cpr-vs-first-aid-vs-childcare-first-aid">
                            <h3 class="fw-bold text-primary h6">CPR vs First Aid vs Childcare First Aid: which course do
                                you need?</h3>
                            <p class="mt-2 flex-grow-1 small lh-base text-body">A plain-English guide to choosing between
                                HLTAID009 CPR, HLTAID011 Provide First Aid and HLTAID012 Childcare First Aid.</p>
                            <span class="mt-3 d-inline-flex align-items-center gap-2 small fw-bold text-primary">
                                Read guide
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <path d="M5 12h14M13 6l6 6-6 6"></path>
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="col-12 col-sm-6">
                        <a class="d-flex flex-column h-100 text-decoration-none rounded-4 border bg-white p-4 shadow-sm transition-shadow"
                            style="transition: box-shadow 0.2s;" onmouseover="this.classList.add('shadow');"
                            onmouseout="this.classList.remove('shadow');" href="/guides/drsabcd-first-aid-action-plan">
                            <h3 class="fw-bold text-primary h6">DRSABCD: the first aid action plan explained</h3>
                            <p class="mt-2 flex-grow-1 small lh-base text-body">DRSABCD is the step-by-step first aid
                                action plan — Danger, Response, Send for help, Airway, Breathing, CPR, Defibrillation.</p>
                            <span class="mt-3 d-inline-flex align-items-center gap-2 small fw-bold text-primary">
                                Read guide
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <path d="M5 12h14M13 6l6 6-6 6"></path>
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="col-12 col-sm-6">
                        <a class="d-flex flex-column h-100 text-decoration-none rounded-4 border bg-white p-4 shadow-sm transition-shadow"
                            style="transition: box-shadow 0.2s;" onmouseover="this.classList.add('shadow');"
                            onmouseout="this.classList.remove('shadow');"
                            href="/guides/is-first-aid-certificate-nationally-recognised-usi">
                            <h3 class="fw-bold text-primary h6">Is your first aid certificate nationally recognised? (USI
                                explained)</h3>
                            <p class="mt-2 flex-grow-1 small lh-base text-body">What 'nationally recognised' means, why
                                your certificate works Australia-wide and the free USI you need to be issued it.</p>
                            <span class="mt-3 d-inline-flex align-items-center gap-2 small fw-bold text-primary">
                                Read guide
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <path d="M5 12h14M13 6l6 6-6 6"></path>
                                </svg>
                            </span>
                        </a>
                    </li>
                </ul>
            </section>
        </div>
        <section class="bg-[#e5b35d] px-14 py-24 ">
            @include('frontend.lia-collage.first-aid.partials.faq')

        </section>
        <section class="bg-light px-14 py-24">
            @include('frontend.lia-collage.first-aid.partials.location')

        </section>
        <div class="bg-white px-4 px-md-5 py-5">
            <section class="container">
                <h2 class="fw-bold h5">Other courses</h2>
                <div class="row g-3 mt-4">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a class="d-flex align-items-center justify-content-between gap-3 text-decoration-none rounded-4 border bg-white p-4 shadow-sm transition-shadow"
                            style="transition: box-shadow 0.2s;" onmouseover="this.classList.add('shadow');"
                            onmouseout="this.classList.remove('shadow');" href="/courses/cpr">
                            <span class="fw-bold text-dark">CPR</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                                class="flex-shrink-0 text-muted">
                                <path d="M5 12h14M13 6l6 6-6 6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </section>
        </div>

    </div>

@endsection

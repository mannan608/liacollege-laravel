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
                    <div class="mt-6 border-t border-line pt-6">
                        <h6 class="text-xs font-bold uppercase tracking-wide text-muted">3. Choose a date</h6>
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

                    <a href="/courses/cpr" class="btn btn-light border rounded-pill fw-semibold px-4 py-2 text-dark">
                        HLTAID009 CPR Only
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                    <a href="/courses/childcare-first-aid"
                        class="btn btn-light border rounded-pill fw-semibold px-4 py-2 text-dark">
                        HLTAID012 Childcare First Aid
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                    <a href="/online-first-aid-cpr-courses"
                        class="btn btn-light border rounded-pill fw-semibold px-4 py-2 text-dark">
                        Online First Aid (via Zoom)
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                </div>

            </div>
        </section>
        <div class="container">
            <section class="mx-auto w-75 px-4 pb-16 pt-14 sm:px-6">
                <h4 class="text-2xl font-bold sm:text-3xl">First Aid &amp; CPR courses</h4>
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    <article class="flex flex-col rounded-card border border-line bg-white p-6">
                        <div class="flex items-start justify-between gap-3">
                            <h6 class="text-xl font-bold text-green-700">HLTAID009 Provide CPR</h6><span
                                class="shrink-0 text-right"><span class="text-muted">from </span><span
                                    class="font-extrabold text-green-700">$45</span></span>
                        </div>
                        <div class="mt-1.5 flex flex-wrap items-center gap-x-3 gap-y-1 text-muted"><span>1.5
                                hours</span></div>
                        <p class="mt-3 text-body">CPR skills (adults, children and infants) including how to operate an
                            AED.
                        </p>
                        <div class="mt-4 border-t border-line pt-4">
                            <p class=" font-bold uppercase tracking-wide text-muted">What's included</p>
                            <ul class="mt-2 p-0">
                                <li class="d-flex align-items-start gap-2">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true" class="mt-1 flex-shrink-0 text-success">
                                        <path d="m5 12 4.5 4.5L19 7"></path>
                                    </svg>
                                    <span>HLTAID009 – Provide cardiopulmonary resuscitation</span>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <article class="flex flex-col rounded-card border border-line bg-white p-6">
                        <div class="flex items-start justify-between gap-3">
                            <h6 class="text-xl font-bold text-green-700">HLTAID009 Provide CPR</h6><span
                                class="shrink-0 text-right"><span class="text-muted">from </span><span
                                    class="font-extrabold text-green-700">$45</span></span>
                        </div>
                        <div class="mt-1.5 flex flex-wrap items-center gap-x-3 gap-y-1 text-muted"><span>1.5
                                hours</span></div>
                        <p class="mt-3 text-body">CPR skills (adults, children and infants) including how to operate an
                            AED.
                        </p>
                        <div class="mt-4 border-t border-line pt-4">
                            <p class=" font-bold uppercase tracking-wide text-muted">What's included</p>
                            <ul class="mt-2 p-0">
                                <li class="d-flex align-items-start gap-2">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true"
                                        class="mt-1 flex-shrink-0 text-success">
                                        <path d="m5 12 4.5 4.5L19 7"></path>
                                    </svg>
                                    <span>HLTAID009 – Provide cardiopulmonary resuscitation</span>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <article class="flex flex-col rounded-card border border-line bg-white p-6">
                        <div class="flex items-start justify-between gap-3">
                            <h6 class="text-xl font-bold text-green-700">HLTAID009 Provide CPR</h6><span
                                class="shrink-0 text-right"><span class="text-muted">from </span><span
                                    class="font-extrabold text-green-700">$45</span></span>
                        </div>
                        <div class="mt-1.5 flex flex-wrap items-center gap-x-3 gap-y-1 text-muted"><span>1.5
                                hours</span></div>
                        <p class="mt-3 text-body">CPR skills (adults, children and infants) including how to operate an
                            AED.
                        </p>
                        <div class="mt-4 border-t border-line pt-4">
                            <p class=" font-bold uppercase tracking-wide text-muted">What's included</p>
                            <ul class="mt-2 p-0">
                                <li class="d-flex align-items-start gap-2">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true"
                                        class="mt-1 flex-shrink-0 text-success">
                                        <path d="m5 12 4.5 4.5L19 7"></path>
                                    </svg>
                                    <span>HLTAID009 – Provide cardiopulmonary resuscitation</span>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
                <p class="mt-5 text-muted">Ready to book? Use the class finder above to see live dates and secure
                    your
                    place.</p>
            </section>
        </div>

        <section class="bg-white px-14 py-24">
            <div class="container">
                <div class="px-14 py-24">
                    <h6 class="text-2xl font-bold sm:text-3xl">What students say about Lia College First Aid &amp; CPR</h6>
                    <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                        <figure class="card border border-light bg-light h-100 p-4 rounded-3">
                            <div class="d-flex gap-1 text-warning mb-4" role="img" aria-label="5 out of 5 stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>

                            <blockquote class="blockquote mb-3 flex-grow-1 lh-base text-secondary m-0"
                                style="font-size: 14px">
                                “This was really good, very helpful and engaging and made it easy to learn, I would give 10
                                stars.”
                            </blockquote>

                            <figcaption class="mt-auto">
                                <strong class="text-dark">Katie Louise Bryant</strong>
                                <span class="text-muted"> · Google review</span>
                            </figcaption>
                        </figure>

                    </div>
                </div>
            </div>
        </section>
        <div class="bg-gray-100 px-14 py-24">


            <section class="container ">
                <div class="flex flex-wrap items-end justify-between gap-3">
                    <h6 class="text-2xl font-bold sm:text-3xl m-0">First Aid &amp; CPR guides</h6>
                    <a class="font-bold text-brand-700 hover:text-brand-800" href="/guides">All guides →</a>
                </div>
                <ul class="row g-4 list-unstyled mt-4">
                    <li class="col-12 col-sm-6">
                        <a class="d-flex flex-column h-100 text-decoration-none rounded-4 border bg-white p-4 shadow-sm transition-shadow"
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
            <div class="container">
                <div class="mx-auto" style="max-width: 50%;">
                    <h4 class="fw-bold h3">Frequently asked questions</h4>
                    <div class="mt-4 d-flex flex-column gap-3">
                        <details class="rounded-4 border bg-white p-4">
                            <summary
                                class="d-flex cursor-pointer list-unstyled align-items-center justify-content-between gap-3 fw-bold text-dark">
                                Is this course nationally recognised?
                                <span class="text-muted transition-transform" style="transition: transform 0.2s;">▾</span>
                            </summary>
                            <p class="mt-3 text-body">Yes. Lia College is a Registered Training Organisation (RTO 91399)
                                and you receive a nationally recognised statement of attainment on completion.</p>
                        </details>
                        <details class="rounded-4 border bg-white p-4">
                            <summary
                                class="d-flex cursor-pointer list-unstyled align-items-center justify-content-between gap-3 fw-bold text-dark">
                                Do I need a USI?
                                <span class="text-muted transition-transform" style="transition: transform 0.2s;">▾</span>
                            </summary>
                            <p class="mt-3 text-body">Yes — a Unique Student Identifier (USI) is required before a
                                nationally recognised certificate can be issued. It's free to create at usi.gov.au.</p>
                        </details>
                        <details class="rounded-4 border bg-white p-4">
                            <summary
                                class="d-flex cursor-pointer list-unstyled align-items-center justify-content-between gap-3 fw-bold text-dark">
                                How do I book a place?
                                <span class="text-muted transition-transform" style="transition: transform 0.2s;">▾</span>
                            </summary>
                            <p class="mt-3 text-body">Use the class finder above to choose your course, location and date,
                                then enrol and pay online to secure your spot.</p>
                        </details>
                        <details class="rounded-4 border bg-white p-4">
                            <summary
                                class="d-flex cursor-pointer list-unstyled align-items-center justify-content-between gap-3 fw-bold text-dark">
                                Can you train my team or workplace?
                                <span class="text-muted transition-transform" style="transition: transform 0.2s;">▾</span>
                            </summary>
                            <p class="mt-3 text-body">Yes — we run group and onsite bookings. Call 1300 628 299 to arrange
                                one.</p>
                        </details>
                        <details class="rounded-4 border bg-white p-4">
                            <summary
                                class="d-flex cursor-pointer list-unstyled align-items-center justify-content-between gap-3 fw-bold text-dark">
                                Which first aid course do I need?
                                <span class="text-muted transition-transform" style="transition: transform 0.2s;">▾</span>
                            </summary>
                            <p class="mt-3 text-body">HLTAID009 CPR is the CPR unit on its own. HLTAID011 Provide First Aid
                                is the full workplace certificate and includes CPR — it's the one most workplaces ask for.
                                HLTAID012 Childcare First Aid adds child-specific content for educators and care staff, and
                                includes CPR and first aid.</p>
                        </details>
                        <details class="rounded-4 border bg-white p-4">
                            <summary
                                class="d-flex cursor-pointer list-unstyled align-items-center justify-content-between gap-3 fw-bold text-dark">
                                How often do I need to renew?
                                <span class="text-muted transition-transform" style="transition: transform 0.2s;">▾</span>
                            </summary>
                            <p class="mt-3 text-body">As a general guide, most workplaces require CPR to be renewed every
                                12 months and Provide First Aid every 3 years. Check your workplace's specific requirements.
                            </p>
                        </details>
                        <details class="rounded-4 border bg-white p-4">
                            <summary
                                class="d-flex cursor-pointer list-unstyled align-items-center justify-content-between gap-3 fw-bold text-dark">
                                Is there any pre-course work?
                                <span class="text-muted transition-transform" style="transition: transform 0.2s;">▾</span>
                            </summary>
                            <p class="mt-3 text-body">Yes — there's a short online learning module to complete before your
                                in-person session. You'll receive the link after you book.</p>
                        </details>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-light px-14 py-24">
            <div class="container">
                <h5 class="fw-bold h3">First Aid &amp; CPR by location</h5>
                <p class="mt-3 text-body">Delivered face-to-face at 15 centres. Choose your nearest centre to see its class
                    dates and book.</p>
                <ul class="row g-3 list-unstyled mt-4">
                    <li class="col-12 col-sm-6 col-lg-4">
                        <a class="d-flex h-100 gap-3 text-decoration-none rounded-4 border bg-white p-4 shadow-sm transition-shadow"
                            style="transition: box-shadow 0.2s;" onmouseover="this.classList.add('shadow');"
                            onmouseout="this.classList.remove('shadow');" href="/courses/first-aid/sydney">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                                class="mt-1 flex-shrink-0 text-primary">
                                <path d="M12 21s7-5.5 7-11a7 7 0 1 0-14 0c0 5.5 7 11 7 11Z"></path>
                                <circle cx="12" cy="10" r="2.5"></circle>
                            </svg>
                            <div>
                                <p class="fw-bold text-dark mb-0">Sydney</p>
                                <p class="mt-1 small lh-sm text-muted">Level 5, 8 Quay Street (Prince Centre), Haymarket
                                    NSW 2000</p>
                                <span class="mt-2 d-inline-flex align-items-center gap-1 small fw-bold text-success">
                                    See Sydney dates
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="M5 12h14M13 6l6 6-6 6"></path>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
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

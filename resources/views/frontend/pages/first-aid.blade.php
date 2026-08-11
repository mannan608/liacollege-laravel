@extends('frontend.layouts.app')

@section('content')
    <section class="bg-[#e5b35d] text-white">
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
    </section>
    <section id="find" class="relative z-10 mx-auto -mt-20 scroll-mt-24 px-4 sm:px-6 w-75">
        <div class="rounded-card border border-line bg-white p-6 shadow-lg shadow-brand-900/5 sm:p-8"
            style="border-radius: 8px">
            <h6 class="text-xl font-bold text-ink">Find a First Aid, CPR or Childcare First Aid class</h6>
            <p class="mt-1 text-sm text-muted">Pick a course and location to see live dates and book online in
                minutes.
            </p>
            <form method="GET" action="{{ route('first-aid') }}" id="courseSearchForm">
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
                <h6 class="text-xs font-bold uppercase tracking-wide text-muted mb-0" style="font-size: 14px">3. Choose a
                    date</h6>
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
@endsection




@extends('backend.layouts.fullscreen-layout')

@section('content')

<div class="min-h-screen bg-neutral-100 p-6">

    <div class="mx-auto max-w-2xl">

        <div class="rounded-3xl bg-white p-8 shadow-xl">

            <h1 class="text-3xl font-bold text-slate-900">
                Checkout
            </h1>

            <p class="mt-2 text-slate-500">
                Review your enrolment details.
            </p>


            <div class="mt-8 rounded-2xl bg-gray-50 p-6">

                <div class="flex justify-between">
                    <span class="text-gray-500">
                        Course
                    </span>

                    <span class="font-semibold">
                        {{ $course->name }}
                    </span>
                </div>

                <div class="mt-4 flex justify-between">
                    <span class="text-gray-500">
                        Student
                    </span>

                    <span class="font-semibold">
                        {{ $validated['name'] }}
                    </span>
                </div>

                <div class="mt-4 flex justify-between">
                    <span class="text-gray-500">
                        Date
                    </span>

                    <span class="font-semibold">
                        {{ \Carbon\Carbon::parse($slot->training_date)->format('D, d F Y') }}
                    </span>
                </div>

                <div class="mt-4 flex justify-between">
                    <span class="text-gray-500">
                        Location
                    </span>

                    <span class="font-semibold">
                        {{ $slot->trainingCenter?->city }}
                    </span>
                </div>

                <div class="mt-6 border-t border-gray-200 pt-6">

                    <div class="flex justify-between text-xl">

                        <span class="font-bold">
                            Total
                        </span>

                        <span class="font-bold text-emerald-600">
                            ${{ number_format($slot->price, 2) }} AUD
                        </span>

                    </div>

                </div>

            </div>


            {{-- Temporary complete enrolment --}}
            <a
                href="{{ route('course-enrollment.success') }}"
                class="mt-8 block w-full rounded-xl bg-emerald-600 px-6 py-4 text-center font-bold text-white transition hover:bg-emerald-700"
            >
                Pay & Complete Enrolment
            </a>

        </div>

    </div>

</div>

@endsection
@extends('backend.layouts.fullscreen-layout')

@section('content')

<div class="min-h-screen bg-neutral-100 p-6">

    <div class="mx-auto max-w-3xl">

        <div class="rounded-3xl bg-white p-8 shadow-xl">

            <h1 class="text-3xl font-bold text-slate-900">
                Enrol in Course
            </h1>

            <p class="mt-2 text-slate-500">
                Complete your details to continue.
            </p>

            {{-- Course Information --}}
            <div class="mt-8 rounded-2xl bg-gray-50 p-6">

                <h2 class="text-xl font-bold text-slate-900">
                    {{ $course->name }}
                </h2>

                <div class="mt-4 grid gap-4 sm:grid-cols-2">

                    <div>
                        <p class="text-sm text-gray-500">
                            Date
                        </p>

                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($slot->training_date)->format('D, d F Y') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Time
                        </p>

                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($slot->start_time)->format('g:ia') }}
                            -
                            {{ \Carbon\Carbon::parse($slot->end_time)->format('g:ia') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Location
                        </p>

                        <p class="font-semibold">
                            {{ $slot->trainingCenter?->city }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Price
                        </p>

                        <p class="font-semibold text-emerald-600">
                            ${{ number_format($slot->price, 2) }} AUD
                        </p>
                    </div>

                </div>

            </div>


            {{-- Enrollment Form --}}
            <form
                method="POST"
                action="{{ route('course-enrollment.create', [$course, $slot]) }}"
                class="mt-8"
            >

                @csrf

                <input
                    type="hidden"
                    name="course_id"
                    value="{{ $course->id }}"
                >

                <input
                    type="hidden"
                    name="slot_id"
                    value="{{ $slot->id }}"
                >

                <div class="space-y-5">

                    <div>
                        <label class="mb-2 block text-sm font-semibold">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none focus:border-emerald-500"
                        >

                        @error('name')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div>
                        <label class="mb-2 block text-sm font-semibold">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none focus:border-emerald-500"
                        >

                        @error('email')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div>
                        <label class="mb-2 block text-sm font-semibold">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none focus:border-emerald-500"
                        >

                        @error('phone')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>


                <button
                    type="submit"
                    class="mt-8 w-full rounded-xl bg-emerald-600 px-6 py-4 font-bold text-white transition hover:bg-emerald-700"
                >
                    Continue to Checkout
                </button>

            </form>

        </div>

    </div>

</div>

@endsection
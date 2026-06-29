@extends('frontend.layouts.app')

@section('content')
    <section class=" py-8 md:py-12 lg:py-14 bg-white ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="border border-gray-200 p-6 w-full rounded-lg bg-white max-w-170 mx-auto">

                <div class="md:mb-4 mb-3 lg:mb-6">
                    <h1 class="text-center text-base md:text-lg lg:text-xl font-bold text-gray-900">{{ $course->name }}</h1>
                </div>
                <form  action="{{ route('course.enroll', $course->slug) }}" method="POST">
                    @csrf

                    <input type="hidden" name="course_id" value="{{ $course->id }}">

                    <div class="flex flex-col gap-4">
                        <x-form.input-text name="name" label="Full Name" placeholder="Enter Full Name..." />
                        <x-form.input-text name="email" label="Email" type="email" placeholder="Enter Email..." />
                        <x-form.input-text name="phone" label="Phone" placeholder="Enter Phone No..." />
                        <x-form.textarea-input name="message" label="Note" rows="3"
                            placeholder="Write your note..." />
                    </div>

                    <div class="flex justify-end mt-4 md:mt-6">
                        <button type="submit"
                            class="text-sm bg-brand-600 text-white px-4 py-2 lg:px-6 lg:py-2.5 rounded-lg font-normal hover:bg-brand-600 transition">
                            Apply Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

<div x-data="{ showModal: {{ session('success') ? 'true' : 'false' }} }">

    @if (session('success'))
        <div x-show="showModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
            style="display:none">

            <div @click.away="showModal = false" class="bg-white rounded-2xl p-8 max-w-md mx-4 text-center shadow-xl">

                <div class="mb-4">
                    <svg class="w-16 h-16 mx-auto text-green-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <h3 class="text-xl font-bold text-gray-900 mb-2">
                    Success!
                </h3>

                <p class="text-gray-600 mb-6 text-base font-medium">You have successfully applied for {{$course->name}}</p>

                <p class="text-gray-600 mb-6 text-sm">
                    {{ session('success') }}
                </p>


                <button @click="showModal = false" class="bg-brand-600 text-white px-6 py-2 rounded-lg">
                    Close
                </button>
            </div>
        </div>
    @endif

</div>
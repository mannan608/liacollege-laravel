@extends('backend.layouts.app')

@section('content')
   <form action="{{ role_route('role.modules.store', ['course' => $course->id]) }}"
        method="POST">

        @csrf

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

            <div class="space-y-6 lg:col-span-8">

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Course Module Information
                        </h2>
                    </div>

                    <div class="space-y-5 p-5">

                        <x-form.input-text
                            name="title"
                            label="Course Module Name"
                            value="{{ old('title') }}"
                            placeholder="Enter Course Module Name..."
                        />

                    </div>

                </div>

                <button type="submit"
                    class="w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">
                    Create Module
                </button>

            </div>

        </div>

    </form>
@endsection

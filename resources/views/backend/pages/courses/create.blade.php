@extends('backend.layouts.app')

@section('content')
    <form action="{{ role_route('role.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

            <div class="lg:col-span-8 space-y-6">

                {{-- Course Information --}}
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">

                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Course Information
                        </h2>

                    </div>

                    <div class="p-5 space-y-5">

                        <x-form.select-input name="name" label="Course Name" :options="[
                            'course-1' => 'course-1',
                            'course-2' => 'course-2',
                        ]" />

                        <div class="flex justify-between gap-4">
                            <h6>Create Section</h6>
                            <button type="submit"
                                class=" w-fit rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">
                                Create Section
                            </button>
                        </div>

                        {{-- show section field --}}
                        <div class="">
                            
                        </div>

                    </div>
                    

                </div>
            </div>

            <div class="lg:col-span-4">


            </div>
        </div>
    </form>
@endsection

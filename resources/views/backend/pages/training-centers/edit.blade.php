@extends('backend.layouts.app')

@php
    $cities = [
        'Sydney' => 'Sydney',
        'Liverpool' => 'Liverpool',
        'Parramatta' => 'Parramatta',
        'Hornsby' => 'Hornsby',
        'Penrith' => 'Penrith',
        'Newcastle' => 'Newcastle',
        'Wollongong' => 'Wollongong',
        'Central Coast' => 'Central Coast',
        'Melbourne' => 'Melbourne',
        'Dandenong' => 'Dandenong',
        'Brisbane' => 'Brisbane',
        'Perth' => 'Perth',
        'Adelaide' => 'Adelaide',
        'Canberra' => 'Canberra',
        'Hobart' => 'Hobart',
    ];
@endphp

@section('content')
    <form action="{{ role_route('role.training-centers.update', ['training_center' => $trainingCenter->uuid]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

            <div class="lg:col-span-8 space-y-6">

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Training Centers Information
                        </h2>
                    </div>

                    <div class="p-5 space-y-5">

                        {{-- Name --}}
                        <x-form.input-text name="name" label="Traning Center Name" value="{{ old('name', $trainingCenter->name) }}"
                            placeholder="Enter Traning Center Name..." />

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <x-form.input-text name="email" label="Email" type="email" value="{{ old('email', $trainingCenter->email) }}" placeholder="Enter Email..." />
                            <x-form.input-text name="phone" label="Phone" value="{{ old('phone', $trainingCenter->phone) }}" placeholder="Enter Phone No..." />  
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <x-form.input-text name="latitude" label="Latitude" value="{{ old('latitude', $trainingCenter->latitude) }}" placeholder="Enter Latitude..." />
                            <x-form.input-text name="longitude" label="Longitude" value="{{ old('longitude', $trainingCenter->longitude) }}" placeholder="Enter Longitude..." />

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <x-form.input-text name="country" label="Country" value="Australia" readonly />
                            <input type="hidden" name="country" value="Australia">

                            <x-form.select-input name="city" label="City" value="{{ old('city', $trainingCenter->city) }}"
                                :options="$cities" placeholder="Select City..." />
                            <x-form.input-text name="postcode" label="Post Code" value="{{ old('postcode', $trainingCenter->postcode) }}" placeholder="Enter Post Code..." />

                        </div>

                        <x-form.textarea-input name="address" value="{{ old('address', $trainingCenter->address) }}" label="Address" rows="3"
                            placeholder="Traning Center address..." />

                    </div>

                </div>
                <button type="submit"
                    class="w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">
                    Create Traning Center
                </button>

            </div>

        </div>
    </form>
@endsection

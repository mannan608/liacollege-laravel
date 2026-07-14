@extends('backend.layouts.app')

@section('content')
    <form action="{{ role_route('role.training-centers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

            <div class="lg:col-span-8 space-y-6">

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Course Category Information
                        </h2>
                    </div>

                    <div class="p-5 space-y-5">

                        {{-- Name --}}
                        <x-form.input-text name="name" label=" Course Category Name" value="{{ old('name') }}"
                            placeholder="Enter  Course Category Name..." />

                    </div>

                </div>
                <button type="submit"
                    class="w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">
                    Create Category
                </button>

            </div>

        </div>
    </form>
@endsection

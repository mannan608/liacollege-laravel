@extends('backend.layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto">

        @if (session('success'))
            <div class="mb-5 p-4 rounded-lg bg-green-100 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border dark:bg-gray-900">

            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold">
                    My Profile
                </h2>
            </div>

            <form action="{{ route('role.profile.update', ['role' => request()->route('role')]) }}" method="POST"
                enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid lg:grid-cols-3 gap-8">

                    <!-- Avatar -->
                    <div>

                        <label class="block mb-3 font-medium">
                            Profile Photo
                        </label>
                        <div class="flex flex-col items-center justify-center">
                            <label class="relative group cursor-pointer border border-gray-400 rounded-full">
                                <!-- Current Profile Picture -->
                                <img id="avatarPreview"
                                    src="{{ $user->avatar ? asset($user->avatar) : asset('images/user/owner.png') }}"
                                    class="w-32 h-32 rounded-full object-cover object-center transition-transform duration-300 group-hover:scale-105"
                                    alt="User Profile" />

                                <!-- Hover Overlay -->
                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-black/40 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="text-white text-sm font-semibold">Change</span>
                                </div>
                                <input type="file" name="avatar" accept="image/*" class="mt-4 hidden"
                                    onchange="previewAvatar(event)">
                            </label>
                            @error('avatar')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="lg:col-span-2">

                        <div class="grid md:grid-cols-2 gap-5">

                            <div>
                                <label class="block mb-2">
                                    Name
                                </label>

                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                    class="w-full border rounded-xl px-4 py-3">

                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-2">
                                    Phone
                                </label>

                                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                    class="w-full border rounded-xl px-4 py-3">

                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block mb-2">
                                    Email
                                </label>

                                <input type="email" value="{{ $user->email }}" readonly
                                    class="w-full border rounded-xl px-4 py-3 bg-gray-100 cursor-not-allowed">
                            </div>

                        </div>

                        <hr class="my-8">

                        <h3 class="font-semibold text-lg mb-5">
                            Change Password
                        </h3>

                        <div class="grid md:grid-cols-2 gap-5">

                            <div class="md:col-span-2">
                                <label class="block mb-2">
                                    Current Password
                                </label>

                                <input type="password" name="current_password" class="w-full border rounded-xl px-4 py-3">

                                @error('current_password')
                                    <p class="text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-2">
                                    New Password
                                </label>

                                <input type="password" name="password" class="w-full border rounded-xl px-4 py-3">

                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-2">
                                    Confirm Password
                                </label>

                                <input type="password" name="password_confirmation"
                                    class="w-full border rounded-xl px-4 py-3">
                            </div>

                        </div>

                        <div class="mt-8">
                            <button type="submit" class="px-6 py-3 rounded-xl bg-brand-500 text-white font-medium">
                                Save Changes
                            </button>
                        </div>

                    </div>
                </div>
            </form>
        </div>

    </div>

    <script>
        function previewAvatar(event) {
            const preview =
                document.getElementById('avatarPreview');

            preview.src =
                URL.createObjectURL(
                    event.target.files[0]
                );
        }
    </script>
@endsection

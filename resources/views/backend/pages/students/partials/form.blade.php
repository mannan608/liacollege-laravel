@php
    $student ??= null;
    $user = $student?->user;
    $selectedCourses = old('courses', $student?->courses?->pluck('id')->toArray() ?? []);
@endphp

<div
    class="grid gap-5 rounded-lg border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300" for="name">Name</label>
        <input id="name" name="name" value="{{ old('name', $user?->name) }}" required
            class="h-11 w-full rounded-lg border border-gray-300 px-4 text-sm text-gray-800 focus:border-brand-500 focus:outline-none dark:border-gray-700 dark:bg-gray-900 dark:text-white">
        @error('name')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300" for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email', $user?->email) }}" required
            class="h-11 w-full rounded-lg border border-gray-300 px-4 text-sm text-gray-800 focus:border-brand-500 focus:outline-none dark:border-gray-700 dark:bg-gray-900 dark:text-white">
        @error('email')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300" for="password">Password</label>
        <input id="password" type="password" name="password" @if (!$user) required @endif
            class="h-11 w-full rounded-lg border border-gray-300 px-4 text-sm text-gray-800 focus:border-brand-500 focus:outline-none dark:border-gray-700 dark:bg-gray-900 dark:text-white">
        @error('password')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
            for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation"
            @if (!$user) required @endif
            class="h-11 w-full rounded-lg border border-gray-300 px-4 text-sm text-gray-800 focus:border-brand-500 focus:outline-none dark:border-gray-700 dark:bg-gray-900 dark:text-white">
    </div>

    <div>
        <x-form.multi-select
            name="courses"
            label="Select Enroll Course"
            :options="$courses"
            :selected="$selectedCourses"
            placeholder="Select Course"
        />
        @error('courses')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="flex items-center gap-3">
    <button type="submit" class="rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
        Save Student
    </button>
    <a href="{{ role_route('role.students.index') }}"
        class="rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-700 dark:border-gray-700 dark:text-gray-300">
        Cancel
    </a>
</div>

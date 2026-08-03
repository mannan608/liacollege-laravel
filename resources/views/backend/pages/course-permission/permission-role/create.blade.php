@extends('backend.layouts.app')

@section('content')
    <div class="max-w-3xl space-y-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Create Permission Role</h1>
            <p class="mt-1 text-sm text-slate-500">
                Add a new access label for {{ $course->name }}.
            </p>
        </div>

        <form action="{{ role_route('role.course-permissions.store', ['course' => $course->id]) }}" method="POST"
            class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-5">
            @csrf

            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">Role Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full rounded-xl border-slate-300 focus:border-brand-500 focus:ring-brand-500"
                    placeholder="Full Access">
                @error('name')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">Description</label>
                <textarea name="description" rows="4"
                    class="w-full rounded-xl border-slate-300 focus:border-brand-500 focus:ring-brand-500"
                    placeholder="Short note for admin use">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <label class="flex items-center gap-3 rounded-xl border border-slate-200 px-4 py-3">
                <input type="checkbox" name="is_full_access" value="1"
                    class="h-4 w-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                <span>
                    <span class="block text-sm font-semibold text-slate-900">Full Access</span>
                    <span class="block text-xs text-slate-500">Automatically grants access to every category, section, and row.</span>
                </span>
            </label>

            <div class="flex items-center gap-3">
                <button type="submit"
                    class="inline-flex items-center rounded-xl bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-brand-700">
                    Create Role
                </button>
                <a href="{{ role_route('role.course-permissions.index', ['course' => $course->id]) }}"
                    class="inline-flex items-center rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection

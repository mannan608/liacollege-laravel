@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Edit Permission Role</h1>
                <p class="mt-1 text-sm text-slate-500">
                    Configure what {{ $role->name }} can access in {{ $course->name }}.
                </p>
            </div>

            <a href="{{ role_route('role.course-permissions.index') }}"
                class="inline-flex items-center rounded-xl border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                Back to Roles
            </a>
        </div>

        <form action="{{ role_route('role.course-permissions.update', ['course' => $course->id, 'permission_role' => $role->id]) }}"
            method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-5">
                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Role Name</label>
                        <input type="text" name="name" value="{{ old('name', $role->name) }}"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                    </div>

                    <div class="flex items-end">
                        <label class="flex items-center gap-3 rounded-xl border border-slate-200 px-4 py-3 w-full">
                            <input type="checkbox" name="is_full_access" value="1"
                                @checked(old('is_full_access', $role->is_full_access))
                                class="h-4 w-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                            <span>
                                <span class="block text-sm font-semibold text-slate-900">Full Access</span>
                                <span class="block text-xs text-slate-500">No tree selection needed.</span>
                            </span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">Description</label>
                    <textarea name="description" rows="3"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">{{ old('description', $role->description) }}</textarea>
                </div>
            </div>

            @include('backend.pages.course-permission.course-permission-items.index', [
                'course' => $course,
                'role' => $role,
                'selectedCategories' => $selectedCategories,
                'selectedSections' => $selectedSections,
                'selectedRows' => $selectedRows,
                'selectedAssignments' => $selectedAssignments,
            ])

            <div class="flex items-center gap-3">
                <button type="submit"
                    class="inline-flex items-center rounded-xl bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-brand-700">
                    Save Role
                </button>
                <a href="{{ role_route('role.course-permissions.index', ['course' => $course->id]) }}"
                    class="inline-flex items-center rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection

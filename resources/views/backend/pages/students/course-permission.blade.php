@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        @if (session('success'))
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex items-start justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Course Permission Assignment</h1>
                <p class="mt-1 text-sm text-slate-500">
                    Assign a permission role per course for {{ $student->user->name }}.
                </p>
            </div>
        </div>

        <form action="{{ role_route('role.students.course-permission.store', ['student' => $student->id]) }}" method="POST"
            class="space-y-4">
            @csrf

            @forelse ($enrollments as $enrollment)
                @php
                    $course = $enrollment->slot?->course;
                    $roles = $course?->permissionRoles ?? collect();
                @endphp

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">
                                {{ $course->name ?? 'Unknown course' }}
                            </h2>
                            <p class="mt-1 text-sm text-slate-500">
                                Enrollment #{{ $enrollment->id }}
                            </p>
                        </div>

                        @if ($enrollment->permissionRole)
                            <span class="rounded-full bg-brand-100 px-3 py-1 text-xs font-semibold text-brand-700">
                                Current: {{ $enrollment->permissionRole->name }}
                            </span>
                        @endif
                    </div>

                    <div class="mt-4 grid gap-3 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">Permission Role</label>
                            <select name="enrollments[{{ $enrollment->id }}][permission_role_id]"
                                class="w-full rounded-xl border-slate-300 focus:border-brand-500 focus:ring-brand-500">
                                <option value="">No role assigned</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" @selected(old("enrollments.{$enrollment->id}.permission_role_id", $enrollment->course_permission_role_id) == $role->id)>
                                        {{ $role->name }}{{ $role->is_full_access ? ' - Full Access' : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 text-sm text-slate-600">
                            <p class="font-semibold text-slate-900">Quick Note</p>
                            <p class="mt-1">
                                Assign the course's <span class="font-medium">Full Access</span> role to give complete visibility instantly.
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-center text-sm text-slate-500">
                    No enrollments found for this student.
                </div>
            @endforelse

            <div class="flex items-center gap-3">
                <button type="submit"
                    class="inline-flex items-center rounded-xl bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-brand-700">
                    Save Assignment
                </button>
                <a href="{{ role_route('role.students.index') }}"
                    class="inline-flex items-center rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    Back
                </a>
            </div>
        </form>
    </div>
@endsection

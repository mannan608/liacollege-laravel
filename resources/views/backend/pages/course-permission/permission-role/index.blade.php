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
                <h1 class="text-2xl font-bold text-slate-900">Course Content Permission</h1>
               
            </div>

            {{-- <a href="{{ role_route('role.course-permissions.create', ['course' => $course->id]) }}"
                class="inline-flex items-center gap-2 rounded-xl bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-700">
                New Role
            </a> --}}
        </div>
         @include('backend.pages.course-permission.permission-role.table', ['items' => $courses])

        {{-- <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($roles as $role)
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">{{ $role->name }}</h2>
                            <p class="mt-1 text-sm text-slate-500">
                                {{ $role->description ?: 'No description provided.' }}
                            </p>
                        </div>

                        @if ($role->is_full_access)
                            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
                                Full Access
                            </span>
                        @endif
                    </div>

                    <div class="mt-4 text-sm text-slate-600">
                        {{ $role->permissions_count }} selected items
                    </div>

                    <div class="mt-5 flex items-center gap-3">
                        <a href="{{ role_route('role.course-permissions.edit', ['course' => $course->id, 'permission_role' => $role->id]) }}"
                            class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700">
                            Edit
                        </a>

                        <form action="{{ role_route('role.course-permissions.destroy', ['course' => $course->id, 'permission_role' => $role->id]) }}"
                            method="POST" onsubmit="return confirm('Delete this role?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center rounded-lg border border-rose-200 px-4 py-2 text-sm font-semibold text-rose-600 hover:bg-rose-50">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-center text-sm text-slate-500 md:col-span-2 xl:col-span-3">
                    No permission roles yet. Create the first one to start assigning access.
                </div>
            @endforelse
        </div> --}}
    </div>
@endsection

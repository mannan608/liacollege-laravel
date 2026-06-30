@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Create Student</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Assign one primary role and any additional role containers.</p>
        </div>

        <form method="POST" action="{{ role_route('role.students.store') }}" class="space-y-6">
            @csrf
            @include('backend.pages.students.partials.form', ['user' => null])
        </form>
        @if ($errors->any())
    <div class="bg-red-100 p-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>
@endsection

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
                <h1 class="text-2xl font-bold text-slate-900">Course Permission</h1>
                
            </div>
          
        </div>
@include('backend.pages.course-permission.permission-role.table', ['items' => $courses])
      
    </div>
@endsection

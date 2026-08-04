@extends('backend.layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="mb-6">
        <a
            href="{{ role_route('role.assignments.submissions.index') }}"
            class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-purple-600 mb-4"
        >
            Back to All Submissions
        </a>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <p class="text-sm font-semibold text-purple-600">
                    {{ $assignment->course->name }}
                </p>

                <h1 class="text-2xl font-bold text-slate-800">
                    {{ $assignment->title }}
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Students who submitted this assignment
                </p>
            </div>

            <div class="px-4 py-3 rounded-xl bg-purple-50 border border-purple-100">
                <p class="text-xs font-semibold uppercase tracking-wide text-purple-500">
                    Total Submissions
                </p>
                <p class="text-xl font-bold text-purple-700">
                    {{ $submissions->total() }}
                </p>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 px-5 py-4 rounded-xl bg-green-50 border border-green-200 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">Student</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">Submitted</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">Status</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">Marks</th>
                        <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wide text-slate-500">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($submissions as $submission)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-slate-800">
                                    {{ $submission->student->user->name ?? 'Unknown Student' }}
                                </div>
                                @if(($submission->student->user->email ?? null))
                                    <div class="text-xs text-slate-400 mt-1">
                                        {{ $submission->student->user->email }}
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">
                                @if($submission->submitted_at)
                                    {{ $submission->submitted_at->format('d M Y') }}
                                    <div class="text-xs text-slate-400">
                                        {{ $submission->submitted_at->format('h:i A') }}
                                    </div>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($submission->status === 'graded')
                                    <span class="inline-flex px-2.5 py-1 rounded-full bg-green-50 border border-green-200 text-xs font-bold text-green-700">Graded</span>
                                @else
                                    <span class="inline-flex px-2.5 py-1 rounded-full bg-amber-50 border border-amber-200 text-xs font-bold text-amber-700">Submitted</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($submission->marks !== null)
                                    <span class="font-bold text-slate-700">{{ $submission->marks }}</span>
                                    <span class="text-slate-400"> / {{ $assignment->total_marks }}</span>
                                @else
                                    <span class="text-slate-400">Not graded</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a
                                    href="{{ role_route('role.assignments.submissions.show', [
                                        'assignment' => $assignment,
                                        'submission' => $submission,
                                    ]) }}"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-800 hover:bg-slate-900 text-white text-sm font-semibold"
                                >
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="mx-auto w-14 h-14 rounded-2xl bg-slate-50 flex items-center justify-center">
                                    <svg class="w-7 h-7 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <h3 class="mt-4 font-bold text-slate-700">No submissions yet</h3>
                                <p class="mt-1 text-sm text-slate-400">Students have not submitted this assignment.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($submissions->hasPages())
        <div class="mt-6">
            {{ $submissions->links() }}
        </div>
    @endif

</div>

@endsection

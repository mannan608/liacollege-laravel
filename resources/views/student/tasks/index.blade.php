@extends('student.layouts.app')

@section('content')
    <div class="min-h-screen bg-slate-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-8 sm:py-12">

            <!-- Header -->
            <div class="mb-10">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-orange-500 to-amber-500 flex items-center justify-center shadow-lg shadow-orange-500/20">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                </svg>
                            </div>
                            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">My Assignments</h1>
                        </div>
                        <p class="text-slate-500 text-base ml-[52px]">Stay organized and never miss a deadline</p>
                    </div>
                    
                    @if(count($assignments) > 0)
                        <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-full border border-slate-200 shadow-sm">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-sm font-semibold text-slate-600">{{ count($assignments) }} Active</span>
                        </div>
                    @endif
                </div>
            </div>

            @forelse($assignments as $assignment)
                @php
                    $isOverdue = $assignment->due_date && $assignment->due_date->isPast();
                    $submission = $assignment->submissions->where('student_id', auth()->user()->student->id)->first();
                    $status = $submission?->status ?? 'pending';
                    
                    // Status theming
                    $statusConfig = match($status) {
                        'graded' => [
                            'accent' => 'border-l-emerald-500',
                            'iconBg' => 'bg-emerald-50',
                            'iconBorder' => 'border-emerald-200',
                            'iconText' => 'text-emerald-600',
                            'badgeBg' => 'bg-emerald-50',
                            'badgeText' => 'text-emerald-700',
                            'badgeBorder' => 'border-emerald-200',
                        ],
                        'submitted' => [
                            'accent' => 'border-l-blue-500',
                            'iconBg' => 'bg-blue-50',
                            'iconBorder' => 'border-blue-200',
                            'iconText' => 'text-blue-600',
                            'badgeBg' => 'bg-blue-50',
                            'badgeText' => 'text-blue-700',
                            'badgeBorder' => 'border-blue-200',
                        ],
                        'returned' => [
                            'accent' => 'border-l-amber-500',
                            'iconBg' => 'bg-amber-50',
                            'iconBorder' => 'border-amber-200',
                            'iconText' => 'text-amber-600',
                            'badgeBg' => 'bg-amber-50',
                            'badgeText' => 'text-amber-700',
                            'badgeBorder' => 'border-amber-200',
                        ],
                        default => $isOverdue ? [
                            'accent' => 'border-l-red-500',
                            'iconBg' => 'bg-red-50',
                            'iconBorder' => 'border-red-200',
                            'iconText' => 'text-red-600',
                            'badgeBg' => 'bg-red-50',
                            'badgeText' => 'text-red-700',
                            'badgeBorder' => 'border-red-200',
                        ] : [
                            'accent' => 'border-l-orange-500',
                            'iconBg' => 'bg-orange-50',
                            'iconBorder' => 'border-orange-200',
                            'iconText' => 'text-orange-600',
                            'badgeBg' => 'bg-amber-50',
                            'badgeText' => 'text-amber-700',
                            'badgeBorder' => 'border-amber-200',
                        ],
                    };
                @endphp

                <div class="group relative bg-white rounded-2xl border border-slate-200 border-l-4 {{ $statusConfig['accent'] }} shadow-sm hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 mb-5 overflow-hidden">
                    
                    <!-- Subtle gradient overlay on hover -->
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-50/0 via-slate-50/0 to-slate-50/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                    <div class="p-5 sm:p-6 relative">
                        <div class="flex flex-col lg:flex-row lg:items-start gap-5">

                            {{-- Left Content --}}
                            <div class="flex items-start gap-4 flex-1 min-w-0">

                                {{-- Dynamic Icon --}}
                                <div class="w-12 h-12 rounded-xl {{ $statusConfig['iconBg'] }} border {{ $statusConfig['iconBorder'] }} flex items-center justify-center shrink-0 shadow-sm">
                                    <svg class="w-6 h-6 {{ $statusConfig['iconText'] }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </div>

                                {{-- Info --}}
                                <div class="flex-1 min-w-0 space-y-1">

                                    <div class="flex items-start justify-between gap-3">
                                        <h3 class="text-lg font-bold text-slate-800 group-hover:text-orange-600 transition-colors duration-200 leading-tight">
                                            {{ $assignment->title }}
                                        </h3>
                                    </div>

                                    @if ($assignment->course)
                                        <a href="#" class="inline-flex items-center gap-1.5 text-xs font-bold text-orange-600 hover:text-orange-700 transition-colors">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                            </svg>
                                            {{ $assignment->course->name }}
                                        </a>
                                    @endif

                                    @if ($assignment->description)
                                        <p class="text-slate-500 text-sm leading-relaxed line-clamp-2 pt-1">
                                            {{ $assignment->description }}
                                        </p>
                                    @endif

                                    {{-- Meta Row --}}
                                    <div class="flex flex-wrap items-center gap-x-5 gap-y-2 pt-3">

                                        {{-- Due Date --}}
                                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold {{ $isOverdue ? 'text-red-600' : 'text-slate-500' }}">
                                            <svg class="w-4 h-4 {{ $isOverdue ? 'text-red-500' : 'text-slate-400' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            @if ($assignment->due_date)
                                                <span>{{ $isOverdue ? 'Overdue' : 'Due' }}</span>
                                                <time datetime="{{ $assignment->due_date->toIso8601String() }}" class="{{ $isOverdue ? 'underline decoration-red-300 decoration-2 underline-offset-2' : '' }}">
                                                    {{ $assignment->due_date->format('M d, Y · h:i A') }}
                                                </time>
                                            @else
                                                No deadline
                                            @endif
                                        </span>

                                        {{-- Marks --}}
                                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500">
                                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                                            </svg>
                                            {{ $assignment->total_marks }} marks
                                        </span>

                                        {{-- Status Badge --}}
                                        @if ($status === 'graded')
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold {{ $statusConfig['badgeBg'] }} {{ $statusConfig['badgeText'] }} border {{ $statusConfig['badgeBorder'] }} uppercase tracking-wider">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                                Graded
                                            </span>
                                        @elseif($status === 'submitted')
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold {{ $statusConfig['badgeBg'] }} {{ $statusConfig['badgeText'] }} border {{ $statusConfig['badgeBorder'] }} uppercase tracking-wider">
                                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                                                Submitted
                                            </span>
                                        @elseif($status === 'returned')
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold {{ $statusConfig['badgeBg'] }} {{ $statusConfig['badgeText'] }} border {{ $statusConfig['badgeBorder'] }} uppercase tracking-wider">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                                                </svg>
                                                Returned
                                            </span>
                                        @elseif($isOverdue)
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold {{ $statusConfig['badgeBg'] }} {{ $statusConfig['badgeText'] }} border {{ $statusConfig['badgeBorder'] }} uppercase tracking-wider">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                                </svg>
                                                Overdue
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold {{ $statusConfig['badgeBg'] }} {{ $statusConfig['badgeText'] }} border {{ $statusConfig['badgeBorder'] }} uppercase tracking-wider">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                                Pending
                                            </span>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="flex items-center gap-2.5 shrink-0 lg:pt-1">
                                
                                {{-- View --}}
                                <a href="{{ role_route('student.tasks.show', ['course' => $course, 'assignment' => $assignment]) }}"
                                    class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 hover:border-slate-300 hover:text-slate-900 active:scale-95 transition-all duration-200 shadow-sm">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639l3.5-8.667A1.5 1.5 0 0 1 6.93 2h10.14a1.5 1.5 0 0 1 1.394.984l3.5 8.667a1.012 1.012 0 0 1 0 .639l-3.5 8.667A1.5 1.5 0 0 1 17.07 22H6.93a1.5 1.5 0 0 1-1.394-.984l-3.5-8.667ZM15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    View
                                </a>

                                {{-- Submit / Resubmit / Grade --}}
                                @if (!$submission)
                                    <a href="{{ role_route('student.tasks.submit', ['course' => $course, 'assignment' => $assignment]) }}"
                                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 active:scale-95 shadow-lg shadow-orange-500/25 hover:shadow-orange-500/40 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                        </svg>
                                        Submit
                                    </a>
                                @elseif($status === 'graded')
                                    <div class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-bold text-emerald-700 bg-emerald-50 border border-emerald-200">
                                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                        </svg>
                                        <span class="tabular-nums">{{ $submission->marks }}</span>
                                        <span class="text-emerald-500 font-medium">/</span>
                                        <span class="tabular-nums text-emerald-500">{{ $assignment->total_marks }}</span>
                                    </div>
                                @else
                                    <a href="{{ role_route('student.tasks.submit', ['course' => $course, 'assignment' => $assignment]) }}"
                                        class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-sm font-bold text-orange-700 bg-orange-50 border border-orange-200 hover:bg-orange-100 hover:border-orange-300 active:scale-95 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>
                                        Resubmit
                                    </a>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>

            @empty

                {{-- Empty State --}}
                <div class="relative bg-white rounded-3xl border border-slate-200 p-12 sm:p-16 text-center overflow-hidden">
                    
                    <!-- Decorative background elements -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-orange-400 via-amber-400 to-orange-400"></div>
                    <div class="absolute -top-24 -right-24 w-48 h-48 bg-orange-100 rounded-full blur-3xl opacity-50"></div>
                    <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-amber-100 rounded-full blur-3xl opacity-50"></div>

                    <div class="relative">
                        <div class="mx-auto w-20 h-20 rounded-2xl bg-gradient-to-br from-orange-50 to-amber-50 border border-orange-100 flex items-center justify-center shadow-sm mb-6">
                            <svg class="w-10 h-10 text-orange-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>

                        <h3 class="text-xl font-black text-slate-800 mb-2">All caught up!</h3>
                        <p class="text-slate-500 max-w-sm mx-auto leading-relaxed">
                            You currently have no assignments for your enrolled courses. Enjoy your free time or review past submissions.
                        </p>

                        <div class="mt-8 flex items-center justify-center gap-3">
                            <div class="h-px w-12 bg-slate-200"></div>
                            <span class="text-xs font-semibold text-slate-400 uppercase tracking-widest">No pending tasks</span>
                            <div class="h-px w-12 bg-slate-200"></div>
                        </div>
                    </div>
                </div>

            @endforelse

        </div>
    </div>
@endsection
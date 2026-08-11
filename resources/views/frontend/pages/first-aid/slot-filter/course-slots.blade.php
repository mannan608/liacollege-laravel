<div class="mb-5 flex items-center justify-between">
    <div class="flex items-center gap-2">
        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-amber-500 text-[10px] font-bold text-white">3</span>
        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500">Available Dates</h3>
    </div>
    @if (count($slots) > 0)
        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
            {{ count($slots) }} {{ count($slots) === 1 ? 'slot' : 'slots' }} found
        </span>
    @endif
</div>

<div class="space-y-3">
    @forelse ($slots as $slot)
        <div class="group relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-900/5 transition-all duration-300 hover:shadow-lg hover:shadow-slate-200/50 hover:ring-amber-200 sm:p-6">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                {{-- Left: Date & Info --}}
                <div class="flex-1 space-y-3">
                    {{-- Date Badge --}}
                    <div class="flex flex-wrap items-center gap-3">
                        <div class="inline-flex items-center gap-2 rounded-lg bg-amber-50 px-3 py-1.5">
                            <svg class="h-4 w-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm font-bold text-amber-800">
                                {{ \Carbon\Carbon::parse($slot->training_date)->format('D, d F Y') }}
                            </span>
                        </div>

                        @if ($slot->start_time && $slot->end_time)
                            <div class="inline-flex items-center gap-1.5 text-sm text-slate-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ \Carbon\Carbon::parse($slot->start_time)->format('g:ia') }} –
                                {{ \Carbon\Carbon::parse($slot->end_time)->format('g:ia') }}
                            </div>
                        @endif
                    </div>

                    {{-- Location --}}
                    <div class="flex items-center gap-2 text-sm text-slate-600">
                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $slot->trainingCenter?->name }}
                    </div>

                    {{-- Price & Status --}}
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="text-2xl font-extrabold text-slate-900">${{ number_format($slot->price, 2) }}</span>

                        @if ($slot->users->count() >= 5)
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-xs font-bold text-red-600 ring-1 ring-red-200">
                                <svg class="h-3.5 w-3.5 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd" />
                                </svg>
                                Filling Fast
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-600 ring-1 ring-emerald-200">
                                <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Available
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Right: CTA --}}
                <div class="flex-shrink-0">
                    <a href="{{ route('course-enrollment.create', ['course' => $slot->course_id, 'slot' => $slot->id]) }}" class="group/btn inline-flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-600 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-emerald-600/20 transition-all duration-300 hover:bg-emerald-700 hover:shadow-xl hover:shadow-emerald-600/30 active:scale-95 sm:w-auto">
                        Enrol Now
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover/btn:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    @empty
        @if (request()->filled('course_id'))
            <div class="rounded-2xl bg-white py-16 text-center shadow-sm ring-1 ring-slate-900/5">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-slate-100">
                    <svg class="h-8 w-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="mt-4 text-lg font-semibold text-slate-900">No available slots found</h3>
                <p class="mt-1 text-sm text-slate-500">Try selecting a different course or location to see more options.</p>
            </div>
        @else
            <div class="rounded-2xl bg-white py-16 text-center shadow-sm ring-1 ring-slate-900/5">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-amber-100">
                    <svg class="h-8 w-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="mt-4 text-lg font-semibold text-slate-900">Select a course to get started</h3>
                <p class="mt-1 text-sm text-slate-500">Choose your preferred course and location above to see available training dates.</p>
            </div>
        @endif
    @endforelse
</div>
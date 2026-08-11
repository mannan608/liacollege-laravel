{{-- Search & Booking Section --}}
<section id="find" class="relative z-10 -mt-8 scroll-mt-24 bg-slate-50 pt-4 sm:pb-20 sm:pt-6 ">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">

        {{-- Search Card --}}
        <div class="overflow-hidden rounded-3xl bg-white shadow-xl shadow-slate-200/50 ring-1 ring-slate-900/5">
            {{-- Card Header --}}
            <div class="border-b border-slate-100 bg-slate-50/50 px-6 py-5 sm:px-8">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-slate-900 sm:text-xl">Find Your Course</h2>
                        <p class="text-sm text-slate-500">Select a course and location to see available dates</p>
                    </div>
                </div>
            </div>

            {{-- Filters --}}
            <div class="px-6 py-6 sm:px-8">
                <form method="GET" action="{{ route('first-aid') }}" id="courseSearchForm">
                    {{-- Add a hidden token or field if needed, but standard GET works fine --}}
                    <div class="grid gap-5 sm:grid-cols-2">
                        {{-- Course Select --}}
                        <div class="group">
                            <label for="course_id" class="mb-2 flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-amber-500 text-[10px] font-bold text-white">1</span>
                                Course
                            </label>
                            <div class="relative">
                                {{-- REMOVED onchange="this.form.submit()" --}}
                                <select name="course_id" id="course_id" class="w-full appearance-none rounded-xl border border-slate-200 bg-white py-3.5 pl-4 pr-10 text-sm font-medium text-slate-900 transition-colors duration-200 hover:border-slate-300 focus:border-amber-500 focus:outline-none focus:ring-4 focus:ring-amber-500/10 sm:text-base">
                                    <option value="">Choose a course…</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}" @selected(request('course_id') == $course->id)>
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- Location Select --}}
                        <div class="group">
                            <label for="city" class="mb-2 flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-amber-500 text-[10px] font-bold text-white">2</span>
                                Location
                            </label>
                            <div class="relative">
                                {{-- REMOVED onchange="this.form.submit()" --}}
                                <select name="city" id="city" class="w-full appearance-none rounded-xl border border-slate-200 bg-white py-3.5 pl-4 pr-10 text-sm font-medium text-slate-900 transition-colors duration-200 hover:border-slate-300 focus:border-amber-500 focus:outline-none focus:ring-4 focus:ring-amber-500/10 sm:text-base">
                                    <option value="">Choose a location…</option>
                                    <option value="__any__" @selected(request('city') === '__any__')>Any location</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->city }}" @selected(request('city') === $location->city)>
                                            {{ $location->city }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Results Section (Target for AJAX) --}}
        <div id="results-container" class="mt-8">
            {{-- Initial load includes the partial view --}}
            @include('frontend.pages.first-aid.slot-filter.course-slots')
        </div>

    </div>
</section>

{{-- AJAX Script to handle dynamic search --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('courseSearchForm');
        const resultsContainer = document.getElementById('results-container');
        const selects = form.querySelectorAll('select');

        // Listen for changes on both dropdowns
        selects.forEach(select => {
            select.addEventListener('change', function () {
                fetchResults();
            });
        });

        // Prevent normal form submission (if user presses enter)
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            fetchResults();
        });

        function fetchResults() {
            const formData = new FormData(form);
            const params = new URLSearchParams(formData).toString();
            const actionUrl = form.getAttribute('action');

            // Show a loading spinner
            resultsContainer.innerHTML = `
                <div class="flex items-center justify-center py-16">
                    <svg class="animate-spin h-10 w-10 text-amber-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            `;

            // Update the browser URL without reloading the page
            const newUrl = `${window.location.pathname}?${params}`;
            window.history.pushState({}, '', newUrl);

            // Fetch the updated HTML partial from the server
            fetch(`${actionUrl}?${params}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest', // This tells Laravel it's an AJAX request
                    'Accept': 'text/html',
                }
            })
            .then(response => response.text())
            .then(html => {
                resultsContainer.innerHTML = html;
            })
            .catch(error => {
                console.error('Error fetching results:', error);
                resultsContainer.innerHTML = '<p class="text-center text-red-500 py-10">An error occurred while loading results. Please try again.</p>';
            });
        }
    });
</script>
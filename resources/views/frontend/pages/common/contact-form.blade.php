<div id="consultation-form">
    <form class="space-y-5" action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div>
            <x-form.input-text name="name" label="Full Name" value="" placeholder="Enter Full Name..." />

        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-form.input-text name="email" label="Email" type="email" value=""
                    placeholder="Enter Email..." />
            </div>
            <div>
                <x-form.input-text name="phone" label="Phone" value="" placeholder="Enter Phone No..." />
            </div>
        </div>
        <div>
            <label class="block mb-1 text-sm font-medium text-slate-700">Qualification
                of Interest</label>
            <select name="course_id"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-300/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 appearance-none">
                <option value="">Select a course</option>

                @forelse($courses as $course)
                    <option value="{{ $course['id'] }}" {{ old('course_id') == $course['id'] ? 'selected' : '' }}>
                        {{ $course['title'] }}
                    </option>
                @empty
                    <option value="">No courses available</option>
                @endforelse
            </select>
        </div>
        <button type="submit" class="w-full bg-brand-500 text-on-primary hover:bg-brand-500  py-3.5 rounded-2xl mt-4">
            Request Information
        </button>
        <p class="text-xs text-center text-on-surface-variant/70 mt-4">By submitting, you agree to our
            Privacy Policy.</p>
    </form>
</div>


@if ($errors->any())
    <script>
        window.addEventListener('load', () => {
            document
                .getElementById('consultation-form')
                ?.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

            const firstErrorField = document.querySelector(
                '.is-invalid, [aria-invalid="true"], .border-red-500'
            );

            firstErrorField?.focus();
        });
    </script>
@endif



<div x-data="{ showModal: {{ session('success') ? 'true' : 'false' }} }">

    @if (session('success'))
        <div x-show="showModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
            style="display:none">

            <div @click.away="showModal = false" class="bg-white rounded-2xl p-8 max-w-md mx-4 text-center shadow-xl">

                <div class="mb-4">
                    <svg class="w-16 h-16 mx-auto text-green-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <h3 class="text-xl font-bold text-gray-900 mb-2">
                    Success!
                </h3>

                <p class="text-gray-600 mb-6">
                    {{ session('success') }}
                </p>

                <button @click="showModal = false" class="bg-brand-600 text-white px-6 py-2 rounded-lg">
                    Close
                </button>
            </div>
        </div>
    @endif

</div>

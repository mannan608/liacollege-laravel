@php
    // -----------------------------------------------------------------
    // Initialise state from server (old input, session, or defaults)
    // -----------------------------------------------------------------
    $initialStep = $step ?? session('eligibility_step', 1);
    $initialStep = in_array((int) $initialStep, [1, 2]) ? (int) $initialStep : 1;

    $initialData = [
        'name'            => old('name',            $data['name'] ?? ''),
        'email'           => old('email',           $data['email'] ?? ''),
        'phone'           => old('phone',           $data['phone'] ?? ''),
        'industry'        => old('industry',        $data['industry'] ?? ''),
        'qualification'   => old('qualification',   $data['qualification'] ?? ''),
        'experience_years'=> old('experience_years', $data['experience_years'] ?? ''),
        'state'           => old('state',           $data['state'] ?? ''),
        'terms_accepted'  => old('terms_accepted',  $data['terms_accepted'] ?? '') ? true : false,
    ];

    // Convert Laravel error bag to a plain array so Alpine can read it
    $serverErrors = [];
    foreach ($errors->getMessages() as $key => $messages) {
        $serverErrors[$key] = $messages;
    }
@endphp


<div
    x-data="{
        step: {{ $initialStep }},
        progress: {{ $initialStep === 1 ? 50 : 100 }},
        data: {{ json_encode($initialData) }},
        coursesByIndustry: {{ json_encode($coursesByIndustry ?? []) }},
        errors: {{ json_encode($serverErrors) }},
        loading: false,
        success: false,
        successMessage: '',

        get qualifications() {
            if (!this.data.industry || !this.coursesByIndustry[this.data.industry]) {
                return [];
            }
            return this.coursesByIndustry[this.data.industry];
        },

        /* ---------------------------------------------------------
           Step 1 – validate & advance (AJAX, no reload)
        --------------------------------------------------------- */
        async submitStep1() {
            if (this.loading) return;
            this.loading = true;
            this.errors  = {};

            try {
                const response = await fetch('{{ route('eligibility.step1.post') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        name:  this.data.name,
                        email: this.data.email,
                        phone: this.data.phone
                    })
                });

                const result = await response.json();

                if (!response.ok) {
                    if (response.status === 422) {
                        this.errors = result.errors || {};
                    } else {
                        this.errors = { general: [result.message || 'Something went wrong. Please try again.'] };
                    }
                    this.loading = false;
                    return;
                }

                this.step     = 2;
                this.progress = 100;
                this.loading  = false;

            } catch (e) {
                this.errors = { general: ['Network error. Please check your connection and try again.'] };
                this.loading = false;
            }
        },

        /* ---------------------------------------------------------
           Step 2 – submit entire payload (AJAX, no reload)
        --------------------------------------------------------- */
        async submitStep2() {
            if (this.loading) return;
            this.loading = true;
            this.errors  = {};

            try {
                const response = await fetch('{{ route('eligibility.step2.post') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        industry:         this.data.industry,
                        qualification:      this.data.qualification,
                        experience_years:   this.data.experience_years,
                        state:              this.data.state,
                        terms_accepted:     this.data.terms_accepted ? 1 : 0
                    })
                });

                const result = await response.json();

                if (!response.ok) {
                    if (response.status === 422) {
                        this.errors = result.errors || {};
                    } else {
                        this.errors = { general: [result.message || 'Something went wrong. Please try again.'] };
                    }
                    this.loading = false;
                    return;
                }

                this.success        = true;
                this.successMessage = result.message || 'Thank you! Your eligibility check has been submitted successfully.';
                this.loading        = false;

                // Optional: redirect after success
                // if (result.redirect) window.location.href = result.redirect;

            } catch (e) {
                this.errors = { general: ['Network error. Please check your connection and try again.'] };
                this.loading = false;
            }
        },

        goBack() {
            this.step     = 1;
            this.progress = 50;
            this.errors   = {};
        },

        hasError(field) {
            return this.errors[field] && this.errors[field].length > 0;
        },

        getError(field) {
            return this.hasError(field) ? this.errors[field][0] : '';
        }
    }"
    x-cloak
    class="bg-surface rounded-[20px] p-8 border border-outline-variant/30 soft-shadow"
>


    {{-- =========================================================
        Progress
    ========================================================== --}}
    <div class="mb-8">
        <div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant mb-2">
            <span>Step <span x-text="step"></span> of 2</span>
            <span><span x-text="progress"></span>% Completed</span>
        </div>

        <div class="w-full bg-surface-variant rounded-full h-2">
            <div
                class="bg-brand-500 h-2 rounded-full transition-all duration-500"
                :style="'width: ' + progress + '%'"
            ></div>
        </div>
    </div>


    {{-- =========================================================
        STEP 1  –  Name / Email / Phone
    ========================================================== --}}
    <form
        x-show="step === 1"
        x-transition
        @submit.prevent="submitStep1"
        class="space-y-6"
    >
        <div class="space-y-5">

            {{-- Full Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-on-surface mb-2">Full Name</label>
                <input
                    type="text"
                    id="name"
                    x-model="data.name"
                    placeholder="Enter Full Name..."
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                    :class="hasError('name') ? 'border-red-500' : 'border-outline-variant'"
                />
                <p x-show="hasError('name')" x-text="getError('name')" class="mt-1 text-sm text-red-500" x-cloak></p>
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-on-surface mb-2">Email</label>
                <input
                    type="email"
                    id="email"
                    x-model="data.email"
                    placeholder="Enter Email..."
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                    :class="hasError('email') ? 'border-red-500' : 'border-outline-variant'"
                />
                <p x-show="hasError('email')" x-text="getError('email')" class="mt-1 text-sm text-red-500" x-cloak></p>
            </div>

            {{-- Phone --}}
            <div>
                <label for="phone" class="block text-sm font-medium text-on-surface mb-2">Phone</label>
                <input
                    type="tel"
                    id="phone"
                    x-model="data.phone"
                    placeholder="Enter Phone No..."
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                    :class="hasError('phone') ? 'border-red-500' : 'border-outline-variant'"
                />
                <p x-show="hasError('phone')" x-text="getError('phone')" class="mt-1 text-sm text-red-500" x-cloak></p>
            </div>

        </div>

        {{-- General error --}}
        <div x-show="errors.general" x-cloak>
            <p x-text="errors.general[0]" class="text-sm text-red-500"></p>
        </div>

        {{-- Buttons --}}
        <div class="pt-4 flex justify-between items-center">
            <button
                type="button"
                disabled
                class="text-on-surface-variant hover:text-on-surface font-body-md text-sm transition-colors disabled:opacity-50 cursor-not-allowed"
            >
                Back
            </button>

            <button
                type="submit"
                :disabled="loading"
                class="bg-brand-500 text-on-primary hover:bg-brand-500-container px-8 py-3 rounded-[12px] font-body-md font-semibold hover-lift transition-colors disabled:opacity-70 disabled:cursor-not-allowed"
            >
                <span x-show="!loading">Continue</span>
                <span x-show="loading" x-cloak>Processing…</span>
            </button>
        </div>
    </form>


    {{-- =========================================================
        STEP 2  –  Industry / Qualification / Experience / State / Terms
    ========================================================== --}}
    <form
        x-show="step === 2 && !success"
        x-transition
        @submit.prevent="submitStep2"
        class="space-y-6"
        id="eligibilityForm"
    >
        <div class="space-y-5">

            {{-- Industry --}}
            <div>
                <label for="industry" class="block text-sm font-medium text-on-surface mb-2">
                    What industry is your experience in?
                    <span class="text-red-500">*</span>
                </label>

                <div class="relative">
                    <select
                        id="industry"
                        x-model="data.industry"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                        :class="hasError('industry') ? 'border-red-500' : 'border-outline-variant'"
                    >
                        <option value="">--- Select Industry ---</option>
                        @foreach($industries ?? [] as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>

                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>

                <p x-show="hasError('industry')" x-text="getError('industry')" class="mt-1 text-sm text-red-500" x-cloak></p>
            </div>


            {{-- Qualification --}}
            <div>
                <label for="qualification" class="block text-sm font-medium text-on-surface mb-2">
                    What qualification you want to obtain via RPL?
                    <span class="text-red-500">*</span>
                </label>

                <div class="relative">
                    <select
                        id="qualification"
                        x-model="data.qualification"
                        :disabled="!data.industry || qualifications.length === 0"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 disabled:opacity-50 disabled:cursor-not-allowed"
                        :class="hasError('qualification') ? 'border-red-500' : 'border-outline-variant'"
                    >
                        <option value="">--- Select Qualification ---</option>
                        <template x-if="!data.industry || qualifications.length === 0">
                            <option value="" disabled>No qualifications available for this industry</option>
                        </template>
                        <template x-for="course in qualifications" :key="course.code">
                            <option :value="course.code" x-text="`${course.title} (${course.code})`"></option>
                        </template>
                    </select>

                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>

                <p x-show="hasError('qualification')" x-text="getError('qualification')" class="mt-1 text-sm text-red-500" x-cloak></p>
            </div>


            {{-- Work Experience --}}
            <div>
                <label for="experience_years" class="block text-sm font-medium text-on-surface mb-2">
                    Your work experience?
                    <span class="text-red-500">*</span>
                </label>

                <div class="relative">
                    <input
                        type="number"
                        id="experience_years"
                        x-model="data.experience_years"
                        min="0"
                        max="50"
                        placeholder="0"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                        :class="hasError('experience_years') ? 'border-red-500' : 'border-outline-variant'"
                    />
                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm font-medium bg-surface-variant px-2 py-1 rounded-md">years</span>
                </div>

                <p x-show="hasError('experience_years')" x-text="getError('experience_years')" class="mt-1 text-sm text-red-500" x-cloak></p>
            </div>


            {{-- State --}}
            <div>
                <label for="state" class="block text-sm font-medium text-on-surface mb-2">
                    What state do you live in?
                    <span class="text-red-500">*</span>
                </label>

                <div class="relative">
                    <select
                        id="state"
                        x-model="data.state"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                        :class="hasError('state') ? 'border-red-500' : 'border-outline-variant'"
                    >
                        <option value="">What state do you live in?</option>
                        @foreach($states ?? [] as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>

                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>

                <p x-show="hasError('state')" x-text="getError('state')" class="mt-1 text-sm text-red-500" x-cloak></p>
            </div>


            {{-- Terms --}}
            <div class="flex items-start gap-3 pt-2">
                <div class="relative flex items-center">
                    <input
                        type="checkbox"
                        id="terms_accepted"
                        x-model="data.terms_accepted"
                        class="w-5 h-5 rounded border text-brand-500 focus:ring-brand-500 focus:ring-2 cursor-pointer"
                        :class="hasError('terms_accepted') ? 'border-red-500' : 'border-outline-variant'"
                    />
                </div>

                <label for="terms_accepted" class="text-sm text-on-surface-variant leading-relaxed cursor-pointer select-none">
                    I agree to the website's
                    <a href="#" class="text-brand-500 hover:underline font-medium">Terms & Conditions</a>
                    and
                    <a href="#" class="text-brand-500 hover:underline font-medium">Privacy Policy</a>.
                    I consent to STUDYIN contacting me regarding its services.
                </label>
            </div>

            <p x-show="hasError('terms_accepted')" x-text="getError('terms_accepted')" class="text-sm text-red-500 -mt-3" x-cloak></p>

        </div>


        {{-- General error --}}
        <div x-show="errors.general" x-cloak>
            <p x-text="errors.general[0]" class="text-sm text-red-500"></p>
        </div>


        {{-- Buttons --}}
        <div class="pt-4 flex justify-between items-center gap-4">
            <button
                type="button"
                @click="goBack"
                :disabled="loading"
                class="inline-flex items-center justify-center px-6 py-3 rounded-[12px] bg-gray-200 text-gray-700 hover:bg-gray-300 font-body-md font-semibold transition-all hover:shadow-md disabled:opacity-70"
            >
                Previous
            </button>

            <button
                type="submit"
                :disabled="loading"
                class="bg-brand-500 hover:bg-brand-600 text-white px-8 py-3 rounded-[12px] font-body-md font-semibold transition-all hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0 disabled:opacity-70 disabled:cursor-not-allowed"
            >
                <span x-show="!loading">Submit</span>
                <span x-show="loading" x-cloak>Submitting…</span>
            </button>
        </div>
    </form>


    {{-- =========================================================
        Success Message
    ========================================================== --}}
  <div
    x-show="success"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-x-5"
    x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-5"
    x-cloak
    class="fixed top-5 right-5 z-[9999] w-[calc(100%-2rem)] max-w-md"
>
    <div class="bg-white border border-green-200 shadow-xl rounded-xl p-5">

        <div class="flex items-start gap-4">

            <!-- Success Icon -->
            <div class="shrink-0">
                <svg
                    class="w-10 h-10 text-green-500"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>
            </div>

            <!-- Message -->
            <div class="flex-1">
                <h3 class="text-lg font-bold text-gray-900">
                    All done!
                </h3>

                <p
                    x-text="successMessage"
                    class="mt-1 text-sm text-gray-600"
                ></p>
            </div>

            <!-- Close -->
            <button
                type="button"
                @click="success = false"
                class="text-gray-400 hover:text-gray-600"
            >
                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>

        </div>

    </div>
</div>

</div>
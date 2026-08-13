<div x-data="eligibilityForm()" x-init="init()" class="w-full">
    <form x-ref="form" @submit.prevent="saveStep()" novalidate>
        @csrf

        {{-- =========================================================
            PROGRESS BAR
        ========================================================== --}}
        <div class="mb-8">
            <div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant mb-2">
                <span>
                    Step <span x-text="currentStep"></span> of
                    <span x-text="steps.length"></span>
                </span>

                <span>
                    <span x-text="progressPercentage"></span>% Completed
                </span>
            </div>

            <div class="w-full bg-surface-variant rounded-full h-2">
                <div class="bg-brand-500 h-2 rounded-full transition-all duration-500"
                    :style="'width: ' + progressPercentage + '%'"></div>
            </div>
        </div>


        {{-- =========================================================
            GLOBAL SUCCESS MESSAGE
        ========================================================== --}}
        <div x-show="successMessage" x-transition x-cloak
            class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700">
            <div class="flex items-center gap-2">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>

                <span x-text="successMessage"></span>

            </div>
        </div>      


        {{-- =========================================================
            STEP CONTENT
        ========================================================== --}}
        <div class="stepper-content">

            {{-- STEP 1 --}}
            <div x-show="currentStep === 1" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-x-5" x-transition:enter-end="opacity-100 translate-x-0"
                class="step-content">

                @include('frontend.pages.common.step-form.eligibility-step-one')

            </div>


            {{-- STEP 2 --}}
            <div x-show="currentStep === 2" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-x-5" x-transition:enter-end="opacity-100 translate-x-0"
                class="step-content">

                @include('frontend.pages.common.step-form.eligibility-step-two')

            </div>


            {{-- STEP 3 --}}
            <div x-show="currentStep === 3" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-x-5" x-transition:enter-end="opacity-100 translate-x-0"
                class="step-content">

                @include('frontend.pages.common.step-form.eligibility-step-three')

            </div>

        </div>    


        {{-- =========================================================
            NAVIGATION BUTTONS
        ========================================================== --}}
        <div class="mt-8 pt-6 border-t border-gray-200 flex items-center justify-between gap-4">

            {{-- Previous --}}
            <button type="button" @click="previousStep()" x-show="currentStep > 1" :disabled="saving"
                class="px-4 py-2 lg:px-6 lg:py-2.5 rounded-lg border border-gray-300 bg-white text-gray-700 font-medium hover:bg-gray-50 transition disabled:opacity-50">
                ← Previous
            </button>

            <div x-show="currentStep === 1"></div>


            <button type="submit" :disabled="saving"
                class="ml-auto min-w-37.5 text-sm lg:text-base bg-brand-600 text-white px-4 py-2 lg:px-6 lg:py-2.5 rounded-lg font-normal hover:bg-brand-600 transition disabled:opacity-50 disabled:cursor-not-allowed">
                <span x-show="saving" class="flex items-center justify-center gap-2">
                    <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>

                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>

                    Saving...
                </span>

                <span x-show="!saving" x-text="currentStep === steps.length ? 'Submit' : 'Save & Next'"></span>
            </button>

        </div>

    </form>


    {{-- =========================================================
        SUCCESS TOAST
    ========================================================== --}}
    <div x-show="toast" x-transition x-cloak class="fixed right-5 top-5 z-50">

        <div class="flex items-center gap-3 px-5 py-4 bg-gray-900 text-white rounded-xl shadow-xl">

            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>

            <span x-text="toast"></span>

        </div>

    </div>

</div>


<script>
document.addEventListener('alpine:init', () => {

    Alpine.data('eligibilityForm', () => ({

        steps: [
            {
                id: 1,
                name: 'Personal'
            },
            {
                id: 2,
                name: 'Language & Education'
            },
            {
                id: 3,
                name: 'Terms & Conditions'
            }
        ],
        currentStep: 1,

        applicationId: null,

        saving: false,

        errors: {},

        serverError: '',

        successMessage: '',
            hasError(field) {

        return !!(
            this.errors[field] &&
            this.errors[field].length
        );

    },


    getError(field) {

        if (!this.errors[field]) {
            return '';
        }

        return this.errors[field][0];

    },

        init() {

            this.currentStep = 1;

            this.applicationId = null;

            this.saving = false;

            this.errors = {};

            this.serverError = '';

            this.successMessage = '';

        },

        get progressPercentage() {

            if (this.steps.length <= 1) {
                return 100;
            }

            return Math.round(
                ((this.currentStep - 1) /
                    (this.steps.length - 1)) * 100
            );

        },
        previousStep() {

            if (this.saving) {
                return;
            }

            if (this.currentStep <= 1) {
                return;
            }

            this.errors = {};

            this.serverError = '';

            this.currentStep--;

        },

        async saveStep() {
            if (this.saving) {
                return;
            }
            if (!this.validateCurrentStep()) {
                return;
            }


            this.saving = true;

            this.errors = {};

            this.serverError = '';


            try {

                const formData =
                    new FormData(this.$refs.form);


                /*
                 * Current step
                 */
                formData.append(
                    'step',
                    this.currentStep
                );


                /*
                 * Existing application
                 */
                if (this.applicationId) {

                    formData.append(
                        'application_id',
                        this.applicationId
                    );

                }
                const response = await fetch(
                    '{{ route('eligibility.step.save') }}',
                    {
                        method: 'POST',

                        headers: {
                            'Accept': 'application/json'
                        },

                        body: formData
                    }
                );


                const data =
                    await response.json();


                if (response.status === 422) {

                    this.errors =
                        data.errors || {};

                    this.serverError =
                        data.message ||
                        'Please correct the errors.';

                    return;
                }

                if (!response.ok) {

                    throw new Error(
                        data.message ||
                        'Something went wrong.'
                    );

                }

                if (data.application_id) {

                    this.applicationId =
                        data.application_id;

                }

                if (
                    this.currentStep ===
                    this.steps.length
                ) {

                    this.handleFinalSuccess(data);

                    return;
                }

                this.currentStep++;

            }
            catch (error) {

                console.error(error);

                this.serverError =
                    error.message ||
                    'Unable to save your information. Please try again.';

            }
            finally {

                this.saving = false;

            }

        },

        validateCurrentStep() {

            const stepElement =
                document.getElementById(
                    `step-${this.currentStep}`
                );


            if (!stepElement) {
                return true;
            }


            const fields =
                stepElement.querySelectorAll(
                    'input, select, textarea'
                );


            for (const field of fields) {
                if (
                    field.disabled ||
                    field.type === 'hidden'
                ) {
                    continue;
                }
                if (!field.checkValidity()) {

                    field.reportValidity();

                    field.focus();

                    return false;

                }

            }


            return true;

        },


        handleFinalSuccess(data) {

            /*
             * Success message
             */
            this.successMessage =
                data.message ||
                'Your eligibility application has been submitted successfully.';


            /*
             * Clear form fields
             */
            this.$refs.form.reset();
            this.resetRplForm();
            this.applicationId = null;


            /*
             * Go back to Step 1
             */
            this.currentStep = 1;


            /*
             * Hide success message after 3.5 seconds
             */
            setTimeout(() => {

                this.successMessage = '';

            }, 3500);

        },

        resetRplForm() {

            /*
             * Find the Alpine RPL component
             */
            const rplElement =
                this.$refs.form.querySelector(
                    '[x-data^="rplForm"]'
                );


            if (!rplElement) {
                return;
            }


            /*
             * Get Alpine component
             */
            const rplComponent =
                Alpine.$data(rplElement);


            if (rplComponent) {

                rplComponent.data.industry = '';

                rplComponent.data.qualification = '';

            }

        },

        clearMessages() {

            this.errors = {};

            this.serverError = '';

        }

    }));

});
</script>

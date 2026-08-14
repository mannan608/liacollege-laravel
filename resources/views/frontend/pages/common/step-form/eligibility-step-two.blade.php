<div x-data="rplForm(@js($coursesByIndustry))">


        <div class="flex flex-col gap-3">
            {{-- Industry --}}
            <div>
                <label for="industry" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                    What industry is your experience in? *
                </label>

                <select id="industry" name="industry" x-model="data.industry" @change="data.qualification = ''"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                    <option value="">Select Industry</option>

                    @foreach ($industries as $key => $industry)
                        <option value="{{ $key }}">
                            {{ $industry }}
                        </option>
                    @endforeach
                </select>
            </div>


            {{-- Qualification --}}
            <div>

                <label for="qualification" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                    What qualification you want to obtain via RPL? *
                </label>

                <select id="qualification" name="qualification" x-model="data.qualification" :disabled="!data.industry"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 disabled:cursor-not-allowed disabled:opacity-50">

                    <option value="">
                        Select Qualification
                    </option>

                    <template x-for="course in filteredQualifications" :key="course.code">
                        <option :value="course.code" x-text="`${course.title} (${course.code})`"></option>
                    </template>

                    <template x-if="data.industry && filteredQualifications.length === 0">
                        <option value="" disabled>
                            No qualifications available
                        </option>
                    </template>

                </select>
            </div>


            {{-- Experience --}}
            <x-form.input-text name="experience_years" label="Your work experience? *" value=""
                placeholder="Enter Experience Years..." />
        </div>



</div>

<script>
    function rplForm(coursesByIndustry) {
        return {
            data: {
                industry: '',
                qualification: '',
            },

            coursesByIndustry: coursesByIndustry,

            get filteredQualifications() {
                return this.coursesByIndustry[this.data.industry] || [];
            }
        }
    }
</script>

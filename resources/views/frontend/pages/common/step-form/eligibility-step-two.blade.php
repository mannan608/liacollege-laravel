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
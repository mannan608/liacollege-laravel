<form action="">
      <x-form.select-input name="state" label="What state do you live in? *" :options="" value="" /> 


      <x-form.checkbox name="terms_accepted" label="I agree to the website's Terms & Conditions and Privacy Policy. I consent to STUDYIN contacting me regarding its services." />
     
      {{-- <div class="flex items-start gap-3 pt-2">
                <div class="relative flex items-center">
                    <input type="checkbox"
                        id="terms_accepted" class="w-5 h-5 rounded border text-brand-500 focus:ring-brand-500 focus:ring-2 cursor-pointer" />
                </div>

                <label for="terms_accepted" class="text-sm text-on-surface-variant leading-relaxed cursor-pointer select-none">
                    I agree to the website's
                    <a href="#" class="text-brand-500 hover:underline font-medium">Terms & Conditions</a>
                    and
                    <a href="#" class="text-brand-500 hover:underline font-medium">Privacy Policy</a>.
                    I consent to STUDYIN contacting me regarding its services.
                </label>
            </div>   --}}
</form>

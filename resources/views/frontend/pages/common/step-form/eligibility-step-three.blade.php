
    <div class="flex flex-col gap-6">
      <x-form.select-input name="state" label="What state do you live in? *" :options="$states ?? []"  value="" /> 
      <x-form.checkbox name="terms_accepted" label="I agree to the website's Terms & Conditions and Privacy Policy. I consent to Lia College contacting me regarding its services." />


    </div>

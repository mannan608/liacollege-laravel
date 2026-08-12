<div class="">
    <div class="stepper-wrap">
        <div class="stepper" id="stepper">
            <div class="step-item active" data-step="1" onclick="goToStep(1)">
                <div class="step-num">1</div>
                <div class="step-label">
                    <div class="step-n">Step 01</div>
                    <div class="step-name">Personal</div>
                </div>
            </div>
            <div class="step-divider"></div>
            <div class="step-item" data-step="2" onclick="goToStep(2)">
                <div class="step-num">2</div>
                <div class="step-label">
                    <div class="step-n">Step 02</div>
                    <div class="step-name">Language & Education</div>
                </div>
            </div>
            <div class="step-divider"></div>
            <div class="step-item" data-step="3" onclick="goToStep(3)">
                <div class="step-num">3</div>
                <div class="step-label">
                    <div class="step-n">Step 03</div>
                    <div class="step-name">Terms & Conditions</div>
                </div>
            </div>
        </div>
    </div>

    <div class="stepper-content">
        <div class="step-content" id="step-1">
            @include('frontend.pages.common.step-form.eligibility-step-one')
        </div>
        <div class="step-content" id="step-2">
            @include('frontend.pages.common.step-form.eligibility-step-two')
        </div>
        <div class="step-content" id="step-3">
            @include('frontend.pages.common.step-form.eligibility-step-three')
        </div>
    </div>

</div>
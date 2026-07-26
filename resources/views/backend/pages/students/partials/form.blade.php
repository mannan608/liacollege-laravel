@php
    $student ??= null;
    $user = $student?->user;
    $studentNameParts = preg_split('/\s+/', trim($user?->name ?? ''), 2);

    $selectedCourseId = old(
        'course_id',
        $selectedCourseId ?? $student?->enrollments?->first()?->slot?->course_id,
    );

    $selectedSlotId = old(
        'slot_id',
        $selectedSlotId ?? $student?->enrollments?->first()?->course_slot_id,
    );

    $selectedPaymentMethod = old(
        'payment_method',
        $selectedPaymentMethod ?? $student?->enrollments?->first()?->latestPayment?->payment_method,
    );
@endphp


    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
        <div class="grid gap-6 p-6 md:grid-cols-2">
            <div class="group">
                <label for="first_name"
                    class="mb-1.5 flex items-center gap-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
                    First Name <span class="text-red-500">*</span>
                </label>
                <input id="first_name" name="first_name" type="text" value="{{ old('first_name', $studentNameParts[0] ?? '') }}" required
                    placeholder="Enter first name"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                @error('first_name')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="group">
                <label for="last_name"
                    class="mb-1.5 flex items-center gap-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Last Name <span class="text-red-500">*</span>
                </label>
                <input id="last_name" name="last_name" type="text" value="{{ old('last_name', $studentNameParts[1] ?? '') }}" required
                    placeholder="Enter last name"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                @error('last_name')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="group">
                <label for="email"
                    class="mb-1.5 flex items-center gap-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Email Address <span class="text-red-500">*</span>
                </label>
                <input id="email" name="email" type="email" value="{{ old('email', $user?->email) }}" required
                    placeholder="student@example.com"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                @error('email')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="group">
                <label for="email_confirmation"
                    class="mb-1.5 flex items-center gap-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Confirm Email <span class="text-red-500">*</span>
                </label>
                <input id="email_confirmation" name="email_confirmation" type="email"
                    value="{{ old('email_confirmation') }}" required placeholder="Re-enter email"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
            </div>

            <div class="group">
                <label for="phone"
                    class="mb-1.5 flex items-center gap-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Phone <span class="text-red-500">*</span>
                </label>
                <input id="phone" name="phone" type="text" value="{{ old('phone', $user?->phone) }}" required
                    placeholder="Enter phone number"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                @error('phone')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="group">
                <label for="date_of_birth"
                    class="mb-1.5 flex items-center gap-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Date of Birth <span class="text-red-500">*</span>
                </label>
                <input id="date_of_birth" name="date_of_birth" type="date" value="{{ old('date_of_birth', $student?->date_of_birth ? \Illuminate\Support\Carbon::parse($student->date_of_birth)->format('Y-m-d') : '') }}" required
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                @error('date_of_birth')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="group md:col-span-2">
                <label for="usi"
                    class="mb-1.5 flex items-center gap-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
                    USI <span class="text-red-500">*</span>
                </label>
                <input id="usi" name="usi" type="text" value="{{ old('usi', $student?->usi) }}" required
                    placeholder="Enter USI"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                @error('usi')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="group">
                <label for="course_id"
                    class="mb-1.5 flex items-center gap-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Course <span class="text-red-500">*</span>
                </label>
                <select id="course_id" name="course_id" onchange="dispatchCheckoutSlotUpdate(this.value)"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                    <option value="">Select Course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" @selected((string) $selectedCourseId === (string) $course->id)>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
                @error('course_id')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div id="checkout_slot_container" class="group md:col-span-2 {{ $selectedCourseId ? '' : 'hidden' }}">
                <label for="slot_id"
                    class="mb-1.5 flex items-center gap-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Course Slot <span class="text-red-500">*</span>
                </label>
                <select id="slot_id" name="slot_id"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                    <option value="">Select Course Slot</option>
                </select>
                @error('slot_id')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="group">
                <label for="payment_method"
                    class="mb-1.5 flex items-center gap-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Payment Method <span class="text-red-500">*</span>
                </label>
                <select id="payment_method" name="payment_method" required
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                    <option value="">Select payment method</option>
                    <option value="visa" @selected($selectedPaymentMethod === 'visa')>Visa</option>
                    <option value="mastercard" @selected($selectedPaymentMethod === 'mastercard')>Mastercard</option>
                    <option value="bank_transfer" @selected($selectedPaymentMethod === 'bank_transfer')>Bank Transfer</option>
                    <option value="cash" @selected($selectedPaymentMethod === 'cash')>Cash</option>
                </select>
                @error('payment_method')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="group">
                <label for="voucher_code"
                    class="mb-1.5 flex items-center gap-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Voucher Code
                </label>
                <input id="voucher_code" name="voucher_code" type="text" value="{{ old('voucher_code') }}"
                    placeholder="Optional voucher code"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
            </div>

            <div class="group md:col-span-2">
                <label for="purchase_order_ref"
                    class="mb-1.5 flex items-center gap-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Purchase Order Ref.
                </label>
                <input id="purchase_order_ref" name="purchase_order_ref" type="text"
                    value="{{ old('purchase_order_ref') }}" placeholder="Optional purchase order reference"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-100 pt-6 dark:border-gray-700">
        <a href="{{ role_route('role.students.index') }}"
            class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
            Cancel
        </a>
        <button type="submit"
            class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-medium text-white transition-colors hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
            {{ $student ? 'Update Student' : 'Add Student' }}
        </button>
    </div>

    @push('scripts')
        <script>
            const checkoutCourseSlotsByCourse = @json($courseSlotsByCourse ?? []);
            const checkoutSelectedSlotId = @json($selectedSlotId);

            function normalizeCheckoutSlots(slots) {
                return (slots || []).map((slot) => ({
                    id: String(slot.id),
                    name: `${slot.title ?? ('Slot #' + slot.id)} (${slot.training_date} ${slot.start_time} - ${slot.end_time})`,
                }));
            }

            function dispatchCheckoutSlotUpdate(courseId) {
                const slotContainer = document.getElementById('checkout_slot_container');
                const slotSelect = document.getElementById('slot_id');

                if (!courseId) {
                    slotContainer.classList.add('hidden');
                    slotSelect.innerHTML = '<option value="">Select Course Slot</option>';
                    return;
                }

                slotContainer.classList.remove('hidden');

                const slots = normalizeCheckoutSlots(checkoutCourseSlotsByCourse[String(courseId)] || []);
                slotSelect.innerHTML = '<option value="">Select Course Slot</option>' + slots.map((slot) => (
                    `<option value="${slot.id}">${slot.name}</option>`
                )).join('');

                if (checkoutSelectedSlotId) {
                    slotSelect.value = String(checkoutSelectedSlotId);
                }
            }

            document.addEventListener('DOMContentLoaded', () => {
                const courseSelect = document.getElementById('course_id');

                if (courseSelect && courseSelect.value) {
                    dispatchCheckoutSlotUpdate(courseSelect.value);
                }
            });
        </script>
    @endpush

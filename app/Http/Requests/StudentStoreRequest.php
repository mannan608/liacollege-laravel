<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()?->can('student.create') === true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'confirmed'],
            'phone' => ['required', 'string', 'max:50'],
            'date_of_birth' => ['required', 'date'],
            'usi' => ['required', 'string', 'max:255'],
            'course_id' => ['required', 'integer', 'exists:courses,id'],
            'slot_id' => [
                'required',
                'integer',
                \Illuminate\Validation\Rule::exists('course_slots', 'id')->where(function ($query) {
                    $query->where('course_id', $this->input('course_id'));
                }),
            ],
            'payment_method' => ['required', \Illuminate\Validation\Rule::in([
                'visa',
                'mastercard',
                'bank_transfer',
                'cash',
            ])],
            'voucher_code' => ['nullable', 'string', 'max:255'],
            'purchase_order_ref' => ['nullable', 'string', 'max:255'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('student.edit') === true;
    }

    public function rules(): array
    {
        $student = $this->route('student');
        $userId = $student instanceof Student ? $student->user_id : null;

        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:191',
                'confirmed',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'phone' => ['required', 'string', 'max:50'],
            'date_of_birth' => ['required', 'date'],
            'usi' => ['required', 'string', 'max:255'],
            'course_id' => ['required', 'integer', 'exists:courses,id'],
            'slot_id' => [
                'required',
                'integer',
                Rule::exists('course_slots', 'id')->where(function ($query) {
                    $query->where('course_id', $this->input('course_id'));
                }),
            ],
            'payment_method' => [
                'required',
                Rule::in([
                    'visa',
                    'mastercard',
                    'bank_transfer',
                    'cash',
                ]),
            ],
            'voucher_code' => ['nullable', 'string', 'max:255'],
            'purchase_order_ref' => ['nullable', 'string', 'max:255'],
        ];
    }

    protected function prepareForValidation(): void
    {
        //
    }
}

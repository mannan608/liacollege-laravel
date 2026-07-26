<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'max:191', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'course_id' => ['required', 'integer', 'exists:courses,id'],
            'slot_ids' => ['nullable', 'array'],
            'slot_ids.*' => [
                'integer',
                Rule::exists('course_slots', 'id')->where(function ($query) {
                    $query->where('course_id', $this->input('course_id'));
                }),
            ],
            'courses' => ['nullable', 'array'],
            'courses.*' => ['integer', 'exists:courses,id'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('course_id') && ! $this->has('courses')) {
            $this->merge([
                'courses' => [$this->input('course_id')],
            ]);
        }

        if (! $this->has('courses')) {
            $this->merge(['courses' => []]);
        }

        if (! $this->has('slot_ids')) {
            $this->merge(['slot_ids' => []]);
        }
    }
}

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
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'max:191', Rule::unique('users', 'email')->ignore($userId)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
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

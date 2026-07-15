<?php

namespace App\Http\Requests\LMS;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCourseSlotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()?->can('course-slot.create') === true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id' => ['required', 'exists:courses,id'],
            'training_center_id' => ['required', 'exists:training_centers,id'],
            'title' => ['nullable', 'string', 'max:255'],
            'training_date' => ['required', 'date'],
            'start_time' => ['required'],
            'end_time' => ['required', 'after:start_time'],
            'capacity' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric', 'min:0'],
            'booking_open_at' => ['nullable', 'date'],
            'booking_close_at' => ['nullable', 'date'],
            'status' => ['nullable', 'in:active,inactive'],
            'notes' => ['nullable', 'string'],
            'teacher_ids' => ['required', 'array', 'min:1'],
            'teacher_ids.*' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}

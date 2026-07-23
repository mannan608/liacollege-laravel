<?php

namespace App\Http\Requests\LMS;

use App\Models\LMS\CourseSlot;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseSlotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()?->can('course-slot.edit') === true;
    }

    protected function prepareForValidation(): void
    {
        $courseSlot = $this->route('course_slot');

        if (! $courseSlot instanceof CourseSlot) {
            return;
        }

        $fallbacks = [
            'course_id' => $courseSlot->course_id,
            'training_center_id' => $courseSlot->training_center_id,
            'title' => $courseSlot->title,
            'training_date' => optional($courseSlot->training_date)->format('Y-m-d'),
            'start_time' => $courseSlot->start_time,
            'end_time' => $courseSlot->end_time,
            'capacity' => $courseSlot->capacity,
            'price' => $courseSlot->price,
            'booking_open_at' => optional($courseSlot->booking_open_at)->format('Y-m-d\TH:i'),
            'booking_close_at' => optional($courseSlot->booking_close_at)->format('Y-m-d\TH:i'),
            'status' => $courseSlot->status,
            'notes' => $courseSlot->notes,
        ];

        $this->merge(array_filter(
            $fallbacks,
            fn ($value, string $key) => ! $this->exists($key),
            ARRAY_FILTER_USE_BOTH
        ));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id' => ['sometimes', 'required', 'exists:courses,id'],
            'training_center_id' => ['sometimes', 'required', 'exists:training_centers,id'],
            'title' => ['sometimes', 'nullable', 'string', 'max:255'],
            'training_date' => ['sometimes', 'required', 'date'],
            'start_time' => ['sometimes', 'required'],
            'end_time' => ['sometimes', 'required', 'after:start_time'],
            'capacity' => ['sometimes', 'required', 'integer', 'min:1'],
            'price' => ['sometimes', 'required', 'numeric', 'min:0'],
            'booking_open_at' => ['sometimes', 'nullable', 'date'],
            'booking_close_at' => ['sometimes', 'nullable', 'date'],
            'status' => ['sometimes', 'nullable', 'in:active,inactive'],
            'notes' => ['sometimes', 'nullable', 'string'],
            'teacher_ids' => ['sometimes', 'array', 'min:1'],
            'teacher_ids.*' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}

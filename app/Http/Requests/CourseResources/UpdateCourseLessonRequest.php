<?php

namespace App\Http\Requests\CourseResources;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseLessonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('course.edit') === true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'content' => [
                'sometimes',
                'nullable',
                'string',
            ],

            'duration' => [
                'sometimes',
                'nullable',
                'integer',
                'min:0',
            ],

            'lesson_types' => [
                'sometimes',
                'nullable',
                'array',
            ],

            'lesson_types.*' => [
                'string',
                'in:video,pdf,text,mixed,quiz,assignment,link,audio,live_session',
            ],

            'status' => [
                'sometimes',
                'boolean',
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('title') ||
            $this->has('content') ||
            $this->has('duration') ||
            $this->has('lesson_types')) {

            return;
        }

        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {

            $this->merge([
                'status' => $this->boolean('status'),
            ]);
        }
    }
}
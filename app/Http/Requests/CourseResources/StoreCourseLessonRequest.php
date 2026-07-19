<?php

namespace App\Http\Requests\CourseResources;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCourseLessonRequest extends FormRequest
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
                'required',
                'string',
                'max:255',
            ],

            'content' => [
                'nullable',
                'string',
            ],

            'duration' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'lesson_types' => [
                'nullable',
                'array',
            ],

            'lesson_types.*' => [
                'string',
                'in:video,pdf,text,mixed,quiz,assignment,link,audio,live_session',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'lesson_types' => $this->input('lesson_types', []),
        ]);
    }
}
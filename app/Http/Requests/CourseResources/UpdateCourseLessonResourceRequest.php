<?php

namespace App\Http\Requests\CourseResources;

use App\Models\CourseResources\LessonResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseLessonResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('course.edit') === true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'resource_type' => [
                'sometimes',
                'required',
                Rule::in(LessonResource::RESOURCE_TYPES),
            ],

            'description' => [
                'sometimes',
                'nullable',
                'string',
            ],

            'url' => [
                'sometimes',
                'nullable',
                'url',
            ],

            'file' => [
                'sometimes',
                'nullable',
                'file',
                'mimes:pdf,doc,docx,ppt,pptx',
                'max:20480',
            ],

            'quiz_id' => [
                'sometimes',
                'nullable',
                'integer',
                'in:1,2,3',
            ],

            'status' => [
                'sometimes',
                'boolean',
            ],
        ];
    }
}
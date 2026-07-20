<?php

namespace App\Http\Requests\CourseResources;

use App\Models\CourseResources\LessonResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCourseLessonResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('course.edit') === true;
    }

    public function rules(): array
    {
        return [

            'resources' => [
                'required',
                'array',
                'min:1',
            ],

            'resources.*.title' => [
                'required',
                'string',
                'max:255',
            ],

            'resources.*.resource_type' => [
                'required',
                Rule::in(
                    LessonResource::RESOURCE_TYPES
                ),
            ],

            'resources.*.status' => [
                'nullable',
                'boolean',
            ],

            'resources.*.url' => [
                'nullable',
                'required_if:resources.*.resource_type,video',
                'string',
                'max:2048',
                'url',
            ],

            'resources.*.description' => [
                'nullable',
                'required_if:resources.*.resource_type,content',
                'string',
            ],

            'resources.*.file' => [
                'nullable',
                'required_if:resources.*.resource_type,file',
                'file',
                'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip',
                'max:51200',
            ],

            'resources.*.quiz_id' => [
                'nullable',
                'required_if:resources.*.resource_type,quiz',
                'integer',
                'min:1',
            ],

        ];
    }
}

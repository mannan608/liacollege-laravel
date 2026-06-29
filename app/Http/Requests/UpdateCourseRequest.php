<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $courseId = $this->route('course')?->id ?? $this->route('course');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'code' => [
                'nullable',
                'string',
                'max:100',
            ],

            'cricos' => [
                'nullable',
                'string',
                'max:100',
            ],

            'price' => [
                'nullable',
                'numeric',
                'min:0',
                'max:99999999.99',
            ],

            'discount_percentage' => [
                'nullable',
                'integer',
                'between:0,100',
            ],

            'status' => [
                'nullable',
                'in:active,inactive',
            ],

            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'course_material' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar',
                'max:51200',
            ],

            'overview' => [
                'nullable',
                'string',
            ],

            'entry_requirements' => [
                'nullable',
                'string',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'category_id' => [
                'nullable',
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'price' => $this->price ?: 0,
            'discount_percentage' => $this->discount_percentage ?: 0,
        ]);
    }

    public function messages(): array
    {
        return (new StoreCourseRequest())->messages();
    }

    public function attributes(): array
    {
        return (new StoreCourseRequest())->attributes();
    }
}
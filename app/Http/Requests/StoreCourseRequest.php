<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
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
                'max:5120', // 5MB
            ],

            'course_material' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar',
                'max:51200', // 50MB
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
            'status' => $this->status ?: 'active',
        ]);
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Course name is required.',
            'name.max' => 'Course name cannot exceed 255 characters.',

            'slug.required' => 'Slug is required.',
            'slug.unique' => 'This slug already exists.',
            'slug.alpha_dash' => 'Slug may only contain letters, numbers, dashes and underscores.',

            'price.numeric' => 'Price must be a valid number.',
            'price.min' => 'Price cannot be negative.',

            'discount_percentage.integer' => 'Discount must be a whole number.',
            'discount_percentage.between' => 'Discount must be between 0 and 100.',

            'thumbnail.image' => 'Thumbnail must be an image.',
            'thumbnail.mimes' => 'Thumbnail must be JPG, JPEG, PNG or WEBP.',
            'thumbnail.max' => 'Thumbnail size cannot exceed 5MB.',

            'course_material.file' => 'Course material must be a valid file.',
            'course_material.mimes' => 'Allowed files: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, ZIP, RAR.',
            'course_material.max' => 'Course material size cannot exceed 50MB.',

            'category_id.exists' => 'Selected category is invalid.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'course name',
            'code' => 'course code',
            'cricos' => 'CRICOS code',
            'slug' => 'slug',
            'price' => 'price',
            'discount_percentage' => 'discount percentage',
            'thumbnail' => 'thumbnail',
            'course_material' => 'course material',
            'category_id' => 'category',
            'overview' => 'overview',
            'entry_requirements' => 'entry requirements',
            'description' => 'description',
        ];
    }
}

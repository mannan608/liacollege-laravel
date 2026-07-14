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
        $courseId = $this->route('course')->id;

        return [

            'course_category_id' => [
                'sometimes',
                'exists:course_categories,id'
            ],

            'name' => [
                'sometimes',
                'string',
                'max:255'
            ],

            'code' => [
                'sometimes',
                'nullable',
                'string',
                'max:100'
            ],

            'cricos' => [
                'sometimes',
                'nullable',
                'string',
                'max:100'
            ],

            'slug' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('courses', 'slug')
                    ->ignore($courseId)
            ],

            'description' => [
                'sometimes',
                'nullable',
                'string'
            ],

            'price' => [
                'sometimes',
                'nullable',
                'numeric',
                'min:0'
            ],

            'duration' => [
                'sometimes',
                'nullable',
                'string',
                'max:255'
            ],

            'includes_cpr' => [
                'sometimes',
                'boolean'
            ],

            'thumbnail' => [
                'sometimes',
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'status' => [
                'sometimes',
                'in:active,inactive'
            ],


            'includes' => [
                'sometimes',
                'array'
            ],

            'includes.*' => [
                'required',
                'string',
                'max:255'
            ],
        ];
    }
}
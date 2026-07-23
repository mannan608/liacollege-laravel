<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('course.create') === true;
    }

    public function rules(): array
    {
        return [

            'course_category_id' => [
                'required',
                'exists:course_categories,id'
            ],

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'code' => [
                'nullable',
                'string',
                'max:100'
            ],

            'cricos' => [
                'nullable',
                'string',
                'max:100'
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:courses,slug'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'price' => [
                'nullable',
                'numeric',
                'min:0'
            ],

            'duration' => [
                'nullable',
                'string',
                'max:255'
            ],

            'includes_cpr' => [
                'nullable',
                'boolean'
            ],

            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'status' => [
                'nullable',
                'in:active,inactive'
            ],

            'includes' => [
                'nullable',
                'array'
            ],

            'includes.*.title' => [
                'nullable',
                'string',
                'max:255'
            ],
        ];
    }
}

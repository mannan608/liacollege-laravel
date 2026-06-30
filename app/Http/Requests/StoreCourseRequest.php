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

            'name' => ['required', 'string'],

            'sections' => ['required', 'array'],

            'sections.*.section_name' => [
                'required',
                'string'
            ],

            'sections.*.field_types' => [
                'required',
                'array'
            ],

            'sections.*.rows' => [
                'required',
                'array'
            ],

            'sections.*.rows.*.text' => [
                'nullable',
                'string'
            ],

            'sections.*.rows.*.file' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,jpg,png',
                'max:20480'
            ],
        ];
    }
}

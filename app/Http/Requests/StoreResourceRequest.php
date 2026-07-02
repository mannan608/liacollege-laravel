<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('course.edit') === true;
    }

    public function rules(): array
    {
        return [
            'sections' => ['required', 'array'],

            'sections.*.section_name' => [
                'required',
                'string',
                'max:191',
            ],

            'sections.*.field_types' => [
                'required',
                'array',
            ],

            'sections.*.field_types.*' => [
                'required',
                Rule::in(['text', 'file', 'checkbox', 'radio']),
            ],

            'sections.*.rows' => [
                'required',
                'array',
            ],

            'sections.*.rows.*.text' => [
                'nullable',
                'string',
            ],

            'sections.*.rows.*.file' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,jpg,png',
                'max:20480',
            ],

            'sections.*.rows.*.existing_file' => [
                'nullable',
                'string',
                'max:255',
            ],

            'sections.*.rows.*.checkbox' => [
                'nullable',
                'string',
            ],

            'sections.*.rows.*.radio' => [
                'nullable',
                'string',
            ],

            'sections.*.rows.*.is_downloadable' => [
                'nullable',
                'boolean',
            ],

            'sections.*.rows.*.is_document_submission' => [
                'nullable',
                'boolean',
            ],
        ];
    }
}

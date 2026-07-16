<?php

namespace App\Http\Requests\LMS;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreModuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()?->can('modules.create') === true
            || $this->user()?->can('modules.edit') === true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
   public function rules(): array
{
    return [
        'course_id' => ['required', 'exists:courses,id'],
        
        'modules' => [
            'required',
            'array'
        ],

        'modules.*.title' => [
            'required',
            'string',
            'max:255'
        ],

        'modules.*.lessons' => [
            'required',
            'array'
        ],

        'modules.*.lessons.*.title' => [
            'required',
            'string',
            'max:255'
        ],

        'modules.*.lessons.*.content' => [
            'nullable',
            'string'
        ],

        'modules.*.lessons.*.duration' => [
            'nullable',
            'integer',
            'min:0'
        ],

        // Changed: now accepts array of types
        'modules.*.lessons.*.lesson_types' => [
            'required',
            'array',
            'min:1'
        ],

        // Validate each item in the array
        'modules.*.lessons.*.lesson_types.*' => [
            'required',
            'string',
            'in:video,pdf,text,mixed,quiz,assignment,link'
        ],
    ];
}
}

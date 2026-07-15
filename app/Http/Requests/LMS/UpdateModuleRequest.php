<?php

namespace App\Http\Requests\LMS;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateModuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        return $this->user()?->can('modules.edit') === true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       $moduleId = $this->route('module');

        return [
            'course_id'   => ['sometimes', 'required', 'exists:courses,id'],
            'title'       => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['sometimes', 'nullable', 'string'],
            'sort_order'  => ['sometimes', 'nullable', 'integer', 'min:0'],
        ];
    }
}

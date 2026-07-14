<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainingCenterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        return $this->user()?->can('training-center.edit') === true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name' => ['sometimes', 'string', 'max:255'],

        'address' => ['sometimes', 'nullable', 'string'],

        'city' => ['sometimes', 'nullable', 'string', 'max:100'],
        'state' => ['sometimes', 'nullable', 'string', 'max:100'],
        'postcode' => ['sometimes', 'nullable', 'string', 'max:30'],
        'country' => ['sometimes', 'nullable', 'string', 'max:100'],

        'phone' => ['sometimes', 'nullable', 'string', 'max:30'],

        'email' => ['sometimes', 'nullable', 'email', 'max:255'],

        'latitude' => ['sometimes', 'nullable', 'numeric', 'between:-90,90'],

        'longitude' => ['sometimes', 'nullable', 'numeric', 'between:-180,180'],

        'status' => ['sometimes', 'boolean'],
    ];
    }
}

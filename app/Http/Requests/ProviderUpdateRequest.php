<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ProviderUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id'          => ['required', 'integer', 'exists:users,id'],
            'institution_name' => ['required', 'string', 'max:255'],
            'campus'           => ['nullable', 'string', 'max:255'],
            'phone'            => ['nullable', 'string', 'max:50'],
            'country'          => ['nullable', 'string', 'max:100'],
            'state'            => ['nullable', 'string', 'max:100'],
            'city'             => ['nullable', 'string', 'max:100'],
            'address'          => ['nullable', 'string'],
            'description'      => ['nullable', 'string'],

        ];
    }
}
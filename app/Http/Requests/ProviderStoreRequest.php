<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('provider.create') === true;
    }

    public function rules(): array
    {
        return [
           // Core fields
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


    public function messages(): array
    {
        return [
            'user_id.exists'          => 'The selected user does not exist.',
            'university_ids.*.exists' => 'One or more selected universities are invalid.',
            'campus_ids.*.exists'     => 'One or more selected campuses are invalid.',
            'course_ids.*.exists'     => 'One or more selected courses are invalid.',
        ];
    }

   
}

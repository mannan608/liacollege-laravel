<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $allRules = [
            // Identity
            'title'                        => ['nullable', 'string', 'max:20'],
            'first_name'                   => ['required', 'string', 'max:100'],
            'middle_name'                  => ['nullable', 'string', 'max:100'],
            'last_name'                    => ['required', 'string', 'max:100'],
            'name_commonly_known_as'       => ['nullable', 'string', 'max:100'],
            'gender'                       => ['required', Rule::in(['female', 'male', 'other', 'not-stated'])],
            'date_of_birth'                => ['required', 'date', 'before:today'],
            'country_of_birth'             => ['required', 'string', 'max:100'],
            'city_of_birth'                => ['required', 'string', 'max:100'],
            'usi'                          => ['required', 'string', 'max:50'],
            'indigenous_status'            => ['required', Rule::in([
                'not-aboriginal', 'aboriginal', 'torres-strait-islander',
                'both', 'not-stated'
            ])],
            'citizenship_status'           => ['required', Rule::in([
                'australian', 'permanent-resident', 'temporary-resident',
                'new-zealand', 'not-stated'
            ])],
            'main_language_spoken_at_home' => ['required', 'string', 'max:50'],
            'has_disability'               => ['required', 'boolean'],
            'disability_description'       => ['nullable', 'required_if:has_disability,true', 'string', 'max:2000'],

            // Contact
            'email'                        => ['required', 'email', 'max:255'],
            'alternate_email'              => ['nullable', 'email', 'max:255'],
            'home_phone_country'           => ['nullable', 'string', 'max:10'],
            'home_phone'                   => ['nullable', 'string', 'max:50'],
            'work_phone_country'           => ['nullable', 'string', 'max:10'],
            'work_phone'                   => ['nullable', 'string', 'max:50'],
            'mobile_phone_country'         => ['nullable', 'string', 'max:10'],
            'mobile_phone'                 => ['nullable', 'string', 'max:50'],

            // Residential Address
            'residential_unit_no'          => ['nullable', 'string', 'max:20'],
            'residential_building_name'    => ['nullable', 'string', 'max:100'],
            'residential_street_no'        => ['nullable', 'string', 'max:20'],
            'residential_street_name'      => ['required', 'string', 'max:100'],
            'residential_city'             => ['required', 'string', 'max:100'],
            'residential_state'            => ['required', 'string', 'max:100'],
            'residential_post_code'        => ['required', 'string', 'max:20'],
            'residential_country'          => ['required', 'string', 'max:100'],

            // Postal Address
            'postal_same_as_residential'   => ['required', 'boolean'],
            'postal_unit_no'               => ['nullable', 'required_if:postal_same_as_residential,false', 'string', 'max:20'],
            'postal_building_name'         => ['nullable', 'string', 'max:100'],
            'postal_street_no'             => ['nullable', 'string', 'max:20'],
            'postal_street_name'           => ['nullable', 'required_if:postal_same_as_residential,false', 'string', 'max:100'],
            'postal_po_box'                => ['nullable', 'string', 'max:50'],
            'postal_city'                  => ['nullable', 'required_if:postal_same_as_residential,false', 'string', 'max:100'],
            'postal_state'                 => ['nullable', 'required_if:postal_same_as_residential,false', 'string', 'max:100'],
            'postal_post_code'             => ['nullable', 'required_if:postal_same_as_residential,false', 'string', 'max:20'],
            'postal_country'               => ['nullable', 'required_if:postal_same_as_residential,false', 'string', 'max:100'],

            // Education & Employment
            'attending_secondary_school'   => ['nullable', 'boolean'],
            'school_type'                  => ['nullable', 'required_if:attending_secondary_school,true', Rule::in([
                'Government School', 'Non-Government School', 'Home Schooling'
            ])],
            'highest_school_level'         => ['nullable', Rule::in([
                'Never attended school', 'Year 8 or below', 'Completed Year 9',
                'Completed Year 10', 'Completed Year 11', 'Completed year 12'
            ])],
            'school_completion_year'       => ['nullable', 'string', 'max:10'],
            'qualifications_completed'     => ['nullable', 'array'],
            'qualifications_completed.*'   => ['string', 'max:100'],
            'employment_status'            => ['nullable', Rule::in([
                'Full-time employee', 'Part-time employee', 'Self-employed',
                'Employer', 'Unemployed - seeking full-time work',
                'Unemployed - seeking part-time work', 'Not employed - not seeking employment'
            ])],
            'industry'                     => ['nullable', 'string', 'max:100'],
            'occupation_category'          => ['nullable', 'string', 'max:100'],
            'reason_for_course'            => ['nullable', Rule::in([
                'To get a job', 'To develop my existing business', 'To start my own business',
                'To try for a different career', 'To get a better job or promotion',
                'I wanted extra skills for my job', 'For personal interest or self-development',
                'To get into another course of study', 'Other reasons'
            ])],
            'ncver_consent'                => ['required', 'boolean', 'accepted'],
        ];

        // Only validate fields that are actually present in the request
        return array_intersect_key($allRules, $this->all());
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'has_disability'             => filter_var($this->input('has_disability'), FILTER_VALIDATE_BOOLEAN) ?? false,
            'postal_same_as_residential' => filter_var($this->input('postal_same_as_residential'), FILTER_VALIDATE_BOOLEAN) ?? false,
            'attending_secondary_school' => $this->has('attending_secondary_school')
                ? filter_var($this->input('attending_secondary_school'), FILTER_VALIDATE_BOOLEAN)
                : null,
            'ncver_consent'              => filter_var($this->input('ncver_consent'), FILTER_VALIDATE_BOOLEAN) ?? false,
        ]);
    }

    public function attributes(): array
    {
        return [
            'usi'                        => 'Unique Student Identifier',
            'name_commonly_known_as'     => 'name commonly known as',
            'residential_street_name'    => 'street name',
            'residential_city'           => 'city or suburb',
            'residential_state'          => 'state',
            'residential_post_code'      => 'post code',
            'postal_same_as_residential' => 'postal same as residential',
            'ncver_consent'              => 'NCVER survey consent',
        ];
    }
}
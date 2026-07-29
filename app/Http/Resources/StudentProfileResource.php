<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => [
                'id' => $this->user?->id,
                'name' => $this->user?->name,
                'email' => $this->user?->email,
                'avatar' => $this->user?->avatar,
            ],
            
            // Identity
            'identity' => [
                'title' => $this->title,
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'full_name' => $this->full_name,
                'name_commonly_known_as' => $this->name_commonly_known_as,
                'gender' => $this->gender,
                'date_of_birth' => $this->date_of_birth?->format('d/m/Y'),
                'country_of_birth' => $this->country_of_birth,
                'city_of_birth' => $this->city_of_birth,
                'usi' => $this->usi,
                'indigenous_status' => $this->indigenous_status,
                'citizenship_status' => $this->citizenship_status,
                'main_language_spoken_at_home' => $this->main_language_spoken_at_home,
                'has_disability' => $this->has_disability,
                'disability_description' => $this->disability_description,
            ],
            
            // Contact
            'contact' => [
                'email' => $this->user?->email,
                'alternate_email' => $this->alternate_email,
                'home_phone' => $this->formatPhone($this->home_phone_country, $this->home_phone),
                'work_phone' => $this->formatPhone($this->work_phone_country, $this->work_phone),
                'mobile_phone' => $this->formatPhone($this->mobile_phone_country, $this->mobile_phone),
            ],
            
            // Addresses
            'addresses' => [
                'residential' => [
                    'unit_no' => $this->residential_unit_no,
                    'building_name' => $this->residential_building_name,
                    'street_no' => $this->residential_street_no,
                    'street_name' => $this->residential_street_name,
                    'city' => $this->residential_city,
                    'state' => $this->residential_state,
                    'post_code' => $this->residential_post_code,
                    'country' => $this->residential_country,
                    'full_address' => $this->residential_address,
                ],
                'postal' => [
                    'same_as_residential' => $this->postal_same_as_residential,
                    'unit_no' => $this->postal_unit_no,
                    'building_name' => $this->postal_building_name,
                    'street_no' => $this->postal_street_no,
                    'street_name' => $this->postal_street_name,
                    'po_box' => $this->postal_po_box,
                    'city' => $this->postal_city,
                    'state' => $this->postal_state,
                    'post_code' => $this->postal_post_code,
                    'country' => $this->postal_country,
                    'full_address' => $this->postal_address,
                ],
            ],
            
            // Education & Employment
            'education_employment' => [
                'attending_secondary_school' => $this->attending_secondary_school,
                'school_type' => $this->school_type,
                'highest_school_level' => $this->highest_school_level,
                'school_completion_year' => $this->school_completion_year,
                'qualifications_completed' => $this->qualifications_completed,
                'employment_status' => $this->employment_status,
                'industry' => $this->industry,
                'occupation_category' => $this->occupation_category,
                'reason_for_course' => $this->reason_for_course,
                'ncver_consent' => $this->ncver_consent,
            ],
            
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }

    private function formatPhone(?string $country, ?string $number): ?string
    {
        if (empty($number)) {
            return null;
        }

        return $country ? "{$country} {$number}" : $number;
    }
}
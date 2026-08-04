<?php

namespace App\Models;

use App\Models\LMS\Enrollment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    // use SoftDeletes;

     protected $fillable = [
        'user_id',
        'date_of_birth',
        'usi',
        // Identity
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'name_commonly_known_as',
        'gender',
        'country_of_birth',
        'city_of_birth',
        'indigenous_status',
        'citizenship_status',
        'main_language_spoken_at_home',
        'has_disability',
        'disability_description',
        // Contact
        'alternate_email',
        'home_phone_country',
        'home_phone',
        'work_phone_country',
        'work_phone',
        'mobile_phone_country',
        'mobile_phone',
        // Residential Address
        'residential_unit_no',
        'residential_building_name',
        'residential_street_no',
        'residential_street_name',
        'residential_city',
        'residential_state',
        'residential_post_code',
        'residential_country',
        // Postal Address
        'postal_same_as_residential',
        'postal_unit_no',
        'postal_building_name',
        'postal_street_no',
        'postal_street_name',
        'postal_po_box',
        'postal_city',
        'postal_state',
        'postal_post_code',
        'postal_country',
        // Education & Employment
        'attending_secondary_school',
        'school_type',
        'highest_school_level',
        'school_completion_year',
        'qualifications_completed',
        'employment_status',
        'industry',
        'occupation_category',
        'reason_for_course',
        'ncver_consent',
    ];

  protected $casts = [

    'date_of_birth' => 'date',
    'has_disability' => 'boolean',
    'postal_same_as_residential' => 'boolean',
    'attending_secondary_school' => 'boolean',
    'ncver_consent' => 'boolean',
    'qualifications_completed' => 'array',

];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(
            Course::class,
            'enroll_course',
            'student_id',
            'course_id',

        );
    }

    public function assignmentSubmissions(): HasMany
    {
        return $this->hasMany(AssignmentSubmission::class);
    }

    public function enrollments()
{
    return $this->hasMany(Enrollment::class);
}
public function documents()
{
    return $this->morphMany(Document::class, 'documentable');
}

}

<?php
// app/Models/EligibilitySubmission.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EligibilitySubmission extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'industry',
        'qualification',
        'experience_years',
        'state',
        'terms_accepted',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'terms_accepted' => 'boolean',
    ];

    public const STATUSES = ['pending', 'reviewed', 'contacted', 'rejected'];

    public const INDUSTRIES = [
        'health-community' => 'Health and Community Services',
        'business-management' => 'Business and Management',
        'education' => 'Education',
        'construction' => 'Construction',
        'it' => 'Information Technology',
    ];

    public const STATES = [
        'nsw' => 'New South Wales',
        'vic' => 'Victoria',
        'qld' => 'Queensland',
        'wa' => 'Western Australia',
        'sa' => 'South Australia',
        'tas' => 'Tasmania',
        'act' => 'Australian Capital Territory',
        'nt' => 'Northern Territory',
    ];
}
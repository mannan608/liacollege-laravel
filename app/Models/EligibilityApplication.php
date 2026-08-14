<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EligibilityApplication extends Model
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
        'current_step',
        'status',
    ];

    protected $casts = [
        'terms_accepted' => 'boolean',
        'experience_years' => 'integer',
        'current_step' => 'integer',
    ];
}
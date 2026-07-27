<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormalComplaint extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'auth_disclosure',
        'auth_terms',
        'contacted',
        'complaint_types',
        'recognised_code',
        'course_title',
        'year_enrolled',
        'services_description',
        'complaint_description',
        'resolution_attempts',
        'additional_information',
        'desired_outcome',
        'declarant_name',
        'submission_date',
        'status',
        'admin_notes',
    ];

    protected function casts(): array
    {
        return [
            'auth_disclosure' => 'boolean',
            'auth_terms' => 'boolean',
            'complaint_types' => 'array',
            'submission_date' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

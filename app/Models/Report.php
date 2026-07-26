<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'authorisation',
        'contacted',
        'issue_types',
        'recognised_code',
        'course_title',
        'year_enrolled',
        'question_id',
        'description',
        'status',
        'admin_notes',
    ];

    protected function casts(): array
    {
        return [
            'authorisation' => 'boolean',
            'issue_types' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

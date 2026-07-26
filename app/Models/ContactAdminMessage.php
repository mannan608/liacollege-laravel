<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactAdminMessage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'message',
        'recognised_code',
        'course_title',
        'year_enrolled',
        'status',
        'admin_notes',
        'admin_reply',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

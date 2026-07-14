<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
   protected $fillable = [

        'user_id',
        'user_name',

        'action',
        'module',

        'record_id',
        'record_type',

        'description',

        'old_values',
        'new_values',

        'url',
        'method',

        'ip_address',
        'user_agent',

        'browser',
        'platform',
        'device_type',

        'status'
    ];

    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
    ];
}

<?php

namespace App\Models;

use App\Models\LMS\CourseSlot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingCenter extends Model
{
   use SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'address',
        'city',
        'state',
        'postcode',
        'country',
        'phone',
        'email',
        'latitude',
        'longitude',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
    public function slots()
{
    return $this->hasMany(CourseSlot::class);
}
}

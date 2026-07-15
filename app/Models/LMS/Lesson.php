<?php

namespace App\Models\LMS;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
   use SoftDeletes;

    protected $fillable = [
        'module_id',
        'title',
        'content',
        'lesson_type',
        'duration',       
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'duration' => 'integer',
    ];

 
    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    // public function resources(): HasMany
    // {
    //     return $this->hasMany(LessonResource::class);
    // }
}

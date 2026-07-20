<?php

namespace App\Models\CourseResources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonResourceSection extends Model
{
     protected $fillable = [

        'lesson_id',
        'title',
        'resource_type',
        'sort_order',
        'status'

    ];

    protected $casts = [
        'sort_order' => 'integer',
        'status' => 'boolean',
    ];

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function resources(): HasMany
    {
        return $this->hasMany(LessonResource::class)
            ->orderBy('sort_order');
    }
   
}

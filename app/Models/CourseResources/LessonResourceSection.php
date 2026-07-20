<?php

namespace App\Models\CourseResources;

use Illuminate\Database\Eloquent\Model;
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

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function resources()
    {
        return $this->hasMany(LessonResource::class)
            ->orderBy('sort_order');
    }
   
}

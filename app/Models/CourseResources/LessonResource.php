<?php

namespace App\Models\CourseResources;

use App\Models\LMS\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonResource extends Model
{
    protected $fillable = [
        'lesson_id',
        'title',
        'resource_type',
        'description',
        'url',
        'file_path',
        'quiz_id',
        'sort_order',
        'status',
    ];

   
}

<?php

namespace App\Models\CourseResources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonResource extends Model
{
   protected $fillable = [

        'lesson_resource_section_id',
        'title',
        'description',
        'url',
        'file_path',
        // 'quiz_id',
        'duration',
        'sort_order',
        'status'

    ];

    public function section()
    {
        return $this->belongsTo(LessonResourceSection::class);
    }

    // public function quiz()
    // {
    //     return $this->belongsTo(Quiz::class);
    // }
   
}

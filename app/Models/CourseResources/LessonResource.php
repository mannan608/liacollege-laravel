<?php

namespace App\Models\CourseResources;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonResource extends Model
{
    public const RESOURCE_TYPES = [
        'video',
        'content',
        'file',
        'quiz',
    ];

    protected $fillable = [

        'lesson_resource_section_id',
        'title',
        'description',
        'url',
        'file_path',
        'quiz_id',
        'duration',
        'sort_order',
        'status'

    ];

    protected $casts = [
        'quiz_id' => 'integer',
        'duration' => 'integer',
        'sort_order' => 'integer',
        'status' => 'boolean',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(LessonResourceSection::class);
    }
    public function quiz()
{
    return $this->belongsTo(Quiz::class);
}
}

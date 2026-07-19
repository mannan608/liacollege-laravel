<?php

namespace App\Models\CourseResources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonResource extends Model
{
    public const RESOURCE_TYPES = ['video', 'content', 'file', 'quiz'];

    protected $fillable = [
        'lesson_id',
        'title',
        'resource_type',
        'description',
        'url',
        'file_path',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'status' => 'boolean',
    ];

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function getFileUrlAttribute(): ?string
    {
        return $this->file_path
            ? asset('storage/' . ltrim($this->file_path, '/'))
            : null;
    }
}

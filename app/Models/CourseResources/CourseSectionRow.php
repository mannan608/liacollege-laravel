<?php

namespace App\Models\CourseResources;

use App\Models\CourseResources\CourseSection;

use Illuminate\Database\Eloquent\Model;

class CourseSectionRow extends Model
{
    protected $fillable = [
        'course_section_id',
        'data',
        'is_downloadable',
        'is_document_submission',
    ];

    protected $casts = [
        'data' => 'array',
        'is_downloadable' => 'boolean',
        'is_document_submission' => 'boolean',
    ];

    public function section()
    {
        return $this->belongsTo(CourseSection::class);
    }
}
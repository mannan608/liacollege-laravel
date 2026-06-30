<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSectionRow extends Model
{
    protected $fillable = [
        'course_section_id',
        'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    public function section()
    {
        return $this->belongsTo(CourseSection::class);
    }
}
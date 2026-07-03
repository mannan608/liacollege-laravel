<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AssignmentSubmission extends Model
{

    protected $fillable = [
        'student_id',
        'course_section_row_id',
        'file',
    ];

    protected $casts = [
        'file' => 'string',
    ];

    public function courseSectionRow()
{
    return $this->belongsTo(
        CourseSectionRow::class,
        'course_section_row_id'
    );
}
}

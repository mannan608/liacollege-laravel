<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursePermissions extends Model
{
 protected $fillable = [
        'student_id',
        'course_id',
        'section_id',
        'row_id',
    ];

    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function section()
    {
        return $this->belongsTo(CourseSection::class);
    }

    public function row()
    {
        return $this->belongsTo(CourseSectionRow::class);
    }
}
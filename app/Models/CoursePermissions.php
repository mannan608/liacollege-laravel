<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CoursePermissions extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'section_id',
        'row_id',
        'doc_permissions',
    ];

    protected $casts = [
        'doc_permissions' => 'array',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(CourseSection::class);
    }

    public function row(): BelongsTo
    {
        return $this->belongsTo(CourseSectionRow::class);
    }
}

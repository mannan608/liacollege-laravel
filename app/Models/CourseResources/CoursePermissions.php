<?php

namespace App\Models\CourseResources;

use App\Models\Course;
use App\Models\CourseContentCategory;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CoursePermissions extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'course_content_category_id',
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

    public function contentcategory(): BelongsTo
    {
        return $this->belongsTo(CourseContentCategory::class, 'course_content_category_id');
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

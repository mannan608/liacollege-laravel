<?php

namespace App\Models\CourseResources;

use App\Models\CourseContentCategory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    protected $fillable = [
        'course_content_category_id',
        'section_name',
        'field_types'
    ];

    protected $casts = [
        'field_types' => 'array'
    ];

    // public function course()
    // {
    //     return $this->belongsTo(Course::class);
    // }
public function category()
{
    return $this->belongsTo(
        CourseContentCategory::class,
        'course_content_category_id'
    );
}

    public function rows()
    {
        return $this->hasMany(CourseSectionRow::class);
    }
  
}
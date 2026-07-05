<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    protected $fillable = [
        'course_category_id',
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
        CourseCategory::class,
        'course_category_id'
    );
}

    public function rows()
    {
        return $this->hasMany(CourseSectionRow::class);
    }
  
}
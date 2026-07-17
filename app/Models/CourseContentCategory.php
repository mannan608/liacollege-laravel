<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseContentCategory extends Model
{
    protected $fillable = [
        'course_id',
        'name',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

public function sections()
{
    return $this->hasMany(
        CourseSection::class,
        'course_content_category_id'
    );
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseInclude extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'sort_order',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
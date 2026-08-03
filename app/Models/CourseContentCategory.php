<?php

namespace App\Models;

use App\Models\CourseResources\CourseSection;
use App\Models\CourseResources\CoursePermissions;
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
    return $this->hasMany(CourseSection::class)
        ->orderBy('id');
}

public function permissions()
{
    return $this->morphMany(CoursePermissions::class, 'permissionable');
}

}

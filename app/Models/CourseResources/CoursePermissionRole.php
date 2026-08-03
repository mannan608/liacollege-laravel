<?php

namespace App\Models\CourseResources;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class CoursePermissionRole extends Model
{
    protected $fillable = ['course_id', 'name', 'description', 'is_full_access'];

    // Allow JSON casting for future permissions
    protected $casts = [
        'is_full_access' => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function accessRules()
    {
        return $this->hasMany(CoursePermissions::class, 'permission_role_id');
    }

      public function permissions()
{
    return $this->hasMany(CoursePermissions::class);
}
}

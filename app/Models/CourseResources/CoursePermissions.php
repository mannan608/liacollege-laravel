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
        'course_permission_role_id',
        'permissionable_type',
        'permissionable_id',
    ];

    public function role()
    {
        return $this->belongsTo(CoursePermissionRole::class, 'course_permission_role_id');
    }

    public function permissionable()
    {
        return $this->morphTo();
    }
}
    
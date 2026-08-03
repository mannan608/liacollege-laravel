<?php

namespace App\Models\CourseResources;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class CoursePermissionRole extends Model
{
    protected $table = 'course_permission_roles';

    protected $fillable = ['course_id', 'name', 'description', 'is_full_access'];

    protected $casts = [
        'is_full_access' => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function permissions()
    {
        return $this->hasMany(CoursePermissions::class, 'course_permission_role_id');
    }

    public function accessRules()
    {
        return $this->permissions();
    }

    public function isFullAccess(): bool
    {
        return (bool) $this->is_full_access;
    }
}

<?php

namespace App\Models\CourseResources;

use Illuminate\Database\Eloquent\Model;

class CoursePermissions extends Model
{
    protected $table = 'course_permissions';

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
    

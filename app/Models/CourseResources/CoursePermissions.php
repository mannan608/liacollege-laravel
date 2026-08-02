<?php

namespace App\Models\CourseResources;

use App\Models\Course;
use App\Models\CourseContentCategory;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CoursePermissions extends Model
{
protected $fillable = ['permission_role_id', 'entity_type', 'entity_id'];

    public function role()
    {
        return $this->belongsTo(CoursePermissionRole::class, 'permission_role_id');
    }
}
    
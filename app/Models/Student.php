<?php

namespace App\Models;

use App\Models\CourseResources\CoursePermissions;
use App\Models\LMS\Enrollment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'date_of_birth',
        'usi',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(
            Course::class,
            'enroll_course',
            'student_id',
            'course_id',

        );
    }

    public function coursePermissions(): HasMany
    {
        return $this->hasMany(CoursePermissions::class);
    }

    public function assignmentSubmissions(): HasMany
    {
        return $this->hasMany(AssignmentSubmission::class);
    }

    public function enrollments()
{
    return $this->hasMany(Enrollment::class);
}
public function documents()
{
    return $this->morphMany(Document::class, 'documentable');
}
}

<?php

namespace App\Models;

use App\Models\CourseResources\CoursePermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'created_by',
        'title',
        'description',
        'instructions',
        'due_date',
        'total_marks',
        'attachment',
        'status',
    ];

    protected $casts = [
        'due_date' => 'datetime',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(AssignmentSubmission::class);
    }

     public function permissions()
    {
        return $this->morphMany(CoursePermissions::class, 'permissionable');
    }

     public function scopeVisibleTo($query, $user)
{
    if ($user->hasAnyRole(['admin', 'super_admin'])) {
        return $query;
    }

    return $query->where('created_by', $user->id);
}
}
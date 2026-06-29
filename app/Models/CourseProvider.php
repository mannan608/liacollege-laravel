<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CourseProvider extends Model
{
    protected $table = 'providers';
    protected $fillable = [
        'user_id',
        'institution_name',
        'campus',
        'phone',
        'country',
        'state',
        'city',
        'address',
        'description',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A provider belongs to many universities.
     * Pivot table: provider_university
     */
    public function universities(): BelongsToMany
    {
        return $this->belongsToMany(University::class, 'provider_university')
            ->withTimestamps();
    }

    /**
     * A provider belongs to many campuses.
     * Pivot table: campus_provider
     */
    public function campuses(): BelongsToMany
    {
        return $this->belongsToMany(Campus::class, 'campus_provider')
            ->withTimestamps();
    }
      /**
     * A provider offers many courses/subjects.
     * Pivot table: course_provider
     */
    // public function courses(): BelongsToMany
    // {
    //     return $this->belongsToMany(Course::class, 'course_provider')
    //                 ->withTimestamps();
    // }
    
}

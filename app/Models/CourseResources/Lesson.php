<?php

namespace App\Models\CourseResources;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Lesson extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'module_id',
        'title',
        'slug',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
     public function progresses(): HasMany
    {
        return $this->hasMany(UserLessonProgress::class);
    }
}

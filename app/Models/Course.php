<?php

namespace App\Models;

use App\Models\LMS\CourseSlot;
use App\Models\LMS\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'course_category_id',
        'name',
        'code',
        'cricos',
        'slug',
        'description',
        'price',
        'duration',
        'includes_cpr',
        'thumbnail',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'includes_cpr' => 'boolean',
        'price' => 'decimal:2',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $course) {
            if (empty($course->uuid)) {
                $course->uuid = (string) Str::uuid();
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(
            CourseCategory::class,
            'course_category_id'
        );
    }

    public function includes()
    {
        return $this->hasMany(CourseInclude::class)
            ->orderBy('sort_order');
    }

  
    public function slots()
{
    return $this->hasMany(CourseSlot::class);
}
  public function coursecontentcategories()
    {
        return $this->hasMany(CourseContentCategory::class);
    }
      public function modules(): HasMany
    {
        return $this->hasMany(Module::class)
            ->orderBy('id');
    }
}

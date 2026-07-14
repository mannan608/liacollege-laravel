<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
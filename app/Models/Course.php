<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'cricos',
        'slug',
        'price',
        'discount_percentage',
        'thumbnail',
        'overview',
        'entry_requirements',
        'description',
        'course_material',
        'status',
        'category_id',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_percentage' => 'integer',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function getFinalPriceAttribute()
    {
        return $this->price -
            (($this->price * $this->discount_percentage) / 100);
    }
}

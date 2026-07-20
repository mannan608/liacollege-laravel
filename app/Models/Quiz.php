<?php

namespace App\Models;

use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\LessonResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'title',
        'description',
        'time_limit',
        'pass_mark',
        'total_marks',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function resources()
    {
        return $this->hasMany(LessonResource::class);
    }

    public function attempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }
}
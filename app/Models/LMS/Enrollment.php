<?php

namespace App\Models\LMS;


use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
   protected $fillable = [
        'student_id',
        'course_slot_id',
        'status',
        'enrolled_at',
        'completed_at',
    ];

    protected $casts = [
        'enrolled_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function slot()
    {
        return $this->belongsTo(CourseSlot::class, 'course_slot_id');
    }


}
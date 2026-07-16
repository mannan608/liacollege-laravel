<?php

namespace App\Models\LMS;


use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'student_id',
        'course_slot_id',

        'voucher_code',
        'purchase_order_ref',

        'amount',

        'payment_method',
        'payment_status',

        'status',

        'remarks',

        'approved_by',
        'approved_at',

        'enrolled_at',
        'completed_at',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'enrolled_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function slot()
    {
        return $this->belongsTo(
            CourseSlot::class,
            'course_slot_id'
        );
    }

    public function approvedBy()
    {
        return $this->belongsTo(
            User::class,
            'approved_by'
        );
    }
}
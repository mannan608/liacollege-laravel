<?php

namespace App\Models;

use App\Models\LMS\Enrollment;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'student_id',
        'enrollment_id',
        'transaction_id',
        'amount',
        'payment_method',
        'status',
    ];

    public function enrollment()
{
    return $this->belongsTo(Enrollment::class);
}

public function student()
{
    return $this->belongsTo(Student::class);
}
}
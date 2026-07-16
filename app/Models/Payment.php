<?php

namespace App\Models;

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
}
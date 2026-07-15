<?php

namespace App\Models\LMS;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SlotTeacher extends Model
{
    use HasFactory;

    protected $fillable = [

        'course_slot_id',

        'user_id',
    ];

    protected $casts = [
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function slot()
    {
        return $this->belongsTo(CourseSlot::class,'course_slot_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }
}
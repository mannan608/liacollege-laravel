<?php

namespace App\Models\LMS;


use App\Models\Course;
use App\Models\TrainingCenter;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseSlot extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'uuid',

        'course_id',

        'training_center_id',

        'title',

        'training_date',

        'start_time',

        'end_time',

        'capacity',

        'available_seats',

        'price',

        'booking_open_at',

        'booking_close_at',

        'status',

        'notes',

        'created_by',
    ];

    protected $casts = [

        'training_date' => 'date',

        'booking_open_at' => 'datetime',

        'booking_close_at' => 'datetime',

        'price' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenter::class);
    }

    public function users()
    {
        return $this->hasMany(SlotTeacher::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function enrollments()
{
    return $this->hasMany(Enrollment::class);
}
}
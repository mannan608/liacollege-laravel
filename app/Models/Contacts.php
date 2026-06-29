<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'course_id',
    ];  
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}


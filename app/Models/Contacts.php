<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'state',
        'post_code',
        'message',
        'course_id',
    ];     
 
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'name',
        'file',
        'extension',
        'size',
    ];

    public function documentable()
    {
        return $this->morphTo();
    }
}
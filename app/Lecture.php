<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = [
        'schedule','time_in','time_out','teacher_id',
    ];    
}

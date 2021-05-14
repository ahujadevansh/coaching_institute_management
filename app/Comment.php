<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'teacher_id','student_id','comment'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

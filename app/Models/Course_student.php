<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course_student extends Model
{
    protected $table = 'course_student';
    protected $fillable = ['course_id', 'user_id'];
    public $timestamps = true;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';
    protected $fillable = ['course_id', 'name', 'content', 'path_video'];
    public $timestamps = true;
}

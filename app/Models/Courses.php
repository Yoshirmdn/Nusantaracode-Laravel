<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';
    protected $fillable = ['name', 'slug', 'path_trailer', 'about', 'thumbnail', 'category_id', 'teacher_id'];
    public $timestamps = true;
}

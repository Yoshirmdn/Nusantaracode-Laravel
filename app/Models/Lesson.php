<?php

namespace App\Models;

use App\Models\Courses;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';
    protected $fillable = [
        'course_id',
        'name',
        'path_video',
        'content',
    ];
    public $timestamps = true;
    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }
}

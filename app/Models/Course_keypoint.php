<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course_keypoint extends Model
{
    protected $table = 'course_keypoint';
    protected $fillable = ['course_id', 'keypoint'];
    public $timestamps = true;
    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }
}

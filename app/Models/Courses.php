<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Courses extends Model
{
    protected $table = 'courses';
    protected $fillable = ['name', 'slug', 'path_trailer', 'about', 'thumbnail', 'category_id', 'teacher_id'];
    public $timestamps = true;
    public function categoriesconn(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function teacherconn()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }
    public function keypoints()
    {
        return $this->hasMany(Course_keypoint::class);
    }
    public function studentCourse()
    {
        return $this->belongsToMany(User::class, 'course_students', 'course_id', 'user_id');
    }
}

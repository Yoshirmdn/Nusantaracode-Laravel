<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';
    protected $fillable = ['lesson_id', 'question'];
    public $timestamps = true;
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
    public function answers()
    {
        return $this->hasMany(Quiz_answer::class);
    }
}

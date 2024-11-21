<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz_answer extends Model
{
    protected $table = 'quiz_answers';
    protected $fillable = ['quiz_id', 'answer', 'is_correct'];
    public $timestamps = true;
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}

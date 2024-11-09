<?php

namespace App\Models;

use App\Models\Courses;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = ['user_id', 'is_active',];
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function teacher()
    {
        return $this->hasMany(Courses::class);
    }
}

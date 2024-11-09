<?php

namespace App\Models;

use App\Models\Courses;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'icon'];
    public $timestamps = true;
    public function courses()
    {
        return $this->hasMany(Courses::class);
    }
}

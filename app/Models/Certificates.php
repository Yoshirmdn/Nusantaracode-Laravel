<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    protected $table = 'certificates';
    protected $fillable = ['course_id', 'user_id', 'certificate_path', 'issued_date', 'status'];
    public $timestamps = true;
}

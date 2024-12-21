<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    protected $table = 'certificates';
    protected $fillable = [
        'user_id',
        'course_id',
        'issue_date',
        'certificate_path',
    ];
    public $timestamps = true;
}

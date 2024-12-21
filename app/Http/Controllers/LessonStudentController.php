<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class LessonStudentController extends Controller
{
    public function index($id)
    {
        $course = Courses::with(['categoriesconn', 'teacherconn.user'])
            ->withCount('studentCourse')
            ->find($id);
        return view('user.courselayout', compact('course'));
    }
}

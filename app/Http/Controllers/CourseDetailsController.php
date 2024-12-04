<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CourseDetailsController extends Controller
{
    public function index($id) {}

    public function show($id)
    {
        $course = Courses::withCount(['lessons'])->with(['teacherconn', 'categoriesconn'])->findOrFail($id);

        $objTeacher = $course->teacherconn;
        $teacher = $course->teacherconn->name;
        $teacherAvatar = $course->teacherconn->avatar;

        return view('user.coursedetails', compact('course', 'teacher', 'teacherAvatar', 'objTeacher'));
    }
}

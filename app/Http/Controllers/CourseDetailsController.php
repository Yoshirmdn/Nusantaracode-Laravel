<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CourseDetailsController extends Controller
{
    public function index($id) {}

    public function show($id)
    {
        $course = Courses::withCount(['lessons'])->with(['teacherconn', 'categoriesconn', 'keypoints'])->findOrFail($id);

        $objTeacher = $course->teacherconn;
        $teacher = $course->teacherconn->name;
        $teacherAvatar = $course->teacherconn->avatar;
        $studentCount = $course->studentCourse->count();

        return view('user.coursedetails', compact('course', 'teacher', 'teacherAvatar', 'objTeacher', 'studentCount'));
    }
}

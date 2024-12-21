<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class LessonStudentController extends Controller
{
    public function index($courseId, $lessonId = null)
    {
        $lessonStudent = Courses::with([
            'categoriesconn',
            'teacherconn.user',
            'lessons',
            'keypoints',
            'studentCourse'
        ])->withCount('studentCourse')->find($courseId);

        if (!$lessonStudent) {
            abort(404, 'Course not found.');
        }

        // Choose lesson based on lessonId or default to the first lesson
        $selectedLesson = $lessonStudent->lessons->first();
        if ($lessonId) {
            $selectedLesson = $lessonStudent->lessons->where('id', $lessonId)->first() ?? $selectedLesson;
        }

        // Set the current lesson ID (default to the first lesson's ID if not specified)
        $lessonId = $selectedLesson->id ?? null;

        return view('user.courselayout', compact('lessonStudent', 'selectedLesson', 'lessonId'));
    }

    public function showLesson($courseId, $lessonId)
    {
        $lessonStudent = Courses::with(['lessons', 'teacherconn.user'])->find($courseId);
        if (!$lessonStudent) {
            abort(404, 'Course not found.');
        }
        $selectedLesson = $lessonStudent->lessons->where('id', $lessonId)->first();
        return view('user.CourseIndex', compact('lessonStudent', 'selectedLesson', 'lessonId'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
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

        // Pilih lesson berdasarkan lessonId atau default ke pelajaran pertama
        $selectedLesson = $lessonStudent->lessons->first();
        if ($lessonId) {
            $selectedLesson = $lessonStudent->lessons->where('id', $lessonId)->first() ?? $selectedLesson;
        }

        // Periksa apakah lesson memiliki quiz
        $hasQuiz = $selectedLesson ? Quiz::where('lesson_id', $selectedLesson->id)->exists() : false;

        // Periksa apakah lesson ini adalah lesson terakhir
        $isLastLesson = $selectedLesson && $selectedLesson->id === $lessonStudent->lessons->last()->id;

        return view('user.courselayout', compact('lessonStudent', 'selectedLesson', 'lessonId', 'hasQuiz', 'isLastLesson'));
    }



    public function showLesson($courseId, $lessonId)
    {
        $lessonStudent = Courses::with(['lessons', 'teacherconn.user'])->find($courseId);

        if (!$lessonStudent) {
            abort(404, 'Course not found.');
        }

        $selectedLesson = $lessonStudent->lessons->where('id', $lessonId)->first();

        // Periksa apakah lesson memiliki quiz
        $hasQuiz = false;
        if ($selectedLesson) {
            $hasQuiz = Quiz::where('lesson_id', $selectedLesson->id)->exists();
        }

        return view('user.courselayout', compact('lessonStudent', 'selectedLesson', 'lessonId', 'hasQuiz'));
    }
}

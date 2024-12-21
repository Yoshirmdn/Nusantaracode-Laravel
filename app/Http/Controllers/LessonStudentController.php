<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Lesson;
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

        // Choose the lesson based on lessonId or default to the first lesson
        $selectedLesson = $lessonStudent->lessons->first();
        if ($lessonId) {
            $selectedLesson = $lessonStudent->lessons->where('id', $lessonId)->first() ?? $selectedLesson;
        }

        // Check if the lesson has a quiz
        $hasQuiz = $selectedLesson ? Quiz::where('lesson_id', $selectedLesson->id)->exists() : false;

        // Check if the current lesson is the last lesson
        $isLastLesson = $selectedLesson && $selectedLesson->id === $lessonStudent->lessons->last()->id;

        // Pass the required variables to the view
        return view('user.courselayout', compact('lessonStudent', 'selectedLesson', 'lessonId', 'hasQuiz', 'isLastLesson', 'courseId'));
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

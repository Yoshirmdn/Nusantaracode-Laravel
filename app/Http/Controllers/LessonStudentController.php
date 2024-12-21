<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class LessonStudentController extends Controller
{
    public function index($courseId, $lessonId = null)
    {
        $lessonStudent = Courses::with([
            'categoriesconn',  // Kategori kursus
            'teacherconn.user', // Pengajar dan data user terkait
            'lessons',         // Pelajaran kursus
            'keypoints',       // Poin penting kursus
            'studentCourse'    // Siswa yang terdaftar
        ])->withCount('studentCourse') // Menghitung jumlah siswa yang terdaftar
            ->find($courseId);

        if (!$lessonStudent) {
            abort(404, 'Course not found.');
        }

        // Pilih lesson berdasarkan lessonId atau default ke pelajaran pertama
        $selectedLesson = $lessonStudent->lessons->first();
        if ($lessonId) {
            $selectedLesson = $lessonStudent->lessons->where('id', $lessonId)->first() ?? $selectedLesson;
        }

        return view('user.courselayout', compact('lessonStudent', 'selectedLesson'));
    }
}

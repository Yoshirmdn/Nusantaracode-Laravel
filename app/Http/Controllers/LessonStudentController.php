<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class LessonStudentController extends Controller
{
    public function index($id)
    {
        $lessonStudent = Courses::with([
            'categoriesconn',  // Kategori kursus
            'teacherconn.user', // Pengajar dan data user terkait
            'lessons',         // Pelajaran kursus
            'keypoints',       // Poin penting kursus
            'studentCourse'    // Siswa yang terdaftar
        ])->withCount('studentCourse') // Menghitung jumlah siswa yang terdaftar
            ->find($id);

        if (!$lessonStudent) {
            abort(404, 'Course not found.');
        }

        return view('user.courselayout', compact('lessonStudent'));
    }
}

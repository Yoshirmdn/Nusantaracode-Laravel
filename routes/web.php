<?php

use App\Http\Controllers\AllCourseController;
use App\Models\Lesson;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CourseDetailsController;
use App\Http\Controllers\LessonStudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('courses', CoursesController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('users', UserController::class);
        Route::resource('lessons', LessonController::class);
        Route::resource('quizzes', QuizController::class);
        Route::resource('teacher', TeacherController::class);
    });
    Route::middleware('role:student')->group(function () {
        Route::get('/playground', function () {
            return view('user/codePlayground');
        })->name('playground');
        Route::get('student/courses', [CoursesController::class, 'studentIndex'])->name('student.courses.index');
        Route::get('student/courses/{id}', [CoursesController::class, 'studentShow'])->name('student.courses.show');
        Route::resource('coursedetails', CourseDetailsController::class);
        Route::get('courselayout/{id}', [LessonStudentController::class, 'index'])->name('courselayout');
        Route::get('/courses/{courseId}/lessons/{lessonId?}', [LessonStudentController::class, 'index'])
            ->name('lessons.index');
        Route::resource('courseindex', AllCourseController::class);
    });


    Route::group(['middleware' => ['role:admin|teacher']], function () {
        Route::resource('courses', CoursesController::class);
    });
});

require __DIR__ . '/auth.php';

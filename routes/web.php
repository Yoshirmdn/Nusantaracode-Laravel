<?php

use App\Models\Lesson;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\MyCourseController;
use App\Http\Controllers\AllCourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\StudentQuizController;
use App\Http\Controllers\CourseDetailsController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\LessonStudentController;
use App\Http\Controllers\StudentCertificateController;

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

    Route::group(['middleware' => ['role:admin|teacher']], function () {
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
        Route::resource('mycourse', MyCourseController::class);
        // Quiz overview route
        Route::get('/quiz/{lessonId}', [StudentQuizController::class, 'index'])->name('quiz.index');
        // Start quiz route
        Route::get('/quiz/{lessonId}/start/{questionNumber?}', [StudentQuizController::class, 'start'])->name('quiz.start');
        Route::post('/quiz/process', [StudentQuizController::class, 'process'])->name('quiz.process');
        Route::get('/quiz/{lessonId}/result', [StudentQuizController::class, 'result'])->name('quiz.result');
        // Certificate route
        // Route::get('/certificate/generate/{courseId}', [StudentCertificateController::class, 'generateCertificate'])->name('certificate.generate');
        // Route memulai pembayaran
        Route::get('/payment/course/{courseId}', [PaymentController::class, 'payCertificate'])
            ->name('payment.payCertificate');

        // Route untuk AJAX update status
        Route::post('/payment/update-status', [PaymentController::class, 'updateStatus'])
            ->name('payment.updateStatus');

        // Route untuk Notification Midtrans
        Route::post('/midtrans/notification', [MidtransController::class, 'notificationHandler'])
            ->name('midtrans.notification');

        // Route untuk generate certificate
        Route::get('/certificate/generate/{courseId}', [StudentCertificateController::class, 'generateCertificate'])
            ->name('certificate.generate');
    });


    Route::group(['middleware' => ['role:admin|teacher']], function () {
        Route::resource('courses', CoursesController::class);
    });
});

require __DIR__ . '/auth.php';

<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Quiz_answer;
use App\Models\Courses; // Include Courses model
use Illuminate\Http\Request;

class StudentQuizController extends Controller
{
    public function index($lessonId)
    {
        // Fetch quizzes for the specific lesson
        $quizzes = Quiz::where('lesson_id', $lessonId)->with('answers')->get();
        $totalQuestions = $quizzes->count();

        // Fetch the related course using the lesson's course_id
        $course = Courses::whereHas('lessons', function ($query) use ($lessonId) {
            $query->where('id', $lessonId);
        })->first();

        // Pass the data to the view
        return view('user.quiz', compact('quizzes', 'totalQuestions', 'lessonId', 'course'));
    }

    public function start($lessonId, $questionNumber = 1)
    {
        // Fetch the specific question
        $quiz = Quiz::where('lesson_id', $lessonId)->with('answers')->skip($questionNumber - 1)->first();

        if (!$quiz) {
            return redirect()->route('quiz.index', $lessonId)->with('error', 'No more questions.');
        }

        // Fetch the related course using the lesson's course_id
        $course = Courses::whereHas('lessons', function ($query) use ($lessonId) {
            $query->where('id', $lessonId);
        })->first();

        // Pass the data to the view
        return view('user.start', compact('quiz', 'lessonId', 'questionNumber', 'course'));
    }
    public function process(Request $request)
    {
        $lessonId = $request->input('lessonId');
        $questionNumber = $request->input('questionNumber');
        $answerId = $request->input('answer');

        // Ambil jawaban yang dipilih pengguna
        $selectedAnswer = Quiz_answer::find($answerId);

        // Cek apakah jawaban benar
        $isCorrect = $selectedAnswer ? $selectedAnswer->is_correct : false;

        // Update skor berdasarkan jawaban
        $score = session()->get('score', 0);
        if ($isCorrect) {
            $score++;
            session()->put('score', $score);
        }

        // Cek apakah ada pertanyaan berikutnya
        $nextQuestion = Quiz::where('lesson_id', $lessonId)
            ->skip($questionNumber)
            ->first();

        if ($nextQuestion) {
            // Redirect ke pertanyaan berikutnya
            return redirect()->route('quiz.start', [
                'lessonId' => $lessonId,
                'questionNumber' => $questionNumber + 1
            ]);
        }

        // Jika tidak ada pertanyaan berikutnya, redirect ke halaman hasil
        return redirect()->route('quiz.result', ['lessonId' => $lessonId]);
    }
    public function result($lessonId)
    {
        $score = session()->get('score', 0);

        // Reset skor setelah menampilkan hasil
        session()->forget('score');

        // Hitung total pertanyaan
        $totalQuestions = Quiz::where('lesson_id', $lessonId)->count();

        return view('user.result', compact('score', 'totalQuestions', 'lessonId'));
    }
}

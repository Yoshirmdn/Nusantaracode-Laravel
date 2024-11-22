<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua kuis dari database
        $quizzes = Quiz::with(['lesson'])->paginate(10); // Mengambil kuis dengan relasi lesson
        $lessons = Lesson::all(); // Ambil semua lesson

        return view('admin.quizIndex', compact('quizzes', 'lessons'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lessons = Lesson::all(); // Ambil semua lesson
        return view('admin.quizCreate', compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lesson_id' => 'required|exists:lessons,id', // Validasi untuk lesson_id
            'question' => 'required|string|max:255', // Validasi untuk question
        ]);

        Quiz::create($validatedData);

        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully.');
    }


    public function edit(Quiz $quiz)
    {
        $lessons = Lesson::all(); // Ambil semua lesson
        return view('admin.quizEdit', compact('quiz', 'lessons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $validatedData = $request->validate([
            'lesson_id' => 'required|exists:lessons,id', // Validasi untuk lesson_id
            'question' => 'required|string|max:255', // Validasi untuk question
        ]);

        $quiz->update($validatedData);

        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete(); // Hapus kuis dari database

        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully.');
    }
}

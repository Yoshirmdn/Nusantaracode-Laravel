<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course_student;
use Illuminate\Support\Facades\Auth;

class CourseStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is already enrolled
        $exists = Course_student::where('user_id', $user->id)
            ->where('course_id', $request->course_id)
            ->exists();

        if ($exists) {
            return redirect()->route('courselayout', ['id' => $request->course_id])
                ->with('error', 'You are already enrolled in this course.');
        }

        // Insert the record into the `course_students` table
        Course_student::create([
            'user_id' => $user->id,
            'course_id' => $request->course_id,
        ]);

        // Redirect to the `courselayout` route
        return redirect()->route('courselayout', ['id' => $request->course_id])
            ->with('success', 'You have successfully joined the course.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course_student $course_student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course_student $course_student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course_student $course_student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course_student $course_student)
    {
        //
    }
}

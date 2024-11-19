<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
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
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'path_video' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Lesson::create($request->all());

        return redirect()->route('courses.show', $request->course_id)
            ->with('success', 'Lesson created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        return view('admin.lessonEdit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'course_id' => 'nullable|exists:courses,id',
            'name' => 'required|string|max:255',
            'path_video' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $lesson->update($request->all());

        return redirect()->route('courses.show', $lesson->course_id)
            ->with('success', 'Lesson created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('courses.show', $lesson->course_id);
    }
}

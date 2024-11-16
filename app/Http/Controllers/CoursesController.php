<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\View\View;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        $courses = Courses::with(['categoriesconn', 'teacherconn.user'])->paginate(10);
        return view('admin.courseIndex', compact('courses', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.courseIndex');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:courses,slug|max:255',
            'path_trailer' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);
        $validatedData['slug'] = $validatedData['slug'] ?? Str::slug($validatedData['name']);
        if (empty($validatedData['slug'])) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
        }
        if ($request->hasFile('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }
        Courses::create($validatedData);
        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Courses $courses, $id): View
    {
        $course = Courses::with(['categoriesconn', 'teacherconn.user'])->find($id);
        if (!$course) {
            return redirect()->back()->with('error', 'Course not found.');
        }
        return view('admin.courseManage', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courses $courses): View
    {
        return view('admin.courseEdit', compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Courses $courses)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'path_trailer' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);
        $validatedData['slug'] = $validatedData['slug'] ?? Str::slug($validatedData['name']);
        if (empty($validatedData['slug'])) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
        }
        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($courses->thumbnail);
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }
        $courses->update($validatedData);
        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courses $courses): RedirectResponse
    {
        if ($courses->thumbnail) {
            Storage::disk('public')->delete($courses->thumbnail);
        }
        $courses->delete();
        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}

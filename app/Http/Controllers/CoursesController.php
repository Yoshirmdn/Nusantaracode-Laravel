<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Courses;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Courses $courses): View
    {
        return view('admin.courseShow', compact('courses'));
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
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:courses,slug,' . $courses->id . '|max:255',
            'path_trailer' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($courses->thumbnail) {
                Storage::disk('public')->delete($courses->thumbnail);
            }
            $file = $request->file('thumbnail');
            $thumbnailPath = $file->store('thumbnails', 'public');

            $validatedData['thumbnail'] = $thumbnailPath;
        }

        $courses->update($validatedData);
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courses $courses)
    {
        if ($courses->thumbnail) {
            Storage::delete('public/' . $courses->thumbnail);
        }
        $courses->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}

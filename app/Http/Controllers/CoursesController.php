<?php

namespace App\Http\Controllers;

use App\Models\Course_keypoint;
use App\Models\Courses;
use Illuminate\View\View;
use App\Models\Categories;
use App\Models\Teacher;
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
        $courses = Courses::withCount(['lessons', 'studentCourse'])
            ->with(['categoriesconn', 'teacherconn.user', 'studentCourse'])
            ->paginate(10);
        return view('admin.courseIndex', compact('courses', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Tampilkan halaman form untuk membuat course
        $categories = Categories::all();
        $teachers = Teacher::all(); // Ambil semua guru
        return view('admin.courseCreate', compact('categories', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:courses,slug|max:255',
            'path_trailer' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'teacher_id' => 'nullable|exists:teachers,id', // Ubah menjadi nullable
            'keypoint' => 'required|array|min:2', // Minimal 2 jawaban
            'keypoint.*' => 'required|string|max:255', // Validasi setiap jawaban
        ]);

        // Proses slug jika tidak ada
        $validatedData['slug'] = $validatedData['slug'] ?? Str::slug($validatedData['name']);
        if (empty($validatedData['slug'])) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
        }

        // Jika ada file thumbnail, simpan ke storage
        if ($request->hasFile('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Simpan course baru
        $course = Courses::create($validatedData);

        // Simpan keypoint
        $keypoints = [];
        foreach ($validatedData['keypoint'] as $answerText) {
            $keypoints[] = [
                'course_id' => $course->id,
                'keypoint' => $answerText,
            ];
        }
        Course_keypoint::insert($keypoints);

        // Redirect ke halaman daftar course dengan pesan sukses
        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Courses $courses, $id): View
    {
        // Ambil data course berdasarkan ID dan relasi yang diperlukan
        $course = Courses::with(['categoriesconn', 'teacherconn.user'])
            ->withCount('studentCourse') // Tambahkan dengan count
            ->find($id);

        if (!$course) {
            return redirect()->back()->with('error', 'Course not found.');
        }

        return view('admin.courseManage', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Courses::with('keypoints')->findOrFail($id); // Perbaikan di sini
        $categories = Categories::all();
        $teachers = Teacher::all(); // Mengambil semua teacher yang tersedia

        return view('admin.courseEdit', compact('course', 'categories', 'teachers'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Ambil data course berdasarkan ID
        $course = Courses::findOrFail($id);

        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:courses,slug,' . $course->id,
            'path_trailer' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'teacher_id' => 'nullable|exists:teachers,id', // Ubah menjadi nullable
            'keypoint' => 'required|array|min:2', // Minimal 2 jawaban
            'keypoint.*' => 'required|string|max:255', // Validasi setiap jawaban
        ]);

        // Proses slug jika tidak ada
        $validatedData['slug'] = $validatedData['slug'] ?? Str::slug($validatedData['name']);
        if (empty($validatedData['slug'])) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
        }

        // Jika ada file thumbnail, hapus yang lama dan simpan yang baru
        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($course->thumbnail);
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Update data course
        $course->update($validatedData);

        /// Update keypoint
        Course_keypoint::where('course_id', $course->id)->delete();

        $keypoints = [];
        foreach ($validatedData['keypoint'] as $keypointText) {
            $keypoints[] = [
                'course_id' => $course->id,
                'keypoint' => $keypointText,
            ];
        }
        Course_keypoint::insert($keypoints);
        // Redirect ke halaman courses dengan pesan sukses
        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courses $course)
    {
        if ($course->thumbnail) {
            Storage::disk('public')->delete($course->thumbnail);
        }

        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}

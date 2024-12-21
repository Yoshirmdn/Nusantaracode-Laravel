<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Categories;
use Illuminate\Http\Request;

class AllCourseController extends Controller
{
    public function index(Request $request)
    {
        $Allcategories = Categories::all();

        // Query awal untuk courses
        $query = Courses::withCount(['lessons', 'studentCourse'])
            ->with(['categoriesconn', 'teacherconn.user']);

        // Filter berdasarkan pencarian (search)
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori
        if ($request->has('category') && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        // Sorting
        if ($request->has('sort')) {
            if ($request->sort == 'name_asc') {
                $query->orderBy('name', 'asc');
            } elseif ($request->sort == 'name_desc') {
                $query->orderBy('name', 'desc');
            } elseif ($request->sort == 'students_desc') {
                $query->orderBy('student_course_count', 'desc');
            }
        }

        $Allcourses = $query->paginate(10);
        return view('user.courseindex', compact('Allcategories', 'Allcourses'));
    }
}

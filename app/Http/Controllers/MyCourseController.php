<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyCourseController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $categories = Categories::all();

        // Build query
        $query = Courses::whereHas('studentCourse', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->with(['categoriesconn', 'teacherconn.user']);

        // Search
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->has('category') && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        // Sort
        if ($request->has('sort')) {
            if ($request->sort == 'name_asc') {
                $query->orderBy('name', 'asc');
            } elseif ($request->sort == 'name_desc') {
                $query->orderBy('name', 'desc');
            } elseif ($request->sort == 'students_desc') {
                $query->orderBy('student_course_count', 'desc');
            }
        }

        // Paginate results
        $enrolledCourses = $query->paginate(8);

        return view('user.mycourse', compact('enrolledCourses', 'categories'));
    }
}

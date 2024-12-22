<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Courses;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Certificates;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategoryId = $request->get('category_id');

        // Count Teachers
        $teacherCount = User::role('teacher')->count(); // Assuming you're using Spatie Role package

        // Count Students
        $studentCount = User::role('student')->count();

        // Count Courses
        $courseCount = Courses::count();

        // Count Certificates
        $certificateCount = Certificates::count();
        // Get all categories
        $categories = Categories::all();

        // Filter courses by category if `category_id` is provided
        $courses = Courses::withCount(['lessons', 'studentCourse']) // Counting the students
            ->with(['categoriesconn', 'teacherconn.user', 'studentCourse'])
            ->when($selectedCategoryId, function ($query, $selectedCategoryId) {
                $query->where('category_id', $selectedCategoryId);
            })
            ->get();

        return view('dashboard', compact('categories', 'courses', 'selectedCategoryId', 'teacherCount', 'studentCount', 'courseCount', 'certificateCount'));
    }
}

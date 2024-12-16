<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Categories;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategoryId = $request->get('category_id');

        // Ambil semua kategori
        $categories = Categories::all();

        // Filter course berdasarkan kategori jika `category_id` ada
        $courses = Courses::withCount(['lessons', 'studentCourse'])
            ->with(['categoriesconn', 'teacherconn.user', 'studentCourse'])
            ->when($selectedCategoryId, function ($query, $selectedCategoryId) {
                $query->where('category_id', $selectedCategoryId);
            })
            ->get();

        return view('dashboard', compact('categories', 'courses', 'selectedCategoryId'));
    }
}

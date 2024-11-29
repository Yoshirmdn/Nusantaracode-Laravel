<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua kategori dari database
        $categories = Categories::all();

        // Kembalikan view dengan data kategori
        return view('dashboard', compact('categories'));
    }
}

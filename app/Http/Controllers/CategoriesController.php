<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;


class CategoriesController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view-categories|create-categories|update-categories|delete-categories', only: ['index', 'store']),
            new Middleware('permission:create-categories', only: ['create', 'store']),
            new Middleware('permission:update-categories', only: ['edit', 'update']),
            new Middleware('permission:delete-categories', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Categories::with('courses')->paginate(10);
        $categories = Categories::all();
        return view('admin.categoryIndex', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categoryIndex');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories',
            'icon' => 'nullable|image|max:2048',
        ]);
        $validatedData['slug'] = $validatedData['slug'] ?? Str::slug($validatedData['name']);
        if ($request->hasFile('icon')) {
            $validatedData['icon'] = $request->file('icon')->store('icons', 'public');
        }
        Categories::create($validatedData);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Categories $categories): View
    {
        return view('admin.categoryIndex', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        // Find category by ID
        $category = Categories::findOrFail($id);

        // Return the view with the category data
        return view('admin.categoryEdit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $category): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
            'icon' => 'nullable|image|max:2048',
        ]);
        $validatedData['slug'] = $validatedData['slug'] ?? Str::slug($validatedData['name']);
        if ($request->hasFile('icon')) {
            if ($category->icon) {
                Storage::disk('public')->delete($category->icon);
            }
            $validatedData['icon'] = $request->file('icon')->store('icons', 'public');
        }
        $category->update($validatedData);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category): RedirectResponse
    {
        if ($category->icon) {
            Storage::disk('public')->delete($category->icon);
        }
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}

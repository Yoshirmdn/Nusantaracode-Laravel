<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::with('user')->paginate(10);
        return view('admin.teacherIndex', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'is_active' => 'required|boolean',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Periksa apakah user sudah menjadi teacher
        $existingTeacher = Teacher::where('user_id', $user->id)->first();
        if ($existingTeacher) {
            return redirect()->back()->withErrors(['email' => 'User ini sudah menjadi teacher.']);
        }

        // Tambahkan data ke tabel teachers
        Teacher::create([
            'user_id' => $user->id,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('teacher.index')->with('success', 'Teacher berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        // Validasi input
        $request->validate([
            'is_active' => 'required|boolean',
        ]);

        // Update data teacher berdasarkan input dari form
        $teacher->update([
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('teacher.index')->with('success', 'Status teacher berhasil diubah.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success', 'Teacher berhasil dihapus.');
    }
}

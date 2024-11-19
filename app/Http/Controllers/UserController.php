<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all(); // Get all users without pagination first
        $loggedInUserId = Auth::id();

        // Add role name to each user
        foreach ($users as $user) {
            $user->role_name = $user->roles->pluck('name')->first();
        }

        // Sort users with the logged-in user at the top
        $users = $users->sortByDesc(function ($user) use ($loggedInUserId) {
            return $user->id == $loggedInUserId ? 1 : 0;
        });


        return view('admin.usersIndex', compact('users', 'loggedInUserId'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('admin.createUser', compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ])->assignRole('student');

        return redirect()->route(route: 'users.index')
            ->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('admin.usersEdit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input form
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'avatar' => 'nullable|image|max:1024',
            'occupation' => 'nullable|string|max:255',
            'roles' => 'required|array', // Validasi roles sebagai array
            'roles.*' => 'exists:roles,name', // Validasi setiap role ada di tabel roles
        ]);

        // Cek jika role 'teacher' dipilih, dan tambahkan user ke tabel teachers
        if (in_array('teacher', $validated['roles'])) {
            // Pastikan user belum ada di tabel teacher
            if (!$user->teacher) {
                Teacher::create([
                    'user_id' => $user->id,
                    // Tambahkan kolom lain jika perlu
                ]);
            }
        } else {
            // Jika role bukan teacher, hapus user dari tabel teacher jika ada
            if ($user->teacher) {
                $user->teacher->delete();
            }
        }

        // Update password jika ada
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            // Hapus password jika tidak ada perubahan
            $validated = Arr::except($validated, ['password']);
        }

        // Update avatar jika ada
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                // Hapus avatar lama jika ada
                Storage::disk('public')->delete($user->avatar);
            }
            // Simpan avatar baru
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Perbarui data user
        $user->update($validated);

        // Atur roles untuk user
        $user->syncRoles($validated['roles']); // Gunakan syncRoles untuk memastikan tidak ada duplikasi

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}

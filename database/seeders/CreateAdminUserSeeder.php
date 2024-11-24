<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Rio Adminstrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
        // create for teacher
        $user = User::create([
            'name' => 'Rio Teacher',
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $role = Role::create(['name' => 'teacher']);
        $permissions = Permission::where('name', 'LIKE', 'course%')->pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
        // create for student
        $user = User::create([
            'name' => 'Rio Student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $role = Role::create(['name' => 'student']);
        $permissions = Permission::where('name', 'LIKE', 'course%')->pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}

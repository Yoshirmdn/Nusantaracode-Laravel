<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view-users',
            'create-users',
            'update-users',
            'delete-users',
            'view-categories',
            'create-categories',
            'update-categories',
            'delete-categories',
            'view-courses',
            'create-courses',
            'update-courses',
            'delete-courses',
            'view-course-keypoints',
            'create-course-keypoints',
            'update-course-keypoints',
            'delete-course-keypoints',
            'view-lessons',
            'create-lessons',
            'update-lessons',
            'delete-lessons',
            'view-quizzes',
            'create-quizzes',
            'update-quizzes',
            'delete-quizzes',
            'view-quiz-answers',
            'create-quiz-answers',
            'update-quiz-answers',
            'delete-quiz-answers',
            'view-certificates',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);

        $adminRole->givePermissionTo(Permission::all());

        $teacherPermissions = [
            'view-course-keypoints',
            'create-course-keypoints',
            'update-course-keypoints',
            'delete-course-keypoints',
            'view-courses',
            'update-courses',
            'view-quizzes',
            'view-quiz-answers',
        ];

        $teacherRole->givePermissionTo($teacherPermissions);

        $studentPermissions = [
            'view-course-keypoints',
            'view-categories',
            'view-courses',
            'create-quiz-answers',
            'view-quizzes',
            'view-certificates',
        ];

        $studentRole->givePermissionTo($studentPermissions);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            Permission::create(['name' => $permission]);
        }
    }
}

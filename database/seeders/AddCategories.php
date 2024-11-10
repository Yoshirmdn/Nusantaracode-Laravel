<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class AddCategories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Web Development', 'slug' => 'web-development', 'icon' => 'fas fa-code'],
            ['name' => 'Mobile Development', 'slug' => 'mobile-development', 'icon' => 'fas fa-mobile-alt'],
        ];

        foreach ($categories as $category) {
            Categories::create($category);
        }
    }
}

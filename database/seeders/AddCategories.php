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
            ['name' => 'Game Development', 'slug' => 'game-development', 'icon' => 'fas fa-gamepad'],
            ['name' => 'Data Science', 'slug' => 'data-science', 'icon' => 'fas fa-database'],
            ['name' => 'Machine Learning', 'slug' => 'machine-learning', 'icon' => 'fas fa-robot'],
            ['name' => 'Artificial Intelligence', 'slug' => 'artificial-intelligence', 'icon' => 'fas fa-robot'],
            ['name' => 'Cyber Security', 'slug' => 'cyber-security', 'icon' => 'fas fa-shield-alt'],
            ['name' => 'Cloud Computing', 'slug' => 'cloud-computing', 'icon' => 'fas fa-cloud'],
            ['name' => 'DevOps', 'slug' => 'devops', 'icon' => 'fas fa-cogs'],
            ['name' => 'UI/UX Design', 'slug' => 'ui-ux-design', 'icon' => 'fas fa-paint-brush'],
            ['name' => 'Digital Marketing', 'slug' => 'digital-marketing', 'icon' => 'fas fa-bullhorn'],
            ['name' => 'Finance', 'slug' => 'finance', 'icon' => 'fas fa-money-bill-wave'],
            ['name' => 'Accounting', 'slug' => 'accounting', 'icon' => 'fas fa-calculator'],
            ['name' => 'Human Resources', 'slug' => 'human-resources', 'icon' => 'fas fa-users'],
            ['name' => 'Sales', 'slug' => 'sales', 'icon' => 'fas fa-handshake'],
            ['name' => 'Customer Service', 'slug' => 'customer-service', 'icon' => 'fas fa-headset'],
            ['name' => 'Management', 'slug' => 'management', 'icon' => 'fas fa-tasks'],
            ['name' => 'Leadership', 'slug' => 'leadership', 'icon' => 'fas fa-chess-king'],
            ['name' => 'Product Management', 'slug' => 'product-management', 'icon' => 'fas fa-cube'],
            ['name' => 'Project Management', 'slug' => 'project-management', 'icon' => 'fas fa-tasks'],
            ['name' => 'Quality Management', 'slug' => 'quality-management', 'icon' => 'fas fa-check-square'],
            ['name' => 'Risk Management', 'slug' => 'risk-management', 'icon' => 'fas fa-exclamation-triangle'],
            ['name' => 'Supply Chain Management', 'slug' => 'supply-chain-management', 'icon' => 'fas fa-truck'],
            ['name' => 'Logistics', 'slug' => 'logistics', 'icon' => 'fas fa-truck'],
            ['name' => 'Operations Management', 'slug' => 'operations-management', 'icon' => 'fas fa-cogs'],
            ['name' => 'Retail Management', 'slug' => 'retail-management', 'icon' => 'fas fa-shopping-cart'],
            ['name' => 'E-Commerce', 'slug' => 'e-commerce', 'icon' => 'fas fa-shopping-cart'],
            ['name' => 'Entrepreneurship', 'slug' => 'entrepreneurship', 'icon' => 'fas fa-lightbulb'],
            ['name' => 'Innovation', 'slug' => 'innovation', 'icon' => 'fas fa-lightbulb'],
            ['name' => 'Startups', 'slug' => 'startups', 'icon' => 'fas fa-lightbulb'],
            ['name' => 'Venture Capital', 'slug' => 'venture-capital', 'icon' => 'fas fa-lightbulb'],
            ['name' => 'Real Estate', 'slug' => 'real-estate', 'icon' => 'fas fa-home'],
            ['name' => 'Construction', 'slug' => 'construction', 'icon' => 'fas fa-hard-hat'],
            ['name' => 'Architecture', 'slug' => 'architecture', 'icon' => 'fas fa-building'],
            ['name' => 'Interior Design', 'slug' => 'interior-design', 'icon' => 'fas fa-couch'],
            ['name' => 'Fashion Design', 'slug' => 'fashion-design', 'icon' => 'fas fa-tshirt'],
        ];

        foreach ($categories as $category) {
            Categories::create($category);
        }
    }
}

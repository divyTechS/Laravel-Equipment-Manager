<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Define the starter categories for the equipment system
        $categories = [
            ['name' => 'Electronics', 'description' => 'Laptops, monitors, projectors, and other electronic devices'],
            ['name' => 'Furniture', 'description' => 'Desks, chairs, shelves, and office furniture'],
            ['name' => 'Lab Equipment', 'description' => 'Microscopes, oscilloscopes, and laboratory instruments'],
            ['name' => 'Office Supplies', 'description' => 'Printers, scanners, and general office equipment'],
            ['name' => 'Tools', 'description' => 'Hand tools, power tools, and maintenance equipment'],
        ];

        // Insert each category into the database
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
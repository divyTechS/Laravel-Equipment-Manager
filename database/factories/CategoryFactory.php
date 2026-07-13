<?php
namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition(): array
    {
        return [
            // Generate a random category name
'name'=>fake()->word() . ' Equipment',
// Generate a random description for the category
'description'=>fake()->sentence(),
        ];
    }
}
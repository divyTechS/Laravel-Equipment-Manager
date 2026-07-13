<?php

namespace Database\Factories;

use App\Models\Equipment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Equipment>
 */
class EquipmentFactory extends Factory


{

protected $model = Equipment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Generate a random name for the equipment
            'name'=>fake()->word(2,true),
            'description'=>fake()->sentence(),
            // Generate a random serial number for the equipment
            'serial_number'=>fake()->unique()->bothify('SN-####-??'),
            // Pick random status from the allowed enum values
            'status' => fake()->randomElement(['available', 'in-use', 'maintenance', 'retired']),

            // Automatically create a related category if none is provided
            'category_id' => Category::factory(),
            'purchase_date'=> fake()->date(),
        ];
    }
}

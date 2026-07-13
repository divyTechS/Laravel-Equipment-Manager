<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Run the category seeder to populate initial data
        $this->call([
            CategorySeeder::class,
        ]);
    }
}
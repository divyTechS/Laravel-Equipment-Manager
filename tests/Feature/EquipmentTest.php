<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Equipment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class EquipmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_equipment_index_displays_items(): void
    {
        // Create a category and equipment item for the test
        $category = Category::factory()->create();
        $equipment = Equipment::factory()->create([
            'category_id' => $category->id,
            'name' => 'Test Projector',
        ]);

        // Simulate a GET request to the index page
        $response = $this->get(route('equipment.index'));

        // Assert the page loads and shows the equipment name
        $response->assertStatus(200);
        $response->assertSee('Test Projector');
    }

    public function test_equipment_can_be_created(): void
    {
        // Create a category to associate with the new equipment
        $category = Category::factory()->create();

        // Simulate a POST request to the store route
        $response = $this->post(route('equipment.store'), [
            'name' => 'New Laptop',
            'description' => 'A brand new laptop',
            'serial_number' => 'SN-0001-AB',
            'status' => 'available',
            'category_id' => $category->id,
            'purchase_date' => '2026-06-15',
        ]);

        // Assert the response redirects to the index page
        $response->assertRedirect(route('equipment.index'));
        // Assert the record exists in the database
        $this->assertDatabaseHas('equipment', [
            'name' => 'New Laptop',
            'serial_number' => 'SN-0001-AB',
        ]);
    }

    public function test_equipment_validation_rejects_missing_name(): void
    {
        // Create a category for the form submission
        $category = Category::factory()->create();

        // Simulate a POST with an empty name field
        $response = $this->post(route('equipment.store'), [
            'name' => '',
            'serial_number' => 'SN-0002-CD',
            'status' => 'available',
            'category_id' => $category->id,
        ]);

        // Assert validation failed on the name field
        $response->assertSessionHasErrors('name');
        // Assert the record was NOT created
        $this->assertDatabaseMissing('equipment', [
            'serial_number' => 'SN-0002-CD',
        ]);
    }
}
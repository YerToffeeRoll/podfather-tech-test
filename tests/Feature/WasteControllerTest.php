<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Customer\Waste;
use App\Models\User;

class WasteControllerTest extends TestCase
{
    use RefreshDatabase; // Ensures that the database is reset for each test to avoid side effects.

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_view_without_search()
    {
        $user = User::factory()->create(); // Create a user for authentication
        Waste::factory()->count(10)->create(); // Create some wastes

        $response = $this->actingAs($user)->get('/customer'); // Authenticate as the user

        $response->assertStatus(200);
        $response->assertViewIs('customer.waste.index');
        $response->assertViewHas('data');
        $response->assertSeeText('Waste Records');
    }

    public function test_index_view_with_search()
    {
        $user = User::factory()->create(); // Create a user for authentication
        $searchTerm = 'Specific Customer';
        Waste::factory()->create([
            'customer_name' => 'Specific Customer',
            'site' => 'Site A',
            'year' => 2021,
            'month' => '1',
            'waste_type' => 'Organic',
            'estimated_quantity' => 100,
            'actual_quantity' => 80,
        ]);
        Waste::factory()->count(5)->create(); // More waste records that shouldn't match

        $response = $this->actingAs($user)->get('/customer?search=' . $searchTerm); // Authenticate as the user

        $response->assertStatus(200);
        $response->assertViewIs('customer.waste.index');
        $response->assertViewHas('data');
        $response->assertSeeText('Specific Customer');
        $response->assertSeeText('Site A');
        $response->assertDontSeeText('Site B'); // Assuming 'Site B' is part of the non-matching records
    }
}

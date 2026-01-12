<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacturer;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        // Create necessary data for home page
        $category = Category::factory()->create();
        $manufacturer = Manufacturer::factory()->create();
        
        Product::factory()->count(4)->create([
            'category_id' => $category->id,
            'manufacturer_id' => $manufacturer->id,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

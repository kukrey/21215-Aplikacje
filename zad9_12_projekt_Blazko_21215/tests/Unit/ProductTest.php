<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_creation()
    {
        $product = Product::factory()->make();
        $this->assertInstanceOf(Product::class, $product);
        $this->assertNotEmpty($product->name);
        $this->assertNotEmpty($product->price);
    }
}

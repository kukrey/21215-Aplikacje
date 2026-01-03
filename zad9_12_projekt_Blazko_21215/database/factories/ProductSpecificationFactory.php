<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductSpecification;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSpecificationFactory extends Factory
{
    protected $model = ProductSpecification::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'key' => fake()->randomElement(['Waga', 'Wymiary', 'Materiał', 'Kolor', 'Moc', 'Napięcie', 'Gwarancja']),
            'value' => fake()->words(2, true),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'sku' => fake()->unique()->bothify('???-####'),
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(3),
            'price' => fake()->randomFloat(2, 10, 5000),
            'stock' => fake()->numberBetween(0, 100),
            'category_id' => Category::factory(),
            'manufacturer_id' => Manufacturer::factory(),
            'image_url' => 'https://via.placeholder.com/300x200/333/fff?text=' . urlencode(fake()->word()),
        ];
    }
}

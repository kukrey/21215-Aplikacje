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
        $specs = [
            'Waga' => fake()->numberBetween(50, 5000) . ' g',
            'Wymiary' => fake()->numberBetween(50, 300) . ' x ' . fake()->numberBetween(30, 200) . ' x ' . fake()->numberBetween(20, 150) . ' mm',
            'Materiał' => fake()->randomElement(['Tytan', 'Stal nierdzewna', 'Aluminium', 'Ceramika', 'Polimer wzmacniany']),
            'Kolor' => fake()->randomElement(['Srebrny', 'Czarny', 'Szary', 'Naturalny', 'Matowy']),
            'Moc' => fake()->numberBetween(5, 500) . ' W',
            'Napięcie' => fake()->randomElement(['12V', '24V', '48V', '110V', '220V']),
            'Gwarancja' => fake()->numberBetween(1, 5) . ' lat',
            'Temperatura pracy' => '-' . fake()->numberBetween(10, 40) . ' do +' . fake()->numberBetween(60, 120) . ' °C',
            'Stopień ochrony' => fake()->randomElement(['IP54', 'IP65', 'IP67', 'IP68']),
        ];
        
        $key = fake()->randomElement(array_keys($specs));
        
        return [
            'product_id' => Product::factory(),
            'key' => $key,
            'value' => $specs[$key],
        ];
    }
}

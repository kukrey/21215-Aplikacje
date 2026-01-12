<?php

namespace Database\Factories;

use App\Models\ShippingMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingMethodFactory extends Factory
{
    protected $model = ShippingMethod::class;

    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Kurier DPD',
                'Paczkomat InPost',
                'Kurier UPS',
                'Odbiór osobisty',
                'Poczta Polska'
            ]),
            'cost' => fake()->randomFloat(2, 5, 25),
            'delivery_days' => fake()->numberBetween(1, 7),
        ];
    }

    public function fast(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Kurier Ekspresowy',
            'cost' => 25.00,
            'delivery_days' => 1,
        ]);
    }

    public function standard(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Kurier Standard',
            'cost' => 15.00,
            'delivery_days' => 3,
        ]);
    }

    public function slow(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Poczta Ekonomiczna',
            'cost' => 8.00,
            'delivery_days' => 7,
        ]);
    }
}

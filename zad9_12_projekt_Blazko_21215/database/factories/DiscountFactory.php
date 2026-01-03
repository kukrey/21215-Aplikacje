<?php

namespace Database\Factories;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountFactory extends Factory
{
    protected $model = Discount::class;

    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-1 month', '+1 month');
        $endDate = fake()->dateTimeBetween($startDate, '+3 months');
        
        return [
            'code' => fake()->unique()->bothify('???###'),
            'percentage' => fake()->randomElement([5, 10, 15, 20, 25, 30, 40, 50]),
            'fixed_amount' => null,
            'max_uses' => fake()->optional()->numberBetween(10, 1000),
            'uses' => fake()->numberBetween(0, 50),
            'valid_from' => $startDate,
            'valid_until' => $endDate,
        ];
    }
}

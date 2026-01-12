<?php

namespace Database\Factories;

use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderStatusFactory extends Factory
{
    protected $model = OrderStatus::class;

    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'W trakcie realizacji',
                'Wysłane',
                'Zrealizowane',
                'Anulowane',
                'Zwrot'
            ]),
            'color' => fake()->randomElement(['primary', 'info', 'success', 'danger', 'warning']),
        ];
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'W trakcie realizacji',
            'color' => 'primary',
        ]);
    }

    public function shipped(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Wysłane',
            'color' => 'info',
        ]);
    }

    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Zrealizowane',
            'color' => 'success',
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Anulowane',
            'color' => 'danger',
        ]);
    }

    public function refund(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Zwrot',
            'color' => 'warning',
        ]);
    }
}

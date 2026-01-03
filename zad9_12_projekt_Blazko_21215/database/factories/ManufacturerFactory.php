<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManufacturerFactory extends Factory
{
    protected $model = Manufacturer::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->company(),
            'country' => fake()->country(),
            'website' => fake()->optional()->url(),
        ];
    }
}

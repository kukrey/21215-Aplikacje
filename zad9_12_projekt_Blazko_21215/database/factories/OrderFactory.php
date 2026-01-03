<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\ShippingMethod;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'order_status_id' => OrderStatus::inRandomOrder()->first()?->id ?? 1,
            'shipping_method_id' => ShippingMethod::inRandomOrder()->first()?->id ?? 1,
            'customer_name' => fake()->name(),
            'customer_email' => fake()->email(),
            'customer_phone' => fake()->phoneNumber(),
            'shipping_address' => fake()->address(),
            'shipping_cost' => fake()->randomFloat(2, 10, 50),
            'total_price' => fake()->randomFloat(2, 50, 5000),
            'discount_amount' => fake()->randomFloat(2, 0, 100),
        ];
    }
}

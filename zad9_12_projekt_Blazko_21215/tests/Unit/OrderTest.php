<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderStatus;
use App\Models\ShippingMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_belongs_to_user()
    {
        // Create required dependencies
        $orderStatus = OrderStatus::create(['name' => 'Pending', 'color' => '#000000']);
        $shippingMethod = ShippingMethod::create([
            'name' => 'Standard',
            'cost' => 10.00,
            'delivery_days' => 5,
            'description' => 'Standard delivery'
        ]);
        
        $user = User::factory()->create();
        $order = Order::factory()->create([
            'user_id' => $user->id,
            'order_status_id' => $orderStatus->id,
            'shipping_method_id' => $shippingMethod->id,
        ]);
        $this->assertEquals($user->id, $order->user->id);
    }
}

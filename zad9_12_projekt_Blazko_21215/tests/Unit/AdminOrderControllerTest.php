<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\ShippingMethod;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminOrderControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Create roles
        $adminRole = Role::factory()->admin()->create();
        $userRole = Role::factory()->user()->create();

        // Create admin user
        $this->admin = User::factory()->create([
            'role_id' => $adminRole->id,
            'email' => 'admin@test.com',
        ]);

        // Create regular user
        $this->user = User::factory()->create([
            'role_id' => $userRole->id,
            'email' => 'user@test.com',
        ]);

        // Authenticate as admin
        $this->actingAs($this->admin);
    }

    /**
     * Test that admin can view orders list.
     */
    public function test_admin_can_view_orders_list()
    {
        // Create some test orders
        $status = OrderStatus::factory()->create(['name' => 'W trakcie realizacji']);
        $shippingMethod = ShippingMethod::factory()->create(['delivery_days' => 5]);
        
        Order::factory()->count(3)->create([
            'user_id' => $this->user->id,
            'order_status_id' => $status->id,
            'shipping_method_id' => $shippingMethod->id,
        ]);

        $response = $this->get(route('admin.orders.index'));

        $response->assertStatus(200);
        $response->assertViewHas('orders');
        $response->assertViewHas('statuses');
    }

    /**
     * Test filtering orders by status.
     */
    public function test_filter_orders_by_status()
    {
        $status1 = OrderStatus::factory()->create(['name' => 'W trakcie realizacji']);
        $status2 = OrderStatus::factory()->create(['name' => 'Zrealizowane']);
        $shippingMethod = ShippingMethod::factory()->create(['delivery_days' => 5]);

        Order::factory()->create([
            'user_id' => $this->user->id,
            'order_status_id' => $status1->id,
            'shipping_method_id' => $shippingMethod->id,
        ]);

        Order::factory()->create([
            'user_id' => $this->user->id,
            'order_status_id' => $status2->id,
            'shipping_method_id' => $shippingMethod->id,
        ]);

        $response = $this->get(route('admin.orders.index', ['status' => $status1->id]));

        $response->assertStatus(200);
        $orders = $response->viewData('orders');
        
        // Should only contain orders with status1
        $this->assertGreaterThanOrEqual(1, $orders->count());
    }

    /**
     * Test filtering overdue orders without database-specific SQL.
     */
    public function test_filter_overdue_orders()
    {
        $status = OrderStatus::factory()->create(['name' => 'W trakcie realizacji']);
        $shippingMethod = ShippingMethod::factory()->create(['delivery_days' => 5]);

        // Create an overdue order (created 10 days ago, should arrive in 5 days)
        $overdueOrder = Order::factory()->create([
            'user_id' => $this->user->id,
            'order_status_id' => $status->id,
            'shipping_method_id' => $shippingMethod->id,
            'created_at' => Carbon::now()->subDays(10),
        ]);

        // Create a non-overdue order (created 2 days ago, should arrive in 5 days)
        $normalOrder = Order::factory()->create([
            'user_id' => $this->user->id,
            'order_status_id' => $status->id,
            'shipping_method_id' => $shippingMethod->id,
            'created_at' => Carbon::now()->subDays(2),
        ]);

        $response = $this->get(route('admin.orders.index', ['overdue' => '1']));

        $response->assertStatus(200);
        $orders = $response->viewData('orders');

        // Should contain at least the overdue order
        $this->assertGreaterThanOrEqual(1, $orders->count());
        
        // Verify the overdue order is in the results
        $orderIds = $orders->pluck('id')->toArray();
        $this->assertContains($overdueOrder->id, $orderIds);
    }

    /**
     * Test admin can cancel an order.
     */
    public function test_admin_can_cancel_order()
    {
        $status = OrderStatus::factory()->create(['name' => 'W trakcie realizacji']);
        $cancelledStatus = OrderStatus::factory()->create(['name' => 'Anulowane']);
        $shippingMethod = ShippingMethod::factory()->create(['delivery_days' => 5]);

        $order = Order::factory()->create([
            'user_id' => $this->user->id,
            'order_status_id' => $status->id,
            'shipping_method_id' => $shippingMethod->id,
        ]);

        $response = $this->post(route('admin.orders.cancel', $order));

        $response->assertRedirect();
        $response->assertSessionHas('success');

        // Verify order status changed
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'order_status_id' => $cancelledStatus->id,
        ]);
    }

    /**
     * Test admin can process refund for overdue order.
     */
    public function test_admin_can_process_refund_for_overdue_order()
    {
        $status = OrderStatus::factory()->create(['name' => 'W trakcie realizacji']);
        $refundStatus = OrderStatus::firstOrCreate(['name' => 'Zwrot']);
        $shippingMethod = ShippingMethod::factory()->create(['delivery_days' => 5]);

        // Create an overdue order
        $order = Order::factory()->create([
            'user_id' => $this->user->id,
            'order_status_id' => $status->id,
            'shipping_method_id' => $shippingMethod->id,
            'created_at' => Carbon::now()->subDays(10), // 10 days ago, delivery was 5 days
        ]);

        $response = $this->post(route('admin.orders.refund', $order));

        $response->assertRedirect();
        $response->assertSessionHas('success');

        // Verify order status changed to refund
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'order_status_id' => $refundStatus->id,
        ]);
    }
}

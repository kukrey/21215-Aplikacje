<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Manufacturer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductSpecification;
use App\Models\Review;
use App\Models\Role;
use App\Models\ShippingMethod;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin'],
            ['description' => 'Administrator z dostępem do wszystkich funkcji']
        );
        
        $userRole = Role::firstOrCreate(
            ['name' => 'user'],
            ['description' => 'Zwykły użytkownik sklepu']
        );

        // Create admin user
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('password123'),
                'role_id' => $adminRole->id,
            ]
        );

        // Create test user
        User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password123'),
                'role_id' => $userRole->id,
            ]
        );

        // Create order statuses
        $pendingStatus = OrderStatus::firstOrCreate(['name' => 'pending'], ['color' => '#ffc107']);
        $processingStatus = OrderStatus::firstOrCreate(['name' => 'processing'], ['color' => '#17a2b8']);
        $shippedStatus = OrderStatus::firstOrCreate(['name' => 'shipped'], ['color' => '#0275d8']);
        $deliveredStatus = OrderStatus::firstOrCreate(['name' => 'delivered'], ['color' => '#28a745']);
        $cancelledStatus = OrderStatus::firstOrCreate(['name' => 'cancelled'], ['color' => '#dc3545']);

        // Create shipping methods
        $standardShipping = ShippingMethod::firstOrCreate(
            ['name' => 'Standard'],
            ['cost' => 15.00, 'delivery_days' => 5, 'description' => 'Kurier - dostawa pod wskazany adres']
        );
        
        $expressShipping = ShippingMethod::firstOrCreate(
            ['name' => 'Express'],
            ['cost' => 30.00, 'delivery_days' => 2, 'description' => 'Kurier - przesyłka ekspresowa']
        );
        
        $paczkomatShipping = ShippingMethod::firstOrCreate(
            ['name' => 'Paczkomat InPost'],
            ['cost' => 12.00, 'delivery_days' => 3, 'description' => 'Odbiór z paczkomatu']
        );

        // Generate 100 users
        User::factory(98)->create(['role_id' => $userRole->id]);

        // Generate 100 categories
        Category::factory(100)->create();

        // Generate 100 manufacturers
        Manufacturer::factory(100)->create();

        // Generate 100 products (using existing categories and manufacturers)
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        
        Product::factory(100)->create([
            'category_id' => fn() => $categories->random()->id,
            'manufacturer_id' => fn() => $manufacturers->random()->id,
        ]);

        // Generate 100 product specifications
        $products = Product::all();
        ProductSpecification::factory(100)->create([
            'product_id' => fn() => $products->random()->id,
        ]);

        // Generate 100 reviews
        $users = User::all();
        Review::factory(100)->create([
            'user_id' => fn() => $users->random()->id,
            'product_id' => fn() => $products->random()->id,
        ]);

        // Generate 100 discounts (code-based, not product-specific)
        Discount::factory(100)->create();

        // Generate 100 orders
        $statuses = OrderStatus::all();
        $shippingMethods = ShippingMethod::all();
        
        Order::factory(100)->create([
            'user_id' => fn() => $users->random()->id,
            'order_status_id' => fn() => $statuses->random()->id,
            'shipping_method_id' => fn() => $shippingMethods->random()->id,
        ])->each(function ($order) use ($products) {
            // Create 1-5 order items for each order
            $itemCount = rand(1, 5);
            $totalPrice = 0;
            
            for ($i = 0; $i < $itemCount; $i++) {
                $product = $products->random();
                $quantity = rand(1, 3);
                $price = $product->price;
                
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price_at_purchase' => $price,
                ]);
                
                $totalPrice += ($price * $quantity);
            }
            
            // Update order total
            $order->update(['total_price' => $totalPrice]);
        });

        $this->command->info('Database seeded successfully with 100 records per table!');
    }
}

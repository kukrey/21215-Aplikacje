<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
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
        OrderStatus::firstOrCreate(['name' => 'pending'], ['color' => '#ffc107']);
        OrderStatus::firstOrCreate(['name' => 'processing'], ['color' => '#17a2b8']);
        OrderStatus::firstOrCreate(['name' => 'shipped'], ['color' => '#0275d8']);
        OrderStatus::firstOrCreate(['name' => 'delivered'], ['color' => '#28a745']);
        OrderStatus::firstOrCreate(['name' => 'cancelled'], ['color' => '#dc3545']);

        // Create shipping methods
        ShippingMethod::firstOrCreate(
            ['name' => 'Standard'],
            ['cost' => 15.00, 'delivery_days' => 5]
        );
        
        ShippingMethod::firstOrCreate(
            ['name' => 'Express'],
            ['cost' => 30.00, 'delivery_days' => 2]
        );
        
        ShippingMethod::firstOrCreate(
            ['name' => 'Drone'],
            ['cost' => 50.00, 'delivery_days' => 1, 'description' => 'Wysyłka dronem (wymagane zatwierdzenie Fazbear Ent.)']
        );
    }
}

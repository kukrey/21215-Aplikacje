<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition()
    {
        $roles = ['admin', 'user', 'moderator'];
        
        return [
            'name' => $this->faker->randomElement($roles),
        ];
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'admin',
            ];
        });
    }

    public function user()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'user',
            ];
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingMethod extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'cost', 'delivery_days', 'description'];

    protected $casts = [
        'cost' => 'decimal:2',
        'delivery_days' => 'integer',
    ];

    /**
     * Get the orders for this shipping method.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price_at_purchase'];

    protected $casts = [
        'quantity' => 'integer',
        'price_at_purchase' => 'decimal:2',
    ];

    /**
     * Get the order for this item.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product for this item.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the total price for this item.
     */
    public function getTotalPrice(): float
    {
        return $this->price_at_purchase * $this->quantity;
    }
}

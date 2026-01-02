<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'code',
        'percentage',
        'fixed_amount',
        'max_uses',
        'uses',
        'valid_from',
        'valid_until',
    ];

    protected $casts = [
        'percentage' => 'decimal:2',
        'fixed_amount' => 'decimal:2',
        'valid_from' => 'datetime',
        'valid_until' => 'datetime',
    ];

    /**
     * Check if discount is valid.
     */
    public function isValid(): bool
    {
        $now = now();
        return $now->between($this->valid_from, $this->valid_until) &&
               ($this->max_uses === null || $this->uses < $this->max_uses);
    }

    /**
     * Get the discount value for a price.
     */
    public function calculateDiscount(float $price): float
    {
        if ($this->percentage) {
            return ($price * $this->percentage) / 100;
        }
        return $this->fixed_amount ?? 0;
    }
}

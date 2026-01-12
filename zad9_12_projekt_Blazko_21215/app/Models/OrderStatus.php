<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderStatus extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = ['name', 'color'];

    /**
     * Get the orders for this status.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}

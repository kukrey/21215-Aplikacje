<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manufacturer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'country', 'description', 'website'];

    /**
     * Get the products for this manufacturer.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}

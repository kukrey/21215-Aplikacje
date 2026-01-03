<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSpecification extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'key', 'value'];

    /**
     * Get the product for this specification.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_review_belongs_to_user_and_product()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $review = Review::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);
        $this->assertEquals($user->id, $review->user->id);
        $this->assertEquals($product->id, $review->product->id);
    }
}

<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        $comments = [
            'Doskonała część, idealnie pasuje do mojego robota!',
            'Najwyższa jakość wykonania. Bardzo polecam!',
            'Otrzymałem dokładnie to, czego oczekiwałem. Świetny produkt.',
            'Część pracuje niezawodnie od kilku miesięcy.',
            'Doskonały materiał i precyzyjne wykonanie.',
            'Spełnia wszystkie moje oczekiwania. Godne polecenia.',
            'Szybka dostawa i idealny stan produktu.',
            'Najlepsza cena za taką jakość na rynku!',
            'Kompatybilna z różnymi modelami. Polecam!',
            'Wydajna i niezawodna. Już drugi raz kupuję.',
        ];
        
        return [
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'rating' => fake()->numberBetween(3, 5),
            'comment' => fake()->randomElement($comments),
        ];
    }
}

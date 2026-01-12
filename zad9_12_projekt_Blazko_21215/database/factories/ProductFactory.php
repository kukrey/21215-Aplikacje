<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    private array $robotParts = [
        'Ręka', 'Noga', 'Torso', 'Głowa', 'Łokieć', 'Kolano', 'Ramię',
        'Nadgarstka', 'Kostka', 'Kciuk', 'Palec', 'Dłoń', 'Stopa',
        'Zatrzask', 'Endoszkielet', 'Panel sterowania', 'Czujnik'
    ];

    private array $adjectives = [
        'Tytanowa', 'Żelazna', 'Stalowa', 'Chromowana', 'Ceramiczna',
        'Niklowana', 'Polimerna', 'Gumowa', 'Magnetyczna', 'Precyzyjna',
        'Wytrzymała', 'Elastyczna', 'Kompatybilna', 'Uniwersalna'
    ];

    public function definition(): array
    {
        $part = fake()->randomElement($this->robotParts);
        $adjective = fake()->randomElement($this->adjectives);
        
        return [
            'sku' => fake()->unique()->bothify('RB-####'),
            'name' => $adjective . ' ' . $part,
            'description' => 'Wysokiej jakości ' . strtolower($adjective) . ' ' . strtolower($part) . ' robota. ' .
                'Precyzyjnie wykonana część zapewniająca niezawodne działanie. ' .
                'Idealna zastępczość dla systemów robotycznych i automatycznych.',
            'price' => fake()->randomFloat(2, 15, 8500),
            'stock' => fake()->numberBetween(0, 150),
            'category_id' => Category::factory(),
            'manufacturer_id' => Manufacturer::factory(),
            'image_url' => 'https://via.placeholder.com/300x200/333/fff?text=' . urlencode($adjective . '+' . $part),
        ];
    }
}

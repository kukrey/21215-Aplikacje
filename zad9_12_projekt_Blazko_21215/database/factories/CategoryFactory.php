<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    private static int $categoryIndex = 0;

    private array $categories = [
        'Części Górne',
        'Części Dolne',
        'Elementy Strukturalne',
        'Komponenty Sterujące',
        'Części Złączne',
        'Systemy Sensoryczne',
        'Materiały Uzupełniające'
    ];

    private array $categoryDescriptions = [
        'Części Górne' => 'Wysoko zmotoryzowane części górne robota obejmujące ręce, ramiona i części tułowia.',
        'Części Dolne' => 'Solidne nogi i kostki zapewniające stabilność i mobilność robota.',
        'Elementy Strukturalne' => 'Wytrzymały endoszkielet i ramy strukturalne naszych robotów.',
        'Komponenty Sterujące' => 'Zaawansowane systemy sterowania i panele regulacyjne.',
        'Części Złączne' => 'Precyzyjne zatrząski i łączniki dla każdego robota.',
        'Systemy Sensoryczne' => 'Czujniki i detektory dla pełnej świadomości otoczenia.',
        'Materiały Uzupełniające' => 'Wszelkie materiały dodatkowe i akcesoria dla robotów.'
    ];

    public function definition(): array
    {
        $categoryName = $this->categories[self::$categoryIndex % count($this->categories)];
        self::$categoryIndex++;
        
        return [
            'name' => $categoryName,
            'slug' => fake()->slug(),
            'description' => $this->categoryDescriptions[$categoryName] ?? 'Kategoria części robotów wysokiej jakości.',
        ];
    }
}

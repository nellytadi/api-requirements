<?php

namespace Database\Factories\Domains\Product\Models;

use App\Domains\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'name' => $this->faker->word,
            'category' => $this->faker->randomElement(['insurance','vehicle']),
            'price' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}


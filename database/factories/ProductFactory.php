<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $product_name = fake()->unique()->words( $nb = 4, $asText = true ),
            'slug' => str::slug( $product_name ),
            'short_description' => fake()->text(200),
            'description' => fake()->text(500),
            'regular_price' => fake()->numberBetween(10,500),
            'SKU' => 'DIGI' . fake()->unique()->numberBetween(10,500),
            'stock_status' => 'instock',
            'quantity'  => fake()->numberBetween(100,200),
            'image'  => 'digital_1'. fake()->unique()->numberBetween(1,30) .'.jpg',
            'category_id' => fake()->numberBetween(1,5),
        ];
    }
}

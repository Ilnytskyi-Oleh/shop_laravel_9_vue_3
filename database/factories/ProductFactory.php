<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $range = rand(2,3);
        $price = $this->faker->randomNumber($range);
        $oldPrice = $price + rand(5, 100);
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->words(5, 10),
            'content' => $this->faker->realTextBetween(10, 30),
            'preview_image' => $this->faker->imageUrl,
            'price' => $price,
            'old_price' => $oldPrice,
            'count' => rand(1,1000),
            'is_published' => (bool)rand(0, 1),
            'category_id' => (bool)rand(1, 5),
        ];
    }
}

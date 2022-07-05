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
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->word(10),
            'content' => $this->faker->word(50),
            'preview_image' => $this->faker->imageUrl,
            'price' => $this->faker->randomNumber($range),
            'old_price' => $this->faker->randomNumber($range),
            'count' => $this->faker->randomNumber($range),
            'is_published' => (bool)rand(0, 1),
            'category_id' => (bool)rand(1, 5),
        ];
    }
}

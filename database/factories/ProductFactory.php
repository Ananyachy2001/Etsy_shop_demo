<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            // No need to specify 'product_id' as it's auto-incremented
            'product_name' => $this->faker->words(3, true),
            'product_description' => $this->faker->paragraph,
            'product_image' => 'product_image_' . $this->faker->unique()->randomNumber(5) . '.jpg', // Use a unique random number
            'product_short_name' => $this->faker->word,
            'product_long_name' => $this->faker->sentence,
            'producer' => $this->faker->company,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

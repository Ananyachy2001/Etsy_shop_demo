<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    protected $model = ProductVariant::class;

    public function definition()
    {
        return [
            // No need to specify 'product_variant_id' as it's auto-incremented
            'product_id' => function () {
                return Product::inRandomOrder()->first()->product_id;
            },
            'product_variant_sku' => $this->faker->unique()->ean13,
            'variant_name_short' => $this->faker->word,
            'variant_name_long' => $this->faker->sentence,
            'variant_price' => $this->faker->randomFloat(2, 1, 100), // Random price between 1 and 100
            'variant_stock' => $this->faker->numberBetween(0, 100), // Random stock between 0 and 100
            'product_variant_short_name' => $this->faker->word,
            'product_variant_long_name' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

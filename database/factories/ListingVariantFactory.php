<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\ListingVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListingVariant>
 */
class ListingVariantFactory extends Factory
{
    protected $model = ListingVariant::class;

    public function definition()
    {
        return [
            // No need to specify 'listing_variant_id' as it's auto-incremented
            'listing_id' => function () {
                return Listing::inRandomOrder()->first()->listing_id;
            },
            'variant_name' => $this->faker->word,
            'variant_price' => $this->faker->randomFloat(2, 1, 100), // Random price between 1 and 100
            'variant_stock' => $this->faker->numberBetween(0, 100), // Random stock between 0 and 100
            'variant_image' => 'variant_image_' . $this->faker->unique()->randomNumber(5) . '.jpg',
            'variant_description' => $this->faker->paragraph,
            'variant_sku' => $this->faker->unique()->uuid, // Use a unique UUID
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

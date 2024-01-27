<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\ReceivedOrder;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    protected $model = Listing::class;

    public function definition()
    {
        return [
            // No need to specify 'listing_id' as it's auto-incremented
            'shop_id' => function () {
                return Shop::inRandomOrder()->first()->shop_id;
            },
            'received_order_id' => function () {
                return ReceivedOrder::inRandomOrder()->first()->received_order_id;
            },
            'listing_sku' => $this->faker->unique()->ean13,
            'listing_name' => $this->faker->words(3, true),
            'listing_short_name' => $this->faker->word,
            'listing_long_name' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

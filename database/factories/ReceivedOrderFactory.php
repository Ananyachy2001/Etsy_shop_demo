<?php

namespace Database\Factories;

use App\Models\ReceivedOrder;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReceivedOrder>
 */
class ReceivedOrderFactory extends Factory
{
    protected $model = ReceivedOrder::class;

    public function definition()
    {
        return [
            // No need to specify 'received_order_id' as it's auto-incremented
            'shop_id' => function () {
                return Shop::inRandomOrder()->first()->shop_id;
            },
            'user_id' => function () {
                return User::inRandomOrder()->first()->user_id;
            },
            'client_name' => $this->faker->name,
            'client_address' => $this->faker->address,
            'ordered_listings_sku' => $this->faker->unique()->ean13 . ',' . $this->faker->unique()->ean13,
            'order_total' => $this->faker->randomFloat(2, 10, 1000), // Random total between 10 and 1000
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    protected $model = Collection::class;

    public function definition()
    {
        return [
            'shop_id' => function () {
                return Shop::inRandomOrder()->first()->shop_id;
            },
            'collection_name' => $this->faker->sentence, // Generate a random sentence
            'collection_image' => 'collection_image_' . $this->faker->unique()->numberBetween(1, 5) . '.jpg',
            'collection_description' => $this->faker->paragraph,
            'collection_short_name' => $this->faker->word,
            'collection_long_name' => $this->faker->sentence,
        ];
    }
}

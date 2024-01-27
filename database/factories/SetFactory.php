<?php

namespace Database\Factories;

use App\Models\Collection;
use App\Models\Listing;
use App\Models\Set;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Set>
 */
class SetFactory extends Factory
{
    protected $model = Set::class;

    public function definition()
    {
        return [
            // No need to specify 'set_id' as it's auto-incremented
            'collection_id' => function () {
                return Collection::inRandomOrder()->first()->collection_id;
            },
            'listing_id' => function () {
                return Listing::inRandomOrder()->first()->listing_id;
            },
            'set_name' => $this->faker->words(3, true),
            'set_image' => 'set_image_' . $this->faker->unique()->randomNumber(5) . '.jpg', // Use a unique random number
            'set_description' => $this->faker->paragraph,
            'set_short_name' => $this->faker->word,
            'set_long_name' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

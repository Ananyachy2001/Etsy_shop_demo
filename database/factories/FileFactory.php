<?php

namespace Database\Factories;

use App\Models\Collection;
use App\Models\File;
use App\Models\Set;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    protected $model = File::class;

    public function definition()
    {
        return [
            // No need to specify 'file_id' as it's auto-incremented
            'set_id' => function () {
                return Set::inRandomOrder()->first()->set_id;
            },
            'collection_id' => function () {
                return Collection::inRandomOrder()->first()->collection_id;
            },
            'file_name' => $this->faker->word . '.pdf',
            'file_type' => 'application/pdf',
            'file_path' => 'files/' . $this->faker->unique()->uuid . '.pdf',
            'file_preview' => 'previews/' . $this->faker->unique()->uuid . '.jpg',
            'file_info' => $this->faker->paragraph,
            'design_name' => $this->faker->word,
            'design_variant_short_name' => $this->faker->word,
            'design_variant_long_name' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

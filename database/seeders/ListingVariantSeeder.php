<?php

namespace Database\Seeders;

use App\Models\ListingVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListingVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ListingVariant::factory(5)->create();
    }
}

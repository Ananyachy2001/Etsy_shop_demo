<?php

namespace Database\Seeders;

use App\Models\ReceivedOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReceivedOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReceivedOrder::factory(5)->create();
    }
}

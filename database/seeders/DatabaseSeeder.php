<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

                // Call the seeders for each table
                $this->call([
                    UserSeeder::class,
                    ShopSeeder::class,
                    CollectionSeeder::class,
                    ReceivedOrderSeeder::class,
                    ListingSeeder::class,
                    ListingVariantSeeder::class,
                    SetSeeder::class,
                    FileSeeder::class,
                    ProductSeeder::class,
                    ProductVariantSeeder::class,
                ]);

                // Create a super admin user
                User::create([
                    'name' => 'Super Admin',
                    'username' => 'superadmin',
                    'email' => 'superadmin@example.com',
                    'password' => bcrypt('1234567'), // Use bcrypt() to hash the password
                    'user_role' => 'Admin', // Assuming 'Admin' is the role for super admins
                ]);
    }
}

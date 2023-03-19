<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserRoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DestinationRegionSeeder::class);
        $this->call(DestinationTagSeeder::class);
        $this->call(DestinationSeeder::class);
        $this->call(EventSeeder::class);
    }
}

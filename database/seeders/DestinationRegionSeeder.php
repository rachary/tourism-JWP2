<?php

namespace Database\Seeders;

use App\Models\DestinationRegion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DestinationRegion::insert([
            ['name'=>'Surabaya Barat'],
            ['name'=>'Surabaya Timur'],
            ['name'=>'Surabaya Selatan'],
            ['name'=>'Surabaya Utara'],
            ['name'=>'Surabaya Pusat'],
        ]);
    }
}

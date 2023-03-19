<?php

namespace Database\Seeders;

use App\Models\DestinationTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DestinationTag::insert([
            ['name'=>'City Park'],
            ['name'=>'Sport'],
            ['name'=>'Museum'],
            ['name'=>'Pantai'],
            ['name'=>'Pasar'],
            ['name'=>'Outdoor & Nature'],
            ['name'=>'Family Activity'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Stringable;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('admin'),
                'phone' => '085645624244',
                'user_role_id' => 1,
            ],
        );
        User::insert(
            [
                'name' => 'contributor',
                'email' => 'contri@mail.com',
                'password' => bcrypt('contri'),
                'phone' => '08985647231',
                'user_role_id' => 2,
            ],
        );
    }
}

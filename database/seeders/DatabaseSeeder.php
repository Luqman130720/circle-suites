<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdministratorSeeder::class,
            CircleRoleSeeder::class,
            CirclePositionSeeder::class,
        ]);
    }
}   

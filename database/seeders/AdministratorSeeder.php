<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@circle-suites.test',
            ],
            [
                'name' => 'Administrator',
                'employee_id' => 'ADMIN-001',
                'profile_photo' => null,
                'division' => 'Management',
                'position' => 'Administrator',
                'role' => 'admin',
                'status' => 'active',
                'password' => Hash::make('Admin@12345'),
            ]
        );
    }
}
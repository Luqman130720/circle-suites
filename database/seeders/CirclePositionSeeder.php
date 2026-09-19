<?php

namespace Database\Seeders;

use App\Models\CirclePosition;
use App\Models\CircleRole;
use Illuminate\Database\Seeder;

class CirclePositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            [
                'name' => 'SPV Operasional',
                'division' => 'Installer / Technician',
                'role' => 'spv_operation',
            ],
            [
                'name' => 'Installer',
                'division' => 'Installer / Technician',
                'role' => 'installer',
            ],
            [
                'name' => 'Junior Installer',
                'division' => 'Installer / Technician',
                'role' => 'junior_installer',
            ],

            [
                'name' => 'Admin',
                'division' => 'Warehouse & Inventory',
                'role' => 'warehouse_admin',
            ],
            [
                'name' => 'Staff',
                'division' => 'Warehouse & Inventory',
                'role' => 'staff',
            ],
            [
                'name' => 'Helper',
                'division' => 'Warehouse & Inventory',
                'role' => 'helper',
            ],

            [
                'name' => 'Marketing Project',
                'division' => 'Sales & Marketing',
                'role' => 'marketing',
            ],
            [
                'name' => 'Marketing Eksekutif',
                'division' => 'Sales & Marketing',
                'role' => 'marketing',
            ],
        ];

        foreach ($positions as $position) {
            $role = CircleRole::query()
                ->where('slug', $position['role'])
                ->where('division', $position['division'])
                ->first();

            CirclePosition::updateOrCreate(
                [
                    'name' => $position['name'],
                    'division' => $position['division'],
                ],
                [
                    'role_id' => $role?->id,
                    'is_active' => true,
                ]
            );
        }
    }
}

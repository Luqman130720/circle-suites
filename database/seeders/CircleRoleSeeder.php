<?php

namespace Database\Seeders;

use App\Models\CircleRole;
use Illuminate\Database\Seeder;

class CircleRoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            // =====================================================
            // INSTALLER / TECHNICIAN
            // =====================================================

            [
                'name' => 'Administrator',
                'slug' => 'admin',
                'division' => 'Installer / Technician',
                'description' => 'Administrator dengan akses penuh pada workspace.',
            ],

            [
                'name' => 'SPV Operation',
                'slug' => 'spv_operation',
                'division' => 'Installer / Technician',
                'description' => 'Supervisor operasional untuk pengelolaan aktivitas dan tim lapangan.',
            ],

            [
                'name' => 'SPV Technical',
                'slug' => 'spv_technical',
                'division' => 'Installer / Technician',
                'description' => 'Supervisor yang bertanggung jawab terhadap aspek teknis pekerjaan.',
            ],

            [
                'name' => 'Team Leader',
                'slug' => 'team_leader',
                'division' => 'Installer / Technician',
                'description' => 'Pemimpin tim dalam pelaksanaan pekerjaan lapangan.',
            ],

            [
                'name' => 'Installer',
                'slug' => 'installer',
                'division' => 'Installer / Technician',
                'description' => 'Pelaksana pekerjaan instalasi dan maintenance lapangan.',
            ],

            [
                'name' => 'Junior Installer',
                'slug' => 'junior_installer',
                'division' => 'Installer / Technician',
                'description' => 'Installer junior yang bekerja di bawah supervisi tim.',
            ],

            [
                'name' => 'Corporate Coordinator',
                'slug' => 'corporate_coordinator',
                'division' => 'Installer / Technician',
                'description' => 'Koordinator yang menghubungkan aktivitas operasional dengan kebutuhan perusahaan.',
            ],


            // =====================================================
            // WAREHOUSE & INVENTORY
            // =====================================================

            [
                'name' => 'Warehouse Admin',
                'slug' => 'warehouse_admin',
                'division' => 'Warehouse & Inventory',
                'description' => 'Administrator untuk pengelolaan warehouse dan inventory.',
            ],

            [
                'name' => 'Inventory',
                'slug' => 'inventory',
                'division' => 'Warehouse & Inventory',
                'description' => 'Pengelola data dan aktivitas inventory.',
            ],

            [
                'name' => 'Staff',
                'slug' => 'staff',
                'division' => 'Warehouse & Inventory',
                'description' => 'Staff operasional warehouse dan inventory.',
            ],

            [
                'name' => 'Helper',
                'slug' => 'helper',
                'division' => 'Warehouse & Inventory',
                'description' => 'Helper untuk mendukung aktivitas operasional warehouse.',
            ],


            // =====================================================
            // SALES & MARKETING
            // =====================================================

            [
                'name' => 'Marketing Admin',
                'slug' => 'marketing_admin',
                'division' => 'Sales & Marketing',
                'description' => 'Administrator untuk aktivitas Sales & Marketing.',
            ],

            [
                'name' => 'Marketing',
                'slug' => 'marketing',
                'division' => 'Sales & Marketing',
                'description' => 'Pengelola aktivitas sales dan marketing.',
            ],
        ];

        foreach ($roles as $role) {
            CircleRole::updateOrCreate(
                [
                    'slug' => $role['slug'],
                    'division' => $role['division'],
                ],
                [
                    'name' => $role['name'],
                    'description' => $role['description'],
                    'is_active' => true,
                ]
            );
        }
    }
}

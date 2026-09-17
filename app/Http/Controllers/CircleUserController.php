<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CircleUserController extends Controller
{
    // =========================================================
    // UPDATE USER
    // =========================================================

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'employee_id' => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('users', 'employee_id')
                    ->ignore($user->id),
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($user->id),
            ],

            'division' => [
                'required',
                'string',
                Rule::in([
                    'Installer / Technician',
                    'Warehouse & Inventory',
                    'Sales & Marketing',
                ]),
            ],

            'position' => [
                'required',
                'string',
            ],

            'role' => [
                'required',
                Rule::in([
                    'admin',

                    'installer',
                    'junior_installer',
                    'team_leader',
                    'spv_technical',
                    'spv_operation',
                    'corporate_coordinator',

                    'inventory',
                    'warehouse_admin',
                    'staff',
                    'helper',

                    'marketing',
                    'marketing_admin',

                    'administrator',
                    'finance',
                    'finance_admin',
                    'hr',
                    'hr_admin',
                ]),
            ],

            'status' => [
                'required',
                'string',
                Rule::in([
                    'pending',
                    'active',
                    'inactive',
                    'rejected',
                ]),
            ],
        ]);

        // =====================================================
        // DIVISION → POSITION VALIDATION
        // =====================================================

        $positions = [
            'Installer / Technician' => [
                'SPV Operasional',
                'Technical',
                'Installer',
            ],

            'Warehouse & Inventory' => [
                'Admin',
                'Staff',
                'Helper',
            ],

            'Sales & Marketing' => [
                'Marketing Project',
                'Marketing Eksekutif',
            ],
        ];

        if (! in_array(
            $validated['position'],
            $positions[$validated['division']] ?? [],
            true
        )) {
            return back()
                ->withInput()
                ->withErrors([
                    'position' =>
                    'Jabatan tidak sesuai dengan divisi yang dipilih.',
                ]);
        }

        // =====================================================
        // UPDATE USER
        // =====================================================

        $user->update([
            'name' => $validated['name'],
            'employee_id' => $validated['employee_id'] ?? null,
            'email' => $validated['email'],
            'division' => $validated['division'],
            'position' => $validated['position'],
            'role' => $validated['role'] ?? null,
            'status' => $validated['status'],
        ]);

        return back()->with(
            'status',
            'Data user berhasil diperbarui.'
        );
    }


    // =========================================================
    // APPROVE USER
    // =========================================================

    public function approve(Request $request, User $user)
    {
        // =====================================================
        // PASTIKAN STATUS USER MASIH PENDING
        // =====================================================

        if ($user->status !== 'pending') {
            return back()->withErrors([
                'user' =>
                'User ini tidak berada dalam status pending.',
            ]);
        }

        // =====================================================
        // VALIDASI DATA APPROVAL
        // =====================================================

        $validated = $request->validate([
            'division' => [
                'required',
                'string',
                Rule::in([
                    'Installer / Technician',
                    'Warehouse & Inventory',
                    'Sales & Marketing',
                ]),
            ],

            'position' => [
                'required',
                'string',
            ],

            'role' => [
                'required',
                Rule::in([
                    'admin',

                    'installer',
                    'junior_installer',
                    'team_leader',
                    'spv_technical',
                    'spv_operation',
                    'corporate_coordinator',

                    'inventory',
                    'warehouse_admin',
                    'staff',
                    'helper',

                    'marketing',
                    'marketing_admin',

                    'administrator',
                    'finance',
                    'finance_admin',
                    'hr',
                    'hr_admin',
                ]),
            ],
        ]);

        // =====================================================
        // DIVISION → POSITION VALIDATION
        // =====================================================

        $positions = [
            'Installer / Technician' => [
                'SPV Operasional',
                'Technical',
                'Installer',
            ],

            'Warehouse & Inventory' => [
                'Admin',
                'Staff',
                'Helper',
            ],

            'Sales & Marketing' => [
                'Marketing Project',
                'Marketing Eksekutif',
            ],
        ];

        if (! in_array(
            $validated['position'],
            $positions[$validated['division']] ?? [],
            true
        )) {
            return back()
                ->withInput()
                ->withErrors([
                    'position' =>
                    'Jabatan tidak sesuai dengan divisi yang dipilih.',
                ]);
        }

        // =====================================================
        // APPROVE + SIMPAN DATA USER
        // =====================================================

        $user->update([
            'division' => $validated['division'],
            'position' => $validated['position'],
            'role' => $validated['role'],
            'status' => 'active',
        ]);

        return back()->with(
            'status',
            'User berhasil disetujui dan akun telah diaktifkan.'
        );
    }


    // =========================================================
    // REJECT USER
    // =========================================================

    public function reject(Request $request, User $user)
    {
        // =====================================================
        // VALIDASI ALASAN
        // =====================================================

        $request->validate([
            'reason' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        // =====================================================
        // PASTIKAN STATUS USER MASIH PENDING
        // =====================================================

        if ($user->status !== 'pending') {
            return back()->withErrors([
                'user' =>
                'User ini tidak berada dalam status pending.',
            ]);
        }

        // =====================================================
        // REJECT USER
        // =====================================================

        $user->update([
            'status' => 'rejected',
        ]);

        return back()->with(
            'status',
            'Registrasi user berhasil ditolak.'
        );
    }
}

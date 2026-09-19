<?php

namespace App\Http\Controllers;

use App\Models\CirclePosition;
use App\Models\CircleRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CircleUserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | UPDATE USER
    |--------------------------------------------------------------------------
    */

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
                'max:100',
            ],

            'role' => [
                'required',
                'string',
                'max:100',
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


        /*
        |--------------------------------------------------------------------------
        | VALIDATE POSITION
        |--------------------------------------------------------------------------
        */

        $position = CirclePosition::query()
            ->where('name', $validated['position'])
            ->where('division', $validated['division'])
            ->where('is_active', true)
            ->first();

        if (! $position) {
            return back()
                ->withInput()
                ->withErrors([
                    'position' =>
                    'Jabatan tidak tersedia atau tidak sesuai dengan division yang dipilih.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | VALIDATE ROLE
        |--------------------------------------------------------------------------
        */

        $roleExists = CircleRole::query()
            ->where('slug', $validated['role'])
            ->where('division', $validated['division'])
            ->where('is_active', true)
            ->exists();

        if (! $roleExists) {
            return back()
                ->withInput()
                ->withErrors([
                    'role' =>
                    'Role tidak tersedia atau tidak sesuai dengan division yang dipilih.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $user->update([
            'name' => $validated['name'],
            'employee_id' => $validated['employee_id'] ?? null,
            'email' => $validated['email'],
            'division' => $validated['division'],
            'position' => $validated['position'],
            'role' => $validated['role'],
            'status' => $validated['status'],
        ]);


        return back()->with(
            'status',
            'Data user berhasil diperbarui.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | APPROVE USER
    |--------------------------------------------------------------------------
    */

    public function approve(Request $request, User $user)
    {
        if ($user->status !== 'pending') {
            return back()->withErrors([
                'user' =>
                'User ini tidak berada dalam status pending.',
            ]);
        }


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
                'max:100',
            ],

            'role' => [
                'required',
                'string',
                'max:100',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | VALIDATE POSITION
        |--------------------------------------------------------------------------
        */

        $position = CirclePosition::query()
            ->where('name', $validated['position'])
            ->where('division', $validated['division'])
            ->where('is_active', true)
            ->first();

        if (! $position) {
            return back()
                ->withInput()
                ->withErrors([
                    'position' =>
                    'Jabatan tidak tersedia atau tidak sesuai dengan division yang dipilih.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | VALIDATE ROLE
        |--------------------------------------------------------------------------
        */

        $roleExists = CircleRole::query()
            ->where('slug', $validated['role'])
            ->where('division', $validated['division'])
            ->where('is_active', true)
            ->exists();

        if (! $roleExists) {
            return back()
                ->withInput()
                ->withErrors([
                    'role' =>
                    'Role tidak tersedia atau tidak sesuai dengan division yang dipilih.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | APPROVE
        |--------------------------------------------------------------------------
        */

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


    /*
    |--------------------------------------------------------------------------
    | REJECT USER
    |--------------------------------------------------------------------------
    */

    public function reject(Request $request, User $user)
    {
        $request->validate([
            'reason' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);


        if ($user->status !== 'pending') {
            return back()->withErrors([
                'user' =>
                'User ini tidak berada dalam status pending.',
            ]);
        }


        $user->update([
            'status' => 'rejected',
        ]);


        return back()->with(
            'status',
            'Registrasi user berhasil ditolak.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | MASTER JABATAN
    |--------------------------------------------------------------------------
    */

    public function positions()
    {
        $positions = CirclePosition::query()
            ->with('role')
            ->orderBy('division')
            ->orderBy('name')
            ->get();

        $roles = CircleRole::query()
            ->where('is_active', true)
            ->orderBy('division')
            ->orderBy('name')
            ->get();


        return view(
            'pages.circle.admin.positions',
            compact(
                'positions',
                'roles'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE POSITION
    |--------------------------------------------------------------------------
    */

    public function storePosition(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
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

            'role_id' => [
                'required',
                'integer',
                'exists:circle_roles,id',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | CHECK DUPLICATE POSITION
        |--------------------------------------------------------------------------
        */

        $alreadyExists = CirclePosition::query()
            ->where('name', $validated['name'])
            ->where('division', $validated['division'])
            ->exists();

        if ($alreadyExists) {
            return back()
                ->withInput()
                ->withErrors([
                    'name' =>
                    'Jabatan tersebut sudah tersedia pada division ini.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | CHECK ROLE
        |--------------------------------------------------------------------------
        */

        $role = CircleRole::query()
            ->whereKey($validated['role_id'])
            ->where('division', $validated['division'])
            ->where('is_active', true)
            ->first();

        if (! $role) {
            return back()
                ->withInput()
                ->withErrors([
                    'role_id' =>
                    'Role default tidak sesuai dengan division yang dipilih.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | CREATE
        |--------------------------------------------------------------------------
        */

        CirclePosition::create([
            'name' => $validated['name'],
            'division' => $validated['division'],
            'role_id' => $validated['role_id'],
            'is_active' => true,
        ]);


        return redirect()
            ->route('circle.positions.index')
            ->with(
                'status',
                'Jabatan berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE POSITION
    |--------------------------------------------------------------------------
    */

    public function updatePosition(
        Request $request,
        CirclePosition $position
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
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

            'role_id' => [
                'required',
                'integer',
                'exists:circle_roles,id',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | CHECK DUPLICATE
        |--------------------------------------------------------------------------
        */

        $alreadyExists = CirclePosition::query()
            ->where('name', $validated['name'])
            ->where('division', $validated['division'])
            ->whereKeyNot($position->id)
            ->exists();

        if ($alreadyExists) {
            return back()
                ->withInput()
                ->withErrors([
                    'name' =>
                    'Jabatan tersebut sudah tersedia pada division ini.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | CHECK ROLE
        |--------------------------------------------------------------------------
        */

        $role = CircleRole::query()
            ->whereKey($validated['role_id'])
            ->where('division', $validated['division'])
            ->where('is_active', true)
            ->first();

        if (! $role) {
            return back()
                ->withInput()
                ->withErrors([
                    'role_id' =>
                    'Role default tidak sesuai dengan division yang dipilih.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $position->update([
            'name' => $validated['name'],
            'division' => $validated['division'],
            'role_id' => $validated['role_id'],
        ]);


        return redirect()
            ->route('circle.positions.index')
            ->with(
                'status',
                'Jabatan berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | TOGGLE POSITION
    |--------------------------------------------------------------------------
    */

    public function togglePosition(
        CirclePosition $position
    ) {
        $position->update([
            'is_active' => ! $position->is_active,
        ]);


        return back()->with(
            'status',
            $position->is_active
                ? 'Jabatan berhasil diaktifkan.'
                : 'Jabatan berhasil dinonaktifkan.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE POSITION
    |--------------------------------------------------------------------------
    */

    public function deletePosition(
        CirclePosition $position
    ) {
        /*
        |--------------------------------------------------------------------------
        | CHECK USER
        |--------------------------------------------------------------------------
        */

        $isUsed = User::query()
            ->where('position', $position->name)
            ->where('division', $position->division)
            ->exists();


        if ($isUsed) {
            return back()->withErrors([
                'position' =>
                'Jabatan tidak dapat dihapus karena masih digunakan oleh user.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | DELETE
        |--------------------------------------------------------------------------
        */

        $position->delete();


        return redirect()
            ->route('circle.positions.index')
            ->with(
                'status',
                'Jabatan berhasil dihapus.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | MASTER ROLE
    |--------------------------------------------------------------------------
    */

    public function roles()
    {
        $roles = CircleRole::query()
            ->orderBy('division')
            ->orderBy('name')
            ->get();


        return view(
            'pages.circle.admin.roles',
            compact('roles')
        );
    }
}

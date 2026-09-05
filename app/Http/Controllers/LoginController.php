<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'employee_id' => ['nullable', 'string', 'max:50', 'unique:users,employee_id'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'division' => [
                'required',
                'string',
                Rule::in([
                    'Installer / Technician',
                    'Warehouse & Inventory',
                    'Sales & Marketing',
                ]),
            ],
            'position' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ]);

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
                    'position' => 'Jabatan tidak sesuai dengan divisi yang dipilih.',
                ]);
        }

        $profilePhoto = $request->hasFile('profile_photo')
            ? $request->file('profile_photo')->store('profile-photos', 'public')
            : null;

        User::create([
            'name' => $validated['name'],
            'employee_id' => $validated['employee_id'] ?? null,
            'email' => $validated['email'],
            'profile_photo' => $profilePhoto,
            'division' => $validated['division'],
            'position' => $validated['position'],
            'role' => null,
            'status' => 'pending',
            'password' => $validated['password'],
        ]);

        return redirect()
            ->route('login')
            ->with(
                'status',
                'Pendaftaran berhasil dikirim. Akun Anda sedang menunggu verifikasi administrator.'
            );
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'workspace' => [
                'required',
                'string',
                Rule::in([
                    'circle',
                    'inventory',
                    'finance',
                    'field-ops',
                    'hr',
                    'marketing',
                ]),
            ],
            'remember' => ['nullable'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'Email atau kata sandi tidak sesuai.',
            ]);
        }

        if (! in_array($user->status, ['active', 'approved'], true)) {
            throw ValidationException::withMessages([
                'email' => match ($user->status) {
                    'pending' => 'Akun Anda masih menunggu persetujuan administrator.',
                    'rejected' => 'Akun Anda ditolak oleh administrator.',
                    'inactive' => 'Akun Anda sedang tidak aktif.',
                    default => 'Akun Anda belum dapat digunakan.',
                },
            ]);
        }

        if (empty($user->role)) {
            throw ValidationException::withMessages([
                'email' => 'Role akun belum ditentukan oleh administrator.',
            ]);
        }

        Auth::login(
            $user,
            $request->boolean('remember')
        );

        $request->session()->regenerate();

        $request->session()->put(
            'workspace',
            $credentials['workspace']
        );

        return $this->redirectByWorkspace(
            $credentials['workspace']
        );
    }

    public function loginOperator(Request $request)
    {
        return $this->login($request);
    }

    protected function redirectByWorkspace(string $workspace)
    {
        return match ($workspace) {
            'circle' => redirect()->route('circle.dashboard'),
            'inventory' => redirect()->route('inventory.dashboard'),
            'finance' => redirect()->route('finance.dashboard'),
            'field-ops' => redirect()->route('field-ops.dashboard'),
            'hr' => redirect()->route('hr.dashboard'),
            'marketing' => redirect()->route('marketing.dashboard'),
            default => redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Workspace tidak valid.',
                ]),
        };
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with(
                'status',
                'Anda berhasil logout.'
            );
    }
}

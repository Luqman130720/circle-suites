<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        ...$roles
    ): Response {
        /*
        |--------------------------------------------------------------------------
        | Pastikan user sudah login
        |--------------------------------------------------------------------------
        */
        if (! Auth::check()) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Silakan login terlebih dahulu.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Ambil user yang sedang login
        |--------------------------------------------------------------------------
        */
        $user = Auth::user();

        if (! $user) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Sesi login tidak ditemukan.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Pastikan user memiliki role
        |--------------------------------------------------------------------------
        */
        if (empty($user->role)) {
            abort(
                403,
                'Role akun Anda belum ditentukan.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Normalisasi role user
        |--------------------------------------------------------------------------
        */
        $userRole = strtolower(
            trim($user->role)
        );

        /*
        |--------------------------------------------------------------------------
        | Normalisasi role yang diizinkan dari route
        |
        | Contoh:
        | role:admin,administrator,spv,installer
        |--------------------------------------------------------------------------
        */
        $allowedRoles = collect($roles)
            ->map(
                fn($role) => strtolower(
                    trim($role)
                )
            )
            ->filter()
            ->values()
            ->all();

        /*
        |--------------------------------------------------------------------------
        | Pastikan konfigurasi role tersedia
        |--------------------------------------------------------------------------
        */
        if (empty($allowedRoles)) {
            abort(
                403,
                'Konfigurasi role tidak ditemukan.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Admin & Administrator
        |
        | Admin dan Administrator dapat melewati pembatasan
        | role pada route.
        |--------------------------------------------------------------------------
        */
        if (in_array(
            $userRole,
            ['admin', 'administrator'],
            true
        )) {
            return $next($request);
        }

        /*
        |--------------------------------------------------------------------------
        | Periksa apakah role user diizinkan
        |--------------------------------------------------------------------------
        */
        if (! in_array(
            $userRole,
            $allowedRoles,
            true
        )) {
            abort(
                403,
                'Anda tidak memiliki izin untuk mengakses halaman ini.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Akses diberikan
        |--------------------------------------------------------------------------
        */
        return $next($request);
    }
}

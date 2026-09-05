<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        ...$roles
    ): Response {
        if (! auth()->check()) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Silakan login terlebih dahulu.',
                ]);
        }

        $user = auth()->user();

        if (empty($user->role)) {
            abort(403, 'Role akun Anda belum ditentukan.');
        }

        $userRole = strtolower(trim($user->role));

        $allowedRoles = collect($roles)
            ->map(fn ($role) => strtolower(trim($role)))
            ->filter()
            ->values()
            ->all();

        if (empty($allowedRoles)) {
            abort(403, 'Konfigurasi role tidak ditemukan.');
        }

        if (in_array($userRole, ['admin', 'administrator'], true)) {
            return $next($request);
        }

        if (! in_array($userRole, $allowedRoles, true)) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
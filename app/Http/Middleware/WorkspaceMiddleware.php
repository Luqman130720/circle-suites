<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkspaceMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string $workspace
    ): Response {
        if (! auth()->check()) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Silakan login terlebih dahulu.',
                ]);
        }

        $user = auth()->user();

        if ($user->status !== 'approved') {
            auth()->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Akun Anda belum dapat mengakses sistem.',
                ]);
        }

        $selectedWorkspace = session('workspace');

        if (! $selectedWorkspace) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Silakan pilih workspace terlebih dahulu.',
                ]);
        }

        if ($selectedWorkspace !== $workspace) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses workspace ini.');
        }

        return $next($request);
    }
}
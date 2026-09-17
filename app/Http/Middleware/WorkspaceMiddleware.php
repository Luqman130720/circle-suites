<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WorkspaceMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string $workspace
    ): Response {
        /*
        |--------------------------------------------------------------------------
        | Authentication
        |--------------------------------------------------------------------------
        */

        if (! Auth::check()) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Silakan login terlebih dahulu.',
                ]);
        }

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Account Status
        |--------------------------------------------------------------------------
        |
        | Status "active" dan "approved" dianggap dapat
        | mengakses workspace.
        |
        */

        $allowedStatuses = [
            'active',
            'approved',
        ];

        if (! in_array($user->status, $allowedStatuses, true)) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => match ($user->status) {
                        'pending' =>
                        'Akun Anda masih menunggu persetujuan administrator.',

                        'rejected' =>
                        'Akun Anda ditolak oleh administrator.',

                        'inactive' =>
                        'Akun Anda sedang tidak aktif.',

                        default =>
                        'Akun Anda belum dapat mengakses sistem.',
                    },
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Selected Workspace
        |--------------------------------------------------------------------------
        */

        $selectedWorkspace = $request->session()->get('workspace');

        if (! $selectedWorkspace) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Silakan pilih workspace terlebih dahulu.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Workspace Authorization
        |--------------------------------------------------------------------------
        */

        if ($selectedWorkspace !== $workspace) {
            abort(
                403,
                'Anda tidak memiliki izin untuk mengakses workspace ini.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Continue
        |--------------------------------------------------------------------------
        */

        return $next($request);
    }
}

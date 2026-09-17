<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CircleUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/login', function () {
    return view('pages.auth.login', [
        'name' => 'login',
    ]);
})->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.post');

Route::post('/login/operator', [LoginController::class, 'loginOperator'])
    ->name('login.operator.post');

Route::post('/login/logout', [LoginController::class, 'logout'])
    ->name('login.logout');

Route::get('/register', function () {
    return view('pages.auth.register', [
        'name' => 'register',
    ]);
})->name('register');

Route::post('/register', [LoginController::class, 'register'])
    ->name('login.register.post');

Route::get('/language/{locale}', function (string $locale) {

    $supportedLocales = [
        'id',
        'en',
    ];

    abort_unless(
        in_array($locale, $supportedLocales, true),
        404
    );

    session(['locale' => $locale]);

    return back();
})->name('language.switch');

Route::get('/theme/{theme}', function (string $theme) {

    $supportedThemes = [
        'light',
        'dark',
        'system',
    ];

    abort_unless(
        in_array($theme, $supportedThemes, true),
        404
    );

    session(['theme' => $theme]);

    return back();
})->name('theme.switch');

Route::get('/accent/{color}', function (string $color) {

    $supportedColors = [
        'blue',
        'indigo',
        'violet',
        'emerald',
        'cyan',
        'rose',
        'amber',
    ];

    abort_unless(
        in_array($color, $supportedColors, true),
        404
    );

    session(['accent_color' => $color]);

    return back();
})->name('accent.switch');


Route::middleware([
    'auth',
    'workspace:circle',
    'role:admin,administrator,spv,supervisor,technical,installer',
])->group(function () {

    // Dashboard Circle
    Route::get('/circle', function () {
        return match (Auth::user()->role) {
            'admin',
            'administrator' => view('pages.circle.admin.dashboard'),

            'spv',
            'supervisor' => view('pages.circle.supervisor.dashboard'),

            'technical',
            'installer' => view('pages.circle.installer.dashboard'),

            default => abort(403),
        };
    })->name('circle.dashboard');
    // User Management
    Route::get('/circle/users', function () {
        $users = User::query()
            ->whereIn('status', ['active', 'inactive'])
            ->latest()
            ->paginate(10);

        return view(
            'pages.circle.admin.user_management',
            compact('users')
        );
    })->name('circle.user.management');


    // User Approval
    Route::get('/circle/users/approval', function () {
        $users = \App\Models\User::where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('pages.circle.admin.user_approval', compact('users'));
    })->name('circle.user.approval');


    // =========================================================
    // USER MANAGEMENT ACTION
    // =========================================================

    // Update User
    Route::put('/circle/users/{user}', [CircleUserController::class, 'update'])
        ->name('circle.user.update');

    // Approve User
    Route::post('/circle/users/{user}/approve', [CircleUserController::class, 'approve'])
        ->name('circle.user.approve');

    // Reject User
    Route::post('/circle/users/{user}/reject', [CircleUserController::class, 'reject'])
        ->name('circle.user.reject');
});


Route::middleware([
    'auth',
    'workspace:inventory',
    'role:admin,administrator,inventory,warehouse_admin',
])->group(function () {

    Route::get('/inventory', function () {
        return view('pages.inventory.admin.dashboard');
    })->name('inventory.dashboard');
});


Route::middleware([
    'auth',
    'workspace:finance',
    'role:admin,administrator,finance,finance_admin',
])->group(function () {

    Route::get('/finance', function () {
        return view('pages.finance.admin.dashboard');
    })->name('finance.dashboard');
});


Route::middleware([
    'auth',
    'workspace:field-ops',
    'role:admin,administrator,spv,supervisor,technical,installer',
])->group(function () {

    Route::get('/field-ops', function () {
        return view('pages.field-ops.admin.dashboard');
    })->name('field-ops.dashboard');
});


Route::middleware([
    'auth',
    'workspace:hr',
    'role:admin,administrator,hr,hr_admin',
])->group(function () {

    Route::get('/hr', function () {
        return view('pages.hr.admin.dashboard');
    })->name('hr.dashboard');
});


Route::middleware([
    'auth',
    'workspace:marketing',
    'role:admin,administrator,marketing,marketing_admin',
])->group(function () {

    Route::get('/marketing', function () {
        return view('pages.marketing.admin.dashboard');
    })->name('marketing.dashboard');
});

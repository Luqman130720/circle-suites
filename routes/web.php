<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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


Route::middleware([
    'auth',
    'workspace:circle',
    'role:admin,administrator,spv,supervisor,technical,installer',
])->group(function () {

    Route::get('/circle', function () {
        return match (auth()->user()->role) {
            'admin',
            'administrator' => view('pages.circle.admin.dashboard'),

            'spv',
            'supervisor' => view('pages.circle.supervisor.dashboard'),

            'technical',
            'installer' => view('pages.circle.installer.dashboard'),

            default => abort(403),
        };
    })->name('circle.dashboard');
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

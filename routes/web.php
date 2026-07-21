<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/login', function () {
    return view('auth.login', ['name' => 'login']);
});

Route::post('/login', function () {
    // sementara
    return redirect('/')->name ('login.post');
});
Route::get('/register', function () {
    return view('auth.register', ['name' => 'register']);
});

// Login Routes
Route::group(['prefix' => 'login', 'as' => 'login.', 'controller' => LoginController::class], function () {
    Route::get('/portal', 'portal')->name('portal');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/operator', 'loginOperator')->name('operator.post');
    Route::post('/register', 'register')->name('register.post');
    Route::post('/teacher', 'loginTeacher')->name('teacher.post');
    Route::post('/student', 'loginStudent')->name('student.post');
    Route::post('/logout', 'logout')->name('logout');
});

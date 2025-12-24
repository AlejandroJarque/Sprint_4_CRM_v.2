<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [\App\Http\Controllers\UserController::class, 'loginFormAction'])
->name('login')
->middleware('guest');

Route::post('/login', [\App\Http\Controllers\UserController::class, 'loginAction'])
->middleware('guest');

Route::get('/register', [\App\Http\Controllers\UserController::class, 'registerFormAction'])
->name('register')
->middleware('guest');

Route::post('/register', [\App\Http\Controllers\UserController::class, 'registerAction'])
->middleware('guest');


Route::prefix('crm')->middleware('auth')->group(function () {
        Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profileAction'])
    ->name('profile');

    Route::put('/profile', [\App\Http\Controllers\UserController::class, 'updateProfileAction'])
    ->name('profile.update');

    Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logoutAction'])
    ->name('logout');

});
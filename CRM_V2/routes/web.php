<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*Route::get('/login', [\App\Http\Controllers\UserController::class, 'loginFormAction'])
->name('login')
->middleware('guest');

Route::post('/login', [\App\Http\Controllers\UserController::class, 'loginAction'])
->middleware('guest');

Route::get('/register', [\App\Http\Controllers\UserController::class, 'registerFormAction'])
->name('register')
->middleware('guest');

Route::post('/register', [\App\Http\Controllers\UserController::class, 'registerAction'])
->middleware('guest');*/


Route::prefix('crm')->middleware('auth')->group(function () {
    
    Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profileAction'])
    ->name('profile');

    Route::put('/profile', [\App\Http\Controllers\UserController::class, 'updateProfileAction'])
    ->name('profile.update');

    Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logoutAction'])
    ->name('logout');

    Route::get('/clients', [\App\Http\Controllers\ClientController::class, 'indexAction'])
    ->name('clients.index');

    Route::get('/clients/create', [\App\Http\Controllers\ClientController::class, 'createAction'])
    ->name('clients.create');

    Route::post('/clients', [\App\Http\Controllers\ClientController::class, 'storeAction'])
    ->name('clients.store');

    Route::get('/clients/{id}', [\App\Http\Controllers\ClientController::class, 'showAction'])
    ->name('clients.show');

    Route::get('/clients/{id}/edit', [\App\Http\Controllers\ClientController::class, 'editAction'])
    ->name('clients.edit');

    Route::put('/clients/{id}', [\App\Http\Controllers\ClientController::class, 'updateAction'])
    ->name('clients.update');
    
    Route::delete('/clients/{id}', [\App\Http\Controllers\ClientController:: class, 'deleteAction'])
    ->name('clients.delete');

    Route::get('/activities', [\App\Http\Controllers\ActivityController::class, 'indexAction'])
    ->name('activities.index');

    Route::get('/activities/create', [\App\Http\Controllers\ActivityController::class, 'createAction'])
    ->name('activities.create');

    Route::post('/activities', [\App\Http\Controllers\ActivityController::class, 'storeAction'])
    ->name('activities.store');

    Route::get('/activities/{id}', [\App\Http\Controllers\ActivityController::class, 'showAction'])
    ->name('activities.show');

    Route::get('/activities/{id}/edit', [\App\Http\Controllers\ActivityController::class, 'editAction'])
    ->name('activities.edit');

    Route::put('/activities/{id}', [\App\Http\Controllers\ActivityController::class, 'updateAction'])
    ->name('activities.update');

    Route::delete('/activities/{id}', [\App\Http\Controllers\ActivityController::class, 'deleteAction'])
    ->name('activities.delete');

    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'indexAction'])
    ->name('crm.dashboard');

});

require __DIR__.'/auth.php';

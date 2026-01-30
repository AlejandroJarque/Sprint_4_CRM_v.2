<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('crm')->middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::controller(ClientController::class)->group(function () {
        Route::get('/clients', 'indexAction')->name('clients.index');
        Route::get('/clients/create', 'createAction')->name('clients.create');
        Route::post('/clients', 'storeAction')->name('clients.store');
        Route::get('/clients/{id}', 'showAction')->name('clients.show');
        Route::get('/clients/{id}/edit', 'editAction')->name('clients.edit');
        Route::put('/clients/{id}', 'updateAction')->name('clients.update');
        Route::delete('/clients/{id}', 'deleteAction')->name('clients.delete');
    });

    Route::controller(ActivityController::class)->group(function () {
        Route::get('/activities', 'indexAction')->name('activities.index');
        Route::get('/activities/create', 'createAction')->name('activities.create');
        Route::post('/activities', 'storeAction')->name('activities.store');
        Route::get('/activities/{id}', 'showAction')->name('activities.show');
        Route::get('/activities/{id}/edit', 'editAction')->name('activities.edit');
        Route::put('/activities/{id}', 'updateAction')->name('activities.update');
        Route::delete('/activities/{id}', 'deleteAction')->name('activities.delete');
    });

    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'indexAction'])
    ->name('crm.dashboard');

    Route::controller(MailController::class)->group(function () {
        Route::get('/post', 'indexAction')->name('post');
        Route::post('/mails/mail', 'sendAction')->name('post.send');
    });

});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('crm')->middleware('auth')->group(function () {

    Route::get('/profile', function (Request $request) {
        return view('profile', [
            'user' => $request->user(),
        ]);
    })->name('profile');

    Route::put('/profile', function (Request $request) {
        $request->user()->update(
            $request->validate([
                'name'  => 'required|string|max:255',
                'email' => 'required|email|max:255',
            ])
        );

        return back()->with('success', 'Profile updated');
    })->name('profile.update');

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

    Route::get('/post', [\App\Http\Controllers\MailController::class, 'indexAction'])
    ->name('post');

    Route::post('/mails/mail', [\App\Http\Controllers\MailController::class, 'sendAction'])
    ->name('post.send');

});

require __DIR__.'/auth.php';

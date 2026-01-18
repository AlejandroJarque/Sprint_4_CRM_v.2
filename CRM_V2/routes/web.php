<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
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
                'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore(Auth::id()),
            ],
        ])
     );

        return back()->with('success', 'Profile updated');
    })->name('profile.update');

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

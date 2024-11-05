<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GasLevelController;
use App\Http\Controllers\CustomAuthController;
use App\RabbitMQ\GasLevelProducer;
use App\RabbitMQ\GasLevelConsumer;
use App\Http\Controllers\NotificationController;



Route::post('/api/save-subscription', [NotificationController::class, 'saveSubscription'])->middleware('auth');

Route::get('/api/getGasLevels', [GasLevelController::class, 'getGasLevelsApi']);

// Middleware untuk memeriksa izin notifikasi
Route::middleware('auth')->get('/enable-notifications', function () {
    return view('enable-notifications');
});

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('analisis', [GasLevelController::class, 'analisis']);
Route::get('profile', [GasLevelController::class, 'profile']);
Route::get('/', [CustomAuthController::class, 'index'])->name('login');
Route::post('postlogin', [CustomAuthController::class, 'login'])->name('postlogin');

Route::get('/register', [CustomAuthController::class, 'register'])->name('register');
Route::post('postregister', [CustomAuthController::class, 'registersave'])->name('postregister');

Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/api/getGasLevels', [GasLevelController::class, 'getGasLevelsApi']);

Route::get('/consume-gas-level', function () {
    $consumer = new GasLevelConsumer();
    $consumer->consume();
    return 'Gas level consumed from RabbitMQ!';
});

Route::get('/analisis', [GasLevelController::class, 'analisis']);
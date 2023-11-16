<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('/', [CustomAuthController::class, 'index'])->name('login');
Route::post('postlogin', [CustomAuthController::class, 'login'])->name('postlogin');

Route::get('/register', [CustomAuthController::class, 'register'])->name('register');
Route::post('postregister', [CustomAuthController::class, 'registersave'])->name('postregister');

Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/jajal', function () {
    return view('jajal');
});
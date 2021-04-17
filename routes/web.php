<?php

use App\Http\Controllers\ClaimController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])->group(function () {

    // your routes
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/dashboard', [HomeController::class, 'index'])
        ->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])
        ->name('users.index');

    Route::get('/users/{user}/show', [UserController::class, 'show'])
        ->name('users.show');

    Route::get('/users/{user}/{role}', [UserController::class, 'role'])
        ->name('users.role');

    Route::get('/roles', [RoleController::class, 'index'])
        ->name('roles.index');

    Route::get('/claims', [ClaimController::class, 'index'])
        ->name('claims.index');

    Route::get('/claims/create', [ClaimController::class, 'create'])
        ->name('claims.create');

    Route::post('/claims/store', [ClaimController::class, 'store'])
        ->name('claims.store');

    Route::get('/claims/{claim}/show', [ClaimController::class, 'show'])
        ->name('claims.show');

    Route::get('/claims/{claim}/mark', [ClaimController::class, 'mark'])
        ->name('claims.mark');
});

require __DIR__ . '/auth.php';

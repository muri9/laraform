<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

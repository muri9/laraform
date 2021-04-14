<?php

use App\Http\Controllers\ClaimController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

Route::get('/claims', [ClaimController::class, 'index'])
    ->middleware(['auth'])
    ->name('claims.index');

Route::get('/claims/create', [ClaimController::class, 'create'])
    ->middleware(['auth'])
    ->name('claims.create');

Route::post('/claims/store', [ClaimController::class, 'store'])
    ->middleware(['auth'])
    ->name('claims.store');

Route::get('/claims/{claim}/show', [ClaimController::class, 'show'])
    ->middleware(['auth'])
    ->name('claims.show');

Route::get('/claims/{id}/destroy', [ClaimController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('claims.destroy');

Route::get('/claims/{id}/update', [ClaimController::class, 'update'])
    ->middleware(['auth'])
    ->name('claims.update');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ItemController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [ItemController::class, 'index'])->name('dashboard');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items/create', [ItemController::class, 'store']);
    Route::get('/items/{item}/update', [ItemController::class, 'edit'])->name('items.update');
    Route::put('/items/{item}/update', [ItemController::class, 'update']);
    Route::delete('/items/{item}/delete', [ItemController::class, 'destroy'])->name('items.delete');
    Route::put('/items/{item}/update-status', [ItemController::class, 'updateStatus'])->name('items.status-update');
});

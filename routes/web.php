<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DepositController;
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
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('admin/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'verified'])->prefix('/dashboard')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/additional', [ProfileController::class, 'updateAdditionalInfo'])->name('profile.update.additional');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/deposit',DepositController::class, ['name' => 'deposit']);
    Route::resource('/withdraw',\App\Http\Controllers\WithdrawController::class, ['name' => 'withdraw']);
    Route::resource('/swap',\App\Http\Controllers\SwapController::class, ['name' => 'swap']);
    Route::resource('/stake',\App\Http\Controllers\SubscriptionController::class, ['name' => 'stake']);
    Route::middleware('Admin')->resource('/settings',\App\Http\Controllers\SettingController::class, ['name' => 'settings']);
    Route::middleware('Admin')->resource('/users',\App\Http\Controllers\UsersController::class, ['name' => 'users']);
    Route::resource('/plans',\App\Http\Controllers\PlanController::class, ['name' => 'plans']);
});

require __DIR__.'/auth.php';

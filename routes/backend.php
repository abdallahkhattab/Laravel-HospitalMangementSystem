<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Backend routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('dashboard/admin',[DashboardController::class,'index'])->middleware('auth:admin')
->name('admin');

//laravel

Route::get('dashboard/user', function () {
    return view('Dashboard.User.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.user');

require __DIR__.'/auth.php';

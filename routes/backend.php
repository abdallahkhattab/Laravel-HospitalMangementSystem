<?php

use App\Models\Doctor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Doctor\DoctorController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\Section\SectionController;
use App\Http\Controllers\Dashboard\Service\ServiceController;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| This file registers backend routes for the application. Routes are loaded 
| by the RouteServiceProvider and assigned to the "web" middleware group.
|
*/

// ========================== User Dashboard Routes ==========================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard/user', fn() => view('Dashboard.User.dashboard'))
        ->name('dashboard.user');
});
// ============================================================================

// ========================== Admin Dashboard Routes ==========================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], 
    function () {
        Route::middleware('auth:admin')->prefix('dashboard')->group(function () {
            Route::get('admin', [DashboardController::class, 'index'])
                ->name('admin');
          Route::resource('section',SectionController::class);
          Route::resource('doctors',DoctorController::class);
          Route::get('doctors/section/{id}', [DoctorController::class, 'filterBySection'])->name('doctors.bySection');
          Route::resource('services',ServiceController::class);

        });

        require __DIR__ . '/auth.php';
    }
);
// ============================================================================


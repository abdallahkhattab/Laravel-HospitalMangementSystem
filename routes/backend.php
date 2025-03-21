<?php

use App\Http\Controllers\Dashboard\Ambulances\AmbulanceController;
use App\Models\Doctor;
use Livewire\Livewire;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Doctor\DoctorController;
use App\Http\Controllers\Dashboard\Insurance\InsuranceController;
use App\Http\Controllers\Dashboard\Patient\PatientsController;
use App\Http\Controllers\Dashboard\Payment\PaymentAccount;
use App\Http\Controllers\Dashboard\Payment\PaymentAccountController;
use App\Http\Controllers\Dashboard\RayEmployeeController;
use App\Http\Controllers\Dashboard\Receipt\ReceiptAccountController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\Section\SectionController;
use App\Http\Controllers\Dashboard\Service\ServiceController;
use App\Http\Controllers\Dashboard_doctor\LaboratoriesController;
use App\Livewire\SingleInvoices;
use App\Models\RayEmployees;

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
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });
        Route::middleware('auth:admin')->prefix('dashboard')->group(function () {
            Route::get('admin', [DashboardController::class, 'index'])
                ->name('admin');
          Route::resource('section',SectionController::class);
          Route::resource('doctors',DoctorController::class);
          Route::get('doctors/section/{id}', [DoctorController::class, 'filterBySection'])->name('doctors.bySection');
          Route::resource('services',ServiceController::class);
          Route::view('admin/Service', 'livewire.GroupServices.include_create')->name('add_GroupServices');
          Route::resource('insurance',InsuranceController::class);
          Route::resource('ambulance',AmbulanceController::class);
          Route::resource('patients',PatientsController::class);
          Route::view('single_invoices','livewire.single_invoices.index')->name('single_invoices');
          Route::resource('Receipt',ReceiptAccountController::class);
          Route::resource('Payment',PaymentAccountController::class);
          Route::resource('ray_employee', RayEmployeeController::class);
        });

        
// ========================== End Admin Dashboard Routes ==========================

// ========================== Start Doctor Dashboard Routes ==========================

Route::middleware(['auth:doctor'])->group(function () {
    Route::get('dashboard/doctor', fn() => view('Dashboard.doctor.dashboard'))
        ->name('dashboard.doctor');
});


// ========================== End Doctor Dashboard Routes ==========================




        
        require __DIR__ . '/auth.php';
    }
);


// ============================================================================


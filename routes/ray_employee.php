<?php

use App\Http\Controllers\Dashboard_Ray_Employees\InvoiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| doctor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


//################################ dashboard doctor ########################################

    Route::get('dashboard/ray_employee', function () {
        return view('Dashboard.Ray_employee_dashboard.dashboard');
    })->middleware(['auth:ray_employee'])->name('dashboard.ray_employee');


    //################################ end dashboard doctor #####################################

//---------------------------------------------------------------------------------------------------------------

//################################## dashboard doctor invoice ########################################

    Route::middleware(['auth:ray_employee'])->group(function(){

    Route::resource('Rayinvoices', InvoiceController::class);
    });

    require __DIR__ . '/auth.php';

});





<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard_Doctor\RaysController;
use App\Http\Controllers\Dashboard_Doctor\InvoiceController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard_Doctor\DiagnosticController;
use App\Http\Controllers\Dashboard_doctor\LaboratoriesController;
use App\Http\Controllers\Dashboard_doctor\PatientDetailsController;

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

    Route::get('/dashboard/patient', function () {
        return "hello patient";
    })->middleware(['auth:patient'])->name('dashboard.patient');

    //################################ end dashboard doctor #####################################

//---------------------------------------------------------------------------------------------------------------

    require __DIR__ . '/auth.php';
});





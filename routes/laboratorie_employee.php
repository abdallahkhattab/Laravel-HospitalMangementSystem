<?php

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

    Route::get('dashboard/laboratorie_employee', function () {
        return view('Dashboard.Dashboard_Laboratorie_Employee.dashboard');
    })->middleware(['auth:laboratorie_employee'])->name('dashboard.login.laboratorie_employee');


    require __DIR__ . '/auth.php';


});




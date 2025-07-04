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

    Route::get('/dashboard/doctor', function () {
        return view('Dashboard.doctor.dashboard');
    })->middleware(['auth:doctor'])->name('dashboard.admin');

    //################################ end dashboard doctor #####################################

//---------------------------------------------------------------------------------------------------------------


    Route::middleware(['auth:doctor'])->group(function () {

        Route::prefix('doctor')->group(function () {


            //############################# completed_invoices route ##########################################
            Route::get('completed_invoices', [InvoiceController::class,'completedInvoices'])->name('completedInvoices');
            //############################# end invoices route ################################################

            //############################# review_invoices route ##########################################
            Route::get('review_invoices', [InvoiceController::class,'reviewInvoices'])->name('reviewInvoices');
            //############################# end invoices route #############################################

            //############################# invoices route ##########################################
            Route::resource('invoices', InvoiceController::class);
            //############################# end invoices route ######################################


            //############################# review_invoices route ##########################################
            Route::post('add_review', [DiagnosticController::class,'addReview'])->name('add_review');
            //############################# end invoices route #############################################


            //############################# Diagnostics route ##########################################

            Route::resource('Diagnostics', DiagnosticController::class);

            //############################# end Diagnostics route ######################################

            //############################# Start xrays route ######################################

             Route::resource('rays',RaysController::class);
            //############################# End xrays route ######################################

            Route::get('patient_details/{id}', [PatientDetailsController::class,'index'])->name('patient_details');

            Route::resource('Laboratories', LaboratoriesController::class);

        });

           //not found
           Route::get('404',function(){
            return view('Dashboard.404');
        })->name('404');

    });
    require __DIR__ . '/auth.php';


});





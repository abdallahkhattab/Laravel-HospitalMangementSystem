<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\Admin\AdminController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\Doctor\DoctorController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\LaboratorieEmployee\LaboratorieEmployeeController;
use App\Http\Controllers\Auth\LaboratorieEmployee\LaboratorieEmployeeLoginController;
use App\Http\Controllers\Auth\patient\PatientLoginController;
use App\Http\Controllers\Auth\RayEmployee\RayEmployeeController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.store');
});
//################################################ Route User #########################//
    Route::get('login/user', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.user');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
//################################################ Route Admin #########################//

    Route::post('login/admin', [AdminController::class, 'store'])->name('login.admin');
    Route::post('admin/logout', [AdminController::class, 'destroy'])
    ->name('logout.admin');
//################################################ Route Admin #########################//
//################################################ Route Doctor #########################//
Route::post('login/doctor',[DoctorController::class,'store'])->middleware('guest')->name('login.doctor');

Route::post('logout/doctor',[DoctorController::class,'destroy'])->middleware('auth:doctor')->name('logout.doctor');

//################################################ End Route Doctor #########################//

Route::post('login/ray_employee',[RayEmployeeController::class,'store'])->middleware('guest')->name('login.ray_employee');
Route::post('logout/ray_employee',[RayEmployeeController::class,'destroy'])->middleware('auth:ray_employee')->name('logout.ray_employee');

    //################################################ Laboratorie Employee Auth #########################//

    Route::post('login/laboratorie_employee',[LaboratorieEmployeeLoginController::class,'store'])->middleware('guest')->name('login.laboratorie_employee');
    Route::post('logout/laboratorie_employee',[LaboratorieEmployeeLoginController::class,'destroy'])->middleware('auth:laboratorie_employee')->name('logout.laboratorie_employee');

    //################################################ Laboratorie Employee Auth #########################//

    
    //################################################ start Patient  Auth #########################//

    Route::post('login/patient',[PatientLoginController::class,'store'])->middleware('guest')->name('login.patient');
    Route::post('logout/patient',[PatientLoginController::class,'destroy'])->middleware('auth:patient')->name('logout.patient');

    //################################################ end Patient  Auth #########################//




Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
   
});



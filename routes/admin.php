<?php

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ConfusedController;

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    /*=============================Customer Start=============================*/
    /*=====Customer======*/
    Route::resource('customer', CustomerController::class);
    Route::get('customer-status/{id}', [CustomerController::class, 'changeStatus'])->name('customer-status');
    Route::get('customer-trash', [CustomerController::class, 'trash'])->name('customer-trash');
    Route::get('customer-restore/{id}', [CustomerController::class, 'restore'])->name('customer-restore');
    Route::get('customer-force-delete/{id}', [CustomerController::class, 'forceDelete'])->name('customer.force-delete');
    Route::delete('customer-multi-delete', [CustomerController::class, 'deleteAll'])->name('customer.multi-delete');
    /*=============================Customer End=============================*/

    
    /*=====confused======*/
    Route::resource('confused', ConfusedController::class);
    Route::get('confused-status/{id}', [DepartmentController::class, 'changeStatus'])->name('confused-status');
    Route::get('confused-trash', [DepartmentController::class, 'trash'])->name('confused-trash');
    Route::get('confused-restore/{id}', [DepartmentController::class, 'restore'])->name('confused-restore');
    Route::get('confused-force-delete/{id}', [DepartmentController::class, 'forceDelete'])->name('confused.force-delete');
    Route::delete('confused-multi-delete', [DepartmentController::class, 'deleteAll'])->name('confused.multi-delete');

     /*=============================Doctor Start=============================*/
    /*=====Doctor======*/
    Route::resource('doctor', DoctorController::class);
    Route::get('doctor-status/{id}', [DoctorController::class, 'changeStatus'])->name('doctor-status');
    Route::get('doctor-trash', [DoctorController::class, 'trash'])->name('doctor-trash');
    Route::get('doctor-restore/{id}', [DoctorController::class, 'restore'])->name('doctor-restore');
    Route::get('doctor-force-delete/{id}', [DoctorController::class, 'forceDelete'])->name('doctor.force-delete');
    Route::delete('doctor-multi-delete', [DoctorController::class, 'deleteAll'])->name('doctor.multi-delete');
    /*=============================Doctor End=============================*/


     

});

require __DIR__ . '/adminauth.php';

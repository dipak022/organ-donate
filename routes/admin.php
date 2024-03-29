<?php

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ConfusedController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\ShowController;

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
    Route::get('confused-status/{id}', [ConfusedController::class, 'changeStatus'])->name('confused-status');
    Route::get('confused-trash', [ConfusedController::class, 'trash'])->name('confused-trash');
    Route::get('confused-restore/{id}', [ConfusedController::class, 'restore'])->name('confused-restore');
    Route::get('confused-force-delete/{id}', [ConfusedController::class, 'forceDelete'])->name('confused.force-delete');
    Route::delete('confused-multi-delete', [ConfusedController::class, 'deleteAll'])->name('confused.multi-delete');

    /*=====Department======*/
    Route::resource('department', DepartmentController::class);
    Route::get('department-status/{id}', [DepartmentController::class, 'changeStatus'])->name('department-status');
    Route::get('department-trash', [DepartmentController::class, 'trash'])->name('department-trash');
    Route::get('department-restore/{id}', [DepartmentController::class, 'restore'])->name('department-restore');
    Route::get('department-force-delete/{id}', [DepartmentController::class, 'forceDelete'])->name('department.force-delete');
    Route::delete('department-multi-delete', [DepartmentController::class, 'deleteAll'])->name('department.multi-delete');

    /*=====Designation======*/
    Route::resource('designation', DesignationController::class);
    Route::get('designation-status/{id}', [DesignationController::class, 'changeStatus'])->name('designation-status');
    Route::get('designation-trash', [DesignationController::class, 'trash'])->name('designation-trash');
    Route::get('designation-restore/{id}', [DesignationController::class, 'restore'])->name('designation-restore');
    Route::get('designation-force-delete/{id}', [DesignationController::class, 'forceDelete'])->name('designation.force-delete');
    Route::delete('designation-multi-delete', [DesignationController::class, 'deleteAll'])->name('designation.multi-delete');

     /*=============================Doctor Start=============================*/
    /*=====Doctor======*/
    Route::resource('doctor', DoctorController::class);
    Route::get('doctor-status/{id}', [DoctorController::class, 'changeStatus'])->name('doctor-status');
    Route::get('doctor-trash', [DoctorController::class, 'trash'])->name('doctor-trash');
    Route::get('doctor-restore/{id}', [DoctorController::class, 'restore'])->name('doctor-restore');
    Route::get('doctor-force-delete/{id}', [DoctorController::class, 'forceDelete'])->name('doctor.force-delete');
    Route::delete('doctor-multi-delete', [DoctorController::class, 'deleteAll'])->name('doctor.multi-delete');
    /*=============================Doctor End=============================*/


    Route::get('donate-show', [ShowController::class, 'donateShow'])->name('donate.show');
    Route::get('death-donate-show', [ShowController::class, 'deathDonateShow'])->name('death.donate.show');
    Route::get('death-organ-transplant-show', [ShowController::class, 'deathOrganTransplantShow'])->name('death.organ.transplant.show');
    Route::get('user-account-show', [ShowController::class, 'userAccountShow'])->name('user.account.show');

    Route::get('donate-status/{id}', [ShowController::class, 'changeStatus'])->name('donate-status');
    Route::post('donate-confirm/{id}', [ShowController::class, 'donateConfirm'])->name('donate-confirm.store');



    /*============================= User Profile=============================*/
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('profile-update/{id}', [AdminController::class, 'profileUpdate'])->name('profile.update');
    Route::get('password-change', [AdminController::class, 'passwordView'])->name('password.view');
    Route::post('password-update', [AdminController::class, 'passwordUpdate'])->name('passwordAdmin.update');

    Route::get('message', [AdminController::class, 'messageIndex'])->name('message.index');
    Route::get('message-edit/{id}', [AdminController::class, 'messageEdit'])->name('message.edit');
    Route::post('message-update/{id}', [AdminController::class, 'messageUpdate'])->name('message.update');



    
    


     

});

require __DIR__ . '/adminauth.php';

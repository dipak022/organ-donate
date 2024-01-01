<?php

use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\DonateController;

use Illuminate\Support\Facades\Route;

Route::post('confused-or-organ-from', [PageController::class, 'confusedOrOrganFrom'])->name('confused.or.organ.from');

Route::post('organ-doantion-store', [DonateController::class, 'organDoantionStore'])->name('organ.doantion.store');
Route::get('user-logout', [PageController::class, 'UserLogout'])->name('user.logout');
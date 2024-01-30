<?php

use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\DonateController;

use Illuminate\Support\Facades\Route;

Route::get('confused-or-organ-from', [PageController::class, 'confusedOrOrganFrom'])->name('confused.or.organ.from');
Route::get('make-a-donate', [PageController::class, 'makeADonate'])->name('make-a-donate');
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::get('profile', [PageController::class, 'profile'])->name('profile');
Route::get('death-news', [PageController::class, 'deathNews'])->name('death.news');

Route::post('organ-doantion-store', [DonateController::class, 'organDoantionStore'])->name('organ.doantion.store');
Route::post('death-organ-doantion-status-store', [DonateController::class, 'deathOrganDoantionStatusStore'])->name('death.organ.doantion.status.store');
Route::get('user-logout', [PageController::class, 'UserLogout'])->name('user.logout');
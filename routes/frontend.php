<?php

use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\DonateController;

use Illuminate\Support\Facades\Route;

Route::get('confused-or-organ-from', [PageController::class, 'confusedOrOrganFrom'])->name('confused.or.organ.from');
Route::get('make-a-donate', [PageController::class, 'makeADonate'])->name('make-a-donate');
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::get('profile', [PageController::class, 'profile'])->name('profile');
Route::get('death-news', [PageController::class, 'deathNews'])->name('death.news');
Route::get('death-news', [PageController::class, 'deathNews'])->name('death.news');
Route::get('death-organ-transplant', [PageController::class, 'deathOrganTransplant'])->name('death.organ_transplant');

Route::post('organ-doantion-store', [DonateController::class, 'organDoantionStore'])->name('organ.doantion.store');
Route::post('death-organ-doantion-status-store', [DonateController::class, 'deathOrganDoantionStatusStore'])->name('death.organ.doantion.status.store');
Route::post('death-organ-transplant-store', [DonateController::class, 'deathOrganTransplantStore'])->name('death.organ.transplant.store');
Route::post('comment-store', [DonateController::class, 'commentStore'])->name('comment.store');
Route::get('user-logout', [PageController::class, 'UserLogout'])->name('user.logout');
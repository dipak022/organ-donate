<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RootController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
    
});
Route::get('/', [RootController::class, 'home'])->name('home');
Route::get('/dashboard', [RootController::class, 'home'])->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';

require __DIR__.'/admin.php';

require __DIR__.'/frontend.php';

//Auth::routes(['register'=>false]);




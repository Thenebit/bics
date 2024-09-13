<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/sharebics', [HomeController::class, 'share'])->name('bics.share');
    Route::post('/save', [HomeController::class, 'saveShare'])->name('saveShare');

    Route::get('/requestsbics', [HomeController::class, 'requestb'])->name('requestsbics');
    Route::get('/profilebics', [HomeController::class, 'profile'])->name('profilebics');
    Route::post('/profile', [HomeController::class, 'saveProfile'])->name('profile.save');
    
    Route::get('/mybics', [HomeController::class, 'mybic'])->name('mybics');
    Route::get('/contributorbics', [HomeController::class, 'contributor'])->name('contributorbics');
    Route::get('/contribics', [HomeController::class, 'contrib'])->name('contribics');

});

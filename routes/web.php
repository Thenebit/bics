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
    Route::get('/projectbics/{id}', [AdminController::class, 'projectBic'])->name('project.bics');

    Route::get('/forum/{id}', [AdminController::class, 'feedback'])->name('forum.bic');
    Route::post('/storefeed/{id}', [AdminController::class, 'storeFeedback'])->name('forum.save');

});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/sharebics', [HomeController::class, 'share'])->name('share');
    Route::post('/save', [HomeController::class, 'saveShare'])->name('bic.save');

    Route::get('/comment/{id}', [HomeController::class, 'comment'])->name('commentbics');
    Route::post('/store/{id}', [HomeController::class, 'storeComment'])->name('store.comment');

    Route::get('/requestsbics', [HomeController::class, 'requestb'])->name('requestsbics');
    Route::post('/savereq/{id}', [HomeController::class, 'saveRequest'])->name('request.save');

    Route::post('/approvereq/{id}', [HomeController::class, 'approval'])->name('approvalReq');
    Route::post('/rejectreq/{id}', [HomeController::class, 'reject'])->name('rejectReq');

    Route::get('/profilebics', [HomeController::class, 'profile'])->name('profilebics');
    Route::post('/profile', [HomeController::class, 'saveProfile'])->name('profile.save');

    Route::get('/mybics', [HomeController::class, 'mybic'])->name('mybics');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
    Route::delete('/remove/{id}', [HomeController::class, 'remove'])->name('bics.remove');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('bics.update');

    Route::get('/contributorbics', [HomeController::class, 'contributor'])->name('contributorbics');
    Route::post('/rejectcontributor/{id}', [HomeController::class, 'rejectcontributor'])->name('rejectContrib');

    Route::get('/contribics', [HomeController::class, 'contrib'])->name('contribics');
    Route::post('/cancel/{id}', [HomeController::class, 'cancel'])->name('cancelbic');

});

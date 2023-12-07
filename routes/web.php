<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\InovasiController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;

Route::get('/', [InovasiController::class, 'index'])->name('landing.page');

Route::get('/inovasi', [InovasiController::class, 'search'])->name('inovasi.search');

Route::get('/upload-inovasi', [UploadController::class, 'index'])->middleware('auth');

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/pengguna', [UserController::class, 'index'])->name('users.index');

    Route::put('/updateUserRole/{id}', [UserController::class, 'updateUserRole'])->name('updateUserRole');
    
    Route::delete('/pengguna/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['role:user'])->group(function () {
    Route::get('/inovasi-saya', [InovasiController::class, 'myInnovations'])->name('user.innovations');
});

Route::get('/inovasi/{id}', [InovasiController::class, 'detail'])->name('inovasi.detail');

Route::post('/inovasi/store', [InovasiController::class, 'store'])->name('inovasi.store');

Auth::routes();
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

Route::get('/', [InovasiController::class, 'index'])->name('landing.page');

Route::get('/inovasi', [InovasiController::class, 'search'])->name('inovasi.search');

Route::get('/upload-inovasi', [UploadController::class, 'index'])->middleware('auth');

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
});

Route::get('/inovasi/{id}', [InovasiController::class, 'detail'])->name('inovasi.detail');

Route::post('/inovasi/store', [InovasiController::class, 'store'])->name('inovasi.store');

Auth::routes();
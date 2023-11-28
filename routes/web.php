<?php

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

Route::get('/', [InovasiController::class, 'index'])->name('landing.page');

Route::get('/inovasi', [InovasiController::class, 'search'])->name('inovasi.search');

Route::get('/upload-inovasi', function () {
    return view('form-inovasi');
});

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
});

Route::post('/inovasi/store', [InovasiController::class, 'store'])->name('inovasi.store');

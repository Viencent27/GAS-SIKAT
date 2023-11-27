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

// Route::get('/', function () {
//     return view('landing-page');
// });

Route::get('/', [InovasiController::class, 'index'])->name('landing-page');

Route::get('/inovasi', function () {
    return view('list-inovasi');
});

Route::get('/upload-inovasi', function () {
    return view('form-inovasi');
});

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
});
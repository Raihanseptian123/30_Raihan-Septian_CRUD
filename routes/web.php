<?php

use App\Http\Controllers\siswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestKoneksiController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('cv', function () {
    return view('cv');
});

Route::get('profile_pplg', function () {
    return view('profile_pplg');
});

Route::get('/koneksi', [TestKoneksiController::class, 'index']);

Route::resource('siswa', siswaController::class);
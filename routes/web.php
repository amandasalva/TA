<?php

use App\Http\Controllers\Pegawai\BerandaBendaharaController;
use App\Http\Controllers\Pegawai\LoginPegawaiController;
use App\Http\Controllers\Siswa\BerandaSiswaController;
use App\Http\Controllers\Siswa\LoginSiswaController;
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

Route::get('/', function () {
    return view('layout.landpage');
});

Route::prefix('/siswa')->group(function() {
    Route::controller(LoginSiswaController::class)->group(function() {
        Route::get('/login', 'index')->name('siswa/login');
        Route::post('/proses/login', 'prosesLogin')->name('siswa/proses/login');
    });
    Route::middleware('auth', 'role:Siswa')->group(function() {
        Route::get('/beranda', [BerandaSiswaController::class, 'index'])->name('siswa/beranda');
    });
});


Route::prefix('/pegawai')->group(function() {
    Route::controller(LoginPegawaiController::class)->group(function() {
        Route::get('/login', 'index')->name('pegawai/login');
        Route::post('/proses/login', 'prosesLogin')->name('pegawai/proses/login');
    });
});
Route::prefix('/bendahara')->group(function() {
    Route::controller(BerandaBendaharaController::class)->group(function() {
        Route::middleware('auth', 'role:Bendahara')->group(function() {
            Route::get('/beranda', 'index')->name('bendahara/beranda');
        });
    });
});
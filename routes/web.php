<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Pegawai\BendaharaDataSiswaController;
use App\Http\Controllers\Pegawai\BerandaBendaharaController;
use App\Http\Controllers\Pegawai\BerandaGuruController;
use App\Http\Controllers\Pegawai\BerandaKepsekController;
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


Route::post('pegawai/proses/login', [LoginController::class, 'prosesLoginPegawai'])->name('pegawai.proses.login');
Route::post('siswa/proses/login', [LoginController::class, 'prosesLoginSiswa'])->name('siswa.proses.login');
Route::post('/logout', [LoginController::class, 'proses_logout'])->name('logout');
Route::prefix('/siswa')->group(function() {
    Route::get('/login', [LoginController::class, 'indexSiswa'])->middleware('guest:web')->name('siswa.login');
    Route::middleware('auth', 'role:Siswa')->group(function() {
        Route::get('/beranda', [BerandaSiswaController::class, 'index'])->name('siswa.beranda');
    });
});


Route::prefix('/pegawai')->group(function() {
    Route::get('/login', [LoginController::class, 'indexPegawai'])->middleware('guest:web')->name('pegawai.login');
    // Route::controller(LoginPegawaiController::class)->group(function() {
    //     Route::get('/login', 'index')->middleware('guest:web')->name('pegawai/login');
    //     Route::post('/proses/login', 'prosesLogin')->name('pegawai/proses/login');
    // });
});
Route::prefix('/bendahara')->group(function() {
    Route::middleware('auth', 'role:Bendahara')->group(function() {
        Route::controller(BerandaBendaharaController::class)->group(function() {
            Route::get('/beranda', 'index')->name('bendahara.beranda');
        });
        Route::controller(BendaharaDataSiswaController::class)->group(function() {
            Route::get('/data-siswa', 'index')->name('bendahara.data.siswa');
        });
    });
});
Route::prefix('/guru')->group(function() {
    Route::controller(BerandaGuruController::class)->group(function() {
        Route::middleware(['auth', 'role:Guru'])->group(function () {
            Route::get('/beranda', 'index')->name('guru.beranda');
        });
    });
});
Route::prefix('/kepalasekolah')->group(function() {
    Route::controller(BerandaKepsekController::class)->group(function() {
        Route::middleware(['auth', 'role:KepSek'])->group(function () {
            Route::get('/beranda', 'index')->name('kepalasekolah.beranda');
        });
    });
});
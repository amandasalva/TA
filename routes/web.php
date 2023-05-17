<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Pegawai\BendaharaDataGuru;
use App\Http\Controllers\Pegawai\BendaharaDataGuruController;
use App\Http\Controllers\Pegawai\BendaharaDataSiswaController;
use App\Http\Controllers\Pegawai\BendaharaKelasController;
use App\Http\Controllers\Pegawai\BendaharaPendaftaranSiswa;
use App\Http\Controllers\Pegawai\BendaharaTahunPelajaranController;
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
})->name('landingpage');


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
        Route::controller(BendaharaTahunPelajaranController::class)->group(function() {
            Route::get('/tahun/pelajaran', 'index')->name('bendahara.tahun-pelajaran');
            Route::get('/tambah/tahun/pelajaran', 'create')->name('bendahara.tambah.tahun.pelajaran');
            Route::post('/tahun-pelajaran', 'store')->name('bendahara.tahun-pelajaran.store');
            Route::get('/edit/tahun-pelajaran/{id}', 'edit')->name('bendahara.edit.tahun.pelajaran');
            Route::put('/update/tahun-pelajaran/{id}', 'update')->name('bendahara.update.tahun.pelajaran');
            Route::delete('/hapus/data/{id}', 'destroy')->name('bendahara.hapus.data');
        });
        Route::controller(BendaharaDataSiswaController::class)->group(function() {
            Route::get('/data/siswa', 'index')->name('bendahara.data.siswa');
            Route::get('/tambah/siswa', 'create')->name('bendahara.tambah.siswa');
            Route::post('/store/siswa', 'store')->name('bendahara.store.siswa');
            Route::get('/edit/data/siswa/{id}', 'edit')->name('bendahara.edit.data.siswa');
            Route::put('/update/data/siswa/{id}', 'update')->name('bendahara.update.data.siswa');
        });
        Route::controller(BendaharaDataGuruController::class)->group(function() {
            Route::get('/data/guru', 'index')->name('bendahara.data.guru');
            Route::get('/tambah/guru', 'create')->name('bendahara.tambah.guru');
            Route::post('/store/guru', 'store')->name('bendahara.store.guru');
            Route::get('/edit/guru/{id}', 'edit')->name('bendahara.edit.guru');
            Route::put('/update/guru/{id}', 'update')->name('bendahara.update.guru');
            Route::put('/users/{id}/updatePassword', 'updatePassword')->name('bendahara.updatePassword');
            Route::delete('/hapus/data/{id}', 'destroy')->name('bendahara.hapus.data');
        });
        Route::controller(BendaharaPendaftaranSiswa::class)->group(function() {
           Route::get('/pendaftaran/siswa', 'index') ->name('bendahara.pendaftaran.siswa');
           Route::post('/tambah/pendaftar', 'store')->name('bendahara.tambah.pendaftar');
        });

        Route::controller(BendaharaKelasController::class)->group(function() {
            Route::get('/data/kelas', 'index')->name('bendahara.data.kelas');
            Route::post('/tambah/kelas', 'store')->name('bendahara.tambah.kelas');
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
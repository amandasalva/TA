<?php

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

Route::prefix('/siswa')->group(function () {
    Route::controller(LoginSiswaController::class)->group(function () {
        Route::get('/login', 'index')->name('siswa/login');
    });
});
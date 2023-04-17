<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaBendaharaController extends Controller
{
    public function index()
    {
        return view('siswa.siswa-beranda');
    }
}
<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaSiswaController extends Controller
{
    public function index()
    {
        return view('u_siswa.siswa-beranda');
    }
}
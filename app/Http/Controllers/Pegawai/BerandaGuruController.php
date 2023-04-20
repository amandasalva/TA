<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaGuruController extends Controller
{
    public function index()
    {
        return view('u_guru.guru-beranda');
    }
}
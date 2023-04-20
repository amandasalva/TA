<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaKepsekController extends Controller
{
    public function index()
    {
        return view('u_kepsek.kepsek-beranda');
    }
}
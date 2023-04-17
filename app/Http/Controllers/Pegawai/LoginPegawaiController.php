<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginPegawaiController extends Controller
{
    public function index()
    {
        return view('login.login-pegawai');
    }

    public function prosesLogin(Request $request)
    {
        
    }
}
<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginSiswaController extends Controller
{
    public function index()
    {
        return view('login.login-siswa');
    }
}
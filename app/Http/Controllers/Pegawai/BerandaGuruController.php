<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaGuruController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        // dd(Auth::user()->id);
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        // dd($data);
        return view('u_guru.guru-beranda', compact('data'));
    }
}
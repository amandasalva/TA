<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaBendaharaController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        // dd(Auth::user()->id);
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        // dd($data);
        // $bendahara = Pegawai::count();
        return view('u_bendahara.bendahara-beranda', compact('data'));
    }
}
<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BendaharaDataSiswaController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        return view('u_bendahara.data-siswa', compact('data'));
    }

    public function create()
    {
        $user_id = Auth::user()->id;
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        return view('u_bendahara.tambah-data-siswa', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2000',
        ]);

        $data = $request->all();
    }   
}
<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class BendaharaUbahProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role_id == 1 || $user->role_id == 3 || $user->role_id == 4) {
            $profil = Pegawai::findOrFail ($user->id);
            $view = 'u_bendahara.profil.bendahara-ubah-profil';
        } else {
            $profil = Siswa::findOrFail ($user->id);
            $view = 'u_siswa.siswa-ubah-profil';
        }
        return view($view, compact('profil'));
    }
}
<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginPegawaiController extends Controller
{
    public function index()
    {
        return view('login.login-pegawai');
    }

    public function prosesLogin(Request $request)
    {
        $check = 0;
        $back = back()->withErrors([
            'username' => 'Maaf nama pengguna atau kata sandi anda salah!',
        ]);
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', '=', $username)->first();

        $passwordValid = Hash::check($password, $user->password);

        if (!$passwordValid) {
            return back()->withErrors([
                'username' => 'Nama Pengguna tidak ditemukan!',
            ]);
        }

        if ($user->role_id == 1) {
            if (Auth::attempt([
                'username' => $request->username, 
                'password' => $request->password])
                ) {
                    $request->session()->regenerate();
                    return redirect()->intended('bendahara/beranda');
            } else {
                return $back;
            }
        } elseif ($user->role_id == 3) {
            if (Auth::attempt([
                'username' => $request->username, 
                'password' => $request->password])
                ) {
                    $request->session()->regenerate();
                    return redirect()->intended('guru/beranda');
            } else {
                return $back;
            }
        } elseif ($user->role_id == 4) {
            if (Auth::attempt([
                'username' => $request->username, 
                'password' => $request->password])
                ) {
                    $request->session()->regenerate();
                    return redirect()->intended('kepalasekolah/beranda');
            } else {
                return $back;
            }
        } else {
            return back()->withErrors([
                'username' => 'Nama pengguna tidak ditemukan!',
            ]);
        }
    }
}
<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginSiswaController extends Controller
{
    public function index()
    {
        return view('login.login-siswa');
    }

    public function prosesLogin(Request $request)
    {
        $check = 0; //false
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ],
        [
            'username.required' => 'Nama pengguna tidak boleh kosong!',
            'password.required' => 'Kata sandi tidak boleh kosong!',
            'password.min' => 'Kata sandi minimal 8 karakter!',
        ]);

        $users = User::select('username', 'role_id')->get();
        foreach ($users as $user) {
            if ($user->username == $request->username and $user->role_id == 2) {
                $check = 1; //true
            }
        }

        if ($check == 1) {
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
               $request->session()->regenerate();
               return back()->with('success', 'Anda berhasil login!');
            //    return back()->with(['message-login-siswa', 'Anda berhasil login!']);
            } else {
                return back()->withErrors([
                    'username' => 'Maaf nama pengguna atau kata sandi anda salah!',
                ])
                ->with('error','Nama Pengguna/Kata Sandi Salah')->withInput($request->all());
                ;
            } 
        }else {
            return back()->withErrors([
                'username' => 'Nama pengguna tidak ditemukan!',
            ]);
        }
    }

    public function proses_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
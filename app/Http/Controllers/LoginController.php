<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function indexPegawai()
    {
       return view('login.login-pegawai');
    }

    public function indexSiswa()
    {
        return view('login.login-siswa');
    }

    public function prosesLoginPegawai(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ],
        [
            'username.required' => 'Nama pengguna tidak boleh kosong!',
            'password.required' => 'Kata sandi tidak boleh kosong!',
            'password.min' => 'Kata sandi minimal 8 karakter!',
        ]);

        $username = $request->username;
        $user = User::where('username', '=', $username)->first();

        if ($user) {
            $pegawai = Pegawai::where('user_id', $user->id)->first();

            if ($pegawai) {
                if ($pegawai->status == "Aktif") {
                    if ($user->role_id == 1) {
                        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                            $request->session()->regenerate();
                            return redirect('bendahara/beranda')->with('success', 'YEYY!! Anda berhasil login!');
                        } else {
                            return back()->with('error', 'OOPS!! Nama pengguna / kata sandi salah')->withInput($request->all());
                        }
                    } elseif ($user->role_id == 3) {
                        if (Auth::attempt([
                            'username' => $request->username,
                            'password' => $request->password])
                        ) {
                            $request->session()->regenerate();
                            return redirect('guru/beranda')->with('success', 'YEYY!! Anda berhasil login!');
                        } else {
                            return back()->with('error', 'OOPS!! Nama pengguna / kata sandi salah')->withInput($request->all());
                        }
                    } elseif ($user->role_id == 4) {
                        if (Auth::attempt([
                            'username' => $request->username,
                            'password' => $request->password])
                        ) {
                            $request->session()->regenerate();
                            return redirect('kepalasekolah/beranda')->with('success', 'YEYY!! Anda berhasil login!');
                        } else {
                            return back()->with('error', 'OOPS!! Nama pengguna / kata sandi salah')->withInput($request->all());
                        }
                    } else {
                        return back()->withErrors([
                            'username' => 'Nama pengguna tidak ditemukan!',
                        ]);
                    }
                } else {
                    return back()->with('error', 'Pengguna telah Non-aktif!');
                }
            } else {
                return back()->with('error', 'Pengguna tidak ditemukan!');
            }
        }
        
        return back()->withErrors([
            'username' => 'Nama pengguna / kata sandi salah',
        ]);
    }

    public function prosesLoginSiswa(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required|min:8',
            ],
            [
                'username.required' => 'Nama pengguna tidak boleh kosong!',
                'password.required' => 'Kata sandi tidak boleh kosong!',
                'password.min' => 'Kata sandi minimal 8 karakter!',
            ]
        );

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // cek role pengguna login adalah siswa
            if ($user->role_id != 2) {
                return back()->with('error','OOPS!! Nama pengguna tidak ditemukan')->withInput($request->all());
            //     // TODO: handle error ketika pengguna yang login bukan siswa
            }

            $siswa = Siswa::where('user_id', $user->id)->first();

            if ($siswa->status != 'Aktif') {
                return back()->with('error', 'Pengguna telah non-aktif!');
                // TODO: handle error ketika siswa tidak aktif
            }
        // redirect ke halaman beranda
        return redirect()->route('siswa.beranda')->with('success', 'YEYY!! Anda berhasil login!');
        } 
        else 
        {
            return redirect()->route('siswa.login')->with('error', 'OOPS!! Nama pengguna atau kata sandi salah')->withInput($request->except('password'));
        }
    }

    public function proses_logout()
    {
        if (Auth::user()->role_id == 2) {
            Session::flush();
            Auth::logout();
            return redirect('/');
        } else {
            Session::flush();
            Auth::logout();
            return redirect('pegawai/login');
        }
    }
}
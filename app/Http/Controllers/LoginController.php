<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $pegawai = Pegawai::where('user_id', $user->id)->get();

        if ($user) {
            if($pegawai[0]->status == "aktif"){
                if ($user->role_id == 1) {
                    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                            $request->session()->regenerate();
                            return redirect('bendahara/beranda')->with('success', 'YEYY!! Anda berhasil login!');
                    } else {
                        return back()->with('error','OOPS!! Nama pengguna / kata sandi salah')->withInput($request->all());
                    }
                } elseif ($user->role_id == 3) {
                    if (Auth::attempt([
                        'username' => $request->username,
                        'password' => $request->password])
                        ) {
                            $request->session()->regenerate();
                            return redirect('guru/beranda')->with('success', 'YEYY!! Anda berhasil login!');
                    } else {
                        return back()->with('error','OOPS!! Nama pengguna / kata sandi salah')->withInput($request->all());
                    }
                } elseif ($user->role_id == 4) {
                    if (Auth::attempt([
                        'username' => $request->username,
                        'password' => $request->password])
                        ) {
                            $request->session()->regenerate();
                            return redirect('kepalasekolah/beranda')->with('success', 'YEYY!! Anda berhasil login!');
                    } else {
                        return back()->with('error','OOPS!! Nama pengguna / kata sandi salah')->withInput($request->all());
                    }
                } else {
                    return back()->withErrors([
                        'username' => 'Nama pengguna tidak ditemukan!',
                    ]);
                }
            }else{
                return back()->with(
                    'error', 'Pengguna telah non-aktif!',
                );
            }
        }
        return back()->withErrors([
            'username' => 'Nama pengguna tidak ditemukan!',
        ]);
    }

    public function prosesLoginSiswa(Request $request)
    {
        // $check = 0; //false
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
        $user = User::where('username', '=', $request->username)->first();
        // if (!$user) {
            
        // }

        $siswa = Siswa::where('user_id', $user->id)->first();
        foreach ($users as $user) {
            if ($user->username == $request->username and $user->role_id == 2) {
                $check = 1; //true
            }
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        if ($check == 1) {
            if($siswa[0]->status == "Aktif"){
                    $request->session()->regenerate();
                    return back()->with('success', 'YEYY!!! Anda berhasil login');
                    } else {
                        return back()->with('error','OOPS!! Nama pengguna / kata sandi salah')->withInput($request->all());
                        ;
                    }
            }else{
                return back()->with(
                    'error', 'Pengguna telah non-aktif!',
                );
            }   
        }else {
            return back()->withErrors([
                'username' => 'Nama pengguna tidak ditemukan!',
            ]);
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
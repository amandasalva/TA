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
        // $check = 0;
        // $back = back()->withErrors([
        //     'username' => 'Maaf nama pengguna atau kata sandi anda salah!',
        // ]);
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
        $password = $request->password;

        $user = User::where('username', '=', $username)->first();

        // $passwordValid = Hash::check($password, $user->password);

        if ($user) {
            if ($user->role_id == 1) {
                if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                        $request->session()->regenerate();
                        // return back()->with('message-login-bendahara', 'Anda berhasil login!');
                        return redirect('bendahara/beranda');
                        // ->intended('bendahara/beranda');
                } else {
                    return back()->with('error','Nama Pengguna/Kata Sandi Salah')->withInput($request->all());
                }
            } elseif ($user->role_id == 3) {
                if (Auth::attempt([
                    'username' => $request->username,
                    'password' => $request->password])
                    ) {
                        $request->session()->regenerate();
                        return redirect('guru/beranda');
                        // ->intended('guru/beranda');
                } else {
                    return back()->with('error','Nama Pengguna/Kata Sandi Salah')->withInput($request->all());
                }
            } elseif ($user->role_id == 4) {
                if (Auth::attempt([
                    'username' => $request->username,
                    'password' => $request->password])
                    ) {
                        $request->session()->regenerate();
                        return redirect('kepalasekolah/beranda');
                        // ->intended('kepalasekolah/beranda');
                } else {
                    return back()->with('error','Nama Pengguna/Kata Sandi Salah')->withInput($request->all());
                }
            } else {
                return back()->withErrors([
                    'username' => 'Maaf nama pengguna atau kata sandi anda salah!',
                ]);
            }
        }
        return back()->withErrors([
            'username' => 'Nama pengguna tidak ditemukan!',
        ]);
    }



    // public function index()
    // {
    //     return view('login.login-pegawai');
    // }

    // public function prosesLogin(Request $request)
    // {
        // $check = 0;
        // $back = back()->withErrors([
        //     'username' => 'Maaf nama pengguna atau kata sandi anda salah!',
        // ]);
        // $request->validate([
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);

        // $username = $request->input('username');
        // $password = $request->input('password');

        // $user = User::where('username', '=', $username)->first();

        // $passwordValid = Hash::check($password, $user->password);

        // if ($user && Hash::check($request->password, $user->password)) {
        //     return back()->withErrors([
        //         'username' => 'Nama pengguna tidak ditemukan!',
        //     ]);
        // }
        
        // if ($user->role_id == 1) {
        //     if (Auth::attempt([
        //         'username' => $request->username, 
        //         'password' => $request->password])
        //         ) {
        //             $request->session()->regenerate();
        //             return back()->with('message-login-bendahara', 'Anda berhasil login!');
                    // return redirect()->intended('bendahara/beranda');
        //     } else {
        //         return back();
        //     }
        // } elseif ($user->role_id == 3) {
        //     if (Auth::attempt([
        //         'username' => $request->username, 
        //         'password' => $request->password])
        //         ) {
        //             $request->session()->regenerate();
        //             return redirect()->intended('guru/beranda');
        //     } else {
        //         return back();
        //     }
        // } elseif ($user->role_id == 4) {
        //     if (Auth::attempt([
        //         'username' => $request->username, 
        //         'password' => $request->password])
        //         ) {
        //             $request->session()->regenerate();
        //             return redirect()->intended('kepalasekolah/beranda');
        //     } else {
        //         return back();
        //     }
        // } else {
        //     return back()->withErrors([
        //         'username' => 'Nama pengguna tidak ditemukan!',
        //     ]);
        // }
    // }
}
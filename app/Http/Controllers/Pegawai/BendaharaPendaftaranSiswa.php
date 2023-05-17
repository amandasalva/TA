<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Pegawai;
use Illuminate\Support\Str;
use App\Models\Tahun_Ajaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Exists;

class BendaharaPendaftaranSiswa extends Controller
{
    // private $nis; // Properti $nis


    public function index()
    {
        $kelas = Kelas::where('tingkat', 'Kelas 1')->value('tingkat');
        $tapel = Tahun_Ajaran::all();
        $LastNIS = Siswa::max('nis'); //mendapatkan nis terakhir dari db
        $nis = str_pad(($LastNIS ? $LastNIS + 1 : 1), 4, '0', STR_PAD_LEFT);
        $username = strtolower(Str::random(6));
        while (User::where('username', $username)->exists()) {
            $username = strtolower(Str::random(6));
        }
        $siswa = Siswa::where('nis', $nis)->first();

        return view('u_bendahara.pendaftaran.daftar-siswa', compact('nis','kelas','tapel','username'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            // 'username' => 'required', 
            'nama_wali' => 'required', 
            'no_hp' => 'required|numeric|digits_between:11,13',
            'jk' => 'required',
            'tempat_lahir' => 'required ',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required', 
            'thn_masuk' => 'required',
            'status' => 'required',
        ],
        [
            'nama_lengkap.required' => 'Nama lengkap harus diisi.',
            // 'username.required' => 'Nama pengguna harus diisi.',
            'nama_wali.required' => 'Nama wali tidak boleh kosong.',
            'no_hp.required' => 'No telepon harus diisi.',
            'jk.required'=> 'Jenis kelamin harus diisi.',
            'tempat_lahir.required' => 'Tempat lahir harus diisi.',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi,',
            'agama.required' => 'Agama harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'thn_masuk.required' => 'Tahun masuk harus diisi.' ,
            'status.required' => 'Status harus diisi.',
        ]);

        $data = $request->all();
        if ($request->file('image') == "") {
            $user = new User();
            $user->username = $data['nis'];
            $user->password = Hash::make('absdmulia05');
            $user->role_id = '2';
            $user->save();

            $siswa = new Siswa();
            $siswa->user_id = $user->id;
            $siswa->nis = $request->nis;
            $siswa->nama_lengkap = $data['nama_lengkap'];
            $siswa->nama_wali = $data['nama_wali'];
            $siswa->no_hp = $data['no_hp'];
            $siswa->jk = $data['jk'];
            $siswa->tempat_lahir = $data['tempat_lahir'];
            $siswa->tgl_lahir = $data['tgl_lahir'];
            $siswa->agama = $data['agama'];
            $siswa->alamat = $data['alamat'];
            $siswa->thn_masuk = $data['thn_masuk'];
            $siswa->kelas = $data['kelas'];
            $siswa->status = $data['status'];
            // dd($siswa);
            $siswa->save();
        } else {
            $image = $request->file('image');
            $image->storeAs('public/foto_profil', $image->hashName());

            $user = new User();
            $user->username = $data['nis'];
            $user->password = Hash::make('absdmulia');
            $user->role_id = '2';
            $user->save();

            $siswa = new Siswa();
            $siswa->user_id = $user->id;
            $siswa->nis = $request->nis;
            $siswa->nama_lengkap = $data['nama_lengkap'];
            $siswa->nama_wali = $data['nama_wali'];
            $siswa->no_hp = $data['no_hp'];
            $siswa->jk = $data['jk'];
            $siswa->tempat_lahir = $data['tempat_lahir'];
            $siswa->tgl_lahir = $data['tgl_lahir'];
            $siswa->agama = $data['agama'];
            $siswa->alamat = $data['alamat'];
            $siswa->thn_masuk = $data['thn_masuk'];
            $siswa->kelas = $data['kelas'];
            $siswa->status = $data['status'];
            $siswa->image = $image->hashName();
            $siswa->save();
        }
        return back()->with('success', 'Data berhasil disimpan');
    }
}
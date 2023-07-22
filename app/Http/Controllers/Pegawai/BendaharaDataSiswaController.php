<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\Kelas;
use App\Models\Pegawai;
use Illuminate\Support\Str;
use App\Models\Tahun_Ajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BendaharaDataSiswaController extends Controller
{
    public function index()
    {
        $username = strtolower(Str::random(6));
        while (User::where('username', $username)->exists()) {
            $username = strtolower(Str::random(6));
        }
        $siswa = DB::table('siswas')
            ->select(
            'siswas.id AS siswa_id',
            'siswas.user_id',
            'siswas.NIS',   
            'siswas.nama_lengkap',
            'siswas.nama_wali',
            'siswas.no_hp',
            'siswas.jk',
            'siswas.tempat_lahir',
            'siswas.tgl_lahir',
            'siswas.agama',
            'siswas.alamat',
            'siswas.thn_masuk',
            'siswas.status',
            'siswas.image',
            'kelas.id AS kelas_id',
            'kelas.tingkat',
            'users.username'
            )
            ->join('users', 'siswas.user_id', '=', 'users.id')
            ->leftJoin('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->where('users.role_id', '=', '2')
            ->orderBy('siswas.id', 'DESC')
            ->get();
            
        return view('u_bendahara.siswa.data-siswa', compact('siswa','username'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $tapel = Tahun_Ajaran::all();
        return view('u_bendahara.siswa.tambah-data-siswa', compact('kelas','tapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required',
            'nama_wali' => 'required',
            // 'agama' => 'required',
            'no_hp' => 'required|numeric|digits_between:11,13',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'thn_masuk' => 'required',
            'kelas' => 'required',
            // 'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:1000',
        ],
        [
            'nis.required' => 'NIS harus diisi.',
            'nis.numeric' => 'Inputan harus berupa angka.',
            'nama_lengkap.required' => 'Nama lengkap harus diisi.',
            'nama_wali.required' => 'Nama wali tidak boleh kosong.',
            // 'agama.required' => 'Agama harus diisi.',
            'no_hp.required' => 'No telepon harus diisi.',
            'no_hp.numeric' => 'No telepon harus angka.',
            'no_hp.digits_between' => 'No telepon diisi dengan panjang 11-13 angka.',
            'tempat_lahir.required' => 'Tempat lahir harus diisi.',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi.',
            'jk.required'=> 'Jenis kelamin harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'thn_masuk.required' => 'Harus memilih tahun masuk.',
            'kelas.required' => 'Harus memilih kelas.',
            // 'status.required' => 'Status harus diisi.',
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
            $siswa->nis = $data['nis'];
            $siswa->nama_lengkap = $data['nama_lengkap'];
            $siswa->nama_wali = $data['nama_wali'];
            $siswa->no_hp = $data['no_hp'];
            $siswa->jk = $data['jk'];
            $siswa->tempat_lahir = $data['tempat_lahir'];
            $siswa->tgl_lahir = $data['tgl_lahir'];
            $siswa->agama = 'Islam';
            $siswa->alamat = $data['alamat'];
            $siswa->thn_masuk = $data['thn_masuk'];
            $siswa->kelas_id = $data['kelas'];
            $siswa->status = 'Aktif';
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
            $siswa->nis = $data['nis'];
            $siswa->nama_lengkap = $data['nama_lengkap'];
            $siswa->nama_wali = $data['nama_wali'];
            $siswa->no_hp = $data['no_hp'];
            $siswa->jk = $data['jk'];
            $siswa->tempat_lahir = $data['tempat_lahir'];
            $siswa->tgl_lahir = $data['tgl_lahir'];
            $siswa->agama = 'Islam';
            $siswa->alamat = $data['alamat'];
            $siswa->thn_masuk = $data['thn_masuk'];
            $siswa->kelas_id = $data['kelas'];
            $siswa->status = 'Aktif';
            $siswa->image = $image->hashName();
            $siswa->save();
        }
        return redirect('bendahara/data/siswa')->with('success', 'Data berhasil disimpan');
    }   

    public function edit($id)
    {
        $kelas = Kelas::all();
        $tapel = Tahun_Ajaran::all();
        $siswa = Siswa::find($id);
        // dd($siswa);
        return view('u_bendahara.siswa.edit-data-siswa', compact('siswa', 'kelas', 'tapel'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $request->validate([
            'nis' => 'required',
            'nama_lengkap' => 'required',
            'nama_wali' => 'required',
            'agama' => 'required',
            'no_hp' => 'required|numeric|digits_between:11,13',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'thn_masuk' => 'required',
            'kelas' => 'required',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2000',
        ],
        [
            'nis.required' => 'NIS harus diisi.',
            'nama_lengkap.required' => 'Nama lengkap harus diisi.',
            'nama_wali.required' => 'Nama wali tidak boleh kosong.',
            'agama.required' => 'Agama harus diisi.',
            'no_hp.required' => 'No telepon harus diisi.',
            'tempat_lahir.required' => 'Tempat lahir harus diisi.',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi,',
            'jk.required'=> 'Jenis kelamin harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'thn_masuk.required' => 'Harus memilih tahun masuk',
            'kelas.required' => 'Harus memilih kelas,',
            'status.required' => 'Status harus diisi.',
        ]);

        if($request->file('image') === null)
        {
            $user = User::where('id', $siswa->user_id)->update([
                'username' => $request->input('nis'),
                'role_id' => '2',
            ]);

            
            Siswa::where('id', $id)->update([
                'nis' => $request->input('nis'),
                'nama_lengkap' => $request->input('nama_lengkap'),
                'nama_wali' => $request->input('nama_wali'),
                'agama' => $request->input('agama'),
                'no_hp' => $request->input('no_hp'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tgl_lahir' => $request->input('tgl_lahir'),
                'jk' => $request->input('jk'),
                'alamat' => $request->input('alamat'),
                'thn_masuk' => $request->input('thn_masuk'),
                'kelas' => $request->input('kelas'),
                'status' => $request->input('status'),
            ]);

        } else {
            Storage::disk('local')->delete(
                'public/foto_profil/' . basename($siswa->image)
            );

            $image = $request->file('image');
            $image->store('public/foto_profil/' . $image->hashName());

            User::where('id', $siswa->user_id)->update([
                'username' => $request->input('username'),
                'role_id' => '2',
            ]);

            
            Siswa::where('id', $id)->update([
                'nis' => $request->input('nis'),
                'nama_lengkap' => $request->input('nama_lengkap'),
                'nama_wali' => $request->input('nama_wali'),
                'agama' => $request->input('agama'),
                'no_hp' => $request->input('no_hp'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tgl_lahir' => $request->input('tgl_lahir'),
                'jk' => $request->input('jk'),
                'alamat' => $request->input('alamat'),
                'thn_masuk' => $request->input('thn_masuk'),
                'kelas' => $request->input('kelas'),
                'status' => $request->input('status'),
                'image' => $image->hashName(),
            ]);
        }
        return redirect('bendahara/data/siswa')->with('success', 'Data berhasil di perbaharui');
    }

    public function updatePassword(Request $request, $id)
    {
        $siswa = Siswa::where('id', '=', $id)->first();
        $user = User::where('id', '=', $siswa->user_id)->first();
        $request->validate([
            'new_password' => 'required|min:8',
        ]);

        $password = Hash::make($request->input('new_password'));

        User::where('id', '=', $user->id)->update([
            'password' => $password
        ]);

        return redirect('bendahara/data/siswa')->with('success', 'Kata Sandi berhasil di perbaharui');
    }
}
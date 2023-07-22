<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DataDiriKepsekController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        $kepsek = DB::table('pegawais')
            ->select(
                'pegawais.id AS pegawai_id',
                'pegawais.user_id',
                'pegawais.nama_lengkap',
                'pegawais.tempat_lahir',
                'pegawais.tgl_lahir',
                'pegawais.jk',
                'pegawais.alamat',
                'pegawais.agama',
                'pegawais.no_hp',
                'pegawais.status',
                'pegawais.image',
                // 'kelas_id AS kelas_id',
                // 'kelas.tingkat',
                'users.username'
            )
            ->join('users', 'pegawais.user_id', '=', 'users.id')
            ->where('role_id', '=', '4')
            // ->leftJoin('kelas', 'pegawais.kelas_id', '=', 'kelas.id')
            ->first();
        return view('u_bendahara.guru.kepsek.data-kepsek', compact('data', 'kepsek'));

        // if ($kepsek) {
        //     return view('u_bendahara.guru.kepsek.data-kepsek', compact('data', 'kepsek'));
        // } else {
        //     // Tidak ada data kepsek yang ditemukan
        //     return view('u_bendahara.guru.kepsek.data-kepsek', compact('data'));
        // }
        
    }

    public function edit()
    {
        // $data = Pegawai::where('id', '=', $id)->first();
        // $bendahara = Pegawai::join('users', 'pegawai.user_id', '=', 'users.id')
        //         ->select('pegawais.*','pegawais.id','users.username')
        //         ->where('pegawais.id', $id)
        //         ->first();
        // return view('u_bendahara.guru.kepsek.ubah-data-kepsek', compact('data', 'bendahara'));
        return view('u_bendahara.guru.kepsek.ubah-data-kepsek');
    }

    public function update(Request $request, Pegawai $bendahara, $id)
    {
        $bendahara = Pegawai::where('id', '=', $id)->first();
        $user = User::where('username', $request['username'])->first();
        $pegawai = Pegawai::findOrFail($id);

        $validate = Validator::make($request->all(), [
            'nama_lengkap'  => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'jk'            => 'required',
            'alamat'        => 'required',
            'agama'         => 'required',
            'no_hp'         => 'required|numeric|digits_between:11,13',
            'status'        => 'required',
            'username'      => 'required|unique:users,username,'.$pegawai->user_id,
        ],
        [
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi',
            'jk.required' => 'Jenis kelamin wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'agama.required' => 'Agama wajib diisi',
            'no_hp.required' => 'No hp wajib diisi',
            'no_hp.numeric' => 'No hp diisi dengan format angka',
            'no_hp.digits_between' => 'Isikan no hp dengan panjang 11-13 angka',
            'username.required' => 'Kolom username harus diisi.',
            'username.unique' => 'Username sudah digunakan. Harap pilih username lain.',
            'status.required' => 'Status wajib diisi',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate->messages()->first());
        }
        else {
            if ($request->file('image') === null) {
                User::where('id', $pegawai->user_id)->update([
                    'username' => $request->input('username'),
                    'role_id' => '4',
                ]);
                
                Pegawai::where('id', $id)->update([
                    "nama_lengkap" => $request->input("nama_lengkap"),
                    "tempat_lahir" => $request->input("tempat_lahir"),
                    "tgl_lahir" => $request->input("tgl_lahir"),
                    "jk" => $request->input("jk"),
                    "agama" => $request->input("agama"),
                    "no_hp" => $request->input("no_hp"),
                    "alamat" => $request->input("alamat"),
                    'status' => $request->input('status'),
                ]);

            } else {
                Storage::disk('local')->delete(
                    'public/foto_profil' . basename($bendahara->image)
                );

                $image = $request->file('image');
                $image->storeAs('public/foto_profil', $image->hashName());

                User::where('id', $user->id)->update([
                    'username' => $request->input('username'),
                    'role_id' => '4'
                ]);

                Pegawai::where("user_id", $user->id)->update([
                    "nama_lengkap" => $request->input("nama_lengkap"),
                    "tempat_lahir" => $request->input("tempat_lahir"),
                    "tgl_lahir" => $request->input("tgl_lahir"),
                    "jk" => $request->input("jk"),
                    "agama" => $request->input("agama"),
                    "no_hp" => $request->input("no_hp"),
                    "alamat" => $request->input("alamat"),
                    "status" => $request->input("status"),
                    "image" => $image->hashName(),
                ]);
            }
        }
        return redirect('bendahara/ubah/data')->with('success', 'Data berhasil diperbaharui');
    }
}
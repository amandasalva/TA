<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BendaharaDataGuruController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        $guru = DB::table('pegawais')
            ->leftJoin('users', 'pegawais.user_id', '=', 'users.id')
            ->where('users.role_id', '=', '3')
            ->select(
                'users.username',
                'pegawais.nama_lengkap',
                'pegawais.jk',
                'pegawais.alamat',
                'pegawais.image',
                'pegawais.status',
                'pegawais.id',
            )
            ->get();
            // dd($guru);
        return view('u_bendahara.guru.data-guru', compact('data', 'guru'));
    }

    public function create()
    {
        $user_id = Auth::user()->id;
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        return view('u_bendahara.guru.tambah-data-guru', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'  => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'jk'            => 'required',
            'alamat'        => 'required',
            'agama'         => 'required',
            'no_hp'         => 'required|numeric|digits_between:11,13',
            'status'        => 'required',
            // 'image'         => 'nullable|image|mimes:jpeg,jpg,png|max:2000',
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
            'status.required' => 'Status wajib diisi',
            // 'image.image' => 'Gambar harus berupa jpeg, jpg, atau png',
            'image.max' => 'Gambar maksimal 2 mb',
        ]);

        $data = $request->all();
        
        $cekData1 = Pegawai::where('no_hp', $data['no_hp'])
            // ->where('nama_lengkap', $data['nama_lengkap'])
            ->exists();
        if ($cekData1) {
            return redirect()->back()->with('error', 'UPS🤐, Data sudah ada');
        } else {
            // if ($request->file('image') == "") {
                // $image = $request->file('image');
                // $image->storeAs('public/foto_profil', $image->hashName());
                $user = new User();
                $user->username = $data['no_hp'];
                $user->password = Hash::make('absdmulia05');
                $user->role_id = '3';
                $user->save();
    
                $guru = new Pegawai();
                $guru->user_id = $user->id;
                $guru->nama_lengkap = $data['nama_lengkap'];
                $guru->tempat_lahir = $data['tempat_lahir'];
                $guru->tgl_lahir = $data['tgl_lahir'];
                $guru->jk = $data['jk'];
                $guru->alamat = $data['alamat'];
                $guru->agama = $data['agama'];
                $guru->no_hp = $data['no_hp'];
                $guru->status = $data['status'];
                $guru->image = 'user-default.jpg';
                $guru->save();
            // } else {
                // dengan gambar
            //     $image = $request->file('image');
            //     $image->storeAs('public/foto_profil', $image->hashName());
    
            //     $user = new User();
            //     $user->username = $data['no_hp'];
            //     $user->password = Hash::make('absdmulia05');
            //     $user->role_id = '3';
            //     $user->save();
    
            //     $guru = new Pegawai();
            //     $user->user_id = $user->id;
            //     $guru->nama_lengkap = $data['nama_lengkap'];
            //     $guru->tempat_lahir = $data['tempat_lahir'];
            //     $guru->tgl_lahir = $data['tgl_lahir'];
            //     $guru->jk = $data['jk'];
            //     $guru->alamat = $data['alamat'];
            //     $guru->agama = $data['agama'];
            //     $guru->no_hp = $data['no_hp'];
            //     $guru->status = $data['status'];
            //     $guru->image = $image->hashName();
            //     $guru->save();
            // }
            return redirect('bendahara/data/guru')->with('success', 'Data berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        $guru = Pegawai::find($id);
        // $guru = DB::table('pegawais')
        //     ->join('users', 'pegawais.user_id', '=', 'users.id')
        //     ->where('pegawais.id', '=', $id)
        //     ->first();
        return view('u_bendahara.guru.edit-data-guru', compact('data', 'guru'));
    }

    public function update(Request $request, $id)
    {
        
    }
}
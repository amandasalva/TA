<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Pegawai;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BendaharaDataGuruController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        $guru = DB::table('pegawais')
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
                'kelas.id AS kelas_id',
                'kelas.tingkat',
                'users.username',
                'users.email',
            )
            ->join('users', 'pegawais.user_id', '=', 'users.id')
            ->leftJoin('kelas', 'pegawais.kelas_id', '=', 'kelas.id')
            ->where('users.role_id', '=', '3')
            ->get();
            // dd($guru);
        return view('u_bendahara.guru.data-guru', compact('data', 'guru'));
    }

    public function create()
    {
        $user_id = Auth::user()->id;
        $kelas = Kelas::all();
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        return view('u_bendahara.guru.tambah-data-guru', compact('data', 'kelas'));
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
            'username'      => 'required|unique:users,username',
            'no_hp'         => 'required|numeric|digits_between:11,13',
            'image'         => 'nullable|image|mimes:jpeg,jpg,png|max:1000',
        ],
        [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi',
            'jk.required' => 'Jenis kelamin wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'agama.required' => 'Agama wajib diisi',
            'no_hp.required' => 'No hp wajib diisi',
            'no_hp.numeric' => 'No hp diisi dengan format angka',
            'no_hp.digits_between' => 'Isikan no hp dengan panjang 11-13 angka',
            'username.required' => 'Kolom username harus diisi.',
            'username.unique' => 'Nama pengguna sudah digunakan. Harap pilih Nama pengguna lain.',
            'image.image' => 'Gambar harus berupa jpeg, jpg, atau png',
            'image.max' => 'Gambar maksimal 2 mb',
        ]);

        $data = $request->all();
        
        $cekData1 = User::where('username', $data['username'])->exists();
        if ($cekData1) {
            return redirect()->back()->with('error', 'UPS🤐, Data sudah ada')->withInput($request->all());
        } else {
            if ($request->file('image') == "") {
                $user = new User();
                $user->username = $data['username'];
                $user->password = Hash::make('absdmulia05');
                $user->role_id = '3';
                $user->email = $data['email'];
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
                $guru->kelas_id = $data['kelas'];
                $guru->status = 'Aktif';
                // $guru->status = $data['status'];
                // $guru->image = 'user-default.jpg';
                $guru->save();
            } else {
                // dengan gambar
                $image = $request->file('image');
                $image->storeAs('public/foto_profil', $image->hashName());
    
                $user = new User();
                $user->username = $data['no_hp'];
                $user->password = Hash::make('absdmulia05');
                $user->role_id = '3';
                $user->email = $data['email'];
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
                $guru->kelas_id = $data['kelas'];
                $guru->status = 'Aktif';
                // $guru->status = $data['status'];
                $guru->image = $image->hashName();
                $guru->save();
            }
            return redirect('bendahara/data/guru')->with('success', 'Data berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $data = Pegawai::where('id', '=', $id)->first();
        $guru = Pegawai::join('users','pegawais.user_id','=','users.id')
            ->select('pegawais.*','pegawais.id','users.username')
            ->where('pegawais.id',$id)
            ->first();
        // dd($guru);
        return view('u_bendahara.guru.edit-data-guru', compact('data', 'guru'));
    }

    public function update(Request $request, Pegawai $guru, $id)
    {
        // dd($request->file("image"));

        $data = $request->all();
        $guru = Pegawai::where('id', '=', $id)->first();
        $user = User::where('username', $request['username'])->first();
        $peg = Pegawai::findOrFail($id);

        $validate = Validator::make($request->all(),[
            'nama_lengkap'  => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'jk'            => 'required',
            'alamat'        => 'required',
            'agama'         => 'required',
            'no_hp'         => 'required|numeric|digits_between:11,13',
            // unique:users,username,'$user->id
            'status'        => 'required',
            'username'      => 'required|unique:users,username,'.$peg->user_id,
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
            // 'image.max' => 'Gambar maksimal 2 mb',
        ]);

        // if ($user->username !== "" && $guru->user_id !== $user->id) {
        //     return redirect()->back()->with('error', 'UPS🤐, Data sudah ada');
        // } 
        if($validate->fails()){
            return redirect()->back()->with('error', $validate->messages()->first());
        }
        else {
            // check jika image kosong
            if ($request->file("image") === null) {
                // update tanpa image
                
                
                Pegawai::where("id", $id)->update([
                    "nama_lengkap" => $request->input("nama_lengkap"),
                    "tempat_lahir" => $request->input("tempat_lahir"),
                    "tgl_lahir" => $request->input("tgl_lahir"),
                    "jk" => $request->input("jk"),
                    "agama" => $request->input("agama"),
                    "no_hp" => $request->input("no_hp"),
                    "alamat" => $request->input("alamat"),
                    "status" => $request->input("status"),
                ]);

               
                // dd($peg);    

                User::where("id", $peg->user_id)->update([
                    "username" => $request->input("username"),
                    "role_id" => "3",
                ]);
            } else {
                //hapus image lama
                Storage::disk("local")->delete(
                    "public/foto_profil/" . basename($guru->image)
                );
    
                //upload dengan image baru
                $image = $request->file("image");
                // dd($image);
                $image->storeAs("public/foto_profil", $image->hashName());
    
                //update data dengan image baru
                User::where("id", $user->id)->update([
                    "username" => $request->input("username"),
                    "role_id" => "3",
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
        return redirect('bendahara/data/guru')->with('success', 'Data berhasil diperbaharui');
    }

    public function updatePassword(Request $request, $id)
    {
        $pegawai = Pegawai::where('id', '=', $id)->first();
        
        $user = User::where('id', '=', $pegawai->user_id)->first();
        
        $request->validate([
            // 'password' => 'required|min:8',
            'new_password' => 'required|min:8',
        ]);

        $password = Hash::make($request->input('new_password'));

        User::where('id', '=', $user->id)->update([
            'password' => $password
        ]);

        return redirect('bendahara/data/guru')->with('success', 'Kata Sandi berhasil diperbaharui');
    }
    
    public function destroy(Request $request, $id)
    {
        $data = Pegawai::findOrFail($id);
        // dd($data); 
        // $data ini untuk menampilkan data yang akan di edit sesuai dengan id nya
        if ($request->ajax()){
            if ($data) {
                $data->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Data ' . $data->nama_lengkap . ' berhasil dihapus.'
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan.'
            ]);
        }
        return redirect('bendahara.hapus.data');
    }
}
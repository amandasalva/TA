<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $data = Sekolah::find(1)->first();
        return view('u_bendahara.lpsekolah.index', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'informasi_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'email_sekolah' => 'required',
            'telepon_sekolah' => 'required',
            'facebook_sekolah' => 'required',
            'instagram_sekolah' => 'required',
            'jam_kerja_sekolah' => 'required',
            // 'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1000',
        ]);

        $sekolah = Sekolah::find(1);
            $sekolah->nama_sekolah = $request->nama_sekolah;
            $sekolah->informasi_sekolah = $request->informasi_sekolah;
            $sekolah->alamat_sekolah = $request->alamat_sekolah;
            $sekolah->email_sekolah = $request->email_sekolah;
            $sekolah->telepon_sekolah = $request->telepon_sekolah;
            $sekolah->facebook_sekolah = $request->facebook_sekolah;
            $sekolah->instagram_sekolah = $request->instagram_sekolah;
            $sekolah->jam_kerja_sekolah = $request->jam_kerja_sekolah;
            $sekolah->save();

        $data = $request->all();
        if ($request->file('image') == "") {
            
            $sekolah = Sekolah::find(1);
            $sekolah->nama_sekolah = $data['nama_sekolah'];
            $sekolah->informasi_sekolah = $data['informasi_sekolah'];
            $sekolah->alamat_sekolah = $data['alamat_sekolah'];
            $sekolah->email_sekolah = $data['email_sekolah'];
            $sekolah->telepon_sekolah = $data['telepon_sekolah'];
            $sekolah->facebook_sekolah = $data['facebook_sekolah'];
            $sekolah->instagram_sekolah = $data['instagram_sekolah'];
            $sekolah->jam_kerja_sekolah = $data['jam_kerja_sekolah'];
            $sekolah->save();
        } else {

            Storage::disk("local")->delete(
                "public/images" . basename($sekolah->image)
            );
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());
            
            $sekolah = Sekolah::find(1);
            $sekolah->nama_sekolah = $data['nama_sekolah'];
            $sekolah->informasi_sekolah = $data['informasi_sekolah'];
            $sekolah->alamat_sekolah = $data['alamat_sekolah'];
            $sekolah->email_sekolah = $data['email_sekolah'];
            $sekolah->telepon_sekolah = $data['telepon_sekolah'];
            $sekolah->facebook_sekolah = $data['facebook_sekolah'];
            $sekolah->instagram_sekolah = $data['instagram_sekolah'];
            $sekolah->jam_kerja_sekolah = $data['jam_kerja_sekolah'];
            $sekolah->image = $image->hashName();
            $sekolah->save();
        }
        
        return redirect()->route('bendahara.profil.sekolah')->with('success','YEYY!! Data sekolah berhasil diubah!');
    }
}
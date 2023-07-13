<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Jenis_Transaksi;
use App\Models\Riwayat_Jenis_Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BendaharaJnsTransaksiController extends Controller
{
    public function index()
    {
        $jenis = Jenis_Transaksi::all();
        return view('pembayaran.data-jenis-transaksi', compact('jenis'));
    }

    public function riwayat()
    {
        $riwayat = Riwayat_Jenis_Transaksi::orderBy('created_at','DESC')->get();
        return view('pembayaran.riwayat-nominal', compact('riwayat'));
    }

    public function ubah_nominal(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'nominal' => 'required|numeric'
        ],
        [
            'nominal.required' => 'Mohon isi nominal',
            'nominal.numeric' => 'Mohon isi nominal dengan angka',
        ]
    );

        if($validate->fails()){
            return back()->with('error', $validate->messages()->all());
        }

        $jenis = Jenis_Transaksi::find($id);
        $riwayat = new Riwayat_Jenis_Transaksi();
        $riwayat->nominal = $jenis->nominal;
        $riwayat->nama_tagihan = $jenis->nama_tagihan;
        $riwayat->created_at = Carbon::now();
        $riwayat->save();

        
        $jenis->nominal = $request->nominal;
        $jenis->save();

        

        return back()->with('success', 'Nominal berhasil di ubah');
    }
}
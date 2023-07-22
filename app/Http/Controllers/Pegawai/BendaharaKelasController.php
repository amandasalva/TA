<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator;

class BendaharaKelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('u_bendahara.kelas.data-kelas', compact('kelas'));
    }
    
    public function store(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'tingkat' => 'required|unique:kelas'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'UPS🤐, Kelas sudah ada');
        }else{
            $kelas = new Kelas();
            $kelas->tingkat = $request->tingkat;
            $kelas->save();
            
            return redirect('bendahara/data/kelas')->with('success', 'Kelas berhasil ditambahkan');
        }
    }
}
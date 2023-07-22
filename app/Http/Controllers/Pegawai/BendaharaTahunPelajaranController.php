<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Tahun_Ajaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BendaharaTahunPelajaranController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        // $tahun = Tahun_Ajaran::orderBy('tahun', 'asc')->get();
        $tahun = Tahun_Ajaran::orderBy('tahun', 'asc')
        //orderbyraw itu mengurutkan dengan ekspresi sql (case when)
        //case when mengurutkan bedasarkan ganjil genap, 2021/ ganjil 1 genap 2
        ->orderByRaw("CASE WHEN SUBSTRING_INDEX(semester, '/', 1) = 'Ganjil' THEN 1 ELSE 2 END ASC")
                    ->get();
        return view('u_bendahara.tahunAjaran.tahun-pelajaran', compact('data'));
    }
    
    public function create()
    {
        $user_id = Auth::user()->id;
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        
        return view('u_bendahara.tahunAjaran.tambah-tahun-pelajaran', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'semester' => 'required',
        ],
        [
            'tahun.required' => 'Tahun pelajaran harus diisi!',
            'semester.required' => 'Semester harus diisi!',
        ]);

        $tahunAjaran = Tahun_Ajaran::where('tahun', $request->tahun)->where('semester', $request->semester)->first();
        if ($tahunAjaran) {
            return redirect()->back()->with('error', 'Data sudah ada.');
        }
        Tahun_Ajaran::create([
            'tahun' => $request->tahun,
            'semester' => $request->semester,
        ]);
        return redirect('bendahara/tahun/pelajaran')->with('success', 'Data tahun ajaran berhasil di simpan.');
    }

    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        $tahunAjaran = Tahun_Ajaran::find($id);
        return view('u_bendahara.tahunAjaran.edit-tahun-pelajaran', compact('data', 'tahunAjaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required',
            'semester' => 'required',
        ], 
        [
            'tahun.required' => 'Tahun ajaran harus diisi.',
            'semester.required' => 'Semester harus diisi',
        ]);
        
        $tahunAjaran = Tahun_Ajaran::where('tahun', $request->tahun)->where('semester', $request->semester)->first();
        if ($tahunAjaran) {
            return redirect()->back()->with('error', 'Data sudah ada.');
        }
        $tahunAjaran = Tahun_Ajaran::find($id);
        $tahunAjaran->tahun = $request->tahun;
        $tahunAjaran->semester = $request->semester;
        // dd($tahunAjaran);
        $tahunAjaran->update();
        return redirect('bendahara/tahun/pelajaran')->with('success', 'Data berhasil diubah');
    }

    // public function destroy(Request $request, $id)
    // {
    //     $data = Tahun_Ajaran::findOrFail($id);
    //     // dd($data); 
    //     // $data ini untuk menampilkan data yang akan di edit sesuai dengan id nya
    //     // $data->delete();
    //     if ($request->ajax()){
    //         if ($data) {
    //             $data->delete();
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'Data '. $data->tahun . ' berhasil dihapus.'
    //             ]);
    //         }
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Data tidak ditemukan.'
    //         ]);
    //     }
    //     return redirect('bendahara/tahun/pelajaran');
    // }
}
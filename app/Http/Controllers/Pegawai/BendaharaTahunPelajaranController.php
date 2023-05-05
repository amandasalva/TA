<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Tahun_Ajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BendaharaTahunPelajaranController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        $tahun = Tahun_Ajaran::all();
        return view('u_bendahara.tahun-pelajaran', compact('data', 'tahun'));
    }

    public function create()
    {
        $user_id = Auth::user()->id;
        $data = Pegawai::where('user_id', '=', $user_id)->first();
        return view('u_bendahara.tambah-tahun-pelajaran', compact('data'));
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

        Tahun_Ajaran::create([
            'tahun' => $request->tahun,
            'semester' => $request->semester,
        ]);
        return redirect('bendahara/tahun/pelajaran')->with('success', 'Data tahun ajaran berhasil di tambahkan.');
    }

    public function destroy($id)
    {
        $data = Tahun_Ajaran::find($id);
        dd($data);
        // $data->delete();

        // Tahun_Ajaran::where('id', $id)->delete();

        // DB::table('tahun_ajarans')->where('tahun_ajarans_id', $id)->delete();

        return redirect('bendahara/tahun/pelajaran');
    }
}
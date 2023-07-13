<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Transaksi;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransController extends Controller
{
    public function createPayment(Request $request)
    {
        
        $validate = Validator::make($request->all(), [
            'siswa' => 'required',
            'total' => 'required|numeric',
            'keterangan' => 'nullable|min:5',
            'tipe_pembayaran' => 'required'
        ]);

        if($validate->failed()){
            return redirect()->back()->with('error', $validate->messages()->all()[0]);
        }
        
        $jenis = Jenis_Transaksi::findOrFail($request->jenis);
        $siswa = Siswa::find($request->siswa);
        // Set konfigurasi Midtrans
        Config::$serverKey = 'SB-Mid-server-LYtHWJD_GMq4QUGX6YqMQcJb';
        Config::$clientKey = 'SB-Mid-client-sGpkmfRe4LaoyMU_';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = false;

        if($request->tipe_pembayaran != "tunai"){
            // Buat transaksi Midtrans
            $transaction = array(
                'transaction_details' => array(
                    'order_id' => 'ORDER-' . time(),
                    'gross_amount' => $jenis->nominal,
                    // nm tagihan
                ),
                'customer_details' => array(
                    'first_name' => $siswa->nama_lengkap,
                    'phone' => $siswa->no_hp,
                    // nis
                ),
            );
        }
        
        // Buat halaman pembayaran Midtrans
        $snapToken = Snap::getSnapToken($transaction);
        $paymentUrl = Snap::createTransaction($transaction)->redirect_url;

        $pembayaran = new Pembayaran();
        $pembayaran->siswa_id = $siswa->id;
        $pembayaran->tgl_pembayaran = Carbon::now();
        $pembayaran->total_bayar = $jenis->nominal;

        $pembayaran->tipe_pembayaran = $request->tipe_pembayaran;
        if($request->tipe_pembayaran == "tunai"){
            $pembayaran->status = "Sukses";
        }else{
            $pembayaran->token = $paymentUrl . '#/alfamart';
            $pembayaran->status = "Pending";
        }
        $pembayaran->keterangan = $jenis->nama_tagihan. ' - ' . $request->keterangan;
        // $pembayaran->kelas_id = $siswa->kelas_id;
        // $pembayaran->pdf = 'https://app.sandbox.midtrans.com/snap/v1/transactions/'. $snapToken .'/pdf';
        $pembayaran->save();


        // Redirect ke halaman pembayaran Midtrans
         return back()->with('success', 'Pembuatan transaksi berhasil!');
    }

    public function index()
    {
        $siswa = Siswa::all();
        $jenis = Jenis_Transaksi::all();
        // dd($jenis);
        
        return view('pembayaran.checkout', compact('siswa','jenis'));
    }

    public function allTransaction()
    {
        return view('pembayaran.semua-transaksi');
    }
}
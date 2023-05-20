<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransController extends Controller
{
    public function createPayment(Request $request)
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = 'SB-Mid-server-LYtHWJD_GMq4QUGX6YqMQcJb';
        Config::$clientKey = 'SB-Mid-client-sGpkmfRe4LaoyMU_';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat transaksi Midtrans
        $transaction = array(
            'transaction_details' => array(
                'order_id' => 'ORDER-' . time(),
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => 'Amanda',
                'last_name' => 'Salva',
                'email' => 'johndoe@example.com',
                'phone' => '081234567890',
            ),
        );

        // Buat halaman pembayaran Midtrans
        $snapToken = Snap::getSnapToken($transaction);
        $paymentUrl = Snap::createTransaction($transaction)->redirect_url;

        // Redirect ke halaman pembayaran Midtrans
    return redirect($paymentUrl);
    }

    public function index()
    {
        $siswa = Siswa::all();
        
        return view('pembayaran.checkout', compact('siswa'));
    }
}
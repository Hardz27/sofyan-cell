<?php

namespace App\Http\Controllers;

use App\Models\Prody;



use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Midtrans\Snap;
use App\Http\Controllers\Midtrans\Config;
use App\Http\Controllers\MidtransController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function store(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        // Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        // Config::$is3ds = env('MIDTRANS_IS_3DS');

        // Memanngil transaksi yang dibuat
        $transaction = Transaction::with('detail')->find($request->id)->first();

        if (empty($transaction)) {
            return response()->json([
                'status' => false,
                'code' => 600,
                'message' => 'Transaksi tidak ditemukan'
            ], 201);
        }

        // Membuat Transaksi Midtrans
        $transaction_details = [
            'order_id' => $transaction->code_transactio,
            'gross_amount' => $transaction->total_amount, // no decimal allowed for creditcard
        ];

        $customer_details = [
            'first_name'    => "Sofyan",
            'email'         => "real.hard277@gmail.com",
            'phone'         => "0895334623006",
        ];

        $enable_payments = ["credit_card", "cimb_clicks", "bca_klikbca",
                            "bca_klikpay", "bri_epay", "echannel", "permata_va",
                            "bca_va", "bni_va", "bri_va", "other_va", "gopay",
                            "indomaret", "danamon_online", "akulaku", "shopeepay"];

        $transactionMidtrans = [
            'enabled_payments' => $enable_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        ];


        // Memanggil Midtrans
        try {
            $url_transaction = Snap::createTransaction($transactionMidtrans)->redirect_url;

            return redirect($url_transaction);

            return response()->json([
                'status' => true,
                'code' => 201,
                'message' => 'transaksi Berhasil',
                'data'  => $notif
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'code' => 600,
                'message' => $e->getMessage(),
            ], 201);
        }

    }


}







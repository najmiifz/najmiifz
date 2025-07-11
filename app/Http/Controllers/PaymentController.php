<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function create(Booking $booking)
    {
        // konfigurasi kredential Midtrans dari file Config
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // menyiapkan parameter untuk transaksi
        $params = [
            'transaction_details' => [
                'order_id' => 'BOOKING-' . $booking->id . '-' . time(), // Unique Order ID
                'gross_amount' => $booking->total_price,
            ],
            'item_details' => [[
                'id' => $booking->service->id,
                'price' => $booking->service->price,
                'quantity' => 1,
                'name' => 'Booking Layanan: ' . $booking->service->nama,
            ]],
            'customer_details' => [
                'first_name' => $booking->user->name,
                'email' => $booking->user->email,
            ],
        ];

        // Dapatkan Snap Token dari Midtrans
        $snapToken = Snap::getSnapToken($params);

        // Kirimkan Snap Token dan detail pemesanan ke tampilan
        return view('payment.checkout', compact('snapToken', 'booking'));
    }

    public function webhook(Request $request)
    {
        // Proses webhook dari Midtrans
        //Set Server Key
        config::$serverKey = config('midtrans.server_key');

        //Membuat objek Notifikasi
        $notification = new \Midtrans\Notification();

        $order_id = $notification->order_id;
        $status_code = $notification->status_code;
        $gross_amount = $notification->gross_amount;

        //membuat Signature key dari order_id, staus_code, gross_amount
        $signature_key = hash('sha512', $order_id . $status_code . $gross_amount . config('midtrans.server_key'));

        //cek bila signatur key sesuai
        if ($signature_key != $notification -> signture_key) {
            return response()->json(['message' => 'Signature key tidak sesuai'], 403);
        }

        //temukan booking berdasarkan order_id
        $bookingId = explode('-', $order_id)[1];
        $booking = Booking::find($bookingId);

        if (!$booking){
            return response()->json(['message'=> 'Booking tidak ditemukan'], 404);
        }

        //meng handle status pembayaran
        $transaction = $notification->transaction_status;
        $fraud = $notification->fraud_status;
        if($transaction == 'capture' || $transaction =='settlement') {
            if ($fraud == 'accept') {
                //tandai booking sudah terkonfirmasi
                $booking->payment_status = 'terbayar';
                $booking->save();
        } else if ($transaction == 'cancel' || $transaction == 'deny' || $transaction == 'expire') {
            //tandai booking sebagai dibatalkan/gagal
            $booking->payment_status = 'dibatalkan';
            $booking->save();
        }else if ($transaction == 'pending') {
            //tandai booking sebagai menunggu pembayaran
            $booking->payment_status = 'menunggu';
            $booking->save();
        }

        return response()->json(['message'=> 'Webhook processed successfully'], 200);
     }
    }
}

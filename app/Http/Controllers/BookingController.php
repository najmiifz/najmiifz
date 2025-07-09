<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Barbershop;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class BookingController extends Controller
{
    public function create(Barbershop $barbershop)
    {
        return view('booking.create', compact ('barbershop'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'barbershop_id' => 'required|exists:barbershops,id',
            'services' => 'required|array|min:1', // memastikan setidaknya satu layanan dipilih
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required|date_format:H:i',
            'total_price' => 'required|numeric|min:0',
        ]);

        $request->session()->put('booking_details', $validatedData);
        return redirect()->route('booking.payment');

        // // menggabungkan tanggal dan waktu booking menjadi satu objek Carbon
        // $bookingDateTime = Carbon::parse($request->booking_date . ' ' . $request->booking_time);
        // Booking::create([
        //    'user_id' => Auth::id(),
        //     'barbershop_id' => $request->barbershop_id,
        //     'booking_time' => $bookingDateTime,
        //     'total_price' => $request->total_price,
        //     'status' => 'Menunggu',
        //     // mungkin ingin menyimpan layana yang dipilih sebagai JSON
        //     //'services' => json_encode($request->services), // menyimpan layanan yang dipilih sebagai JSON
        // ]);
        // return redirect()->route('riwayat-booking')->with('success', 'Booking berhasil dibuat');
    }
    public function showPayment(Request $request)
    {
        $details = $request->session()->get('booking_details');
        // Cek apakah detail booking ada di session
        if(!$details){
            return redirect()->route('dashboard');
        }
        $barbershop = Barbershop::findOrFail($details['barbershop_id']);
        return view('booking.payment', compact('details', 'barbershop'));
    }
    public function confirm(Request $request)
    {
        $details = $request->session()->get('booking_details');

        if (!$details) {
            return redirect()->route('dashboard')->with('error', 'Sesi booking Anda telah berakhir.');
        }
        $bookingDateTime = Carbon::parse($details['booking_date'] . ' ' . $details['booking_time']);
        Booking::create([
            'user_id' => Auth::id(),
            'barbershop_id' => $details['barbershop_id'],
            'name' => Auth::user()->name, // Mengambil nama pengguna yang sedang login
            'booking_time' => $bookingDateTime,
            'total_price' => $details['total_price'],
            'status' => 'Menunggu',
        ]);

        $request->session()->forget('booking_details'); // Hapus detail booking dari session setelah konfirmasi
        return redirect()->route('riwayat-booking')->with('success', 'Booking berhasil dibuat, anda akan dihubungi oleh pihak barbershop.');
    }

    public function riwayat(){
        $bookings = Booking::where('user_id', Auth::id())
                            ->with('barbershop') // Mengambil relasi barbershop untuk informasi lebih lengkap
                            ->latest()
                            ->get();

        return view('riwayat-booking', ['bookings' => $bookings]);
    }

    public function cancel(Booking $booking)
    {
        // Cek apakah booking yang ingin dibatalkan milik pengguna yang sedang login
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk membatalkan booking ini.');
        }
        // Menolak pembatalan jika status booking bukan 'Menunggu'
        if($booking->status !== 'Menunggu'){
            return back()->with('error', 'tidak bisa dibatalkan karena status booking sudah ');
        }
        //update status booking menjadi 'Dibatalkan'
        $booking->update(['status'=>'Dibatalkan']);
        return back()->with('success', 'Booking berhasil dibatalkan.');
    }
}

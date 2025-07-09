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
        $request->validate([
            'barbershop_id' => 'required|exists:barbershops,id',
            'services' => 'required|array|min:1', // memastikan setidaknya satu layanan dipilih
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required|date_format:H:i',
            'total_price' => 'required|numeric|min:0',
        ]);
        // menggabungkan tanggal dan waktu booking menjadi satu objek Carbon
        $bookingDateTime = Carbon::parse($request->booking_date . ' ' . $request->booking_time);
        Booking::create([
           'user_id' => Auth::id(),
            'barbershop_id' => $request->barbershop_id,
            'booking_time' => $bookingDateTime,
            'total_price' => $request->total_price,
            'status' => 'Menunggu',
            // mungkin ingin menyimpan layana yang dipilih sebagai JSON
            //'services' => json_encode($request->services), // menyimpan layanan yang dipilih sebagai JSON
        ]);
        return redirect()->route('riwayat-booking')->with('success', 'Booking berhasil dibuat');
    }

    public function riwayat(){
        $bookings = Booking::where('user_id', Auth::id())
                            ->with('barbershop') // Mengambil relasi barbershop untuk informasi lebih lengkap
                            ->latest()
                            ->get();

        return view('riwayat-booking', ['bookings' => $bookings]);
    }
}

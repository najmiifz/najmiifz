<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Barbershop;
use Illuminate\Support\Facades\Auth;
class BookingController extends Controller
{
    public function create(Barbershop $barbershop)
    {
        return view('booking', ['barbershop' => $barbershop]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email',
            'barbershop_id' => 'required|exists:barbershops,id',
            'services'      => 'required|array', // array layanan yang dipilih
            'booking_date'  => 'required|date',
            'booking_time'  => 'required',
            'total_price'   => 'required|numeric',
        ]);
        Booking::create([
            'user_id' => Auth::id(),
            'barbershop_id' => $request->barbershop_id,
            'name' => $request->first_name . ' ' . $request->last_name, //menyatukan nama depan dan belakang
            'service_type' => implode(', ', $request->services), // menggabungkan layanan yang dipilih menjadi string
            'booking_time' => $request->booking_time, // waktu booking
            'total_price' => $request->total_price, // total harga
            'status' => 'pending', // Default status
        ]);
        return redirect()->route('dashboard')->with('success', 'Booking berhasil dibuat');
    }
}

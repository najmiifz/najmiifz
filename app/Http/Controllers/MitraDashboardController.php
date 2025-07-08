<?php

namespace App\Http\Controllers;

use App\Models\Barbershop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MitraDashboardController extends Controller
{
    public function index()
    {
        $barbershop = Barbershop::where('user_id', Auth::id())->first(); // Ambil barbershop milik mitra yang sedang login
        return view('dashboard-mitra', compact('barbershop'));
    }

    public function create()
    {
        $existingBarbershop = Barbershop::where('user_id', Auth::id())->first(); // Cek apakah mitra sudah memiliki barbershop
        if ($existingBarbershop) {
            return redirect()->route('mitra.barbershop.edit', $existingBarbershop->id);
        }
        return view('kelola-barber');
    }
    public function bookings(){
        $bookings = \App\Models\Booking::latest()->get();
        return view('booking-mitra', ['bookings' => $bookings]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'location' => 'required|string',
            'open_time' => 'required|date_format:H:i',
            'close_time' => 'required|date_format:H:i',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'service_name.*' => 'required|string',
            'service_price.*' => 'required|numeric',
        ]);
        $imagePath = $request->file('image')->store('barbershop_images', 'public');
        $services = [];
        foreach ($request->service_name as $key => $name){
            $services[] = [
                'name' => $name,
                'price' => $request->service_price[$key],
                'duration' => $request->service_duration[$key] ?? 30,
            ];
        }
        $barbershop = Barbershop::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'address' => $request->address,
            'location' => $request->location,
            'description' => $request->description,
            'open_time' => $request->open_time,
            'close_time' => $request->close_time,
            'image' => $imagePath,
            'services' => $services,
        ]);
        return redirect()->route('dashboard.mitra')->with('success', 'Barbershop berhasil dibuat!');
    }

    public function edit(Barbershop $barbershop)
    {
        if ($barbershop->user_id !== Auth::id()){ // Cek apakah barbershop milik mitra yang sedang login
            abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk mengedit barbershop ini.');
        }
        return view ('detail-barber-mitra', compact('barbershop')); // Tampilkan halaman edit barbershop
    }

    public function update(Request $request, Barbershop $barbershop)
    {
        if ($barbershop->user_id !== Auth::id()){ // Cek apakah barbershop milik mitra yang sedang login
            abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk mengedit barbershop ini.');
        }
        $data = $request->except(['_token','_method','image']);
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($barbershop->image); // Hapus gambar lama
            $data['image'] = $request->file('image')->store('barbershop_images', 'public'); // Simpan gambar baru
        }
        $services = [];
        if($request->has('service_name')){
            foreach ($request->service_name as $key=> $name) {
                $services[] = [
                    'name' => $name,
                    'price' => $request->service_price[$key],
                    'duration' => $request->service_duration[$key] ?? 30,
                ];
            }
        }
        $data['services'] = $services; // Simpan layanan yang ditawarkan
        $barbershop->update($data); // Update barbershop dengan data baru

        return redirect()->route('mitra.barbershop.edit', $barbershop->id)->with('success', 'Barbershop berhasil diperbarui!');
    }
}

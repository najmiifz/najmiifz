<?php

namespace App\Http\Controllers;

use App\Models\Barbershop;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MitraDashboardController extends Controller
{
    public function index()
    {
        $barbershops = Auth::user()->barbershops; // Ambil barbershop milik mitra yang sedang login
        return view('dashboard-mitra', compact('barbershops'));
    }

    public function create()
    {
        return view('kelola-barber');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'location' => 'required|string',
            'open_time' => 'required|date_format:H:i',
            'close_time' => 'required|date_format:H:i',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'service_name.*' => 'sometimes|string',
            'service_price.*' => 'sometimes|numeric',
        ]);
        $imagePath = $request->file('image')->store('barbershop_images', 'public');

        $services = [];
        if($request->has('service_name')){
            foreach ($request->service_name as $key => $name){
                if (isset($request->service_price[$key]) && isset($request->service_duration[$key])) {
                    $services[] = [
                        'name' => $name,
                        'price' => $request->service_price[$key],
                        'duration' => $request->service_duration[$key] ?? 30,
                    ];
                }
            }
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
        return redirect()->route('mitra.barbershops.index')->with('success', 'Barbershop baru berhasil ditambahkan!');
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
            if($barbershop->image) // Cek apakah barbershop sudah memiliki gambar
                Storage::disk('public')->delete($barbershop->image); // Hapus gambar lama jika ada
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

        return redirect()->route('mitra.barbershops.index', $barbershop->id)->with('success', 'Barbershop berhasil diperbarui!');
    }
    public function destroy(Barbershop $barbershop)
    {
        if ($barbershop->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk menghapus barbershop ini.');
        }
        if ($barbershop->image) {
            Storage::disk('public')->delete($barbershop->image); // Hapus gambar barbershop jika ada
        }
        $barbershop->delete(); // Hapus barbershop dari database
        return redirect()->route('mitra.barbershops.index')->with('success', 'Barbershop berhasil dihapus!');
    }
    public function barbershopIndex()
    {
        $barbershops = Auth::user()->barbershops;
        return view('mitra.barbershops.index', compact('barbershops'));
    }
    public function showBookings(){
        $barbershopsIds = Auth::user()->barbershops->pluck('id'); // Ambil semua barbershop milik mitra yang sedang login

        $bookings = Booking::whereIn('barbershop_id', $barbershopsIds)
                            ->with('user') // Mengambil relasi customer untuk menampilkan nama pelanggan
                            ->latest()
                            ->get(); // Ambil semua booking yang terkait dengan barbershop ini

        return view('booking-mitra', compact('bookings')); // Tampilkan daftar booking pada mitra
    }
    public function updateBookingStatus(Request $request, Booking $booking){
        $this->authorizeBookingManagement($booking); // memastikan mitra memiliki izin untuk mengelola booking ini
        $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai,Dibatalkan',
        ]);
        $booking->update([
            'status' => $request->status
        ]);
        return back()->with('success', 'Status Booking sudah diperbarui!');
    }

    private function authorizeBookingManagement(Booking $booking){
        $barbershop = Barbershop::where('user_id', Auth::id())->first();
        if (!$barbershop || $booking->barbershop_id !== $barbershop->id){
            abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk mengedit Booking');
        }
    }


}


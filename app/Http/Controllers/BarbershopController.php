<?php

namespace App\Http\Controllers;

use App\Models\Barbershop;
use Illuminate\Http\Request;

class BarbershopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Filter berdasarkan kota
        $query = Barbershop::query();
        if ($request->filled('kota')){
            $query->where('location', $request->kota);
        };
        //Filter berdasarkan layanan
        if ($request->filled('layanan')){
            $query->whereJsonContains('services', ['name' => $request->layanan]);
        }
        //Filter dari hasil pencarian
        $barbershops = $query->latest()->get();

        //menampilkan barbershop dengan jumlah rating
        $barbershops = $query
                    ->withCount('ratings')
                    ->latest()
                    ->get();

        // Ambil semua lokasi unik dari kolom 'location'
        $locations = Barbershop::select('location')->distinct()->pluck('location');

        // Ambil semua layanan unik dari kolom 'services'
        $allServices = Barbershop::pluck('services')->flatMap(function ($services) {
            // Cek bila services adalah array
            if (is_array($services)) {
                return collect($services)->pluck('name');
            }
            return []; // mengembalikan array kosong jika services bukan array
        })->unique()->sort();

        return view('dashboard', compact('barbershops', 'locations', 'allServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Barbershop $barbershop)
    {
        return view('barbershop.show', compact('barbershop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barbershop $barbershop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barbershop $barbershop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barbershop $barbershop)
    {
        //
    }
}

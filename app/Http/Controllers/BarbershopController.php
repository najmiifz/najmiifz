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
        $query = Barbershop::query();
        if ($request->has('search')) {
            $searchTerm =$request->input('search');
            $query->where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('location', 'like', '%' . $searchTerm . '%');
        }

        $barbershops = $query->get();
        return view('dashboard', ['barbershops' => $barbershops]);
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
        return view('barbershop.show', ['barbershop' => $barbershop]);
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

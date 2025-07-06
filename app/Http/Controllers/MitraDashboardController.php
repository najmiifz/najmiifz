<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MitraDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard-mitra');
    }

    public function store(Request $request)
    {
        // Proses Tambah Barbershop
    }
}

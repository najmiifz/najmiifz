<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarbershopController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MitraDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Auth Routes ~ Home
Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::middleware('guest')->group(function () {
    Route::get('/pilih-akun-pelanggan', function () {return view('pilih-akun-pelanggan');})->name('pilih-akun-pelanggan');
    Route::get('/pilih-akun-mitra', function() {return view('pilih-akun-mitra');})->name('pilih-akun-mitra');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/register-mitra', function () {return view('register-mitra');});
    Route::post('/register-mitra', [AuthController::class, 'mitraRegister'])->name(name: 'mitra.register');
});

//Rute Terotentikasi
Route::middleware('auth')->group(function (){
    Route::get('/logout', function(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('beranda')->with('success', 'Berhasil Logout');
    })->name('logout');
});

//Rute Pelanggan
Route::middleware(['role:pelanggan'])->group(function (){
    Route::get('/dashboard', [BarbershopController::class, 'index'])->name('dashboard'); // Dashboard Pelanggan
    Route::get('/barbershop/{barbershop}', [BarbershopController::class, 'show'])->name('barbershop.show'); // Detail Barbershop
    Route::get('/booking/create/{barbershop}', [BookingController::class, 'create'])->name('booking.create'); // Form Booking
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store'); // Proses Booking
    Route::get('/riwayat-booking', [BookingController::class, 'riwayat'])->name('riwayat-booking'); // Riwayat Booking
});

//Rute Mitra
Route::middleware(['role:mitra'])->group(function (){
    Route::get('/dashboard-mitra', [MitraDashboardController::class, 'index'])->name('dashboard.mitra'); // Dashboard Mitra
    Route::post('/mitra/barbershop', [MitraDashboardController::class,'store'])->name('mitra.barbershop.store'); // Proses Tambah Barbershop
});


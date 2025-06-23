<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Auth Routes ~ Home
Route::get('/beranda', function () {
    return view('beranda');
});

//Auth Routes ~ Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//Auth Routes ~ Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

//Auth Routes ~ Dash
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

//Auth Routes ~ Logout
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/beranda')->with('success','Berhasil Logout');
})->middleware('auth')->name('logout');

//Auth Routes ~ Prevent Back History - Pelanggan
Route::middleware(['auth', 'role:pelanggan', 'prevent-back-history'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::get('/riwayat-booking', [BookingController::class, 'riwayat'])->name('riwayat-booking');
});

//Auth Routes ~ Prevent Back History - Mitra
Route::middleware(['auth', 'role:mitra', 'prevent-back-history'])->group(function () {
    Route::get('/dashboard-mitra', [AuthController::class, 'dashboardmitra'])->name('dashboard-mitra');
    Route::get('/booking-mitra', [BookingController::class, 'bookingmitra'])->name('booking-mitra');
});

Route::get('/booking', function () {
    return view('booking');
});

Route::get('/barber', function () {
    return view('barber');
});

Route::get('/register-mitra', function () {
    return view('register-mitra');
});
Route::post('/register-mitra', [AuthController::class, 'mitraRegister'])->name(name: 'mitra.register');

Route::get('/pilih-akun-pelanggan', function () {
    return view('pilih-akun-pelanggan');
});


Route::get('/login-mitra', function () {
    return view('login-mitra');
});

Route::get('/pilih-akun-mitra', function () {
    return view('pilih-akun-mitra');
});

Route::get('/riwayat-booking', function () {
    return view('riwayat-booking');
});

Route::get('/dashboard-mitra', function () {
    return view('dashboard-mitra');
})->name('dashboard.mitra')->middleware('auth');

Route::get('/booking-mitra', function () {
    return view('booking-mitra');
});


route::get('person', [PersonController::class, 'index'])->name('person.index');
route::get('person/create', [PersonController::class, 'create'])->name('person.create');
route::post('person/store',[PersonController::class, 'store'])->name('person.store');
route::get('person/{arg}',[PersonController::class, 'show'])->name('person.show');



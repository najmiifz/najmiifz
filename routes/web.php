<?php

use App\Http\Controllers\AuthController;
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

Route::get('/booking', function () {
    return view('booking');
});

Route::get('/barber', function () {
    return view('barber');
});

Route::get('/register-mitra', function () {
    return view('register-mitra');
});

Route::get('/pilih-akun-pelanggan', function () {
    return view('pilih-akun-pelanggan');
});


Route::get('/login-mitra', function () {
    return view('login-mitra');
});

Route::get('/pilih-akun-mitra', function () {
    return view('pilih-akun-mitra');
});

route::get('person', [PersonController::class, 'index'])->name('person.index');
route::get('person/create', [PersonController::class, 'create'])->name('person.create');
route::post('person/store',[PersonController::class, 'store'])->name('person.store');
route::get('person/{arg}',[PersonController::class, 'show'])->name('person.show');



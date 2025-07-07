<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister() {
        return view("register");
    }
    public function register(Request $request) {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:6|confirmed'
        ]);

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success','Registrasi Berhasil');
    }
    public function showLogin(){
        return view('login');
    }
    public function login(Request $request) {
        $credentials = $request->only('email','password');
        if(auth()->attempt($credentials)) {
            if (auth()->user()->role == 'mitra') {
                return redirect()->route('dashboard.mitra')->with('success', 'Login berhasil!');
            }
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }
        return redirect()->back()->with('error','Email atau password salah. Silakan coba lagi.');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function mitraRegister(Request $request) {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:6|confirmed'
        ]);

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role' => 'mitra'
        ]);
        return redirect()->route('dashboard.mitra')->with('success','Registrasi Mitra Berhasil');
    }
}

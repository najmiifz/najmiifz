<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } // Cek bila user sudah login

        foreach ($roles as $role) {
            if (Auth::user()->role == $role) {
                return $next($request);
            } // Cek apakah role user sesuai dengan yang diharapkan
        }

        abort(403, 'Tidak Dikenal.'); // Jika tidak sesuai, abort dengan status 403

    }


}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Periksa apakah pengguna terautentikasi dan memiliki role yang sesuai
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Redirect atau tampilkan pesan jika pengguna tidak memiliki akses
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
    // {
    //     return $next($request);
    // }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class RecordVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah sudah ada catatan untuk tanggal ini
        $today = now()->format('Y-m-d');
        $visitor = DB::table('visitors')->where('date', $today)->first();

        if ($visitor) {
            // Jika sudah ada, tambahkan 1 ke count
            DB::table('visitors')->where('date', $today)->increment('count');
        } else {
            // Jika belum ada, buat catatan baru
            DB::table('visitors')->insert([
                'date' => $today,
                'count' => 1,
            ]);
        }

        return $next($request);
    }
}

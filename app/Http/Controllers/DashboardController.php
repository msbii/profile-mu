<?php

namespace App\Http\Controllers;

use App\Models\Kajian;
use App\Models\Post;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $profilPenjual = $user;// user id penjual

        $pp=null;

        // Ambil total pengguna dari database
        $totalUsers = User::count();
        
        // Ambil total postingan dari database
        $totalPosts = Post::count();
        
        // Ambil total kajian dari database
        $totalKajians = Kajian::count();

        return view('dashboard.home', [
            'pp' => $pp,
            "totalUsers" => $totalUsers,
            "totalPosts" => $totalPosts,
            "totalKajians" => $totalKajians,
        ]);
    }

    public function getVisitorStats()
    {
        // Ambil data kunjungan per hari selama satu minggu terakhir
        $visitors = DB::table('visitors')
            ->selectRaw('DATE(date) as day, SUM(count) as total')
            ->where('date', '>=', now()->subDays(7)) // Data seminggu terakhir
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        // Format data untuk chart
        $labels = $visitors->pluck('day')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('D'); // Format ke hari
        });
        $data = $visitors->pluck('total');

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}

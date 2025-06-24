<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Musyawarah;
use App\Models\post;
use Illuminate\Http\Request;

class MenuAngkatanMudaController extends Controller
{
    //
    public function index()
    {
        //

        return view('dashboardPost/menu/angkatanMuda/index', [
            "title" => "Single post",
            "active" => "posts",
        ]);
    }

    public function showMusyawarah()
    {
        //
        $musyawarah = Musyawarah::with('Lingkup')//menghubungkan dengan nama relasi
        ->whereHas('Lingkup', function ($query) {
            $query->where('name', 'LIKE', '%muda%');//mencari kolom nama yang mengandung kata muhammadiyah
        })->get();

        return view('dashboardPost/menu/angkatanMuda/musyawarah', [
            "title" => "Single post",
            "active" => "posts",
            "judul" => "Musyawarah", 
            "posts" => $musyawarah,
        ]);
    }

    public function detailMusyawarah($slug)
    {
        //
        $musyawarah = Musyawarah::where('slug', 'LIKE', '%' . $slug . '%')->firstOrFail();

        return view('dashboardPost/menu/angkatanMuda/detailMusyawarah', [
            "title" => "Single post",
            "active" => "posts",
            "musyawarah" => $musyawarah,
        ]);
    }

    public function showPemuda()
    {
        //
        $syiar = Category::firstWhere('slug', 'LIKE', '%' . 'syiar' . '%');

        return view('dashboardPost/menu/angkatanMuda/pemuda', [
            "title" => "Single post",
            "active" => "posts",
            "judul" => "Syiar", 
            "posts" => $syiar->posts->load('author','category'),//penggunaan load untuk mengatasi N+1 problem,,
        ]);
    }

    public function showSyiar()
    {
        //
        $syiar = Category::firstWhere('slug', 'LIKE', '%' . 'syiar' . '%');

        return view('dashboardPost/menu/angkatanMuda/syiar', [
            "title" => "Single post",
            "active" => "posts",
            "judul" => "Syiar", 
            "posts" => $syiar->posts->load('author','category'),//penggunaan load untuk mengatasi N+1 problem,,
        ]);
    }

    public function detailSyiar($slug)
    {
        //
        $syiar = post::where('slug', 'LIKE', '%' . $slug . '%')->firstOrFail();

        return view('dashboardPost/menu/angkatanMuda/detailSyiar', [
            "title" => "Single post",
            "active" => "posts",
            "judul" => "Syiar", 
            "syiar" => $syiar,
        ]);
    }

    public function showBaksos()
    {
        //
        $baksos = Category::firstWhere('slug', 'LIKE', '%' . 'bakti' . '%');

        return view('dashboardPost/menu/angkatanMuda/baksos', [
            "title" => "Single post",
            "active" => "posts",
            "judul" => "Bakti Sosial Idul Adha", 
            "posts" => $baksos->posts->load('author','category'),//penggunaan load untuk mengatasi N+1 problem,,
        ]);
    }

    public function detailBaksos($slug)
    {
        //
        $Baksos = post::where('slug', 'LIKE', '%' . $slug . '%')->firstOrFail();

        return view('dashboardPost/menu/angkatanMuda/detailBaksos', [
            "title" => "Single post",
            "active" => "posts",
            "judul" => "Bakti Sosial Idul Adha", 
            "baksos" => $Baksos,
        ]);
    }
}

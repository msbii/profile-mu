<?php

namespace App\Http\Controllers;

use App\Models\SK;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use App\Models\KategoriKajian;
use App\Models\StrukturOrganisasi;

class AmalMasjidAlKhasanahController extends Controller
{
    //
    public function index()
    {
        //
        //menampilkan data kajian hanya untuk muhammadiyah
        $kategoriKajian = KategoriKajian::select('slug', 'name')
        ->where('name', 'LIKE', '%khasanah%')
        ->get();

        return view('dashboardPost/amal/masjidAlKhasanah/index', [
            "title" => "Single post",
            "active" => "posts",
            "kategoriKajian" => $kategoriKajian,
        ]);
    }

    public function showSejarah()
    {
        //
        $sejarah = Sejarah::where('slug', 'LIKE', '%' . 'khasanah' . '%')->firstOrFail();

        //menampilkan data kajian hanya untuk muhammadiyah
        $kategoriKajian = KategoriKajian::select('slug', 'name')
        ->where('name', 'LIKE', '%khasanah%')
        ->get();

        return view('dashboardPost/amal/masjidAlKhasanah/sejarah', [
            "title" => "Single post",
            "active" => "posts",
            "kategoriKajian" => $kategoriKajian,
            "post" => $sejarah,
        ]);
    }

    public function showSK()
    {
        //

        //menampilkan data kajian hanya untuk muhammadiyah
        $kategoriKajian = KategoriKajian::select('slug', 'name')
        ->where('name', 'LIKE', '%khasanah%')
        ->get();

        $sK = SK::where('slug', 'LIKE', '%' . 'khasanah' . '%')->firstOrFail();

        return view('dashboardPost/amal/masjidAlKhasanah/detailSK', [
            "title" => "Single post",
            "active" => "posts",
            "kategoriKajian" => $kategoriKajian,
            "post" => $sK,
        ]);
    }
    
    public function showStruktur()
    {
        //
        //menampilkan data kajian hanya untuk muhammadiyah
        $kategoriKajian = KategoriKajian::select('slug', 'name')
        ->where('name', 'LIKE', '%khasanah%')
        ->get();

        $struktur = StrukturOrganisasi::where('slug', 'LIKE', '%' . 'khasanah' . '%')->firstOrFail();

        return view('dashboardPost/amal/masjidAlKhasanah/struktur', [
            "title" => "Single post",
            "active" => "posts",
            "kategoriKajian" => $kategoriKajian,
            "post" => $struktur,
        ]);
    }
    public function showKajian($slug)
    {
        //
        $dataKategoriKajian = KategoriKajian::where('slug', $slug)->with('kajians')->firstOrFail();

        //menampilkan data kajian hanya untuk muhammadiyah
        $kategoriKajian = KategoriKajian::select('slug', 'name')
        ->where('name', 'LIKE', '%khasanah%')
        ->get();
        
        // //menampilkan data sejarah hanya untuk AlKhasanah
        // $datasejarah = Sejarah::where('title', 'LIKE', '%' . 'AlKhasanah' . '%')->firstOrFail();

        // Tampilkan semua kajian di dalam kategori tersebut
        return view('dashboardPost/amal/masjidAlKhasanah/kajian',[
            'title'=> "Post by Category : $dataKategoriKajian->name",
            'active' => 'categories',
            "kategoriKajian" => $kategoriKajian,
            'posts'=> $dataKategoriKajian->kajians->load('author','kategoriKajian')//penggunaan load untuk mengatasi N+1 problem
        ]);
    }
}

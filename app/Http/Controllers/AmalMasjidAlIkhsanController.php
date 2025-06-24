<?php

namespace App\Http\Controllers;

use App\Models\SK;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use App\Models\KategoriKajian;
use App\Models\StrukturOrganisasi;

class AmalMasjidAlIkhsanController extends Controller
{
    //
    public function index()
    {
        //
        //menampilkan data kajian hanya untuk muhammadiyah
        $kategoriKajian = KategoriKajian::select('slug', 'name')
        ->where('name', 'LIKE', '%ikhsan%')
        ->get();

        return view('dashboardPost/amal/masjidAlIkhsan/index', [
            "title" => "Single post",
            "active" => "posts",
            "kategoriKajian" => $kategoriKajian,
        ]);
    }

    public function showSejarah()
    {
        //
        $sejarah = Sejarah::where('slug', 'LIKE', '%' . 'ikhsan' . '%')->firstOrFail();

        //menampilkan data kajian hanya untuk muhammadiyah
        $kategoriKajian = KategoriKajian::select('slug', 'name')
        ->where('name', 'LIKE', '%ikhsan%')
        ->get();

        return view('dashboardPost/amal/masjidAlIkhsan/sejarah', [
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
        ->where('name', 'LIKE', '%ikhsan%')
        ->get();

        $sK = SK::where('slug', 'LIKE', '%' . 'ikhsan' . '%')->firstOrFail();

        return view('dashboardPost/amal/masjidAlIkhsan/detailSK', [
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
        ->where('name', 'LIKE', '%ikhsan%')
        ->get();

        $struktur = StrukturOrganisasi::where('slug', 'LIKE', '%' . 'ikhsan' . '%')->firstOrFail();

        return view('dashboardPost/amal/masjidAlIkhsan/struktur', [
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
        ->where('name', 'LIKE', '%ikhsan%')
        ->get();
        
        // //menampilkan data sejarah hanya untuk ikhsan
        // $datasejarah = Sejarah::where('title', 'LIKE', '%' . 'ikhsan' . '%')->firstOrFail();

        // Tampilkan semua kajian di dalam kategori tersebut
        return view('dashboardPost/amal/masjidAlIkhsan/kajian',[
            'title'=> "Post by Category : $dataKategoriKajian->name",
            'active' => 'categories',
            "kategoriKajian" => $kategoriKajian,
            'posts'=> $dataKategoriKajian->kajians->load('author','kategoriKajian')//penggunaan load untuk mengatasi N+1 problem
        ]);
    }
}

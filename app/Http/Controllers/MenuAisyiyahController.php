<?php

namespace App\Http\Controllers;

use App\Models\SK;
use App\Models\Sejarah;
use App\Models\Inventaris;
use App\Models\KategoriSK;
use App\Models\Musyawarah;
use Illuminate\Http\Request;
use App\Models\KategoriKajian;
use App\Models\PelaksanaProgram;
use App\Models\StrukturOrganisasi;

class MenuAisyiyahController extends Controller
{
    //
    public function index()
    {
        //
        //menampilkan data kajian hanya untuk muhammadiyah
        $keywords = ['selasa', 'Jumat','shakinah'];
        $query = KategoriKajian::select('slug', 'name');

        foreach ($keywords as $keyword) {
            $query->orWhere('name', 'LIKE', '%' . $keyword . '%');
        }
        $kategoriKajian = $query->get();
        
        //menampilkan data sk hanya untuk muhammadiyah
        $kategoriSK = KategoriSK::select('slug', 'name')
        ->where('name', 'LIKE', '%aisyiyah%')
        ->get();

        //menampilkan data sejarah hanya untuk aisyiyah
        $datasejarah = Sejarah::select('slug', 'title')
        ->where('title', 'LIKE', '%aisyiyah%')
        ->get();

        //menampilkan data pelaksana hanya untuk muhammadiyah
        $pelaksana = PelaksanaProgram::with('Lingkup')//menghubungkan dengan nama relasi
        ->whereHas('Lingkup', function ($query) {
            $query->where('name', 'LIKE', '%aisyiyah%');//mencari kolom nama yang mengandung kata muhammadiyah
        })->get();

        return view('dashboardPost/menu/aisyiyah/index', [
            "title" => "Single post",
            "active" => "posts",
            "kategoriKajian" => $kategoriKajian,
            "kategoriSK" => $kategoriSK,
            "sejarah" => $datasejarah,
            "pelaksana" => $pelaksana,
        ]);
    }

    public function showMusyawarah()
    {
        //
        //menampilkan data kajian hanya untuk muhammadiyah
        $keywords = ['selasa', 'Jumat','shakinah'];
        $query = KategoriKajian::select('slug', 'name');

        foreach ($keywords as $keyword) {
            $query->orWhere('name', 'LIKE', '%' . $keyword . '%');
        }
        $kategoriKajian = $query->get();

        //menampilkan data sk hanya untuk aisyiyah
        $kategoriSK = KategoriSK::select('slug', 'name')
        ->where('name', 'LIKE', '%aisyiyah%')
        ->get();

        //menampilkan data sejarah hanya untuk amien
        $datasejarah = Sejarah::where('title', 'LIKE', '%' . 'aisyiyah' . '%')->get();

        //menampilkan data pelaksana hanya untuk muhammadiyah
        $pelaksana = PelaksanaProgram::with('Lingkup')//menghubungkan dengan nama relasi
        ->whereHas('Lingkup', function ($query) {
            $query->where('name', 'LIKE', '%aisyiyah%');//mencari kolom nama yang mengandung kata muhammadiyah
        })->get();

        $musyawarah = Musyawarah::with('Lingkup')//menghubungkan dengan nama relasi
        ->whereHas('Lingkup', function ($query) {
            $query->where('name', 'LIKE', '%aisyiyah%');//mencari kolom nama yang mengandung kata muhammadiyah
        })->get();

        return view('dashboardPost/menu/aisyiyah/musyawarah', [
            "title" => "Single post",
            "active" => "posts",
            "kategoriKajian" => $kategoriKajian,
            "kategoriSK" => $kategoriSK,
            "sejarah" => $datasejarah,
            "pelaksana" => $pelaksana,
            "musyawarah" => $musyawarah,
        ]);
    }

    public function detailMusyawarah($slug)
    {
        //
        //menampilkan data kajian hanya untuk muhammadiyah
        $keywords = ['selasa', 'Jumat','shakinah'];
        $query = KategoriKajian::select('slug', 'name');

        foreach ($keywords as $keyword) {
            $query->orWhere('name', 'LIKE', '%' . $keyword . '%');
        }
        $kategoriKajian = $query->get();

        //menampilkan data sk hanya untuk aisyiyah
        $kategoriSK = KategoriSK::select('slug', 'name')
        ->where('name', 'LIKE', '%aisyiyah%')
        ->get();

        //menampilkan data sejarah hanya untuk amien
        $datasejarah = Sejarah::where('title', 'LIKE', '%' . 'aisyiyah' . '%')->get();

        //menampilkan data pelaksana hanya untuk muhammadiyah
        $pelaksana = PelaksanaProgram::with('Lingkup')//menghubungkan dengan nama relasi
        ->whereHas('Lingkup', function ($query) {
            $query->where('name', 'LIKE', '%aisyiyah%');//mencari kolom nama yang mengandung kata muhammadiyah
        })->get();

        $musyawarah = Musyawarah::where('slug', 'LIKE', '%' . $slug . '%')->firstOrFail();

        return view('dashboardPost/menu/aisyiyah/detailMusyawarah', [
            "title" => "Single post",
            "active" => "posts",
            "kategoriKajian" => $kategoriKajian,
            "kategoriSK" => $kategoriSK,
            "sejarah" => $datasejarah,
            "pelaksana" => $pelaksana,
            "musyawarah" => $musyawarah,
        ]);
    }

    public function showStruktur()
    {
        //
        //menampilkan data kajian hanya untuk muhammadiyah
        $keywords = ['selasa', 'Jumat','shakinah'];
        $query = KategoriKajian::select('slug', 'name');

        foreach ($keywords as $keyword) {
            $query->orWhere('name', 'LIKE', '%' . $keyword . '%');
        }
        $kategoriKajian = $query->get();

        //menampilkan data sk hanya untuk aisyiyah
        $kategoriSK = KategoriSK::select('slug', 'name')
        ->where('name', 'LIKE', '%aisyiyah%')
        ->get();

        //menampilkan data sejarah hanya untuk amien
        $datasejarah = Sejarah::where('title', 'LIKE', '%' . 'aisyiyah' . '%')->get();

        //menampilkan data pelaksana hanya untuk muhammadiyah
        $pelaksana = PelaksanaProgram::with('Lingkup')//menghubungkan dengan nama relasi
        ->whereHas('Lingkup', function ($query) {
            $query->where('name', 'LIKE', '%aisyiyah%');//mencari kolom nama yang mengandung kata muhammadiyah
        })->get();

        $struktur = StrukturOrganisasi::where('slug', 'LIKE', '%' . 'aisyiyah' . '%')->firstOrFail();

        return view('dashboardPost/menu/aisyiyah/struktur', [
            "title" => "Single post",
            "active" => "posts",
            "kategoriKajian" => $kategoriKajian,
            "kategoriSK" => $kategoriSK,
            "sejarah" => $datasejarah,
            "pelaksana" => $pelaksana,
            "post" => $struktur,
        ]);
    }

    public function showSK($slug)
    {
        //
        // Ambil data SK berdasarkan slug kategori
        $sK = SK::whereHas('kategori', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->firstOrFail();

        //menampilkan data kajian hanya untuk muhammadiyah
        $keywords = ['selasa', 'Jumat','shakinah'];
        $query = KategoriKajian::select('slug', 'name');

        foreach ($keywords as $keyword) {
            $query->orWhere('name', 'LIKE', '%' . $keyword . '%');
        }
        $kategoriKajian = $query->get();
        
        //menampilkan data sk hanya untuk muhammadiyah
        $kategoriSK = KategoriSK::select('slug', 'name')
        ->where('name', 'LIKE', '%aisyiyah%')
        ->get();

        //menampilkan data sejarah hanya untuk aisyiyah
        $datasejarah = Sejarah::select('slug', 'title')
        ->where('title', 'LIKE', '%aisyiyah%')
        ->get();

        //menampilkan data pelaksana hanya untuk muhammadiyah
        $pelaksana = PelaksanaProgram::with('Lingkup')//menghubungkan dengan nama relasi
        ->whereHas('Lingkup', function ($query) {
            $query->where('name', 'LIKE', '%aisyiyah%');//mencari kolom nama yang mengandung kata muhammadiyah
        })->get();

        return view('dashboardPost/menu/aisyiyah/detailSK', [
            "title" => "Single post",
            "active" => "posts",
            "kategoriKajian" => $kategoriKajian,
            "kategoriSK" => $kategoriSK,
            "sejarah" => $datasejarah,
            "pelaksana" => $pelaksana,
            "post" => $sK,
        ]);
    }

    public function showKajian($slug)
    {
        //
        $dataKategoriKajian = KategoriKajian::where('slug', $slug)->with('kajians')->firstOrFail();

        //menampilkan data kajian hanya untuk muhammadiyah
        $keywords = ['selasa', 'Jumat','shakinah'];
        $query = KategoriKajian::select('slug', 'name');

        foreach ($keywords as $keyword) {
            $query->orWhere('name', 'LIKE', '%' . $keyword . '%');
        }
        $kategoriKajian = $query->get();
        
        //menampilkan data sk hanya untuk muhammadiyah
        $kategoriSK = KategoriSK::select('slug', 'name')
        ->where('name', 'LIKE', '%aisyiyah%')
        ->get();

        //menampilkan data sejarah hanya untuk aisyiyah
        $datasejarah = Sejarah::select('slug', 'title')
        ->where('title', 'LIKE', '%aisyiyah%')
        ->get();

        //menampilkan data pelaksana hanya untuk muhammadiyah
        $pelaksana = PelaksanaProgram::with('Lingkup')//menghubungkan dengan nama relasi
        ->whereHas('Lingkup', function ($query) {
            $query->where('name', 'LIKE', '%aisyiyah%');//mencari kolom nama yang mengandung kata muhammadiyah
        })->get();

        // Tampilkan semua kajian di dalam kategori tersebut
        return view('dashboardPost/menu/aisyiyah/kajian',[
            'title'=> "Post by Category : $dataKategoriKajian->name",
            'active' => 'categories',
            "kategoriKajian" => $kategoriKajian,
            "kategoriSK" => $kategoriSK,
            "sejarah" => $datasejarah,
            "pelaksana" => $pelaksana,
            // 'posts'=> $kategoriKajian->kajians->load('author','kategoriKajian')//penggunaan load untuk mengatasi N+1 problem
            'posts'=> $dataKategoriKajian->kajians->load('author','kategoriKajian')//penggunaan load untuk mengatasi N+1 problem
        ]);
    }

    public function showPelaksana($slug)
    {
        //
        //menampilkan data kajian hanya untuk muhammadiyah
        $keywords = ['Kamis', 'pon','pimpinan'];
        $query = KategoriKajian::select('slug', 'name');

        foreach ($keywords as $keyword) {
            $query->orWhere('name', 'LIKE', '%' . $keyword . '%');
        }
        $kategoriKajian = $query->get();

        //menampilkan data sk hanya untuk muhammadiyah
        $kategoriSK = KategoriSK::select('slug', 'name')
        ->where('name', 'LIKE', '%muhammadiyah%')
        ->get();

        //menampilkan data sejarah hanya untuk amien
        $datasejarah = Sejarah::where('title', 'LIKE', '%' . 'muhammadiyah' . '%')->get();

        //menampilkan data pelaksana hanya untuk muhammadiyah
        $pelaksana = PelaksanaProgram::with('Lingkup')//menghubungkan dengan nama relasi
        ->whereHas('Lingkup', function ($query) {
            $query->where('name', 'LIKE', '%muhammadiyah%');//mencari kolom nama yang mengandung kata muhammadiyah
        })->get();

        $pelaksanaProgram  = PelaksanaProgram::where('slug', 'LIKE', '%' . $slug . '%')->firstOrFail();

        return view('dashboardPost/menu/aisyiyah/pelaksana', [
            "title" => "Single post",
            "active" => "posts",
            "kategoriKajian" => $kategoriKajian,
            "kategoriSK" => $kategoriSK,
            "sejarah" => $datasejarah,
            "pelaksana" => $pelaksana,
            "pelaksanaProgram" => $pelaksanaProgram,
        ]);
    }

    public function showInventaris()
    {
        //
        //menampilkan data kajian hanya untuk muhammadiyah
        $keywords = ['selasa', 'Jumat','shakinah'];
        $query = KategoriKajian::select('slug', 'name');

        foreach ($keywords as $keyword) {
            $query->orWhere('name', 'LIKE', '%' . $keyword . '%');
        }
        $kategoriKajian = $query->get();

        //menampilkan data sk hanya untuk aisyiyah
        $kategoriSK = KategoriSK::select('slug', 'name')
        ->where('name', 'LIKE', '%aisyiyah%')
        ->get();

        //menampilkan data sejarah hanya untuk amien
        $datasejarah = Sejarah::where('title', 'LIKE', '%' . 'aisyiyah' . '%')->get();

        //menampilkan data pelaksana hanya untuk muhammadiyah
        $pelaksana = PelaksanaProgram::with('Lingkup')//menghubungkan dengan nama relasi
        ->whereHas('Lingkup', function ($query) {
            $query->where('name', 'LIKE', '%aisyiyah%');//mencari kolom nama yang mengandung kata muhammadiyah
        })->get();

        $inventaris = Inventaris::with('Location')//menghubungkan dengan nama relasi
        ->whereHas('Location', function ($query) {
            $query->where('name', 'LIKE', '%aisyiyah%');//mencari kolom nama yang mengandung kata muhammadiyah
        })->get();

        return view('dashboardPost/menu/aisyiyah/inventaris', [
            "title" => "Single post",
            "active" => "posts",
            "kategoriKajian" => $kategoriKajian,
            "kategoriSK" => $kategoriSK,
            "sejarah" => $datasejarah,
            "pelaksana" => $pelaksana,
            "inventaris" => $inventaris,
        ]);
    }

    public function detailInventaris($slug)
    {
        //
        //menampilkan data kajian hanya untuk muhammadiyah
        $keywords = ['selasa', 'Jumat','shakinah'];
        $query = KategoriKajian::select('slug', 'name');

        foreach ($keywords as $keyword) {
            $query->orWhere('name', 'LIKE', '%' . $keyword . '%');
        }
        $kategoriKajian = $query->get();

        //menampilkan data sk hanya untuk aisyiyah
        $kategoriSK = KategoriSK::select('slug', 'name')
        ->where('name', 'LIKE', '%aisyiyah%')
        ->get();

        //menampilkan data sejarah hanya untuk amien
        $datasejarah = Sejarah::where('title', 'LIKE', '%' . 'aisyiyah' . '%')->get();

        //menampilkan data pelaksana hanya untuk muhammadiyah
        $pelaksana = PelaksanaProgram::with('Lingkup')//menghubungkan dengan nama relasi
        ->whereHas('Lingkup', function ($query) {
            $query->where('name', 'LIKE', '%aisyiyah%');//mencari kolom nama yang mengandung kata muhammadiyah
        })->get();

        $inventaris = inventaris::where('slug', 'LIKE', '%' . $slug . '%')->firstOrFail();

        return view('dashboardPost/menu/aisyiyah/detailInventaris', [
            "title" => "Single post",
            "active" => "posts",
            "kategoriKajian" => $kategoriKajian,
            "kategoriSK" => $kategoriSK,
            "sejarah" => $datasejarah,
            "pelaksana" => $pelaksana,
            "inventaris" => $inventaris,
        ]);
    }
}

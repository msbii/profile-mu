<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kajian;
use App\Models\KategoriKajian;
use App\Models\User;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;

class KajianController extends Controller
{
    //
    public function index()
    {
        //
        // $firstPost = Kajian::first();
        // dd($firstPost->kategoriKajian->name);
        
        return view('dashboardPost/kajian/home', [
            "title" => "Single post",
            "active" => "kajian",
            'kajian' => Kajian::latest()->filter(request(['search', 'category', 'user']))->paginate(6)->withQueryString(),//Load Digunakan N+1 Problem & pagination,
            'pp' => $pp =null,
        ]);
    }

    public function show(Kajian $kajian)
    {
        //
        // Dapatkan postingan berdasarkan ID
        $increment = Kajian::findOrFail($kajian->id);

        // Tambahkan 1 ke kolom `click_count`
        $increment->increment('click_count');
        
        $popularKajians = Kajian::orderByDesc('click_count')
                    ->limit(5) // Jumlah postingan yang ingin ditampilkan
                    ->get();
        $allCategory = KategoriKajian::all();

        $latestPosts = Kajian::latest()->take(3)->get(); // Ambil 3 postingan terbaru

        return view('dashboardPost/kajian/detail', [
            "title" => "Single post",
            "active" => "posts",
            "post" => $kajian,
            "popularKajians" => $popularKajians,
            "category" => $allCategory, 
            "latesPosts" => $latestPosts,
        ]);
    }

    // public function postByCategory(KategoriKajian $kategoriKajian)
    public function postByCategory($slug)
    {
        //
        $kategoriKajian = KategoriKajian::where('slug', $slug)->with('kajians')->firstOrFail();

        // Tampilkan semua kajian di dalam kategori tersebut
        return view('dashboardPost/kajian/postBy',[
            'title'=> "Post by Category : $kategoriKajian->name",
            'active' => 'categories',
            // 'posts'=> $kategoriKajian->kajians->load('author','kategoriKajian')//penggunaan load untuk mengatasi N+1 problem
            'posts'=> $kategoriKajian->kajians->load('author','kategoriKajian')//penggunaan load untuk mengatasi N+1 problem
        ]);
    }

    public function postByAuthor(User $author)
    {
        //
        // $author = User::where('username', $author)->with('kajians')->firstOrFail();

        // Tampilkan semua kajian di dalam kategori tersebut
        return view('dashboardPost/kajian/postBy',[
            'title'=>"Post by Author : $author",
            'active' =>'authors',
            'posts'=> $author->kajians->load('author','kategoriKajian')//penggunaan load untuk mengatasi N+1 problem
        ]);
    }

    public function postBySpeaker($speaker)
    {
        //
        // Tampilkan semua kajian di dalam kategori tersebut
        return view('dashboardPost/kajian/postBy',[
            'title'=>"Post by Author : $speaker",
            'active' =>'authors',
            'posts'=> $posts = Kajian::where('speaker', $speaker)->get(),
        ]);
    }

    public function search()
    {
        // dd(request('search'));
        return view('dashboardPost/kajian/postBy',[
            "title" => "All Posts",
            "active" => "posts",
            // mengurutkan data terakhir masuk
            "posts" => Kajian::latest()->filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString()//Load Digunakan N+1 Problem & pagination
        ]);
    }
}

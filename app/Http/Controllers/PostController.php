<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Kajian;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        //Detail judul
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in '. $category->name;
        }
        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = ' in '. $user->name;
        }

        $latestPosts = Post::latest()->take(3)->get(); // Ambil 3 postingan terbaru

        $popularPosts = Post::orderByDesc('click_count')
                    ->limit(4) // Jumlah postingan yang ingin ditampilkan
                    ->get();
        
        $showKabar = Post::whereHas('category', function ($query) {
            $query->where('name', 'kabar');
        })->latest()->take(6)->get(); // Ambil 3 postingan terbaru
        
        $showHukum = Post::whereHas('category', function ($query) {
            $query->where('name', 'like', '%' . 'hukum' . '%');
        })->latest()->take(3)->get(); // Ambil 3 postingan terbaru

        $showKajian = Kajian::latest()->take(3)->get(); // Ambil 3 postingan terbaru
        // $posts = post::all();
        // dd($posts);
        return view('dashboardPost/posts/home',[
            "title" => "All Posts" . $title,
            "active" => "posts",
            // "posts" => \App\Models\Post::all() 
            // mengurutkan data terakhir masuk
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(6)->withQueryString(),//Load Digunakan N+1 Problem & pagination
            "latestPosts" => $latestPosts,
            "popularPosts" => $popularPosts,
            "showKabar" => $showKabar,
            "showHukum" => $showHukum,
            "showKajian" => $showKajian,
        ]);
    }

    public function postByCategory(Category $category)
    {
        //
        return view('dashboardPost/posts/postBy',[
            'title'=> "Post by Category : $category->name",
            'active' => 'categories',
            'posts'=> $category->posts->load('author','category')//penggunaan load untuk mengatasi N+1 problem
        ]);
    }
    public function postByAuthor(User $author)
    {
        //
        // dd($author);
        return view('dashboardPost/posts/postBy',[
            'title'=>"Post by Author : $author->name",
            'active' =>'authors',
            'posts'=> $author->posts->load('author','category')//penggunaan load untuk mengatasi N+1 problem
        ]);
    }

    public function postByKabar()
    {
        //
        $allCategory = Category::all();
        $category = Category::firstWhere('slug', 'kabar');

        $latestPosts = Post::whereHas('category', function ($query) {
            $query->where('name', 'kabar');
        })->latest()->take(3)->get(); // Ambil 3 postingan terbaru
        
        return view('dashboardPost/kabar/home',[
            'title'=> "Post by Category : $category->name",
            'active' => 'categories',
            'posts'=> $category->posts->load('author','category'),//penggunaan load untuk mengatasi N+1 problem
            "category" => $allCategory,
            "latesPosts" => $latestPosts,
        ]);
    }

    // public function search()
    // {
    //     // dd(request('search'));
    //     return view('dashboardPost/posts/postBy',[
    //         "title" => "All Posts",
    //         "active" => "posts",
    //         // mengurutkan data terakhir masuk
    //         "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString()//Load Digunakan N+1 Problem & pagination
    //     ]);
    // }

    public function search(Request $request)
    {
        // Ambil input pencarian dari form
        $search = $request->input('search');

        // Pencarian pada tabel 'posts'
        $posts = Post::where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')
            ->get();

        // Pencarian pada tabel 'kajian'
        $kajians = Kajian::where('title', 'like', "%{$search}%")
            ->orWhere('body', 'like', "%{$search}%")
            ->get();

        // Menggabungkan hasil pencarian
        $mergedResults = $posts->merge($kajians);

        // Mengubah hasil menjadi paginasi secara manual
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $currentResults = $mergedResults->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedResults = new LengthAwarePaginator($currentResults, $mergedResults->count(), $perPage);

        // Kirim hasil pencarian ke tampilan
        return view('dashboardPost/posts/postBy', [
            'posts' => $paginatedResults,
            'search' => $search,
            "title" => "Hasil Pencarian",
    //         "active" => "posts",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        // Dapatkan postingan berdasarkan ID
        $increment = Post::findOrFail($post->id);

        // Tambahkan 1 ke kolom `click_count`
        $increment->increment('click_count');
        
        $popularPosts = Post::orderByDesc('click_count')
                    ->limit(5) // Jumlah postingan yang ingin ditampilkan
                    ->get();
        
        $category = Category::all();

        $latestPosts = Post::latest()->take(3)->get(); // Ambil 3 postingan terbaru

        return view('dashboardPost/posts/detail', [
            "title" => "Single post",
            "active" => "posts",
            "post" => $post,
            "increment" => $increment,
            "popularPosts" => $popularPosts,
            "category" => $category,
            "latesPosts" => $latestPosts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepostRequest $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }

    // public function viewPdf(post $post)
    // {
    //     $mpdf = new \Mpdf\Mpdf();
    //     $mpdf->WriteHTML('<h1>Hello world!</h1>');
    //     // $mpdf->WriteHTML(view('dashboardPost/posts/detail', [
    //     //     "title" => "Single post",
    //     //     "active" => "posts",
    //     //     "post" => $post
    //     // ]));
    //     $mpdf->Output();
    // }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexx()
    {
        $pp = null;
        // Menampilkan data berdasarkan user yang login
        return view('dashboard.posts.index',[
            'posts' => Post::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10),
            'pp'=> $pp,
        ]);
    }

    public function index()
    {
        $pp = null;

        // Ambil user yang sedang login
        $user = auth()->user();

        // Cek apakah user adalah admin
        if ($user->is_admin == 1) {
            // Jika admin, tampilkan semua postingan
            $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        } else {
            // Jika bukan admin, tampilkan hanya postingan miliknya
            $posts = Post::where('user_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        }

        return view('dashboard.posts.index', [
            'posts' => $posts,
            'pp' => $pp,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.posts.create',[
            'categories' => Category::all(),
            'pp' => $pp = null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('post-images');

        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'body' => 'required'
        ]);
        // check jika img tidak ada maka unsplash
        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images','public');
        }

        // Simpan file gambar
        // if ($request->file('image')) {
        //     $path = $request->file('image')->store('public/post-images');
        //     // Hapus 'public/' agar yang disimpan hanya 'post-images/namafile.png'
        //     $validateData['image'] = str_replace('public/', '', $path);
        // }

        // Menyimpan data ke dalamm post
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validateData);

        // return redirect('/dashboard/posts')->with('success', 'New post has been addes!');
        return redirect('/dashboard/posts')->with('success', 'Postingan baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('dashboard.posts.show',[
            'post' => $post,
            'pp' => $pp = null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        return view('dashboard.posts.edit',[
            'post' => $post,
            'categories' => Category::all(),
            'pp' => $pp = null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $rules =[
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';//tidak dimasukan validasi  karna mengatasi unique
        }

        // validasi data
        $validateData = $request->validate($rules);

        
        // check jika img tidak ada maka unsplash
        if ($request->file('image')) {
            // Menghapus data foto lama supaya berganti baru
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images','public');
        }

        // if ($request->file('image')) {
        //     // Hapus gambar lama jika ada
        //     if ($request->oldImage) {
        //         Storage::delete('public/' . $request->oldImage);
        //     }

        //     // Simpan file baru dan hanya simpan path tanpa 'public/'
        //     $path = $request->file('image')->store('public/post-images');
        //     $validateData['image'] = str_replace('public/', '', $path);
        // }

        // Menyimpan data ke dalamm post
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id) 
            ->update($validateData);

        return redirect('/dashboard/posts')->with('success', 'Posting telah diperbarui!');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Menghapus data foto lama supaya berganti baru
        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Posting telah dihapus!');
    }

    // chekslug otomatis mengisi input slug
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function search(Request $request)
    {
        // if ($request->has('search')) {
        //     $searchTerm = $request->input('search');
        //     $data = Kajian::where('title', 'like', '%' .$searchTerm. '%')->paginate(10);
        // } else {
        //     $data = Kajian::where('user_id', auth()->user()->id)->get();
            
        // }

        return view('dashboard/posts/index',[
            "posts" => Post::latest()->filter(request(['search', 'kategoriKajian', 'user']))->paginate(7)->withQueryString(),//Load Digunakan N+1 Problem & pagination
            "pp" => $pp =null,
        ]);
    }
}

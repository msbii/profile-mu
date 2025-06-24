<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Mpdf\Shaper\Sea;

class DashboardSejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan data sejarah
        return view('dashboard.sejarah.index',[
            'posts' => Sejarah::orderBy('created_at', 'desc')->paginate(10),
            'pp'=> $pp=null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.sejarah.create',[
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
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ]);
        // check jika img tidak ada maka unsplash
        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        // Menyimpan data ke dalamm post
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Sejarah::create($validateData);

        return redirect('/dashboard/sejarah')->with('success', 'Sejarah Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sejarah $sejarah)
    {
        //
        return view('dashboard.sejarah.show',[
            'post' => $sejarah,
            'pp' => $pp = null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sejarah $sejarah)
    {
        //
        return view('dashboard.sejarah.edit',[
            'post' => $sejarah,
            'pp' => $pp = null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sejarah $sejarah)
    {
        //
        $rules =[
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ];

        // validasi data
        $validateData = $request->validate($rules);

        
        // check jika img tidak ada maka unsplash
        if ($request->file('image')) {
            // Menghapus data foto lama supaya berganti baru
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        // Menyimpan data ke dalamm post
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Sejarah::where('id', $sejarah->id) 
            ->update($validateData);

        return redirect('/dashboard/sejarah')->with('success', 'Sejarah telah Diperbarui!');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sejarah $sejarah)
    {
        // Menghapus data foto lama supaya berganti baru
        if ($sejarah->image) {
            Storage::delete($sejarah->image);
        }

        Sejarah::destroy($sejarah->id);

        return redirect('/dashboard/sejarah')->with('success', 'Sejarah telah Dihapus!');
    }

    // chekslug otomatis mengisi input slug
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Sejarah::class, 'slug', $request->title);
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

        return view('dashboard/sejarah/index',[
            "posts" => Sejarah::latest()->filter(request(['search', 'kategoriKajian', 'user']))->paginate(7)->withQueryString(),//Load Digunakan N+1 Problem & pagination
            "pp" => $pp =null,
        ]);
    }
}

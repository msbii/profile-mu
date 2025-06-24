<?php

namespace App\Http\Controllers;

use App\Models\Lingkup;
use App\Models\Musyawarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardMusyawarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pp = null;
        // Menampilkan data berdasarkan user yang login
        return view('dashboard.musyawarah.index',[
            'posts' => musyawarah::orderBy('created_at', 'desc')->paginate(10),
            'pp'=> $pp,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.musyawarah.create',[
            'categories' => Lingkup::all(),
            'pp' => $pp = null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'lingkup_id' => 'required',
            'image' => 'image|file|max:2048',
            'time' => 'required',
            'location' => 'required',
            'agenda' => 'required',
            'hasil' => 'required',
        ]);
        // check jika img tidak ada maka unsplash
        if ($request->file('image')) {
            $image = $request->file('image');
            $originalName = time() . '_' . $image->getClientOriginalName(); // Nama asli file dengan timestamp
            $path = $image->storeAs('post-images', $originalName, 'public'); // Simpan ke folder public
            // $validateData['image'] = $originalName; // Simpan nama file ke database
            $validateData['image'] = 'post-images/' . $originalName;
            // $validateData['image'] = $request->file('image')->store('post-images');
        }

        Musyawarah::create($validateData);

        return redirect('/dashboard/musyawarah')->with('success', 'Data Musyawarah Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $musyawarah = Musyawarah::where('slug', $slug)->firstOrFail();
        return view('dashboard.musyawarah.show',[
            'post' => $musyawarah,
            'pp' => $pp = null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        //
        $musyawarah = musyawarah::where('slug', $slug)->firstOrFail();
        return view('dashboard.musyawarah.edit',[
            'post' => $musyawarah,
            'categories' => Lingkup::all(),
            'pp' => $pp = null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        // Ambil data SK berdasarkan slug
        $musyawarah = musyawarah::where('slug', $slug)->firstOrFail();

        // Aturan validasi
        $rules =[
            'title' => 'required|max:255',
            'lingkup_id' => 'required',
            'image' => 'image|file|max:2048',
            'time' => 'required',
            'location' => 'required',
            'agenda' => 'required',
            'hasil' => 'required',
        ];

        if ($request->slug != $musyawarah->slug) {
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
            //simpan file dengan nama asli
            $image = $request->file('image');
            $originalName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('post-images', $originalName, 'public');
            // $validateData['image'] = $originalName;
            $validateData['image'] = 'post-images/' . $originalName;
            // $validateData['image'] = $request->file('image')->store('post-images');
        }

        // Update data
        musyawarah::where('id', $musyawarah->id)->update($validateData);

        return redirect('/dashboard/musyawarah')->with('success', 'Data Musyawarah telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $musyawarah = musyawarah::where('slug', $slug)->firstOrFail();

        // Menghapus data foto lama supaya berganti baru
        if ($musyawarah->image) {
            Storage::delete($musyawarah->image);
        }

        musyawarah::destroy($musyawarah->id);

        return redirect('/dashboard/musyawarah')->with('success', 'Data musyawarah telah Dihapus!');
    }

    public function search(Request $request)
    {
        // if ($request->has('search')) {
        //     $searchTerm = $request->input('search');
        //     $data = Kajian::where('title', 'like', '%' .$searchTerm. '%')->paginate(10);
        // } else {
        //     $data = Kajian::where('user_id', auth()->user()->id)->get();
            
        // }

        return view('dashboard/musyawarah/index',[
            "posts" => Musyawarah::latest()->filter(request(['search', 'lingkup', 'hasil']))->paginate(7)->withQueryString(),//Load Digunakan N+1 Problem & pagination
            "pp" => $pp =null,
        ]);
    }
}

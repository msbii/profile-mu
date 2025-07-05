<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Storage;
use App\Models\KategoriStrukturOrganisasi;

class DashboardStrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pp = null;
        // Menampilkan data berdasarkan user yang login
        return view('dashboard.struktur.index',[
            'posts' => StrukturOrganisasi::orderBy('created_at', 'desc')->get(),
            'pp'=> $pp,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.struktur.create',[
            'categories' => KategoriStrukturOrganisasi::all(),
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
            'kategori_id' => 'required',
            'image' => 'image|file|max:2048',
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

        StrukturOrganisasi::create($validateData);

        return redirect('/dashboard/struktur')->with('success', 'Struktur Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $strukturOrganisasi = StrukturOrganisasi::where('slug', $slug)->firstOrFail();
        return view('dashboard.struktur.show',[
            'post' => $strukturOrganisasi,
            'pp' => $pp = null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        //
        $sK = StrukturOrganisasi::where('slug', $slug)->firstOrFail();
        return view('dashboard.struktur.edit',[
            'post' => $sK,
            'categories' => KategoriStrukturOrganisasi::all(),
            'pp' => $pp = null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        // Ambil data SK berdasarkan slug
        $sK = StrukturOrganisasi::where('slug', $slug)->firstOrFail();

        // Aturan validasi
        $rules =[
            'title' => 'required|max:255',
            'kategori_id' => 'required',
            'image' => 'image|file|max:2048',
        ];

        if ($request->slug != $sK->slug) {
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
        StrukturOrganisasi::where('id', $sK->id)->update($validateData);

        return redirect('/dashboard/struktur')->with('success', 'Data Struktur telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $sK = StrukturOrganisasi::where('slug', $slug)->firstOrFail();

        // Menghapus data foto lama supaya berganti baru
        if ($sK->image) {
            Storage::delete($sK->image);
        }

        StrukturOrganisasi::destroy($sK->id);

        return redirect('/dashboard/struktur')->with('success', 'Data Struktur telah Dihapus!');
    }

    public function downloadImage($filename)
    {
        $path = $filename;

        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'File tidak ditemukan');
        }

        return Storage::disk('public')->download($path);
    }

    public function search(Request $request)
    {

        return view('dashboard/struktur/index',[
            "posts" => StrukturOrganisasi::latest()->filter(request(['search']))->paginate(7)->withQueryString(),//Load Digunakan N+1 Problem & pagination
            "pp" => $pp =null,
        ]);
    }
}

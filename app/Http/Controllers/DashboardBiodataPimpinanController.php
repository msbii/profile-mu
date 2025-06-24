<?php

namespace App\Http\Controllers;

use App\Models\Lingkup;
use Illuminate\Http\Request;
use App\Models\BiodataPimpinan;
use App\Models\PositionPimpinan;
use Illuminate\Support\Facades\Storage;

class DashboardBiodataPimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pp = null;
        // Menampilkan data berdasarkan user yang login
        return view('dashboard.biodataPimpinan.index',[
            'posts' => BiodataPimpinan::orderBy('created_at', 'desc')->get(),
            'pp'=> $pp,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.biodataPimpinan.create',[
            'categories' => Lingkup::take(2)->get(),
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
            'position' => 'required',
            'image' => 'image|file|max:2048',
            'biography' => 'required',
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

        BiodataPimpinan::create($validateData);

        return redirect('/dashboard/biodataPimpinan')->with('success', 'Biodata Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $biodataPimpinan = BiodataPimpinan::where('slug', $slug)->firstOrFail();
        return view('dashboard.biodataPimpinan.show',[
            'post' => $biodataPimpinan,
            'pp' => $pp = null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        //
        $biodataPimpinan = BiodataPimpinan::where('slug', $slug)->firstOrFail();
        return view('dashboard.biodataPimpinan.edit',[
            'post' => $biodataPimpinan,
            'categories' => Lingkup::take(2)->get(),
            'pp' => $pp = null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        // Ambil data SK berdasarkan slug
        $biodataPimpinan = BiodataPimpinan::where('slug', $slug)->firstOrFail();

        // Aturan validasi
        $rules =[
            'title' => 'required|max:255',
            'position' => 'required',
            'image' => 'image|file|max:2048',
            'biography' => 'required',
        ];

        if ($request->slug != $biodataPimpinan->slug) {
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
        BiodataPimpinan::where('id', $biodataPimpinan->id)->update($validateData);

        return redirect('/dashboard/biodataPimpinan')->with('success', 'Biodata telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $biodataPimpinan = BiodataPimpinan::where('slug', $slug)->firstOrFail();

        // Menghapus data foto lama supaya berganti baru
        if ($biodataPimpinan->image) {
            Storage::delete($biodataPimpinan->image);
        }

        BiodataPimpinan::destroy($biodataPimpinan->id);

        return redirect('/dashboard/biodataPimpinan')->with('success', 'Biodata telah Dihapus!');
    }

    public function search(Request $request)
    {

        return view('dashboard/biodataPimpinan/index',[
            "posts" => BiodataPimpinan::latest()->filter(request(['search', 'position']))->paginate(7)->withQueryString(),//Load Digunakan N+1 Problem & pagination
            "pp" => $pp =null,
        ]);
    }
}

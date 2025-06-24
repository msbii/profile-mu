<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Lingkup;
use Illuminate\Http\Request;
use App\Models\LocationInventaris;
use Illuminate\Support\Facades\Storage;

class DashboardInventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pp = null;
        // Menampilkan data berdasarkan user yang login
        return view('dashboard.inventaris.index',[
            'posts' => Inventaris::orderBy('created_at', 'desc')->paginate(10),
            'pp'=> $pp,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.inventaris.create',[
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
            'location_id' => 'required',
            'image' => 'image|file|max:2048',
            'description' => 'required',
            'quantity' => 'required',
            'location' => 'required',
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

        Inventaris::create($validateData);

        return redirect('/dashboard/inventaris')->with('success', 'Inventaris Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $inventaris = inventaris::where('slug', $slug)->firstOrFail();
        return view('dashboard.inventaris.show',[
            'post' => $inventaris,
            'pp' => $pp = null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        //
        $inventaris = inventaris::where('slug', $slug)->firstOrFail();
        return view('dashboard.inventaris.edit',[
            'post' => $inventaris,
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
        $inventaris = inventaris::where('slug', $slug)->firstOrFail();

        // Aturan validasi
        $rules =[
            'title' => 'required|max:255',
            'location_id' => 'required',
            'image' => 'image|file|max:2048',
            'description' => 'required',
            'quantity' => 'required',
            'location' => 'required',
        ];

        if ($request->slug != $inventaris->slug) {
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
        Inventaris::where('id', $inventaris->id)->update($validateData);

        return redirect('/dashboard/inventaris')->with('success', 'inventaris telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $inventaris = inventaris::where('slug', $slug)->firstOrFail();

        // Menghapus data foto lama supaya berganti baru
        if ($inventaris->image) {
            Storage::delete($inventaris->image);
        }

        inventaris::destroy($inventaris->id);

        return redirect('/dashboard/inventaris')->with('success', 'Data Inventaris telah Dihapus!');
    }

    public function search(Request $request)
    {

        return view('dashboard/inventaris/index',[
            "posts" => Inventaris::latest()->filter(request(['search', 'lingkup']))->paginate(7)->withQueryString(),//Load Digunakan N+1 Problem & pagination
            "pp" => $pp =null,
        ]);
    }
}

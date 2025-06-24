<?php

namespace App\Http\Controllers;

use App\Models\Lingkup;
use Illuminate\Http\Request;
use App\Models\PelaksanaProgram;
use Illuminate\Support\Facades\Storage;

class DashboardPelaksanaanProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pp = null;
        // Menampilkan data berdasarkan user yang login
        return view('dashboard.pelaksanaProgram.index',[
            'posts' => pelaksanaProgram::orderBy('created_at', 'desc')->paginate(10),
            'pp'=> $pp,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.pelaksanaProgram.create',[
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
            'lingkup_id' => 'required',
            'image' => 'image|file|max:2048',
            'name' => 'required',
            'description' => 'required',
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

        PelaksanaProgram::create($validateData);

        return redirect('/dashboard/pelaksanaanProgram')->with('success', 'Data Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $pelaksanaProgram = PelaksanaProgram::where('slug', $slug)->firstOrFail();
        return view('dashboard.pelaksanaProgram.show',[
            'post' => $pelaksanaProgram,
            'pp' => $pp = null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        //
        $pelaksanaProgram = PelaksanaProgram::where('slug', $slug)->firstOrFail();
        return view('dashboard.pelaksanaProgram.edit',[
            'post' => $pelaksanaProgram,
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
        $pelaksanaProgram = pelaksanaProgram::where('slug', $slug)->firstOrFail();

        // Aturan validasi
        $rules =[
            'title' => 'required|max:255',
            'lingkup_id' => 'required',
            'image' => 'image|file|max:2048',
            'name' => 'required',
            'description' => 'required',
        ];

        if ($request->slug != $pelaksanaProgram->slug) {
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
        pelaksanaProgram::where('id', $pelaksanaProgram->id)->update($validateData);

        return redirect('/dashboard/pelaksanaanProgram')->with('success', 'Data telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $pelaksanaProgram = pelaksanaProgram::where('slug', $slug)->firstOrFail();

        // Menghapus data foto lama supaya berganti baru
        if ($pelaksanaProgram->image) {
            Storage::delete($pelaksanaProgram->image);
        }

        pelaksanaProgram::destroy($pelaksanaProgram->id);

        return redirect('/dashboard/pelaksanaanProgram')->with('success', 'Data telah Dihapus!');
    }

    public function search(Request $request)
    {

        return view('dashboard/pelaksanaProgram/index',[
            "posts" => PelaksanaProgram::latest()->filter(request(['search', 'lingkup']))->paginate(7)->withQueryString(),//Load Digunakan N+1 Problem & pagination
            "pp" => $pp =null,
        ]);
    }
}

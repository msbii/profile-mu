<?php

namespace App\Http\Controllers;

use App\Models\SK;
use App\Models\KategoriSK;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardSKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pp = null;
        // Menampilkan data berdasarkan user yang login
        return view('dashboard.sk.index',[
            'posts' => SK::orderBy('created_at', 'desc')->get(),
            'pp'=> $pp,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.sk.create',[
            'categories' => KategoriSK::all(),
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
            'kategori_sk_id' => 'required',
            'tahun' => 'required',
            'document' => 'required|file|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ]);

        if ($request->file('document')) {
            $document = $request->file('document');
            $originalName = time() . '_' . $document->getClientOriginalName(); // Nama asli file dengan timestamp
            $path = $document->storeAs('post-document', $originalName, 'public'); // Simpan ke folder public
            $validateData['document'] = $originalName; // Simpan nama file ke database
        }
       
        SK::create($validateData);

        return redirect('/dashboard/sk')->with('success', 'Data SK Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(SK $sK)
    public function show($slug)
    {
        //
        $sK = SK::where('slug', $slug)->firstOrFail();
        return view('dashboard.sk.show',[
            'post' => $sK,
            'pp' => $pp = null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        //
        $sK = SK::where('slug', $slug)->firstOrFail();
        return view('dashboard.sk.edit',[
            'post' => $sK,
            'categories' => KategoriSK::all(),
            'pp' => $pp = null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        // Ambil data SK berdasarkan slug
        $sK = SK::where('slug', $slug)->firstOrFail();

        // Aturan validasi
        $rules =[
            'title' => 'required|max:255',
            'kategori_sk_id' => 'required',
            'tahun' => 'required',
            'document' => 'file|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ];

        if ($request->slug != $sK->slug) {
            $rules['slug'] = 'required|unique:posts';//tidak dimasukan validasi  karna mengatasi unique
        }

        // validasi data
        $validateData = $request->validate($rules);


        // Jika ada file baru
        if ($request->file('document')) {
            // Hapus file lama jika ada
            if ($sK->document) {
                Storage::disk('public')->delete('post-document/' . $sK->document);
            }

            // Simpan file baru
            $document = $request->file('document');
            $originalName = time() . '_' . $document->getClientOriginalName();
            $path = $document->storeAs('post-document', $originalName, 'public');
            $validateData['document'] = $originalName;
        }

        // Update data
        SK::where('id', $sK->id)->update($validateData);

        return redirect('/dashboard/sk')->with('success', 'Data SK telah Diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $sK = SK::where('slug', $slug)->firstOrFail();
        // dd($sK);
        // Menghapus data file lama supaya berganti baru
        if ($sK->document) {
            Storage::delete($sK->document);
        }

        SK::destroy($sK->id);
        // $sK->delete();

        return redirect('/dashboard/sk')->with('success', 'Data SK telah Dihapus!');
    }

    public function search(Request $request)
    {

        return view('dashboard/sk/index',[
            "posts" => SK::latest()->filter(request(['search', 'kategori']))->paginate(7)->withQueryString(),//Load Digunakan N+1 Problem & pagination
            "pp" => $pp =null,
        ]);
    }

    // chekslug otomatis mengisi input slug
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(SK::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

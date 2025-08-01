<?php

namespace App\Http\Controllers;

use App\Models\Kajian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriKajian;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardKajianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pp = null;
        // Menampilkan data berdasarkan user yang login
        return view('dashboard.kajians.index',[
            // 'posts' => Kajian::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get(),
            'posts' => Kajian::all()->orderBy('created_at', 'desc')->paginate(10),
            'pp'=> $pp,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.kajians.create',[
            'categories' => KategoriKajian::all(),
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
            'speaker' => 'max:55',
            'image' => 'image|file|max:2048',
            'category_id' => 'required',
            'body' => 'required',
            'document'=> 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ]);

        if ($request->file('image')) {
            $path = $request->file('image')->store('public/post-images');
            // Hapus 'public/' agar yang disimpan hanya 'post-images/namafile.png'
            $validateData['image'] = str_replace('public/', '', $path);
        }

        // // Mengambil file dari request
        // $document = $request->file('document');
        // // Menyimpan file ke folder 'post-document' dalam penyimpanan default Laravel ('storage/app/post-document')
        // $path = $document->store('post-document');
        // // $path akan berisi path relatif ke penyimpanan, misalnya "post-document/nama_file_unik.pdf"
        // // Jika Anda perlu mendapatkan nama file untuk disimpan di database atau menampilkan file, gunakan basename()
        // $nama_document = basename($path);

        // Mengambil file dari request
        if ($request->file('document')) {
            $document = $request->file('document');
            $originalName = time() . '_' . $document->getClientOriginalName(); // Nama asli file dengan timestamp
            $path = $document->storeAs('post-document', $originalName, 'public'); // Simpan ke folder public
            $validateData['document'] = $originalName; // Simpan nama file ke database
        }


        // Menyimpan data ke dalamm post
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200); 

        Kajian::create($validateData);

        return redirect('/dashboard/kajian')->with('success', 'Kajian Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kajian $kajian)
    {
        //
        return view('dashboard.kajians.show',[
            'post' => $kajian,
            'pp' => $pp = null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kajian $kajian)
    {
        //
        return view('dashboard.kajians.edit',[
            'post' => $kajian,
            'categories' => KategoriKajian::all(),
            'pp' => $pp = null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kajian $kajian)
    {
        //
        $rules =[
            'title' => 'required|max:255',
            'speaker' => 'max:55',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required',
            'document'=> 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ];

        if ($request->slug != $kajian->slug) {
            $rules['slug'] = 'required|unique:posts';//tidak dimasukan validasi  karna mengatasi unique
        }

        // validasi data
        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            // Hapus gambar lama jika ada
            if ($request->oldImage) {
                Storage::delete('public/' . $request->oldImage);
            }

            // Simpan file baru dan hanya simpan path tanpa 'public/'
            $path = $request->file('image')->store('public/post-images');
            $validateData['image'] = str_replace('public/', '', $path);
        }

        if ($request->file('document')) {
            // Hapus file lama jika ada
            if ($kajian->document) {
                Storage::disk('public')->delete('post-document/' . $kajian->document);
            }

            // Simpan file baru
            $document = $request->file('document');
            $originalName = time() . '_' . $document->getClientOriginalName();
            $path = $document->storeAs('post-document', $originalName, 'public');
            $validateData['document'] = $originalName;
        }
        
        // Menyimpan data ke dalamm post
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        
        Kajian::where('id', $kajian->id) 
            ->update($validateData);

        return redirect('/dashboard/kajian')->with('success', 'Kajian telah Diperbarui!');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kajian $kajian)
    {
        // Menghapus data foto lama supaya berganti baru
        if ($kajian->image) {
            Storage::delete($kajian->image);
        }
        // Menghapus data file lama supaya berganti baru
        if ($kajian->document) {
            Storage::delete($kajian->document);
        }

        Kajian::destroy($kajian->id);

        return redirect('/dashboard/kajian')->with('success', 'Kajian telah Dihapus!');
    }

    // chekslug otomatis mengisi input slug
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kajian::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function download($filename)
    {
        $path = 'post-document/' . $filename;

        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'File tidak ditemukan');
        }

        return Storage::disk('public')->download($path);
    }

    public function search(Request $request)
    {
        // if ($request->has('search')) {
        //     $searchTerm = $request->input('search');
        //     $data = Kajian::where('title', 'like', '%' .$searchTerm. '%')->paginate(10);
        // } else {
        //     $data = Kajian::where('user_id', auth()->user()->id)->get();
            
        // }

        return view('dashboard/kajians/index',[
            "posts" => Kajian::latest()->filter(request(['search', 'kategoriKajian', 'user']))->paginate(7)->withQueryString(),//Load Digunakan N+1 Problem & pagination
            "pp" => $pp =null,
        ]);
    }
}

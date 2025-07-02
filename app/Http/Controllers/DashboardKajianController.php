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
        // check jika img tidak ada maka unsplash
        // if ($request->file('image')) {
        //     $validateData['image'] = $request->file('image')->store('post-images');
        // }
        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images','public');
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

        // $document = $request->file('document');
        // // $nama_document = 'Kajian'.date('Ymdhis').'.'.$request->file('document')
        // // ->getClientOriginalExtension();
        // // Menambahkan timestamp untuk mencegah nama file duplikat
        // $nama_document = time() . '_' . $document->getClientOriginalName();
        // $document->move('dokumen/',$nama_document);

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

        
        // check jika img tidak ada maka unsplash
        if ($request->file('image')) {
            // Menghapus data foto lama supaya berganti baru
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
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
        $filePath = 'post-document/' . $filename;

        // Memeriksa apakah file ada
        if (Storage::exists($filePath)) {
            // Mengunduh file
            return Storage::download($filePath);
        }
        // Jika file tidak ada, kembalikan response 404 atau pesan error
        return redirect()->back()->with('error', 'File tidak ditemukan.');
    
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

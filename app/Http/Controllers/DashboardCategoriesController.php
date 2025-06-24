<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.categories.index',[
            // 'categories' => Category::all(),
            'categories' => Category::orderBy('created_at', 'desc')->get(),
            'pp' => $pp=null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|unique:categories',

        ]);
        
        // Simpan data produk baru ke dalam database
        Category::create($validatedData);
        
        return redirect('/dashboard/categories')->with('success', 'Item berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {   
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // 'slug'=> Str::slug($request->name),
        ]);

        // // Find the product by ID
        $category = category::findOrFail($category->id);

        // Update product details
        $category->name = $validatedData['name'];
        // $category->slug = $request->name;

        // Save the changes
        $category->save();

        return redirect('/dashboard/categories')->with('success', 'Item berhasil diperbaharui');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        Category::destroy($category->id);

        // Redirect ke halaman lain atau kembali ke halaman sebelumnya
        return redirect('/dashboard/categories')->with('success', 'Item berhasil dihapus.');
    }

        //chekslug otomatis
        public function checkSlug(Request $request)
        {
            $slug = SlugService::createSlug(Category::class, 'slug', $request->title);
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

        return view('dashboard/categories/index',[
            "categories" => Category::latest()->filter(request(['search', 'kategoriKajian', 'user']))->paginate(7)->withQueryString(),//Load Digunakan N+1 Problem & pagination
            "pp" => $pp =null,
        ]);
    }
}

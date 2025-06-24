<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $user = Auth::user();
        // if ($user) {
        //     $pp = ProfilPenjual::where('user_id', $user->id)->first();
        // } else {
        //     // Jika user tidak ditemukan, atur $profilPenjual menjadi null atau sesuaikan dengan kebutuhan
        //     $pp = null;
        // }

        // if ($request->has('search')) {
        //     $searchTerm = $request->input('search');
        //     $data = User::where('name', 'like', '%' .$searchTerm. '%')->paginate(10);
        // } else {
        //     // $data = User::all();
        //     $data = User::paginate(10);
        // }

        return view('dashboard.users.index',[
            // 'data'=> $data,
            "pp" => $pp=null,
            'user' => User::orderBy('created_at', 'desc')->paginate(10),

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {      
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'role' => 'string|max:255',
            'is_admin' => 'string|max:255',
        ]);

        // Find the product by ID
        $user = User::findOrFail($user->id);

        User::where('id', $user->id) 
        ->update($validatedData);
        // Save the changes
        // $user->save();
        return redirect('/dashboard/user')->with('success', 'Item updated successfully');
       
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        User::destroy($user->id);
        // Redirect ke halaman lain atau kembali ke halaman sebelumnya
        return redirect('/dashboard/user')->with('success', 'Item berhasil dihapus ya.');
    }

    public function search(Request $request)
    {
        return view('dashboard/users/index',[
            "user" => User::latest()->filter(request(['search', 'kategoriKajian', 'user']))->paginate(7)->withQueryString(),//Load Digunakan N+1 Problem & pagination
            "pp" => $pp =null,
        ]);
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}

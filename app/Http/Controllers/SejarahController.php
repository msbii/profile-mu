<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use App\Http\Requests\StoreSejarahRequest;
use App\Http\Requests\UpdateSejarahRequest;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreSejarahRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sejarah $sejarah)
    {
        //
        // $sejarahPosts = Post::whereIn('title', ['Muhammadiyah', 'Aisyiyah'])->get(); // Misalnya ambil postingan Muhammadiyah & Aisyiyah

        // return view('sejarah.index', compact('sejarahPosts'));
        return view('dashboardPost/sejarah/home', [
            "title" => "Single post",
            "active" => "posts",
            "post" => $sejarah
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sejarah $sejarah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSejarahRequest $request, Sejarah $sejarah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sejarah $sejarah)
    {
        //
    }
}

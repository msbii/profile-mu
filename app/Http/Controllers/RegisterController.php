<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register', [
            'title'=> 'Register'
        ]);
    }

    public function store(Request $request)
    {
        //form validation
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255|confirmed',// Menggunakan confirmed untuk konfirmasi password
        ]);

        // tambahan pengaman bycrypt
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);
        //flash message
        // $request->session()->flash('success', 'Registration successful! Please Login ');
        // $request->flash('registerSuccess', 'Registration successful! Please Login ');

        return redirect('/login')->with('registerSuccess', 'Registration successful! Please Login ');
    }
}

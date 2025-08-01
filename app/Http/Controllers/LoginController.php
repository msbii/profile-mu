<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login', [
            'title' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email:dns',
        //     'password' => 'required'
        // ]);

        //otentifikasi login
        $credentials =  $request->validate([
            'email' => 'required|email',
            //dihapus supaya bisa selain gmail
            //'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

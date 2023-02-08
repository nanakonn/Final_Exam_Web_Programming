<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login.login', );
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('id', Auth::user()->id);
            return redirect()->intended('home');
        }
        return back()->with('failed','Wrong Email/ Password. Please Check Again.');
    }

    public function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();

        return redirect('/logout');
    }

    public function logoutScreen() {
        return view('login.logout',);
    }
}

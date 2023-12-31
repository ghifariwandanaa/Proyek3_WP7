<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    public function index()
    {
        if (session('verified')) {
            return view('akun.login', ['title' => 'login', 'verified' => true]);
        }
        return view('akun.login', ['title' => 'login']);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($validateData)) {
            $request->session()->regenerate();
                return redirect()->intended('/aboutweb');
        }

        return back()->with('loginError', 'Login gagal. Pastikan email dan password Anda benar.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('home');
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasVerifiedEmail()) {
                return true;
            } else {
                Auth::logout();
            }
        }

        return false;
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class registerController extends Controller
{
    public function index()
    {
        return view('akun.register', ['title' => 'register']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8'
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        event(new registered($user));

        // Mengirim notifikasi verifikasi email
        $user->sendEmailVerificationNotification();

        return redirect('/login')->with('success', 'Silahkan cek email Anda untuk verifikasi.');
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}           

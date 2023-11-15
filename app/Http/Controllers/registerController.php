<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class registerController extends Controller
{
    public function index()
    {
        return view('akun.register',['title' => 'register']);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|'
        ]);

        User::create($validateData);  

        return redirect('/login')->with('success','Registrasi Berhasil !! silahkan login');
    }
}           

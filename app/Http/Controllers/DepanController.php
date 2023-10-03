<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\halaman; 


class DepanController extends Controller
{
    public function about()
{
    $data = halaman::first(); 
    return view('depan.about', compact('data'));
}
}
